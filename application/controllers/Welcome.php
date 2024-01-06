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
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
    }
	public function index()
	{

        if(!$this->session->userdata("userid")){
            redirect(base_url('auth'));
        }
        $data = array(
            'page' => 'dashboard',
            'data' => array(
                'card'      => array(
                    'stat_home'         => $this->Dashboard_model->webstat_bypage('Home'),
                    'stat_aboutus'      => $this->Dashboard_model->webstat_bypage('Aboutus'),
                    'stat_telecom'      => $this->Dashboard_model->webstat_bypage('Telecommunication'),
                    'stat_cctv'         => $this->Dashboard_model->webstat_bypage('CCTV'),
                    'stat_portfolio'    => $this->Dashboard_model->webstat_bypage('Portfolio'),
                    'stat_contact'      => $this->Dashboard_model->webstat_bypage('Contactus'),
                ),
                'graph'     => $this->Dashboard_model->webstat_bygraph(),
                'devices'   => $this->Dashboard_model->webstat_bydevice()
            )
        );
        $this->load->view('layout/main',$data);

	}
	public function test(){
        $tz = new DateTimeZone("Asia/Bangkok");
        print_r($tz->getLocation());
        print_r(timezone_location_get($tz));
    }
}
