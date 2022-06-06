<div class="table-responsive">
    <table class="table  table-striped table-bordered text-right table-sm">
        <thead>
            <tr class="btn-info">
                <th colspan="4" class="text-left"><i class="fa fa-info-circle"></i> {{ $title }}</th>
            </tr>
        </thead>
        <tr>
            <td class="text-right">
                <b><span class="text-danger">*</span> SHIFT :</b>
            </td>
            <th>
                <select name="s_shift" class="form-control" required="required" onChange="getShift(this.value);">
                    <option value="">SELECT SHIFT</option>
                    @forelse ($shifts as $key=> $value)
                        @if (old('s_shift') && old('s_shift') == $key)
                            <option value="{{ $key }}" selected>{{ $value }}
                            </option>
                        @elseif (isset($subject) && $subject->s_shift == $key)
                            <option value="{{ $key }}" selected>{{ $value }}
                            </option>
                        @else
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endif
                    @empty
                        <option value="">No Record Found</option>
                    @endforelse
                </select>
            </th>
        </tr>

        <tr>
            <td class="text-right">
                <b><span class="text-danger">*</span> SEMESTER :</b>
            </td>
            <th>
                <select name="s_sem" class="form-control" required="required" onChange="getState(this.value);">
                    <option value="">SELECT SEMESTER</option>
                    @forelse ($sessions as $session)
                    @if (old('s_sem') && old('s_sem') == $session->sec_sem)
                        <option value="{{ $session->sec_sem }}" selected>{{ $session->semester->sem_name }}
                        </option>
                    @elseif (isset($subject) && $subject->s_sem == $session->sec_sem)
                        <option value="{{ $session->sec_sem }}" selected>{{ $session->semester->sem_name }}
                        </option>
                    @else
                        <option value="{{ $session->sec_sem }}">{{ $session->semester->sem_name }} ({{ $session->sec_name }})</option>
                    @endif
                @empty
                    <option value="">No Record Found</option>
                @endforelse
                </select>
            </th>
        </tr>

        <tr>
            <td class="text-right">
                <b><span class="text-danger">*</span> TECHNOLOGY :</b>
            </td>
            <th>
                <select name="s_dept" id="dept-list" class="form-control" required="required"
                    onChange="getDSname(this.value);">
                    <option value="">SELECT TECHNOLOGY</option>
                    <option>Please Select Session First</option>
                </select>
            </th>
        </tr>
    </table>
</div>
