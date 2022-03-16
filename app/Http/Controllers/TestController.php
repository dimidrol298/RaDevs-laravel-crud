<?php

namespace App\Http\Controllers;

use App\Http\Requests\Test\TestRequest;
use App\Models\Test;
use App\Repository\Interfaces\ITestRepository;
use App\Repository\Interfaces\IUserRepository;
use Illuminate\Http\RedirectResponse;

class TestController extends Controller
{
    /**
     * @var ITestRepository $testRepository
     */
    public ITestRepository $testRepository;

    /**
     * @var IUserRepository $userRepository
     */
    public IUserRepository $userRepository;

    public function __construct(ITestRepository $testRepository, IUserRepository $userRepository)
    {
        $this->authorizeResource(Test::class, 'test');
        $this->testRepository = $testRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        $tests = $this->testRepository->getAllTests();

        return view('tests.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        $users = $this->userRepository->getAllUsersForTests();

        return view('tests.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Test\TestRequest $request
     * @return RedirectResponse
     */
    public function store(TestRequest $request): RedirectResponse
    {
        $this->testRepository->createOrUpdate($request);

        return redirect()->route('tests.index')
            ->with('success','Test created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Test $test
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Test $test): \Illuminate\Contracts\View\View
    {
        return view('tests.show',  compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Test $test
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Test $test): \Illuminate\Contracts\View\View
    {
        $users = $this->userRepository->getAllUsersForTests();

        return view('tests.edit', compact('users','test'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TestRequest $request
     * @param Test $test
     * @return RedirectResponse
     */
    public function update(TestRequest $request, Test $test): RedirectResponse
    {
        $this->testRepository->createOrUpdate($request, $test);

        return redirect()->route('tests.index')->with('success', 'Test updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->testRepository->deleteTest($id);

        return redirect()->route('tests.index')
            ->with('success','post deleted successfully');
    }
}
