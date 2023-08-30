<?php

namespace App\Controllers\Admin;

use App\Models\ClassModel;
use App\Models\GroupStudentModel;
use App\Models\TeachingModel;
use CodeIgniter\RESTful\ResourceController;

class Classes extends ResourceController
{
    protected $ClassModel, $GroupStudentModel, $teachingModel;
    public function __construct()
    {
        $this->ClassModel = new ClassModel;
        $this->GroupStudentModel = new GroupStudentModel;
        $this->teachingModel = new TeachingModel;
    }

    public function index()
    {
        $kelas = $this->ClassModel->classes();
        $mGrup = $this->GroupStudentModel;
        $teaching = $this->teachingModel->findAll();
        $group = $this->GroupStudentModel->findAll();
        return view('admin/classes', [
            'kelas' => $kelas,
            'count' => $mGrup,
            'teaching' => $teaching,
            'group' => $group,
        ]);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
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
        dd('TAMBAH');
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
