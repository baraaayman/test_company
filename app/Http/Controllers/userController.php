<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('all_user',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();
        return view('create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password' => ['required','min:8'],

        ]);


        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password' => Hash::make($request['password']),
        ]);

               return redirect()->route('user.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        $url = route('user.show', $user);
        $user->qr_code=$url;
       $user->save();
    $qrCode = QrCode::size(300)->generate($url);

    return view('show_user', compact('user','qrCode'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findorfail($id);
        // dd($user->name);
        return view('edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password' => ['required','min:8'],
        ]);

        $user = User::findorfail($id);

        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password' => Hash::make($request['password']),
        ]);

        // dd($request->all());
        return redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findorfail($id);
        $user->delete();

        return redirect()->route('user.index');
    }


    public function activate(User $user)
    {
        $user->active = true;
        $user->save();

        return redirect()->back();
    }

    public function deactivate(User $user)
    {
        $user->active = false;
        $user->save();

        return redirect()->back();
    }


}
