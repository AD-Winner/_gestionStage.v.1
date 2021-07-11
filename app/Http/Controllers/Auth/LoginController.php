<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   protected $redirectTo = RouteServiceProvider::HOME;
    //protected $redirectTo = '/';
    protected $redirectToAdmin = RouteServiceProvider::HOMEADMIN;
    protected $redirectToUser = RouteServiceProvider::HOMEUSER;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user){
        if($user->profil=='Administrateur'){
           // return RouteServiceProvider::HOMEADMIN;
           return redirect()->route('admin-accueil');
        }else
        if($user->profil=='Etudiant'){
            return redirect()->route('etudiant-accueil');
        }else{
            return redirect()->route('login');
        }

         /*function redirectTo(){
            if(Auth::user()->pluck('profil')->contains(' Administrateur')){
                //  return  RouteServiceProvider::HOMEADMIN;
           return '/admin';
             }elseif(Auth::user()->pluck('profil')->contains('User')){
            //return  RouteServiceProvider::HOMEUSER;
             return '/user';
            }else{
            return '/';
         }
          }
          */
}
    
    
    /*protected function authenticated(Request $request, $user){

        //dd($user);
        if($user->name=='Administrateur'){
            return RouteServiceProvider::HOMEADMIN;
            //return redirect()->route('home-admin');
        }
        if($user->name=='User'){
            //return redirect()->route('home-user');
            return  RouteServiceProvider::HOMEUSER;
        }
        /* if($user->hasRole(['user','directeur','president'])){
            
        }*/
   // }
    
   /* protected function redirectTo(Request $request, $user){
        
        if($user->name=='Administrateur'){
            RouteServiceProvider::HOMEADMIN;
        }
        if($user->name=='User'){
            return  RouteServiceProvider::HOMEUSER;
        }
    }
    */
}
