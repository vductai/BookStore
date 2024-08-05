<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $listUser = User::all();
        return view('admin.user.list', compact('listUser'));
    }

    public function updateView($id)
    {
        $listRole = Role::all();
        $userId = User::query()->where('id_user', $id)->get();
        return view('admin.user.update', compact('userId', 'listRole'));
    }

    public function update(UserRequest $request, $id)
    {
        $data = $request->except(['_token', '_method', 'password']);
        User::query()->where('id_user', $id)->update($data);
        return redirect()->route('admin.user.list')->with('successUpdate', 'Cập nhật thông tin thành công');
    }

    public function delete($id)
    {
        User::query()->where('id_user', $id)->delete();
        return redirect()->route('admin.user.list')->with('successDelete', 'Xoá người dùng thành công');
    }

    public function updatePassword(Request $request, $id)
    {
        $passold = $request->input('passold');
        $passnew = $request->input('passnew');
        $confirmpassword = $request->input('confirmpassword');

        $request->validate(
            [
                'passnew' => [
                    'required',
                    'string',
                    'min:5',
                    'regex:/[a-z]/',
                    'regex:/[A-Z]/',
                    'regex:/[0-9]/',
                    'regex:/[@$!%*#?&]/'
                ],
                'confirmpassword' => [
                    'required',
                    'string',
                    'min:5',
                    'regex:/[a-z]/',
                    'regex:/[A-Z]/',
                    'regex:/[0-9]/',
                    'regex:/[@$!%*#?&]/'
                ]
            ],
            [
                //
                'passnew.required' => 'Mật khẩu là bắt buộc.',
                'passnew.string' => 'Mật khẩu phải là chuỗi ký tự.',
                'passnew.min' => 'Mật khẩu phải có ít nhất 5 ký tự.',
                'passnew.regex' => 'Mật khẩu phải chứa ít nhất một chữ thường, một chữ hoa, một chữ số và một ký tự đặc biệt.',
                //
                'confirmpassword.required' => 'Mật khẩu là bắt buộc.',
                'confirmpassword.string' => 'Mật khẩu phải là chuỗi ký tự.',
                'confirmpassword.min' => 'Mật khẩu phải có ít nhất 5 ký tự.',
                'confirmpassword.regex' => 'Mật khẩu phải chứa ít nhất một chữ thường, một chữ hoa, một chữ số và một ký tự đặc biệt.'
            ]
        );

        $user = User::findOrFail($id);

        if (Hash::check($passold, $user->password)) {
            if ($passnew === $confirmpassword) {
                $user->password = Hash::make($passnew);
                $user->save();

                return redirect()->back()->with('successPass', 'Mật khẩu đã được cập nhật thành công');
            } else {
                return redirect()->back()->with('errorPass', 'Mật khẩu mới và xác nhận mật khẩu không khớp');
            }
        } else {
            return redirect()->back()->with('errorPass', 'Mật khẩu cũ không chính xác');
        }
    }
}
