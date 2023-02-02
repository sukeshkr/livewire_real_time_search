<div>

    @include('livewire.student-modal')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))

                <div class="alert alert-success">{{session('message')}}</div>

                @endif
                <div class="card">

                    <div class="card-header">

                        <h4>Student Crud bootstrap
                            <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#studentModal">
                            Add New Student
                        </button>
                        <div wire:loading wire:target='search' class="spinner-grow spinner-grow-sm text-danger" role="status">
                            <span class="visually-hidden">Loading...</span>
                          </div>
                        <div wire:loading wire:target='search' class="spinner-grow spinner-grow-sm text-warning" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div wire:loading wire:target='search' class="spinner-grow spinner-grow-sm text-info" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        </h4>
                        <hr>

                        <input type="text" wire:model="search" placeholder="Search Here" class="form-control"/>
                        <hr>

                        <select wire:model="perPage">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Course</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $student)
                                <tr>
                                    <td>{{$student->id}}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->course}}</td>
                                    <td>
                                        <a href="#" class="btn btn-info" wire:click="editStudent({{$student->id}})" data-bs-toggle="modal" data-bs-target="#editStudentModal">Edit</a>
                                        <a href="" class="btn btn-danger" wire:click="deleteStudent({{$student->id}})" data-bs-toggle="modal" data-bs-target="#deleteStudentModal">Delete</a>
                                    </td>
                                </tr>

                                @empty
                                <tr>
                                    <td colspan="4">No data</td>
                                </tr>

                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    {{$students->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
