<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Kamar extends CI_Controller{
  public $data;
  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $this->data = array(
      'page' => 'admin/pages/kamar'
    );

    $this->load->view('admin/index',$this->data);
  }

  // fungsi-fungsi crud disini

  public function generate_nomor() {
    $this->db->select_max('no_kamar');
    $idmax = $this->db->get('tbm_kamar')->result();

    $newid = (int) substr($idmax[0]->no_kamar,1,3);
    $newid++;

    $id = sprintf('A'.'%03d',$newid);

    echo json_encode(array('nomor'=>$id));
  }

  public function list() {
    $items = $this->db->get('tbm_kamar');
    $no = 1;
    $data = array();
    foreach($items->result() as $item):
      $row = array();
      $row[] = $no;
      $row[] = $item->no_kamar;
      $row[] = $this->konversi_rp(array('nominal'=>$item->harga));
      $row[] = $this->btn_delete(array('id'=>$item->ID));
      $row[] = $this->btn_edit();
      $data[] = $row;
      $no++;
    endforeach;

    echo json_encode(array('data'=>$data));
  }

  public function add() {
    $status = (bool) false;
    $data = array(
      'no_kamar' => $this->input->post('nomor'),
      'harga' => $this->input->post('harga')
    );

    if ($this->db->insert('tbm_kamar',$data)):
        $status = (bool) true;
    endif;

    echo json_encode(array('status'=>$status));
  }

  public function delete() {
    $status = (bool) false;
    $id = $this->input->post('id');

    if ($this->db->delete('tbm_kamar',array('ID'=>$id))) {
      $status = (bool) true;
    }

    echo json_encode(array('status'=>$status));
  }

  // fungsi-fungsi crud berakhir disini

  public function btn_edit() {
    return (string) "<a href=\"#\" class=\"btn btn-danger btn-sm\"><i class=\"fa fa-pencil fa-fw\"></i></a>";
  }

  public function btn_delete($string) {
    return (string) "<a href=\"javascript:void(0)\" onclick=\"hapus({$string['id']})\" class=\"btn btn-trash btn-sm\"><i class=\"fa fa-pencil fa-fw\"></i></a>";
  }

  public function konversi_rp($string) {
    return (string) number_format($string['nominal'],0,',','.');
  }
}
