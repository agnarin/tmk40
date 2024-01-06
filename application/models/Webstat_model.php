<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Webstat_model  extends CI_Model  {
    function __construct()
    {
        parent::__construct();
        $this->load->library('Detect');
    }
    public function stamp($page1,$page2){
            $detect         = new Detect();
            $devices        = $detect->systemInfo();
            $data = array(
            'session_id'    => $this->session->session_id,
            'ipaddress'     => $this->input->ip_address(),
            'page1'         => $page1,
            'page2'         => $page2,
            'browser'       => $detect->browser(),
            'os'            => $devices['os'],
            'system'        => $devices['device'],
            );

        $this->db->where($data);
        $result = $this->db->get('webstat');
        if($result->num_rows() == 0){
            $this->db->insert('webstat', $data);
        }
        return true;
    }
}
?>