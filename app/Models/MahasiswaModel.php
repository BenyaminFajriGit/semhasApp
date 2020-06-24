<?php namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table      = 'mahasiswa';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nama', 'nim','email','prodi','photo'];

    protected $useTimestamps = true;
    
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [/*
        
        'nama' => 'required',
        'nim' => 'required|min_length[15]|max_length[15]',
        'email' => 'required|valid_email|is_unique',
        'prodi'=> 'required'
    */
    
];
    protected $validationMessages = [   // Errors
        /*'nama' => [
            'required' => 'Field Nama harus diisi',
        ],
        'nim' => [
            'required' => 'Field NIM harus diisi',
            'min_length' => 'NIM tidak valid' ,
            'max_length' => 'NIM tidak valid' 
        ],
        
        'email' => [
            'required' => 'Field Email harus diisi',
            'valid_email' => 'Email tidak valid' ,
            'is_unique' => 'Email sudah terdaftar' 
            
        ],
        'prodi' => [
            'required' => 'Field Prodi harus diisi',
        ]*/
    ];
    protected $skipValidation     = false;
}