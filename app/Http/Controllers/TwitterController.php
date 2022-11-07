<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Socialite;
use Illuminate\Support\Facades\Hash;


class TwitterController extends Controller
{
  // ログイン
  public function redirectToProvider(){
      return Socialite::driver('twitter')->redirect();
  }

  // コールバック
  public function handleProviderCallback(){
      try {
          $twitterUser = Socialite::driver('twitter')->userFromTokenAndSecret(env('TWITTER_ACCESS_TOKEN'), env('TWITTER_ACCESS_TOKEN_SECRET'));
          //$twitterUser = Socialite::driver('twitter')->user();
      } catch (Exception $e) {
          return redirect('/');
      }
      // ログイン処理
      $user = User::where('t_id', $twitterUser->id)->first();
      if (!$user) {
       User::create([
           't_id' => $twitterUser->id,
           'username' => $twitterUser->nickname,
           'name' => $twitterUser->name,
           'password' => Hash::make('pass'),
           'email' => $twitterUser->email,
           'points' => 0,
       ]);
       //$user->save();
       $user = User::where('t_id', $twitterUser->id)->first();
       Auth::login($user);
       $user = Auth::id();
       return redirect(url('/auth/twitter_password/{id?}', compact((int)$user)));
       //return redirect(url('/auth/twitter_password', $twitterUser->id));
     }
    Auth::login($user);
    return redirect('/');
  }

  public function twitter_password($user){
    return view('/auth/twitter_password', ['id' => $user]);
  }

  public function twitter_password_register(Request $request){
    $user = Auth::user()->update(['password' => Hash::make($request->password)]);
    //$user = User::where('t_id', $request->id)->first();
    //Auth::login($user);
    return redirect('/');
  }

  /*public function __construct()
  {
    //$this -> middleware('auth');
      //$this->middleware('guest')->except('logout');
  }*/

}
