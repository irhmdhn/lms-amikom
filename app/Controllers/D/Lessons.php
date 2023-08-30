<?php

namespace App\Controllers\D;

use App\Models\AssignmentModel;
use App\Models\ClassModel;
use App\Models\LessonModel;
use App\Models\StudentModel;
use App\Models\SubmitModel;
use CodeIgniter\I18n\Time;
use CodeIgniter\RESTful\ResourceController;

class Lessons extends ResourceController
{
    protected $StudentModel, $ClassModel, $SubmitModel, $LessonModel, $AssignmentModel;
    public function __construct()
    {
        $this->StudentModel = new StudentModel;
        $this->ClassModel = new ClassModel;
        $this->SubmitModel = new SubmitModel;
        $this->LessonModel = new LessonModel;
        $this->AssignmentModel = new AssignmentModel;
    }
    public function show($id = null)
    {
        $mahasiswa = $this->AssignmentModel->mhs($id);
        $submitter = count($this->SubmitModel->where('assignment_id', $id)->findAll());
        return view('teacher/submission-list', [
            'asId' => $id,
            'submitter' => $submitter,
            'mahasiswa' => $mahasiswa,
        ]);
    }
    public function create()
    {
        $lesson = new LessonModel;
        $assignment = new AssignmentModel;
        $classId = $this->request->getVar('classId');
        $title = $this->request->getVar('title');
        $desc = $this->request->getVar('description');

        $check = $this->request->getVar('tugas');
        $deadline = $this->request->getVar('deadline');

        $materi = [
            'title' => $title,
            'description' => $desc,
            'class_id' => $classId,
            'updated_at' => Time::now(),
            'created_at' => Time::now(),
        ];
        $lesson->insert($materi);
        $lessonId = $lesson->getInsertID();
        if ($check == 'on') {
            $tugas = [
                'lesson_id' => $lessonId,
                'deadline' => $deadline,
                'updated_at' => Time::now(),
                'created_at' => Time::now(),
            ];
            $assignment->insert($tugas);
        }
        session()->setFlashdata('success', '<script>$(document).ready(function() {Swal.fire({
                icon: "success",
                title: "Data berhasil ditambah",
               })});</script>');
        return redirect()->to($_SERVER['HTTP_REFERER']);
    }
    public function edit($id = null)
    {
        return view('teacher/edit-lesson');
    }
    public function update($id = null)
    {
        $lesson = new LessonModel;
        $assignment = new AssignmentModel;
        $title = $this->request->getVar('title');
        $desc = $this->request->getVar('description');
        $check = $this->request->getVar('tugas');
        $deadline = $this->request->getVar('deadline');
        $data = [
            'title' => $title,
            'description' => $desc,
        ];
        $lesson->update($id, $data);
        if ($check) {
            if ($assignment->where('lesson_id', $id)->findAll()) {
                $assignment->update($id, [
                    'deadline' => $deadline,
                    'updated_at' => Time::now(),
                ]);
            } else {
                $assignment->insert([
                    'lesson_id' => $id,
                    'deadline' => $deadline,
                    'updated_at' => Time::now(),
                    'updated_at' => Time::now(),
                ]);
            }
        }
        session()->setFlashdata('success', '<script>$(document).ready(function() {Swal.fire({
                icon: "success",
                title: "Data berhasil diubah",
               })});</script>');
        return redirect()->back();
    }
}
