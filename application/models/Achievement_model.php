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
            'rules' => 'required']

            // ['field' => 'e_sebagai',
            // 'label' => 'sebagai',
            // 'rules' => 'required'],
            
            // ['field' => 'e_deskripsi',
            // 'label' => 'deskripsi',
            // 'rules' => 'required']
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
        $this->e_foto = $this->_uploadImage();
        return $this->db->insert($this->_table, $this);
    }

    //melakukan fungsi update
    public function update()
    {
        $post = $this->input->post();
        $this->e_id = $post['id'];
        $this->e_nama = $post["e_nama"];
        $this->e_sebagai = $post["e_sebagai"];
        $this->e_tanggal = $post["e_tanggal"];
        $this->e_deskripsi = $post["e_deskripsi"];
        if (!empty($_FILES["e_foto"]["name"])) {
            $this->e_foto = $this->_uploadImage();
        } else {
            $this->e_foto = $post["old_image"];
        }
        return $this->db->update($this->_table, $this, array('e_id' => $post['id']));
    }

    //melakukan fungsi delete
    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("e_id" => $id));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './event_image/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            =  strval($this->e_id);
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('e_foto')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }

    private function _deleteImage($id)
    {
        $del_foto = $this->getById($id);
        if ($del_foto->e_foto != "default.jpg") {
            $filename = explode(".", $del_foto->e_foto)[0];
            return array_map('unlink', glob(FCPATH."event_image/$filename.*"));
        }
    }
}