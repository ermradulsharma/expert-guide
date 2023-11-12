<?php $this->load->view('user/header'); ?>
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
                                <button type="button" id="category" class="btn btn-custom pull-right">
                                    Add Wallet Amount
                                </button>
                            </div>
                        </div>
                        <div class="table_body text-left">
                            <table id="example" class="table table-condensed responsive table_custom" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>SR No</th>
                                        <th>Amount</th>
                                        <th>UTR No.</th>
                                        <th>Image</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($wallets[0])){
                                    for($i=0;$i<count($wallets);$i++){
                                    ?>
                                        <tr>
                                        <td><?= $i+1; ?></td>
                                        <td><?= $wallets[$i]->amount; ?></td>
                                        <td><?= $wallets[$i]->utr; ?></td>
                                        <td><img style="height:100px;width:100px;" src="<?= file_exists($wallets[$i]->image) ? base_url($wallets[$i]->image) : 'https://www.pngall.com/wp-content/uploads/5/User-Profile-PNG-Image.png';  ?>"</td>
                                        <td><?= date('Y-m-d h:i A',$wallets[$i]->created_at); ?></td>
                                        <td><?php if($wallets[$i]->status == '0' ){ echo "Pending"; } else if($wallets[$i]->status == '1'){echo "Accept";}else {echo "Reject";}   ?></td>
                                     
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
<!--Category validation modal-->
<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="categoryform" role="dialog" style="display: none;" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-primary">
                <button aria-label="Close" class="close" data-dismiss="modal" onclick="location.reload()" type="button"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-label">Wallet</h4>
            </div>
            <div class="successUpdate" style="color:green;padding:10px;font-size:20px"></div>
            <form enctype="multipart/form-data" id="catmodal" method="post" name="catmodal" role="form" accept-charset="utf-8">
                <div class="modal-body">
               
                    <div class="form-group clearfix">
                        
                           <div class="col-md-12 my-2">
                            <div style="display:flex;justify-content: space-around;">
                              <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="100" >
    <label class="form-check-label" for="exampleRadios1">
            100
        </label>
  </div>
  
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="200" >
    <label class="form-check-label" for="exampleRadios2">
            200
        </label>
  </div>
  
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="300" >
    <label class="form-check-label" for="exampleRadios3">
            500
        </label>
  </div>
  
      <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="1000" >
    <label class="form-check-label" for="exampleRadios4">
            1000
        </label>
  </div>
  
  </div>
                            <input class="form-control input-box" id="amount" name="amount" placeholder="Amount" required type="text" value="200">
                        </div>
                        
                        
                        <div class="col-md-12 mb-4">
                            <input class="form-control input-box" id="digit" name="digit" placeholder="Enter UTR No." required type="text" value="">
                        </div>
                     
                        <div class="col-md-12 my-2">
                            <input class="form-control input-box"  id="wallet_img" style="position:unset;" name="wallet_img"  required type="file" >
                        </div>
                    </div>
                </div>
                <div class="setmessage"></div>
                <div class="modal-footer">
                    <input id="user_id" name="user_id" type="hidden" value="<?php echo $this->session->userdata('user_login_id'); ?>">
                    <input id="user_type" name="user_type" type="hidden" value="<?php echo $this->session->userdata('user_type'); ?>">
                    <button class="btn btn-custom" id="addcategory" name="submit" type="submit">Add Amount</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Category modal show-->
<script type="text/javascript">
    $(document).ready(function() {
        $("#category").click(function(e) {
            e.preventDefault(e);
            $('#categoryform').modal('show');
        });
    });
</script>
<!--Category update and insert script-->
<script>
    $("#addcategory").on("click", function(event) {
        event.preventDefault();
         $('#addcategory').text('Loading....').attr("disabled" , true);
       let formData =  new FormData($("#catmodal")[0]);
        $.ajax({
            url: "<?php echo base_url(); ?>user/add_wallet_transion",
            type: "POST",
            data: formData,
             contentType: false, 
             processData: false,
            success: function(response) {
                $('#addcategory').text('Add Amount').attr('disabled',false);

                if (response.status == 'error') {

                    $(".flashmessage").fadeIn('fast').delay(2000).fadeOut('fast').html(response.message);
                } else if (response.status == 'success') {
                    $('#addcategory').text('Add Amount').attr('disabled',false);
                    $(".flashmessage").fadeIn('fast').delay(2000).fadeOut('fast').html(response.message);
                    window.setTimeout(function() {
                        location.reload();
                    }, 2000);
                }
            },
            error: function(response) {
                console.error();
            }
        });
    });
</script>
<!--category form data show in field-->
<script type="text/javascript">
    $(document).ready(function() {
        $(".catbutton").click(function(e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $('#catmodal').trigger("reset");
            $('#categoryform').modal('show');
            $.ajax({
                url: '<?php echo base_url(); ?>user/pannaById?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).done(function(response) {
                /*console.log(response);*/
                // Populate the form fields with the data returned from server
                $('#catmodal').find('[name="id"]').val(response.ResultValue.id).end();
                $('#catmodal').find('[name="user_id"]').val(response.ResultValue.user_id).end();
                $('#catmodal').find('[name="user_type"]').val(response.ResultValue.user_type).end();
                $('#catmodal').find('[name="market_id"]').val(response.ResultValue.market_id).end();
                $('#catmodal').find('[name="type"]').val(response.ResultValue.type).end();
                $('#catmodal').find('[name="amount"]').val(response.ResultValue.amount).end();
                $('#catmodal').find('[name="date"]').val(response.ResultValue.date).end();
                $('#catmodal').find('[name="digit"]').val(response.ResultValue.digit).end();

            });
        });
    });
</script>
<!--Include footer section-->
<?php $this->load->view('user/footer'); ?>