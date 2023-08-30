<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\StudentModel;
use App\Models\TeacherModel;
use App\Models\UserModel;

class User extends BaseController
{
    protected $AdminModel, $StudentModel, $TeacherModel, $UserModel;
    public function __construct()
    {
        $this->AdminModel = new AdminModel();
        $this->StudentModel = new StudentModel();
        $this->TeacherModel = new TeacherModel();
        $this->UserModel = new UserModel();
    }
    public function index()
    {
        // $users = $this->UserModel->findAll();
        $students = $this->UserModel->mahasiswa();
        $teachers = $this->UserModel->dosen();
        // dd($students);
        return view('admin/users', [
            'students' => $students,
            'teachers' => $teachers,
        ]);
    }
}
