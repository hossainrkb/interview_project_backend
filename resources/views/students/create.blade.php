<x-layouts.master>
    <x-elements.sweetalert/>
    <x-slot name="body">
        @include('students.header', [
            'heading' => 'REGISTER NEW STUDENTS',
            'sub_head' => "NEW STUDENT'S REGISTRATION",
            'sub_head_first' => '<a href="view_courses.php">
                                    <button type="button" class="btn btn-default bg-danger ">
                                        <i class="fa fa-home"> <b>HOME</b></i>
                                    </button>
                                    </a>',
            'sub_head_second' => '<a href="view_courses.php">
                                    <button type="button" class="btn bg-info">
                                        <i class="fa fa-home"> <b>STUDENT STATUS</b></i>
                                    </button>
                                    </a>',
        ])
            <div class="row mt-0">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('students.form',[
                                    'title' => 'Academic Information'
                                ])
                            </form>
                        </div>
                    </div>
                   
                </div>
            </div>
    </x-slot>
</x-layouts.master>
