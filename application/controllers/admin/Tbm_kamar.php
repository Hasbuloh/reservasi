<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbm_kamar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Tbm_kamar_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {   
        $data = array(
            'page' => 'admin/pages/tbm_kamar/tbm_kamar_list'
        );

        $this->load->view('admin/index',$data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbm_kamar_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbm_kamar_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID' => $row->ID,
		'no_kamar' => $row->no_kamar,
		'no_blok' => $row->no_blok,
	    );
            $this->load->view('tbm_kamar/tbm_kamar_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbm_kamar'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/tbm_kamar/create_action'),
            'ID' => set_value('ID'),
            'no_kamar' => set_value('no_kamar'),
            'no_blok' => set_value('no_blok'),
            'page' => 'admin/pages/tbm_kamar/tbm_kamar_form'
	);
        
    $this->load->view('admin/index', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'no_kamar' => $this->input->post('no_kamar',TRUE),
		'no_blok' => $this->input->post('no_blok',TRUE),
	    );

            $this->Tbm_kamar_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/tbm_kamar'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbm_kamar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/tbm_kamar/update_action'),
		'ID' => set_value('ID', $row->ID),
		'no_kamar' => set_value('no_kamar', $row->no_kamar),
        'no_blok' => set_value('no_blok', $row->no_blok),
        'page' => 'admin/pages/tbm_kamar/tbm_kamar_form'
	    );
            $this->load->view('admin/index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tbm_kamar'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
		'no_kamar' => $this->input->post('no_kamar',TRUE),
		'no_blok' => $this->input->post('no_blok',TRUE),
	    );

            $this->Tbm_kamar_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/tbm_kamar'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbm_kamar_model->get_by_id($id);

        if ($row) {
            $this->Tbm_kamar_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/tbm_kamar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tbm_kamar'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('no_kamar', 'no kamar', 'trim|required');
        $this->form_validation->set_rules('no_blok', 'no blok', 'trim|required');

        $this->form_validation->set_rules('ID', 'ID', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbm_kamar.php */
/* Location: ./application/controllers/Tbm_kamar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-30 08:52:12 */
/* http://harviacode.com */