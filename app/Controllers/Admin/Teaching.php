<?php

namespace App\Controllers\Admin;

use App\Models\SubjectModel;
use App\Models\TeacherModel;
use App\Models\TeachingModel;
use CodeIgniter\RESTful\ResourceController;
use Config\Services;

class Teaching extends ResourceController
{
    protected $SubjectModel, $TeacherModel, $TeachingModel, $validation;
    public function __construct()
    {
        $this->TeachingModel = new TeachingModel;
        $this->TeacherModel = new TeacherModel;
        $this->SubjectModel = new SubjectModel;
        $this->validation = Services::validation();
    }
    public function rules()
    {
        return [
            'dosen' => 'required',
            'matkul' => 'required',
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
        $pengajaran = $this->TeachingModel->teaching();
        $dosen = $this->TeacherModel->findAll();
        $matkul = $this->SubjectModel->findAll();
        return view('admin/teaching', [
            'dosen' => $dosen,
            'matkul' => $matkul,
            'pengajaran' => $pengajaran,
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
        $validation = $this->validation;
        $validation->setRules($this->rules());
        if (!$validation->withRequest($this->request)->run()) {
            session()->setFlashdata('status', $this->alertErr("Data tidak dipilih", "Pastikan memilih data terlebih dahulu"));
            return redirect()->back();
        }

        $dosen = $this->request->getVar('dosen');
        $matkul = $this->request->getVar('matkul');
        $data = [
            'teacher_id' => $dosen,
            'subj_code' => $matkul,
        ];
        $mDosen = $this->TeacherModel->find($dosen);

        $mMatkul = $this->SubjectModel->where('code', $matkul)->get()->getRow();
        if (!$mDosen) {
            session()->setFlashdata('status', $this->alertErr("Dosen tidak ada", "Pastikan data dosen sudah terdaftar"));
            return redirect()->back();
        }
        if (!$mMatkul) {
            session()->setFlashdata('status', $this->alertErr("Mata kuliah tidak ada", "Pastikan data mata kuliah sudah terdaftar"));
            return redirect()->back();
        }
        $mAjar = $this->TeachingModel->where('teacher_id', $dosen)->where('subj_code', $matkul)->get()->getRow();
        if ($mAjar) {
            session()->setFlashdata('status', $this->alertErr("Gagal!", "Data pengajar sudah tersedia"));
            return redirect()->back();
        } else {
            $newAjar = new TeachingModel;
            $newAjar->insert($data);
            session()->setFlashdata('status', $this->alertSucc("Berhasil!", "Data pengajar berhasil ditambahkan"));
            return redirect()->back();
        }
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
