<?php

class Upload_foto extends CI_Model{

  public function __construct() 
  {
        parent::__construct(); 
        $this->load->database();
  }

    function save_pic($data){
      
     
        $this->db->insert('upload',$data); //insert foto ke database upload nama tablenya
        
      }

      function get_pic(){
        $query = $this->db->get('upload'); //get nama foto di database 
        return $query;
      }
  }
