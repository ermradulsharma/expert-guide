<?php $this->load->view('admin/header'); ?>
<div class="wrapper-page">

    <div class="page-title">
        <h1><i class="fa fa-cog" aria-hidden="true"></i> Configuration</h1>
    </div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="panel no-border">
                        <div class="content_wrapper">
                            <div class="table_banner clearfix">
                                <div class="table_banner_title">
                                    <h5>Configuration</h5>
                                </div>
                            </div>
                            <div class="table_body">
                                <form action="addSettings" id="fileUploadForm" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                                    <div class="form-group clearfix">
                                        <label for="" class="col-md-3">Upload site logo</label>
                                        <div class="col-md-9">
                                            <div class="file_prev inb">
                                                <?php if($settingsvalue->sitelogo){ ?>
                                                <img src="<?php echo base_url(); ?>assets/img/<?php echo $settingsvalue->sitelogo; ?>" height="100" width="167">
                                                <?php } else { ?>
                                                <img src="<?php echo base_url(); ?>assets/img/ci-logo.png" height="100" width="167">
                                                <?php } ?>
                                            </div>
                                            <label for="img_url" class="custom-file-upload"><i class="fa fa-camera" aria-hidden="true"></i> Upload Logo</label>
                                            <input type="file" value="" class="" id="img_url" name="img_url" aria-describedby="fileHelp">
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label for="title" class="col-md-3">Title</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="title" value="<?php echo $settingsvalue->sitetitle; ?>" id="title" placeholder="Title...">
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label for="meta_data" class="col-md-3">Meta Data</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" id="meta_data" value="<?php echo $settingsvalue->meta_data; ?>" name="meta_data" rows="6"><?php echo $settingsvalue->meta_data; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label for="description" class="col-md-3">Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" id="description" value="<?php echo $settingsvalue->description; ?>" name="description" rows="6"><?php echo $settingsvalue->description; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label for="meta_key" class="col-md-3">Meta Keyword</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" id="meta_key" value="<?php echo $settingsvalue->meta_key; ?>" name="meta_key" rows="6"><?php echo $settingsvalue->meta_key; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label for="contact" class="col-md-3">Contact</label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" name="contact" value="<?php echo $settingsvalue->contact; ?>" id="contact" placeholder="contact...">
                                        </div>
                                    </div>
                                    
                                   
                                    <div class="form-group clearfix">
                                        <label for="email" class="col-md-3">System Email</label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control" name="email" id="email" value="<?php echo $settingsvalue->system_email; ?>" placeholder="email...">
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label for="facebook" class="col-md-3">Facebook Link</label>
                                        <div class="col-md-9">
                                            <input type="url" class="form-control" name="facebook" id="facebook" value="<?php echo $settingsvalue->facebook; ?>" placeholder="Facebook Link">
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label for="twitter" class="col-md-3">Twitter Link</label>
                                        <div class="col-md-9">
                                            <input type="url" class="form-control" name="twitter" id="twitter" value="<?php echo $settingsvalue->twitter; ?>" placeholder="Twitter Link">
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label for="g_plus" class="col-md-3">G-Plus Link</label>
                                        <div class="col-md-9">
                                            <input type="url" class="form-control" name="g_plus" id="g_plus" value="<?php echo $settingsvalue->g_plus; ?>" placeholder="G-Plus Link">
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label for="youtube" class="col-md-3">Youtube Link</label>
                                        <div class="col-md-9">
                                            <input type="url" class="form-control" name="youtube" id="youtube" value="<?php echo $settingsvalue->youtube; ?>" placeholder="Youtube Link">
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label for="address" class="col-md-3">Address</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="address" id="address" value="<?php echo $settingsvalue->address; ?>" placeholder="address...">
                                        </div>
                                    </div>
                                     <div class="form-group clearfix">
                                        <label for="copy_right" class="col-md-3">Copy Right</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="copy_right" id="copy_right" value="<?php echo $settingsvalue->copy_right; ?>" placeholder="Copy Right">
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <div class="col-md-9 col-md-offset-3">
                                            <input type="hidden" name="id" value="<?php echo $settingsvalue->id; ?>" />
                                            <button type="submit" name="submit" id="btnSubmit" class="btn btn-custom">Submit</button>
                                            <span class="flashmessage"><?php echo $this->session->flashdata('feedback'); ?></span>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('admin/footer'); ?>