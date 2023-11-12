<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
    
  
    
    function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        $this->load->database();
        $this->load->model('Admin_model');
        $this->load->model('login_model');
        $this->load->model('User_model');
        $this->load->model('Staff_model');
        
        
       $this->user = $this->db->query("SELECT * FROM users where user_id = '".$this->session->userdata('user_login_id')."'")->row();
        
       
    }
    
    
    public function wallet(){
        
        $data['wallets'] = $this->db->query("SELECT * FROM wallets WHERE user_id = ".  $this->user->id." order by id desc " )->result();
        $data['amount'] = $this->db->query("SELECT * FROM user_wallets WHERE user_id = ". $this->user->id)->row_array();
        return $this->load->view('user/wallet', $data);
    }
    
    public function add_wallet_transion(){
        
        $input = $this->input->post();

       if (!empty(@$_FILES['wallet_img']['name'])) {
                    $file_name = $_FILES['wallet_img']['name'];
                    $fileSize  = $_FILES["wallet_img"]["size"] / 1024;
                    $fileType  = $_FILES["wallet_img"]["type"];

                    $config = array(
                        'upload_path' => "./assets/img/wallet",
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
                        $this->output->set_output(json_encode($response));
                    } else {
                        $path                = $this->upload->data();
                        $img_url             = $path['file_name'];
                       $wallet = ['user_id' => $this->user->id , 'amount' => @$input['amount'] , 'utr' => $input['digit'] ,'image' => "./assets/img/wallet/".$img_url ];
                       $this->db->insert('wallets',$wallet);
                        
                     
                        $response['status']  = 'success';
                        $response['message'] = "Successfully Added";

                        $this->output->set_output(json_encode($response));
                    }
        
      
        
        echo json_encode(['status' => 'success' , 'message' => 'Wallet amount added succefully']);
        return;
       }
         echo json_encode(['status' => 'error' , 'message' => 'All filed is required.']);
        return;
      
    }
    
    public function index(){
        if ($this->session->userdata('user_login_access') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('user_login_access') == 1)
            $data = array();
      
    
        redirect('user/dashboard');
    }
    /*Dashboard section*/
    public function dashboard(){
        if ($this->session->userdata('user_login_access') != False) {
            $data             = array();
            $data['games'] =   $this->User_model->games();
            $data['mrkt'] = $this->Admin_model->getmarkets();
            $data['current_date'] = date('h:i:s');
            $userid           = $this->session->userdata('user_login_id');
            
            $this->load->view('user/dashboard', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
     /*user profile*/
    public function View_profile(){
        if ($this->session->userdata('user_login_access') != False) {
            $userid                = base64_decode($this->input->get('U'));
            $data                  = array();
            $data['settingsvalue'] = $this->Admin_model->getSettingsValue();
            $data['profile']       = $this->Admin_model->getProfileValue($userid);
            $data['usernote']      = $this->Admin_model->getUserNotes($userid);
            $this->load->view('user/profile', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }



      public function results(){ 
        if ($this->session->userdata('user_login_access') != False) {
            $id  =  $this->session->userdata('user_login_id');
            $data             = array();
            $data['mrkt'] = $this->Admin_model->getmarkets();
            $data['requestlist'] = $this->Admin_model->getallresults($id);
            $data['users'] = $this->Admin_model->getAllUsers();
            $data['mrkt'] = $this->Admin_model->getmarkets();
            $this->load->view('user/results', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

     /*product Markets validation*/
    
    public function resultsById(){                       
        if ($this->session->userdata('user_login_access') != False) {
            $id               = $this->input->get('id');
            $data['ResultValue'] = $this->Admin_model->getResultValueById($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    # user delect
    public function result_delet(){
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->get('id');
            $this->Admin_model->delet_Result($id);
             redirect('user/results', 'refresh');
            if ($this->db->affected_rows()) {
                $profile    = $this->Admin_model->getResultValue($id);
                
            } else {
                redirect('user/results', 'refresh');
            }
        }
    }

    public function single(){ 
        if ($this->session->userdata('user_login_access') != False) {
            $id  =  $this->session->userdata('user_login_id');
            $data             = array();
            $data['mrkt'] = $this->Admin_model->getmarkets();
            $data['requestlist'] = $this->Admin_model->getsingledata($id);
            $data['users'] = $this->Admin_model->getAllUsers();
            $data['mrkt'] = $this->Admin_model->getmarkets();
            $this->load->view('user/single', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function save_single(){ 
        if ($this->session->userdata('user_login_access') != False) {
            
            $user_id = $this->input->post('user_id');
            $user_type = $this->input->post('user_type');
            $market_id = $this->input->post('market_id');
            $type   = $this->input->post('type');
            $amount   = $this->input->post('amount');
            $digit = $this->input->post('digit');
            $date = date('Y-m-d');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('market_id', 'Markets name', 'trim|xss_clean|required');
            $this->form_validation->set_rules('type', 'Type', 'trim|required|xss_clean');
            $this->form_validation->set_rules('amount', 'Amount', 'trim|min_length[0]|required|xss_clean');
            $this->form_validation->set_rules('digit', ' Digit', 'required');
    
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    //'id' => $id,
                    'user_id' => $user_id,
                    'user_type' => $user_type,
                    'market_id' => $market_id,
                    'game' => 'SINGLE',
                    'type' => $type,
                    'amount' => $amount,
                    'digit' => $digit,
                    'date' => $date
                    
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updatesingle($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertsingle($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function single_delet(){ 
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->get('id');
            $this->Admin_model->delet_single($id);
             redirect('user/single', 'refresh');
           
        }
    }
    

    public function panna(){ 
        if ($this->session->userdata('user_login_access') != False) {
            $id  =  $this->session->userdata('user_login_id');
            $data             = array();
            $data['mrkt'] = $this->Admin_model->getmarkets();
            $data['requestlist'] = $this->Admin_model->getpannadata($id);
            $data['users'] = $this->Admin_model->getAllUsers();
            $data['mrkt'] = $this->Admin_model->getmarkets();
            $this->load->view('user/panna', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function save_panna(){
        if ($this->session->userdata('user_login_access') != False) {
            $user_id = $this->input->post('user_id');
            $user_type = $this->input->post('user_type');
            $market_id = $this->input->post('market_id');
            $type   = $this->input->post('type');
            $amount   = $this->input->post('amount');
            $digit = $this->input->post('digit');
            $date = date('Y-m-d');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('market_id', 'Markets name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('type', 'Type', 'trim|required|xss_clean');
            $this->form_validation->set_rules('amount', 'Amount', 'trim|min_length[0]|required|xss_clean');
            $this->form_validation->set_rules('digit', ' digit', 'required');
    
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    //'id' => $id,
                    'user_id' => $user_id,
                    'user_type' => $user_type,
                    'market_id' => $market_id,
                    'game' => 'PANNA',
                    'type' => $type,
                    'amount' => $amount,
                    'date' => $date,
                    'digit' => $digit  
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updatepanna($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertpanna($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function panna_delet(){ 
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->get('id');
            $this->Admin_model->delet_panna($id);
             redirect('user/panna', 'refresh');
           
        }
    }
    

    public function jodi(){ 
        if ($this->session->userdata('user_login_access') != False) {
            $id  =  $this->session->userdata('user_login_id');
            $data             = array();
            $data['mrkt'] = $this->Admin_model->getmarkets();
            $data['requestlist'] = $this->Admin_model->getjodidata($id);
            $data['users'] = $this->Admin_model->getAllUsers();
            $data['mrkt'] = $this->Admin_model->getmarkets();
            $this->load->view('user/jodi', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function save_jodi(){
        if ($this->session->userdata('user_login_access') != False) {
            $user_id = $this->input->post('user_id');
            $user_type = $this->input->post('user_type');
            $market_id = $this->input->post('market_id');
            $type   = $this->input->post('type');
            $amount   = $this->input->post('amount');
            $digit = $this->input->post('digit');
            $date = date('Y-m-d');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('market_id', 'Markets name', 'trim|xss_clean|required');
            $this->form_validation->set_rules('type', 'Type', 'trim|required|xss_clean');
            $this->form_validation->set_rules('amount', 'Amount', 'trim|min_length[0]|required|xss_clean');
            $this->form_validation->set_rules('digit', 'digit', 'required');
    
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    //'id' => $id,
                    'user_id' => $user_id,
                    'user_type' => $user_type,
                    'market_id' => $market_id,
                    'game' => 'JODI',
                    'type' => $type,
                    'amount' => $amount,
                    'date' => $date,
                    'digit' => $digit  
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updatejodi($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertjodi($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function jodi_delet(){ 
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->get('id');
            $this->Admin_model->delet_jodi($id);
             redirect('user/jodi', 'refresh');
           
        }
    }

  
    
}
?>