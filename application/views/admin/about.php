	<?php $this->load->view('admin/header'); ?>
<!--Include header section-->
<div class="wrapper-page">
    <div class="page-title">
        <h1><i class="icon-list"></i> About</h1>
    </div>
    <span class="flashmessage"></span>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body panel-heading-wrapper">
                            <h5 class="pull-left">INDIAN PEOPLE ARE CRAZY ABOUT SATTAMATKA</h5>

                            <button type="button" data-id="3" name="submit" class="btn btn-custom pull-right userbutton"> Edit info </button>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Heading</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $abt->title; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Discription</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $abt->discription; ?></span>
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
                            <h4 class="modal-title" id="modal-label">About</h4>
                        </div>
                        <div style="color:green;padding:10px;font-size:20px" class="successUpdate"> </div>  
                        <form role="form"  id="aboutupdate" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="modal-body">
                                <div class="form-group clearfix">
                                    <label for="inputMaxLength" class="col-md-3">Heading</label>
                                    <div class="col-md-9">
                                        <input type="text" name="title" id="title" class="form-control" id="inputMaxLength" value='' placeholder=""  >
                                    </div>
                                </div>                              

                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">Discription</label>
                                    <div class="col-md-9">
                                        <textarea type="text" name="discription" id="discription" class="form-control" value='' placeholder="" ></textarea>
                                    </div>
                                </div>                       
                            </div>
                            <div class="modal-footer">
                                
                                <div class="col-md-6">
                                    <input type="text" name="id" id="id" value="3" hidden>
                                    <button type="submit" id="btnSubmit" name="submit" class="btn btn-custom">Ok</button>
                                    <button type="button" onclick="location.reload();" class="btn btn-custom" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body panel-heading-wrapper">
                            <h5 class="pull-left">SOME FUN FACTS ABOUT GENERAL INFORMATION ABOUT MATKA</h5>

                            <button type="button" data-id="3" name="submit" class="btn btn-custom pull-right userbutton2"> Edit info </button>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Heading</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $abt->title2; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Discription</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $abt->discription2; ?></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="usermodel2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modal-label">About</h4>
                        </div>
                        <div style="color:green;padding:10px;font-size:20px" class="successUpdate"> </div>  
                        <form role="form"  id="aboutupdate2" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="modal-body">
                                <div class="form-group clearfix">
                                    <label for="inputMaxLength" class="col-md-3">Heading</label>
                                    <div class="col-md-9">
                                        <input type="text" name="title2" id="title2" class="form-control" id="inputMaxLength" value='' placeholder=""  >
                                    </div>
                                </div>                              

                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">Discription</label>
                                    <div class="col-md-9">
                                        <textarea type="text" name="discription2" id="discription2" class="form-control" value='' placeholder="" ></textarea>
                                    </div>
                                </div>                       
                            </div>
                            <div class="modal-footer">
                                
                                <div class="col-md-6">
                                    <input type="text" name="id" id="id" value="3" hidden>
                                    <button type="submit" id="btnSubmit2" name="submit" class="btn btn-custom">Ok</button>
                                    <button type="button" onclick="location.reload();" class="btn btn-custom" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body panel-heading-wrapper">
                            <h5 class="pull-left">FUNDING SOURCE</h5>

                            <button type="button" data-id="3" name="submit" class="btn btn-custom pull-right userbutton3"> Edit info </button>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Heading</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $abt->title3; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Discription</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $abt->discription3; ?></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="usermodel3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modal-label">About</h4>
                        </div>
                        <div style="color:green;padding:10px;font-size:20px" class="successUpdate"> </div>  
                        <form role="form"  id="aboutupdate3" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="modal-body">
                                <div class="form-group clearfix">
                                    <label for="inputMaxLength" class="col-md-3">Heading</label>
                                    <div class="col-md-9">
                                        <input type="text" name="title3" id="title3" class="form-control" id="inputMaxLength" value='' placeholder=""  >
                                    </div>
                                </div>                              

                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">Discription</label>
                                    <div class="col-md-9">
                                        <textarea type="text" name="discription3" id="discription3" class="form-control" value='' placeholder="" ></textarea>
                                    </div>
                                </div>                       
                            </div>
                            <div class="modal-footer">
                                
                                <div class="col-md-6">
                                    <input type="text" name="id" id="id" value="3" hidden>
                                    <button type="submit" id="btnSubmit3" name="submit" class="btn btn-custom">Ok</button>
                                    <button type="button" onclick="location.reload();" class="btn btn-custom" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            
            
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body panel-heading-wrapper">
                            <h5 class="pull-left">ACCURATE AND QUICK RESULTS</h5>

                            <button type="button" data-id="3" name="submit" class="btn btn-custom pull-right userbutton4"> Edit info </button>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Heading</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $abt->title4; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Discription</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $abt->discription4; ?></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="usermodel4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modal-label">About</h4>
                        </div>
                        <div style="color:green;padding:10px;font-size:20px" class="successUpdate"> </div>  
                        <form role="form"  id="aboutupdate4" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="modal-body">
                                <div class="form-group clearfix">
                                    <label for="inputMaxLength" class="col-md-3">Heading</label>
                                    <div class="col-md-9">
                                        <input type="text" name="title4" id="title4" class="form-control" id="inputMaxLength" value='' placeholder=""  >
                                    </div>
                                </div>                              

                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">Discription</label>
                                    <div class="col-md-9">
                                        <textarea type="text" name="discription4" id="discription4" class="form-control" value='' placeholder="" ></textarea>
                                    </div>
                                </div>                       
                            </div>
                            <div class="modal-footer">
                                
                                <div class="col-md-6">
                                    <input type="text" name="id" id="id" value="3" hidden>
                                    <button type="submit" id="btnSubmit4" name="submit" class="btn btn-custom">Ok</button>
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
            url: "<?php echo base_url();?>admin/save_about",
            type: "POST",
            dataType: 'json',
            data: {
                'id': $('#id').val(),
                'title': $('#title').val(),
                'discription': $('#discription').val(),
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
            url: 'AboutById?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).done(function (response) {
            // Populate the form fields with the data returned from server
            $('#aboutupdate').find('[name="title"]').val(response.abouts.title).end();
            $('#aboutupdate').find('[name="discription"]').val(response.abouts.discription).end();
            
        });
    });
});
</script>  


<script type="text/javascript">
$(document).ready(function () {
    $(".userbutton2").click(function (e) {
        e.preventDefault(e);
        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');
        $('#aboutupdate2').trigger("reset");
        $('#usermodel2').modal('show');
        $.ajax({
            url: 'AboutById?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).done(function (response) {
            // Populate the form fields with the data returned from server
            $('#aboutupdate2').find('[name="title2"]').val(response.abouts.title2).end();
            $('#aboutupdate2').find('[name="discription2"]').val(response.abouts.discription2).end();
            
        });
    });
});
</script>  


<script>
    $("#btnSubmit2").on("click", function(event) {
        event.preventDefault();
        $.ajax({
            url: "<?php echo base_url();?>admin/save_about2",
            type: "POST",
            dataType: 'json',
            data: {
                'id': $('#id').val(),
                'title2': $('#title2').val(),
                'discription2': $('#discription2').val(),
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
    $(".userbutton3").click(function (e) {
        e.preventDefault(e);
        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');
        $('#aboutupdate3').trigger("reset");
        $('#usermodel3').modal('show');
        $.ajax({
            url: 'AboutById?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).done(function (response) {
            // Populate the form fields with the data returned from server
            $('#aboutupdate3').find('[name="title3"]').val(response.abouts.title3).end();
            $('#aboutupdate3').find('[name="discription3"]').val(response.abouts.discription3).end();
            
        });
    });
});
</script>  


<script>
    $("#btnSubmit3").on("click", function(event) {
        event.preventDefault();
        $.ajax({
            url: "<?php echo base_url();?>admin/save_about3",
            type: "POST",
            dataType: 'json',
            data: {
                'id': $('#id').val(),
                'title3': $('#title3').val(),
                'discription3': $('#discription3').val(),
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
    $(".userbutton4").click(function (e) {
        e.preventDefault(e);
        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');
        $('#aboutupdate4').trigger("reset");
        $('#usermodel4').modal('show');
        $.ajax({
            url: 'AboutById?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).done(function (response) {
            // Populate the form fields with the data returned from server
            $('#aboutupdate4').find('[name="title4"]').val(response.abouts.title4).end();
            $('#aboutupdate4').find('[name="discription4"]').val(response.abouts.discription4).end();
            
        });
    });
});
</script>  


<script>
    $("#btnSubmit4").on("click", function(event) {
        event.preventDefault();
        $.ajax({
            url: "<?php echo base_url();?>admin/save_about4",
            type: "POST",
            dataType: 'json',
            data: {
                'id': $('#id').val(),
                'title4': $('#title4').val(),
                'discription4': $('#discription4').val(),
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





<!--Include footer section-->
<?php $this->load->view('admin/footer'); ?>