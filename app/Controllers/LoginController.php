<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class LoginController extends Controller
{
    use ResponseTrait;
    protected $useraModel=null;
    protected $validation=null;
    protected $session=null;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->validation =  \Config\Services::validation();
        $this->session=session();
    }
    public function index()
    {
        $username=$this->request->getPost('username');
        $password=$this->request->getPost('password');
        
        $listUser = $this->userModel->where('username', $username)->where('password', $password)->first();
        if(!$listUser){
            $data=[
            'message'  =>"Username atau password salah",
            'error'=> true
                ];
            
            return $this->fail($data);
        }
        $this->session->set([
            'id'=>$listUser['id'],
            'logIn'=>'true'
            
        ]);
        $data=[
            'id'=>$listUser['id'],
            'message'  =>"Login berhasil",
            'error'=> false
                ];

        return $this->respond($data, 200);
    }

    public function isLogIn(){
        if(! $this->session->get('logIn')){
            $data=[
            'message'  =>"Belum login",
            'error'=> false
                ];
            return  $this->fail($data, 400);
        }
        $data  =[
            'message'=>"Sudah login",
            'error'=> false,
            'id'=>$this->session->get('id')
            ]
            ;
        return $this->respond($data, 200);
    }
    public function logout(){
        $this->session->destroy();
        $data  =[
            'error'=> false,
            'message'=>"Logout sukses"
            
        ];
        return $this->respond($data, 200);
    }

    public function show($id)
    {
        
        $listUser = $this->userModel->find($id);
        
    }
    public function create()
    {
        $username=$this->request->getPost('username');
        $password=$this->request->getPost('password');
        $role=$this->request->getPost('role');
        
            
        $data = [
            'username' => $username,
            'password'    => $password,
            'role'    => $role
        ];
        
        
            $this->userModel->insert($data);
             $data  =[
            'message'=>"Berhasil menambahkan user!",
            'error'=> false
            ]
            ;
            return  $this->respondCreated($data);
        
    }



}