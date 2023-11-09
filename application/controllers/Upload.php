<?php 

class Upload extends CI_Controller{

	function __construct(){
		parent::__construct();
		  $this->load->helper(array('form', 'url'));
	}

	public function index(){
		$a="asd";
		$this->load->view('v_upload', array('error' => $a ));
	}

	public function aksi_upload(){
		$config['upload_path']          = './image/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;


	

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('v_upload', $error);
		}else{
            $data = array(
                'upload_data' => $this->upload->data(),
              // 'foto' => $this->upload->data(['file_name'])
			);
			$data1 = array(
               // 'upload_data' => $this->upload->data(),
				'foto' => $data['upload_data']['file_name'],
				'username' => $this->session->userdata('username')
            );
            $this->m_crud->insert_data($data1,'siswa');
			$this->load->view('v_upload_sukses', $data);
		}
	}
	
}