<?php

namespace App\Http\Controllers;

use App\Models\UserCV;
use App\Http\Requests\StoreUserCVRequest;
use App\Http\Requests\UpdateUserCVRequest;
use GuzzleHttp\Psr7\Request;

class UserCVController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserCVRequest $request)
    {
        // dd($request->all());
    $request->validated();

    //   $document = $request->file('document')->storeAs('images', $request->document->getClientOriginalName());

    if($request->hasFile('document')){
        $document = $request->file('document');
        $ext = $document->getClientOriginalExtension();
        $docname = time().".".$ext;
        $store = $document->storeAs('images/cv', $docname);
    }

    $usercv = new UserCV();
    $usercv->name = $request->name;
    $usercv->email = $request->email;
    $usercv->phone = $request->phone;
    $usercv->technology = $request->technology;
    $usercv->level = $request->level;
    $usercv->salary = $request->salary;
    $usercv->experience = $request->experience;
    $usercv->document = $docname;

    $usercv->save();

//    dd('done');
//    return redirect('index')->with('your cv has been added');

        return redirect()->back()->with('error', 'Please fill in the text field.');

    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $cv = UserCV::findorfail($id);
//            ->with('cvstatus');
        $cvstatus = $cv->CVstatus;

  return view('usercvcontroller', compact( 'cv', 'cvstatus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserCV $userCV)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserCVRequest $request, UserCV $userCV)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserCV $userCV)
    {
        //
    }

// for admin
    public function showcv()
    {

        $userCVs = UserCV::all();

        // dd($userCVs);
        return view('dashboard',
         ['userCVs' => $userCVs]
        );

    }
}
