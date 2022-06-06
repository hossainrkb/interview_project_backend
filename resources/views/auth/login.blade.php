<x-layouts.guest>
    <x-elements.sweetalert/>
    <x-slot name="body">
        <div class="row">
            <div class="col-md-5 m-auto">
                <div class="card card-info" style="height: 97.5vh;">
                    <div class="card-header text-center text-white">
                        <img class="img img-thumbnail img-rounded"
                            src="{{ asset(config('settings.institute_logo_path')) }}" alt="Logo" width="100" />
                        <h4><b>{{ config('settings.institute_name') }}</b></h4>
                        <hr class="bg-white">
                        <h5 class="text-center"><b>{{ __('Login') }}</b></h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><b><i class="fa fa-user"></i> &nbsp;
                                            {{ __('USERNAME') }}</b></span>
                                </div>
                                <input name="email" placeholder="Enter Username or Email Address" id="input-username"
                                    class="form-control" type="text" autofocus="off" required />
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><b><i class="fa fa-lock"></i> &nbsp;
                                            {{ __('PASSWORD') }}</b></span>
                                </div>
                                <input name="password" minlength="8" placeholder="Enter Password" id="input-password"
                                    class="form-control" type="password" required />
                            </div>
                            <div class="text-right mb-3">
                                <button type="submit" name="login" class="btn btn-info btn-block"><i
                                        class="fa fa-key">
                                        <b>{{ __('LOGIN') }}</b></i></button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer bg-info">
                        <div class="text-center">
                            <small><b>Copyright {{ date('Y') }} &copy; {!! config('settings.copyright') !!}
                                    <br />@Support by : {!! config('settings.support_by') !!} , @Developed by:
                                    {!! config('settings.develop_by') !!}</b></small>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-layouts.guest>
