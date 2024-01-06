<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotion extends CI_Controller {

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
    public function index()
    {
        if(!$this->session->userdata("userid")){
            redirect(base_url('auth'));
        }
        $data = array(
            'page' => 'promotion',
            'data' => array(
                'promotion' => $this->Product_model->load_promotion()
            )
        );
        $this->load->view('layout/main',$data);

    }
    public function loadfrom(){
        $action = $this->input->post('frmaction');
        $data = array();
        if($action == "new"){
            $data = array(
                'action'            => 'new',
                'textheader'        => 'เพิ่มข้อมูล',
                'id'                => '',
                'promotion_name'    => '',
                'price_normal'      => '',
                'price_special'     => '',
                'promotion_list'    => array(
                    array(
                        'id'            => '',
                        'item_name'     => '',
                        'amount'        => '',
                        'units'         => ''
                    )
                )
            );
        }else if($action == "edit"){
            $id = $this->input->post('id');
            $data_id = $this->Product_model->load_promotion_id($id);
            $data = array(
                'action'            => 'edit',
                'textheader'        => 'แก้ไขข้อมูล',
                'id'                => $data_id->id,
                'promotion_name'    => $data_id->promotion_name,
                'price_normal'      => $data_id->price_normal,
                'price_special'     => $data_id->price_special,
                'promotion_list'    => $this->Product_model->load_promotion_item($id)
            );
        }else{
            $id = $this->input->post('id');
            $data = array(
                'action'            => 'delete',
                'textheader'        => 'ลบข้อมูล',
                'id'                => $id
            );
        }
        $this->load->view('promotion_form',$data);
    }
    public function save(){
        $action         = $this->input->post('frmaction');
        $id             = $this->input->post('id');
        $promotion      = $this->input->post('promotion');
        $item_id        = $this->input->post('item_id');
        $item_name      = $this->input->post('item_name');
        $amount         = $this->input->post('amount');
        $units          = $this->input->post('units');
        $return = '';
        if($action == "new"){
            $return = $this->Product_model->add_promotion($promotion,$item_name,$amount,$units);
        }else if($action == "edit"){
            $return = $this->Product_model->update_promotion($promotion,$item_name,$amount,$units,$item_id,$id);
        }else{
            $return = $this->Product_model->delete_promotion($id);
        }
        echo $return;
    }
    public function del_itm(){
        $id = $this->input->post('id');
        if($this->db->delete('promotion_item', array('id' => $id))){
            $result = 'success';
        }else{
            $result = 'ผิดพลาด โปรดลองอีกครั้ง';
        }
        return $result;
    }
    public function add_itm(){
        $data = array(
            "promotion_id" =>$this->input->post('promotion_id'),
            "item_name" =>$this->input->post('item_name'),
            "amount" =>$this->input->post('amount'),
            "units" =>$this->input->post('units')
        );
        if($this->db->insert('promotion_item', $data)){
            echo $this->db->insert_id();
        }else{
            echo "";
        }
    }
}
