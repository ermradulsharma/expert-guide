    <?php $this->load->view('admin/header'); ?>
<div class="wrapper-page">

    <div class="page-title">
        <h1><i class="icon-list"></i>Staffs</h1>
        <?php echo @$status;  echo @$response;  ?>
    </div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="content_wrapper">
                        <div class="table_banner clearfix">
                            <h5 class="table_banner_title">Staffs</h5>
                        </div>
                        <div class="table_body text-left">
                            <table id="example" class="table table-condensed responsive table_custom" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sr= 1;foreach($stafflist as $value): ?>
                                    <tr>
                                        <td><?php echo $sr; ?></td>
                                        <td>
                                            <?php if(!empty($value->image)){ ?>
                                                <a href="<?php echo base_url(); ?>admin/View_profile?U=<?php echo base64_encode($value->user_id) ?>">
                                                    <img src="<?php echo base_url(); ?>assets/img/user/<?php echo $value->image ?>" alt="Starter kit"></a>
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url(); ?>assets/img/user/default.jpg" alt="Starter kit">
                                                <?php } ?>
                                            </td>
                                            <td><a href="<?php echo base_url(); ?>admin/View_profile?U=<?php echo base64_encode($value->user_id) ?>"><?php echo $value->full_name ?></a></td>
                                            <td><?php echo $value->email ?></td>
                                            <td><?php echo $value->contact ?></td>
                                            <td class="action-buttons">
                                                <button type="button" name="submit" class="userbutton" data-id="<?php echo $value->user_id; ?>">
                                                    <i class="icon-pencil"></i>
                                                </button>
                                                <a onclick="return confirm('Are you sure to delete this data?')" href="staff_delet?id=<?php echo $value->user_id; ?>" <?php if($value->user_id == $this->session->userdata('user_login_id')){ echo 'hidden'; } ?> >
                                                    <i class="icon-close"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?PHP $sr++; endforeach; ?>
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
    <div class="modal fade" id="usermodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header modal-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-label">Update Staff</h4>
                </div>
                <form role="form" action="updateStaffValue" id="UserValueUpdate" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                    <div class="modal-body">
                        <div class="form-group clearfix">
                            <label for="inputMaxLength" class="col-md-3">Name</label>
                            <div class="col-md-9">
                                <input type="text" name="name" id="name" class="form-control" id="inputMaxLength" value='' placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label for="textareaMaxLength" class="col-md-3">Email</label>
                            <div class="col-md-9">
                                <input type="email" name="email" id="email" class="form-control" value='' placeholder="" required>
                            </div>
                        </div>

                        <div class="form-group clearfix">
                            <label for="textareaMaxLength" class="col-md-3">Contact</label>
                            <div class="col-md-9">
                                <input type="number" name="contact" id="contact" class="form-control" value='' placeholder="" required>
                            </div>
                        </div>

                        <div class="form-group clearfix">
                            <div class="col-md-9 col-md-offset-3">
                                <div class="file_prev" style="display: inline-block;"></div>
                                <label for="user_image" class="custom-file-upload">Upload image</label>
                            </div>
                            <div class="col-md-9 col-md-offset-3">
                                <input type="file" class="" id="user_image" name="user_image" aria-describedby="fileHelp">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="col-md-6">
                            <input type="hidden" name="userid" id="userid" value=''>
                            <span class="pull-left"></span>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" id="btnSubmit" name="submit" class="btn btn-default btn-custom">Update</button>
                            <button type="button" class="btn btn-success btn-custom" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".userbutton").click(function(e) {
                e.preventDefault(e);
// Get the record's ID via attribute  
var iid = $(this).attr('data-id');
$('#UserValueUpdate').trigger("reset");
$('#usermodel').modal('show');
$.ajax({
    url: '<?php echo base_url(); ?>admin/viewUserDataBYID?id=' + iid,
    method: 'GET',
    data: '',
    dataType: 'json',
}).done(function(response) {
// Populate the form fields with the data returned from server
var theForm = $('#UserValueUpdate');
theForm.find('[name="userid"]').val(response.uservalue.user_id).end()
.find('[name="name"]').val(response.uservalue.full_name).end()
.find('[name="email"]').val(response.uservalue.email).end()
.find('[name="contact"]').val(response.uservalue.contact).end()
var imgSrc = '<?php echo base_url(); ?>' + 'assets/img/user/' + response.uservalue.image;
theForm.find('[class="file_prev"]').html('<img src="' + imgSrc + '">').end();
});
});
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#btnSubmit").click(function(event) {
//stop submit the form, we will post it manually.
event.preventDefault();
// Get form
var formval = $('#UserValueUpdate')[0];
// Create an FormData object
var data = new FormData(formval);
$.ajax({
    type: "POST",
    enctype: 'multipart/form-data',
    url: "<?php echo base_url(); ?>admin/updateStaffValue",
    data: data,
    dataType: 'json',
    processData: false,
    contentType: false,
    cache: false,
    timeout: 200000,
    success: function(response) {
        if (response.status == 'error') {
            $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
        } else if (response.status == 'success') {
            $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
            var table = $('#example').DataTable();
            var editedTrIndex = $('[data-id=' + response.id + ']').closest('tr').index();
            var tr = $('#example tbody tr:eq(' + editedTrIndex + ')');
            tr.find('td:eq(0)').find('img').attr('src', response.data['image']);
            tr.find('td:eq(1)').text(response.id);
            tr.find('td:eq(2)').text(response.data['full_name']);
            tr.find('td:eq(3)').text(response.data['email']);
            
            table.rows(tr).invalidate().draw(); 
        }
    },
    error: function(response) {
    }
});
});
        });
    </script>
    <?php $this->load->view('admin/footer'); ?>