<x-layouts.master>
    <x-elements.sweetalert/>
    <x-slot name="body">
        @include('subjects.header', [
            'heading' => 'Add Course',
        ])
            <div class="row mt-0">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('subjects.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('subjects.form',[
                                    'title' => 'Enter Courses Information Below'
                                ])
                            </form>
                        </div>
                    </div>
                   
                </div>
            </div>
    </x-slot>
</x-layouts.master>
