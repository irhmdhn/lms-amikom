<?php

namespace App\Models;

use CodeIgniter\Model;

class LessonModel extends Model
{
    protected $table            = 'lessons';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['title', 'description', 'file_id', 'class_id', 'updated_at'];

    public function tugas($classId)
    {
        return $this->db->table('lessons')
            ->select('lessons.id, lessons.title, lessons.description, assignments.id AS a_lesson_id, assignments.deadline')
            ->orderBy('lessons.id')
            ->where('class_id', $classId)
            ->join('assignments', 'assignments.lesson_id = lessons.id', 'left')
            ->get()->getResultObject();
    }

    // public function lesson($classId)
    // {
    //     return $this->db->table('lessons')
    //     ->where('class_id', $classId)
    //     ->join('assignments', 'assignments.lesson_id=lessons.id', 'left')
    //     ->get()->getResultObject();
    // }
}
