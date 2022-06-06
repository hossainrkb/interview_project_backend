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
                    <div class="card-body">
                        <div class="row">
                            <div class="table-responsive tech_semester_subjects">
                                <div class="text-center">
                                    <i class="fas fa-2x fa-spinner fa-spin d-none dept_course_spinner"></i>
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
            let dept_course_spinner = document.querySelector(".dept_course_spinner");

            function callingTechnologyListBySub(input = null) {
                dept_course_spinner.classList.remove("d-none");
                let searchItem = document.getElementById('search_subject_input');
                let isPageLoad = input && input.dataset.next_page_url ? false : true;
                let nextPageurl = input && input.dataset.next_page_url ? input.dataset.next_page_url : null;
                let uri = "";
                uri = `${application_api_url}/sub-structure-technology/{{ request('technology')->d_id }}`
                sendHttpRequest(
                        "POST",
                        uri
                    )
                    .then((responseData) => {
                        if (responseData.status && responseData.status == 'ok') {
                            dept_course_spinner.classList.add("d-none");
                            let {
                                data: dept_by_sub_list
                            } = responseData;
                            let html = '';
                            html += `<table class='table table-bordered table-sm text-center'>`
                            for (const key in dept_by_sub_list) {
                                html += `<tr>`
                                html +=
                                    `<td class='bg-info text-left' colspan='12'><i class='fa fa-info-circle'></i>  ${key}</td>`
                                html += `</tr>`
                                // First Row Done
                                let element_subjects = dept_by_sub_list[key];
                                html += `<tr>`
                                html += `<td>SN</td>`
                                html += `<td>Sub Code</td>`
                                html += `<td>Name of the Subject</td>`
                                html += `<td>T</td>`
                                html += `<td>P</td>`
                                html += `<td>C</td>`
                                html += `<td>TC</td>`
                                html += `<td>TF</td>`
                                html += `<td>PC</td>`
                                html += `<td>PF</td>`
                                html += `<td>Marks</td>`
                                html += `<td>Action</td>`
                                html += `</tr>`
                                if (Object.keys(element_subjects).length) {
                                    for (const sub_key in element_subjects) {
                                        if (sub_key == 'total') {
                                            html += `<tr style='font-weight:bold'>`
                                        } else {
                                            html += `<tr>`
                                        }
                                        html += `<td>${element_subjects[sub_key]['sn']}</td>`
                                        html += `<td>${element_subjects[sub_key]['sub_code']}</td>`
                                        html += `<td>${element_subjects[sub_key]['sub_name']}  </td>`
                                        html += `<td>${element_subjects[sub_key]['t']} </td>`
                                        html += `<td>${element_subjects[sub_key]['p']} </td>`
                                        html += `<td>${element_subjects[sub_key]['c']} </td>`
                                        html += `<td>${element_subjects[sub_key]['tc']} </td>`
                                        html += `<td>${element_subjects[sub_key]['tf']} </td>`
                                        html += `<td>${element_subjects[sub_key]['pc']} </td>`
                                        html += `<td>${element_subjects[sub_key]['pf']} </td>`
                                        html += `<td>${element_subjects[sub_key]['marks']} </td>`
                                        if(element_subjects[sub_key]['sub_id']){
                                            html += `<td><a title="Details" style='cursor:pointer' class="btn bg-info"
                                                href="${application_base_url}/subjects/${element_subjects[sub_key]['sub_id']}/show">
                                                <i class="fas fa-eye"></i>
                                                </a></td>`
                                        }else{
                                            html += `<td></td>`
                                        }
                                        
                                        html += `</tr>`
                                    }
                                } else {

                                    html += "<tr class='text-center'><td colspan='12'>No Record Found</td></tr>";
                                }



                            }
                            html += `</table>`

                            document.querySelector(`.tech_semester_subjects`).innerHTML = html;
                        }
                    })
                    .catch((err) => {
                        dept_course_spinner.classList.add("d-none");
                        document.querySelector(`.tech_semester_subjects`).innerHTML =
                            "<table><tr class='text-center'><td colspan='4'>No Record Found</td></tr></table>";
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
