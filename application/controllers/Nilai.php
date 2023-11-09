<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {
  
    public function index(){
    $usernamecalonsiswa=$this->session->userdata('username');
    $querynisn=$this->db->query("select * from siswa where username='$usernamecalonsiswa'")->result();
    foreach ($querynisn as $rownisn){
        $nisn=$rownisn->nisn;
    }
    //if ($this->session->userdata('level')=='calonsiswa'){
    //$querynisn1=$this->db->query("select * from nilai where nisn='$nisn'");
    //$data['jumlahnisn']=$querynisn1->num_rows();}
    $data['search'] = $this->input->get('search');
    $data['siswa'] = $this->m_crud->tampil_data('siswa')->result();
    $data['nilai'] = $this->db->query("SELECT siswa.nisn as nisn,siswa.nama as nama, total,id_nilai, ipa,inggris,mtk,indo FROM nilai join siswa on nilai.nisn = siswa.nisn where nama like '%".$data['search']."%'")->result();
	$this->load->view('nilai/v_data_nilai',$data);
      }

    public function do_insert(){
        $nisn=$this->input->post('nisn');
        $ipa=$this->input->post('ipa');
        $indo=$this->input->post('indo');
        $mtk=$this->input->post('mtk');
        $inggris=$this->input->post('inggris');
        $total=($inggris+$indo+$mtk+$ipa)/4*60/100;
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
        // Pastikan $nisncalonsiswa didefinisikan sebelum digunakan
        $nisncalonsiswa = "nilai_nisn_yang_anda_inginkan"; // Ganti dengan nilai yang sesuai
        // Selanjutnya, jalankan query database dengan variabel yang sudah didefinisikan
        $nisncalon = $this->db->query("select * from nilai where nisn='$nisncalonsiswa'");
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
