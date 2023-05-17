<?php

namespace App\Http\Controllers;

use App\Models\CVstatus;
use App\Models\User;
use App\Models\UserCV;
use App\Http\Requests\StoreUserCVRequest;
use App\Http\Requests\UpdateUserCVRequest;
//use GuzzleHttp\Psr7\Request;
use Carbon\Carbon;
use http\Env\Response;
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
    $usercv->document = $docname;
//    $usercv->references = $request->references;
    $usercv->address= $request->address;

    $usercv->save();

    $this->createstatus($usercv->id);



//    dd('done');
//    return redirect('index')->with('your cv has been added');

        // for blade
//        return redirect()->back()->with('error', 'Please fill in the text field.');


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

    public function alluser()
    {
        $allstatus  = UserCV::with('cvstatus')
            ->orderBy('id', 'desc')
            ->get();

        return response()->json($allstatus);
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
    public function update(Request $request, $id)
    {

        $usercv = UserCv::findorfail($id);
        if (!$usercv) {
            return response()->json('user not found');
        }
        $docname = $usercv->document;
        if ($request->hasFile('document')) {
            $document = $request->file('document');
            $ext = $document->getClientOriginalExtension();
            $docname = time() . "." . $ext;
            $store = $document->storeAs('images/cv', $docname);
        }

        $usercv->update([
            'name' => $request->name ?? $usercv->name,
            'age' => $request->age ?? $usercv->age,
            'email' => $request->email ?? $usercv->email,
            'technology' => $request->technology ?? $usercv->technology,
            'phone' => $request->phone ?? $usercv->phone,
            'experience' => $request->experience ?? $usercv->experience,
            'document' => $docname ?? $usercv->document,
            'address' => $request->address ?? $usercv->address,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'CV Updated successfully',
            'data' => $usercv
        ], 200);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        UserCV::where('id', $id)->delete();

        return response()->json([
                'message' => 'selected application deleted successfully '
        ],200);
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

    public function sign_up(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        $token = $user->createToken('apiToken')->plainTextToken;
        $res = [
            'user' => $user,
            'token' => $token
        ];
        return response($res, 201);

    }

    public function showUsers()
    {
        $AllUsers = User::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Users Data Retrived successfully',
            'data' => $AllUsers
        ], 200);
    }

    public function createstatus($id)
    {
        CVstatus::Create([
                'usercv_id' => $id,
                'status' => 'not-shortlisted',
                'interview_date' => Carbon::now(),
            ]
        );
    }

}
