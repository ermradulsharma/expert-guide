<?php $this->load->view('user/header'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js" integrity="sha256-UGwvyUFH6Qqn0PSyQVw4q3vIX0wV1miKTracNJzAWPc=" crossorigin="anonymous"></script>
<script>
    $(function() {
        localStorage.setItem('thisLink', 'dashboard');
        thisLink = localStorage.getItem('thisLink');
        if (thisLink) {
            $('#' + thisLink).addClass('active');
        }
    });
</script>

<div class="wrapper-page">

    <div class="page-title">
        <h1><i class="icon-grid"></i> Dashboard User</h1>
    </div>
    <div class="flashmessage">Faka?</div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                 <div class="col-md-12 col-12 ">
                     <h3>Wallet Info <span><i class="icon-wallet"></i></span>  </h3>
                 </div>
                <div class="col-md-3">
                    <div class="panel bg-white br-1">
                        <div class="panel-body widget">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="pull-left">Winning Amount</h5>
                                    <span class="pull-right"><i class="icon-user"></i></span>
                                    <div class="clearfix"></div>
                                    <h1>100
                                    </h1>
                                </div>
                                <div class="col-md-12">
                                    <div class="progress">
                                        <div class="progress-bar green" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel bg-white br-1">
                        <div class="panel-body widget">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="pull-left">Wallet Balance</h5>
                                    <span class="pull-right"><i class="icon-people"></i></span>
                                    <div class="clearfix"></div>
                                    <h1>1000
                                        <!-- <?php
                                                $this->db->where('user_type', 'Admin');
                                                $this->db->from("users");
                                                echo $this->db->count_all_results();
                                                ?> -->
                                    </h1>
                                </div>
                                <div class="col-md-12">
                                    <div class="progress">
                                        <div class="progress-bar green" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
             <div class="row">
                 <div class="col-md-12 col-12 ">
                     <h3>Game Listing <span><i class="icon-grid"></i></span> </h3>
                 </div>
                 
                
              
                <?php
                //echo "<pre>";print_r($games);exit;
                



                if(isset($games[0])){
                foreach($games as $game){
                ?>
                <div class="col-md-4">
                    <div class="panel bg-white br-1">
                        <div class="panel-body widget" onclick="play_game('<?= $game['id'] ?>','<?= date('h:i:s',strtotime(@$game['result_open_start_time'])) ?>','<?= date('h:i:s',strtotime(@$game['result_close_start_time'])) ?>','<?= $current_date; ?>')">
                            <div class="row">
                                <div class="col-md-12" >
                                    <h5 class="pull-left"><?= @$game['market_name']; ?></h5>
                                    <span class="pull-right"><i class="icon-calendar"></i></span>
                                    <div class="clearfix"></div>
                                    <div class="row my-4">
                                        <div class="col-6 col-md-6 col-lg-6 ">
                                           <div class="my-3" style="font-size:12px;"><?= date('h:i A',strtotime(@$game['result_open_start_time'])); ?> -  <?= date('h:i A',strtotime(@$game['result_open_end_time'])); ?></div>
                                                 <?php
                                        if(isset($game['open_games']['id'])){
                                          $open_number = $game['open_games']['full_result'];    
                                         
                                        }else{
                                           $open_number = "XX-XX-XX";
                                        }
                                        ?>
                                        <div><?= $open_number; ?></div>
                                        </div>
                                  
                                        <div class="col-6 col-md-6 col-lg-6">
                                         <div class="my-3" style="font-size:12px;"><?= date('h:i A',strtotime(@$game['result_close_start_time'])); ?> -  <?= date('h:i A',strtotime(@$game['result_close_end_time'])); ?></div>
                                         
                                                  <?php
                                        if(isset($game['close_games']['id'])){
                                          $close_number = $game['close_games']['full_result'];    
                                         
                                        }else{
                                           $close_number = "XX-XX-XX";
                                        }
                                        ?>
                                        <div><?= $close_number; ?></div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="progress">
                                        <div class="progress-bar green" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }
                } ?>
            </div>
        </div><!-- /.page-content  -->
    </div>
    
    
    
    <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="categoryform" role="dialog" style="display: none;" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-primary">
                <button aria-label="Close" class="close" data-dismiss="modal" onclick="location.reload()" type="button"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-label">All Game</h4>
            </div>
            <div class="successUpdate" style="color:green;padding:10px;font-size:20px"></div>
            <form enctype="multipart/form-data" id="catmodal" method="post" name="catmodal" role="form" accept-charset="utf-8">
                <div class="modal-body">
                    <div class="form-group clearfix">
                        <div class="col-md-6">
                           <select name="game_type" id="game_type" class="form-control" style="width: 100%"onchange="number_change(this.value)" required>
                                <option  disabled value="">Game Type</option>
                                <option selected value="SINGLE">Play  Single</option>
                                <option value="JODI">Play Jodi</option>
                                <option value="PANNA">Play Panna</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                              <select class="form-control" name="market_id" id="games_name"></select>
                        </div>
                        
                      
                    </div>
                    <div class="form-group clearfix">
                        <div class="col-md-6">
                            <input class="form-control" id="digit" name="digit" placeholder="1 - 9" required type="text" value="">
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" id="amount" name="amount"  required type="text" placeholder="Amount" value="">
                        </div>
                    </div>
                          <div class="form-group clearfix">
                         <div class="col-md-6">
                             <select name="type" id="type" class="form-control" style="width: 100%" required>
                                <option value="">Select Type</option>
                                <option value="OPEN">OPEN</option>
                                <option value="CLOSE">CLOSE</option>
                            </select>
                        </div>
                          </div>
                </div>
                <div class="setmessage"></div>
                <div class="modal-footer">
                    <input id="user_id" name="user_id" type="hidden" value="<?php echo $this->session->userdata('user_login_id'); ?>">
                    <input id="user_type" name="user_type" type="hidden" value="<?php echo $this->session->userdata('user_type'); ?>">
                    <button class="btn btn-custom" id="addcategory" name="submit" type="submit">Add Bet</button>
                </div>
            </form>
        </div>
    </div>
</div>




   
    <?php
  
    $this->load->view('user/footer'); ?>
    
        
    <script>
    function number_change(id){
        let amount = '1 - 9';
        if(id == 'SINGLE'){
            amount = '1 - 9'
        }else if (id == 'JODI'){
         amount = '1 - 99'
 
        }else{
            amount = '1 - 999';
        }
        
        $('#digit').attr('placeholder',amount);
    }
        function play_game(game_id , start_open_time , close_time,current_time){
            
            
            let options = <?php echo json_encode($mrkt) ?>;;
           $("#games_name").empty();
           $.each(options,function(key ,val){
             if(val.id == game_id){
             $("#games_name").append(`<option selected  value='${val.id}'>${val.market_name}</option>`);  
             }
           })
           
           $('#categoryform').modal('toggle');
        }
    </script>