<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbm_booking_model extends CI_Model
{

    public $table = 'tbm_booking';
    public $id = 'ID';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('ID,date,booking_name,booking_date,duration_start,duration_end');
        $this->datatables->from('tbm_booking');
        //add this line for join
        //$this->datatables->join('table2', 'tbm_booking.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('tbm_booking/read/$1'),'Read')." | ".anchor(site_url('tbm_booking/update/$1'),'Update')." | ".anchor(site_url('tbm_booking/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'ID');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('ID', $q);
	$this->db->or_like('date', $q);
	$this->db->or_like('booking_name', $q);
	$this->db->or_like('booking_date', $q);
	$this->db->or_like('duration_start', $q);
	$this->db->or_like('duration_end', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID', $q);
	$this->db->or_like('date', $q);
	$this->db->or_like('booking_name', $q);
	$this->db->or_like('booking_date', $q);
	$this->db->or_like('duration_start', $q);
	$this->db->or_like('duration_end', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Tbm_booking_model.php */
/* Location: ./application/models/Tbm_booking_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-30 08:52:12 */
/* http://harviacode.com */