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
    public function new_form()
    {
        $this->load->view('template/head');
		$this->load->view('template/form_event_new');
		$this->load->view('template/foot');
    }

    // public function edit_form($id = null)
    // {
    //     $this->load->view('template/head');
	// 	$this->load->view('template/form_event_edit',$id);
	// 	$this->load->view('template/foot');
    // }

	public function add()
    {
        $the_event = $this->achievement_model; //declare to create new
        // $validation = $this->form_validation;	// declare rules for validation
        // $validation->set_rules($the_event->rules());	// apply rule to the new item

        // if ($validation->run()) {	//run validating item
            $the_event->save();		//save new item into database
            $this->session->set_flashdata('success', 'item Saved');
        // }
        $this->load->view("template/form_event_new"); //directing to make another new form
    }

	public function edit_form($id = null)
    {
        if (!isset($id)) redirect('backend'); //redirect if there is no id
       
        $the_event = $this->achievement_model;
        $validation = $this->form_validation;
        $validation->set_rules($the_event->rules());

        if ($validation->run()) {
            $the_event->update();
            $this->session->set_flashdata('success', 'item Saved');
        }

        $data["listAchievement"] = $the_event->getById($id);
        if (!$data["listAchievement"]) show_404();
        
        $this->load->view("template/form_event_edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->achievement_model->delete($id)) {
            redirect(site_url('../backend'));
        }
    }

}
