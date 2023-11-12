<?php $this->load->view('admin/header');

function sum($num) { 
        $sum = 0; 
        for ($i = 0; $i < strlen($num); $i++){ 
            $sum += $num[$i]; 
        } 
        return $sum; 
    } 

 ?>
<!--Include header section-->
<?php

$date = @$_REQUEST['date'];
$markets = @$_REQUEST['market'];
$result = @$_REQUEST['result'];
$game_type = @$_REQUEST['game_type'];

if($game_type == 'SINGLE'){
    $multiple = 9;
}elseif($game_type == 'JODI'){
    
      $multiple = 90;
}elseif( $game_type == 'PANNA' ){
      $multiple = 300;
}else{
         $multiple = 1;
  
}


  


?>
<div class="wrapper-page">

    <div class="page-title">
        <h1><i class="icon-list"></i> View Results</h1>
    </div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="content_wrapper">
                        <div class="table_banner clearfix">
                            <h5 class="table_banner_title">Results List</h5>
                            <div class="buy_button">
                                <button type="button" id="category" class="btn btn-custom pull-right">
                                Add Results
                            </button>
                            </div>
                        </div>
                        <div class="table_body text-left">
                            <div>
        <form class="form-inline mb-3" action="<?= base_url('admin/yantri') ?>" >
                <div class="form-group mr-2">
                  <label class="mr-2">Game</label>
                  <select class="form-control" name="market" id="market_ids" >
                      
                    <option selected disabled value="">Select Game</option>
                                         <?php if(isset($market[0])){
                                         foreach($market as $mrkt){
                                         ?>
                                         
                                          <option <?=  $markets == $mrkt['id'] ? "selected" : '' ?> value="<?= $mrkt['id'] ?>"><?= $mrkt['market_name'] ?></option>
                                         <?php } } ?>
                                      </select>
                </div>
                
                   <div class="form-group mr-2">
                  <label class="mr-2">Game Type</label>
                  <select class="form-control" name="game_type" id="game_type" >
                      
                    <option selected disabled value="">Select Game Type</option>
                    <option <?= $game_type == 'SINGLE' ? 'selected' : ''   ?> value="SINGLE">SINGLE</option>
                    <option <?= $game_type == 'JODI' ? 'selected' : ''   ?> value="JODI">JODI</option>
                    <option <?= $game_type == 'PANNA' ? 'selected' : ''   ?>  value="PANNA">PANNA</option>
                    
                    </select>
                </div>
				
                <div class="form-group mr-2">
                  <label class="mr-2">Date</label>
                  <input type="date" class="form-control" value="<?= $date ?>" name="result_date" id="date"  placeholder="Date"  >
                </div>
				
                <div class="form-group mr-2"> 
                  <label class="mr-2">Time</label>
                  <select class="form-control" name="result_type" id="result_type">
                    <option disabled selected value="">Select</option>
                                          <option <?= $result == "OPEN" ? 'selected' : '' ?> value="OPEN"> OPEN </option>
                                          <option <?= $result == "CLOSE" ? 'selected' : '' ?> value="CLOSE"> CLOSE </option>
                                   
                                      </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Search" onclick="form_submit()">
              </form>
                            </div>
                            <table id="example" class="table table-condensed responsive table_custom" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Game No.</th>
                                        <th>Market Name</th>
                                         <th>Total User</th>
                                        <th>Total Amt</th>
                                        <th>Winnnng Amt</th>
                                        <th>Cut Of</th>
                                        
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
                                    $total_dist = 0;
                                    if(isset($results[0])):
                                    foreach($results as $result):
                                        ?>
                                      <tr>
                                         <td><?= $result['game_number']?></td>
                                         <td><?= $result['market']?></td>
                                         <td><?= $result['total_user']?></td>
                                         <td><?= $result['total']?></td>
                                         <td><?= number_format($result['total'] *  $multiple,2);?></td>
                                         <td><?= number_format(( $result['total'] /100)* $cut_offs,2)?></td>
                                      </tr>
                                     <?php
                                      $total_dist = $total_dist + $result['total'];
                                    endforeach;    
                                    endif;
                                   
                                    ?>
                                </tbody>
                                
                                <tfoot>
                      
                      
		              <tr class="text-center my-4">
		                  
		                  <?php 
		                $cut_out = (  $total_dist / 100) *  $cut_offs;
						$sub_total =   $total_dist - $cut_out;
						$commison = (  $total_dist  / 100) *  $commisions;
						$final_ammount =   $total_dist - $commison - $cut_out ;
						
						?>
				
					    <td colspan="1"> Cut Out (<?= $cut_offs;?> %) : Rs.<?= $cut_out ?></td> </br>
					    <td colspan="1"> Commisons (<?= $commisions; ?> %): Rs.<?= $commison ?></td> </br>
						<td colspan="1" class="text-warning"> Distribution Amount : Rs.<?= $final_ammount ?></td>
						<td colspan="1" class="text-success"> Total Amount : Rs.<?= $total_amts; ?></td>
					</tr>					
				  </tfoot>
                       
                            </table>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<span class="flashmessage"></span>


<script>
    function form_submit(){
        let market = $("#market_ids").val();
        let date = $("#date").val();
        let result_type = $("#result_type").val();
        let game_type = $("#game_type").val();
        let url = `<?= base_url('admin/yantri?market=${market}&date=${date}&result=${result_type}&game_type=${game_type}') ?>`;
        
        window.location.href = url;
    }
</script>
<!--Include footer section-->
<?php $this->load->view('admin/footer'); ?>s