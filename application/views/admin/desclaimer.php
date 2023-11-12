<?php $this->load->view('admin/header'); ?>
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>

<!--Include header section-->
<div class="wrapper-page">
    <div class="page-title">
        <h1><i class="icon-list"></i> Desclaimer</h1>
    </div>
    <span class="flashmessage"></span>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body panel-heading-wrapper">
                            <h5 class="pull-left">Desclaimer</h5>

                            <button type="button" data-id="1" name="submit" class="btn btn-custom pull-right userbutton"> Edit Desclaimer </button>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Desclaimer</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $dsclmr->desclaimer; ?></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="usermodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modal-label">Desclaimer</h4>
                        </div>
                        <div style="color:green;padding:10px;font-size:20px" class="successUpdate"> </div>  
                        <form role="form"  id="aboutupdate" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="modal-body">
                                
                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">Desclaimer</label>
                                    <div class="col-md-9">
                                        <textarea type="text"  name="desclaimer" id="desclaimer" class="form-control " value='' placeholder="" ></textarea>
                                    </div>
                                </div>                       
                            </div>
                            <div class="modal-footer">
                                
                                <div class="col-md-6">
                                    <input type="text" name="id" id="id" value="1" hidden>
                                    <button type="submit" id="btnSubmit" name="submit" class="btn btn-custom">Ok</button>
                                    <button type="button" onclick="location.reload();" class="btn btn-custom" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

<script>
    $("#btnSubmit").on("click", function(event) {
        event.preventDefault();
        $.ajax({
            url: "<?php echo base_url();?>admin/save_desclaimer",
            type: "POST",
            dataType: 'json',
            data: {
                'id': $('#id').val(),
                'desclaimer': $('#desclaimer').val(),
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


<script type="text/javascript">
$(document).ready(function () {
    $(".userbutton").click(function (e) {
        e.preventDefault(e);
        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');
        $('#aboutupdate').trigger("reset");
        $('#usermodel').modal('show');
        $.ajax({
            url: 'desclaimerbyid?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).done(function (response) {
            // Populate the form fields with the data returned from server
           
            $('#aboutupdate').find('[name="desclaimer"]').val(response.desclaimervalue.desclaimer).end();
            
        });
    });
});
</script>  

<script type="text/javascript">
    CKEDITOR.replace( 'desclaimer' );
</script>

<?php $this->load->view('admin/footer'); ?>