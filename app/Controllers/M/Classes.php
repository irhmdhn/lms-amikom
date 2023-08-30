<?php

namespace App\Controllers\M;

use App\Models\AssignmentModel;
use App\Models\ClassModel;
use App\Models\LessonModel;
use App\Models\StudentModel;
use App\Models\SubmitModel;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;
use CodeIgniter\RESTful\ResourceController;
use Config\Services;

class Classes extends ResourceController
{
    protected $ClassModel, $StudentModel, $AssignmentModel, $LessonModel, $UserModel, $SubmitModel, $validation;
    public function __construct()
    {
        $this->ClassModel = new ClassModel;
        $this->StudentModel = new StudentModel;
        $this->AssignmentModel = new AssignmentModel;
        $this->LessonModel = new LessonModel;
        $this->UserModel = new UserModel();
        $this->SubmitModel = new SubmitModel;
        $this->validation = Services::validation();
    }
    public function rules()
    {
        return [
            'file' => 'uploaded[file]|ext_in[file,pdf]',
        ];
    }
    public function alertErr($title, $mess)
    {
        return '<script>$(document).ready(function() {Swal.fire({
            icon: "error",
            title: "' . $title . '",
            text: "' . $mess . '",
           })});</script>';
    }
    public function alertSucc($title, $mess)
    {
        return '<script>$(document).ready(function() {Swal.fire({
            icon: "success",
            title: "' . $title . '",
            text: "' . $mess . '",
           })});</script>';
    }
    public function index()
    {
        $id = session('id');
        $group = $this->StudentModel->where('id', $id)->first()->group;
        $kelas = $this->ClassModel->mahasiswaKelas($group);
        return view('student/classes', ['kelas' => $kelas]);
    }
    public function show($classId = null)
    {
        $kelas = $this->ClassModel->kelasDetail($classId);
        $tugas = $this->LessonModel->tugas($classId);
        return view('student/class-detail', [
            'kelas' => $kelas,
            'materi' => $tugas,
        ]);
    }
    public function create()
    {
        $userId = session('id');
        $validation = $this->validation;
        $validation->setRules($this->rules());
        if (!$validation->withRequest($this->request)->run()) {
            session()->setFlashdata('status', $this->alertErr("File gagal di upload 😱", "Pastikan file yang diupload adalah *.pdf"));
            return redirect()->back();
        }
        $asId = $this->request->getVar('as_id');
        $file = $this->request->getFile('file');
        $fileName = $file->getRandomName();
        $this->SubmitModel->insert([
            'file' => $fileName,
            'user_id' => $userId,
            'assignment_id' => $asId,
        ]);
        $file->move('files/submits/', $fileName);
        session()->setFlashdata('status', $this->alertSucc("File Berhasil di submit", "Semangat kuliahnya! 😊"));
        return redirect()->back();
    }
    public function update($subId = null)
    {
        $validation = $this->validation;
        $validation->setRules($this->rules());
        if (!$validation->withRequest($this->request)->run()) {
            session()->setFlashdata('status', $this->alertErr("File gagal di upload 😱", "Pastikan file yang diupload adalah *.pdf"));
            return redirect()->back();
        }
        $model = new SubmitModel;
        $oldFile = $model->select('file')->find($subId)->file;
        $newFile = $this->request->getFile('file');
        $fileName = $newFile->getRandomName();
        $data = [
            'file' => $fileName,
            'updated_at' => Time::now(),
        ];
        $model->update($subId, $data);
        $newFile->move('files/submits/', $fileName);
        unlink('files/submits/' . $oldFile);
        session()->setFlashdata('status', $this->alertSucc("File Berhasil di submit", "Semangat kuliahnya! 😊"));
        return redirect()->back();
    }
}
