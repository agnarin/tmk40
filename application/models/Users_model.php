<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users_model  extends CI_Model  {
    function __construct()
    {
        parent::__construct();
    }
    public function password_validate($email,$password){
        $sql = "SELECT * FROM user WHERE email = ? AND password = ?";
        $query = $this->db->query($sql,array($email,$password));
        if($query->num_rows() == 1){
            //return true;
            return $query->first_row();
        }else{
            return false;
        }
    }
    public function create_logs($userid){
        $data = array(
            "sessionid"    => $this->session->session_id,
            "userid"          => $userid,
            "ipaddress"     => $this->input->ip_address()
        );
        $this->db->insert('login_logs', $data);
        return true;
    }
    public function email_validate($email){
        $sql = "SELECT * FROM user WHERE email = ?";
        $query = $this->db->query($sql,$email);
        if($query->num_rows() == 1){
            return true;
        }else{
            return false;
        }
    }
}
?>