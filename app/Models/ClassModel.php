<?php

namespace App\Models;

use CodeIgniter\Model;

class ClassModel extends Model
{
    protected $table            = 'classes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['std_group', 'teaching_id'];

    public function teaching()
    {
        return $this->db->table('classes')
            ->join('rteaching', 'rteaching.id=classes.teaching_id', 'left')
            ->join('studentgroups', 'studentgroups.code=classes.std_group', 'left')
            ->get()->getResultObject();
    }
    public function matkul()
    {
        return $this->db->table('RTeaching')
            ->join('teachers', 'teachers.id=RTeaching.teacher_id', 'left')
            ->join('subjects', 'subjects.code=RTeaching.subj_code', 'left')
            ->get()->getResultObject();
    }
    public function classes()
    {
        return $this->db->table('classes')
            ->select('classes.class_id, classes.std_group,subjects.code, subjects.subj_name,teachers.nik ,teachers.name, majors.code_name')
            ->join('rteaching', 'classes.teaching_id = rteaching.id')
            ->join('studentgroups', 'classes.std_group = studentgroups.code')
            ->join('subjects', 'rteaching.subj_code = subjects.code')
            ->join('teachers', 'rteaching.teacher_id = teachers.id')
            ->join('majors', 'studentgroups.major_id = majors.id')
            ->get()->getResultObject();
    }
    public function dosenKelas($dosenId)
    {
        return $this->db->table('classes')
            ->select('classes.class_id,subjects.subj_name,majors.code_name,classes.std_group,subjects.code')
            ->where('teacher_id', $dosenId)
            ->join('rteaching', 'rteaching.id = classes.teaching_id')
            ->join('studentgroups', 'studentgroups.code = classes.std_group')
            ->join('subjects', 'subjects.code = rteaching.subj_code')
            ->join('majors', 'studentgroups.major_id = majors.id')
            ->get()->getResultObject();
    }
    public function mahasiswaKelas($group)
    {
        return $this->db->table('classes')
            ->select('classes.class_id,subjects.subj_name,majors.code_name,classes.std_group,subjects.code')
            ->where('studentgroups.code', $group)
            ->join('rteaching', 'rteaching.id = classes.teaching_id')
            ->join('studentgroups', 'studentgroups.code = classes.std_group')
            ->join('subjects', 'subjects.code = rteaching.subj_code')
            ->join('majors', 'studentgroups.major_id = majors.id')
            ->get()->getResultObject();
    }
    public function kelasDetail($classId)
    {
        return $this->db->table('classes')
            ->where('class_id', $classId)
            ->join('rteaching', 'rteaching.id = classes.teaching_id')
            ->join('studentgroups', 'studentgroups.code = classes.std_group')
            ->join('subjects', 'subjects.code = rteaching.subj_code')
            ->join('majors', 'studentgroups.major_id = majors.id')
            ->get()->getResultObject()[0];
    }
    public function mahasiswaList($stdGroup)
    {
        return $this->db->table('students')
            ->select('students.nim,students.name,users.email')
            ->where('students.group', $stdGroup)
            ->join('users', 'users.user_id = students.id')
            ->get()->getResultObject();
    }
}