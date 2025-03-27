<?php defined("BASEPATH") or exit("No direct script access allowed");
class Tes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cekLogin();
    }
    public function index()
    {
        $datas = $this->db->get('tb_tes')->result();
        $data = array(
            "page" => "tes/tes_v",
            "menu" => "Halaman tes menu",
            "datas" => $datas
        );
        $this->load->view("index", $data);
    }
    public function update()
    {
        $this->db->where("id", $this->input->post("id"));

        $data = $this->input->post();
        array_shift($data);

        $this->db->update("tb_tes", $data);
        $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Update data berhasil',icon:'success'});");
        redirect("kategori/tes");
    }

    public function simpan()
    {

        $data = $this->input->post();
        array_shift($data);
        $ins = $this->db->insert("tb_tes", $data);
        $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Tambah data berhasil',icon:'success'});");
        redirect("kategori/tes");
    }

    public function delete()
    {
        $data = $this->input->post("id");
        $this->db->where("id", $data);
        $delt = $this->db->delete("tb_tes");
        echo ($delt > 0) ? "1" : "0";

    }
}