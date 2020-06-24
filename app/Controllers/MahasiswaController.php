<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MahasiswaModel;
use CodeIgniter\API\ResponseTrait;

class MahasiswaController extends Controller
{
    use ResponseTrait;

    protected $MahasiswaModel=null;
    protected $validation=null;
    protected $session=null;
    public function __construct()
    {
        
        $this->session=session();
        $this->mahasiswaModel = new MahasiswaModel();
        $this->validation =  \Config\Services::validation();
        
    }
    public function index()
    {
        
        $listMahasiswa = $this->mahasiswaModel->findAll();
        
        return $this->respond($listMahasiswa, 200);
    }
    public function show()
    {
        
        $listMahasiswa = $this->mahasiswaModel->find(11);
        $data['image']=$listMahasiswa['photo'];
        return view('image',$data);
    }
    public function create()
    {
        if(! $this->session->get('logIn') ){
            return redirect()->to(base_url().'/islogin');
            die();    
        }
        $nama=$this->request->getPost('nama');
        $nim=$this->request->getPost('nim');
        $email=$this->request->getPost('email');
        $prodi=$this->request->getPost('prodi');
        
        $uniqueid=uniqid();
        $extension=$this->request->getFile('photo')->getExtension();
        $statusUpload= $this->request->getFile('photo')->move(ROOTPATH.'public/uploads/photo_mahasiswa/',"$uniqueid.$extension");
        if(!$statusUpload){
             $data  =[
            'message'=>"Format file tidak sesuai",
            'error'=> true,
            'id'=>$this->session->get('id')
            ]
            ;
            
            return $this->fail($data, 400);
        }
        
        $photo= "$uniqueid.$extension";
        
        
        
        $data = [
            'nama' => $nama,
            'nim'    => $nim,
            'email'    => $email,
            'prodi'    => $prodi,
            'photo'    => $photo
        ];
        
        $valid=$this->validation->run($data, 'insertMahasiswa');
        
        if($valid){
            $this->mahasiswaModel->insert($data);
            $message  =[
            'message'=>"Data berhasil ditambahkan",
            'error ' =>false
            ]
            ;
            return  $this->respondCreated($message);
        }else{
            $message  =[
            'message'=>$this->validation->getErrors(),
            'error ' =>true
            ];
            
            return $this->fail($message, 400);
        }
        
   
        
    }



}