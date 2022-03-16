<?php

namespace App\Repository;

use App\Models\Test;
use App\Repository\Interfaces\ITestRepository;
use App\Services\TestService;

class TestRepository implements ITestRepository
{
    private TestService $testService;

    public function __construct(TestService $testService)
    {
        $this->testService = $testService;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllTests(): \Illuminate\Database\Eloquent\Collection
    {
        return Test::all()->sortByDesc('created_at');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllTestsForManagerById(int $id): \Illuminate\Database\Eloquent\Collection
    {
        return Test::where('user_id', '=', $id)->latest()->get();
    }

    /**
     * @param $id
     * @return Test
     */
    public function getTestById($id): Test
    {
        return Test::find($id);
    }

    /**
     * @param array $request
     * @param Test|null $test
     * @return bool|Test
     */
    public function createOrUpdate($request = [], Test $test = null ): bool|Test
    {
        if(is_null($test)) {
            return Test::create($request->all());
        }

        return $test->update($request->all());
    }

    /**
     * @param int $id
     * @return bool
     */
    public function deleteTest(int $id): bool
    {
        return Test::find($id)->delete();
    }

    /**
     * @param int $grade
     * @param int $testId
     * @return bool
     */
    public function setTestGrade(int $grade, int $testId): bool
    {
        $test = Test::find($testId);
        $test->grade = $grade;
        //$test->evaluation_criteria = $this->testService->generateEvaluationCriteria($grade);

        return $test->save();
    }
}
