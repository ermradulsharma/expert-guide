<?php

class User_model extends CI_Model {
    
    
    function __consturct() {
        parent::__construct();
        
    }
    
    public function games(){
        
        $games =  $this->db->query("SELECT * FROM markets where id > 0 ")->result_array();
        
        if(isset($games[0])){
            for($i=0;$i<count($games);$i++){
                
                $games[$i]['open_games'] = $this->db->query("SELECT * FROM results WHERE type = 'OPEN' AND market_id = '".$games[$i]['id']."' AND DATE(date) = '".date('Y-m-d')."'")->row_array();
                 $games[$i]['close_games'] = $this->db->query("SELECT * FROM results WHERE type = 'CLOSE' AND market_id = '".$games[$i]['id']."' AND DATE(date) = '".date('Y-m-d')."'")->row_array();
            }
        }
        
        return $games;
    }
    
    
    public function file_upload($file,$path){
    
                $config = array(
                        'upload_path' => $file,
                        'allowed_types' => "gif|jpg|png|jpeg|pdf",
                        'encrypt_name'  => TRUE,
                        'max_size' => "40480000", // Can be set to particular file size , here it is 4 MB(2048 Kb)
                        'max_height' => "2100",
                        'max_width' => "2100"
                    );

                    $this->load->library('Upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('wallet_img')) {
                        $response['status']  = 'error';
                        $response['message'] = $this->upload->display_errors();
                        
                    } else {
                        $path                = $this->upload->data();
                        $response['status']  = 'success';
                        $response['message'] = "Photo upload";
                        $response['name'] = $file."/".$path['file_name'];

                    }
                    
                    
                    return   $response;
}
}
?>