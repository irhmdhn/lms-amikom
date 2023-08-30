<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MajorModel;
use App\Models\SubjectModel;

class MajorSubject extends BaseController
{
    protected $MajorModel, $SubjectModel;
    public function __construct()
    {
        $this->MajorModel = new MajorModel;
        $this->SubjectModel = new SubjectModel;
    }
    public function index()
    {
        $prodi = $this->MajorModel->findAll();
        $matkul = $this->SubjectModel->findAll();
        return view('admin/major-subject', [
            'prodi' => $prodi,
            'matkul' => $matkul,
        ]);
    }
}