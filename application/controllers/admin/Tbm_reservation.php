<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbm_reservation extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tbm_reservation_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('tbm_reservation/tbm_reservation_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbm_reservation_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbm_reservation_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID' => $row->ID,
		'kode_unik' => $row->kode_unik,
	    );
            $this->load->view('tbm_reservation/tbm_reservation_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbm_reservation'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbm_reservation/create_action'),
	    'ID' => set_value('ID'),
	    'kode_unik' => set_value('kode_unik'),
	);
        $this->load->view('tbm_reservation/tbm_reservation_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_unik' => $this->input->post('kode_unik',TRUE),
	    );

            $this->Tbm_reservation_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tbm_reservation'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbm_reservation_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbm_reservation/update_action'),
		'ID' => set_value('ID', $row->ID),
		'kode_unik' => set_value('kode_unik', $row->kode_unik),
	    );
            $this->load->view('tbm_reservation/tbm_reservation_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbm_reservation'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
		'kode_unik' => $this->input->post('kode_unik',TRUE),
	    );

            $this->Tbm_reservation_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbm_reservation'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbm_reservation_model->get_by_id($id);

        if ($row) {
            $this->Tbm_reservation_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbm_reservation'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbm_reservation'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_unik', 'kode unik', 'trim|required');

	$this->form_validation->set_rules('ID', 'ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbm_reservation.php */
/* Location: ./application/controllers/Tbm_reservation.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-30 08:52:12 */
/* http://harviacode.com */