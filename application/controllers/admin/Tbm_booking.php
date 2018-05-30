<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbm_booking extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tbm_booking_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('tbm_booking/tbm_booking_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbm_booking_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbm_booking_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID' => $row->ID,
		'date' => $row->date,
		'booking_name' => $row->booking_name,
		'booking_date' => $row->booking_date,
		'duration_start' => $row->duration_start,
		'duration_end' => $row->duration_end,
	    );
            $this->load->view('tbm_booking/tbm_booking_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbm_booking'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbm_booking/create_action'),
	    'ID' => set_value('ID'),
	    'date' => set_value('date'),
	    'booking_name' => set_value('booking_name'),
	    'booking_date' => set_value('booking_date'),
	    'duration_start' => set_value('duration_start'),
	    'duration_end' => set_value('duration_end'),
	);
        $this->load->view('tbm_booking/tbm_booking_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'date' => $this->input->post('date',TRUE),
		'booking_name' => $this->input->post('booking_name',TRUE),
		'booking_date' => $this->input->post('booking_date',TRUE),
		'duration_start' => $this->input->post('duration_start',TRUE),
		'duration_end' => $this->input->post('duration_end',TRUE),
	    );

            $this->Tbm_booking_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tbm_booking'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbm_booking_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbm_booking/update_action'),
		'ID' => set_value('ID', $row->ID),
		'date' => set_value('date', $row->date),
		'booking_name' => set_value('booking_name', $row->booking_name),
		'booking_date' => set_value('booking_date', $row->booking_date),
		'duration_start' => set_value('duration_start', $row->duration_start),
		'duration_end' => set_value('duration_end', $row->duration_end),
	    );
            $this->load->view('tbm_booking/tbm_booking_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbm_booking'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
		'date' => $this->input->post('date',TRUE),
		'booking_name' => $this->input->post('booking_name',TRUE),
		'booking_date' => $this->input->post('booking_date',TRUE),
		'duration_start' => $this->input->post('duration_start',TRUE),
		'duration_end' => $this->input->post('duration_end',TRUE),
	    );

            $this->Tbm_booking_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbm_booking'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbm_booking_model->get_by_id($id);

        if ($row) {
            $this->Tbm_booking_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbm_booking'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbm_booking'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('date', 'date', 'trim|required');
	$this->form_validation->set_rules('booking_name', 'booking name', 'trim|required');
	$this->form_validation->set_rules('booking_date', 'booking date', 'trim|required');
	$this->form_validation->set_rules('duration_start', 'duration start', 'trim|required');
	$this->form_validation->set_rules('duration_end', 'duration end', 'trim|required');

	$this->form_validation->set_rules('ID', 'ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbm_booking.php */
/* Location: ./application/controllers/Tbm_booking.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-30 08:52:12 */
/* http://harviacode.com */