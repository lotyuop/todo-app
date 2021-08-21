<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

   public function createtask(Request $request){
       $validator = Validator::make($request->all(), [
           'task' => 'required|max:30',
           'description' => 'required',
           'sdate' => 'required|date',
           'priority' => 'required',
       ]);

       if ($validator->fails()) {
           Session::flash('error', $validator->messages()->first());
           return redirect()->back()->withInput();
       }
       if (Task::where(['task'=>$request->task,'start_date'=>$request->sdate])->doesntExist()){
       Task::create([
           'user'=>$request->user()->id,
           'task'=>$request->task,
           'description'=>$request->description,
           'start_date'=>$request->sdate,
           'priority'=>$request->priority,
           'status'=>'Not Done'
       ]);
           return redirect()->route('dashboard');
       }else{
           Session::flash('error', "A task with this same name already exist for today");
           return redirect()->back()->withInput();
       }

   }

   function listtask(Request $request,$date){
        $tlist=Task::where(['user'=>$request->user()->id,'start_date'=>$date])->get();
        return view('',['task'=>$tlist]);
   }
    function alltask(Request $request){
        $tlist=Task::where(['user'=>$request->user()->id])->get();
        return view('dashboard',['task'=>$tlist]);
    }
    function changestatus($id,$status){
        $t=Task::find($id);
        $t->status="$status";
        $t->save();
        return redirect()->route('viewone',[$id]);
    }

    function droptask(Request $request,$id){
        Task::destroy($id);
        $tlist=Task::where(['user'=>$request->user()->id])->get();
        return redirect()->route('dashboard');
    }
}
