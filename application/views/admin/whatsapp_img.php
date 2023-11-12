<?php $this->load->view('admin/header'); ?>
<div class="wrapper-page">

    <div class="page-title">
        <h1><i class="icon-list"></i>Whatsapp Image</h1>
    </div>

    <span class="flashmessage"></span>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="content_wrapper">

                        <div class="table_banner clearfix">
                            <h5 class="table_banner_title">Whatsapp Image</h5>
                        </div>

                        <div class="table_body text-left">
                            <table id="example" class="table table-condensed responsive table_custom" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sr = 1; foreach($whatsapp_image as $value): ?>
                                    <tr>
                                        <td>
                                            <?php echo $sr; ?>
                                        </td>
                                        <td>
                                            <?php if(!empty($value->image)){ ?>
                                                    <img src="<?php echo base_url(); ?>assets/img/whatsappimg/<?php echo $value->image ?>" alt="Starter kit"></a>
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url(); ?>assets/img/whatsappimg/default.jpg" alt="Starter kit">
                                                <?php } ?>
                                            </td>
                                            <td><?php echo $value->status; ?></td>
                                            
                                            <td class="action-buttons">
                                                <button type="button" name="submit" class="userbutton" data-id="<?php echo $value->id; ?>">
                                                    <i class="icon-pencil"></i>
                                                </button>              
                                            </td>
                                        </tr>
                                        <?PHP   $sr++; endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>  
            </div>            
        </div>

    </div>
    <div class="modal fade" id="blogmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">

                <div class="modal-header modal-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-label">Update Whatsapp Image</h4>
                </div>

                <form role="form" action="updateBlogValue"  id="BlogValueUpdate" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                    <div class="modal-body">

                        <div class="form-group clearfix">
                            <div class="col-md-9 col-md-offset-3">
                                <div class="file_prev" style="display: inline-block; "></div>
                                <label for="user_image" class="custom-file-upload">Whatsapp Image</label>
                            </div>
                            <div class="col-md-9 col-md-offset-3">
                                <input type="file" class="" id="user_image" name="user_image" aria-describedby="fileHelp">
                            </div>
                        </div>
                       
                        <div class="form-group clearfix">
                            <label for="textareaMaxLength" class="col-md-3"> Status</label>
                            <div class="col-md-9">
                                <select name="status" id="status" class="form-control" style="width: 100%" required>                                    
                                    <option value="">Select Here</option>
                                    <option value="Active">ACTIVE</option>
                                    <option value="Inactive">INACTIVE</option>  
                                </select>                        
                            </div>
                        </div>  
                    </div>

                    <div class="modal-footer">
                        <div class="col-md-6">
                            <input type="hidden" name="id" id="id" value=''>
                            <span class="pull-left"></span>                  
                        </div>
                        <div class="col-md-6">
                            <button type="submit" id="btnSubmit" name="submit" class="btn btn-default btn-custom">Update</button>
                            <button type="button" onclick="location.reload()" class="btn btn-success btn-custom" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#btnSubmit").click(function (event) {
//stop submit the form, we will post it manually.
event.preventDefault();
// Get form
var formval = $('#BlogValueUpdate')[0];
// Create an FormData object
var data = new FormData(formval);
$.ajax({
    type: "POST",
    enctype: 'multipart/form-data',
    url: "<?php echo base_url(); ?>admin/updateW_img",
    data: data,
    dataType:'json',
    processData: false,
    contentType: false,
    cache: false,
    timeout: 600000,
    success: function(response) {
        if (response.status == 'error') {
            $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
        } else if (response.status == 'success') {
            console.log(response.status);
            $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
            window.setTimeout(function() {
                location.reload();
            }, 3000);
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
    $(document).ready(function () {
        $(".userbutton").click(function (e) {
            e.preventDefault(e);
// Get the record's ID via attribute  
var iid = $(this).attr('data-id');
$('#BlogValueUpdate').trigger("reset");
$('#blogmodel').modal('show');
$.ajax({
    url: '<?php echo base_url(); ?>admin/w_imgById?id=' + iid,
    method: 'GET',
    data: '',
    dataType: 'json',
}).done(function (response) {
    var theForm = $('#BlogValueUpdate');
    theForm.find('[name="id"]').val(response.w_imgValue.id).end()
    .find('[name="status"]').val(response.w_imgValue.status).end()
    var imgSrc = '<?php echo base_url(); ?>' + 'assets/img/whatsappimg/' + response.w_imgValue.image;
    theForm.find('[class="file_prev"]').html('<img src="' + imgSrc + '">').end();
});
});
    });
</script>
<style type="text/css">
    .file_prev img {
    height: 200px;
    width: 100px;
</style>
<?php $this->load->view('admin/footer'); ?>