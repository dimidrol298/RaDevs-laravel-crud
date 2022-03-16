<?php

namespace App\Repository\Interfaces;

use App\Models\Test;

interface ITestRepository
{
    public function getAllTests();

    public function getAllTestsForManagerById(int $id);

    public function setTestGrade(int $grade, int $testId);

    public function getTestById(int $id);

    public function createOrUpdate($request = [], Test $test = null);

    public function deleteTest(int $id);
}
