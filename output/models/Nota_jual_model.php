<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nota_jual_model extends CI_Model
{

    public $table = 'nota_jual';
    public $id = 'id_nota';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
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
        $this->db->like('id_nota', $q);
	$this->db->or_like('tgl_jual', $q);
	$this->db->or_like('diskon_total', $q);
	$this->db->or_like('id_grup', $q);
	$this->db->or_like('ongkir', $q);
	$this->db->or_like('status_bayar', $q);
	$this->db->or_like('rek_bank', $q);
	$this->db->or_like('nm_konsumen', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_nota', $q);
	$this->db->or_like('tgl_jual', $q);
	$this->db->or_like('diskon_total', $q);
	$this->db->or_like('id_grup', $q);
	$this->db->or_like('ongkir', $q);
	$this->db->or_like('status_bayar', $q);
	$this->db->or_like('rek_bank', $q);
	$this->db->or_like('nm_konsumen', $q);
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

/* End of file Nota_jual_model.php */
/* Location: ./application/models/Nota_jual_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-01 07:02:28 */
/* http://harviacode.com */