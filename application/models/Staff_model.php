<?php

class Staff_model extends CI_Model {
    
    
    function __consturct() {
        parent::__construct();
        
    }

    public function getResult() {
        $results = $this->db->dbprefix('results');
        $sql      = "SELECT * FROM $results WHERE `user_type`='Staff' ";
        $query    = $this->db->query($sql);
        $result   = $query->result();
        return $result;
    }

}
?>