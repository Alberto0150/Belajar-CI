<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Achievement_model extends CI_Model
{
    private $_table = "event"; //nama tabel

    //nama kolom
    public $e_id;
    public $e_nama;
    public $e_sebagai;
    public $e_tanggal;
    public $e_deskripsi;
    public $e_foto = "default.jpg";

    public function rules()
    {
        return [
            ['field' => 'e_nama',
            'label' => 'nama',
            'rules' => 'required'],

            ['field' => 'e_sebagai',
            'label' => 'sebagai',
            'rules' => 'required'],
            
            ['field' => 'e_deskripsi',
            'label' => 'deskripsi',
            'rules' => 'required']
        ];
    }

    //mengambil semua data
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    //mengambil berdasarkan id
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["e_id" => $id])->row();
    }

    //melakukan fungsi save pada create
    public function save()
    {
        $post = $this->input->post();
        $this->e_nama = $post["nama"];
        $this->e_sebagai = $post["sebagai"];
        $this->e_tanggal = $post["tanggal"];
        $this->e_deskripsi = $post["deskripsi"];
        return $this->db->insert($this->_table, $this);
    }

    //melakukan fungsi update
    public function update($id)
    {
        $post = $this->input->post();
        $this->nama = $post["e_nama"];
        $this->sebagai = $post["e_sebagai"];
        $this->e_tanggal = $post["tanggal"];
        $this->deskripsi = $post["e_deskripsi"];
        return $this->db->update($this->_table, $this, array('e_id' => $id));
    }

    //melakukan fungsi delete
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("e_id" => $id));
    }
}