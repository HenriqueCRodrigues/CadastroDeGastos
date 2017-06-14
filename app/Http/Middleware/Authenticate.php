<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Auth;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\DB;

class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        
            if(Auth::check())
            {
                $id = Auth::user()->id;

                if(!Session::get('user.saldo') || !Session::get('user.id') || Session::get('user.saldo') == '' || Session::get('user.id') == '' || Session::get('user.id') != $id)
                {
                    $totalExpenses = DB::table('expenses')->where('user_id', $id)->sum('value');
                    $totalRecipes  = DB::table('recipes')->where('user_id', $id)->sum('value');

                    Session::put('user.saldo', $totalRecipes-$totalExpenses);
                    Session::put('user.id', $id);
                }
            }
        
            $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }

        return $next($request);
    }
}
