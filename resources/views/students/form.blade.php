<div class="table-responsive">

    <table class="table  table-striped table-bordered text-right table-sm">
        @if (old('s_dept'))
            <input value="{{ old('s_dept') }}" type="hidden" id="prev_s_dept">
        @elseif (isset($subject) && $subject->s_dept)
            <input value="{{ $subject->s_dept }}" type="hidden" id="prev_s_dept">
        @endif
        <thead>
            <tr class="btn-info">
                <th colspan="4" class="text-left"><i class="fa fa-info-circle"></i> {{ $title }}</th>
            </tr>
        </thead>
        <tr>
            <td class="text-right"><b><span class="text-danger">*</span> STUDENT NAME :</b></td>
            <th>
                <input class="form-control" type="text" name="s_name" placeholder="Enter Student's Name" minlength="2"
                    maxlength="60" autocomplete="off" autofocus="off" required="required"
                    value="{{ old('s_name') ? old('s_name') : (isset($student) ? $student->s_name : null) }}">
            </th>
            <td class="text-right"><b><span class="text-danger">*</span> CONTACT NO :</b></td>
            <th>
                <input class="form-control" type="text" name="s_contact_no" placeholder="01XXXXXXXX" minlength="11"
                    maxlength="11" autocomplete="off" autofocus="off" required="required"
                    value="{{ old('s_contact_no') ? old('s_contact_no') : (isset($student) ? $student->s_contact_no : null) }}">
            </th>
        </tr>
        <tr>
            <td class="text-right"><b><span class="text-danger">*</span> FATHER NAME :</b></td>
            <th>
                <input class="form-control" type="text" name="f_name" placeholder="Enter Student's Father Name"
                    minlength="2" maxlength="60" autocomplete="off" autofocus="off" required="required"
                    value="{{ old('f_name') ? old('f_name') : (isset($student) ? $student->f_name : null) }}">
            </th>
            <td class="text-right"><b><span class="text-danger">*</span> MOTHER NAME :</b></td>
            <th>
                <input class="form-control" type="text" name="m_name" placeholder="Enter Student's Mother Name"
                    minlength="2" maxlength="60" autocomplete="off" autofocus="off" required="required"
                    value="{{ old('m_name') ? old('m_name') : (isset($student) ? $student->m_name : null) }}">
            </th>
        </tr>
        <tr>
            <td class="text-right"><b><span class="text-danger">*</span>ACADEMIC SHIFT :</b></td>
            <th>
                <select name="s_shift" class="form-control" required="required">
                    <option value="">SELECT SHIFT</option>
                    @forelse ($shifts as $shift)
                        @if (old('s_shift') && old('s_shift') == $shift->shift_id)
                            <option value="{{ $shift->shift_id }}" selected>{{ $shift->shift_name }}
                            </option>
                        @elseif (isset($subject) && $subject->s_shift == $shift->shift_id)
                            <option value="{{ $shift->shift_id }}" selected>{{ $shift->shift_name }}
                            </option>
                        @else
                            <option value="{{ $shift->shift_id }}">{{ $shift->shift_name }}</option>
                        @endif
                    @empty
                        <option value="">No Record Found</option>
                    @endforelse
                </select>
            </th>
            <td class="text-right"><b><span class="text-danger">*</span> ADMISSION DATE :</b></td>
            <th>
                <input class="datepicker form-control" type="text" name="s_admission_date"
                    placeholder="Enter Admission Date" required="required"
                    value="{{ old('s_admission_date') ? old('s_admission_date') : (isset($student) ? $student->s_admission_date : null) }}">
            </th>
        </tr>
        <tr>
            <td class="text-right"><b><span class="text-danger">*</span> ACADEMIC SESSION :</b></td>
            <th>
                <select name="s_session" id="s_session" class="form-control" required="required"
                    onChange="getTechnologyBySession(this,null,'#tech-list');">
                    <option value="">SELECT SESSION</option>
                    @forelse ($sessions as $session)
                        @if (old('s_shift') && old('s_shift') == $session->sec_id)
                            <option value="{{ $session->sec_id }}" selected>{{ $session->sec_name }}
                            </option>
                        @elseif (isset($subject) && $subject->s_shift == $session->sec_id)
                            <option value="{{ $session->sec_id }}" selected>{{ $session->sec_name }}
                            </option>
                        @else
                            <option value="{{ $session->sec_id }}">{{ $session->sec_name }}</option>
                        @endif
                    @empty
                        <option value="">No Record Found</option>
                    @endforelse
                </select>
            </th>
            <td class="text-right"><b><span class="text-danger">*</span> TECHNOLOGY :</b></td>
            <th>
                <select name="s_dept" id="tech-list" class="form-control" required="required"
                    onChange="getDSname(this.value);">
                    <option value="">SELECT TECHNOLOGY</option>
                </select>
            </th>
        </tr>
        <tr>
            <td class="text-right"><b><span class="text-danger">*</span> BOARD ROLL</b></td>
            <th>
                <input class="form-control" id="board-roll" type="number" name="s_board_roll" min="0"
                    placeholder="Enter Board Roll" required="required"
                    value="{{ old('s_board_roll') ? old('s_board_roll') : (isset($student) ? $student->s_board_roll : null) }}">
            </th>

            <td class="text-right"><b><span class="text-danger">*</span> REGISTRATION NO</b></td>
            <th>
                <input class="form-control" id="b-reg-no" type="number" name="s_board_reg_no" min="0"
                    placeholder="Enter Reg. No." required="required"
                    value="{{ old('s_board_reg_no') ? old('s_board_reg_no') : (isset($student) ? $student->s_board_reg_no : null) }}">
            </th>
        </tr>
        <tr>
            <td class="text-right">
                <b>Admin T-Pin :</b>
            </td>
            <td>
                <b><input class="form-control" type="password" name="a_tpin" minlength="4" maxlength="4"
                        placeholder="Enter Admin T-Pin" autocomplete="off" autofocus="off" required="required"
                        value="{{ old('a_tpin') ? old('a_tpin') : (isset($student) ? $student->a_tpin : null) }}" /></b>
            </td>
            <td colspan="2">
                <input class="btn bg-info btn-info pull-right btn-block" type="submit" name="add_student"
                    value="Register Student" />
            </td>
        </tr>

    </table>
</div>

@push('js')
    <script src="{{ asset('js/project-common.js') }}"></script>
    <script>
        if (document.getElementById('prev_s_dept') != undefined) {
            getTechnologyBySession(document.getElementById('s_session'), document.getElementById('prev_s_dept').value,
                '#tech-list')
        } else {
            getTechnologyBySession(document.getElementById('s_session'), null, '#tech-list')
        }
    </script>
    <script src="{{ asset('js/gijgo.min.js') }}" type="text/javascript"></script>
    <script>
        $(function() {
            $(".datepicker").datepicker({
                format: "yyyy-mm-dd",
                uiLibrary: 'bootstrap4',
                icons: {
                    rightIcon: '<i class="fa fa-calendar"></i>'
                }
            });

        });
    </script>
@endpush
@push('css')
    <link href="{{ asset('/css/gijgo.min.css') }}" rel="stylesheet" />
    <style>

    </style>
@endpush
