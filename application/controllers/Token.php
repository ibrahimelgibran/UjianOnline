<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Token extends CI_Controller {
  
    public function index(){
        $usernamecalonsiswa=$this->session->userdata('username');
    $querynisn=$this->db->query("select * from siswa where username='$usernamecalonsiswa'")->result();
    
    foreach ($querynisn as $rownisn)
    {
        $nisn = $rownisn->nisn;
    }
    if (is_null($nisn)){
        $this->session->set_flashdata('msg', 
            '<div class="alert alert-danger">
                <h4>Silahkan Daftar Terlebih Dahulu</h4>
            </div>');  
redirect('dashboard');
    }
    else {
    $data['token']=$this->db->query("select * from token where nisn='$nisn'")->result();
}
    // $data['token']=$data['token1']->num_rows();
    $this->load->view('token/v_token',$data);
      }

    public function do_insert(){
        $nisn=$this->input->post('nisn');
        $ipa=$this->input->post('ipa');
        $indo=$this->input->post('indo');
        $mtk=$this->input->post('mtk');
        $inggris=$this->input->post('inggris');
        $total=($inggris+$indo+$mtk+$ipa)/4;
        $sesicalonsiswa=$this->session->userdata('level')=='calonsiswa';
        $sesioperator=$this->session->userdata('level')=='operator';
        $usernamecalonsiswa=$this->session->userdata('username');
        $querynisn=$this->db->query("select * from siswa where username='$usernamecalonsiswa'")->result();
        foreach ($querynisn as $rownisn){
            $nisncalonsiswa=$rownisn->nisn;
        }
        $ceknisn12=$this->db->query("select * from nilai where nisn='$nisn'");
        $ceknisn1 = $ceknisn12->num_rows();
        //$nisncalonsiswa=0;
        $nisncalon=$this->db->query("select * from  nilai where nisn='$nisncalonsiswa'");
        $ceknisn = $nisncalon->num_rows();

        $data = array(
            'nisn' => $nisn,
            'ipa' => $ipa,
            'mtk' => $mtk,
            'inggris' => $inggris,
            'indo' => $indo,
            'total' => $total,
        );

        $data1 = array(
            'nisn' => $nisncalonsiswa,
            'ipa' => $ipa,
            'mtk' => $mtk,
            'inggris' => $inggris,
            'indo' => $indo,
            'total' => $total,

        );
    if ($sesioperator){
        if ($ceknisn1 > 0){
            $this->session->set_flashdata('msg', 
            '<div class="alert alert-danger">
                <h4>Anda Sudah Input Nilai</h4>
            </div>');  
redirect('nilai');
        }
    elseif (!empty($ipa)&&!empty($nisn)&&!empty($mtk)&&!empty($inggris)&&!empty($indo))
         {
        $this->m_crud->insert_data($data,'nilai');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Insert Data</h4>
                    </div>');  
        redirect('nilai');
    }
    
    else {
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-danger">
                        <h4>Semua Nilai Harus Diisi</h4>
                    </div>');  
        redirect('nilai');
    }

    }
    elseif ($sesicalonsiswa){
        if ($ceknisn > 0){
            $this->session->set_flashdata('msg', 
            '<div class="alert alert-danger">
                <h4>Anda Sudah Input Nilai</h4>
            </div>');  
redirect('nilai');
        }
        elseif (!empty($ipa)&&!empty($mtk)&&!empty($inggris)&&!empty($indo))
         {
        $this->m_crud->insert_data($data1,'nilai');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Insert Data</h4>
                    </div>');  
        redirect('nilai');
    }
    
    else {
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-danger">
                        <h4>Semua Nilai Harus Diisi</h4>
                    </div>');  
        redirect('nilai');
    }

    }
}

    function hapus($id){
        $where = array('id_nilai' => $id);
        $this->m_crud->hapus_data($where,'nilai');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Hapus Data</h4>
                    </div>');  
        redirect('nilai');
      }
    function edit($id){
		$where = array('id_nilai' => $id);
        $data['nilai'] = $this->m_crud->edit_data($where,'nilai')->result();
		$this->load->view('nilai/v_edit_nilai', $data);
    }

    function update(){
        $id=$this->input->post('id');;
        $ipa=$this->input->post('ipa');
        $indo=$this->input->post('indo');
        $mtk=$this->input->post('mtk');
        $inggris=$this->input->post('inggris');
        $total=($inggris+$indo+$mtk+$ipa)/4;

        $data = array(
            'ipa' => $ipa,
            'mtk' => $mtk,
            'inggris' => $inggris,
            'indo' => $indo,
            'total' => $total,

        );
        $where = array(
            'id_nilai' => $id
        );
     
        $this->m_crud->update_data($where,$data,'nilai');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Update Data</h4>
                    </div>');  
        redirect('nilai');
        }
    
}
