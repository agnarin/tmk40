<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

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
        $this->load->model('Product_model');
    }
    private function load_config(){
        $query = $this->db->query("SELECT * FROM config");
        return $query->first_row();
    }
    public function index()
    {
        if(!$this->session->userdata("userid")){
            redirect(base_url('auth'));
        }
        $data = array(
            'page' => 'product',
            'data' => array(
                'config'  => $this->load_config(),
                'products' => $this->Product_model->load()
            )
        );
        $this->load->view('layout/main',$data);

    }
    public function loadfrom(){
        $action = $this->input->post('frmaction');
        $cfg = $this->load_config();
        $data = array();
        if($action == "new"){
            $data = array(
                'action'            => 'new',
                'textheader'        => 'เพิ่มข้อมูล',
                'id'                => '',
                'product_name'      => '',
                'product_image'     => '',
                'product_icon'      => '',
                'product_pdf'       => '',
                'price'             => '',
                'url'               => $cfg->urluploadfile
            );
        }else if($action == "edit"){
            $id = $this->input->post('id');
            $data_id = $this->Product_model->load_id($id);
            $data = array(
                'action'            => 'edit',
                'textheader'        => 'เพิ่มข้อมูล',
                'id'                => $id,
                'product_name'      => $data_id->product_name,
                'product_image'     => $data_id->product_image,
                'product_icon'      => $data_id->product_icon,
                'product_pdf'       => $data_id->product_pdf,
                'price'             => $data_id->price,
                'url'               => $cfg->urluploadfile
            );
        }else{
            $id = $this->input->post('id');
            $data_id = $this->Product_model->load_id($id);
            $data = array(
                'action'            => 'delete',
                'textheader'        => 'ลบข้อมูล',
                'id'                => $id,
                'product_name'      => $data_id->product_name,
                'product_image'     => $data_id->product_image,
                'product_icon'      => $data_id->product_icon,
                'product_pdf'       => $data_id->product_pdf,
                'price'             => $data_id->price,
                'url'               => $cfg->urluploadfile
            );
        }
        $this->load->view('product_form',$data);
    }
    public function uploads(){
        $cfg = $this->load_config();
        if($this->input->post('fileType') == 'image'){
            $path = $cfg->upload_path.'products/';
        }else{
            $path = $cfg->upload_path.'pdf/';
        }
        if($this->input->post('filename') !== ''){
            $filename = $this->input->post('filename');
            $delfile  = $path.$filename;
            unlink($delfile);
        }
        $this->load->library('upload');
        $config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $config['max_size']             = 2560000;
        $config['file_name']            = random_string('numeric', 16);

        $this->upload->initialize($config);
        if ($this->upload->do_upload('fileData')){
            $data = $this->upload->data();
            print_r($data['file_name']);
        }else{
            echo "";
        }
    }
    public function save(){
        $cfg = $this->load_config();
        $path = $cfg->upload_path;
        $action = $this->input->post('frmaction');
        $id     = $this->input->post('id');
        $return = '';
        $data = array(
            'product_name'      => $this->input->post('product_name'),
            'product_image'     => $this->input->post('product_image'),
            'product_icon'      => $this->input->post('product_icon'),
            'product_pdf'       => $this->input->post('product_pdf'),
            'price'             => $this->input->post('price')
        );
        if($action == "new"){
            $return = $this->Product_model->add($data);
        }else if($action == "edit"){
            $return = $this->Product_model->update($id,$data);
        }else{
            $return = $this->Product_model->delete($id,$path);
        }
        echo $return;
    }
}
