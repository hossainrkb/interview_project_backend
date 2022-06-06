<div class="table-responsive">
    <table class="table  table-striped table-bordered text-right table-sm">
        <thead>
            <tr class="btn-info">
                <th colspan="4" class="text-left"><i class="fa fa-info-circle"></i> {{ $title }}</th>
            </tr>
        </thead>
        <tr>
            @if (old('sub_dept'))
                <input value="{{ old('sub_dept') }}" type="hidden" id="prev_sub_dept">
            @elseif (isset($subject) && $subject->sub_dept)
                <input value="{{ $subject->sub_dept }}" type="hidden" id="prev_sub_dept">
            @endif
            <td><b><span class="text-danger">*</span> PROBIDHAN :</b></td>
            <th>

                <select class="form-control" name="sub_probidhan" id="sub_probidhan"
                    onChange="getTechnologyByProbidhan(this,null,'#tech-list')" required="required">
                    <option value="">SELECT PROBIDHAN</option>
                    @forelse ($probidhans as $item)
                        @if (old('sub_probidhan') && old('sub_probidhan') == $item->pro_id)
                            <option value="{{ $item->pro_id }}" selected>{{ $item->pro_name . ' PROBIDHAN' }}
                            </option>
                        @elseif (isset($subject) && $subject->sub_probidhan == $item->pro_id)
                            <option value="{{ $item->pro_id }}" selected>{{ $item->pro_name . ' PROBIDHAN' }}
                            </option>
                        @else
                            <option value="{{ $item->pro_id }}">{{ $item->pro_name . ' PROBIDHAN' }}</option>
                        @endif
                    @empty
                        <option value="">No Record Found</option>
                    @endforelse
                </select>
            </th>
            <td><b><span class="text-danger">*</span> TECHNOLOGY :</b></td>
            <th>
                <select name="sub_dept" id="tech-list" class="form-control" required="required">
                    <option value="">SELECT TECHNOLOGY</option>
                    <option>PLEASE SELECT PROBIDHAN FIRST</option>
                </select>
            </th>
        </tr>
        <tr>
            <th class="text-right"><span class="text-danger">*</span> SUBJECT CODE :</th>
            <th colspan="3">
                <div class="input-group">
                    <input class="form-control" type="number" name="sub_code" min="1" placeholder="Ex: 6225"
                        required="required"
                        value="{{ old('sub_code') ? old('sub_code') : (isset($subject) ? $subject->sub_code : null) }}">
                </div>
            </th>
        </tr>
        <tr>
            <td><b><span class="text-danger">*</span> SUBJECT NAME :</b></td>
            <th colspan="3"><input class="form-control" type="text" name="sub_name" placeholder="Ex: Bangla"
                    required="required"
                    value="{{ old('sub_name') ? old('sub_name') : (isset($subject) ? $subject->sub_name : null) }}">
            </th>
        </tr>
        <tr>
            <td><b><span class="text-danger">*</span> THEORY CREDIT :</b></td>
            <th><input class="form-control" type="number" name="sub_t_credit" min="0" required="required"
                    placeholder="Ex: 3"
                    value="{{ old('sub_t_credit') ? old('sub_t_credit') : (isset($subject) ? $subject->sub_t_credit : null) }}">
            </th>
            <td><b><span class="text-danger">*</span> PRACTICAL CREDIT :</b></td>
            <th><input class="form-control" type="number" name="sub_p_credit" min="0" required="required"
                    placeholder="Ex: 6"
                    value="{{ old('sub_p_credit') ? old('sub_p_credit') : (isset($subject) ? $subject->sub_p_credit : null) }}">
            </th>
        </tr>

        <tr>
            <td><b><span class="text-danger">*</span> TC MARKS :</b></td>
            <th><input class="form-control" type="number" name="sub_tc_marks" min="0" required="required"
                    placeholder="Ex: 20"
                    value="{{ old('sub_tc_marks') ? old('sub_tc_marks') : (isset($subject) ? $subject->sub_tc_marks : null) }}">
            </th>
            <td><b><span class="text-danger">*</span> TF MARKS :</b></td>
            <th><input class="form-control" type="number" name="sub_tf_marks" min="0" required="required"
                    placeholder="Ex: 20"
                    value="{{ old('sub_tf_marks') ? old('sub_tf_marks') : (isset($subject) ? $subject->sub_tf_marks : null) }}">
            </th>
        </tr>

        <tr>
            <td><b><span class="text-danger">*</span> PC MARKS :</b></td>
            <th><input class="form-control" type="number" name="sub_pc_marks" min="0" required="required"
                    placeholder="Ex: 20"
                    value="{{ old('sub_pc_marks') ? old('sub_pc_marks') : (isset($subject) ? $subject->sub_pc_marks : null) }}">
            </th>
            <td><b><span class="text-danger">*</span> PF MARKS :</b></td>
            <th><input class="form-control" type="number" name="sub_pf_marks" min="0" required="required"
                    placeholder="Ex: 20"
                    value="{{ old('sub_pf_marks') ? old('sub_pf_marks') : (isset($subject) ? $subject->sub_pf_marks : null) }}">
            </th>
        </tr>
        <tr>
            <td class="text-right">
                <h5><b><span class="text-danger">*</span> Admin Pin :</b></h5>
            </td>
            <th colspan="3"><input class="form-control" type="password" name="a_tpin" minlength="4" maxlength="4"
                    required="required" placeholder="Enter Admin T-Pin"
                    value="{{ old('a_tpin') ? old('a_tpin') : null }}"></th>
        </tr>
        <tr>
            <th colspan="4">
                <a class="btn  bg-danger" href="{{ route('subjects.index') }}">
                    <i class="fa fa-reply-all"> <b>BACK</b></i>
                </a>
                <input class="pull-right btn btn-default bg-info" type="submit" name="add_sub" value="ADD COURSE">
            </th>
        </tr>

    </table>
</div>

@push('js')
    <script src="{{ asset('js/project-common.js') }}"></script>
    <script>
        if (document.getElementById('prev_sub_dept') != undefined) {
            getTechnologyByProbidhan(document.getElementById('sub_probidhan'), document.getElementById('prev_sub_dept')
                .value, "#tech-list")
        } else {
            getTechnologyByProbidhan(document.getElementById('sub_probidhan'), null, "#tech-list")
        }
    </script>
@endpush
