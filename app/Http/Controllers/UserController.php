<?php


namespace App\Http\Controllers;
use App\Models\Region;
use App\Models\Cercle;
use App\Models\Secteur;
use App\Models\District;
use App\Models\Bureau;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PDF;


class UserController extends Controller
{
    //

    
    public function __construct(){
        $this->middleware('auth');
       // $this->middleware(['user']);
    }

    public function dashboard(){
        $secteurs=Secteur::all();
        $regions=Region::all();
        $cercles=Cercle::all();

        $userC=Cercle::select('cercle')
            ->where('id', Auth::user()->cercle_id)->get();
        $userR=Region::select('region')
            ->where('id', Auth::user()->region_id)->get();
        $userS=Secteur::select('secteur')
            ->where('id', Auth::user()->secteur_id)->get();
        //dd($userC[0]->cercle);

        $userC1=DB::table('cercles')
            ->where('id', Auth::user()->cercle_id)->get();

        return view ('users.home',
            ['secteurs'=>$secteurs,
            'regions'=>$regions,
            'cercles'=>$cercles, 
            'userR'=>$userR,
            'userC'=>$userC,
            'userS'=>$userS]
        );
    }

    public function index(Request $request){
        $p ="";
        $tot = User::count();
        $users = User::orderBy('id','DESC')->paginate(10);
        return view('users.index', ['users'=>$users, 'p'=>$p,'tot'=>$tot]);
    }

    public function create(){
        $secteurs=Secteur::all();
        $regions=Region::all();
        $cercles=Cercle::all();

        return view(
        'users.create', 
        ['secteurs'=>$secteurs,
        'regions'=>$regions,
        'cercles'=>$cercles]
    );
    }

    public function edit($id){
        $user = User::find($id);
        if(!empty($user)){
            $secteurs=Secteur::all();
            $regions=Region::all();
            $cercles=Cercle::all();
            return view('users.edit', [
                'user'=>$user,
                'secteurs'=>$secteurs,
                'regions'=>$regions,
                'cercles'=>$cercles
            ]);
        }else{
            return redirect(route('users-index'));
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'profil' => ['string', 'min:3'],
            'region_id' => ['integer'],
            'cercle_id' => ['integer'],
            'secteur_id' => ['integer'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
        /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function store(Request $request)
    {
            $user = new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->profil=$request->profil;
            $user->region_id=$request->region_id;
            $user->cercle_id=$request->cercle_id;
            $user->secteur_id=$request->secteur_id;
            $user->password= Hash::make($request->password);
            $user->save();
            return redirect(route('user-index'))->with('success', 'Utilisateur ajouté.');
    }
    public function update(Request $request, $id)
    {
        //dd($request);
        $user = User::find($id);
        if(empty($user)){
            return redirect(route('user-index'));
        }
        if($user){
            
            $user->name=$request->name;
            $user->email=$request->email;
            $user->profil=$request->profil;
            $user->region_id=$request->region_id;
            $user->cercle_id=$request->cercle_id;
            $user->secteur_id=$request->secteur_id;
            $user->password= Hash::make($request->password);
            $user->update();
            return redirect(route('user-index'))->with('success', 'Mise à jour effectué.');
            
        }

        
    }
    protected function destroy($id)
    {
        //dd($id);
        User::find($id)->delete();
        return redirect(route('user-index'))->with('success', 'Données suppriméss.');
    }
    
   

}
