<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table            = 'students';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['nim', 'name', 'major', 'group'];

    public function mhs($asId)
    {
        return $this->db->table('students')
            ->select('students.id,students.nim,students.name,submits.updated_at')
            ->where('submits.assignment_id', $asId)
            ->join('classes', 'classes.std_group=students.group')
            ->join('lessons', 'lessons.class_id=classes.class_id')
            ->join('assignments', 'assignments.lesson_id=lessons.id')
            ->join('submits', 'submits.assignment_id=assignments.id')
            ->get()->getResultObject();
    }
    // public function mhsSub()
    // {
    //     return $this->db->table('students')
    //         ->select('students.id,students.nim,students.name,submits.updated_at')
    //         ->join('classes', 'classes.std_group=students.group')
    //         ->join('lessons', 'lessons.class_id=classes.class_id')
    //         ->join('assignments', 'assignments.lesson_id=lessons.id')
    //         ->join('submits', 'submits.assignment_id=assignments.id')
    //         ->get()->getResultObject();
    // }
}
