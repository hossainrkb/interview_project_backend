<x-layouts.master>
    <x-elements.sweetalert />
    <x-slot name="body">
        @include('technology.header', [
            'heading' => 'COURSE PANEL',
            'sub_head' => "$technology->d_name TECHNOLOGY ($technology->d_code) , PROBIDHAN : $probidhan->pro_name",
            'first_sub_col' => 'col-md-2',
            'second_sub_col' => 'col-md-8 text-center',
            'third_sub_col' => 'col-md-2 text-right',
            'sub_head_first' => '<a href="view_courses.php">
                                                            <button type="button" class="btn btn-default bg-danger ">
                                                                <i class="fa fa-reply-all"> <b>BACK</b></i>
                                                            </button>
                                                            </a>',
            'sub_head_second' => '<a href="view_courses.php">
                                                            <button type="button" class="btn bg-info">
                                                                <i class="fa fa-list"> <b>PDF</b></i>
                                                            </button>
                                                            </a>',
        ])
        <div class="row mt-0">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-5">
                                <input type="text" class="form-control"  id="search_subject_input" placeholder="Search by Course Code or Name..">
                            </div>
                            <div class="col-md-3 text-left">
                                <input type="submit" class="btn bg-info" value="Search" onclick="callingTechnologyListBySub(this,true)">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-condensed text-center table-sm">
                                    <thead>
                                        <tr class="bg-info">
                                            <th class="text-center">S.N</th>
                                            <th class="text-center">Sub Code</th>
                                            <th class="text-center">Name of the Subject</th>
                                            <th class="text-center">T</th>
                                            <th class="text-center">P</th>
                                            <th class="text-center">C</th>
                                            <th class="text-center">TC</th>
                                            <th class="text-center">TF</th>
                                            <th class="text-center">PC</th>
                                            <th class="text-center">PF</th>
                                            <th class="text-center">Marks</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="subject_tech_list"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <i class="fas fa-2x fa-spinner fa-spin d-none dept_course_spinner"></i>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-center">
                                    <div class="from_load_subject_tech_list"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </x-slot>
    @push('js')
        <script>
            var startWithCountTechBySubList = 1;
            let dept_course_spinner = document.querySelector(".dept_course_spinner");

            function callingTechnologyListBySub(input = null,removal = false) {
                dept_course_spinner.classList.remove("d-none");
                let searchItem = document.getElementById('search_subject_input');
                removal? document.querySelector(`.subject_tech_list`).innerHTML="":""
                let isPageLoad = input && input.dataset.next_page_url ? false : true;
                let nextPageurl = input && input.dataset.next_page_url ? input.dataset.next_page_url : null;
                let uri = "";
                uri = nextPageurl ? nextPageurl :
                    `${application_api_url}/get-subject-by-technology/{{ request('technology')->d_id }}`
                    let data = null;
            if(searchItem.value){
                data = {};
                data['search_keyword'] = searchItem.value;
            }
                sendHttpRequest(
                        "POST",
                        uri,
                        data
                    )
                    .then((responseData) => {
                        if (responseData.status && responseData.status == 'ok') {
                            dept_course_spinner.classList.add("d-none");
                            let {
                                data
                            } = responseData;
                            let dept_by_sub_list = data.data;
                            startWithCountTechBySubList = parseInt(data.current_page) * DEFAULT_PAGINATE_ITEM -
                                DEFAULT_PAGINATE_ITEM_START_CAL;
                            populateList(dept_by_sub_list, isPageLoad);
                            if (data.next_page_url) {
                                let load_more = "";
                                load_more = data.next_page_url
                                document.querySelector(`.from_load_subject_tech_list`).innerHTML =
                                    `<button class='btn bg-info' data-next_page_url="${load_more}" onclick="callingTechnologyListBySub(this)">Load More</button>`;
                            } else {
                                document.querySelector(`.from_load_subject_tech_list`).innerHTML = ""
                            }
                        }
                    })
                    .catch((err) => {
                        dept_course_spinner.classList.add("d-none");
                        document.querySelector(`.from_load_subject_tech_list`).innerHTML +=
                            "<tr class='text-center'><td colspan='4'>No Record Found</td></tr>";
                        console.log(err, err.data);
                    });
            }

            function populateList(listData, isPageLoad) {
                let heading_property = {
                    'iteration': 'S.N',
                    'sub_code': 'Sub Code',
                    'sub_name': 'Name of the Subject',
                    't': 'T',
                    'p': 'P',
                    'c': 'C',
                    'tc': 'TC',
                    'tf': 'TF',
                    'pc': 'PC',
                    'pf': 'PF',
                    'marks': 'Marks',
                    'action': 'Action',
                };
                let actions_property = {
                    'show': `${application_base_url}/subjects/replaceable/show`,
                }

                let htmlOutput = MAKE_TABLE(heading_property, listData, actions_property, startWithCountTechBySubList)
                document.querySelector(`.subject_tech_list`).innerHTML += htmlOutput;
            }
            callingTechnologyListBySub();
        </script>
    @endpush
</x-layouts.master>
