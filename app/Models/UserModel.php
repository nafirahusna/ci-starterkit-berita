<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'email',
        'password',
        'name',
        'role_id',
    ];

    // Otomatis isi created_at dan updated_at
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Jika nanti pakai soft deletes, aktifkan ini:
    // protected $useSoftDeletes = true;
    // protected $deletedField  = 'deleted_at';
}
