<x-layouts.master>
    <x-elements.sweetalert />
    <x-slot name="body">
        @include('technology.header', [
            'heading' => 'COURSE PANEL',
            'sub_head' => 'COURSES MANAGEMENT',
            'first_sub_col'=> "col-md-4",
            'second_sub_col'=> "col-md-4 text-center",
            'third_sub_col'=> 'col-md-4 text-right',
            'sub_head_first' => '<a href="view_courses.php">
                                    <button type="button" class="btn btn-default bg-danger ">
                                        <i class="fa fa-reply-all"> <b>BACK</b></i>
                                    </button>
                                    </a>',
            'sub_head_second' => '<a href="view_courses.php">
                                    <button type="button" class="btn bg-info">
                                        <i class="fa fa-list"> <b>COURSES LIST ( PROBIDHAN-'.$probidhan->pro_name.'  )</b></i>
                                    </button>
                                    </a>',
        ])
        <div class="row mt-0">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header text-center">
                        <h3><b><i class="fa fa-list-alt"></i> COURSE STRUCTURE OF PROBIDHAN
                                ({{ $probidhan->pro_name ?? null }})</b></h3>
                    </div>
                    @php
                        $color = ['info', 'warning', 'danger', 'info', 'success', 'primary', 'success', 'danger', 'primary', 'info', 'success', 'danger'];
                    @endphp
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title"><b><i class="fa fa-book"></i> DEPARTMENT
                                                COURSES</b></h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                                    class="fas fa-expand"></i>
                                            </button>
                                        </div>
                                        <!-- /.card-tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        @forelse ($technologies as $key=> $technology)
                                            <div>
                                                <a href="{{ route('probidhan.technology.subject',['probidhan'=>$probidhan->pro_id,'technology'=>$technology->d_id]) }}"
                                                    class="btn btn-block bg-{{ $color[$key] ?? $color[0] }} mb-1">{{ $technology->d_name ?? null }} ({{ $technology->d_code ?? null }})</a>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title"><b><i class="fa fa-book"></i> COURSE
                                                STRUCTURE</b></h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                                    class="fas fa-expand"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @forelse ($technologies as $key=> $technology)
                                            <div>
                                                <a href="{{ route('probidhan.technology.subject.semester',['probidhan'=>$probidhan->pro_id,'technology'=>$technology->d_id]) }}"
                                                    class="btn btn-block bg-{{ $color[$key] ?? $color[0] }} mb-1">{{ $technology->d_name ?? null }} ({{ $technology->d_code ?? null }})</a>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>






                    </div>
                </div>

            </div>
        </div>
    </x-slot>
</x-layouts.master>
