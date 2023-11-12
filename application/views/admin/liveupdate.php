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
<div class="wrapper-page">

    <div class="page-title">
        <h1><i class="icon-list"></i> Live Updates</h1>
    </div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="content_wrapper">
                        <div class="table_banner clearfix">
                            <h5 class="table_banner_title">Live Updates</h5>
                            <div class="buy_button">
                                <button type="button" id="category" class="btn btn-custom pull-right">
                                Add Live Updates
                            </button>
                            </div>
                        </div>
                        <div class="table_body text-left">
                            <table id="example" class="table table-condensed responsive table_custom" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>SR No</th>
                                        <th>Market Name</th>
                                        <th>User Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sr=1;foreach($requestlist as $value): ?>
                                    <tr>
                                        <td>
                                           <?php echo $sr ?>
                                        </td>
                                        <td>
                                            <?php  $id = $value->market_id;
                                             $mrkt_name = $this->Admin_model->getmarketValue($id);
                                            if (!empty($mrkt_name)) {
                                             echo $mrkt_name->market_name;
                                             } else{
                                                print("-");
                                             } ?> 
                                        </td>
                                    
                                      
                                        <td>
                                             <?php  $id = $value->user_id;
                                             $user_name = $this->Admin_model->getUserValue($id);
                                            if (!empty($user_name)) {
                                             echo $user_name->full_name;
                                             } else{
                                                print("-");
                                             } ?>
                                        </td>
                                        
                                        <td>
                                             <?php  echo $value->status; ?>
                                        </td>

                                        <td class="action-buttons">
                                            <button type="button" id="category" data-id="<?php echo $value->id; ?>" name="submit" class="catbutton">
                                                    <i class="icon-pencil"></i>
                                                </button>  <a onclick="return confirm('Are you sure to delete this data?')" href="result_delet?id=<?php echo $value->id; ?>" >
                                                    <i class="icon-close"></i>
                                                </a>
                                        </td>
                                    </tr>
                                    <?PHP $sr ++; endforeach; ?>
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
                <h4 class="modal-title" id="modal-label">Live Update</h4>

            </div>
            <div class="successUpdate" style="color:green;padding:10px;font-size:20px"></div>
            <form enctype="multipart/form-data" id="catmodal" method="post" name="catmodal" role="form" accept-charset="utf-8">
                <div class="modal-body">
                    <div class="form-group clearfix">
                        <div class="col-md-3">
                            <label>Date</label>
                        </div>
                        <div class="col-md-5">
                              <input type="date" name="date" id="date" class="form-control" value="date()"> 
                    </div>
                     <div class="col-md-3"></div>
                    </div>
                    
                    <div class="form-group clearfix">
                        <label class="col-md-3" for="textareaMaxLength">Select Market</label>
                        <div class="col-md-9">
                                  <select class="form-control "  name="market_id" id="market_id">
                                        <option value="">Select here</option>
                                        <?php foreach($mrkt as $value): ?>
                                            <option value="<?php echo $value->id; ?>"><?php echo $value->market_name; ?></option>
                                        <?php endforeach; ?>
                                    </select> 
                        </div>
                    </div>
                   
                    
                    
                    <div class="form-group clearfix">
                        <label for="textareaMaxLength" class="col-md-3">Status</label>
                        <div class="col-md-9">
                            <select name="status" id="status" class="form-control" style="width: 100%" required>                                    
                                <option value="">Select Here</option>
                                <option value="Active">ACTIVE</option>
                                <option value="Inactive">INACTIVE</option>  
                            </select>                        
                        </div>
                    </div>
                    
                </div>
                <div class="setmessage"></div>
                <div class="modal-footer">
                    <input id="id" name="id" type="hidden" value="">
                    <input id="user_id" name="user_id" type="hidden" value="<?php echo $this->session->userdata('user_login_id'); ?>">
                    <input id="user_type" name="user_type" type="hidden" value="<?php echo $this->session->userdata('user_type'); ?>">
                    <button class="btn btn-custom" id="addcategory" name="submit" type="submit">Save</button>
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
        $.ajax({
            url: "<?php echo base_url();?>admin/save_liveupdate",
            type: "POST",
            dataType: 'json',
            data: {
                'id': $('#id').val(),
                'user_id': $('#user_id').val(),
                'user_type': $('#user_type').val(),
                'market_id': $('#market_id').val(),
                'date': $('#date').val(),
                'status': $('#status').val(),
            },
           
            success: function(response) {
                if (response.status == 'error') {
                    $(".flashmessage").fadeIn('fast').delay(2000).fadeOut('fast').html(response.message);
                } else if (response.status == 'success') {
                    $('#addcategory').html('Saved');
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
                url: '<?php echo base_url();?>admin/liveresultsById?id=' + iid,
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
                 $('#catmodal').find('[name="date"]').val(response.ResultValue.date).end();
                $('#catmodal').find('[name="status"]').val(response.ResultValue.status).end();
            });
        });
    });
</script>
<!--Include footer section-->
<?php $this->load->view('admin/footer'); ?>s