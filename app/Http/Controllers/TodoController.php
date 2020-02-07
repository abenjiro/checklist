<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Checklist;
use Response;
use Validator;
use Illuminate\Support\Facades\Storage;

class TodoController extends Controller
{


    public function index()
    {
    	$checklist = Checklist::orderBy('id', 'desc')
                    ->where('user_id', auth()->id())
                    ->whereDate('created_at',Carbon::today())
                    ->paginate(5);
    	//dd($checklist);

        $totalList = Checklist::where('user_id', auth()->id())
                    ->whereDate('created_at',Carbon::today())     
                    ->count();
        //dd($totalList);
        $completedList = Checklist::where('user_id', auth()->id())
                    ->whereDate('created_at',Carbon::today()) 
                    ->where('iscompleted' , 1)    
                    ->count();
        //($completedList);
        //s3 storage:
        $st = Storage::disk('s3')->allFiles('');
        // dd($st);
    	return view('todo.index', compact('checklist', 'totalList' , 'completedList', 'st'));
    }

    public function downloadAsset($filename)
    {
        // $asset = Asset::find($id);
        $assetPath = Storage::disk('s3')->url($filename);

        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=" . basename($assetPath));
        header("Content-Type: " . $filename);

        return readfile($assetPath);
    }

    public function history()
    {
        $checklist = Checklist::orderBy('id', 'desc')
                       ->where('user_id', auth()->id())
                       ->whereMonth('created_at',Carbon::now()->format('m'))
                       ->paginate(10);
        //dd($checklist);
        $totalList = Checklist::where('user_id', auth()->id())
                    ->whereMonth('created_at',Carbon::now()->format('m'))     
                    ->count();

         $completedList = Checklist::where('user_id', auth()->id())
                    ->whereMonth('created_at',Carbon::now()->format('m'))
                    ->where('iscompleted' , 1)    
                    ->count();
        //($completedList);
        return view('todo.history', compact('checklist', 'totalList', 'completedList'));
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

    public function checkBox(Request $request,$id)
    {
        $checklist = Checklist::findOrFail($request->id);
        if ($checklist->iscompleted == 1) {
            $checklist->iscompleted = 0;
        }else{
            $checklist->iscompleted = 1;
        }
        return response()->json([
            'data' => [
                'success' => $checklist->save(),
            ]
        ]);
    }

    public function destroy(Request $request ,$id)
    {
        $checklist = Checklist::find($id);
        $checklist->delete();

        return response()->json($checklist);
    }
}
