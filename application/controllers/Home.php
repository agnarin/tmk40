<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
    function __construct()
    {
        parent::__construct();
        $this->load->model('Portfolio_model');
        $this->load->model('Home_model');
    }
	public function index()
	{
        $this->Webstat_model->stamp('Home','');
	    $cfg  = $this->load_config();
	    $data = array(
	        "page" => "home",
            "data" => array(
                "data_img" => $this->Portfolio_model->load_by_group(),
                "url_img"  => $cfg->urluploadfile.'/portfolio/',
                'url'      => $cfg->urluploadfile.'/slide_home/',
                'slide_image' => $this->Home_model->load()
            )
        );
        $this->load->view('layouts/main',$data);
	}
    private function load_config(){
        $query = $this->db->query("SELECT * FROM config");
        return $query->first_row();
    }
}
