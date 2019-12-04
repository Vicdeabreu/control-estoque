<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite; // Necesita traer el socialite para poder trabajar
use App\User;
use Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect(); // Socialite fue creado para conectar con cualquier red social, driver dice cuál es la red social a conectar
    }
    // Luego, necesitas crear una ruta para esos datos que recives de Google
    public function receiveDataGoogle(){
        $userGoogle = Socialite::driver('google')->user();
        $userDb = $this->findOrCreateUser($userGoogle);

        Auth::login($userDb, true);
        // La Clase Auth tiene otro método, llamado Login, que loga el usuario y lo deja logado (true)
        return redirect($this->redirectTo);
    }

    public function findOrCreateUser($userGoogle){
        // Find es vía id, where es via cualquier otro campo
        $user = User::where('email', $userGoogle->email)->first();
        // Compara el email de la base de datos con el que manda Google
        if($user){
            return $user;
        }

        $newUser = new User();
        $newUser->name = $userGoogle->name;
        $newUser->email = $userGoogle->email;
        $newUser->img_profile = $userGoogle->avatar;
        $newUser->provider_id = $userGoogle->id;
        $newUser->active = 1;

        $newUser->save();

        return $newUser;
    }
}
