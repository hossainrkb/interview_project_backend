<x-layouts.master>
    <x-elements.sweetalert />
    <x-slot name="body">
        @include('technology.header', [
            'heading' => 'COURSE PANEL',
            'sub_head' => 'COURSES MANAGEMENT',
            'sub_head_first' => '<a href="view_courses.php">
                                    <button type="button" class="btn btn-default bg-danger ">
                                        <i class="fa fa-home"> <b>HOME</b></i>
                                    </button>
                                    </a>',
            'sub_head_second' => '<a href="view_courses.php">
                                    <button type="button" class="btn bg-info">
                                        <i class="fa fa-home"> <b>ADD NEW COURSES</b></i>
                                    </button>
                                    </a>',
        ])
        <div class="row mt-0">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header text-center">
                        <h3><b><i class="fa fa-list-alt"></i> COURSE STRUCTURE BY REGULATION</b></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @forelse ($probidhans as $probidhan)
                                <div class="col-md-6">
                                    <div class="{{ $loop->iteration == 1 ? 'small-box bg-info' : 'small-box bg-success' }}">
                                        <div class="inner">
                                            <h3><b>{{ $probidhan->pro_name }} PROBIDHAN</b></h3>
                                            <p><b>Course Structure</b></p>
                                        </div>
                                        <div class="icon" style="color: #fff">
                                            <i class="fa fa-book fa-5x"></i>
                                        </div>
                                        <a href="{{ route('probidhan.technology.show', ['probidhan' => $probidhan->pro_id]) }}"
                                            class="small-box-footer text-left p-2">
                                            <b>View Details</b> <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </x-slot>
</x-layouts.master>
