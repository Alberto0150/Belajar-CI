<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class backend extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();
        $this->load->model("achievement_model");
        $this->load->library('form_validation');
    }

	public function index()
	{
		$this->load->view('template/head');

		// fungsi untuk me-load data.php
        $data["listAchievement"] = $this->achievement_model->getAll();
		// memilih di file apa dia digunakan
        $this->load->view("backend_db", $data);
		$this->load->view('template/foot');
	}

	public function add()
    {
        $the_event = $this->Achievement_model; //deklarasi model untuk buat baru
        $validation = $this->form_validation;	// mempersiapkan untuk fungsi validasi dengan rules pada model
        $validation->set_rules($the_event->rules());	// mengatur nilai validasi berdasarkan fungsi rules pada model

        if ($validation->run()) {	//melakukan proses validasi
            $the_event->save();		//melakukan penyimpanan pada database
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("template/form_event_new");
    }

	public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/products');
       
        $product = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["product"] = $product->getById($id);
        if (!$data["product"]) show_404();
        
        $this->load->view("template/form_event_edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->product_model->delete($id)) {
            redirect(site_url('admin/products'));
        }
    }

}
