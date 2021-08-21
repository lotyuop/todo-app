@extends('layouts.main')




@section('content')


    <div class="row my-4" style="padding: 20px; margin: auto">
        <div class="col-md-9 mt-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Task Details</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group"  style="text-transform: capitalize">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-3 text-md">{{$task->task}}</h6>
                                <span class="mb-2 text-sm">Start Date: <span class="text-dark font-weight-bold ms-sm-2">{{$task->start_date}}</span></span>
                                <span class="mb-2 text-sm">Priority: <span class="text-dark ms-sm-2 font-weight-bold">{{$task->priority}}</span></span>
                                <span class="text-sm">Current Status: <span class="text-dark ms-sm-2 font-weight-bold">{{$task->status}}</span></span>
                            </div>
                            <div class="ms-auto text-end">
                                <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{route('droptask',[$task->id])}}"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                <a class="btn btn-link text-info px-3 mb-0" href="{{route('changestatus',['id'=>$task->id,'status'=>'Ongoing'])}}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Ongoing</a>
                                <a class="btn btn-link text-warning text-gradient px-3 mb-0" href="{{route('changestatus',['id'=>$task->id,'status'=>'Finished'])}}"><i class="far fa-trash-alt me-2"></i>Finished</a>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-3 text-md">Task Description</h6>
                                <span class="mb-2 text-sm">{{$task->description}}</span>
                            </div>

                        </li>

                    </ul>
                </div>
            </div>
        </div>


    </div>


@endsection

