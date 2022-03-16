<?php

namespace App\Http\Controllers;

use App\Http\Requests\Test\TestGradeRequest;
use App\Models\Test;
use App\Repository\Interfaces\ITestRepository;
use App\Repository\Interfaces\IUserRepository;
use Illuminate\Http\RedirectResponse;

class ManagerController extends Controller
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
        $this->testRepository = $testRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        $user = $this->user();
        $tests = $this->testRepository->getAllTestsForManagerById($user->id);

        return view('manager.index', compact('tests'));
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function showTest(Test $test): \Illuminate\Contracts\View\View
    {
        return view('manager.show',  compact('test'));
    }

    /**
     * @param TestGradeRequest $request
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function setTestGrade(TestGradeRequest $request, int $id): RedirectResponse
    {
        $this->testRepository->setTestGrade($request->get('grade'), $id);

        return redirect()->route('manager.index')->with('success', 'Test updated successfully');
    }
}
