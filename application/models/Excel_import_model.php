<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_import_model extends CI_Model {

    public function select() {
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('mahasiswa');
        return $query;
    }

    public function insert($data) {
        $this->db->insert_batch('mahasiswa', $data);
    }

}