<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard_model  extends CI_Model  {
    function __construct()
    {
        parent::__construct();
    }
    public function webstat_bypage($page){
        $data = array(
            'page1' => $page
        );
        $this->db->where($data);
        $result = $this->db->get('webstat');
        return $result->num_rows();
    }
    public function webstat_bymonth(){
        $years = date('Y');
        $sql = "SELECT DATE_FORMAT(access_date,'%m') AS months,DATE_FORMAT(access_date,'%Y') AS years,system 
FROM webstat WHERE DATE_FORMAT(access_date,'%Y') = ? 
GROUP BY ipaddress ORDER BY access_date ASC ";
        $query = $this->db->query($sql,$years);
        return $query->result();
    }
    public function webstat_bygraph(){
        $webstat = $this->webstat_bymonth();
        $months  = array('01','02','03','04','05','06','07','08','09','10','11','12');
        $showstat = array();
        foreach ($months as $ofmonth){
            $i = 0;
            foreach ($webstat as $row){
                if($ofmonth == $row->months){
                    $i++;
                }
            }
            array_push($showstat,$i);
        }
        return json_encode($showstat);
    }
    public function webstat_bydevice(){
        $webstat = $this->webstat_bymonth();
        $months  = array('SYSTEM','MOBILE');
        $showstat = array();
        foreach ($months as $ofmonth){
            $i = 0;
            foreach ($webstat as $row){
                if($ofmonth == $row->system){
                    $i++;
                }
            }
            array_push($showstat,$i);
        }
        return json_encode($showstat);
    }
}
?>