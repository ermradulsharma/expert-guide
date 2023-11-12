<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {
    

    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        
        $this->current_time = DateTime::createFromFormat('H:i:s', date('Y-m-d h:i:s'))->format("H:i:s");

        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('Admin_model');
    }
    public function daily_results() {
                    echo $this->current_time;
                    exit;
                    $current_time = date("H:i:s");
                

                    $date1 = DateTime::createFromFormat('H:i:s', $current_time)->format("H:i:s");
                    
                    echo $date1;
                    exit;
               
                  
                    $sot = $value->result_open_start_time;
                    $eot = $value->result_open_end_time;
                    $datesot = DateTime::createFromFormat('H:i:s', $sot);
                    $dateeot = DateTime::createFromFormat('H:i:s', $eot);

                    $sct = $value->result_close_start_time;
                    $ect = $value->result_close_end_time;
                    $datesct = DateTime::createFromFormat('H:i:s', $sct);
                    $dateect = DateTime::createFromFormat('H:i:s', $ect);

    }
    
    
    public function cron(){

        $games = DB::table('games')->orderBy('id','DESC')->get();
        
        $cut_off = DB::table('settings')->first();
		if(isset($cut_off->id)){
		    $cutout = 	$cut_off->cut_off;
			$commisons = 	$cut_off->commisons;
			
			}else{
				$cutout = 	0;
				$commisons = 	0;
			}
				
       $timeslote = $this->db->query("SELECT * FROM markets WHERE ");
       $timeslote = DB::table('timeslote')->where('times',date('H:i'))->orderBy('id','DESC')->first();
        
     if(isset($timeslote->id)){
       
       $check_entries = DB::table("dalygame")->where(['datetime' => $timeslote->id])->first();
       if(!isset($check_entries->id)){
           return false;
           exit;
       }
       
       
    $ManualResult = ManualResult::where(['datetime'=>date('d/m/Y'),'time'=> $check_entries->time])->first();
    
    if(isset( $ManualResult->id)){
    $data = new numberdaly();
    $data->game     = '3Patti';
    $data->number   = $ManualResult->number;
    $data->number1  = $ManualResult->number1;
    $data->number2  = $ManualResult->number2;
    $data->number3  = $ManualResult->number3;
    $data->datetime = date("d/m/Y");
    $data->time     =  $ManualResult->time;
    $data->save();  
    return false;
    exit;
    }
       
       
       
      
       $aamount = [];
       for($g =0;$g<count($games);$g++){
         $total_Amount = 0;  
         
         for($i=$games[$g]->number_start;$i  <= $games[$g]->number_end;$i++){   
           $sumamou = DB::select("select sum(amount) as total_amount,game,count(id) as total from dalygame WHERE game_date = '".date('Y-m-d')."' AND  datetime = '".$timeslote->id."' and game = '".$games[$g]->name."' and number='".$i."' order by id desc");
           
          $sumamou[0]->winnin_amt = $sumamou[0]->total_amount * $games[$g]->multiple;
         $total_Amount+=$sumamou[0]->total_amount;
         
         $games[$g]->win[$i]['win_amt'] = $sumamou[0]->total_amount * $games[$g]->multiple;
              $games[$g]->win[$i]['office'] = $sumamou[0]->total;
         	
         $games[$g]->games[$i] =   $sumamou[0] ;
        
         }
         
         $games[$g]->cut_out  = ($total_Amount / 100) *  $cutout;
		 $games[$g]->sub_total = $total_Amount - $games[$g]->cut_out ;
		 $games[$g]->commison = (	  $games[$g]->sub_total / 100) *  $commisons;
		 $games[$g]->distribution_amt = 	  $games[$g]->sub_total - $games[$g]->commison ;
         $games[$g]->total_ammount = $total_Amount;
         $dis_amt =  $games[$g]->distribution_amt;
         
        
         $final_array = []; 
         for($i=$games[$g]->number_start;$i<count($games[$g]->games);$i++){
             
             if($games[$g]->games[$i]->winnin_amt <= $games[$g]->distribution_amt  ){
                 $final_array[$i] = $games[$g]->games[$i];
             }
         }
         
     
         
         
         $maxVal = max((array)$final_array);
         

       

        $maxKey = array_search($maxVal, (array)$final_array);
        if( $maxKey == 1 ){
            
            $random_keys=array_rand((array)$final_array,3);
            $games[$g]->wind_number = @$random_keys[0];
        }else{
            $games[$g]->wind_number = $maxKey;
        }
        
       }
       
 
    $data = new numberdaly();
    $data->game     = '3Patti';
    $data->number   = $games[0]->wind_number;
    $data->number1  = $games[1]->wind_number;
    $data->number2  = $games[2]->wind_number;
    $data->number3  = $games[3]->wind_number;
    $data->datetime = date("d/m/Y");
    $data->time     = $timeslote->times;
    $data->save();
       
      
      
     }
    }
    
    
    
}