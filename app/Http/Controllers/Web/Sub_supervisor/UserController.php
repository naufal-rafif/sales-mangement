<?php

namespace App\Http\Controllers\Web\Sub_supervisor;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::join('branches', 'users.branch_id', '=', 'branches.id')
            ->select('users.*', 'branches.branch')
            ->where('active', '=', 0)
            ->where('type', '!=', 0)
            ->where('type', '!=', 1)
            ->where('type', '!=', 2)
            ->where('type', '!=', 3)
            ->where('branch_id', '=', Auth::user()->branch_id)
            ->latest()
            ->get();

        return view('dashboard.sub_supervisor.user.home', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::where('branch', '!=', 'Indonesia')->get();
        return view('dashboard.sub_supervisor.user.create', compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->name);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'branch_id' => $request->branch_id,
            'active' => 1,
            'password' => bcrypt($request->password),
            'type' => 4,
        ];

        User::create($data);

        return redirect()->route('sub_supervisor.user')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        dd($user);
        return view('dashboard.sub_supervisor.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $branches = Branch::where('branch', '!=', 'Indonesia')->get();
        return view('dashboard.sub_supervisor.user.edit', compact('user', 'branches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = [
            'active' => 1
        ];

        $user->update($data);

        return redirect()->route('sub_supervisor.user')
            ->with('success', 'User updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('sub_supervisor.user')
            ->with('success', 'User deleted successfully');
    }
}
