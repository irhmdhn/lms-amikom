<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useTimestamps = true;
    protected $allowedFields = ['email', 'password'];


    public function admin()
    {
        return $this->db->table('users')
            ->where('role', 'admin')
            ->join('admins', 'admins.id=users.user_id')
            ->get()->getResultObject();
    }
    public function dosen()
    {
        return $this->db->table('users')
            ->where('role', 'dosen')
            ->join('teachers', 'teachers.id=users.user_id')
            ->get()->getResultObject();
    }
    public function mahasiswa()
    {
        return $this->db->table('users')
            ->where('role', 'mahasiswa')
            ->join('students', 'students.id=users.user_id')
            ->get()->getResultObject();
    }
    public function getAdmin($userInput)
    {
        return $this->where(['email' => $userInput, 'role' => 'admin'])->asObject()->first();
    }
    public function getDosen($userInput)
    {
        return $this->where(['email' => $userInput, 'role' => 'dosen'])->asObject()->first();
    }
    public function getMahasiswa($userInput)
    {
        return $this->where(['email' => $userInput, 'role' => 'mahasiswa'])->asObject()->first();
    }
    public function getEmailById($userId)
    {
        return $this->where('user_id', $userId)->asObject()->first();
    }
}
