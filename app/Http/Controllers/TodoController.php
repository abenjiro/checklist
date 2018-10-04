<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Checklist;
use Response;
use Validator;

class TodoController extends Controller
{


    public function index()
    {
    	$checklist = Checklist::orderBy('id', 'desc')->where('user_id', auth()->id())->whereDate('created_at',Carbon::today())->paginate(5);
    	//dd($checklist);
    	return view('todo.index', compact('checklist'));
    }

    public function history()
    {
        $checklist = Checklist::orderBy('id', 'desc')->where('user_id', auth()->id())->whereMonth('created_at',Carbon::now()->format('m'))->paginate(10);
        //dd($checklist);
        return view('todo.history', compact('checklist'));
    }


    public function  addTask(Request $request)
    {
    	$rules = array(
    		'body' => 'required',
    	);
    	$validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $checklist = new Checklist;
            //dd($checklist);
            $checklist->user_id = auth()->id();
            $checklist->body = $request->body;
            
            $checklist->save();
            return response()->json($checklist);
        }
    }


    public function update(Request $request, $id)
    {
        $checklist = Checklist::find($request->id);
        $checklist->body = $request->body;
        $checklist->save();

        return response()->json($checklist);
    }

    public function destroy(Request $request ,$id)
    {
        $checklist = Checklist::find($id);
        $checklist->delete();

        return response()->json($checklist);
    }
}
