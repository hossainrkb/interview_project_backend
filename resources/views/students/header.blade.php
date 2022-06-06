<div class="row">
    <div class="col-md-12 mt-2">
        <div class="card card-info mb-1">
            <div class="card-header text-center text-white">
                <h4 class="text-center"><b>{{ $heading }}</b></h4>
            </div>
            <div class="card-body">
                <img class="img img-thumbnail" src="{{ asset(config('settings.heading_image_path')) }}" width=100%
                    height=100% />
            </div>
            @if (isset($sub_head) && strlen($sub_head))
            <div class="card-footer">
                <div class="row">
                    <div class="{{  isset($first_sub_col)?$first_sub_col: 'col-md-3' }}">
                        {!! $sub_head_first !!}
                    </div>
                    <div class="{{ isset($second_sub_col)?$second_sub_col:'col-md-6 text-center' }}">
                        <h5 class="text-info"><b>{{ $sub_head }}</b></h5>
                    </div>

                    <div class="{{ isset($third_sub_col)?$third_sub_col:'col-md-3 text-right' }}">
                        {!! $sub_head_second !!}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
