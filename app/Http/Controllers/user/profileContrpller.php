<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;


class profileContrpller extends Controller
{
//_________________________________________________________________________
    public function index()
    {
        $user = User::all();
        return response ()->json($user);
    }

    //______________________________________________________________________

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=> 'nullable|email',
            'password'=>'nullable|string',
            'phone'=>'nullable|numeric',
        ]);
        $user = User::find($id);
        $user->update($request->all());
        return response()->json($user);
        
    }

//____________________________________________________________________________
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['msg'=>'deleted']);
    }


    public function changepassword(request $request){
    $user=  Auth::user();
$validated=$request->validate([
    'current_password' => 'required|string',
    'new_password' => 'required|string|min:6',
]);
if(!$user||!Hash::check($validated['current_password'], $user->password)){
return response()->json(['msg'=> 'error']);
}
$user->password= Hash::make($validated['new_password']);
$user->save();
return response()->json(['msg'=> 'changed successfully']);
}
}

//___________________________________________________________________________
