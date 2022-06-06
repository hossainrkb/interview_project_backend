<x-layouts.master>
    <x-elements.sweetalert />
    <x-slot name="body">
        @include('subjects.header', [
            'heading' => 'Course Details',
        ])
        <div class="row mt-0">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table  table-striped table-bordered text-right table-sm">
                                <thead>
                                    <tr class="bg-info">
                                        <th colspan="5" class="text-left"><i class="fa fa-info-circle"></i> SUBJECT
                                            DETAILS</th>
                                        <th>
                                            <button type="button" class="btn btn-sm btn-info btn-block">
                                                <i class="fa fa-edit"> <b>Edit Subject Details</b></i>
                                            </button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="text-right">Subject Name & Code :</th>
                                        <td class="text-left" colspan="4">{{ $subject->sub_name }}
                                            <b>({{ $subject->sub_code ?? null }})</b>
                                        </td>
                                        <td class="text-info"><b>PROBIDHAN :
                                                {{ $subject->probidhan->pro_name }}</b></td>
                                    </tr>
                                    <tr>
                                        <th class="text-right">Subject Credit :</th>
                                        <td colspan="2">Theory Credit : <b>{{ $subject->sub_t_credit ?? null }}</b>
                                        </td>
                                        <td colspan="2">Practical Credit : <b>{{ $subject->sub_p_credit ?? null }}</b>
                                        </td>
                                        <td><b>Total Credit : {{ $subject->sub_total_credit ?? null }}</b></td>
                                    </tr>

                                    <tr>
                                        <th class="text-right">Subject Marks :</th>
                                        <td>TC Marks: <b>{{ $subject->sub_tc_marks }}</b></td>
                                        <td>TF Marks: <b>{{ $subject->sub_tf_marks }}</b></td>
                                        <td>PC Marks: <b>{{ $subject->sub_pc_marks }}</b></td>
                                        <td>PF Marks: <b>{{ $subject->sub_pf_marks }}</b></td>
                                        <td><b>Total Marks : {{ $subject->sub_total_marks }}</b></td>
                                    </tr>
                                    <tr>
                                        <th class="text-right">Subject Department :</th>
                                        <td class="text-left" colspan="5">
                                            {{ $subject->technology->d_name ?? null }}<b>
                                                ({{ $subject->technology->d_code ?? null }})</b>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-condensed text-center table-sm">
                                <thead>
                                    <tr class="bg-info">
                                        <th colspan="5" class="text-left"><i class="fa fa-info-circle"></i> Assign
                                            Courses For Technology & Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="#" onsubmit="store_tech_subject(event,'{{ $subject->sub_id }}')"
                                        method=" post">
                                        @csrf
                                        <tr>
                                            <td class="text-right"><b>Technology :</b></td>
                                            <th>
                                                <select id="tech_id_sub" name="s_dept" class="form-control"
                                                    required="required">
                                                    <option value="">Select Technology</option>
                                                    @foreach ($s_department as $department)
                                                        @if (old('s_dept') && old('s_dept') == $department->d_id)
                                                            <option value="{{ $department->d_id }}" selected>
                                                                {{ $department->d_name . ' (' . $department->d_code . ')' }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $department->d_id }}">
                                                                {{ $department->d_name . ' (' . $department->d_code . ')' }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </th>
                                            <td class="text-right"><b>Semester :</b></td>
                                            <th>
                                                <select name="s_sem" id="sem_id_sub" class="form-control"
                                                    required="required">
                                                    <option value="">Select Semester</option>
                                                    @foreach ($s_semester as $semester)
                                                        @if (old('s_sem') && old('s_sem') == $semester->sem_id)
                                                            <option value="{{ $semester->sem_id }}" selected>
                                                                {{ $semester->sem_name }}</option>
                                                            </option>
                                                        @else
                                                            <option value="{{ $semester->sem_id }}">
                                                                {{ $semester->sem_name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td class="text-right"><b><span class="text-danger">*</span> Admin
                                                    T-Pin :</b></td>
                                            <th><input class="form-control" type="password" id="a_tpin_sub"
                                                    name="a_tpin" minlength="4" maxlength="4" required="required"
                                                    placeholder="Enter Admin T-Pin"></th>
                                            <td colspan="2"><input class="btn btn-md bg-info pull-left btn-block"
                                                    type="submit" name="set_sub" value="Assign Course"></td>
                                        </tr>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-condensed text-center table-sm">
                                <thead>
                                    <tr class="bg-info">
                                        <th class="text-center" colspan="5">Selected Technology & Semester for this
                                            Course</th>
                                    </tr>
                                    <tr class="btn-default">
                                        <th class="text-center">S.N</th>
                                        <th class="text-center">TECHNOLOGY</th>
                                        <th class="text-center">SEMESTER</th>
                                        <th class="text-center">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody class="subject_tech_list"></tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <i class="fas fa-2x fa-spinner fa-spin d-none dept_list_spinner"></i>
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
        </div>
    </x-slot>
    @push('js')
        <script src="{{ asset('js/bootbox.js') }}"></script>
        <script>
            function remove_subject_from_dept(ds_id) {
                var locale = {
                    OK: 'I Suppose',
                    CONFIRM: 'Remove',
                    CANCEL: 'Cancel'
                };
                bootbox.addLocale('custom', locale);
                bootbox.prompt({
                    title: "Enter T-pin",
                    inputType: "password",
                    locale: 'custom',
                    callback: function(atpin) {
                        if (!atpin) {
                            return true;
                        } else {
                            sendHttpRequest(
                                    "POST",
                                    `${application_api_url}/remove-technology-subject/${ds_id}`, {
                                        'a_tpin': atpin
                                    })
                                .then((responseData) => {
                                    if (responseData.status && responseData.status == 'error') {
                                        sweetAlertToast(responseData.message, 'error')
                                    }
                                    if (responseData.status && responseData.status == 'ok') {
                                        sweetAlertToast(responseData.message, 'success')
                                        document.querySelector(`.subject_tech_list`).innerHTML = '';
                                        callingTechnologyListBySub();
                                    }

                                })
                                .catch((err) => {
                                    console.log(err, err.data);
                                });
                            //end
                        }
                    }
                })
            }

            var startWithCountTechBySubList = 1;
            let dept_list_spinner = document.querySelector(".dept_list_spinner");

            function callingTechnologyListBySub(input = null) {
                dept_list_spinner.classList.remove("d-none");
                let isPageLoad = input && input.dataset.next_page_url ? false : true;
                let nextPageurl = input && input.dataset.next_page_url ? input.dataset.next_page_url : null;
                let uri = "";
                uri = nextPageurl ? nextPageurl :
                    `${application_api_url}/get-technology-by-subject/{{ request('subject')->sub_id }}`
                sendHttpRequest(
                        "POST",
                        uri
                    )
                    .then((responseData) => {
                        if (responseData.status && responseData.status == 'ok') {
                            dept_list_spinner.classList.add("d-none");
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
                        dept_list_spinner.classList.add("d-none");
                        document.querySelector(`.from_load_subject_tech_list`).innerHTML +=
                            "<tr class='text-center'><td colspan='4'>No Record Found</td></tr>";
                        console.log(err, err.data);
                    });
            }

            function populateList(listData, isPageLoad) {
                let heading_property = {
                    'iteration': 'Ser No',
                    'technology': 'TECHNOLOGY',
                    'semester': 'SEMESTER',
                    'action': 'Action'
                };
                let actions_property = {
                    'delete': `${application_api_url}replaceable`,
                }
                let delete_stuff = {
                    'method': `remove_subject_from_dept`,
                    'identifier': 'ds_id'
                }
                let htmlOutput = MAKE_TABLE(heading_property, listData, actions_property, startWithCountTechBySubList,
                    delete_stuff)
                document.querySelector(`.subject_tech_list`).innerHTML += htmlOutput;
            }
            callingTechnologyListBySub();

            function store_tech_subject(e, subject_id) {
                e.preventDefault();
                let data = {
                    s_dept: document.getElementById('tech_id_sub').value,
                    s_sem: document.getElementById('sem_id_sub').value,
                    a_tpin: document.getElementById('a_tpin_sub').value,
                };
                sendHttpRequest(
                        "POST",
                        `${application_api_url}/assign-sub-to-technology/${subject_id}`, data)
                    .then((responseData) => {
                        if (responseData.status && responseData.status == 'error') {
                            sweetAlertToast(responseData.message, 'error')
                        }
                        if (responseData.status && responseData.status == 'ok') {
                            sweetAlertToast(responseData.message, 'success')
                            document.querySelector(`.subject_tech_list`).innerHTML = '';
                            callingTechnologyListBySub();
                        }

                    })
                    .catch((err) => {
                        console.log(err, err.data);
                    });
            }
        </script>
    @endpush
    @push('css')
        <style>
            .bootbox .bootbox-cancel {
                background-color: #dc3545 !important;
                border: 1px solid #dc3545 !important;
                color: #fff
            }

            .bootbox .bootbox-accept {
                background-color: #17a2b8;
                border: 1px solid #17a2b8;
            }

        </style>
    @endpush
</x-layouts.master>
