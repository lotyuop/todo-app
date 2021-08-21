@extends('layouts.main')

@section('css')
    <link id="pagestyle" href="{{asset('css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" />
@endsection


@section('content')


    <div class="row my-4" style="padding: 20px; margin: auto">

        <div class="col-12 col-xl-4" style="margin-left: 30%">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-10 d-flex align-items-center">
                            <h6 class="mb-0">Add Task</h6>
                        </div>

                    </div>
                </div>
                <div class="card-body p-3">


                    <form role="form text-left" method="post" action="{{route('addtask')}}">
                        @csrf
                        @if(session()->has('error'))
                            <div class="text-center alert alert-warning"><i class="fa fa-times-circle-o"></i> {{session()->get('error')}}</div>
                        @endif
                        <div class="mb-3">
                            <input type="text" class="form-control" maxlength="30" placeholder="task" aria-label="Task Name" name="task">
                        </div>
                        <div class="mb-3">
                            <input type="text" id="sdate" class="form-control" placeholder="Start Date" name="sdate">
                        </div>
                        <div class="mb-3">
                            <select class="form-control" name="priority">
                                <option value="important">Important</option>
                                <option value="very important">Very Important</option>
                                <option value="Top Priority">Top Priority</option>
                            </select>
                             </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="description" placeholder="description"></textarea>

                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Add</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>


    </div>


@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script>
$("document").ready(function () {
    $('#sdate').datepicker({
        format: 'yyyy-mm-dd',
    });
})

    </script>
@endsection
