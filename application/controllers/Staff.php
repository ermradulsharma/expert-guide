<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('Admin_model');
        $this->load->model('login_model');
        $this->load->model('User_model');
         $this->load->model('Staff_model');
    }
    
    public function index(){
        if ($this->session->userdata('user_login_access') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('user_login_access') == 1)
            $data = array();
        redirect('staff/dashboard');
    }
    /*Dashboard section*/
    public function dashboard(){
        if ($this->session->userdata('user_login_access') != False) {
            $data             = array();
            $userid           = $this->session->userdata('user_login_id');
            $this->load->view('staff/dashboard', $data);
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
            $this->load->view('staff/profile', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


     public function markets(){
        if ($this->session->userdata('user_login_access') != False) {
            $data             = array();
            $data['marketslist'] = $this->Admin_model->getmarkets();
            $this->load->view('staff/markets', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function marketById(){
        if ($this->session->userdata('user_login_access') != False) {
            $id               = $this->input->get('id');
            $data['marketValue'] = $this->Admin_model->getmarketValue($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


 /*product Markets validation*/
    public function save_market(){
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->post('id');
             $market_name = $this->input->post('market_name');
            $status   = $this->input->post('status');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('market_name', 'Markets Name', 'trim|min_length[1]|max_length[255]|xss_clean');
           

            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'market_name' => $market_name,
                    'status' => $status
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updatemarkets($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertmarkets($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }



    public function market_delet(){
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->get('id');
            $this->Admin_model->delet_market($id);
             redirect('staff/markets', 'refresh');
            if ($this->db->affected_rows()) {
                $profile    = $this->Admin_model->getmarketValue($id);
                
            } else {
                redirect('staff/markets', 'refresh');
            }
        }
    }

     public function results(){
        if ($this->session->userdata('user_login_access') != False) {
            $data             = array();
            $id =  $this->session->userdata('user_login_id');
            $data['requestlist'] = $this->Staff_model->getResult();
            $data['users'] = $this->Admin_model->getAllUsers();
            $data['mrkt'] = $this->Admin_model->getmarketassignuserValue($id);
            $this->load->view('staff/results', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

     /*product Markets validation*/
     public function save_result(){
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->post('id');
            $user_id = $this->input->post('user_id');
            $user_type = $this->input->post('user_type');
            $market_id = $this->input->post('market_id');
            $result_open   = $this->input->post('result_open');
            $result_close = $this->input->post('result_close');
            $result_no   = $this->input->post('result_no');
            $open   =  substr($result_no, 0, 1);
            $close   = ($result_no % 10);
            $full_result   = $this->input->post('full_result');
            $date   = $this->input->post('date');
            $get_day = strtotime($date);
            $result = date('l', $get_day);
            $day = strtoupper(substr($result, 0, 3));
                                   
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('market_id', 'Markets name', 'trim|min_length[0]|max_length[50]|xss_clean');
            $this->form_validation->set_rules('result_open', 'Result Open', 'trim|required|min_length[0]|max_length[3]|xss_clean');
            $this->form_validation->set_rules('result_close', 'Result Close', 'trim|min_length[0]|max_length[3]|xss_clean');
            $this->form_validation->set_rules('status', ' Status', 'trim|required|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'user_id' => $user_id,
                    'user_type' => $user_type,
                    'market_id' => $market_id,
                    'result_open' => $result_open,
                    'result_close' => $result_close,
                    'result_no' => $result_no,
                    'open' => $open,
                    'close' => $close,
                    'full_result' => $full_result,
                    'date' => $date,
                    'day' => $day
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updateResult($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertResult($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

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
             redirect('staff/results', 'refresh');
            if ($this->db->affected_rows()) {
                $profile    = $this->Admin_model->getResultValue($id);
                
            } else {
                redirect('staff/results', 'refresh');
            }
        }
    }
}
?>