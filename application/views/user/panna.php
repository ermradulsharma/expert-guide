<?php $this->load->view('user/header'); ?>
<!--Include header section-->
<div class="wrapper-page">

    <div class="page-title">
        <h1><i class="icon-list"></i>Play Panna</h1>
    </div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="content_wrapper">
                        <div class="table_banner clearfix">
                            <h5 class="table_banner_title">Game History</h5>
                            <div class="buy_button">
                                <button type="button" id="category" class="btn btn-custom pull-right">
                                    Add Bet
                                </button>
                            </div>
                        </div>
                        <div class="table_body text-left">
                            <table id="example" class="table table-condensed responsive table_custom" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>SR No</th>
                                        <th>Market Name</th>
                                        <th>Type</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Bid</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sr = 1;
                                    foreach ($requestlist as $value) : ?>
                                        <tr>
                                            <td><?php echo $sr ?></td>
                                            <td><?php $id = $value->market_id;
                                                $mrkt_name = $this->Admin_model->getmarketValue($id);
                                                if (!empty($mrkt_name)) {
                                                    echo $mrkt_name->market_name;
                                                } else {
                                                    print("-");
                                                } ?></td>
                                            <td><?php echo $value->type; ?></td>
                                            <td><?php $id = $value->market_id;
                                                $marketValue = $this->Admin_model->getmarketValue($id);
                                                if ($value->type == 'OPEN') {
                                                    echo $marketValue->result_open_start_time;
                                                } else {
                                                    echo $marketValue->result_close_start_time;
                                                }
                                                ?></td>
                                            <td><?php $id = $value->market_id;
                                                $marketValue = $this->Admin_model->getmarketValue($id);
                                                if ($value->type == 'OPEN') {
                                                    echo $marketValue->result_open_end_time;
                                                } else {
                                                    echo $marketValue->result_close_end_time;
                                                }
                                                ?></td>
                                            <td><?php echo $value->digit ?></td>
                                            <td><?php echo $value->amount ?></td>
                                            <td><?php echo $value->date ?></td>
                                            <td class="action-buttons"><a onclick="return confirm('Are you sure to delete this data?')" href="panna_delet?id=<?php echo $value->id; ?>"><i class="icon-close"></i></a></td>
                                        </tr>
                                    <?PHP $sr++;
                                    endforeach; ?>
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
                <h4 class="modal-title" id="modal-label">Panna Game</h4>
            </div>
            <div class="successUpdate" style="color:green;padding:10px;font-size:20px"></div>
            <form enctype="multipart/form-data" id="catmodal" method="post" name="catmodal" role="form" accept-charset="utf-8">
                <div class="modal-body">
                    <div class="form-group clearfix">
                        <div class="col-md-6">
                            <select class="form-control" name="market_id" id="market_id">
                                <option value="">Select Market</option>
                                <?php foreach ($mrkt as $value) { ?>
                                    <option value="<?php $id = $value->id;
                                                    $mrkt_name = $this->Admin_model->getmarketValue($id);
                                                    echo $id; ?>"><?php echo $mrkt_name->market_name; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="type" id="type" class="form-control" style="width: 100%" required>
                                <option value="">Select Type</option>
                                <option value="OPEN">OPEN</option>
                                <option value="CLOSE">CLOSE</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <div class="col-md-6">
                            <input class="form-control" id="digit" name="digit" placeholder="Enter Digit" required type="text" value="">
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" id="amount" name="amount" placeholder="Amount" required type="text" value="">
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
            url: "<?php echo base_url(); ?>user/save_panna",
            type: "POST",
            dataType: 'json',
            data: {
                //'id': $('#id').val(),
                'user_id': $('#user_id').val(),
                'user_type': $('#user_type').val(),
                'market_id': $('#market_id').val(),
                'date': $('#date').val(),
                'type': $('#type').val(),
                'amount': $('#amount').val(),
                'digit': $('#digit').val(),

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