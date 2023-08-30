<?php

namespace App\Models;

use CodeIgniter\Model;

class SubmitModel extends Model
{
    protected $table            = 'submits';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['file', 'user_id', 'assignment_id'];

    public function isSubmit($userId, $asId)
    {
        return $this->db->table('submits')
            ->where('user_id', $userId)
            ->where('assignment_id', $asId)
            ->get()->getResultObject();
    }
    public function submitted($id, $userId)
    {
        return $this->db->table('submits')
            ->where('assignment_id', $id)
            ->where('user_id', $userId)
            ->get()->getResultObject();
    }
    public function getSubmit($asId, $mhsId)
    {
        return $this->db->table('submits')
            ->select('updated_at, file')
            ->where('assignment_id', $asId)
            ->where('user_id', $mhsId)
            ->get()->getRowArray();
    }

    // public function mhs($asId)
    // {
    //     return $this->db->table('submits')
    //         ->select('students.id,students.nim,students.name,submits.updated_at')
    //         ->where('assignment_id', $asId)
    //         ->distinct('students.id')
    //         ->join('assignments', 'assignments.id = submits.assignment_id')
    //         ->join('lessons', 'lessons.id = assignments.lesson_id')
    //         ->join('classes', 'classes.class_id = lessons.class_id')
    //         ->join('students', 'students.group = classes.std_group')
    //         ->get()->getResultObject();
    // }
    // public function mhs($lessonId)
    // {
    //     return $this->db->table('assignments')
    //         ->select('students.id,students.nim,students.name')
    //         ->where('assignments.id', $lessonId)
    //         ->join('submits', 'submits.assignment_id = assignments.id',)
    //         ->join('lessons', 'lessons.id = assignments.lesson_id')
    //         ->join('classes', 'classes.class_id = lessons.class_id')
    //         ->join('students', 'students.group = classes.std_group')
    //         ->get()->getResultObject();
    // }
}
