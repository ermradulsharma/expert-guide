<?php $this->load->view('staff/header');

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
                            <table id="example" class="table table-condensed responsive table_custom" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>SR No</th>
                                        <th>Market Name</th>
                                        <th>Open</th>
                                        <th>Close</th>
                                        <th>Jodi No</th>
                                        <th>User Name</th>
                                        <th>Date</th>
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
                                            <?php echo $value->result_open ?>
                                        </td>
                                         <td>
                                            <?php echo $value->result_close ?>
                                        </td>
                                        <td>
                                           <?php echo $value->result_no ?>
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
                                           <?php echo $value->date ?>
                                        </td>
                                        
                                        <td class="action-buttons">
                                           <a onclick="return confirm('Are you sure to delete this data?')" href="result_delet?id=<?php echo $value->id; ?>" >
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
                <h4 class="modal-title" id="modal-label">Result</h4>

            </div>
            <div class="successUpdate" style="color:green;padding:10px;font-size:20px"></div>
            <form enctype="multipart/form-data" id="catmodal" method="post" name="catmodal" role="form" accept-charset="utf-8">
                <div class="modal-body">
                    <div class="form-group clearfix">
                        <div class="col-md-3">
                            <label>Date</label>
                        </div>
                        <div class="col-md-3">
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
                                            <option value="<?php echo $value->market_id; ?>">
                                            <?php $id = $value->market_id;
                                            $marketname = $this->Admin_model->getmarketValue($id);
                                            echo $marketname->market_name; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select> 
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-2" for="inputMaxLength">Open</label>
                        <div class="col-md-4">
                            <input class="form-control" id="result_open" name="result_open" placeholder="Result Open" required type="text" value='' onchange="return getData()" >
                        </div>
                         <label class="col-md-2" for="inputMaxLength">Close</label>
                        <div class="col-md-4">
                            <input class="form-control" id="result_close" name="result_close" placeholder="Result Close" required type="text" value='' onchange="return getData()">
                        </div>
                    </div>
                    
                   
                   <div class="form-group clearfix">
                   <label class="col-md-2" for="inputMaxLength">Manual Result</label>
                        <div class="col-md-4">
                            <input class="form-control" id="m_result" name="m_result" placeholder="Result No" type="number"  value='' onchange="return getData()">
                        </div>
                        <label class="col-md-2" for="inputMaxLength">Result No</label>
                        <div class="col-md-4">
                            <input class="form-control" id="full_result" name="full_result" placeholder="Result No" required type="text" readonly>
                        </div>
                       
                    </div> 

                     
                    <!-- <div class="form-group clearfix">
                        <label class="col-md-3" for="inputMaxLength">Display Open Time</label>
                        <div class="col-md-3">
                            <input class="form-control" id="result_display_start_time" name="result_display_start_time" placeholder="Result Display Open Time" required type="time" value=''>
                        </div>
                        <label class="col-md-3" for="inputMaxLength">Display End Time</label>
                        <div class="col-md-3">
                            <input class="form-control" id="result_display_end_time" name="result_display_end_time" placeholder="Result Display End Time" required type="time" value=''>
                        </div>
                    </div> -->
                    
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
                    <input  id="result_no" name="result_no" value=''  hidden>
                    <input  id="open" name="open" value=''  hidden>
                    <input  id="close" name="close" value=''  hidden>
                    <input id="id" name="id" type="hidden" value="">
                    <input id="user_id" name="user_id" type="hidden" value="<?php echo $this->session->userdata('user_login_id'); ?>">
                    <input id="user_type" name="user_type" type="hidden" value="<?php echo $this->session->userdata('user_type'); ?>">
                    <button class="btn btn-custom" id="addcategory" name="submit" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function getData(){
    var result;
    var lastdigit_open;
    var open=document.getElementById("result_open").value;
    if(isNaN(open)){
        result=open;
    }else{
    if(open!=""){
        var sum_open = 0;
        while (open) {
        sum_open += open % 10;
        open = Math.floor(open / 10);
        }
        lastdigit_open=(sum_open % 10);
    }else{
        lastdigit_open="";
    }
    var lastdigit_close;
    var close=document.getElementById("result_close").value;
    if(close!=""){
        var sum_close = 0;
        while (close) {
        sum_close += close % 10;
        close = Math.floor(close / 10);
        }
        lastdigit_close=(sum_close % 10);
    }else{
        lastdigit_close="";
    }

    
    var manualvalue=document.getElementById("m_result").value;
    if(manualvalue!=""){
        var totaljodi=(manualvalue);
    }else{
        var totaljodi=(lastdigit_open + "" + lastdigit_close);
    }

    if(lastdigit_close!=""){
        result=(document.getElementById("result_open").value + "-" + totaljodi + "-" + document.getElementById("result_close").value);
    }else{
        result=(document.getElementById("result_open").value + "-" + totaljodi);
    }
    }
    document.getElementById('full_result').value=result;
    document.getElementById('open').value=lastdigit_open;
    document.getElementById('close').value=lastdigit_close;
    document.getElementById('result_no').value=totaljodi;
}
</script>


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
            url: "<?php echo base_url();?>staff/save_result",
            type: "POST",
            dataType: 'json',
            data: {
                'id': $('#id').val(),
                'user_id': $('#user_id').val(),
                'user_type': $('#user_type').val(),
                'market_id': $('#market_id').val(),
                'date': $('#date').val(),
                'result_open': $('#result_open').val(),
                'result_close': $('#result_close').val(),
                'result_no': $('#result_no').val(),
                'close': $('#close').val(),
                'open': $('#open').val(),
                'm_result': $('#m_result').val(),
                'full_result': $('#full_result').val(),
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
                url: '<?php echo base_url();?>staff/resultsById?id=' + iid,
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
                $('#catmodal').find('[name="result_open"]').val(response.ResultValue.result_open).end();
                $('#catmodal').find('[name="result_close"]').val(response.ResultValue.result_close).end();
                 $('#catmodal').find('[name="date"]').val(response.ResultValue.date).end();
                $('#catmodal').find('[name="result_no"]').val(response.ResultValue.result_no).end();
                $('#catmodal').find('[name="close"]').val(response.ResultValue.close).end();
                $('#catmodal').find('[name="open"]').val(response.ResultValue.open).end();
                $('#catmodal').find('[name="m_result"]').val(response.ResultValue.m_result).end();
                $('#catmodal').find('[name="full_result"]').val(response.ResultValue.full_result).end();
                $('#catmodal').find('[name="status"]').val(response.ResultValue.status).end();
            }); 
        });
    });
</script>
<!--Include footer section-->
<?php $this->load->view('staff/footer'); ?>s