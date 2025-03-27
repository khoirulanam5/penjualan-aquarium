<?php defined("BASEPATH") OR exit("No direct script access allowed");
	class Users extends CI_Controller {	
		public function __construct(){
			parent::__construct();
		}
   public function add()
    {
      $cek = $this->db->get_where("tb_users",array("username"=>$this->input->post("username")))->row();
      $cek2 = $this->db->get_where("pelanggan",array("id_pelanggan"=>$this->input->post("username")))->row();
      if(!empty($cek) || !empty($cek2)){
        $this->session->set_flashdata("message", "swal.fire({title: 'Gagal',text: 'Username Sudah Digunakan!!!',icon:'error'});");
        redirect("public/home");
      }
      $data  = array(
        "id_pelanggan"=>$this->input->post("username"),
        "nama_pelanggan"=>$this->input->post("nama_pelanggan"),
        "desa"=>$this->input->post("desa"),
        "kodepos"=>$this->input->post("kodepos"),
        "rt"=>$this->input->post("rt"),
        "rw"=>$this->input->post("rw"),
        "kabupaten"=>$this->input->post("kabupaten"),
        "kecamatan"=>$this->input->post("kecamatan"),
        "no_hp"=>$this->input->post("no_hp"),
        "email"=>$this->input->post("email"),
      );
    // print_r($this->input->post());
      $ins = $this->db->insert( "pelanggan", $data);
      $login  = array(
        "username"=>$this->input->post("username"),    
        "password"=>$this->input->post("password"),    
        "level"=> 'pelanggan',
        "status"=> 1
      );
      $ins = $this->db->insert( "tb_users", $login );
      $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Pendaftaran Berhasil. Silahkan Login',icon:'success'});");
      redirect("public/home");
    }
    public function edit()
    {
      if (!empty($_FILES['gambar']['name'])) {
        if(!empty($this->input->post('gambar_old'))){
          unlink('./images/'.$this->input->post('gambar_old'));
        }
        $upload = array(
          "path" =>'images',
          "type" =>'jpg|jpeg',
          "name" =>'gambar'
        );
        $resp = json_decode(upload_file($upload));
        if(isset($resp->success)){
          $images =  $resp->success->file_name;
        }
      }else{
        $images = $this->input->post('images_old');
      }
      $data  = array(
        "nama_pelanggan"=>$this->input->post("nama_pelanggan"),
        "desa"=>$this->input->post("desa"),
        "kodepos"=>$this->input->post("kodepos"),
        "rt"=>$this->input->post("rt"),
        "rw"=>$this->input->post("rw"),
        "kabupaten"=>$this->input->post("kabupaten"),
        "kecamatan"=>$this->input->post("kecamatan"),
        "no_hp"=>$this->input->post("no_hp"),
        "images"=>$images,
        "email"=>$this->input->post("email"),
      );
      $this->db->where("id_pelanggan",$this->input->post("username"));
      $ins = $this->db->update( "pelanggan", $data);
      $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Update Berhasil',icon:'success'});");
      redirect("public/home");
      // $login  = array(    
        // "password"=>md5($this->input->post("password")),    
      // );
      // $this->db->where("username",$this->input->post("username"));
      // $ins = $this->db->update( "tb_users", $login );
    }
	}
