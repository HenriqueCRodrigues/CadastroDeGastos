<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Session;
use Validator;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;

use Jrean\UserVerification\Facades\UserVerification;
use Jrean\UserVerification\Traits\VerifiesUsers;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    use VerifiesUsers;
    
    
    protected $redirectPath = '/';
    protected $loginPath    = 'login';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest', ['except' => 'getLogout']);
        $this->middleware('guest', ['except' => ['getLogout', 'getVerification', 'getVerificationError']]);
    }

    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = $this->create($request->all());

        // Authenticating the user is not mandatory at all.
        Auth::login($user);

        UserVerification::generate($user);

        UserVerification::send($user, 'Validação de Cadastro');

        return redirect($this->redirectPath());
    }


    public function getLogout()
    {
        Auth::logout();
        Session::flush();

        return redirect('/');
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
            'name'                  => 'required|max:255',
            'login'                 => 'required|max:30|unique:users',
            'email'                 => 'required|email|max:100|unique:users',
            'password'              => 'required|min:4',
            ],
            

            [
            'name.required'                   => 'É obrigatório inserir o Nome',
            'name.max'                        => 'O nome deve ter no maximo :max caracteres',
            
            'email.required'                  => 'É obrigatório inserir o Email.',
            'email.email'                     => 'Inserir formato de email correto, EX: exemplo@domain.com.',
            'email.max'                       => 'O Email deve ter no maximo :max caracteres.',
            'email.unique'                    => 'Não pode haver Email Iguais, digite outro por favor.', 

            'login.required'                  => 'É obrigatório inserir o Login',
            'login.max'                       => 'O Login deve ter no maximo :max caracteres',
            'login.unique'                    => 'Não pode haver Logins Iguais, digite outro por favor.',
            
            'password.required'               => 'É obrigatório inserir a Senha',
            'passaword.min'                   => 'Digitar ao menos :min caracteres para a sua senha',

            
            ]


            );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        
        return User::create([
            'name'     => $data['name'],
            'login'    => $data['login'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
