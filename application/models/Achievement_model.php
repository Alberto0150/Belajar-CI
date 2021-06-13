<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "event"; //nama tabel

    //nama kolom
    public $e_id;
    public $e_nama;
    public $e_sebagai;
    public $e_tanggal;
    public $e_deskripsi;
    public $e_foto;

    public function rules()
    {
        return [
            ['field' => 'e_nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'e_sebagai',
            'label' => 'Sebagai',
            'rules' => 'required'],
            
            ['field' => 'e_deskripsi',
            'label' => 'deskripsi',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["e_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->name = $post["e_nama"];
        $this->price = $post["e_sebagai"];
        $this->description = $post["e_deskripsi"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->name = $post["e_nama"];
        $this->price = $post["e_sebagai"];
        $this->description = $post["e_deskripsi"];
        return $this->db->update($this->_table, $this, array('e_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("e_id" => $id));
    }
}