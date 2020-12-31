<?php
Class Novel extends CI_Controller {
    var $api = "";
    function __construct() {
        parent::__construct();
        $this->api = "http://localhost:8080/restserver/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    // menampilkan data 
    function index() {
        $data['data_novel'] = json_decode($this->curl->simple_get($this->api . '/novel'));
        $this->load->view('novel/v_list.php', $data);
    }
    // simpan data 
    function simpan() {
        if (isset($_POST['submit'])) {
            $data = array(
                'judul' => $this->input->post('judul'),
                'genre' => $this->input->post('genre'),
                'penulis' => $this->input->post('penulis'));
            $insert = $this->curl->simple_post($this->api . '/novel', $data, array(CURLOPT_BUFFERSIZE => 10));
            if ($insert) {
                $this->session->set_flashdata('info', 'data berhasil disimpan.');
            } else {
                $this->session->set_flashdata('info', 'data gagal disimpan.');
            }
            redirect('novel');
        } else {
            $this->load->view('novel/v_form.php');
        }
    }
    // edit data 
    function edit() {
        if (isset($_POST['submit'])) {
            $data = array(
                'id' => $this->input->post('id'),
                'judul' => $this->input->post('judul'),
                'genre' => $this->input->post('genre'),
                'penulis' => $this->input->post('penulis'));
            $update = $this->curl->simple_put($this->api . '/novel', $data, array(CURLOPT_BUFFERSIZE => 10));
           
            if ($update) {
                $this->session->set_flashdata('info', 'Data Berhasil diubah');
            } else {
                $this->session->set_flashdata('info', 'Data Gagal diubah');
            }
            redirect('novel');
        } else {
            $params = array('id' => $this->uri->segment(3));
            $data['judul'] = json_decode($this->curl->simple_get($this->api . '/novel', $params));
            $this->load->view('novel/v_edit', $data);
        }
    }
    // hapus data berdasarkan id
    function delete($id) {
        if (empty($id)) {
            redirect('novel');
        } else {
            $delete = $this->curl->simple_delete($this->api . '/novel', array('id' => $id), array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('info', 'Data Berhasil dihapus');
            } else {
                $this->session->set_flashdata('info', 'Data Gagal dihapus');
            }
            redirect('novel');
        }
    }
}
