<?php $this->load->view('admin/header'); ?>
<!--Include header section-->
<div class="wrapper-page">

    <div class="page-title">
        <h1><i class="icon-list"></i> View Markets</h1>
    </div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="content_wrapper">
                        <div class="table_banner clearfix">
                            <h5 class="table_banner_title">Market List</h5>
                            <div class="buy_button">
                                <button type="button" id="category" class="btn btn-custom pull-right">
                                Add Market
                            </button>
                            </div>
                        </div>
                        <div class="table_body text-left">
                            <table id="example" class="table table-condensed responsive table_custom" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Market Name</th>
                                        <th>Staff Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                
                                </thead>
                                <tbody>
                                    <?php $sr=1;foreach($mrkt as $value): ?>
                                    <tr>
                                        <td>
                                           <?php echo $sr ?>
                                        </td>
                                        <td>
                                            <?php $id = $value->market_id;
                                            $marketname = $this->Admin_model->getmarketValue($id); 
                                            echo $marketname->market_name;  ?>
                                        </td>

                                        <td>
                                           <?php $id = $value->user_id;
                                            $username = $this->Admin_model->getUserValue($id); 
                                           echo isset($username->full_name) ? $username->full_name : 'None';  ?>
                                        </td>
                                        <td>
                                            <?php echo $value->status ?> 
                                        </td>
                                        <td class="action-buttons">
                                            <button type="button" id="category" data-id="<?php echo $value->id; ?>" name="submit" class="catbutton">
                                                    <i class="icon-pencil"></i>
                                                </button>  <a onclick="return confirm('Are you sure to delete this data?')" href="marketassign_delet?id=<?php echo $value->id; ?>" >
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
                <h4 class="modal-title" id="modal-label">Market Assign</h4>
            </div>
            <div class="successUpdate" style="color:green;padding:10px;font-size:20px"></div>
            <form enctype="multipart/form-data" id="catmodal" method="post" name="catmodal" role="form" accept-charset="utf-8">
                <div class="modal-body">

                    <div class="form-group clearfix">
                        <label class="col-md-3" for="textareaMaxLength">Select Market</label>
                        <div class="col-md-9">
                                  <select class="form-control "  name="market_id" id="market_id">
                                        <option value="">Select here</option>
                                        <?php foreach($markets as $value): ?>
                                            <option value="<?php echo $value->id; ?>"><?php echo $value->market_name; ?></option>
                                        <?php endforeach; ?>
                                    </select> 
                        </div>
                    </div>


                    <div class="form-group clearfix">
                        <label class="col-md-3" for="textareaMaxLength">Select User</label>
                        <div class="col-md-9">
                                  <select class="form-control "  name="user_id" id="user_id">
                                        <option value="">Select here</option>
                                        <?php foreach($users as $value): ?>
                                            <option value="<?php echo $value->user_id; ?>"><?php echo $value->full_name; ?></option>
                                        <?php endforeach; ?>
                                    </select> 
                        </div>
                    </div>


                    <div class="form-group clearfix">
                        <label class="col-md-3" for="textareaMaxLength">Status</label>
                        <div class="col-md-9">
                            <select class="form-control" id="status" name="status" required>
                                    <option value="">
                                        Select Here...
                                    </option>
                                    <option value="Active">
                                        ACTIVE
                                    </option>
                                    <option value="Inactive">
                                        INACTIVE
                                    </option>
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="setmessage"></div>
                <div class="modal-footer">
                    <input id="id" name="id" type="number" value="" hidden>
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
            url: "<?php echo base_url();?>admin/save_marketassign",
            type: "POST",
            dataType: 'json',
            data: {
                'id': $('#id').val(),
                'market_id': $('#market_id').val(),
                'user_id': $('#user_id').val(),
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
                url: '<?php echo base_url();?>admin/marketassignById?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).done(function(response) {
                /*console.log(response);*/
                // Populate the form fields with the data returned from server
                $('#catmodal').find('[name="id"]').val(response.marketValue.id).end();
                $('#catmodal').find('[name="market_id"]').val(response.marketValue.market_id).end();
                $('#catmodal').find('[name="user_id"]').val(response.marketValue.user_id).end();
                $('#catmodal').find('[name="status"]').val(response.marketValue.status).end();
                
            });
        });
    });
</script>
<!--Include footer section-->
<?php $this->load->view('admin/footer'); ?>s