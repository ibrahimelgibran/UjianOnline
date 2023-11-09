<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('Mobile_Detect');
    }
  
    public function index(){
    $this->load->view('v_login'); 
    //$data['judul'] = 'Halaman Utama';
    //$detect = new Mobile_Detect;
    //$this->load->view('v_home', $data);
    
    //if($detect->isMobile()) {
      //  redirect('http://google.com');
    //}
      }
    
      public function register(){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $c_password=$this->input->post('c_password');
        $queryusername = $this->db->query("select username and password from user where username='$username'");
        $cekusername=$queryusername->num_rows();
        $level="calonsiswa";
        $pass=md5($password);

        $datauser = array(
          'username' => $username,
          'password' => $pass,
          'level' => $level,
      );

        if ($cekusername>0){
          echo "<script language='javascript'>
            alert('Username Telah Digunakan');
            window.location='../login';
            </script>";
        }
        elseif ($password!=$c_password){
        echo "<script language='javascript'>
        alert('Password dan Confirm Password Beda');
        window.location='../login';
        </script>";
       }
       else {
         
        $this->m_crud->insert_data($datauser,'user');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Mendaftar</h4>
                    </div>');  
        redirect('login');
       }
    }

      public function form() {
        //$detect = new Mobile_Detect;
          $username=$this->input->post('username');
          $password=$this->input->post('password');
          $password=md5($password);
          $login = $this->db->query("select username and password from user where username='$username' and password='$password'");
          $login1 = $this->db->query("select * from user where username='$username' and password='$password'")->result(); 
          $ceklogin = $login->num_rows();
          foreach ($login1 as $query) {}

          //   if($detect->isMobile()) {
        //redirect('mobile');
    

          if ($ceklogin > 0) {

            $userData = array(
              'username' => $query->username,
              'level' => $query->level,
            );
            $this->session->set_userdata($userData);

            if ($query->level == 'operator'){
              redirect ('dashboard');
            }

            elseif ($query->level == 'kepsek'){
              redirect ('dashboard');
            }
            elseif ($query->level == 'calonsiswa'){
              redirect ('dashboard');
            }
            
          }
          else {
            echo "<script language='javascript'>
            alert('Username atau Password Salah');
         window.location='../login';
</script>";
}
          //}
      }

      public function logout()
  {
    //Menghapus semua session (sesi)
    $this->session->sess_destroy();
    redirect('login');
  }
}
