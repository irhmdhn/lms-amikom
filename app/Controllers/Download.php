<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StudentModel;
use App\Models\SubmitModel;

class Download extends BaseController
{
    // protected $SubmitModel;
    // public function __construct()
    // {
    //     $this->SubmitModel=new 
    // }
    public function calendar()
    {
        return $this->response->download('assets/img/kalender2023-2024.png', null);
    }
    public function mhsSubmit($file)
    {
        $mSubmit = new SubmitModel;
        $mStudent = new StudentModel;
        $userId = $mSubmit->select('user_id')->where('file', $file)->findAll()[0]->user_id;
        $nim = $mStudent->select('nim')->where('id', $userId)->findAll()[0]->nim;
        return $this->response->download('files/submits/' . $file, null)->setFileName($nim . '.pdf');
    }
}
