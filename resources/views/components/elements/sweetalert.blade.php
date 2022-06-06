@if (isset($errors) && $errors->any())
    @php
        $error_msg = '';
    @endphp
    @foreach ($errors->all() as $error)
        @php
            $error_msg .= "<div>{$error}</div><br/>";
        @endphp
    @endforeach
    @push('js')
        <script>
            sweetAlertToast('{!! $error_msg !!}', 'error')
        </script>
    @endpush
@endif
@if (session('success'))
    @php
        $msg = session('success')."<br/>";
    @endphp
    @push('js')
        <script>
            sweetAlertToast('{!! $msg !!}', 'success')
        </script>
    @endpush
@endif
@if (session('error'))
    @php
        $msg = session('error');
    @endphp
    @push('js')
        <script>
            sweetAlertToast('{!! $msg !!}', 'error')
        </script>
    @endpush
@endif
