<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
        $this->load->view("Mine", $data);
		$this->load->view('template/foot');
	}

	public function about()
	{
		// fungsi untuk me-load view about.php
		$this->load->view('template/head');
		$this->load->view('about');
		$this->load->view('template/foot');
	}

	public function contact()
	{
		// fungsi untuk me-load view contact.php
		$this->load->view('contact');
	}

}
