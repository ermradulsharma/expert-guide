<?php $this->load->view('admin/header');?>
<!--Include header section-->
<div class="wrapper-page">

    <div class="page-title">
        <h1><i class="icon-list"></i>Jodi History</h1>
    </div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="content_wrapper">
                        <div class="table_banner clearfix">
                            <h5 class="table_banner_title">Jodi History</h5>

                        </div>
                        <div class="table_body text-left">
                            <table id="example" class="table table-condensed responsive table_custom" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>SR No</th>
                                        <th>User Name</th>
                                        <th>Market Name</th>
                                        <th>Type</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Bid</th>
                                        <th>Amount</th>
                                        <th>Result</th>
                                        <th>Date</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sr = 1;
                                    foreach ($requestlist as $value) : ?>
                                        <tr>
                                            <td><?php echo $sr ?></td>
                                            <td><?php $id = $value->user_id;
                                                $username = $this->Admin_model->getUserValue($id);
                                                if (!empty($username)) {
                                                    echo $username->full_name;
                                                } else {
                                                    print("-");
                                                } ?></td>
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
                                            <td><?php $id = $value->market_id;
                                                    $date = $value->date;
                                             $user_name = $this->Admin_model->getluckyValue($id,$date);
                                             if (!empty($user_name)) {
                                            if ($value->type == 'OPEN') {
                                                echo $user_name->open;
                                             }else{
                                                echo $user_name->close;
                                             }}else{
                                                echo "coming soon";
                                             }   ?>
                                             </td>
                                            <td><?php echo $value->date ?></td>
                                            <td class="action-buttons"><a onclick="return confirm('Are you sure to delete this data?')" href="jodi_delet?id=<?php echo $value->id; ?>"><i class="icon-close"></i></a></td>
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

<script type="text/javascript">
    $(document).ready(function() {
        $(".catbutton").click(function(e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $('#catmodal').trigger("reset");
            $('#categoryform').modal('show');
            $.ajax({
                url: '<?php echo base_url(); ?>user/jodiById?id=' + iid,
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
<?php $this->load->view('admin/footer'); ?>