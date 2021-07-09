<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('user-view');

        return view('pages.user.index', ['users' => User::withTrashed()->users()->paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('user-create');

        return view('pages.user.create', ['roles' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('user-create');


        $this->validate($request, [
            'first_name'    => ['required', 'string', 'max:255'],
            'middle_name'   => ['nullable', 'string', 'max:255'],
            'last_name'     => ['required', 'string', 'max:255'],
            'role'          => ['required', 'array'],
            'title'         => ['required', 'string', 'max:255'],
            'phone'         => ['nullable', 'numeric', 'digits:12'],
            'email'         => ['required', 'email', 'max:255', 'unique:users,email'],
        ]);


        $username = $this->createUsername();

        $user = User::create([
            'first_name'    => title_case($request->first_name),
            'username'      => $username,
            'middle_name'   => title_case($request->middle_name),
            'last_name'     => title_case($request->last_name),
            'title'         => $request->title,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'password'      => bcrypt(title_case($request->last_name)),
        ]);

        $user->assignRole($request->role);

        toastr('User created successfully');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('user-create');

        return view('pages.user.show', ['user' => $user]);
    }

    public function roleAdd(Request $request, User $user)
    {
        $this->authorize('user-create');

        $user->assignRole($request->roles);

        $role = str_plural('Role', $request->roles);

        toastr("$role assigned successfully", 'success');

        return redirect()->route('users.index');
    }

    public function roleRemove(Request $request, User $user)
    {
        $this->authorize('user-create');

        $user->removeRole($request->role);

        toastr("Role removed successfully", 'success');

        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('user-edit');

        return view('pages.user.edit', ['roles' => Role::all(), 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $this->authorize('user-edit');

        $this->validate($request, [
            'first_name'    => ['required', 'string', 'max:255'],
            'middle_name'   => ['nullable', 'string', 'max:255'],
            'last_name'     => ['required', 'string', 'max:255'],
            'role'          => ['required', 'array'],
            'title'         => ['required', 'string', 'max:255'],
            'phone'         => ['nullable', 'numeric', 'digits:12'],
            'email'         => ['required', 'email', 'max:255', "unique:users,email,$user->id ,id"],
        ]);

        $username = $this->createUsername($user->id);

        $user->update([
            'first_name'    => title_case($request->first_name),
            'middle_name'   => title_case($request->middle_name),
            'username'      => $username,
            'api_token'     => str_random(60),
            'last_name'     => title_case($request->last_name),
            'title'         => $request->title,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'password'      => bcrypt(title_case($request->last_name)),
        ]);

        $user->syncRoles($request->role);

        toastr('User updated successfully');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('user-delete');

        // Restore Deleted User
        if ($user->trashed()) {
            $user->restore();
        }
        else {
            $user->delete();
        }

        return back();
    }

    public function changePasswordPage()
    {
        return view('pages.user.changePassword');
    }

    public function changePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => ['required', 'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,15}$/', 'confirmed', 'different:old_password'],
            // 'old_password' => ['required', new PasswordValidation]
        ], [
            'regex' => ':attribute should be between 6 to 15 characters with at least one lowercase letter, one uppercase letter, one number and one special character'
        ], [
            'password' => 'New Password',
            'old_password' => 'Old Password'
        ]);

        $user->password = bcrypt($request->password);
        $user->update();

        toastr('Password changed successfully', 'success');
        return back();
    }

    public function search()
    {
        $search = request('search');

        $users = User::users()->where(function ($query) use ($search)
        {
            $query->where('username', 'like', "%$search%")
            ->orWhere('first_name', 'like', "%$search%")
            ->orWhere('middle_name', 'like', "%$search%")
            ->orWhere('last_name', 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%");
        })
        ->paginate(20);
        return view('pages.user.index', [
            'users' => $users
        ]);
    }

    public function createUsername($user_id = null)
    {
        $username = strtolower(substr(request('first_name'), 0, 1).request('last_name'));

        $user = User::where([['username', $username], ['id', '!=', $user_id]])->count();

        if ($user) {
            $username = $username.'-'.rand(50);
        }

        return $username;
    }
}
