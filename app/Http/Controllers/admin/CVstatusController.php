<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CVstatus;
use App\Models\UserCV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CVstatusController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'status' => 'required',
//                Rule::in(['shortlisted', 'First Interview' ,
//                            'second interview' , 'Hired', 'Rejected ','Black listed']),
            'task' => 'nullable',
            'interview_date' => 'nullable',
        ]);

        if( $request->file('task'))
        {
            $task = $request->file('task');
            $ext = $task->getClientOriginalExtension();
            $taskname = time().".".$ext;
            $store = $task->storeAs('images/task', $taskname);
        }else{
            $taskname = '';
        }

        //upsert - making optimized code
        CVstatus::updateOrCreate(
            ['usercv_id' => $request->id],
            [
            'status' => $request->status,
            'interview_date' => $request->interview_date,
            'task' => $taskname,
            ]
        );

//    // let's check if db already have the user column
//        $checkuser = CVstatus::where('usercv_id', $request->id)->exists();
//
//      if(!$checkuser){
//        $user = new CVstatus();
//        $user->usercv_id = $request->id;
//        $user->status = $request->status;
//        $user->interview_date = $request->interview_date;
//        $user->task = $taskname;
//
//        $user->save();
//        }
//
//        if user exists update the model
//    $userupdate = CVstatus::where('usercv_id', $request->id)->first();
//        $userupdate->update([
//              'status' => $request->status,
//                'interview_date' => $request->interview_date,
//                'task' => $taskname
//            ]);

//for mail
        $user= UserCV::where('id', $request->id)->first();
        $usercv = CVstatus::where('usercv_id', $request->id)->first();

//        mail when hired
        if($usercv->status == 'Hired'){

            $detials = [
                'user' => $user->name,
                'technology'=> $usercv->technology,
            ];

            Mail::to($user->email)->send(new \App\Mail\hiredMail($detials));
        }

//        mail on the admin updates the details
        $detials = [
            'user' => $user->name,// find and place a username
            'status' => $request->status ?? 'in process',
            'task' => $usercv->task ?? 'nothing',
            'interview_date' => $request->interview_date,
        ];

        Mail::to($user->email)->send(new \App\Mail\cvtaskmail($detials));

//        return redirect()->back();

     return response()->json('user is inserted', '200');
    }
}
