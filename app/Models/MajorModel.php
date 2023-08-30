<?php

namespace App\Models;

use CodeIgniter\Model;

class MajorModel extends Model
{
    protected $table            = 'majors';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['code', 'name'];
}
