<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\SaveUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Repository\Interfaces\IUserRepository;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * @var IUserRepository $userRepository
     */

    public IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->authorizeResource(User::class);
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        $users = $this->userRepository->getAllUsers();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SaveUserRequest $request
     * @return RedirectResponse
     */
    public function store(SaveUserRequest $request): RedirectResponse
    {
        $this->userRepository->createOrUpdate($request);

        return redirect()->route('users.index')
            ->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\View
     */
    public function show(User $user): \Illuminate\Contracts\View\View
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(User $user): \Illuminate\Contracts\View\View
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request, int $id): RedirectResponse
    {
        $this->userRepository->createOrUpdate($request, $id);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->userRepository->deleteUser($id);

        return redirect()->route('users.index')
            ->with('success','post deleted successfully');
    }
}
