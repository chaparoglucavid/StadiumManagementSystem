<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $userType = request()?->input('group');

        if ($userType === 'SystemUsers') {
            $relation = User::IsAdmin();
        } elseif ($userType === 'Vendors') {
            $relation = User::IsVendor();
        } elseif ($userType === 'Customers') {
            $relation = User::IsCustomer();
        } else {
            $relation = User::query();
        }

        $users = $relation->get();

        return view('admin-dashboard.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin-dashboard.users.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'fatherName' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|string|unique:users,phone',
                'password' => 'required|string|min:8',
                'type' => 'required|string|in:user,admin,vendor',
                'birthday' => 'required|date',
                'activityStatus' => 'required|in:active,inactive,blocked',
                'role' => 'nullable|string',
            ]);

            $user = new User();
            $user->name = $validatedData['name'];
            $user->surname = $validatedData['surname'];
            $user->fatherName = $validatedData['fatherName'];
            $user->email = $validatedData['email'];
            $user->phone = $validatedData['phone'];
            $user->birthday = $validatedData['birthday'];
            $user->type = $validatedData['type'];
            $user->activityStatus = $validatedData['activityStatus'];
            $user->password = Hash::make($validatedData['password']);
            $user->onlineStatus = false;

            $user->save();

            flash('İstifadəçi müvəffəqiyyətlə yaradıldı.', 'success');
            return redirect()->route('admin.users.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            flash('İstifadəçi əlavə edərkən xəta baş verdi. Zəhmət olmasa yenidən cəhd edin.', 'error');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $result = checkIdsAvailable($id);
        if (!$result) {
            flash('Axtardığınız məlumat üzrə istifadəçi tapılmadı.', 'error');
            return redirect()->route('admin.users.index');
        }

        $decryptedUid = decrypt($id);
        $user = User::find($decryptedUid);

        if (!$user) {
            flash('İstifadəçi tapılmadı.', 'error');
            return redirect()->route('admin.users.index');
        }

        return view('admin-dashboard.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'fatherName' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|string',
                'type' => 'required|string|in:user,admin,vendor',
                'birthday' => 'required|date',
                'activityStatus' => 'required|in:active,inactive,blocked',
                'role' => 'nullable|string',
                'password' => 'nullable|string|min:8',
            ]);
            $result = checkIdsAvailable($id);
            if (!$result) {
                flash('Axtardığınız məlumat üzrə istifadəçi tapılmadı.', 'error');
                return redirect()->back();
            }

            $decryptedUid = decrypt($id);
            $user = User::findOrFail($decryptedUid);

            $user->name = $validatedData['name'];
            $user->surname = $validatedData['surname'];
            $user->fatherName = $validatedData['fatherName'];
            $user->email = $validatedData['email'];
            $user->phone = $validatedData['phone'];
            $user->birthday = $validatedData['birthday'];
            $user->type = $validatedData['type'];
            $user->activityStatus = $validatedData['activityStatus'];

            if (!empty($validatedData['password'])) {
                $user->password = Hash::make($validatedData['password']);
            }

            $user->save();

            flash('İstifadəçi məlumatları uğurla yeniləndi.', 'success');
            return redirect()->route('admin.users.index');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            flash('İstifadəçi məlumatlarını yeniləyərkən xəta baş verdi.', 'error');
            return redirect()->back()->withInput();
        }
    }

}
