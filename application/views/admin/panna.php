<?php $this->load->view('admin/header'); ?>
<!--Include header section-->
<div class="wrapper-page">

    <div class="page-title">
        <h1><i class="icon-list"></i>Single History</h1>
    </div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="content_wrapper">

                        <div class="text-left">
                            <form id="formvalue" class="form-inline mb-3">
                                <div class="form-group mr-2">
                                    <label class="mr-2">Game</label>
                                    <select class="form-control" name="game" id="game" required="">
                                        <option value="">Select</option>
                                        <?php foreach ($mrkt as $value) : ?>
                                            <option value="<?php echo $value->id; ?>"><?php echo $value->market_name ?></option>

                                        <?php endforeach ?>

                                    </select>
                                </div>
                                <div class="form-group mr-2">
                                    <label class="mr-2">Type</label>
                                    <select class="form-control" name="type" id="type" required="">
                                        <option value="OPEN">OPEN</option>
                                        <option value="CLOSE">CLOSE</option>
                                    </select>
                                </div>


                                <div class="form-group mr-2">
                                    <label class="mr-2">Date</label>
                                    <input type="date" class="form-control" name="result_date" id="result_date" placeholder="Date" value="" required="">
                                </div>

                                <input type="submit" class="btn btn-primary submitbtn" value="Search">
                            </form>



                            <table id="example" class="" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Game No</th>
                                        <th>Game Name</th>
                                        <th>Total Users</th>
                                        <th>Load Amount</th>
                                        <th>Wining Amount</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                 
                                    if (!empty($requestlist)) {
                                        $sr = 1;
                                        foreach ($requestlist as $value) : ?>
                                            <tr>
                                                <td><?php echo $value->digit; ?></td>
                                                <td><?php $id = $value->market_id;
                                                    $mrkt_name = $this->Admin_model->getmarketValue($id);
                                                    if (!empty($mrkt_name)) {
                                                        echo $mrkt_name->market_name;
                                                    } else {
                                                        print("-");
                                                    } ?></td>

                                                <td><?php $digit = $value->digit;
                                                    $type = $value->type;
                                                    $id = $value->market_id;
                                                    // $this->db->where('digit',$digit );
                                                    // $this->db->from("single");
                                                    // echo $this->db->count_all_results();
                                                    $results = $this->db->dbprefix('single');
                                                    $sql      = "SELECT count(id) as total FROM $results WHERE `digit`='$digit' && `market_id`='$id' && `type`='$type' ";
                                                    $query    = $this->db->query($sql);
                                                    $result  = $query->row();
                                                    echo $result->total; ?></td>

                                                <td><?php $digit = $value->digit;
                                                    //  $this->db->select ('digit','$digit');
                                                    // $this->db->where('digit','$digit');
                                                    // $this->db->from("single");
                                                    $results = $this->db->dbprefix('single');
                                                    $sql      = "SELECT SUM(amount) as total FROM $results WHERE `digit`='$digit' && `market_id`='$id' && `type`='$type'";
                                                    $query    = $this->db->query($sql);
                                                    $result  = $query->row();
                                                    echo $result->total; ?></td>

                                                <td><?php echo "---";
                                                    ?></td>


                                            </tr>
                                    <?PHP $sr++;
                                        endforeach;
                                    } else {
                                        echo "<tr><th><h1>No Data Found</h1></th></tr>";
                                    } ?>
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
        $(".submitbtn").click(function(event) {
            //stop submit the form, we will post it manually.
            event.preventDefault();
            // Get form
            var formval = $('#formvalue')[0];
            // Create an FormData object
            var data = new FormData(formval);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "<?php echo base_url(); ?>admin/getpanna   ",
                data: data,
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                timeout: 200000,
                success: function(response) {
                    if (response.status == 'error') {


                    } else if (response.status == 'success') {


                    }
                },
                error: function(response) {
                    console.error();
                }
            });
        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".catbutton").click(function(e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $('#catmodal').trigger("reset");
            $('#categoryform').modal('show');
            $.ajax({
                url: '<?php echo base_url(); ?>user/singleById?id=' + iid,
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