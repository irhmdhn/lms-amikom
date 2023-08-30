<?php

namespace App\Controllers\D;

use App\Models\AssignmentModel;
use App\Models\ClassModel;
use App\Models\LessonModel;
use CodeIgniter\RESTful\ResourceController;

class Classes extends ResourceController
{
    protected $ClassModel, $LessonModel, $AssignmentModel;
    public function __construct()
    {
        $this->ClassModel = new ClassModel;
        $this->LessonModel = new LessonModel;
        $this->AssignmentModel = new AssignmentModel;
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $id = session('id');
        $kelas = $this->ClassModel->dosenKelas($id);
        return view('teacher/classes', ['kelas' => $kelas]);
    }
    public function studentList($stdGroup = null)
    {
        $mahasiswa = $this->ClassModel->mahasiswaList($stdGroup);
        return view('teacher/student-list', ['mahasiswa' => $mahasiswa]);
    }
    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($classId = null)
    {
        $kelas = $this->ClassModel->kelasDetail($classId);
        $materi = $this->LessonModel->where('class_id', $classId)->findAll();
        $materi = $this->LessonModel->tugas($classId);
        return view('teacher/class-detail', [
            'kelas' => $kelas,
            'materi' => $materi,
        ]);
    }


    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
