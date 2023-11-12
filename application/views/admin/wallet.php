<?php $this->load->view('admin/header'); ?>
<style>
    .input-box{
        margin:10px;
        border:1px solid gray;
    }
</style>
<!--Include header section-->
<div class="wrapper-page">

    <div class="page-title">
        <h1><i class="icon-list"></i>Wallet</h1>
    </div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="content_wrapper">
                        <div class="table_banner clearfix">
                            <h5 class="table_banner_title">Wallet Amount transaction</h5>
                            <div class="buy_button">
                                <!--<button type="button" id="category" class="btn btn-custom pull-right">-->
                                <!--    Add Wallet Amount-->
                                <!--</button>-->
                            </div>
                        </div>
                        <div class="table_body text-left">
                            <table id="example" class="table table-condensed responsive table_custom" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>SR No</th>
                                        <th>Amount</th>
                                        <th>User Name</th>
                                        <th>UTR No.</th>
                                        <th>Image</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($wallets[0])){
                                    for($i=0;$i<count($wallets);$i++){
                                    ?>
                                        <tr>
                                        <td><?= $i+1; ?></td>
                                        <td><?= $wallets[$i]->amount; ?></td>
                                        <td><?= isset($wallets[$i]->users->id) ? $wallets[$i]->users->full_name : "None";?></td>
                                        <td><?= $wallets[$i]->utr; ?></td>
                                        <td><img style="height:100px;width:100px;" src="<?= file_exists($wallets[$i]->image) ? base_url($wallets[$i]->image) : 'https://www.pngall.com/wp-content/uploads/5/User-Profile-PNG-Image.png';  ?>"</td>
                                        <td><?= date('Y-m-d h:i A',$wallets[$i]->created_at); ?></td>
                                        <td><?php if($wallets[$i]->status == '0' ){ echo "Pending"; } else if($wallets[$i]->status == '1'){echo "Accept";}else {echo "Reject";}   ?></td>
                                        <td><div class="btn-group">
                                       <?php if($wallets[$i]->status == '0' ){?>
                                       
                                        <button onclick="wallet_status('<?= $wallets[$i]->id  ?>',2)" class="btn btn-sm btn-danger">Reject</button>
                                        
                                          <button onclick="wallet_status('<?= $wallets[$i]->id  ?>',1)" class="btn btn-sm btn-success">Accept</button>
                                       
                                       <?php } else if($wallets[$i]->status == '1'){?>
                                       
                                         <button disabled="true" class="btn btn-sm btn-success">Accept</button>
                                       
                                       <?php }else { ?>
                                       
                                            <button disabled="true" class="btn btn-sm btn-danger">Reject</button>
                                       
                                       <?php }   ?>
                                        </td>
                                       </div>
                                    </tr>
                                    <?php }} ?>
                                </tbody>
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
    function wallet_status(wallet_id , status){
        let msg = '';
        if(status == 1){
           msg = "Are you sure you want accept wallet payment ?"; 
        }else{
         msg = "Are you sure you want reject wallet payment ?"; 
        }
        
        
   if (confirm(msg) == true) {
    $.ajax({
        url : `<?= base_url('admin/wallet/${wallet_id}/status/${status}') ?>`,
        method : 'get',
        success : function(res){
            
                 let response = JSON.parse(res);
                 if (response.status == 400) {

                    $(".flashmessage").fadeIn('fast').delay(2000).fadeOut('fast').html(response.message);
                } else if (response.status == 200) {
                    $(".flashmessage").fadeIn('fast').delay(2000).fadeOut('fast').html(response.message);
                    window.setTimeout(function() {
                        location.reload();
                    }, 2000);
                }
            
            // window.location.reload();
        }
    })
  } 
    }
</script>



<?php $this->load->view('admin/footer'); ?>