<?php $this->load->view('admin/header'); ?>
<div class="wrapper-page">

    <div class="page-title">
        <h1><i class="icon-plus"></i> Whatsapp Image</h1>
    </div>

    <div class="page-content">
        <div class="container-fluid">                   
            <div class="row">
                <div class="col-md-8">
                    <div class="content_wrapper">

                        <div class="table_banner clearfix">
                            <h5 class="table_banner_title">Whatsapp Image</h5>
                        </div>

                        <form role="form" action="save_w_img"  method="post" enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="p2415">
                                

                                <div class="form-group clearfix">
                                    <div class="col-md-9 col-md-offset-3">
                                        <div class="file_prev"></div>
                                        <label for="user_image" class="custom-file-upload">Whatsapp Image</label>
                                    </div>
                                    <div class="col-md-9 col-md-offset-3">
                                        <input type="file" class="" id="user_image" name="user_image" aria-describedby="fileHelp" required>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="col-md-3" for="textareaMaxLength">Status</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="status" name="status" required>
                                                <option value="">
                                                    Select Here...
                                                </option>
                                                <option value="Active">
                                                    ACTIVE
                                                </option>
                                                <option value="Inactive">
                                                    INACTIVE
                                                </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <div class="col-md-9 col-md-offset-3">
                                        <button type="submit" id="btnSubmit" name="submit" class="btn btn-custom">Submit</button>
                                        <span class="flashmessage"></span>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>          
        </div>            
    </div>
</div>  


<?php $this->load->view('admin/footer'); ?>
