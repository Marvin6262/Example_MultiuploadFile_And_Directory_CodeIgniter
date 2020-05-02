<?php
		
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Welcome extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('upload_foto');
		$this->load->database();
	}
        
	public function index()
	{
			$data['h'] = $this->upload_foto->get_pic();	 // Mengambil data dari model
		    
			$this->load->view('welcome_message', $data);
	
	}
	
	
	function file_data(){
	  $config['upload_path'] = './uploads/kk';  // Filepath Yang Nantinya Digunakan Untuk Menyimpan Gambar
      $config['allowed_types'] = 'jpg|png|jpeg|gif'; // Format Gambar
      $config['max_size'] = '2048';  //2MB max
      $config['max_width'] = '4480'; // pixel
      $config['max_height'] = '4480'; // pixel
      $config['file_name'] = $_FILES['fotopost']['name']; //Format yang dipakai untuk file karena upload file tidak bisa pakai $_POST
	  $this->load->library('upload', $config, 'upload1'); //Beda upload dan upload1 , upload adalah fungsi dari librart & upload1 Object sendiri
      $this->upload1->initialize($config); // Menjalankan $config
	  $upload1 = $this->upload1->do_upload('fotopost'); // Mengupload atau memasukan file ke folder upload_path

	  
	  $config2['upload_path'] = './uploads/ktp'; // Filepath Yang Nantinya Digunakan Untuk Menyimpan Gambar
	  $config2['allowed_types'] = 'jpg|png|jpeg|gif'; // Format Gambar
	  $config2['max_size'] = '2048';  //2MB max
	  $config2['max_width'] = '4480'; // pixel
	  $config2['max_height'] = '4480'; // pixel
	  $config2['file_name'] = $_FILES['fotopost2']['name']; //Format yang dipakai untuk file karena upload file tidak bisa pakai $_POST
	  $this->load->library('upload', $config, 'upload2'); //Beda upload dan upload1 , upload adalah fungsi dari librart & upload1 Object sendiri
	  $this->upload2->initialize($config2); // Menjalankan $config
	  $upload2 = $this->upload2->do_upload('fotopost2'); // Mengupload atau memasukan file ke folder upload_path

	  $Nama = $this->input->post('Nama', TRUE);

	   if($upload1 && $upload2) //Mengecek File yang diupload ke folder tidak null
	   {

		$foto1 = $this->upload1->data(); //Mengambil data dari upload1
		$foto2 = $this->upload2->data(); //Mengambil data dari upload1

		$data= array(   //Nantinya nama file yang akan dimasukan dari data $foto1 & $foto2
			'id'=> '',
			'Nama' => $Nama,
			'foto' => $foto1['file_name'],
			'foto2' => $foto2['file_name']
		);
		
		$this->upload_foto->save_pic($data); //Mengirim data ke Model
		redirect('Welcome');
		
	   }
	   else
	   {
		
		Echo 'Upload Gagal';
		
	   }
	}
}
