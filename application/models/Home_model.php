<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home_model  extends CI_Model  {
    function __construct()
    {
        parent::__construct();
    }
    public function load(){
        $sql = "SELECT * FROM slide_home ORDER BY id ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }


}
?>