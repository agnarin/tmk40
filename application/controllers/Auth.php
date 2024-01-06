<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
        $this->load->model('Users_model');
    }
    public function index()
    {
        if($this->input->post()){
            $email = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
            if (preg_match($regex, $email)) {
                if($this->Users_model->email_validate($email)){
                    $users = $this->Users_model->password_validate($email,$password);
                    if($users){
                        $this->Users_model->create_logs($users->id);
                        $session_data = array(
                            "userid"    => $users->id,
                            "useremail" => $email,
                            "username"  => $users->username,
                            "userroles"  => $users->roles

                        );
                        $this->session->set_userdata($session_data);
                        echo "ok";
                    }else{
                        echo "error_password";
                    }
                }else{
                    echo "error_email";
                }

            }else{
                echo "email_error";
            }
        }else{
            redirect(base_url('auth/login'));
        }
    }
    public function login(){
        $this->load->view('layout/login');
    }
}
