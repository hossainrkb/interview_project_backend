<x-layouts.master>
    <x-elements.sweetalert />
    <x-slot name="body">
        @include('students.header', [
            'heading' => 'REGISTER NEW STUDENTS',
            'sub_head' => '',
            'sub_head_first' => '',
            'sub_head_second' => '',
        ])
        <div class="row mt-0">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @include('students.results.form', [
                                'title' => 'Semester Results Entry',
                            ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-0">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table  table-striped table-bordered text-right table-sm">
                                <thead>
                                    <tr class="btn-info">
                                        <th colspan="7" class="text-left"><i class="fa fa-info-circle"></i> Enter
                                            Result's Information below (Entry Result for 1ST Semester)</th>
                                    </tr>
                                </thead>
                                <tbody id="student_list_for_result"></tbody>
                                <tfoot id="populate_pagination_data"></tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    @push('js')
        <script>
            function callingTechnologyListBySub(pagination_url = null) {
                let student_list_for_result = document.getElementById(
                    `student_list_for_result`
                );
                while (student_list_for_result.firstChild) {
                    student_list_for_result.removeChild(student_list_for_result.firstChild);
                }
                let populate_pagination_data = document.getElementById(
                    `populate_pagination_data`
                );
                while (populate_pagination_data.firstChild) {
                    populate_pagination_data.removeChild(populate_pagination_data.firstChild);
                }
                let uri = "";
                if (pagination_url) {
                    uri = pagination_url;
                } else {
                    uri = `${application_api_url}/get-technology-by-subject/4`;
                }
                sendHttpRequest(
                        "POST",
                        uri
                    )
                    .then((responseData) => {
                        if (responseData.status && responseData.status == 'ok') {
                            console.log(responseData);
                            let response = null;
                            let links = null;
                            response = responseData.data.data;
                            links = responseData.data.links;
                            if (!Array.isArray(response)) {
                                response = Object.keys(response).map((key) => response[key]);
                            }
                            let count = 1;
                            if (response.length > 0) {
                                response.forEach((element, idx) => {
                                    student_list_for_result.appendChild(
                                        block_for_prev_document(
                                            element.id,
                                            element
                                        )
                                    );
                                    count++;
                                });
                                let tr = document.createElement("tr");
                                let td = document.createElement("td");
                                td.setAttribute("colspan", "2");
                                td.setAttribute("class", "mt-1");

                                links.forEach((element) => {
                                    td.appendChild(
                                        make_pagination_div(
                                            element.label,
                                            element.url,
                                            element.active
                                        )
                                    );
                                    tr.appendChild(td);
                                });

                                populate_pagination_data.appendChild(tr);
                            } else {
                                student_list_for_result.appendChild(document.createTextNode("No record found"));
                            }
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            }
            callingTechnologyListBySub()

            function block_for_prev_document(count, data) {
                let tr = document.createElement("tr");
                let td1 = document.createElement("td");
                td1.innerHTML = `${count}`;
                let td2 = document.createElement("td");
                td2.innerHTML = `${data.technology}`;

                tr.append(td1, td2);
                return tr;
            }

            function make_pagination_div(value, url, isActive) {
                let each_pagination_div = document.createElement("div");
                each_pagination_div.style.float = "left";
                if (isActive) {
                    each_pagination_div.setAttribute("class", "btn btn-sm bg-info");
                } else {
                    each_pagination_div.setAttribute("class", "btn btn-sm");
                }
                if (url) {
                    each_pagination_div.setAttribute(
                        "onclick",
                        `callingTechnologyListBySub('${url}')`
                    );
                }
                each_pagination_div.innerHTML = value;
                return each_pagination_div;
            }
        </script>
    @endpush
</x-layouts.master>
