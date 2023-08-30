<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupStudentModel extends Model
{
    protected $table            = 'studentgroups';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['code'];

    public function group()
    {
        return $this->db->table('studentgroups')
            ->distinct()
            ->select('code,major')
            ->join('students', 'students.group=studentgroups.code')
            ->get()->getResultObject();
    }

    public function major($major)
    {
        $majorModel = new MajorModel;
        $majorName = $majorModel->where('code', $major)->first()->maj_name;
        return $majorName;
    }
    public function count($code)
    {
        $studentModel = new StudentModel;
        $student = $studentModel->where('group', $code)->findAll();
        return count($student);
    }
}
