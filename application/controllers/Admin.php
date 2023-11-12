<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Admin_model');
        $this->load->model('login_model');
        $this->load->model('User_model');
        $this->load->model('Staff_model');
        $this->user = $this->db->query("SELECT * FROM users where user_id = '".$this->session->userdata('user_login_id')."'")->row();
       
    }

    public function index()
    {

        if ($this->session->userdata('user_login_access') != 1)
            redirect(base_url() . 'login', 'refresh');

        if ($this->session->userdata('user_login_access') == 1 && $this->session->userdata('user_type') == "User")
            redirect(base_url() . 'User', 'refresh');
        if ($this->session->userdata('user_login_access') == 1 && $this->session->userdata('user_type') == "Staff")
            redirect(base_url() . 'Staff', 'refresh');
        if ($this->session->userdata('user_login_access') == 1 && $this->session->userdata('user_type') == "Admin")
            redirect(base_url() . 'admin/dashboard', 'refresh');
    }
    
    public function commission(){
        $commisions = $this->db->query("SELECT * FROM commisions WHERE user_id = ".$this->user->id)->row_array();
        if($this->input->post()){
        $cut_off = @$_REQUEST['cutoff'];
         $commision = @$_REQUEST['commisons'];
        $data = ['cut_off' =>  $cut_off , 'commisions' =>  $commision , 'user_id' => $this->user->id ];

          if(isset($commisions['id'])){
              
                $this->db->where('id', $commisions['id']);
                $this->db->update('commisions', $data);
              
          }else{
             $this->db->insert('commisions', $data);
          }
          
        }
        
           $data['commisions'] = $commisions;
            
            $this->load->view('admin/commisons',$data);
 
    }
    
    public function yantri(){
     $data['market'] = $this->db->query("SELECT * FROM markets WHERE status = 'Active'")->result_array();
     
      $date = $this->input->get('date');
      $market = $this->input->get('market');
      $result = $this->input->get('result');
      $game_type = $this->input->get('game_type');
     
     if(!empty(@$date) && !empty($market) && !empty($result) && !empty($game_type)){
         
       
         
         if($game_type == 'SINGLE'){
             $limit = 10;
         }elseif($game_type == 'JODI'){
              $limit = 100; 
         }elseif($game_type == 'PANNA'){
               $limit = 1000; 
         }else{
              $limit = 1; 
         }
         
         $results = [];
         $total_amt = 0;
         for($i=1;$i <  $limit;$i++ ){
             
          
           
              $this->db->select('*,SUM(amount) as total_amt ,  COUNT(user_id) as total_user');
              $this->db->from('single');
           
             if(!empty($market)){
              $this->db->where('market_id', $market );
             }
             
             if(!empty($date)){
              $this->db->where('DATE(date)', date('Y-m-d' , strtotime($date)) );
             }
             
            if(!empty( $result)){
              $this->db->where('type' , $result);

             }
            if(!empty( $game_type)){
              $this->db->where('game' , $game_type);

             }
             
             $this->db->where("digit",$i);
             
             $record =  $this->db->get()->row_array();
             
             
             $mkt = $this->db->query("SELECT * FROM markets WHERE id = ". @$_REQUEST['market'])->row_array();
             if(isset($record['id'])){
                 $total_amt = $total_amt + $record['total_amt'];
                 $results[$i-1] = ['game_type' =>  $game_type ,'total'=>  $record['total_amt'] , 'market' =>   $mkt['market_name'] ,'total_user' => $record['total_user'], 'game_number' => $i  ];   
             }else{
                 $results[$i-1] = ['game_type' =>  $game_type , 'total'=>  0 , 'market' =>  $mkt['market_name'] , 'game_number' => $i ,'total_user' => 0 ];  
             }
         }
         
       $data['results'] = $results;
        $data['total_amts'] =  $total_amt;
     }else{
        $data['results'] = [];
        $data['total_amts'] =  0;
     }
     
     $commsions = $this->db->query("SELECT * FROM commisions WHERE user_id = ".$this->user->id)->row();
     
     if(isset($commsions->id)){
         $data['cut_offs'] = $commsions->cut_off;
         $data['commisions'] = $commsions->commisions;

     }else{
          $data['cut_offs'] = 1;
         $data['commisions'] = 10;
     }
     
  
     
     $this->load->view('admin/yantri',$data);
    }
    /*Dashboard section*/
    public function dashboard()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data             = array();
            $userid           = $this->session->userdata('user_login_id');
            $data['todolist'] = $this->Admin_model->getTodoInfo($userid);
            $data['markets'] = $this->Admin_model->getmarkets();
            $this->load->view('admin/dashboard', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*List all user*/
    public function List_user()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data                  = array();
            $data['userlist']      = $this->Admin_model->getAllUsers();
            $data['settingsvalue'] = $this->Admin_model->getSettingsValue();
            $this->load->view('admin/userlist', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*|||||||||||||| UPDATED |||||||||||||||*/
    public function List_user_updated()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data                  = array();
            $data['userlist']      = $this->Admin_model->getAllUsers();
            $data['settingsvalue'] = $this->Admin_model->getSettingsValue();
            $this->load->view('admin/userlist-updated', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*|||||||||||||| UPDATED |||||||||||||||*/


    /*Add user Form View*/
    public function Add_User()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data['settingsvalue'] = $this->Admin_model->getSettingsValue();
            $this->load->view('admin/adduser', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    # user delect
    public function user_delet()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->get('id');
            $this->Admin_model->userTableDelet($id);
            if ($this->db->affected_rows()) {
                $profile    = $this->Admin_model->getUserValue($id);
                $checkimage = "./assets/img/user/$profile->image";
                if (file_exists($checkimage)) {
                    unlink($checkimage);
                    redirect('admin/List_user');
                }
                /*      $this->Admin_model->User_Notes_Delet($id);
                $this->Admin_model->User_commentid_Delet($id);*/
            } else {
                redirect(base_url(), 'refresh');
            }
        }
    }
    /*user profile*/
    public function View_profile()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $userid                = base64_decode($this->input->get('U'));
            $data                  = array();
            $data['settingsvalue'] = $this->Admin_model->getSettingsValue();
            $data['profile']       = $this->Admin_model->getProfileValue($userid);
            $data['usernote']      = $this->Admin_model->getUserNotes($userid);
            $this->load->view('admin/profile', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Note validation*/
    public function noteValidation()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $userid      = $this->input->post('userid');
            $commentid   = $this->input->post('commentid');
            $description = $this->input->post('description');
            $date        = date("Y-m-d h:i:sa");
            $this->load->library('form_validation');
            // Validating group name Field
            $this->form_validation->set_rules('userid', 'User Id', 'required|xss_clean');
            $this->form_validation->set_rules('commentid', 'Comment ID', 'required|trim|xss_clean');
            $this->form_validation->set_rules('description', 'description', 'required|trim|min_length[10]|max_length[1024]|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                if ($_FILES['note_file']['name']) {
                    $file_name = $_FILES['note_file']['name'];
                    $fileSize  = $_FILES["note_file"]["size"] / 1024;
                    $fileType  = $_FILES["note_file"]["type"];

                    $config = array(
                        'upload_path' => "./assets/img/note",
                        'allowed_types' => "gif|jpg|png|jpeg|pdf",
                        'overwrite' => False,
                        'max_size' => "40480000", // Can be set to particular file size , here it is 4 MB(2048 Kb)
                        'max_height' => "2100",
                        'max_width' => "2100"
                    );

                    $this->load->library('Upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('note_file')) {
                        $response['status']  = 'success';
                        $response['message'] = $this->upload->display_errors();
                        $this->output->set_output(json_encode($response));
                    } else {
                        $path                = $this->upload->data();
                        $img_url             = $path['file_name'];
                        $data                = array();
                        $data                = array(
                            'user_id' => $userid,
                            'comment_id' => $commentid,
                            'description' => $description,
                            'note_image' => $img_url,
                            'datetime' => $date
                        );
                        $success             = $this->Admin_model->addUserNote($data);
                        $response['status']  = 'success';
                        $response['message'] = "Successfully Added";

                        $this->output->set_output(json_encode($response));
                    }
                } else {
                    $data                = array();
                    $data                = array(
                        'user_id' => $userid,
                        'comment_id' => $commentid,
                        'description' => $description,
                        'datetime' => $date
                    );
                    $success             = $this->Admin_model->addUserNote($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Group list for admin*/
    public function ListGroup()
    {
        if ($this->session->userdata('user_login_access') != False && $this->session->userdata('user_type') == 'Admin') {
            $data                  = array();
            $data['settingsvalue'] = $this->Admin_model->getSettingsValue();
            $data['userrole']      = $this->Admin_model->getAllGroupsUser();
            $data['adminrole']     = $this->Admin_model->getAllGroupsAdmin();
            $this->load->view('admin/listgroup', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Select Group data by id */
    public function groupDataByID()
    {
        if ($this->session->userdata('user_login_access') != False && $this->session->userdata('user_type') == 'Admin') {
            $id            = $this->input->get('id');
            $data['value'] = $this->Admin_model->selectgroupdatabyId($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*group information update*/
    public function Update_Group()
    {
        if ($this->session->userdata('user_login_access') != False && $this->session->userdata('user_type') == 'Admin') {

            $id   = $this->input->post('groupid');
            $name = $this->input->post('role');

            $this->load->library('form_validation');

            // Validating group name Field
            $this->form_validation->set_rules('groupname', 'Group name', 'trim|min_length[2]|max_length[25]|xss_clean');

            if ($this->form_validation->run() == FALSE) {

                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {

                $data = array();
                $data = array(
                    'user_type' => $name
                );

                $success = $this->Admin_model->updateGroupInfo($id, $data);

                if ($this->db->affected_rows()) {

                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*product validation page */
    public function View_Product()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data                  = array();
            $data['settingsvalue'] = $this->Admin_model->getSettingsValue();
            $data['category']      = $this->Admin_model->getCategory();
            $data['color']         = $this->Admin_model->getColor();
            $data['size']          = $this->Admin_model->getSize();
            $data['brand']         = $this->Admin_model->getBrand();
            $this->load->view('admin/product', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*product update page*/
    public function Getprodatabyid()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $proid                 = base64_decode($this->input->get('P'));
            $data                  = array();
            $data['settingsvalue'] = $this->Admin_model->getSettingsValue();
            $data['category']      = $this->Admin_model->getCategory();
            $data['color']         = $this->Admin_model->getColor();
            $data['size']          = $this->Admin_model->getSize();
            $data['brand']         = $this->Admin_model->getBrand();
            $data['productvalue']  = $this->Admin_model->getproductdetails($proid);
            $data['productimage']  = $this->Admin_model->getproductImages($proid);
            $data['productcolor']  = $this->Admin_model->getProductColors($proid);
            $data['productsize']   = $this->Admin_model->getProductSizes($proid);
            $this->load->view('admin/update_product', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*All product list*/
    public function product_list()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data                  = array();
            $data['settingsvalue'] = $this->Admin_model->getSettingsValue();
            $data['category']      = $this->Admin_model->getCategory();
            $data['color']         = $this->Admin_model->getColor();
            $data['size']          = $this->Admin_model->getSize();
            $data['brand']         = $this->Admin_model->getBrand();
            $data['proimage']      = $this->Admin_model->getProImage();
            $data['productlist']   = $this->Admin_model->getProductData();
            $this->load->view('admin/productlist', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*single product information*/
    public function product_details()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $proid                  = base64_decode($this->input->get('P'));
            $data                   = array();
            $data['settingsvalue']  = $this->Admin_model->getSettingsValue();
            $data['productdetails'] = $this->Admin_model->getproductdetails($proid);
            $data['productsize']    = $this->Admin_model->getproductsize($proid);
            $data['productcolor']   = $this->Admin_model->getproductcolor($proid);
            $data['productimage']   = $this->Admin_model->getproductImage($proid);
            $this->load->view('admin/productdetails', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*product category validation*/
    public function addCategoryData()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $catid    = $this->input->post('cat_id');
            $category = $this->input->post('catname');
            $status   = $this->input->post('catstatus');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('cat_id', 'Category Id', 'trim|xss_clean');
            $this->form_validation->set_rules('catname', 'Category Name', 'trim|min_length[2]|max_length[25]|xss_clean|required');
            $this->form_validation->set_rules('catstatus', 'Category Status', 'trim|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'cat_name' => $category,
                    'cat_status' => $status
                );
                if (!empty($catid)) {
                    $update              = $this->Admin_model->updateCategory($catid, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertcategory($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Reset password validation*/
    public function Add_Reset_password()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id          = $this->session->userdata('user_login_id');
            $oldpass     = sha1($this->input->post('oldpass'));
            $newpass     = $this->input->post('newpass');
            $confirmpass = $this->input->post('confirmpass');
            $userdata    = $this->Admin_model->getUserValue($id);
            if ($userdata->password == $oldpass && $newpass == $confirmpass) {
                $data = array();
                $data = array(
                    'password' => sha1($newpass)
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updatePassword($id, $data);
                    $inserted            = $this->db->affected_rows();
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated Your  password";
                    $this->output->set_output(json_encode($response));
                }
            } else {
                $response['status']  = 'error';
                $response['message'] = "Please enter Valid password";
                $this->output->set_output(json_encode($response));
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*to-do note validation*/
    public function addTodoData()
    {
        if ($this->session->userdata('user_login_access') != False) {

            $userid   = $this->input->post('userid');
            $tododata = $this->input->post('todo_data');
            $date     = date("Y-m-d h:i:sa");

            $this->load->library('form_validation');

            //validating to do list data
            $this->form_validation->set_rules('userid', 'user Id', 'trim|xss_clean');
            $this->form_validation->set_rules('todo_data', 'To-do Data', 'trim|required|min_length[3]|max_length[150]|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'user_id' => $userid,
                    'to_dodata' => $tododata,
                    'value' => '1',
                    'date' => $date
                );

                $success    = $this->Admin_model->insert_tododata($data);
                $todoLastId = $this->db->insert_id();

                if ($success) {

                    $todoHtml = "<li class='todo-item'>";
                    $todoHtml .= "<div class='checkbox checkbox-default'>";
                    $todoHtml .= "<input class='to-do' data-id='" . $todoLastId . "' data-value='0' type='checkbox' id='" . $todoLastId . "'>";
                    $todoHtml .= "<label for='" . $todoLastId . "'>" . $tododata . "</label>";
                    $todoHtml .= "</div>";
                    $todoHtml .= "</li>";
                    $todoHtml .= "<li><hr class='light-grey-hr'></li>";

                    $response['status']   = 'success';
                    $response['todoHtml'] = $todoHtml;
                    $response['message']  = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Todo Data Update*/
    public function updateTododata()
    {

        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('toid');
            $value = $this->input->post('tovalue'); // initially 0 when not completed

            $data   = array();
            $data   = array(
                'value' => $value
            );
            $update = $this->Admin_model->UpdateTododata($id, $data);

            $response['status']  = 'success';
            $response['value']   = $value;
            $response['message'] = "Successfully updated";
            $this->output->set_output(json_encode($response));
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*subcategory validation*/
    public function addSubCategoryData()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id          = $this->input->post('subcatid');
            $category_id = $this->input->post('cat');
            $subcategory = $this->input->post('subname');
            $status      = $this->input->post('status');
            // Validating details Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('subcatid', 'SubCategory Id', 'trim|xss_clean');
            $this->form_validation->set_rules('cat', 'Category Id', 'trim|xss_clean|required');
            $this->form_validation->set_rules('subname', 'SubCategory Name', 'trim|min_length[3]|max_length[25]|xss_clean|required');
            $this->form_validation->set_rules('status', 'Status', 'trim|xss_clean|required');

            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'cat_id' => $category_id,
                    'subcat_name' => $subcategory,
                    'subcat_status' => $status
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updateSubcategory($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertSubcategory($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Select sub category */
    public function getCategoryByID()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $catid      = $this->input->get('c');
            $subcatlist = $this->Admin_model->getsubcategoryByID($catid);
            echo '<option value="">Select a Sub-Category</option>';
            foreach ($subcatlist as $eachSubcat)
                echo "<option value='$eachSubcat->subcat_id'>$eachSubcat->subcat_name</option>";
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Subcategory data by id*/
    public function getSubcategoryByid()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id             = $this->input->get('id');
            $data['subcat'] = $this->Admin_model->getSubCatById($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Color data by id*/
    public function getColorById()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id                 = $this->input->get('id');
            $data['colorvalue'] = $this->Admin_model->getColorById($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Size data by id*/
    public function getSizeById()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id                = $this->input->get('id');
            $data['sizevalue'] = $this->Admin_model->getSizeBYId($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Brand data by id*/
    public function getBrandById()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id                 = $this->input->get('id');
            $data['brandvalue'] = $this->Admin_model->getBrandBYID($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Size data validation*/
    public function addSizeData()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id        = $this->input->post('size_id');
            $sizevalue = $this->input->post('size');
            $status    = $this->input->post('status');
            // Validating details Type Field
            $this->load->library('form_validation');
            $this->form_validation->set_rules('size_id', 'Size Id', 'trim|xss_clean');
            $this->form_validation->set_rules('size', 'Size Name', 'trim|min_length[1]|max_length[10]|xss_clean|required');
            $this->form_validation->set_rules('status', 'Status', 'trim|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'size_name' => $sizevalue,
                    'size_status' => $status
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updateSizeValue($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertSizeValue($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*color data validation*/
    public function addColorData()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id          = $this->input->post('color_id');
            $colorvalue  = $this->input->post('color');
            $colorstatus = $this->input->post('status');
            // Validating details Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('color_id', 'Color Id', 'trim|xss_clean');
            $this->form_validation->set_rules('color', 'Color Name', 'trim|min_length[2]|max_length[10]|xss_clean|required');
            $this->form_validation->set_rules('status', 'Color Status', 'trim|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'color_name' => $colorvalue,
                    'color_status' => $colorstatus
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updateColorValue($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertColorValue($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*brand data validation*/
    public function addBrandData()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id          = $this->input->post('brand_id');
            $brandvalue  = $this->input->post('brand');
            $brandstatus = $this->input->post('brand_status');

            $this->load->library('form_validation');
            $this->form_validation->set_rules('brand_id', 'Brand Id', 'trim|xss_clean');
            $this->form_validation->set_rules('brand', 'Brand Name', 'trim|min_length[2]|max_length[20]|xss_clean|required');
            $this->form_validation->set_rules('brand_status', 'Brand Status', 'trim|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'brand_name' => $brandvalue,
                    'brand_status' => $brandstatus
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updateBrandValue($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertBrandValue($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Product data validation*/
    public function addProductData()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id          = $this->input->post('pro_id');
            $proid       = 'P' . rand(0, 1000);
            $sku         = $this->input->post('product_sku');
            $name        = $this->input->post('product_name');
            $price       = $this->input->post('product_price');
            $selling     = $this->input->post('selling_price');
            $discount    = $this->input->post('discount');
            $starts      = $this->input->post('discount_starts');
            $ends        = $this->input->post('discount_ends');
            $cat_id      = $this->input->post('catid');
            $subcatid    = $this->input->post('subcatlist');
            $brandid     = $this->input->post('brand');
            $prosummary  = $this->input->post('summary');
            $prodetails  = $this->input->post('details');
            $proquantity = $this->input->post('quantity');
            $color       = $this->input->post('color[]');
            $size        = $this->input->post('size[]');
            $this->load->library('form_validation');
            // Validating SKU Field
            $this->form_validation->set_rules('product_sku', 'SKU', 'trim|min_length[2]|max_length[40]|xss_clean|required');
            // Validating product Field
            $this->form_validation->set_rules('product_name', 'product Name', 'trim|min_length[2]|max_length[250]|xss_clean|required');
            // Validating summary Field
            $this->form_validation->set_rules('summary', 'summary', 'trim|min_length[15]|max_length[100]|xss_clean|required');
            // Validating details Type Field 
            $this->form_validation->set_rules('details', 'details', 'trim|min_length[100]|max_length[1200]|xss_clean|required');
            //Validating Purchase Price Field
            $this->form_validation->set_rules('product_price', 'Purchase Price', 'trim|xss_clean|required');
            //Validating Selling Price Field
            $this->form_validation->set_rules('selling_price', 'Selling Price', 'trim|xss_clean|required');
            //Validating Discount Field
            $this->form_validation->set_rules('discount', 'Discount', 'trim|xss_clean');
            //Validating Discount Starts Field
            $this->form_validation->set_rules('discount_starts', 'Discount Starts', 'trim|xss_clean');
            //Validating Discount Ends Field
            $this->form_validation->set_rules('discount_ends', 'Discount Ends', 'trim|xss_clean');
            //Validating Category Field
            $this->form_validation->set_rules('catid', 'Category', 'trim|xss_clean');
            //Validating SubCategory Field
            $this->form_validation->set_rules('subcatlist', 'SubCategory', 'trim|xss_clean');
            //Validating Brand Field
            $this->form_validation->set_rules('brand', 'Brand Id', 'trim|xss_clean');
            //Validating Quantity Field
            $this->form_validation->set_rules('quantity', 'Quantity', 'trim|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $dataInfo = array();
                $files    = $_FILES;
                $cpt      = count($_FILES['product_image']['name']);
                for ($i = 0; $i < $cpt; $i++) {
                    $_FILES['product_image']['name']     = $files['product_image']['name'][$i];
                    $_FILES['product_image']['type']     = $files['product_image']['type'][$i];
                    $_FILES['product_image']['tmp_name'] = $files['product_image']['tmp_name'][$i];
                    $_FILES['product_image']['error']    = $files['product_image']['error'][$i];
                    $_FILES['product_image']['size']     = $files['product_image']['size'][$i];
                    $uploadPath                          = 'assets/img/product';
                    $config['upload_path']               = $uploadPath;
                    $config['allowed_types']             = 'gif|jpg|png';

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('product_image')) {
                        $fileData                    = $this->upload->data();
                        $uploadData[$i]['file_name'] = $fileData['file_name'];
                        $data1                       = array();
                        $data1                       = array(
                            'pro_id' => $proid,
                            'img_url' => $uploadData[$i]['file_name']
                        );
                        $success                     = $this->Admin_model->productImgInsert($data1);
                    }
                }
                if (!empty($uploadData)) {
                    $data                = array();
                    $data                = array(
                        'pro_id' => $proid,
                        'cat_id' => $cat_id,
                        'subcat_id' => $subcatid,
                        'brand_id' => $brandid,
                        'pro_sku' => $sku,
                        'pro_name' => $name,
                        'pro_price' => $price,
                        'selling_price' => $selling,
                        'discount' => $discount,
                        'discount_starts' => $starts,
                        'discount_end' => $ends,
                        'pro_summery' => $prosummary,
                        'pro_details' => $prodetails,
                        'quantity' => $proquantity
                    );
                    $success             = $this->Admin_model->productInsert($data);
                    #$this->session->set_flashdata('feedback','Successfully Updated');
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                    $insertid = $this->db->insert_id();
                    if ($insertid) {
                        $color = $this->input->post('color[]');
                        $size  = $this->input->post('size[]');
                        if (!empty($color)) {
                            foreach ($color as $colorvalue) {
                                $data        = array();
                                $data        = array(
                                    'pro_id' => $proid,
                                    'color_id' => $colorvalue
                                );
                                $success     = $this->Admin_model->productColor($data);
                                $insertidtwo = $this->db->insert_id();
                            }
                        }
                        if (!empty($size)) {
                            foreach ($size as $sizevalue) {
                                $data          = array();
                                $data          = array(
                                    'pro_id' => $proid,
                                    'size_id' => $sizevalue
                                );
                                $success       = $this->Admin_model->productSize($data);
                                $insertidthree = $this->db->insert_id();
                            }
                        }
                    }
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Product update*/
    public function updateProduct()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id          = $this->input->post('pro_id');
            $sku         = $this->input->post('product_sku');
            $name        = $this->input->post('product_name');
            $price       = $this->input->post('product_price');
            $selling     = $this->input->post('selling_price');
            $discount    = $this->input->post('discount');
            $starts      = $this->input->post('discount_starts');
            $ends        = $this->input->post('discount_ends');
            $cat_id      = $this->input->post('catid');
            $subcatid    = $this->input->post('subcatlist');
            $brandid     = $this->input->post('brand');
            $prosummary  = $this->input->post('summary');
            $prodetails  = $this->input->post('details');
            $proquantity = $this->input->post('quantity');
            $color       = $this->input->post('color[]');
            $size        = $this->input->post('size[]');
            $this->load->library('form_validation');
            // Validating SKU Field
            $this->form_validation->set_rules('product_sku', 'SKU', 'trim|min_length[2]|max_length[40]|xss_clean|required');
            // Validating product Field
            $this->form_validation->set_rules('product_name', 'product Name', 'trim|min_length[2]|max_length[250]|xss_clean|required');
            // Validating summary Field
            $this->form_validation->set_rules('summary', 'summary', 'trim|min_length[50]|max_length[512]|xss_clean|required');
            // Validating details Type Field 
            $this->form_validation->set_rules('details', 'details', 'trim|min_length[100]|max_length[1200]|xss_clean|required');
            //Validating Purchase Price Field
            $this->form_validation->set_rules('product_price', 'Purchase Price', 'trim|xss_clean|required');
            //Validating Selling Price Field
            $this->form_validation->set_rules('selling_price', 'Selling Price', 'trim|xss_clean|required');
            //Validating Discount Field
            $this->form_validation->set_rules('discount', 'Discount', 'trim|xss_clean');
            //Validating Discount Starts Field
            $this->form_validation->set_rules('discount_starts', 'Discount Starts', 'trim|xss_clean');
            //Validating Discount Ends Field
            $this->form_validation->set_rules('discount_ends', 'Discount Ends', 'trim|xss_clean');
            //Validating Category Field
            $this->form_validation->set_rules('catid', 'Category', 'trim|xss_clean');
            //Validating SubCategory Field
            $this->form_validation->set_rules('subcatlist', 'SubCategory', 'trim|xss_clean');
            //Validating Brand Field
            $this->form_validation->set_rules('brand', 'Brand Id', 'trim|xss_clean');
            //Validating Quantity Field
            $this->form_validation->set_rules('quantity', 'Quantity', 'trim|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $dataInfo = array();
                $files    = $_FILES;
                $cpt      = count($_FILES['product_image']['name']);
                for ($i = 0; $i < $cpt; $i++) {
                    $_FILES['product_image']['name']     = $files['product_image']['name'][$i];
                    $_FILES['product_image']['type']     = $files['product_image']['type'][$i];
                    $_FILES['product_image']['tmp_name'] = $files['product_image']['tmp_name'][$i];
                    $_FILES['product_image']['error']    = $files['product_image']['error'][$i];
                    $_FILES['product_image']['size']     = $files['product_image']['size'][$i];
                    $uploadPath                          = 'assets/img/product';
                    $config['upload_path']               = $uploadPath;
                    $config['allowed_types']             = 'gif|jpg|png';

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('product_image')) {
                        $fileData                    = $this->upload->data();
                        $uploadData[$i]['file_name'] = $fileData['file_name'];
                        $data1                       = array();
                        $data1                       = array(
                            'pro_id' => $id,
                            'img_url' => $uploadData[$i]['file_name']
                        );
                        $success                     = $this->Admin_model->ProductImgInsert($data1);
                    }
                }
                if (!empty($id)) {
                    $data       = array();
                    $data       = array(
                        'cat_id' => $cat_id,
                        'subcat_id' => $subcatid,
                        'brand_id' => $brandid,
                        'pro_sku' => $sku,
                        'pro_name' => $name,
                        'pro_price' => $price,
                        'selling_price' => $selling,
                        'discount' => $discount,
                        'discount_starts' => $starts,
                        'discount_end' => $ends,
                        'pro_summery' => $prosummary,
                        'pro_details' => $prodetails,
                        'quantity' => $proquantity
                    );
                    $success    = $this->Admin_model->productUpdateInfo($id, $data);
                    $deletcolor = $this->Admin_model->delet_Color($id);
                    $deletsize  = $this->Admin_model->delet_Size($id);
                    $color      = $this->input->post('color[]');
                    $size       = $this->input->post('size[]');
                    foreach ($color as $colorvalue) {
                        $data        = array();
                        $data        = array(
                            'pro_id' => $id,
                            'color_id' => $colorvalue
                        );
                        $success     = $this->Admin_model->productColor($data);
                        $insertidtwo = $this->db->insert_id();
                    }
                    foreach ($size as $sizevalue) {
                        $data          = array();
                        $data          = array(
                            'pro_id' => $id,
                            'size_id' => $sizevalue
                        );
                        $success       = $this->Admin_model->productSize($data);
                        $insertidthree = $this->db->insert_id();
                    }
                    #$this->session->set_flashdata('feedback','Successfully Updated');
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Select user information By user ID*/
    public function viewUserDataBYID()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id                = $this->input->get('id');
            $data['uservalue'] = $this->Admin_model->getUserValue($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*user information validation*/
    public function addUserInfo()
    {
        if ($this->session->userdata('user_login_access') != False) {
            /*Set password length*/

            $pass_hash     = $this->input->post('password');
            /*password length 7 & convert to Secure Hash Algorithm 1(SHA1)*/
            /*custom user id generator*/
            $userid    = 'U' . rand(500, 1000);
            /*generate random user ID from 500 to 1000*/
            $username  = $this->input->post('name');
            $email     = $this->input->post('email');
            $contact   = $this->input->post('contact');
            $role      = $this->input->post('role');

            $date      = date('Y-m-d');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters();
            // Validating Name Field
            $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]|max_length[60]|xss_clean');
            /*validating email field*/
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[7]|max_length[100]|xss_clean');
            /*validating contact field*/
            $this->form_validation->set_rules('contact', 'Contact', 'trim|xss_clean');


            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                if ($this->login_model->Does_email_exists($email)) {
                    $response['status']  = 'error';
                    $response['message'] = 'Email already exits';
                    $this->output->set_output(json_encode($response));
                } else {
                    if ($_FILES['user_image']['name']) {
                        $file_name     = $_FILES['user_image']['name'];
                        $fileSize      = $_FILES["user_image"]["size"] / 1024;
                        $fileType      = $_FILES["user_image"]["type"];
                        $new_file_name = '';
                        $new_file_name .= $userid;

                        $config = array(
                            'file_name' => $new_file_name,
                            'upload_path' => "./assets/img/user",
                            'allowed_types' => "gif|jpg|png|jpeg",
                            'overwrite' => False,

                        );

                        $this->load->library('Upload', $config);
                        $this->upload->initialize($config);
                        if (!$this->upload->do_upload('user_image')) {
                            $response['status']  = 'error';
                            $response['message'] = $this->upload->display_errors();
                            $this->output->set_output(json_encode($response));
                        } else {
                            $path                = $this->upload->data();
                            $img_url             = $path['file_name'];
                            $data                = array();
                            $data                = array(
                                'user_id' => $userid,
                                'full_name' => $username,
                                'email' => $email,
                                'password' => sha1($pass_hash),
                                'image' => $img_url,
                                'contact' => $contact,
                                'status' => 'ACTIVE',
                                'user_type' => 'User',
                                'created_on' => $date
                            );
                            $success             = $this->Admin_model->addUserInfo($data);
                            $response['status']  = 'success';
                            $response['message'] = "Successfully Added";
                            $this->output->set_output(json_encode($response));
                            #$this->session->set_flashdata('feedback','Successfully Created');
                        }
                    } else {
                        $data                = array();
                        $data                = array(
                            'user_id' => $userid,
                            'full_name' => $username,
                            'email' => $email,
                            'password' => sha1($pass_hash),
                            'contact' => $contact,
                            'status' => 'ACTIVE',
                            'user_type' => 'User',
                            'created_on' => $date
                        );
                        $success             = $this->Admin_model->addUserInfo($data);
                        $response['status']  = 'success';
                        $response['message'] = "Successfully Created";
                        $this->output->set_output(json_encode($response));
                        #$this->session->set_flashdata('feedback','Successfully Created');    
                    }
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*user information update validation*/
    public function updateValue()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id       = $this->input->post('userid');
            $username = $this->input->post('name');
            $email    = $this->input->post('email');
            $contact  = $this->input->post('contact');
            $country  = $this->input->post('country');
            $gender   = $this->input->post('gender');
            $role     = $this->input->post('role');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters();
            // Validating Name Field
            $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]|max_length[60]|xss_clean');
            /*validating email field*/
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[7]|max_length[100]|xss_clean');
            /*validating contact field*/
            $this->form_validation->set_rules('contact', 'Contact', 'trim|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                if ($_FILES['user_image']['name']) {
                    $profile       = $this->Admin_model->getUserValue($id);
                    $file_name     = $_FILES['user_image']['name'];
                    $fileSize      = $_FILES["user_image"]["size"] / 1024;
                    $fileType      = $_FILES["user_image"]["type"];
                    $new_file_name = '';
                    $new_file_name .= $id;
                    $checkimage = "./assets/img/user/$profile->image";

                    $config = array(
                        'file_name' => $new_file_name,
                        'upload_path' => "./assets/img/user",
                        'allowed_types' => "gif|jpg|png|jpeg",
                        'overwrite' => False,
                    );

                    $this->load->library('Upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('user_image')) {

                        $response['status']  = 'error';
                        $response['message'] = $this->upload->display_errors();
                        $this->output->set_output(json_encode($response));
                    } else {

                        $path                = $this->upload->data();
                        $img_url             = $path['file_name'];
                        $data                = array();
                        $data                = array(
                            'full_name' => $username,
                            'email' => $email,
                            'image' => $img_url,
                            'contact' => $contact,
                            'gender' => $gender,
                            'country' => $country
                        );
                        $success             = $this->Admin_model->UserUpdate($id, $data);
                        $response['id']      = $id;
                        $data['image']       = base_url() . 'assets/img/user/' . $data['image'];
                        $response['data']    = $data;
                        $response['status']  = 'success';
                        $response['message'] = "Successfully Updated";
                        $this->output->set_output(json_encode($response));
                        #$this->session->set_flashdata('feedback','Successfully Updated');    
                    }
                } else {
                    $data                = array();
                    $data                = array(
                        'full_name' => $username,
                        'email' => $email,
                        'contact' => $contact,
                        'gender' => $gender,
                        'country' => $country
                    );
                    $success             = $this->Admin_model->UserUpdate($id, $data);
                    $response['id']      = $id;
                    $response['data']    = $data;
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function Site_Settings()
    {
        if ($this->session->userdata('user_login_access') != False && $this->session->userdata('user_type') == 'Admin') {
            $data['settingsvalue'] = $this->Admin_model->getSettingsValue();
            $this->load->view('admin/settings', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function view_category()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data             = array();
            $data['category'] = $this->Admin_model->getCategory();
            $this->load->view('admin/category', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function categoryById()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id               = $this->input->get('id');
            $data['catvalue'] = $this->Admin_model->getCategoryValueById($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Product image delete controller*/
    public function unlinkImage()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id       = $this->input->get('UN');
            $imgvalue = $this->Admin_model->getSingleProImageById($id);
            if (!empty($imgvalue->id)) {
                unlink("./assets/img/product/$imgvalue->img_url");
                $delet               = $this->Admin_model->deelet_Img($id);
                $response['status']  = 'success';
                $response['message'] = "Successfully Deleted";
                $this->output->set_output(json_encode($response));
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    /*Product image delet controller*/
    public function Delet_ProductInfo()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id    = base64_decode($this->input->get('D'));
            $value = $this->Admin_model->getProductById($id);
            if (!empty($value)) {
                $deletproduct = $this->Admin_model->delet_Product($id);
                $deletcolor   = $this->Admin_model->delet_Color($id);
                $deletsize    = $this->Admin_model->delet_Size($id);
                $imgvalue     = $this->Admin_model->getProImageById($id);
                if (!empty($imgvalue)) {
                    foreach ($imgvalue as $value) {
                        while (file_exists("./assets/img/product/$value->img_url")) {
                            unlink("./assets/img/product/$value->img_url");
                        }
                    }
                    $delet = $this->Admin_model->deelet_Pro_Imgage($id);
                }
                redirect('admin/product_list');
            } else {
                $this->session->set_flashdata('feedback', 'Your request do not valid');
                redirect('admin/product_list');
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function view_subcategory()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data                = array();
            $data['category']    = $this->Admin_model->getCategory();
            $data['subcategory'] = $this->Admin_model->getSubCategory();
            $this->load->view('admin/subcategory', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function view_brand()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data          = array();
            $data['brand'] = $this->Admin_model->getBrand();
            $this->load->view('admin/brand', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function view_color()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data          = array();
            $data['color'] = $this->Admin_model->getColor();
            $this->load->view('admin/color', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function view_size()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data         = array();
            $data['size'] = $this->Admin_model->getSize();
            $this->load->view('admin/size', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function addSettings()
    {

        if ($this->session->userdata('user_login_access') != False) {
            $id          = $this->input->post('id');
            $title       = $this->input->post('title');
            $description = $this->input->post('description');
            $meta_data = $this->input->post('meta_data');
            $meta_key = $this->input->post('meta_key');
            $copyright   = $this->input->post('copyright');
            $contact     = $this->input->post('contact');
            $currency    = $this->input->post('currency');
            $symbol      = $this->input->post('symbol');
            $email       = $this->input->post('email');
            $address     = $this->input->post('address');
            $facebook     = $this->input->post('facebook');
            $twitter    = $this->input->post('twitter');
            $g_plus      = $this->input->post('g_plus');
            $youtube       = $this->input->post('youtube');
            $copy_right     = $this->input->post('copy_right');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters();
            // Validating Title Field
            $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[5]|max_length[60]|xss_clean');
            // Validating description Field
            $this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[2]|max_length[180]|xss_clean');
            // Validating contact Field
            $this->form_validation->set_rules('contact', 'Contact', 'trim|xss_clean');
            // Validating email Field
            $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean');
            // Validating address Field
            $this->form_validation->set_rules('address', 'Address', 'trim|min_length[5]|max_length[60]|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {

                if ($_FILES['img_url']['name']) {
                    $settings   = $this->Admin_model->getSettingsValue();
                    $file_name  = $_FILES['img_url']['name'];
                    $fileSize   = $_FILES["img_url"]["size"] / 1024;
                    $fileType   = $_FILES["img_url"]["type"];
                    /*          $new_file_name='';
                    $new_file_name .= $title;*/
                    $checkimage = "./assets/img/$settings->sitelogo";

                    $config = array(
                        'file_name' => $file_name,
                        'upload_path' => "./assets/img",
                        'allowed_types' => "gif|jpg|png|jpeg|svg",
                        'overwrite' => False,

                    );

                    $this->load->library('Upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('img_url')) {
                        $response['status']  = 'success';
                        $response['message'] = $this->upload->display_errors();
                        $this->output->set_output(json_encode($response));
                    } else {
                        if (file_exists($checkimage)) {
                            unlink($checkimage);
                        }
                        $path                = $this->upload->data();
                        $img_url             = $path['file_name'];
                        $data                = array();
                        $data                = array(
                            'sitelogo' => $img_url,
                            'sitetitle' => $title,
                            'description' => $description,
                            'meta_data' => $meta_data,
                            'meta_key' => $meta_key,
                            'contact' => $contact,
                            'system_email' => $email,
                            'facebook' => $facebook,
                            'twitter' => $twitter,
                            'g_plus' => $g_plus,
                            'youtube' => $youtube,
                            'copy_right' => $copy_right,
                            'address' => $address
                        );
                        $success             = $this->Admin_model->settingsUpdate($id, $data);
                        $response['status']  = 'success';
                        $response['message'] = "Successfully Updated";
                        $this->output->set_output(json_encode($response));
                        #$this->session->set_flashdata('feedback','Successfully Updated');    
                    }
                } else {
                    $data                = array();
                    $data                = array(
                        'sitetitle' => $title,
                        'description' => $description,
                        'meta_data' => $meta_data,
                        'meta_key' => $meta_key,
                        'contact' => $contact,
                        'system_email' => $email,
                        'facebook' => $facebook,
                        'twitter' => $twitter,
                        'g_plus' => $g_plus,
                        'youtube' => $youtube,
                        'copy_right' => $copy_right,
                        'address' => $address
                    );
                    $success             = $this->Admin_model->settingsUpdate($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    //Similarly, you can force download other files formats like word doc, pdf files, etc.
    public function Download_image()
    {
        // Get parameters
        $file     = $this->input->get('image');
        $filepath = "./assets/img/user/" . $file;
        // Process download
        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            flush(); // Flush system output buffer
            readfile($filepath);
            exit();
        }
    }
    public function Backup_page()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $this->load->view('admin/backup');
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function Backup_Database()
    {
        $database = 'admin';
        $username = 'root';
        $password = '';
        $hostname = 'localhost';
        $path     = 'assets/dbbackup.sql';
        if ($this->Backup_sql($database, $username, $password, $hostname, $path)) {
            $this->session->set_flashdata('feedback', 'Successfully Downloaded');
            redirect(base_url() . 'admin/Backup_page');
        } else {
            $this->session->set_flashdata('feedback', 'Successfully Downloaded');
            redirect(base_url() . 'admin/Backup_page');
        }
    }
    public function Backup_sql($database, $username, $password, $hostname, $path)
    {

        //ENTER THE RELEVANT INFO BELOW
        $mysqlDatabaseName = $database;
        $mysqlUserName     = $username;
        $mysqlPassword     = $password;
        $mysqlHostName     = $hostname;
        $mysqlExportPath   = $path;

        //DO NOT EDIT BELOW THIS LINE
        //Export the database and output the status to the page
        $command = 'mysqldump --opt -h' . $mysqlHostName . ' -u' . $mysqlUserName . ' -p' . $mysqlPassword . ' ' . $mysqlDatabaseName . ' > ' . $mysqlExportPath;
        exec($command, $output = array(), $worked);
        switch ($worked) {
            case 0:
                echo 'Database <b>' . $mysqlDatabaseName . '</b> successfully exported to <b>' . getcwd() . '/' . $mysqlExportPath . '</b>';
                break;
            case 1:
                echo 'There was a warning during the export of <b>' . $mysqlDatabaseName . '</b> to <b>' . getcwd() . '/' . $mysqlExportPath . '</b>';
                break;
            case 2:
                echo 'There was an error during export. Please check your values:<br/><br/><table><tr><td>MySQL Database Name:</td><td><b>' . $mysqlDatabaseName . '</b></td></tr><tr><td>MySQL User Name:</td><td><b>' . $mysqlUserName . '</b></td></tr><tr><td>MySQL Password:</td><td><b>NOTSHOWN</b></td></tr><tr><td>MySQL Host Name:</td><td><b>' . $mysqlHostName . '</b></td></tr></table>';
                break;
        }
    }


    /*Notification*/
    function set_notification()
    {
        $data = $_POST["id"];
        $this->load->model('Admin_model');
        $this->Admin_model->set_notifiication($data);
    }

    public function results()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data             = array();
            $data['requestlist'] = $this->Admin_model->getResult();
            $data['users'] = $this->Admin_model->getAllUsers();
            $data['mrkt'] = $this->Admin_model->getmarkets();
            $this->load->view('admin/results', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    /*product Markets validation*/
    public function save_result()
    {

        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->post('id');
            $user_id = $this->input->post('user_id');
            $user_type = $this->input->post('user_type');
            $market_id = $this->input->post('market_id');
            $result_open   = $this->input->post('result_open');
            $result_close = $this->input->post('result_close');
            $result_no   = $this->input->post('result_no');
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

    public function resultsById()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id               = $this->input->get('id');
            $data['ResultValue'] = $this->Admin_model->getResultValueById($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    # user delect
    public function result_delet()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->get('id');
            $this->Admin_model->delet_Result($id);
            redirect('admin/results', 'refresh');
            if ($this->db->affected_rows()) {
                $profile    = $this->Admin_model->getResultValue($id);
            } else {
                redirect('admin/results', 'refresh');
            }
        }
    }

    /*Start Staff*/
    /*Add Staff Form View*/
    public function add_staff()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data['settingsvalue'] = $this->Admin_model->getSettingsValue();
            $this->load->view('admin/add_staff', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    /*View Staff List*/
    public function staffs()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data                  = array();
            $data['stafflist']      = $this->Admin_model->getAllStaffs();
            $data['settingsvalue'] = $this->Admin_model->getSettingsValue();
            $this->load->view('admin/staff', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    /*Save Staff*/
    public function saveStaff()
    {
        if ($this->session->userdata('user_login_access') != False) {
            /*custom user id generator*/
            $userid    = 'U' . rand(500, 1000);
            $password     = $this->input->post('password');

            /*generate random user ID from 500 to 1000*/
            $username  = $this->input->post('name');
            $email     = $this->input->post('email');
            $contact   = $this->input->post('contact');
            $date      = date('Y-m-d');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters();
            /* Validating Name Field*/
            $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]|max_length[60]|xss_clean');
            /*validating email field*/
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[7]|max_length[100]|xss_clean');

            /*validating contact field*/
            $this->form_validation->set_rules('contact', 'Contact', 'trim|xss_clean|min_length[10]|max_length[13]');
            /*validating role field*/
            $this->form_validation->set_rules('role', 'Role', 'trim|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                if ($this->login_model->Does_email_exists($email)) {
                    $response['status']  = 'error';
                    $response['message'] = 'Email already exits';
                    $this->output->set_output(json_encode($response));
                } else {
                    if ($_FILES['user_image']['name']) {
                        $file_name     = $_FILES['user_image']['name'];
                        $fileSize      = $_FILES["user_image"]["size"] / 1024;
                        $fileType      = $_FILES["user_image"]["type"];
                        $new_file_name = '';
                        $new_file_name .= $userid;
                        $config = array(
                            'file_name' => $new_file_name,
                            'upload_path' => "./assets/img/user",
                            'allowed_types' => "gif|jpg|png|jpeg",
                            'overwrite' => False,
                            'max_size' => "20240000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                            // 'max_height' => "600",
                            // 'max_width' => "600"
                        );
                        $this->load->library('Upload', $config);
                        $this->upload->initialize($config);
                        if (!$this->upload->do_upload('user_image')) {
                            $response['status']  = 'error';
                            $response['message'] = $this->upload->display_errors();
                            $this->output->set_output(json_encode($response));
                        } else {
                            $path                = $this->upload->data();
                            $img_url             = $path['file_name'];
                            $data                = array();
                            $data                = array(
                                'password' => sha1($password),
                                'user_id' => $userid,
                                'full_name' => $username,
                                'email' => $email,
                                'image' => $img_url,
                                'contact' => $contact,
                                'status' => 'ACTIVE',
                                'user_type' => 'Staff',
                                'created_on' => $date
                            );
                            $success             = $this->Admin_model->addUserInfo($data);
                            $response['status']  = 'success';
                            $response['message'] = "Successfully Added";
                            // $this->session->set_flashdata('feedback','Successfully Created');
                            $this->output->set_output(json_encode($response));
                        }
                    } else {
                        $data                = array();
                        $data                = array(
                            'user_id' => $userid,
                            'password' => sha1($password),
                            'full_name' => $username,
                            'email' => $email,
                            'contact' => $contact,
                            'status' => 'ACTIVE',
                            'user_type' => 'Staff',
                            'created_on' => $date
                        );
                        $success             = $this->Admin_model->addUserInfo($data);
                        $response['status']  = 'success';
                        $response['message'] = "Successfully Created";
                        $this->output->set_output(json_encode($response));
                        // $this->session->set_flashdata('feedback','Successfully Created'); 
                    }
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    /*Update Staff*/
    public function updateStaffValue()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id       = $this->input->post('userid');
            $password     = $this->input->post('password');
            $username = $this->input->post('name');
            $email    = $this->input->post('email');
            $contact  = $this->input->post('contact');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters();
            /* Validating Name Field*/
            $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]|max_length[60]|xss_clean');
            /*validating email field*/
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[7]|max_length[100]|xss_clean');

            /*validating contact field*/
            $this->form_validation->set_rules('contact', 'Contact', 'trim|xss_clean|min_length[10]|max_length[13]');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                if ($_FILES['user_image']['name']) {
                    $profile       = $this->Admin_model->getUserValue($id);
                    $file_name     = $_FILES['user_image']['name'];
                    $fileSize      = $_FILES["user_image"]["size"] / 1024;
                    $fileType      = $_FILES["user_image"]["type"];
                    $new_file_name = '';
                    $new_file_name .= $id;
                    $checkimage = "./assets/img/user/$profile->image";
                    $config = array(
                        'file_name' => $new_file_name,
                        'upload_path' => "./assets/img/user",
                        'allowed_types' => "gif|jpg|png|jpeg",
                        'overwrite' => False,
                        // Can be set to particular file size , here it is 2 MB(2048 Kb)
                    );
                    $this->load->library('Upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('user_image')) {
                        $response['status']  = 'error';
                        $response['message'] = $this->upload->display_errors();
                        $this->output->set_output(json_encode($response));
                    } else {
                        if (file_exists($checkimage)) {
                            unlink($checkimage);
                        }
                        $path                = $this->upload->data();
                        $img_url             = $path['file_name'];
                        $data                = array();
                        $data                = array(
                            'full_name' => $username,
                            'password' => sha1($password),
                            'email' => $email,
                            'image' => $img_url,
                            'contact' => $contact
                        );
                        $success             = $this->Admin_model->StaffUpdate($id, $data);
                        $response['id']      = $id;
                        $data['image']       = base_url() . 'assets/img/user/' . $data['image'];
                        $response['data']    = $data;
                        $response['status']  = 'success';
                        $response['message'] = "Successfully Updated, ";
                        $this->output->set_output(json_encode($response));
                        // $this->session->set_flashdata('feedback','Successfully Updated');  

                    }
                } else {
                    $data                = array();
                    $data                = array(
                        'full_name' => $username,
                        'password' => sha1($password),
                        'email' => $email,
                        'contact' => $contact
                    );
                    $success             = $this->Admin_model->StaffUpdate($id, $data);
                    $response['id']      = $id;
                    $response['data']    = $data;
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    /*Reset Staff*/
    public function resetRoleId()
    {
        $userid = $_GET['id'];
        $data = array(
            'role_id' => '0'
        );
        $data['userdata'] = $this->Admin_model->getResetRole($userid, $data);
        $response['status']  = 'success';
        $response['message'] = "Reset Successfully!";
        $this->output->set_output(json_encode($response));
        redirect('admin/user_role', 'refresh');
    }

    /*delete Staff*/
    public function staff_delet()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->get('id');
            $this->Admin_model->userTableDelet($id);
            if ($this->db->affected_rows()) {
                $profile    = $this->Admin_model->getUserValue($id);
                $checkimage = "./assets/img/user/$profile->image";
                if (file_exists($checkimage)) {
                    unlink($checkimage);
                    redirect('admin/staffs', 'refresh');
                }
                /*$this->Admin_model->User_Notes_Delet($id);
        $this->Admin_model->User_commentid_Delet($id);*/
            } else {
                redirect('admin/staffs', 'refresh');
            }
        }
    }
    /*End Staff*/


    public function packege_name()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data             = array();
            $data['pacs'] = $this->Admin_model->getPackege();
            $this->load->view('admin/packege', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function subcriptions()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data                = array();
            $data['pkg'] = $this->Admin_model->getPackege();

            $data['pkg_list'] = $this->Admin_model->getSubscription();
            $this->load->view('admin/subcriptions', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    /*product category validation*/
    public function saveSubscription()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $packege_id = $this->input->post('packege_id');
            $cost = $this->input->post('cost');
            $status   = $this->input->post('status');

            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');

            $this->form_validation->set_rules('status', ' Status', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'packege_id' => $packege_id,
                    'cost' => $cost,
                    'status' => $status
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updateSubscription($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertSubscription($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    /*product category validation*/
    public function savePackegeData()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $packege_name = $this->input->post('packege_name');
            $status   = $this->input->post('status');

            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');

            $this->form_validation->set_rules('status', ' Status', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'packege_name' => $packege_name,
                    'status' => $status
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updatePackege($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertPackege($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function PackegeById()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id                = $this->input->get('id');
            $data['packege'] = $this->Admin_model->getPackegebyid($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function packege_delet()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->get('id');
            $this->Admin_model->packegeTableDelet($id);
            redirect('admin/packege_name', 'refresh');
            if ($this->db->affected_rows()) {
                $profile    = $this->Admin_model->getPackegebyid($id);
            } else {
                redirect('admin/packege_name', 'refresh');
            }
        }
    }

    public function packegelist_delet()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->get('id');
            $this->Admin_model->subscriptionTableDelet($id);
            redirect('admin/subcriptions', 'refresh');
            if ($this->db->affected_rows()) {
                $profile    = $this->Admin_model->getPackegebyid($id);
            } else {
                redirect('admin/subcriptions', 'refresh');
            }
        }
    }




    public function faq()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data                = array();
            $data['faq'] = $this->Admin_model->getfaq();
            $this->load->view('admin/faq', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    /*product category validation*/
    public function FaqData()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $question = $this->input->post('question');
            $answer = $this->input->post('answer');
            $status   = $this->input->post('status');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');

            $this->form_validation->set_rules('status', ' Status', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'question' => $question,
                    'answer' => $answer,
                    'status' => $status
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updatefaq($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertfaq($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function faqById()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id                = $this->input->get('id');
            $data['faqss'] = $this->Admin_model->getfaqbyid($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function faq_delet()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->get('id');
            $this->Admin_model->faqTableDelet($id);
            redirect('admin/faq', 'refresh');
            if ($this->db->affected_rows()) {
                $profile    = $this->Admin_model->getfaqbyid($id);
            } else {
                redirect('admin/faq', 'refresh');
            }
        }
    }

    public function about()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data                = array();
            $data['abt'] = $this->Admin_model->getabout();
            $this->load->view('admin/about', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function save_about()
    {

        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $discription = $this->input->post('discription');
            $title = $this->input->post('title');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'title' => $title,
                    'discription' => $discription
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updateabout($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertabout($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function save_about2()
    {

        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $discription2 = $this->input->post('discription2');
            $title2 = $this->input->post('title2');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'title2' => $title2,
                    'discription2' => $discription2
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updateabout($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertabout($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function save_about3()
    {

        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $discription3 = $this->input->post('discription3');
            $title3 = $this->input->post('title3');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'title3' => $title3,
                    'discription3' => $discription3
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updateabout($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertabout($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function save_about4()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $discription4 = $this->input->post('discription4');
            $title4 = $this->input->post('title4');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'title4' => $title4,
                    'discription4' => $discription4
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updateabout($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertabout($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function AboutById()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id                = $this->input->get('id');
            $data['abouts'] = $this->Admin_model->getaboutbyid($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function freetip()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data                = array();
            $data['frtp'] = $this->Admin_model->getfreetip();
            $data['marketslist'] = $this->Admin_model->getmarkets();
            $this->load->view('admin/free_tips', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    /*product Markets validation*/
    public function save_freetip()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->post('id');
            $date = $this->input->post('date');
            $market_id = $this->input->post('market_id');
            $open   = $this->input->post('open');
            $close = $this->input->post('close');

            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('market_id', 'Markets id', 'trim|min_length[1]|max_length[255]|xss_clean');
            $this->form_validation->set_rules('open', 'Open', 'trim|min_length[1]|max_length[3]|xss_clean');
            $this->form_validation->set_rules('close', 'Close', 'trim|min_length[1]|max_length[3]|xss_clean');


            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'market_id' => $market_id,
                    'date' => $date,
                    'open' => $open,
                    'close' => $close

                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updatefreetip($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertfreetip($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function freeTipById()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id               = $this->input->get('id');
            $data['freetipvalue'] = $this->Admin_model->getFreetipValueById($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function freetip_delet()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->get('id');
            $this->Admin_model->delet_freetip($id);
            redirect('admin/freetip', 'refresh');
            if ($this->db->affected_rows()) {
                $profile    = $this->Admin_model->getfreetipValue($id);
            } else {
                redirect('admin/freetip', 'refresh');
            }
        }
    }

    public function popularity()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data                = array();
            $data['pplrt'] = $this->Admin_model->getpopularity();
            $this->load->view('admin/popularity', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function popularityById()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id                = $this->input->get('id');
            $data['abouts'] = $this->Admin_model->getpopularitybyid($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function save_popularity1()
    {

        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $discription1 = $this->input->post('discription1');
            $title1 = $this->input->post('title1');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'title1' => $title1,
                    'discription1' => $discription1
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updatepopularity($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertpopularity($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function save_popularity2()
    {

        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $discription2 = $this->input->post('discription2');
            $title2 = $this->input->post('title2');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'title2' => $title2,
                    'discription2' => $discription2
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updatepopularity($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertpopularity($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function save_popularity3()
    {

        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $discription3 = $this->input->post('discription3');
            $title3 = $this->input->post('title3');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'title3' => $title3,
                    'discription3' => $discription3
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updatepopularity($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertpopularity($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function save_popularity4()
    {

        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $discription4 = $this->input->post('discription4');
            $title4 = $this->input->post('title4');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'title4' => $title4,
                    'discription4' => $discription4
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updatepopularity($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertpopularity($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function save_popularity5()
    {

        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $discription5 = $this->input->post('discription5');
            $title5 = $this->input->post('title5');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'title5' => $title5,
                    'discription5' => $discription5
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updatepopularity($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertpopularity($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function save_popularity6()
    {

        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $discription6 = $this->input->post('discription6');
            $title6 = $this->input->post('title6');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'title6' => $title6,
                    'discription6' => $discription6
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updatepopularity($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertpopularity($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function save_popularity7()
    {

        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $discription7 = $this->input->post('discription7');
            $title7 = $this->input->post('title7');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'title7' => $title7,
                    'discription7' => $discription7
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updatepopularity($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertpopularity($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function save_popularity8()
    {

        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $discription8 = $this->input->post('discription8');
            $title8 = $this->input->post('title8');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'title8' => $title8,
                    'discription8' => $discription8
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updatepopularity($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertpopularity($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function save_popularity9()
    {

        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $discription9 = $this->input->post('discription9');
            $title9 = $this->input->post('title9');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'title9' => $title9,
                    'discription9' => $discription9
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updatepopularity($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertpopularity($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function save_popularity10()
    {

        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $discription10 = $this->input->post('discription10');
            $title10 = $this->input->post('title10');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'title10' => $title10,
                    'discription10' => $discription10
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updatepopularity($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertpopularity($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function save_popularity11()
    {

        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $discription11 = $this->input->post('discription11');
            $title11 = $this->input->post('title11');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'title11' => $title11,
                    'discription11' => $discription11
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updatepopularity($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertpopularity($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function save_popularity12()
    {

        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $discription12 = $this->input->post('discription12');
            $title12 = $this->input->post('title12');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'title12' => $title12,
                    'discription12' => $discription12
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updatepopularity($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertpopularity($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function save_popularity13()
    {

        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $discription13 = $this->input->post('discription13');
            $title13 = $this->input->post('title13');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'title13' => $title13,
                    'discription13' => $discription13
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updatepopularity($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertpopularity($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function charts()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data                = array();
            $data['charts'] = $this->Admin_model->getCharts();
            $data['mrkt'] = $this->Admin_model->getmarkets();
            $this->load->view('admin/charts', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    /*product Chart validation*/
    public function save_chart()
    {

        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->post('id');
            $market_id = $this->input->post('market_id');
            $open   = $this->input->post('open');
            $close = $this->input->post('close');
            $jodi   = $this->input->post('jodi');

            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('market_id', 'Markets Id', 'trim|min_length[0]|max_length[25]|xss_clean');
            $this->form_validation->set_rules('open', 'Open ', 'trim');
            $this->form_validation->set_rules('close', 'Close', 'trim');

            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'market_id' => $market_id,
                    'open' => $open,
                    'close' => $close


                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updatechart($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertchart($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function chartById()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id               = $this->input->get('id');
            $data['chartvalue'] = $this->Admin_model->getChartById($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    # user delect
    public function chart_delet()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->get('id');
            $this->Admin_model->delet_chart($id);
            redirect('admin/charts', 'refresh');
            if ($this->db->affected_rows()) {
                $profile    = $this->Admin_model->getChartById($id);
            } else {
                redirect('admin/charts', 'refresh');
            }
        }
    }

    public function markets()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data             = array();
            $data['marketslist'] = $this->Admin_model->getmarkets();
            $this->load->view('admin/markets', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function marketById()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id               = $this->input->get('id');
            $data['marketValue'] = $this->Admin_model->getmarketValue($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    /*product Markets validation*/
    public function save_market()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->post('id');
            $market_name = $this->input->post('market_name');
            $result_open_start_time = $this->input->post('result_open_start_time');
            $result_open_end_time   = $this->input->post('result_open_end_time');
            $result_close_start_time = $this->input->post('result_close_start_time');

            $jodi_chart_url   = $this->input->post('jodi_chart_url');
            $panel_chart_url = $this->input->post('panel_chart_url');
            $result_close_end_time   = $this->input->post('result_close_end_time');
            $result_display_start_time = $this->input->post('result_display_start_time');
            $result_display_end_time   = $this->input->post('result_display_end_time');
            $status   = $this->input->post('status');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('market_name', 'Markets Name', 'trim|min_length[1]|max_length[255]|xss_clean');
            $this->form_validation->set_rules('result_open_start_time', 'Result Open Start Time', 'trim|required|xss_clean');
            $this->form_validation->set_rules('result_open_end_time', 'Result Open End Time', 'trim|required|xss_clean');
            $this->form_validation->set_rules('result_close_start_time', 'Result Close Start Time', 'trim|required|xss_clean');
            $this->form_validation->set_rules('result_close_end_time', 'Result Close End Time', 'trim|required|xss_clean');


            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'market_name' => $market_name,
                    'result_open_start_time' => $result_open_start_time,
                    'result_open_end_time' => $result_open_end_time,
                    'result_close_start_time' => $result_close_start_time,
                    'result_close_end_time' => $result_close_end_time,
                    'result_display_start_time' => $result_display_start_time,
                    'result_display_end_time' => $result_display_end_time,

                    'jodi_chart_url' => $jodi_chart_url,
                    'panel_chart_url' => $panel_chart_url,
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



    public function market_delet()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->get('id');
            $this->Admin_model->delet_market($id);
            redirect('admin/markets', 'refresh');
            if ($this->db->affected_rows()) {
                $profile    = $this->Admin_model->getmarketValue($id);
            } else {
                redirect('admin/markets', 'refresh');
            }
        }
    }


    /*start market assign*/


    public function marketassign()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data             = array();
            $data['users'] = $this->Admin_model->getAllUsers();
            $data['mrkt'] = $this->Admin_model->getmarketassign();
            $data['markets'] = $this->Admin_model->getmarkets();
            $this->load->view('admin/marketsassign', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function marketassignById()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id               = $this->input->get('id');
            $data['marketValue'] = $this->Admin_model->getmarketassignValue($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    /*product Markets validation*/
    public function save_marketassign()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->post('id');
            $market_id = $this->input->post('market_id');
            $user_id = $this->input->post('user_id');
            $status   = $this->input->post('status');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('market_id', 'Markets Name', 'trim|min_length[1]|max_length[255]|xss_clean');


            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'market_id' => $market_id,
                    'user_id' => $user_id,
                    'status' => $status
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updatemarketassign($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertmarketassign($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }



    public function marketassign_delet()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->get('id');
            $this->Admin_model->delet_marketassign($id);
            redirect('admin/marketassign', 'refresh');
            if ($this->db->affected_rows()) {
                $profile    = $this->Admin_model->getmarketassignValue($id);
            } else {
                redirect('admin/marketassign', 'refresh');
            }
        }
    }

    /*End market assign*/



    public function desclaimers()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data                = array();
            $data['dsclmr'] = $this->Admin_model->getDesclaimer();
            $this->load->view('admin/desclaimer', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function desclaimerbyid()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id                = $this->input->get('id');
            $data['desclaimervalue'] = $this->Admin_model->getdesclaimerbyid($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function save_desclaimer()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $desclaimer = $this->input->post('desclaimer');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'desclaimer' => $desclaimer
                );
                $update              = $this->Admin_model->updatedesclaimer($id, $data);
                $response['status']  = 'success';
                $response['message'] = "Successfully Updated";
                $this->output->set_output(json_encode($response));
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }



    public function notifications()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data                = array();
            $data['notifications'] = $this->Admin_model->getNotification();
            $this->load->view('admin/notifications', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function notificationbyid()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id                = $this->input->get('id');
            $data['notificationvalue'] = $this->Admin_model->getnotificationbyid($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function updatenotification()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id       = $this->input->post('id');
            $text = $this->input->post('text');
            $status  = $this->input->post('status');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters();
            // Validating Name Field
            $this->form_validation->set_rules('text', 'Description', 'trim|required|min_length[2]|max_length[100]|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                if (($_FILES['user_image']['name']) != "") {
                    $file_name     = $_FILES['user_image']['name'];
                    $fileSize      = $_FILES["user_image"]["size"] / 1024;
                    $fileType      = $_FILES["user_image"]["type"];
                    $config = array(
                        'file_name' => $file_name,
                        'upload_path' => "./assets/img/notification",
                        'allowed_types' => "gif|jpg|png|jpeg",
                        'overwrite' => False,
                        // Can be set to particular file size , here it is 2 MB(2048 Kb)
                    );
                    $this->load->library('Upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('user_image')) {
                        $response['status']  = 'error';
                        $response['message'] = $this->upload->display_errors();
                        $this->output->set_output(json_encode($response));
                    } else {
                        $path                = $this->upload->data();
                        $img_url             = $path['file_name'];
                        $data                = array(
                            'text' => $text,
                            'image' => $img_url,
                            'status' => $status
                        );
                        $success             = $this->Admin_model->updatenotification($id, $data);
                        $response['id']      = $id;
                        $data['image']       = base_url() . 'assets/img/notification/' . $data['image'];
                        $response['data']    = $data;
                        $response['status']  = 'success';
                        $response['message'] = "Successfully Updated";
                        $this->output->set_output(json_encode($response));
                        #$this->session->set_flashdata('feedback','Successfully Updated');    
                    }
                } else {
                    $data                = array(
                        'text' => $text,
                        'status' => $status
                    );
                    $success             = $this->Admin_model->updatenotification($id, $data);
                    $response['id']      = $id;
                    $response['data']    = $data;
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }



    public function pass()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data                = array();
            $data['passes'] = $this->Admin_model->getpass();
            $this->load->view('admin/passes', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function passbyid()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id                = $this->input->get('id');
            $data['passvalue'] = $this->Admin_model->getpassbyid($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function save_pass()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $pass = $this->input->post('pass');
            $status = $this->input->post('status');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'pass' => $pass,
                    'status' => $status
                );
                $update              = $this->Admin_model->updatepass($id, $data);
                $response['status']  = 'success';
                $response['message'] = "Successfully Updated";
                $this->output->set_output(json_encode($response));
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }



    public function live_update()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data                = array();
            $data['lives'] = $this->Admin_model->getlive_update();
            $this->load->view('admin/live_update', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function live_updatebyid()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id                = $this->input->get('id');
            $data['livevalue'] = $this->Admin_model->getlive_updatebyid($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function save_live_update()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $description = $this->input->post('description');
            $status = $this->input->post('status');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'description' => $description,
                    'status' => $status
                );
                $update              = $this->Admin_model->updatelive_update($id, $data);
                $response['status']  = 'success';
                $response['message'] = "Successfully Updated";
                $this->output->set_output(json_encode($response));
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function wiki()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data                = array();
            $data['wikivalue'] = $this->Admin_model->getwiki();
            $this->load->view('admin/wiki', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function wikiById()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id                = $this->input->get('id');
            $data['wikis'] = $this->Admin_model->getwikibyid($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function save_wiki()
    {

        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $description = $this->input->post('description');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'description' => $description
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updatewiki($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertwiki($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }



    public function kalyan_achuk()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data             = array();
            $data['achuklist'] = $this->Admin_model->getkalyan_achuk();
            $this->load->view('admin/kalyan_achuk', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function kalyan_achukById()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id               = $this->input->get('id');
            $data['achukValue'] = $this->Admin_model->getachukValue($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    /*product Markets validation*/
    public function save_achuk()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->post('id');

            $description = $this->input->post('description');
            $status   = $this->input->post('status');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('description', 'Description', 'trim|min_length[1]|max_length[255]|xss_clean');


            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,

                    'description' => $description,
                    'status' => $status
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updateachuk($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertachuk($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }



    public function kalyanachuk_delet()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->get('id');
            $this->Admin_model->delet_achuk($id);
            redirect('admin/kalyan_achuk', 'refresh');
            if ($this->db->affected_rows()) {
                $profile    = $this->Admin_model->getachukValue($id);
            } else {
                redirect('admin/kalyan_achuk', 'refresh');
            }
        }
    }

    public function whatsapp_img()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data             = array();
            $data['whatsapp_image'] = $this->Admin_model->getw_img();
            $this->load->view('admin/whatsapp_img', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function addwhatsapp_img()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $this->load->view('admin/addwhatsapp_img');
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function w_imgById()
    {
        if ($this->session->userdata('user_login_access') != False) {

            $id               = $this->input->get('id');
            $data['w_imgValue'] = $this->Admin_model->getw_imgValue($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    //      public function save_w_img(){
    //     if ($this->session->userdata('user_login_access') != False) {
    //         $id    = $this->input->post('id');
    //         $status  = $this->input->post('status');
    //         $this->load->library('form_validation');
    //         $this->form_validation->set_error_delimiters();
    //         $this->form_validation->set_rules('id', 'Id', 'trim|min_length[5]|max_length[1000]|xss_clean');
    //         if ($this->form_validation->run() == FALSE) {
    //             $response['status']  = 'error';
    //             $response['message'] = validation_errors();
    //             $this->output->set_output(json_encode($response));
    //         } else {
    //             if ($_FILES['user_image']['name']) {
    //                 $file_name     = $_FILES['user_image']['name'];
    //                 $fileSize      = $_FILES["user_image"]["size"] / 1024;
    //                 $fileType      = $_FILES["user_image"]["type"];
    //                 $new_file_name = '';
    //                 $new_file_name .= $id;
    //                 $config = array(
    //                     'file_name' => $new_file_name,
    //                     'upload_path' => "./assets/img/whatsappimg",
    //                     'allowed_types' => "gif|jpg|png|jpeg",
    //                 );
    //                 $this->load->library('Upload', $config);
    //                 $this->upload->initialize($config);
    //                 if (!$this->upload->do_upload('user_image')) {
    //                     $response['status']  = 'error';
    //                     $response['message'] = $this->upload->display_errors();
    //                     $this->output->set_output(json_encode($response));
    //                 } else {
    //                     $path                = $this->upload->data();
    //                     $img_url             = $path['file_name'];
    //                     $data                = array();
    //                     $data                = array(
    //                         'id' => $id,
    //                         'image' => $img_url,
    //                         'status' => $status
    //                     );
    //                     $success             = $this->Admin_model->insertw_img($data);
    //                     $response['status']  = 'success';
    //                     $response['message'] = "Successfully Added";
    //                     $this->output->set_output(json_encode($response));
    // #$this->session->set_flashdata('feedback','Successfully Created');
    //                 }
    //             } else {
    //                 $data                = array();
    //                 $data                = array(
    //                     'id' => $id,
    //                     'image' => $img_url,
    //                     'status' => $status
    //                 );
    //                 $success             = $this->Admin_model->insertw_img($data);
    //                 $response['status']  = 'success';
    //                 $response['message'] = "Successfully Created";
    //                 $this->output->set_output(json_encode($response));
    // #$this->session->set_flashdata('feedback','Successfully Created');    
    //             }
    //         }
    //     }
    //     else {
    //         redirect(base_url(), 'refresh');
    //     }
    // }

    public function updateW_img()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id       = $this->input->post('id');
            $status  = $this->input->post('status');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters();

            /*validating id field*/
            $this->form_validation->set_rules('id', 'id', 'trim|min_length[0]|max_length[100]|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                if (($_FILES['user_image']['name']) != "") {
                    $file_name     = $_FILES['user_image']['name'];
                    $fileSize      = $_FILES["user_image"]["size"] / 1024;
                    $fileType      = $_FILES["user_image"]["type"];
                    $config = array(
                        'file_name' => $file_name,
                        'upload_path' => "./assets/img/whatsappimg",
                        'allowed_types' => "gif|jpg|png|jpeg",
                        'overwrite' => False,
                        // Can be set to particular file size , here it is 2 MB(2048 Kb)
                    );
                    $this->load->library('Upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('user_image')) {
                        $response['status']  = 'error';
                        $response['message'] = $this->upload->display_errors();
                        $this->output->set_output(json_encode($response));
                    } else {
                        $path                = $this->upload->data();
                        $img_url             = $path['file_name'];
                        $data                = array(

                            'id' => $id,
                            'image' => $img_url,
                            'status' => $status
                        );
                        $success             = $this->Admin_model->updatew_img($id, $data);
                        $response['id']      = $id;
                        $data['image']       = base_url() . 'assets/img/whatsappimg/' . $data['image'];
                        $response['data']    = $data;
                        $response['status']  = 'success';
                        $response['message'] = "Successfully Updated";
                        $this->output->set_output(json_encode($response));
                        #$this->session->set_flashdata('feedback','Successfully Updated');    
                    }
                } else {
                    $data                = array(

                        'id' => $id,
                        'status' => $status
                    );
                    $success             = $this->Admin_model->updatew_img($id, $data);
                    $response['id']      = $id;
                    $response['data']    = $data;
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function  w_img_delet()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->get('id');
            $this->Admin_model->delet_w_img($id);
            redirect('admin/whatsapp_img', 'refresh');
            if ($this->db->affected_rows()) {
                $profile    = $this->Admin_model->getw_imgValue($id);
            } else {
                redirect('admin/whatsapp_img', 'refresh');
            }
        }
    }


    public function liveupdate()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data             = array();
            $data['requestlist'] = $this->Admin_model->getLiveResult();
            $data['users'] = $this->Admin_model->getAllUsers();
            $data['mrkt'] = $this->Admin_model->getmarkets();
            $this->load->view('admin/liveupdate', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }




    public function save_liveupdate()
    {

        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->post('id');
            $user_id = $this->input->post('user_id');
            $user_type = $this->input->post('user_type');
            $market_id = $this->input->post('market_id');
            $date   = $this->input->post('date');
            $get_day = strtotime($date);
            $result = date('l', $get_day);
            $day = strtoupper(substr($result, 0, 3));

            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('market_id', 'Markets name', 'trim|min_length[0]|max_length[50]|xss_clean');
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
                    'date' => $date,
                    'day' => $day
                );
                if (!empty($id)) {
                    $update              = $this->Admin_model->updateLiveResult($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->Admin_model->insertLiveResult($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }



    public function liveresultsById()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id               = $this->input->get('id');
            $data['ResultValue'] = $this->Admin_model->getLiveResultValueById($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    # user delect
    public function liveresult_delet()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->get('id');
            $this->Admin_model->delet_liveResult($id);
            redirect('admin/results', 'refresh');
            if ($this->db->affected_rows()) {
                $profile    = $this->Admin_model->getLiveResultValue($id);
            } else {
                redirect('admin/results', 'refresh');
            }
        }
    }

    public function winners()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data             = array();
            $data['requestlist'] = $this->Admin_model->getResult();
            $data['users'] = $this->Admin_model->getAllUsers();
            $data['mrkt'] = $this->Admin_model->getmarkets();
            $this->load->view('admin/winners', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function activeusers()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data             = array();
            $data['requestlist'] = $this->Admin_model->getResult();
            $data['users'] = $this->Admin_model->getAllUsers();
            $data['mrkt'] = $this->Admin_model->getmarkets();
            $this->load->view('admin/activeusers', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function m_description()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data                = array();
            $data['lives'] = $this->Admin_model->getm_description();
            $this->load->view('admin/m_description', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function m_descriptionbyid()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id                = $this->input->get('id');
            $data['livevalue'] = $this->Admin_model->getm_descriptionbyid($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function save_m_description()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $description = $this->input->post('description');
            $status = $this->input->post('status');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'description' => $description,
                    'status' => $status
                );
                $update              = $this->Admin_model->updatem_description($id, $data);
                $response['status']  = 'success';
                $response['message'] = "Successfully Updated";
                $this->output->set_output(json_encode($response));
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function b_description()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data                = array();
            $data['lives'] = $this->Admin_model->getb_description();
            $this->load->view('admin/b_description', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function b_descriptionbyid()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id                = $this->input->get('id');
            $data['livevalue'] = $this->Admin_model->getb_descriptionbyid($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function save_b_description()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('id');
            $description = $this->input->post('description');
            $status = $this->input->post('status');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id', ' Id', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'description' => $description,
                    'status' => $status
                );
                $update              = $this->Admin_model->updateb_description($id, $data);
                $response['status']  = 'success';
                $response['message'] = "Successfully Updated";
                $this->output->set_output(json_encode($response));
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function jodi()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data                = array();
            $data['requestlist'] = $this->Admin_model->getResult();
            $data['users'] = $this->Admin_model->getAllUsers();
            $data['mrkt'] = $this->Admin_model->getmarkets();
            $this->load->view('admin/jodi', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function panna()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data                = array();
           // $data['requestlist'] = $this->Admin_model->getResult();
            $id =  $this->session->userdata('user_login_id');
          
            $data['users'] = $this->Admin_model->getAllUsers();
            $data['mrkt'] = $this->Admin_model->getmarkets();
            $this->load->view('admin/panna', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function single()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data                = array();
            $id =  $this->session->userdata('user_login_id');
            //$data['requestlist'] = $this->Admin_model->getallsingledata();
            $data['users'] = $this->Admin_model->getAllUsers();
            $data['mrkt'] = $this->Admin_model->getmarkets();

            $this->load->view('admin/single', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function getsingle()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id                = $this->input->post('game');
            $type                = $this->input->post('type');
            $date                = $this->input->post('result_date');
            $response['requestlists'] = $this->Admin_model->getalldatebydate($id, $date, $type);

            $response['status']  = 'success';
           
            $this->output->set_output(json_encode($response));
           
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function getpanna()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id                = $this->input->post('game');
            $type                = $this->input->post('type');
            $date                = $this->input->post('result_date');
            $response['$requestlist'] = $this->Admin_model->getalldatebydate($id, $date, $type);

            $response['status']  = 'success';
            $this->output->set_output(json_encode($response));
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    
    function wallet_status($wallet_id , $status){
     $wallet = $this->db->query("SELECT * FROM wallets WHERE id =".$wallet_id)->row();
     if(!$wallet->id){
      $response = ['status' => 400 ,'message' => 'Wallet amount not found'];
            return  $this->output->set_output(json_encode($response));

     }
     
     $check_user_wallet = $this->db->query("SELECT * FROM user_wallets WHERE user_id = ".$wallet->user_id)->row();
     
     if($status == 1){
   
         if(isset( $check_user_wallet->id)){
             
        $this->db->where('user_id',  $wallet->user_id);
        $this->db->set('amount', 'amount+'.$wallet->amount, FALSE);
        $this->db->update('user_wallets');
             
             
         }else{
             
         
         $wallet_amt = ['user_id'=>  $wallet->user_id , 'amount'=>  $wallet->amount];
         
         $this->db->insert('user_wallets', $wallet_amt);
         
         }
         
        $this->db->where('id', $wallet_id);
        $this->db->set('status', '1');
        $this->db->update('wallets');
         
         
         
         $response = ['status' => 200 , 'message' => 'Wallet amount add succesfully !'];
         
       return  $this->output->set_output(json_encode($response));

     }
     
     if($status == 2){
       
        $this->db->where('id', $wallet_id);
        $this->db->set('status', '2');
        $this->db->update('wallets');  
        
        $response = ['status' => 200 , 'message' => 'Wallet requsted rejected !'];
        return $this->output->set_output(json_encode($response));
     }
    $response = ['status' => 400 , 'message' => 'Something went wrong..'];
    $this->output->set_output(json_encode($response));
 
    }
    
    public function wallet(){
        
          $wallets = $this->db->query("SELECT * FROM wallets WHERE id > 0  order by id desc " )->result();
          if(isset($wallets[0])){
              for($i=0;$i<count($wallets);$i++){
                  
                  $wallets[$i]->users = $this->db->query("SELECT * FROM users where id = ".$wallets[$i]->user_id)->row();
                  
              }
          }
          
          $data['wallets']= $wallets;

        return $this->load->view('admin/wallet', $data);
    }
}
/*End admin controller*/