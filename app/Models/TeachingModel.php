<?php

namespace App\Models;

use CodeIgniter\Model;

class TeachingModel extends Model
{
    protected $table            = 'RTeaching';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['teacher_id', 'subj_code'];


    public function teaching()
    {
        return $this->db->table('RTeaching')
            ->join('teachers', 'teachers.id=RTeaching.teacher_id', 'left')
            ->join('subjects', 'subjects.code=RTeaching.subj_code', 'left')
            ->get()->getResultObject();
    }
    // public function matkul()
    // {
    //     return $this->db->table('relationteachersubject')
    //         ->join('subjects', 'subjects.code=relationteachersubject.subj_code')
    //         ->get()->getResultObject();
    // }
}