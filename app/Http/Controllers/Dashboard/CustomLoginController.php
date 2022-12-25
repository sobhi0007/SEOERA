<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\AdminRequest;
use Auth;
use Hash;
class CustomLoginController extends Controller
{
   public function index()
   {
     return view('auth.login');
   }

   public function checkAdminLogin(AdminRequest $request)
   {
    $validated = $request->validated();

    if (Auth::guard('admin')->attempt(['email' => $validated['email'], 'password' => $validated['password']], $request->get('remember'))) {

        return redirect('/dashboard');
    }
    return back()->withInput($request->only('email', 'remember'))->with('msg','These credentials do not match our records.');
}

public function logout()
{
    Auth::guard('admin')->logout();
    return redirect('dashboard');
}

   
}
