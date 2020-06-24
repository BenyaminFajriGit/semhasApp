<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	public $insertMahasiswa = [
		'nama' => 'required',
        'nim' => 'required|min_length[15]|max_length[15]',
        'email' => 'required|valid_email|is_unique[mahasiswa.email]',
        'prodi'=> 'required'
	];
	
	public $insertMahasiswa_errors=[
		'nama' => [
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
        ]
		];
	public $insertUser_errors=[
		'username' => [
            'required' => 'Field Username harus diisi',
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
        ]
		];
}
