<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product_model  extends CI_Model  {
    function __construct()
    {
        parent::__construct();
    }
    public function load(){
        $sql = "SELECT * FROM product ORDER BY id ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function load_id($id){
        $sql = "SELECT * FROM product WHERE id = ?";
        $query = $this->db->query($sql,$id);
        return $query->first_row();
    }
    public function add($data){
        if($this->db->insert('product', $data)){
            $result = 'success';
        }else{
            $result = 'ผิดพลาด โปรดลองอีกครั้ง';
        }
        return $result;
    }
    public function update($id,$data){
        $this->db->where('id',$id);
        if($this->db->update("product",$data)){
            $result = 'success';
        }else{
            $result = 'ผิดพลาด โปรดลองอีกครั้ง';
        }
        return $result;
    }
    public function delete($id,$url){
        $data_id = $this->load_id($id);
        unlink($url.'products/'.$data_id->product_image);
        unlink($url.'products/'.$data_id->product_icon);
        unlink($url.'pdf/'.$data_id->product_pdf);
        if($this->db->delete('product', array('id' => $id))){
            $result = 'success';
        }else{
            $result = 'ผิดพลาด โปรดลองอีกครั้ง';
        }
        return $result;
    }
    public function load_promotion(){
        $sql = "SELECT * FROM promotion ORDER BY id ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function load_promotion_item($id){
        $sql = "SELECT * FROM promotion_item WHERE promotion_id = ?";
        $query = $this->db->query($sql,$id);
        return $query->result();
    }
    public function load_promotion_id($id){
        $sql = "SELECT * FROM promotion WHERE id = ?";
        $query = $this->db->query($sql,$id);
        return $query->first_row();
    }
    public function add_promotion($promotions,$item_name,$amount,$units){

        if($this->db->insert('promotion', $promotions)){
            $promotion_id = $this->db->insert_id();
            foreach ($item_name as $k => $v){
                $data = array(
                  'promotion_id' => $promotion_id,
                  'item_name' => $v,
                  'amount' => $amount[$k],
                  'units' => $units[$k]
                );
                $this->db->insert('promotion_item', $data);
            }
            $result = 'success';
        }else{
            $result = 'ผิดพลาด โปรดลองอีกครั้ง';
        }
        return $result;

    }
    public function update_promotion($promotion,$item_name,$amount,$units,$item_id,$id){
        $result = '';
        try{
               $this->db->where('id',$id);
            if($this->db->update("promotion",$promotion)){
                foreach ($item_id as $k => $v){
                    $data = array(
                        'item_name' => $item_name[$k],
                        'amount' => $amount[$k],
                        'units' => $units[$k]
                    );
                    $this->db->where('id',$v);
                    $this->db->update("promotion_item",$data);
                }
            }
            $result = 'success';

        }catch (Exception $e){
            $result = 'ผิดพลาด โปรดลองอีกครั้ง';
        }
        return $result;
    }
    public function delete_promotion($id){
        $result = '';
        try{
            $this->db->delete('promotion', array('id' => $id));
            $this->db->delete('promotion_item', array('promotion_id' => $id));
            $result = 'success';
        }catch (Exception $e){
            $result = 'ผิดพลาด โปรดลองอีกครั้ง';
        }
        return $result;
    }
}
?>