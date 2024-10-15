<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Hiển thị danh sách người dùng
    public function index()
    {
        $users = User::latest('id')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    // Hiển thị trang tạo người dùng mới
    public function create()
    {
        return view('admin.users.create');
    }

    // Xử lý lưu thông tin người dùng mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|string|in:admin,user',
            'phone' => 'nullable|string|max:255',
            'avatar' => 'nullable|file|image|max:2048', // Kiểm tra file ảnh
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:255',
        ]);

        $data = $request->only('name', 'email', 'role', 'phone', 'date_of_birth', 'address');
        $data['password'] = bcrypt($request->password);

        // Xử lý upload avatar
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        User::create($data);

        return redirect()->route('users.index')->with('success', 'Tạo tài khoản thành công.');
    }

    // Hiển thị trang chỉnh sửa thông tin người dùng
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // Xử lý cập nhật thông tin người dùng
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
            'role' => 'required|string|in:admin,user',
            'phone' => 'nullable|string|max:255',
            'avatar' => 'nullable|file|image|max:2048',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->phone = $request->phone;
        $user->date_of_birth = $request->date_of_birth;
        $user->address = $request->address;

        // Cập nhật mật khẩu nếu có
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        // Xử lý upload avatar
        if ($request->hasFile('avatar')) {
            // Xóa avatar cũ nếu cần
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $user->avatar = $request->file('avatar')->store('avatars', 'public');
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Cập nhật tài khoản thành công.');
    }

    // Hiển thị trang hồ sơ người dùng
    public function showProfile($id)
    {
        $profile = User::findOrFail($id);
        return view('client.profiles.show', compact('profile'));
    }

    // Xóa người dùng
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        // Xóa avatar nếu có
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Tài khoản đã được xóa thành công.');
    }
}