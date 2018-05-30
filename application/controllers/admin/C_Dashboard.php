<?php
class C_Dashboard extends CI_Controller {
    public $data;
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data = array(
          'page' => 'admin/pages/home'
        );
        $this->load->view('admin/index',$this->data);
    }
}
