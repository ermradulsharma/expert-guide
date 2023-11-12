<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller{

   function __construct(){
      parent::__construct();
      $this->load->database();
      $this->load->model('Admin_model');
      $this->load->model('login_model');
      $this->load->model('User_model');
      $this->load->model('Staff_model');
   }



   public function about(){
      $this->load->view('frontend/about');
   }


   

   public function blog(){
      $this->load->view('frontend/blog');
   }



   public function blog_singel(){
      $this->load->view('frontend/blog_singel');
   }

   public function contact(){
      $this->load->view('frontend/contact');
   }



   public function courses(){
      $this->load->view('frontend/courses');
   }



   public function courses_singel(){
      $this->load->view('frontend/courses_singel');
   }



   public function events(){
      $this->load->view('frontend/events');
   }



   public function events_singel(){
      $this->load->view('frontend/events_singel');
   }



   public function index(){
       $data             = array();
       $data['faq'] = $this->Admin_model->getfaq();
       $data['pplrt'] = $this->Admin_model->getpopularity();
       $data['abt'] = $this->Admin_model->getabout();
       $data['achuklist'] = $this->Admin_model->getkalyan_achuk();
       $data['whatsapp_image'] = $this->Admin_model->getw_img();
       $data['wikivalue'] = $this->Admin_model->getwiki();
       $data['charts'] = $this->Admin_model->getCharts();
       $data['guessingdata'] = $this->Admin_model->getpass(); 
       $data['resultlist']   = $this->Admin_model->getResultfrn();
       
       $data['mrkt']  = $this->Admin_model->getmarkets(); 
       $data['lives']  = $this->Admin_model->getlive_update(); 
       $data['desclaimers']   = $this->Admin_model->getDesclaimer(); 
       $data['settings'] = $this->Admin_model->getSettingsValue();
       $data['liveupdatestatus'] = $this->Admin_model->getlivestatus();
       $data['b_description'] = $this->Admin_model->getb_description();
       $data['m_description'] = $this->Admin_model->getm_description();



      // echo '<pre>'; print_r($data['mrkt']);     

      $this->load->view('frontend/index',$data );
   }



  public function save_signin(){
      $response = array();
        
        //Recieving post input of email, password from request
        $email    = $this->input->post('email');
        $password = sha1($this->input->post('password'));
        $remember = $this->input->post('remember');
        
        #Login input validation\
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('email', 'User Email', 'trim|xss_clean|required|min_length[7]');
        $this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required|min_length[6]');
        
        
        if ($this->form_validation->run() == FALSE) {
            $data['message'] = 'Credentials not valid.';
            $this->load->view('signin', $data);

        } else {
            //Validating login
            $login_status = $this->validate_login($email, $password);
            $response['login_status'] = $login_status;
            
            if ($login_status == 'success') {
                if ($remember) {
                    setcookie('email', $email, time() + (86400 * 30));
                    setcookie('password', $this->input->post('password'), time() + (86400 * 30));
                    redirect(base_url() . 'guessing-forum', 'refresh');
                    
                } else {
                    if (isset($_COOKIE['email'])) {
                        setcookie('email', '');
                    }
                    if (isset($_COOKIE['password'])) {
                        setcookie('password', '');
                    }
                    redirect(base_url() . 'guessing-forum', 'refresh');
                }
                
            } else {
                $data['message'] = 'Email or password is invalid.';
                $this->load->view('signin', $data);
            }
        }
  }


   public function registration(){
      $data             = array();
      $data['pkg'] = $this->Admin_model->getPackege();
      $data['pkg_list'] = $this->Admin_model->getSubscription();
      $data['settings'] = $this->Admin_model->getSettingsValue();
      $this->load->view('frontend/registration',$data );
   }



   public function jodi(){
      $this->load->view('frontend/jodi');
   }



   public function penal(){
      $this->load->view('frontend/penal');
   }



   public function satta_matka_vip_membership(){
        $data             = array();
      $data['settings'] = $this->Admin_model->getSettingsValue();
      $this->load->view('frontend/satta-matka-vip-membership',$data );
   }



   public function weekly_jodi_panna_all_satta_matka_cards(){
        $data             = array();
      $data['settings'] = $this->Admin_model->getSettingsValue();
      $this->load->view('frontend/weekly-jodi-panna-all-satta-matka-cards',$data );
   }



   public function satta_matka_tips_today_free_samajseva_game(){
        $data             = array();
        $data['guessingdata'] = $this->Admin_model->getpass();
      $data['settings'] = $this->Admin_model->getSettingsValue();
      $this->load->view('frontend/satta-matka-tips-today-free-samajseva-game',$data );
   }



   public function satta_matka_guessing_forum(){
      $data             = array();
      $data['lives']  = $this->Admin_model->getlive_update();
      $data['resultlist']   = $this->Admin_model->getResult();
       $data['achuklist'] = $this->Admin_model->getkalyan_achuk();
      $data['whatsapp_image'] = $this->Admin_model->getw_img();
      $data['settings'] = $this->Admin_model->getSettingsValue();
      $this->load->view('frontend/satta-matka-guessing-forum',$data );
   }



   public function all_satta_matka_and_jodi_patti_records(){
        $data             = array();
      $data['settings'] = $this->Admin_model->getSettingsValue();
      $this->load->view('frontend/all-satta-matka-and-jodi-patti-records',$data );
   }



   public function daily_single_and_chart_matka_trick(){
        $data             = array();
      $data['settings'] = $this->Admin_model->getSettingsValue();
      $this->load->view('frontend/daily-single-and-chart-matka-trick',$data );
   }



   public function time_bazar_matka_chart(){
        
        $data             = array();
        $data['settings'] = $this->Admin_model->getSettingsValue();

    
        $jodi    = $this->Admin_model->getResultValuemarket(2);

        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['monvalue'] = "";
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['tuevalue'] = "";
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['wedvalue'] = "";
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['thuvalue'] = "";
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['frivalue'] = "";
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['satvalue'] = "";
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $result[$i]['sunvalue'] = "";
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                if($val['mon'] ===$val2->date)
                    $result[$i]['monvalue'] = $val2->result_no;
                if($val['tue'] ===$val2->date)
                    $result[$i]['tuevalue'] = $val2->result_no;
                if($val['wed'] ===$val2->date)
                    $result[$i]['wedvalue'] = $val2->result_no;
                if($val['thu'] ===$val2->date)
                    $result[$i]['thuvalue'] = $val2->result_no;  
                if($val['fri'] ===$val2->date)
                    $result[$i]['frivalue'] = $val2->result_no; 
                if($val['sat'] ===$val2->date)
                    $result[$i]['satvalue'] = $val2->result_no; 
                if($val['sun'] ===$val2->date)
                    $result[$i]['sunvalue'] = $val2->result_no;                   
            }
            $i++;
        }

        $data['jodi2'] = $result;  
      $this->load->view('frontend/time-bazar-matka-chart',$data );
   }



   public function kalyan_matka_jodi_chart(){
      
        $data             = array();
        $data['settings'] = $this->Admin_model->getSettingsValue();

    
        $jodi    = $this->Admin_model->getResultValuemarket(4);

        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['monvalue'] = "";
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['tuevalue'] = "";
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['wedvalue'] = "";
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['thuvalue'] = "";
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['frivalue'] = "";
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['satvalue'] = "";
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $result[$i]['sunvalue'] = "";
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                if($val['mon'] ===$val2->date)
                    $result[$i]['monvalue'] = $val2->result_no;
                if($val['tue'] ===$val2->date)
                    $result[$i]['tuevalue'] = $val2->result_no;
                if($val['wed'] ===$val2->date)
                    $result[$i]['wedvalue'] = $val2->result_no;
                if($val['thu'] ===$val2->date)
                    $result[$i]['thuvalue'] = $val2->result_no;  
                if($val['fri'] ===$val2->date)
                    $result[$i]['frivalue'] = $val2->result_no; 
                if($val['sat'] ===$val2->date)
                    $result[$i]['satvalue'] = $val2->result_no; 
                if($val['sun'] ===$val2->date)
                    $result[$i]['sunvalue'] = $val2->result_no;                   
            }
            $i++;
        }

        $data['jodi2'] = $result;  
      $this->load->view('frontend/kalyan-matka-jodi-chart',$data );
   }
   
   
    public function panel_reulsts(){
       $market_id = $this->input->get('market');
    
        if(!isset($market_id) && empty($market_id)){
            return redirect("/");
        }
        $data             = array();
      $data['settings'] = $this->Admin_model->getSettingsValue();
       $jodi    = $this->Admin_model->getResultValuemarket(base64_decode( $market_id));
       
        $games = $this->db->query("SELECT * FROM markets WHERE id=".base64_decode($market_id))->row_array();
      
     
        $data['jodi']    = $jodi;
         $data['game']    = $games;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
              
            if(strtolower($val->day)==='mon'){
              
                $result[$i]['mon'] = $val->date;
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                $result[$i]['date'] = date("d/m/Y", strtotime($val['mon'])) ."<br> To <br>".date("d/m/Y", strtotime($val['sun']));
                if($val['mon'] ===$val2->date){
                    $result[$i]['monvalue'] = $val2;
                }
                if($val['tue'] ===$val2->date){
                    $result[$i]['tuevalue'] = $val2;
                }
                if($val['wed'] ===$val2->date){
                    $result[$i]['wedvalue'] = $val2;
                }
                if($val['thu'] ===$val2->date){
                    $result[$i]['thuvalue'] = $val2;  
                }
                if($val['fri'] ===$val2->date){
                    $result[$i]['frivalue'] = $val2; 
                }
                if($val['sat'] ===$val2->date){
                    $result[$i]['satvalue'] = $val2; 
                }
                if($val['sun'] ===$val2->date){
                    $result[$i]['sunvalue'] = $val2;                   
                }
            }
            $i++;
        }

        $data['jodi2'] = $result;
      $this->load->view('frontend/panel_result',$data );
   }
  
  
     public function jodhi_reulsts(){
        $market_id = $this->input->get('market');
    
        if(!isset($market_id) && empty($market_id)){
            return redirect("/");
        }
        $data             = array();
        $data['settings'] = $this->Admin_model->getSettingsValue();
    
        $jodi    = $this->Admin_model->getResultValuemarket(base64_decode( $market_id));
        $games = $this->db->query("SELECT * FROM markets WHERE id=".base64_decode( $market_id))->row_array();
        
      
        $data['jodi']    = $jodi;
        $data['game']    = $games;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['monvalue'] = "";
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['tuevalue'] = "";
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['wedvalue'] = "";
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['thuvalue'] = "";
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['frivalue'] = "";
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['satvalue'] = "";
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $result[$i]['sunvalue'] = "";
                $i++;
                
            }
                if(strtolower($val->day)==='thu'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['monvalue'] = "";
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['tuevalue'] = "";
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['wedvalue'] = "";
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['thuvalue'] = "";
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['frivalue'] = "";
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['satvalue'] = "";
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $result[$i]['sunvalue'] = "";
                $i++;
            }
             if(strtolower($val->day)==='fri'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['monvalue'] = "";
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['tuevalue'] = "";
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['wedvalue'] = "";
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['thuvalue'] = "";
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['frivalue'] = "";
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['satvalue'] = "";
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $result[$i]['sunvalue'] = "";
                $i++;
        
                 
             }
             if(strtolower($val->day)==='sat'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['monvalue'] = "";
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['tuevalue'] = "";
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['wedvalue'] = "";
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['thuvalue'] = "";
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['frivalue'] = "";
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['satvalue'] = "";
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $result[$i]['sunvalue'] = "";
                $i++;
        
                 
             }
                 if(strtolower($val->day)==='sun'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['monvalue'] = "";
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['tuevalue'] = "";
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['wedvalue'] = "";
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['thuvalue'] = "";
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['frivalue'] = "";
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['satvalue'] = "";
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $result[$i]['sunvalue'] = "";
                $i++;
        
                 
             }
              if(strtolower($val->day)==='tue'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['monvalue'] = "";
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['tuevalue'] = "";
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['wedvalue'] = "";
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['thuvalue'] = "";
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['frivalue'] = "";
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['satvalue'] = "";
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $result[$i]['sunvalue'] = "";
                $i++;
        
                 
             }
             if(strtolower($val->day)==='web'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['monvalue'] = "";
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['tuevalue'] = "";
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['wedvalue'] = "";
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['thuvalue'] = "";
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['frivalue'] = "";
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['satvalue'] = "";
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $result[$i]['sunvalue'] = "";
                $i++;
        
                 
             }
        }
        
        // print_r($result);
        // exit;
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                if($val['mon'] ===$val2->date)
                    $result[$i]['monvalue'] = $val2->result_no;
                if($val['tue'] ===$val2->date)
                    $result[$i]['tuevalue'] = $val2->result_no;
                if($val['wed'] ===$val2->date)
                    $result[$i]['wedvalue'] = $val2->result_no;
                if($val['thu'] ===$val2->date)
                    $result[$i]['thuvalue'] = $val2->result_no;  
                if($val['fri'] ===$val2->date)
                    $result[$i]['frivalue'] = $val2->result_no; 
                if($val['sat'] ===$val2->date)
                    $result[$i]['satvalue'] = $val2->result_no; 
                if($val['sun'] ===$val2->date)
                    $result[$i]['sunvalue'] = $val2->result_no;                   
            }
            $i++;
        }

        $data['jodi2'] = $result;  
      $this->load->view('frontend/jodhi',$data );
   }


   public function main_bazar_matka_jodi_chart(){
        $data             = array();
        $data['settings'] = $this->Admin_model->getSettingsValue();
    
        $jodi    = $this->Admin_model->getResultValuemarket(7);

        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['monvalue'] = "";
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['tuevalue'] = "";
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['wedvalue'] = "";
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['thuvalue'] = "";
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['frivalue'] = "";
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['satvalue'] = "";
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $result[$i]['sunvalue'] = "";
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                if($val['mon'] ===$val2->date)
                    $result[$i]['monvalue'] = $val2->result_no;
                if($val['tue'] ===$val2->date)
                    $result[$i]['tuevalue'] = $val2->result_no;
                if($val['wed'] ===$val2->date)
                    $result[$i]['wedvalue'] = $val2->result_no;
                if($val['thu'] ===$val2->date)
                    $result[$i]['thuvalue'] = $val2->result_no;  
                if($val['fri'] ===$val2->date)
                    $result[$i]['frivalue'] = $val2->result_no; 
                if($val['sat'] ===$val2->date)
                    $result[$i]['satvalue'] = $val2->result_no; 
                if($val['sun'] ===$val2->date)
                    $result[$i]['sunvalue'] = $val2->result_no;                   
            }
            $i++;
        }

        $data['jodi2'] = $result;  
      $this->load->view('frontend/main-bazar-matka-jodi-chart',$data );
   }



   public function milan_day_matka_jodi_chart(){
      
        $data             = array();
        $data['settings'] = $this->Admin_model->getSettingsValue();

    
        $jodi    = $this->Admin_model->getResultValuemarket(3);

        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['monvalue'] = "";
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['tuevalue'] = "";
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['wedvalue'] = "";
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['thuvalue'] = "";
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['frivalue'] = "";
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['satvalue'] = "";
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $result[$i]['sunvalue'] = "";
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                if($val['mon'] ===$val2->date)
                    $result[$i]['monvalue'] = $val2->result_no;
                if($val['tue'] ===$val2->date)
                    $result[$i]['tuevalue'] = $val2->result_no;
                if($val['wed'] ===$val2->date)
                    $result[$i]['wedvalue'] = $val2->result_no;
                if($val['thu'] ===$val2->date)
                    $result[$i]['thuvalue'] = $val2->result_no;  
                if($val['fri'] ===$val2->date)
                    $result[$i]['frivalue'] = $val2->result_no; 
                if($val['sat'] ===$val2->date)
                    $result[$i]['satvalue'] = $val2->result_no; 
                if($val['sun'] ===$val2->date)
                    $result[$i]['sunvalue'] = $val2->result_no;                   
            }
            $i++;
        }

        $data['jodi2'] = $result;  
      $this->load->view('frontend/milan-day-matka-jodi-chart',$data );
   }



   public function milan_night_matka_jodi_chart(){
     
        $data             = array();
        $data['settings'] = $this->Admin_model->getSettingsValue();

    
        $jodi    = $this->Admin_model->getResultValuemarket(5);

        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['monvalue'] = "";
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['tuevalue'] = "";
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['wedvalue'] = "";
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['thuvalue'] = "";
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['frivalue'] = "";
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['satvalue'] = "";
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $result[$i]['sunvalue'] = "";
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                if($val['mon'] ===$val2->date)
                    $result[$i]['monvalue'] = $val2->result_no;
                if($val['tue'] ===$val2->date)
                    $result[$i]['tuevalue'] = $val2->result_no;
                if($val['wed'] ===$val2->date)
                    $result[$i]['wedvalue'] = $val2->result_no;
                if($val['thu'] ===$val2->date)
                    $result[$i]['thuvalue'] = $val2->result_no;  
                if($val['fri'] ===$val2->date)
                    $result[$i]['frivalue'] = $val2->result_no; 
                if($val['sat'] ===$val2->date)
                    $result[$i]['satvalue'] = $val2->result_no; 
                if($val['sun'] ===$val2->date)
                    $result[$i]['sunvalue'] = $val2->result_no;                   
            }
            $i++;
        }

        $data['jodi2'] = $result;  
      $this->load->view('frontend/milan-night-matka-jodi-chart',$data );
   }

   public function milan_day_matka_panel_chart_pana_chart_patti_chart(){
        
      $data             = array();
      $data['settings'] = $this->Admin_model->getSettingsValue();

      $jodi    = $this->Admin_model->getResultValuemarket(3);
        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                $result[$i]['date'] = date("d/m/Y", strtotime($val['mon'])) ."<br> To <br>".date("d/m/Y", strtotime($val['sun']));
                if($val['mon'] ===$val2->date){
                    $result[$i]['monvalue'] = $val2;
                }
                if($val['tue'] ===$val2->date){
                    $result[$i]['tuevalue'] = $val2;
                }
                if($val['wed'] ===$val2->date){
                    $result[$i]['wedvalue'] = $val2;
                }
                if($val['thu'] ===$val2->date){
                    $result[$i]['thuvalue'] = $val2;  
                }
                if($val['fri'] ===$val2->date){
                    $result[$i]['frivalue'] = $val2; 
                }
                if($val['sat'] ===$val2->date){
                    $result[$i]['satvalue'] = $val2; 
                }
                if($val['sun'] ===$val2->date){
                    $result[$i]['sunvalue'] = $val2;                   
                }
            }
            $i++;
        }

        $data['jodi2'] = $result;
      $this->load->view('frontend/milan-day-matka-panel-chart-pana-chart-patti-chart',$data );
   }



   public function milan_night_matka_panel_chart_pana_chart_patti_chart(){
        
      $data             = array();
      $data['settings'] = $this->Admin_model->getSettingsValue();

      $jodi    = $this->Admin_model->getResultValuemarket(5);
        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                $result[$i]['date'] = date("d/m/Y", strtotime($val['mon'])) ."<br> To <br>".date("d/m/Y", strtotime($val['sun']));
                if($val['mon'] ===$val2->date){
                    $result[$i]['monvalue'] = $val2;
                }
                if($val['tue'] ===$val2->date){
                    $result[$i]['tuevalue'] = $val2;
                }
                if($val['wed'] ===$val2->date){
                    $result[$i]['wedvalue'] = $val2;
                }
                if($val['thu'] ===$val2->date){
                    $result[$i]['thuvalue'] = $val2;  
                }
                if($val['fri'] ===$val2->date){
                    $result[$i]['frivalue'] = $val2; 
                }
                if($val['sat'] ===$val2->date){
                    $result[$i]['satvalue'] = $val2; 
                }
                if($val['sun'] ===$val2->date){
                    $result[$i]['sunvalue'] = $val2;                   
                }
            }
            $i++;
        }

        $data['jodi2'] = $result;
      $this->load->view('frontend/milan-night-matka-panel-chart-pana-chart-patti-chart',$data );
   }
   
   public function rajdhani_day_matka_jodi_chart(){
     
        $data             = array();
        $data['settings'] = $this->Admin_model->getSettingsValue();

    
        $jodi    = $this->Admin_model->getResultValuemarket(16);

        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['monvalue'] = "";
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['tuevalue'] = "";
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['wedvalue'] = "";
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['thuvalue'] = "";
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['frivalue'] = "";
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['satvalue'] = "";
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $result[$i]['sunvalue'] = "";
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                if($val['mon'] ===$val2->date)
                    $result[$i]['monvalue'] = $val2->result_no;
                if($val['tue'] ===$val2->date)
                    $result[$i]['tuevalue'] = $val2->result_no;
                if($val['wed'] ===$val2->date)
                    $result[$i]['wedvalue'] = $val2->result_no;
                if($val['thu'] ===$val2->date)
                    $result[$i]['thuvalue'] = $val2->result_no;  
                if($val['fri'] ===$val2->date)
                    $result[$i]['frivalue'] = $val2->result_no; 
                if($val['sat'] ===$val2->date)
                    $result[$i]['satvalue'] = $val2->result_no; 
                if($val['sun'] ===$val2->date)
                    $result[$i]['sunvalue'] = $val2->result_no;                   
            }
            $i++;
        }

        $data['jodi2'] = $result;  
      $this->load->view('frontend/rajdhani-day-matka-jodi-chart',$data );
   }



   public function rajdhani_night_matka_jodi_chart(){
     
        $data             = array();
        $data['settings'] = $this->Admin_model->getSettingsValue();

    
        $jodi    = $this->Admin_model->getResultValuemarket(6);

        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['monvalue'] = "";
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['tuevalue'] = "";
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['wedvalue'] = "";
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['thuvalue'] = "";
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['frivalue'] = "";
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['satvalue'] = "";
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $result[$i]['sunvalue'] = "";
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                if($val['mon'] ===$val2->date)
                    $result[$i]['monvalue'] = $val2->result_no;
                if($val['tue'] ===$val2->date)
                    $result[$i]['tuevalue'] = $val2->result_no;
                if($val['wed'] ===$val2->date)
                    $result[$i]['wedvalue'] = $val2->result_no;
                if($val['thu'] ===$val2->date)
                    $result[$i]['thuvalue'] = $val2->result_no;  
                if($val['fri'] ===$val2->date)
                    $result[$i]['frivalue'] = $val2->result_no; 
                if($val['sat'] ===$val2->date)
                    $result[$i]['satvalue'] = $val2->result_no; 
                if($val['sun'] ===$val2->date)
                    $result[$i]['sunvalue'] = $val2->result_no;                   
            }
            $i++;
        }

        $data['jodi2'] = $result;  
      $this->load->view('frontend/rajdhani-night-matka-jodi-chart',$data );
   }



   public function aishwarya_matka_jodi_chart(){
     
        $data             = array();
        $data['settings'] = $this->Admin_model->getSettingsValue();

    
        $jodi    = $this->Admin_model->getResultValuemarket(17);

        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['monvalue'] = "";
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['tuevalue'] = "";
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['wedvalue'] = "";
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['thuvalue'] = "";
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['frivalue'] = "";
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['satvalue'] = "";
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $result[$i]['sunvalue'] = "";
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                if($val['mon'] ===$val2->date)
                    $result[$i]['monvalue'] = $val2->result_no;
                if($val['tue'] ===$val2->date)
                    $result[$i]['tuevalue'] = $val2->result_no;
                if($val['wed'] ===$val2->date)
                    $result[$i]['wedvalue'] = $val2->result_no;
                if($val['thu'] ===$val2->date)
                    $result[$i]['thuvalue'] = $val2->result_no;  
                if($val['fri'] ===$val2->date)
                    $result[$i]['frivalue'] = $val2->result_no; 
                if($val['sat'] ===$val2->date)
                    $result[$i]['satvalue'] = $val2->result_no; 
                if($val['sun'] ===$val2->date)
                    $result[$i]['sunvalue'] = $val2->result_no;                   
            }
            $i++;
        }

        $data['jodi2'] = $result;  
      $this->load->view('frontend/aishwarya-matka-jodi-chart',$data );
   }



   public function bhendibazar_matka_jodi_chart(){
     
        $data             = array();
        $data['settings'] = $this->Admin_model->getSettingsValue();

    
        $jodi    = $this->Admin_model->getResultValuemarket(13);

        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['monvalue'] = "";
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['tuevalue'] = "";
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['wedvalue'] = "";
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['thuvalue'] = "";
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['frivalue'] = "";
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['satvalue'] = "";
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $result[$i]['sunvalue'] = "";
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                if($val['mon'] ===$val2->date)
                    $result[$i]['monvalue'] = $val2->result_no;
                if($val['tue'] ===$val2->date)
                    $result[$i]['tuevalue'] = $val2->result_no;
                if($val['wed'] ===$val2->date)
                    $result[$i]['wedvalue'] = $val2->result_no;
                if($val['thu'] ===$val2->date)
                    $result[$i]['thuvalue'] = $val2->result_no;  
                if($val['fri'] ===$val2->date)
                    $result[$i]['frivalue'] = $val2->result_no; 
                if($val['sat'] ===$val2->date)
                    $result[$i]['satvalue'] = $val2->result_no; 
                if($val['sun'] ===$val2->date)
                    $result[$i]['sunvalue'] = $val2->result_no;                   
            }
            $i++;
        }

        $data['jodi2'] = $result;  
      $this->load->view('frontend/bhendibazar-matka-jodi-chart',$data );
   }



   public function satyam_matka_jodi_chart(){
     
        $data             = array();
        $data['settings'] = $this->Admin_model->getSettingsValue();

    
        $jodi    = $this->Admin_model->getResultValuemarket(14);

        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['monvalue'] = "";
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['tuevalue'] = "";
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['wedvalue'] = "";
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['thuvalue'] = "";
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['frivalue'] = "";
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['satvalue'] = "";
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $result[$i]['sunvalue'] = "";
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                if($val['mon'] ===$val2->date)
                    $result[$i]['monvalue'] = $val2->result_no;
                if($val['tue'] ===$val2->date)
                    $result[$i]['tuevalue'] = $val2->result_no;
                if($val['wed'] ===$val2->date)
                    $result[$i]['wedvalue'] = $val2->result_no;
                if($val['thu'] ===$val2->date)
                    $result[$i]['thuvalue'] = $val2->result_no;  
                if($val['fri'] ===$val2->date)
                    $result[$i]['frivalue'] = $val2->result_no; 
                if($val['sat'] ===$val2->date)
                    $result[$i]['satvalue'] = $val2->result_no; 
                if($val['sun'] ===$val2->date)
                    $result[$i]['sunvalue'] = $val2->result_no;                   
            }
            $i++;
        }

        $data['jodi2'] = $result;  
      $this->load->view('frontend/satyam-matka-jodi-chart',$data );
   }



   public function morning_day(){
        
        $data             = array();
        $data['settings'] = $this->Admin_model->getSettingsValue();

    
        $jodi    = $this->Admin_model->getResultValuemarket(21);

        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['monvalue'] = "";
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['tuevalue'] = "";
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['wedvalue'] = "";
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['thuvalue'] = "";
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['frivalue'] = "";
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['satvalue'] = "";
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $result[$i]['sunvalue'] = "";
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                if($val['mon'] ===$val2->date)
                    $result[$i]['monvalue'] = $val2->result_no;
                if($val['tue'] ===$val2->date)
                    $result[$i]['tuevalue'] = $val2->result_no;
                if($val['wed'] ===$val2->date)
                    $result[$i]['wedvalue'] = $val2->result_no;
                if($val['thu'] ===$val2->date)
                    $result[$i]['thuvalue'] = $val2->result_no;  
                if($val['fri'] ===$val2->date)
                    $result[$i]['frivalue'] = $val2->result_no; 
                if($val['sat'] ===$val2->date)
                    $result[$i]['satvalue'] = $val2->result_no; 
                if($val['sun'] ===$val2->date)
                    $result[$i]['sunvalue'] = $val2->result_no;                   
            }
            $i++;
        }

        $data['jodi2'] = $result;  
      $this->load->view('frontend/morning-day',$data );
   }



   public function time_bazar_matka_panel_chart_pana_chart_patti_chart(){
         
      $data             = array();
      $data['settings'] = $this->Admin_model->getSettingsValue();

      $jodi    = $this->Admin_model->getResultValuemarket(2);
        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                $result[$i]['date'] = date("d/m/Y", strtotime($val['mon'])) ."<br> To <br>".date("d/m/Y", strtotime($val['sun']));
                if($val['mon'] ===$val2->date){
                    $result[$i]['monvalue'] = $val2;
                }
                if($val['tue'] ===$val2->date){
                    $result[$i]['tuevalue'] = $val2;
                }
                if($val['wed'] ===$val2->date){
                    $result[$i]['wedvalue'] = $val2;
                }
                if($val['thu'] ===$val2->date){
                    $result[$i]['thuvalue'] = $val2;  
                }
                if($val['fri'] ===$val2->date){
                    $result[$i]['frivalue'] = $val2; 
                }
                if($val['sat'] ===$val2->date){
                    $result[$i]['satvalue'] = $val2; 
                }
                if($val['sun'] ===$val2->date){
                    $result[$i]['sunvalue'] = $val2;                   
                }
            }
            $i++;
        }

        $data['jodi2'] = $result;
      $this->load->view('frontend/time-bazar-matka-panel-chart-pana-chart-patti-chart',$data );
   }



   public function kalyan_matka_panel_chart_pana_chart_patti_chart(){
        
      $data             = array();
      $data['settings'] = $this->Admin_model->getSettingsValue();

      $jodi    = $this->Admin_model->getResultValuemarket(4);
        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                $result[$i]['date'] = date("d/m/Y", strtotime($val['mon'])) ."<br> To <br>".date("d/m/Y", strtotime($val['sun']));
                if($val['mon'] ===$val2->date){
                    $result[$i]['monvalue'] = $val2;
                }
                if($val['tue'] ===$val2->date){
                    $result[$i]['tuevalue'] = $val2;
                }
                if($val['wed'] ===$val2->date){
                    $result[$i]['wedvalue'] = $val2;
                }
                if($val['thu'] ===$val2->date){
                    $result[$i]['thuvalue'] = $val2;  
                }
                if($val['fri'] ===$val2->date){
                    $result[$i]['frivalue'] = $val2; 
                }
                if($val['sat'] ===$val2->date){
                    $result[$i]['satvalue'] = $val2; 
                }
                if($val['sun'] ===$val2->date){
                    $result[$i]['sunvalue'] = $val2;                   
                }
            }
            $i++;
        }

        $data['jodi2'] = $result;
      $this->load->view('frontend/kalyan-matka-panel-chart-pana-chart-patti-chart',$data );
   }



   public function main_bazar_matka_panel_chart(){
        
      $data             = array();
      $data['settings'] = $this->Admin_model->getSettingsValue();

      $jodi    = $this->Admin_model->getResultValuemarket(7);
        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                $result[$i]['date'] = date("d/m/Y", strtotime($val['mon'])) ."<br> To <br>".date("d/m/Y", strtotime($val['sun']));
                if($val['mon'] ===$val2->date){
                    $result[$i]['monvalue'] = $val2;
                }
                if($val['tue'] ===$val2->date){
                    $result[$i]['tuevalue'] = $val2;
                }
                if($val['wed'] ===$val2->date){
                    $result[$i]['wedvalue'] = $val2;
                }
                if($val['thu'] ===$val2->date){
                    $result[$i]['thuvalue'] = $val2;  
                }
                if($val['fri'] ===$val2->date){
                    $result[$i]['frivalue'] = $val2; 
                }
                if($val['sat'] ===$val2->date){
                    $result[$i]['satvalue'] = $val2; 
                }
                if($val['sun'] ===$val2->date){
                    $result[$i]['sunvalue'] = $val2;                   
                }
            }
            $i++;
        }

        $data['jodi2'] = $result;
      $this->load->view('frontend/main-bazar-matka-panel-chart',$data );
   }
   
   public function rajdhani_day_matka_panel_chart_pana_chart_patti_chart(){
         
      $data             = array();
      $data['settings'] = $this->Admin_model->getSettingsValue();

      $jodi    = $this->Admin_model->getResultValuemarket(16);
        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                $result[$i]['date'] = date("d/m/Y", strtotime($val['mon'])) ."<br> To <br>".date("d/m/Y", strtotime($val['sun']));
                if($val['mon'] ===$val2->date){
                    $result[$i]['monvalue'] = $val2;
                }
                if($val['tue'] ===$val2->date){
                    $result[$i]['tuevalue'] = $val2;
                }
                if($val['wed'] ===$val2->date){
                    $result[$i]['wedvalue'] = $val2;
                }
                if($val['thu'] ===$val2->date){
                    $result[$i]['thuvalue'] = $val2;  
                }
                if($val['fri'] ===$val2->date){
                    $result[$i]['frivalue'] = $val2; 
                }
                if($val['sat'] ===$val2->date){
                    $result[$i]['satvalue'] = $val2; 
                }
                if($val['sun'] ===$val2->date){
                    $result[$i]['sunvalue'] = $val2;                   
                }
            }
            $i++;
        }

        $data['jodi2'] = $result;
      $this->load->view('frontend/rajdhani-day-matka-panel-chart-pana-chart-patti-chart',$data );
   }



   public function rajdhani_night_matka_panel_chart_pana_chart_patti_chart(){
        
      $data             = array();
      $data['settings'] = $this->Admin_model->getSettingsValue();

      $jodi    = $this->Admin_model->getResultValuemarket(6);
        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                $result[$i]['date'] = date("d/m/Y", strtotime($val['mon'])) ."<br> To <br>".date("d/m/Y", strtotime($val['sun']));
                if($val['mon'] ===$val2->date){
                    $result[$i]['monvalue'] = $val2;
                }
                if($val['tue'] ===$val2->date){
                    $result[$i]['tuevalue'] = $val2;
                }
                if($val['wed'] ===$val2->date){
                    $result[$i]['wedvalue'] = $val2;
                }
                if($val['thu'] ===$val2->date){
                    $result[$i]['thuvalue'] = $val2;  
                }
                if($val['fri'] ===$val2->date){
                    $result[$i]['frivalue'] = $val2; 
                }
                if($val['sat'] ===$val2->date){
                    $result[$i]['satvalue'] = $val2; 
                }
                if($val['sun'] ===$val2->date){
                    $result[$i]['sunvalue'] = $val2;                   
                }
            }
            $i++;
        }

        $data['jodi2'] = $result;
      $this->load->view('frontend/rajdhani-night-matka-panel-chart-pana-chart-patti-chart',$data );
   }



   public function aishwarya_matka_panel_chart_pana_chart_patti_chart(){
        
      $data             = array();
      $data['settings'] = $this->Admin_model->getSettingsValue();

      $jodi    = $this->Admin_model->getResultValuemarket(17);
        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                $result[$i]['date'] = date("d/m/Y", strtotime($val['mon'])) ."<br> To <br>".date("d/m/Y", strtotime($val['sun']));
                if($val['mon'] ===$val2->date){
                    $result[$i]['monvalue'] = $val2;
                }
                if($val['tue'] ===$val2->date){
                    $result[$i]['tuevalue'] = $val2;
                }
                if($val['wed'] ===$val2->date){
                    $result[$i]['wedvalue'] = $val2;
                }
                if($val['thu'] ===$val2->date){
                    $result[$i]['thuvalue'] = $val2;  
                }
                if($val['fri'] ===$val2->date){
                    $result[$i]['frivalue'] = $val2; 
                }
                if($val['sat'] ===$val2->date){
                    $result[$i]['satvalue'] = $val2; 
                }
                if($val['sun'] ===$val2->date){
                    $result[$i]['sunvalue'] = $val2;                   
                }
            }
            $i++;
        }

        $data['jodi2'] = $result;
      $this->load->view('frontend/aishwarya-matka-panel-chart-pana-chart-patti-chart',$data );
   }



   public function bhendibazar_matka_panel_chart_pana_chart_patti_chart(){
        
      $data             = array();
      $data['settings'] = $this->Admin_model->getSettingsValue();

      $jodi    = $this->Admin_model->getResultValuemarket(13);
        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                $result[$i]['date'] = date("d/m/Y", strtotime($val['mon'])) ."<br> To <br>".date("d/m/Y", strtotime($val['sun']));
                if($val['mon'] ===$val2->date){
                    $result[$i]['monvalue'] = $val2;
                }
                if($val['tue'] ===$val2->date){
                    $result[$i]['tuevalue'] = $val2;
                }
                if($val['wed'] ===$val2->date){
                    $result[$i]['wedvalue'] = $val2;
                }
                if($val['thu'] ===$val2->date){
                    $result[$i]['thuvalue'] = $val2;  
                }
                if($val['fri'] ===$val2->date){
                    $result[$i]['frivalue'] = $val2; 
                }
                if($val['sat'] ===$val2->date){
                    $result[$i]['satvalue'] = $val2; 
                }
                if($val['sun'] ===$val2->date){
                    $result[$i]['sunvalue'] = $val2;                   
                }
            }
            $i++;
        }

        $data['jodi2'] = $result;
      $this->load->view('frontend/bhendibazar-matka-panel-chart-pana-chart-patti-chart',$data );
   }



   public function satyam_matka_panel_chart_pana_chart_patti_chart(){
        
      $data             = array();
      $data['settings'] = $this->Admin_model->getSettingsValue();

      $jodi    = $this->Admin_model->getResultValuemarket(14);
        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                $result[$i]['date'] = date("d/m/Y", strtotime($val['mon'])) ."<br> To <br>".date("d/m/Y", strtotime($val['sun']));
                if($val['mon'] ===$val2->date){
                    $result[$i]['monvalue'] = $val2;
                }
                if($val['tue'] ===$val2->date){
                    $result[$i]['tuevalue'] = $val2;
                }
                if($val['wed'] ===$val2->date){
                    $result[$i]['wedvalue'] = $val2;
                }
                if($val['thu'] ===$val2->date){
                    $result[$i]['thuvalue'] = $val2;  
                }
                if($val['fri'] ===$val2->date){
                    $result[$i]['frivalue'] = $val2; 
                }
                if($val['sat'] ===$val2->date){
                    $result[$i]['satvalue'] = $val2; 
                }
                if($val['sun'] ===$val2->date){
                    $result[$i]['sunvalue'] = $val2;                   
                }
            }
            $i++;
        }

        $data['jodi2'] = $result;
      $this->load->view('frontend/satyam-matka-panel-chart-pana-chart-patti-chart',$data );
   }



   public function morning_day_panel_chart(){
         
      $data             = array();
      $data['settings'] = $this->Admin_model->getSettingsValue();

      $jodi    = $this->Admin_model->getResultValuemarket(21);
        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                $result[$i]['date'] = date("d/m/Y", strtotime($val['mon'])) ."<br> To <br>".date("d/m/Y", strtotime($val['sun']));
                if($val['mon'] ===$val2->date){
                    $result[$i]['monvalue'] = $val2;
                }
                if($val['tue'] ===$val2->date){
                    $result[$i]['tuevalue'] = $val2;
                }
                if($val['wed'] ===$val2->date){
                    $result[$i]['wedvalue'] = $val2;
                }
                if($val['thu'] ===$val2->date){
                    $result[$i]['thuvalue'] = $val2;  
                }
                if($val['fri'] ===$val2->date){
                    $result[$i]['frivalue'] = $val2; 
                }
                if($val['sat'] ===$val2->date){
                    $result[$i]['satvalue'] = $val2; 
                }
                if($val['sun'] ===$val2->date){
                    $result[$i]['sunvalue'] = $val2;                   
                }
            }
            $i++;
        }

        $data['jodi2'] = $result;
      $this->load->view('frontend/morning-day-panel-chart',$data );
   }



   public function thankyou(){
        $data             = array();
      $data['settings'] = $this->Admin_model->getSettingsValue();
      $this->load->view('frontend/thankyou',$data );
   }





   public function shridevi_matka_jodi_chart(){

        
        $data             = array();
        $data['settings'] = $this->Admin_model->getSettingsValue();
    
        $jodi    = $this->Admin_model->getResultValuemarket(12);
        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['monvalue'] = "";
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['tuevalue'] = "";
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['wedvalue'] = "";
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['thuvalue'] = "";
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['frivalue'] = "";
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['satvalue'] = "";
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $result[$i]['sunvalue'] = "";
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                if($val['mon'] ===$val2->date)
                    $result[$i]['monvalue'] = $val2->result_no;
                if($val['tue'] ===$val2->date)
                    $result[$i]['tuevalue'] = $val2->result_no;
                if($val['wed'] ===$val2->date)
                    $result[$i]['wedvalue'] = $val2->result_no;
                if($val['thu'] ===$val2->date)
                    $result[$i]['thuvalue'] = $val2->result_no;  
                if($val['fri'] ===$val2->date)
                    $result[$i]['frivalue'] = $val2->result_no; 
                if($val['sat'] ===$val2->date)
                    $result[$i]['satvalue'] = $val2->result_no; 
                if($val['sun'] ===$val2->date)
                    $result[$i]['sunvalue'] = $val2->result_no;                   
            }
            $i++;
        }

        $data['jodi2'] = $result;
        $this->load->view('frontend/shridevi-matka-jodi-chart',$data );
  
   }





   public function madhuri_matka_jodi_chart(){
          
        $data             = array();
        $data['settings'] = $this->Admin_model->getSettingsValue();

    
        $jodi    = $this->Admin_model->getResultValuemarket(1);

        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['monvalue'] = "";
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['tuevalue'] = "";
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['wedvalue'] = "";
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['thuvalue'] = "";
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['frivalue'] = "";
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['satvalue'] = "";
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $result[$i]['sunvalue'] = "";
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                if($val['mon'] ===$val2->date)
                    $result[$i]['monvalue'] = $val2->result_no;
                if($val['tue'] ===$val2->date)
                    $result[$i]['tuevalue'] = $val2->result_no;
                if($val['wed'] ===$val2->date)
                    $result[$i]['wedvalue'] = $val2->result_no;
                if($val['thu'] ===$val2->date)
                    $result[$i]['thuvalue'] = $val2->result_no;  
                if($val['fri'] ===$val2->date)
                    $result[$i]['frivalue'] = $val2->result_no; 
                if($val['sat'] ===$val2->date)
                    $result[$i]['satvalue'] = $val2->result_no; 
                if($val['sun'] ===$val2->date)
                    $result[$i]['sunvalue'] = $val2->result_no;                   
            }
            $i++;
        }

        $data['jodi2'] = $result;  
      $this->load->view('frontend/madhuri-matka-jodi-chart',$data );
   }


   public function kalyan_night_matka_jodi_chart(){
         
        $data             = array();
        $data['settings'] = $this->Admin_model->getSettingsValue();

    
        $jodi    = $this->Admin_model->getResultValuemarket(8);

        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['monvalue'] = "";
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['tuevalue'] = "";
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['wedvalue'] = "";
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['thuvalue'] = "";
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['frivalue'] = "";
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['satvalue'] = "";
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $result[$i]['sunvalue'] = "";
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                if($val['mon'] ===$val2->date)
                    $result[$i]['monvalue'] = $val2->result_no;
                if($val['tue'] ===$val2->date)
                    $result[$i]['tuevalue'] = $val2->result_no;
                if($val['wed'] ===$val2->date)
                    $result[$i]['wedvalue'] = $val2->result_no;
                if($val['thu'] ===$val2->date)
                    $result[$i]['thuvalue'] = $val2->result_no;  
                if($val['fri'] ===$val2->date)
                    $result[$i]['frivalue'] = $val2->result_no; 
                if($val['sat'] ===$val2->date)
                    $result[$i]['satvalue'] = $val2->result_no; 
                if($val['sun'] ===$val2->date)
                    $result[$i]['sunvalue'] = $val2->result_no;                   
            }
            $i++;
        }

        $data['jodi2'] = $result;  
      $this->load->view('frontend/kalyan-night-matka-jodi-chart',$data );
   }

   public function shridevi_matka_panel_chart_pana_chart_patti_chart(){
    
      $data             = array();
      $data['settings'] = $this->Admin_model->getSettingsValue();

      $jodi    = $this->Admin_model->getResultValuemarket(12);
        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                $result[$i]['date'] = date("d/m/Y", strtotime($val['mon'])) ."<br> To <br>".date("d/m/Y", strtotime($val['sun']));
                if($val['mon'] ===$val2->date){
                    $result[$i]['monvalue'] = $val2;
                }
                if($val['tue'] ===$val2->date){
                    $result[$i]['tuevalue'] = $val2;
                }
                if($val['wed'] ===$val2->date){
                    $result[$i]['wedvalue'] = $val2;
                }
                if($val['thu'] ===$val2->date){
                    $result[$i]['thuvalue'] = $val2;  
                }
                if($val['fri'] ===$val2->date){
                    $result[$i]['frivalue'] = $val2; 
                }
                if($val['sat'] ===$val2->date){
                    $result[$i]['satvalue'] = $val2; 
                }
                if($val['sun'] ===$val2->date){
                    $result[$i]['sunvalue'] = $val2;                   
                }
            }
            $i++;
        }

        $data['jodi2'] = $result;
      $this->load->view('frontend/shridevi-matka-panel-chart-pana-chart-patti-chart',$data );
   }


   public function madhuri_matka_panel_chart_pana_chart_patti_chart(){
        
      $data             = array();
      $data['settings'] = $this->Admin_model->getSettingsValue();

      $jodi    = $this->Admin_model->getResultValuemarket(1);
        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                $result[$i]['date'] = date("d/m/Y", strtotime($val['mon'])) ."<br> To <br>".date("d/m/Y", strtotime($val['sun']));
                if($val['mon'] ===$val2->date){
                    $result[$i]['monvalue'] = $val2;
                }
                if($val['tue'] ===$val2->date){
                    $result[$i]['tuevalue'] = $val2;
                }
                if($val['wed'] ===$val2->date){
                    $result[$i]['wedvalue'] = $val2;
                }
                if($val['thu'] ===$val2->date){
                    $result[$i]['thuvalue'] = $val2;  
                }
                if($val['fri'] ===$val2->date){
                    $result[$i]['frivalue'] = $val2; 
                }
                if($val['sat'] ===$val2->date){
                    $result[$i]['satvalue'] = $val2; 
                }
                if($val['sun'] ===$val2->date){
                    $result[$i]['sunvalue'] = $val2;                   
                }
            }
            $i++;
        }

        $data['jodi2'] = $result;
      $this->load->view('frontend/madhuri-matka-panel-chart-pana-chart-patti-chart',$data );
   }



   public function kalyan_night_panel_chart_pana_chart_patti_chart(){
        $data             = array();
      $data['settings'] = $this->Admin_model->getSettingsValue();
       $jodi    = $this->Admin_model->getResultValuemarket(8);
        $data['jodi']    = $jodi;
        
        $result = array();
        $i=0;   
        foreach($jodi as $val) {
            if(strtolower($val->day)==='mon'){
                $result[$i]['mon'] = $val->date;
                $result[$i]['tue'] = $tuesdate = date('Y-m-d', strtotime("+1 day", strtotime($val->date)));
                $result[$i]['wed'] = $tuesdate = date('Y-m-d', strtotime("+2 day", strtotime($val->date)));
                $result[$i]['thu'] = $tuesdate = date('Y-m-d', strtotime("+3 day", strtotime($val->date)));
                $result[$i]['fri'] = $tuesdate = date('Y-m-d', strtotime("+4 day", strtotime($val->date)));
                $result[$i]['sat'] = $tuesdate = date('Y-m-d', strtotime("+5 day", strtotime($val->date)));
                $result[$i]['sun'] = $tuesdate = date('Y-m-d', strtotime("+6 day", strtotime($val->date)));
                $i++;
                
            }
        }
        $i=0;
        foreach($result as $val) {
            foreach($jodi as $val2) {
                $result[$i]['date'] = date("d/m/Y", strtotime($val['mon'])) ."<br> To <br>".date("d/m/Y", strtotime($val['sun']));
                if($val['mon'] ===$val2->date){
                    $result[$i]['monvalue'] = $val2;
                }
                if($val['tue'] ===$val2->date){
                    $result[$i]['tuevalue'] = $val2;
                }
                if($val['wed'] ===$val2->date){
                    $result[$i]['wedvalue'] = $val2;
                }
                if($val['thu'] ===$val2->date){
                    $result[$i]['thuvalue'] = $val2;  
                }
                if($val['fri'] ===$val2->date){
                    $result[$i]['frivalue'] = $val2; 
                }
                if($val['sat'] ===$val2->date){
                    $result[$i]['satvalue'] = $val2; 
                }
                if($val['sun'] ===$val2->date){
                    $result[$i]['sunvalue'] = $val2;                   
                }
            }
            $i++;
        }

        $data['jodi2'] = $result;
      $this->load->view('frontend/kalyan-night-matka-panel-chart-pana-chart-patti-chart',$data );
   }


   public function save_registration(){
            /*Set password length*/
             $pass_hash     = $this->input->post('password');
            $userid    = 'U' . rand(500, 1000);
            /*generate random user ID from 500 to 1000*/
            $username  = $this->input->post('name');
            $email     = $this->input->post('email');
            $contact   = $this->input->post('contact');
            $address   = $this->input->post('location');
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
                  
                        $data                = array();
                        $data                = array(
                            'user_id' => $userid,
                            'full_name' => $username,
                            'email' => $email,
                            'address' => $address,
                            'password' => sha1($pass_hash),
                            'contact' => $contact,
                            'status' => 'ACTIVE',
                            'user_type' => 'User',
                            'created_on' => $date
                        );
                        
                        $success             = $this->Admin_model->addUserInfo($data);
                        $response['status']  = 'success';
                        $response['message'] = "Successfully Created";
                         redirect('thankyou' );
                        // $this->output->set_output(json_encode($response));

                        #$this->session->set_flashdata('feedback','Successfully Created');    
                    }
                }
            }




  public function guessing_forum(){
    $data             = array();
    $data['comments'] = $this->Admin_model->getforum();
        $this->load->view('frontend/guessing_forum',$data);
   }


   public function signin(){


         $this->load->view('frontend/signin');
   }




     public function save_forum(){
        if ($this->session->userdata('user_login_access') == '1') {
            $user_id    = $this->input->post('user_id');
            $full_name    = $this->input->post('full_name');
            $comment = $this->input->post('comment');
          
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('user_id', 'User Id', 'trim|xss_clean');
            $this->form_validation->set_rules('comment', 'Comment', 'trim|required|xss_clean|required');
            

            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'user_id' => $user_id,
                    'full_name' => $full_name,
                    'comment' => $comment
                );
                    $insert              = $this->Admin_model->insertforum($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                     redirect( 'frontend/guessing_forum');
              
            }
        } else {
            redirect('frontend/signin');
        }
    }

   

     //Validating login from request
    function validate_login($email = '', $password = '') {
        $credential = array(
            'email' => $email,
            'password' => $password,
            'status' => 'ACTIVE'
        );
        // Checking login credential for admin
        $query = $this->login_model->getUser($credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('user_login_access', '1');
            $this->session->set_userdata('user_login_id', $row->user_id);
            $this->session->set_userdata('name', $row->full_name);
            $this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('user_image', $row->image);
            $this->session->set_userdata('user_type', $row->user_type);
            return 'success';
        }
    }


}
?>