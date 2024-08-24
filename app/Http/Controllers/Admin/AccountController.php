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
                return redirect()->route('admin.index');
//                return redirect()->back()->with('errorLoginAdmin', 'Tài khoản này không đủ thẩm quyền');
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


    // reset pass
    public function viewReset(){
        return view('client.page.account.forgotPassword');
    }
    public function viewPass(){
        return view('client.page.account.newPass');
    }
    private function generateSecurePassword($length = 12)
    {
        $password = '';
        $upperCase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowerCase = 'abcdefghijklmnopqrstuvwxyz';
        $digits = '0123456789';
        $specialCharacters = '!@#$%^&*()_+-=[]{}|;:,.<>?';

        // Ensure each character type is present at least once
        $password .= $upperCase[rand(0, strlen($upperCase) - 1)];
        $password .= $lowerCase[rand(0, strlen($lowerCase) - 1)];
        $password .= $digits[rand(0, strlen($digits) - 1)];
        $password .= $specialCharacters[rand(0, strlen($specialCharacters) - 1)];

        // Fill the remaining length with random characters
        $allCharacters = $upperCase . $lowerCase . $digits . $specialCharacters;
        for ($i = 4; $i < $length; $i++) {
            $password .= $allCharacters[rand(0, strlen($allCharacters) - 1)];
        }

        // Shuffle the password to ensure randomness
        return str_shuffle($password);
    }
    public function resetPass(Request $request){
        $data = $request['email'];
        $user = User::where('email', $data)->first();
        $newPass = $this->generateSecurePassword();
        $user->password = Hash::make($newPass);
        $user->save();

        return redirect()->route('client.accont.pass-view', compact('newPass'));
    }



}
