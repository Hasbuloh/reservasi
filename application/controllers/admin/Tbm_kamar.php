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
        'harga' => $row->harga,
        'keyword' => $row->keyword,
        'page' => 'admin/pages/tbm_kamar/tbm_kamar_read'
	    );
            $this->load->view('admin/index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tbm_kamar'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('admin/tbm_kamar/create_action'),
            'ID' => set_value('ID'),
            'no_kamar' => set_value('no_kamar'),
            'no_blok' => set_value('no_blok'),
            'harga' => set_value('harga'),
            'type_kamar' => set_value('type_kamar'),
            'kapasitas' => set_value('kapasitas'),
            'tempat_tidur' => set_value('tempat_tidur'),
            'kamar_mandi' => set_value('kamar_mandi'),
            'deskripsi' => set_value('deskripsi'),
            'keyword' => set_value('keyword'),
            'page' => 'admin/pages/tbm_kamar/tbm_kamar_form',
            'type_kamar' => $this->db->get_where('tbm_codexd',array('type'=>'ROOM_TYPE')),
            'kapasitas' => $this->db->get_where('tbm_codexd',array('type'=>'ROOM_CAPACITY')),
            'type_kasur' => $this->db->get_where('tbm_codexd',array('type'=>'BED_TYPE')),
            'kamar_mandi' => $this->db->get_where('tbm_codexd',array('type'=>'BATH_TYPE'))
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
                'harga' => $this->input->post('harga',TRUE),
                'keyword' => $this->input->post('keyword',TRUE),
                'type_kamar' => $this->input->post('type_kamar',TRUE),
                'kapasitas' => $this->input->post('kapasitas',TRUE),
                'tempat_tidur' => $this->input->post('tempat_tidur',TRUE),
                'kamar_mandi' => $this->input->post('kamar_mandi',TRUE),
                'deskripsi' => $this->input->post('deskripsi',TRUE)
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
                'harga' => set_value('harga', $row->harga),
                'keyword' => set_value('keyword', $row->keyword),
                'type_kamar' => set_value('type_kamar', $row->type_kamar),
                'kapasitas' => set_value('kapasitas',$row->kapasitas),
                'tempat_tidur' => set_value('tempat_tidur',$row->tempat_tidur),
                'kamar_mandi' => set_value('kamar_mandi',$row->kamar_mandi),
                'deskripsi' => set_value('deskripsi',$row->deskripsi),
                'type_kamar' => $this->db->get_where('tbm_codexd',array('type'=>'ROOM_TYPE')),
                'kapasitas' => $this->db->get_where('tbm_codexd',array('type'=>'ROOM_CAPACITY')),
                'type_kasur' => $this->db->get_where('tbm_codexd',array('type'=>'BED_TYPE')),
                'kamar_mandi' => $this->db->get_where('tbm_codexd',array('type'=>'BATH_TYPE')),
                'page' => 'admin/pages/tbm_kamar/tbm_kamar_form'
        );
            // echo "<pre>";print_r($data);
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
                'harga' => $this->input->post('harga',TRUE),
                'keyword' => $this->input->post('keyword',TRUE),
                'type_kamar' => $this->input->post('type_kamar',TRUE),
                'kapasitas' => $this->input->post('kapasitas',TRUE),
                'tempat_tidur' => $this->input->post('tempat_tidur',TRUE),
                'kamar_mandi' => $this->input->post('kamar_mandi',TRUE),
                'deskripsi' => $this->input->post('deskripsi',TRUE)
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
