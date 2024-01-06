<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Portfolio_model  extends CI_Model  {
    function __construct()
    {
        parent::__construct();
    }
    public function load(){
        $sql = "SELECT * FROM gallery ORDER BY id DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function load_by_group(){
        $sql = "SELECT * FROM `gallery` GROUP  BY project_id ORDER BY id ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function load_project(){
        $sql = "SELECT * FROM project ORDER BY project_id ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function load_project_id($id){
        $sql = "SELECT * FROM project WHERE project_id = ?";
        $query = $this->db->query($sql,$id);
        return $query->first_row();
    }
    public function load_gallery_project_id($id){
        $sql = "SELECT * FROM gallery WHERE project_id = ?";
        $query = $this->db->query($sql,$id);
        return $query->result();
    }
    public function load_id($id){
        $sql = "SELECT * FROM gallery WHERE id = ?";
        $query = $this->db->query($sql,$id);
        return $query->first_row();
    }
    public function add_project($data){
        if($this->db->insert('project', $data)){
            $result = 'success';
        }else{
            $result = 'ผิดพลาด โปรดลองอีกครั้ง';
        }
        return $result;
    }
    public function update_project($id,$data){
        $this->db->where('project_id',$id);
        if($this->db->update("project",$data)){
            $result = 'success';
        }else{
            $result = 'ผิดพลาด โปรดลองอีกครั้ง';
        }
        return $result;
    }
    public function delete_project($id,$url){
        $result = 'success';
        try {
            $data =  $this->load_gallery_project_id($id);
            $this->db->delete('project', array('project_id' => $id));
            foreach ($data as $data_id){
                $delfile  = $url.$data_id->image;
                unlink($delfile);
                if($this->db->delete('gallery', array('id' => $data_id->id))){
                    $result = 'success';
                }else{
                    break;
                    $result = 'ผิดพลาด โปรดลองอีกครั้ง';
                }
            }

        } catch (Exception  $e){
            $result = 'ผิดพลาด โปรดลองอีกครั้ง';
        }
        return $result;
    }
    public function add($data){
        if($this->db->insert('gallery', $data)){
            $result = 'success';
        }else{
            $result = 'ผิดพลาด โปรดลองอีกครั้ง';
        }
        return $result;
    }
    public function update($id,$data){
        $this->db->where('id',$id);
        if($this->db->update("gallery",$data)){
            $result = 'success';
        }else{
            $result = 'ผิดพลาด โปรดลองอีกครั้ง';
        }
        return $result;
    }
    public function delete($id,$url){
        $data_id = $this->load_id($id);
        $delfile  = $url.$data_id->image;
        unlink($delfile);
        if($this->db->delete('gallery', array('id' => $id))){
            $result = 'success';
        }else{
            $result = 'ผิดพลาด โปรดลองอีกครั้ง';
        }
        return $result;
    }

}
?>