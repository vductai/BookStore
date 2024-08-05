<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    // admin
    public function loginViewAdmin(){
        return view('admin.account.loginAdmin');
    }

    public function loginAdmin(Request $request){
        $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'regex:/[a-z]/',
//                'regex:/[A-Z]/',
//                'regex:/[0-9]/',
//                'regex:/[@$!%*#?&]/'
                ]
            ],
            [
                //
                'email.required' => 'Địa chỉ email là bắt buộc.',
                'email.regex' => 'Địa chỉ email không hợp lệ.',
                'email.email' => 'Địa chỉ email không hợp lệ.',
                //
                'password.required' => 'Mật khẩu là bắt buộc.',
                'password.string' => 'Mật khẩu phải là chuỗi ký tự.',
                'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
                'password.regex' => 'Mật khẩu phải chứa ít nhất một chữ thường, một chữ hoa, một chữ số và một ký tự đặc biệt.'
            ]
        );
        $loginCustomers = $request->only('email', 'password');

        if (Auth::attempt($loginCustomers)) {
            $user = Auth::user();
            if ($user->id_role == '2'){
                return redirect()->route('admin.index');
            }else if ($user->id_role == '1'){
                return redirect()->back()->with('errorLoginAdmin', 'Tài khoản này không đủ thẩm quyền');
            }
            $request->session()->regenerate();
        } else {
            return redirect()->back()->with('errorLogin', 'Tài khoản hoặc mật khẩu không chính xác');
        }
    }


    public function logoutAdmin(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('client.page.home');
    }
    // dang nhap
    public function loginView()
    {
        return view('client.page.account.login');
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'regex:/[a-z]/',
//                'regex:/[A-Z]/',
//                'regex:/[0-9]/',
//                'regex:/[@$!%*#?&]/'
                ]
            ],
            [
                //
                'email.required' => 'Địa chỉ email là bắt buộc.',
                'email.regex' => 'Địa chỉ email không hợp lệ.',
                'email.email' => 'Địa chỉ email không hợp lệ.',
                //
                'password.required' => 'Mật khẩu là bắt buộc.',
                'password.string' => 'Mật khẩu phải là chuỗi ký tự.',
                'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
                'password.regex' => 'Mật khẩu phải chứa ít nhất một chữ thường, một chữ hoa, một chữ số và một ký tự đặc biệt.'
            ]
        );
        $loginCustomers = $request->only('email', 'password');

        if (Auth::attempt($loginCustomers)) {
            $request->session()->regenerate();
            return redirect()->route('client.page.home');
        } else {
            return redirect()->back()->with('errorLogin', 'Tài khoản hoặc mật khẩu không chính xác');
        }

    }

    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('client.page.home');
    }

    // đăng kí
    public function registerView()
    {
        return view('client.page.account.register');
    }


    public function store(AccountRequest $request)
    {
        $data = $request->except(['_token']);
        $data['password'] = Hash::make($data['password']);
        User::insert($data);
        return redirect()->route('client.account.login');
    }

}
