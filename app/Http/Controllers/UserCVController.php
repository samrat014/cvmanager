<?php

namespace App\Http\Controllers;

use App\Models\CVstatus;
use App\Models\User;
use App\Models\UserCV;
use App\Http\Requests\StoreUserCVRequest;
use App\Http\Requests\UpdateUserCVRequest;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserCVController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $usercv = CVstatus::all();
        return response()->json($usercv);

//        return view('index');
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
    $usercv->age = $request->age;
    $usercv->email = $request->email;
    $usercv->phone = $request->phone;
    $usercv->technology = $request->technology;
//    $usercv->level = $request->level;
//    $usercv->salary = $request->salary;
    $usercv->experience = $request->experience;
//    $usercv->document = $docname;
//    $usercv->references = $request->references;
    $usercv->address= $request->address;

    $usercv->save();

//    dd('done');
//    return redirect('index')->with('your cv has been added');

        // for blade
//        return redirect()->back()->with('error', 'Please fill in the text field.');

    //for api
        return response()
                ->json($usercv);

    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $cv = UserCV::findorfail($id);
//            ->with('cvstatus');

        $cvstatus = $cv->CVstatus;

//  return view('usercvcontroller', compact( 'cv', 'cvstatus'));

        //api
        return response()->json($cv);

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

        $userCVs = UserCV::orderBy('id', 'desc')->get();

//         dd($userCVs);
//        return view('dashboard',
//         ['userCVs' => $userCVs]
//        );

        return response()->json($userCVs);

    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);


        $user = User::where('email', $data['email'])->first();
    $password = ($data['password'] == $user->password);
        if (!$user || !$password) {
            return response([
                'msg' => 'incorrect username or password'
            ], 401);
        }

        $token = $user->createToken('apiToken')->plainTextToken;

        $res = [
            'user' => $user,
            'token' => $token
        ];

        return response($res, 201);
    }

}
