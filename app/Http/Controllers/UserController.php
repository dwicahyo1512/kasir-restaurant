<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Tables\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create users', ['only' => ['create', 'store']]);
        $this->middleware('can:read users', ['only' => ['show', 'index']]);
        $this->middleware('can:update users', ['only' => ['edit', 'update']]);
        $this->middleware('can:delete users', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index', [
            'users' => Users::class,
            'roles' => Role::pluck('name', 'id')->toArray()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gender = [
            'Male' => 'Male',
            'Female' => 'Female',
        ];
        //
        return view('users.create', [
            'gender' => $gender
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'password' => Hash::make($request->password)
        ]);
        Toast::title('User Data Tersimpan')->rightTop()->autoDismiss(3);
        // return redirect()->route('user.index');
        return to_route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $gender = [
            'Male' => 'Male',
            'Female' => 'Female',
        ];
        //
        return view('users.edit', [
            'user' => $user,
            'gender' => $gender,
            'roles' => Role::pluck('name', 'id')->toArray(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
        ]);

        if ($request->new_password != null) {
            $user->update([
                "new_password" => Hash::make($request->new_password)
            ]);
        }
        $request->validate([
            'roles' => "required|array",
            'roles.*' => "required|exists:roles,id",
        ]);

        $user->syncRoles($request->roles);
        $user->givePermissionTo($request->permissions);

        Toast::title('User Data Update')->rightTop();

        return to_route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        Toast::title('User Data Terhapus')->rightTop()->danger()->autoDismiss(3);
        // return redirect()->route('user.index');
        return to_route('users.index');
    }
}
