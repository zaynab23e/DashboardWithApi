<?php

namespace App\Http\Controllers\user;


use App\Http\Controllers\Controller;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ResetPass;
use App\Http\Requests\ForgotRequest;
use App\Http\Requests\UserRegister;
use App\Http\Requests\UserLogin;
class AuthController extends Controller {
    public function register(UserRegister $request){
        $validatedData= $request->validated();
        $user=User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone'=> $validatedData['phone'],
            'password'=>Hash::make($validatedData['password']),
        
            
        ]);
        return response()->json(['msg'=>'sucessfully']);
    }


public function login(UserLogin $request){
    $user = User::where('email', $request->input('email'))->first();
    if (! $user || ! Hash::check($request->input('password'), $user->password)) {
        return response()->json(['msg' => 'error']);
    }
    $token = $user->createToken('api of token', [$user->name])->plainTextToken;
    return response()->json(['token' => $token]);
}


public function logout(){
    $user= Auth::user();
    
Auth::logout();
    return response()->json(['msg'=>'deleted successfully']);
}


public function forgotPassword(ForgotRequest  $request){
$validatedData=$request->validated();
$user= User::where('email',$request->email)->first();
if(! $user){
    return response()->json(['msg'=>'error']);

}
$code= mt_rand(10000,999999);
DB::table('password_reset_tokens')->updateOrInsert(['email'=>$request->email],['token'=>$code,'created_at'=>now()]);

Mail::raw("Your password reset code is: $code", function ($message) use ($user) {
    $message->to($user->email)
        ->subject('Password Reset Code');
});


return response()->json([
    'message' =>  'reset code sent to you',
]);    }


public function resetPassword(ResetPass  $request){

    $validatedData=$request->validated();
    $reset = DB::table('password_reset_tokens')->where('email', $request->email)->where('token', $request->code)->first();

    
    if (!$reset) {
        return response()->json([ 'message' => 'Invalid code',]);  
    }
    
    $user = User::where('email', $request->email)->first();
    $user->password = Hash::make($request->password);
    $user->save();



    DB::table('password_reset_tokens')->where('email', $request->email)->delete();
    return response()->json([
        'message' => 'reset successfully',
    ]);


}


public function verifyEmail(Request $request){

    $request->validate([
        'email' => 'required|email',
        'verification_code' => 'required|numeric',
    ]);

    $user = User::where('email', $request->email)
                ->where('verification_code', $request->verification_code)

                
                ->first();

    if (!$user) {
        return response()->json( 'Invalid verification code or email', 400);
    }

    $user->verified_at = now();
    $user->verification_code = null;
    $user->save();

    return response()->json(['message' => 'Email verified successfully']);

}


}







