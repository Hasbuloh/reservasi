<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_User extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $this->load->view('admin/login',array('error'=>'','success'=>''));
  }

  function login() {
    $_data = array(
      'email' => $this->input->post('username'),
      'password' => md5($this->input->post('password'))
    );

    $_validate = $this->db->get_where('tbm_user',$_data);

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'You must provide a %s.'));

    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view('admin/login',array('error'=>'',''));
    }else{
      switch ($_validate->num_rows()) {
        case 0:
            $this->load->view('admin/login',array('error'=>'Login Gagal'));
          break;
          default:
            redirect('admin/dashboard');
          break;
      }
    }
  }

}
