<?php

namespace App\Models;

use CodeIgniter\Model;

class AssignmentModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'assignments';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['lesson_id', 'deadline', 'created_at', 'updated_at'];

    public function mhs($lessonId)
    {
        return $this->db->table('assignments')
            ->select('students.id,students.nim,students.name')
            ->where('assignments.id', $lessonId)
            ->distinct('assignment_id')
            // ->join('submits', 'submits.assignment_id = assignments.id', 'left')
            ->join('lessons', 'lessons.id = assignments.lesson_id')
            ->join('classes', 'classes.class_id = lessons.class_id')
            ->join('students', 'students.group = classes.std_group')
            ->get()->getResultObject();
    }
}
