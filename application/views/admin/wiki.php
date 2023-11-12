	<?php $this->load->view('admin/header'); ?>
<!--Include header section-->
<div class="wrapper-page">
    <div class="page-title">
        <h1><i class="icon-list"></i>Wiki Pedia</h1>
    </div>
    <span class="flashmessage"></span>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body panel-heading-wrapper">
                            

                            <button type="button" data-id="1" name="submit" class="btn btn-custom pull-right userbutton"> Edit info </button>
                        </div>
                        <div class="panel-body">
                            
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Description</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $wikivalue->description; ?></span>
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
                            <h4 class="modal-title" id="modal-label">Wiki Pedia</h4>
                        </div>
                        <div style="color:green;padding:10px;font-size:20px" class="successUpdate"> </div>  
                        <form role="form"  id="wikiupdate" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="modal-body"> 
                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">Description</label>
                                    <div class="col-md-9">
                                        <textarea type="text" name="description" id="description" class="form-control" value='' placeholder="" ></textarea>
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


            
            
        </div>
    </div>
</div>


<script>
    $("#btnSubmit").on("click", function(event) {
        event.preventDefault();
        $.ajax({
            url: "<?php echo base_url();?>admin/save_wiki",
            type: "POST",
            dataType: 'json',
            data: {
                'id': $('#id').val(),
                'description': $('#description').val(),
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
        $('#wikiupdate').trigger("reset");
        $('#usermodel').modal('show');
        $.ajax({
            url: 'wikiById?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).done(function (response) {
            // Populate the form fields with the data returned from server
           
            $('#wikiupdate').find('[name="description"]').val(response.wikis.description).end();
            
        });
    });
});
</script>  






<!--Include footer section-->
<?php $this->load->view('admin/footer'); ?>