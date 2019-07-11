<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/admin';

    /**
     * Only administartor authorize to access this section.
     *
     * @var string
     */
    protected $guard = 'admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request) {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember') ? true : false;

        $rules = [
            'email' => ['required', 'string', 'email', 'exists:admins,email,deleted_at,NULL'],
            'password' => ['required', 'string', 'min:8']
        ];

        $attributeNames = [
            'email' => 'อีเมล',
            'password' => 'รหัสผ่าน'
        ];

        $validator = Validator::make($credentials, $rules);
        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }
        else {
            if (Auth::guard($this->guard)->attempt($credentials, $remember)) {
                return redirect()->action('Admin\HomeController@index');
            }
            else {
                return redirect()->back()
                    ->withErrors(['password' => trans('auth.failed')])
                    ->withInput($request->except('password'));
            }
        }
    }
}
