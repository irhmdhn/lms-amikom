<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GroupStudentModel;
use App\Models\StudentModel;

class StudentGroup extends BaseController
{
    protected $StudentModel, $GroupStudentModel;
    public function __construct()
    {
        $this->StudentModel = new StudentModel;
        $this->GroupStudentModel = new GroupStudentModel;
    }
    public function index()
    {
        $grup = $this->GroupStudentModel;
        $grupData = $grup->group();
        // dd($grupData);
        return view('admin/group-student', [
            'groupCode' => $grupData,
            'model' => $grup,
        ]);
    }
}
