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
                                        <th>SR No</th>
                                        <th>Market Name</th>
                                        <th colspan="2">Open</th>
                                        <th colspan="2">Close</th>
                                        <th colspan="2">Display</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr style="background: #0aa698;color: white;">
                                        <th></th>
                                        <th></th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sr=1;foreach($marketslist as $value): ?>
                                    <tr>
                                        <td>
                                           <?php echo $sr ?>
                                        </td>
                                        <td>
                                            <?php echo $value->market_name ?>
                                        </td>

                                        <td>
                                            <?php echo $value->result_open_start_time ?>
                                        </td>

                                        <td>
                                            <?php echo $value->result_open_end_time ?>
                                        </td>

                                        <td>
                                            <?php echo $value->result_close_start_time ?>
                                        </td>

                                        <td>
                                            <?php echo $value->result_close_end_time ?>
                                        </td>

                                        <td>
                                            <?php echo $value->result_display_start_time ?>
                                        </td>

                                        <td>
                                            <?php echo $value->result_display_end_time ?>
                                        </td>
                                       
                                        <td>
                                            <?php echo $value->status ?> 
                                        </td>
                                        <td class="action-buttons">
                                            <button type="button" id="category" data-id="<?php echo $value->id; ?>" name="submit" class="catbutton">
                                                    <i class="icon-pencil"></i>
                                                </button>  <a onclick="return confirm('Are you sure to delete this data?')" href="market_delet?id=<?php echo $value->id; ?>" >
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
                <h4 class="modal-title" id="modal-label">Market</h4>
            </div>
            <div class="successUpdate" style="color:green;padding:10px;font-size:20px"></div>
            <form enctype="multipart/form-data" id="catmodal" method="post" name="catmodal" role="form" accept-charset="utf-8">
                <div class="modal-body">
                    
                    
                    <div class="form-group clearfix">
                        <label class="col-md-3" for="inputMaxLength">Market Name</label>
                        <div class="col-md-9">
                            <input class="form-control" id="market_name" name="market_name" placeholder="Market Name" required type="text" value=''>
                        </div>
                    </div>

                    <div class="form-group clearfix">
                        <label class="col-md-3" for="inputMaxLength"> Open Start Time</label>
                        <div class="col-md-3">
                            <input class="form-control" id="result_open_start_time" name="result_open_start_time" placeholder="Result Open Start Time" required type="time" value=''>
                        </div>
                        <label class="col-md-3" for="inputMaxLength"> Open End Time</label>
                        <div class="col-md-3">
                            <input class="form-control" id="result_open_end_time" name="result_open_end_time" placeholder="Result Open End Time" required type="time" value=''>
                        </div>
                    </div>
                    
                    <div class="form-group clearfix">
                        <label class="col-md-3" for="inputMaxLength"> Close Start Time</label>
                        <div class="col-md-3">
                            <input class="form-control" id="result_close_start_time" name="result_close_start_time" placeholder="Result Close Start Time" required type="time" value=''>
                        </div>
                        <label class="col-md-3" for="inputMaxLength"> Close End Time</label>
                        <div class="col-md-3">
                            <input class="form-control" id="result_close_end_time" name="result_close_end_time" placeholder="Result Close End Time" required type="time" value=''>
                        </div>
                    </div>

                    <div class="form-group clearfix">
                        <label class="col-md-3" for="inputMaxLength">Display Open Time</label>
                        <div class="col-md-3">
                            <input class="form-control" id="result_display_start_time" name="result_display_start_time" placeholder="Result Display Open Time" required type="time" value=''>
                        </div>
                        <label class="col-md-3" for="inputMaxLength">Display End Time</label>
                        <div class="col-md-3">
                            <input class="form-control" id="result_display_end_time" name="result_display_end_time" placeholder="Result Display End Time" required type="time" value=''>
                        </div>
                    </div>
                    <!-- <div class="form-group clearfix">-->
                    <!--    <label class="col-md-3" for="inputMaxLength">jodi_chart_url</label>-->
                    <!--    <div class="col-md-3">-->
                    <!--        <input class="form-control" id="jodi_chart_url" name="jodi_chart_url" placeholder="Result jodi_chart_url" required type="text" value=''>-->
                    <!--    </div>-->
                    <!--    <label class="col-md-3" for="inputMaxLength"> panel_chart_url</label>-->
                    <!--    <div class="col-md-3">-->
                    <!--        <input class="form-control" id="panel_chart_url" name="panel_chart_url" placeholder="Result panel_chart_url" required type="text" value=''>-->
                    <!--    </div>-->
                    <!--</div>-->
                    
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
                    <input id="id" name="id" type="hidden" value="">
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
            url: "<?php echo base_url();?>admin/save_market",
            type: "POST",
            dataType: 'json',
            data: {
                'id': $('#id').val(),
                'market_name': $('#market_name').val(),
                'result_open_start_time': $('#result_open_start_time').val(),
                'result_open_end_time': $('#result_open_end_time').val(),
                'result_close_start_time': $('#result_close_start_time').val(),
                'result_close_end_time': $('#result_close_end_time').val(),

                'result_display_start_time': $('#result_display_start_time').val(),
                'result_display_end_time': $('#result_display_end_time').val(),
                   'jodi_chart_url': $('#jodi_chart_url').val(),
                'panel_chart_url': $('#panel_chart_url').val(),
                


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
                url: '<?php echo base_url();?>admin/marketById?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).done(function(response) {
                /*console.log(response);*/
                // Populate the form fields with the data returned from server
                $('#catmodal').find('[name="id"]').val(response.marketValue.id).end();
                $('#catmodal').find('[name="market_name"]').val(response.marketValue.market_name).end();
                $('#catmodal').find('[name="result_open_start_time"]').val(response.marketValue.result_open_start_time).end();
                $('#catmodal').find('[name="result_open_end_time"]').val(response.marketValue.result_open_end_time).end();
                $('#catmodal').find('[name="result_close_start_time"]').val(response.marketValue.result_close_start_time).end();
                $('#catmodal').find('[name="result_close_end_time"]').val(response.marketValue.result_close_end_time).end();

                $('#catmodal').find('[name="result_display_start_time"]').val(response.marketValue.result_display_start_time).end();
                $('#catmodal').find('[name="result_display_end_time"]').val(response.marketValue.result_display_end_time).end();
                $('#catmodal').find('[name="jodi_chart_url"]').val(response.marketValue.jodi_chart_url).end();
                $('#catmodal').find('[name="panel_chart_url"]').val(response.marketValue.panel_chart_url).end();


                $('#catmodal').find('[name="status"]').val(response.marketValue.status).end();
                
               
            });
        });
    });
</script>
<!--Include footer section-->
<?php $this->load->view('admin/footer'); ?>s