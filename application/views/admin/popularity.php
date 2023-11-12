	<?php $this->load->view('admin/header'); ?>
<!--Include header section-->
<div class="wrapper-page">
    <div class="page-title">
        <h1><i class="icon-list"></i> Popularity</h1>
    </div>
    <span class="flashmessage"></span>
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body panel-heading-wrapper">
                            <h5 class="pull-left">POPULARITY OF SATTAMATKA</h5>

                            <button type="button" data-id="3" name="submit" class="btn btn-custom pull-right userbutton1"> Edit info </button>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Heading</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->title1; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Discription</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->discription1; ?></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="usermodel1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modal-label">About</h4>
                        </div>
                        <div style="color:green;padding:10px;font-size:20px" class="successUpdate"> </div>  
                        <form role="form"  id="aboutupdate1" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="modal-body">
                                <div class="form-group clearfix">
                                    <label for="inputMaxLength" class="col-md-3">Heading</label>
                                    <div class="col-md-9">
                                        <input type="text" name="title1" id="title1" class="form-control" id="inputMaxLength" value='' placeholder=""  >
                                    </div>
                                </div>                              

                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">Discription</label>
                                    <div class="col-md-9">
                                        <textarea type="text" name="discription1" id="discription1" class="form-control" value='' placeholder="" ></textarea>
                                    </div>
                                </div>                       
                            </div>
                            <div class="modal-footer">
                                
                                <div class="col-md-6">
                                    <input type="text" name="id" id="id" value="3" hidden>
                                    <button type="submit" id="btnSubmit1" name="submit" class="btn btn-custom">Ok</button>
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
                            <h5 class="pull-left">ONLINE MATKA</h5>

                            <button type="button" data-id="3" name="submit" class="btn btn-custom pull-right userbutton2"> Edit info </button>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Heading</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->title2; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Discription</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->discription2; ?></span>
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
                            <h5 class="pull-left">IMPROVE YOUR KNOWLEDGE IN SATTA MARKET</h5>

                            <button type="button" data-id="3" name="submit" class="btn btn-custom pull-right userbutton3"> Edit info </button>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Heading</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->title3; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Discription</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->discription3; ?></span>
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
                            <h5 class="pull-left">WHAT ARE KALYANMATKA AND ITS TIPS?</h5>

                            <button type="button" data-id="3" name="submit" class="btn btn-custom pull-right userbutton4"> Edit info </button>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Heading</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->title4; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Discription</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->discription4; ?></span>
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


            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body panel-heading-wrapper">
                            <h5 class="pull-left">VISIT OUR WEBSITE FOR SATTAMATKA RESULTS</h5>

                            <button type="button" data-id="3" name="submit" class="btn btn-custom pull-right userbutton5"> Edit info </button>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Heading</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->title5; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Discription</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->discription5; ?></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="usermodel5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modal-label">About</h4>
                        </div>
                        <div style="color:green;padding:10px;font-size:20px" class="successUpdate"> </div>  
                        <form role="form"  id="aboutupdate5" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="modal-body">
                                <div class="form-group clearfix">
                                    <label for="inputMaxLength" class="col-md-3">Heading</label>
                                    <div class="col-md-9">
                                        <input type="text" name="title5" id="title5" class="form-control" id="inputMaxLength" value='' placeholder=""  >
                                    </div>
                                </div>                              

                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">Discription</label>
                                    <div class="col-md-9">
                                        <textarea type="text" name="discription5" id="discription5" class="form-control" value='' placeholder="" ></textarea>
                                    </div>
                                </div>                       
                            </div>
                            <div class="modal-footer">
                                
                                <div class="col-md-6">
                                    <input type="text" name="id" id="id" value="3" hidden>
                                    <button type="submit" id="btnSubmit5" name="submit" class="btn btn-custom">Ok</button>
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
                            <h5 class="pull-left">
WHAT IS SATTAMATKA GAME STRATEGY?</h5>

                            <button type="button" data-id="3" name="submit" class="btn btn-custom pull-right userbutton6"> Edit info </button>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Heading</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->title6; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Discription</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->discription6; ?></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="usermodel6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modal-label">About</h4>
                        </div>
                        <div style="color:green;padding:10px;font-size:20px" class="successUpdate"> </div>  
                        <form role="form"  id="aboutupdate6" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="modal-body">
                                <div class="form-group clearfix">
                                    <label for="inputMaxLength" class="col-md-3">Heading</label>
                                    <div class="col-md-9">
                                        <input type="text" name="title6" id="title6" class="form-control" id="inputMaxLength" value='' placeholder=""  >
                                    </div>
                                </div>                              

                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">Discription</label>
                                    <div class="col-md-9">
                                        <textarea type="text" name="discription6" id="discription6" class="form-control" value='' placeholder="" ></textarea>
                                    </div>
                                </div>                       
                            </div>
                            <div class="modal-footer">
                                
                                <div class="col-md-6">
                                    <input type="text" name="id" id="id" value="3" hidden>
                                    <button type="submit" id="btnSubmit6" name="submit" class="btn btn-custom">Ok</button>
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
                            <h5 class="pull-left">HOW TO USE THIS GAME?</h5>

                            <button type="button" data-id="3" name="submit" class="btn btn-custom pull-right userbutton7"> Edit info </button>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Heading</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->title7; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Discription</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->discription7; ?></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="usermodel7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modal-label">About</h4>
                        </div>
                        <div style="color:green;padding:10px;font-size:20px" class="successUpdate"> </div>  
                        <form role="form"  id="aboutupdate7" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="modal-body">
                                <div class="form-group clearfix">
                                    <label for="inputMaxLength" class="col-md-3">Heading</label>
                                    <div class="col-md-9">
                                        <input type="text" name="title7" id="title7" class="form-control" id="inputMaxLength" value='' placeholder=""  >
                                    </div>
                                </div>                              

                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">Discription</label>
                                    <div class="col-md-9">
                                        <textarea type="text" name="discription7" id="discription7" class="form-control" value='' placeholder="" ></textarea>
                                    </div>
                                </div>                       
                            </div>
                            <div class="modal-footer">
                                
                                <div class="col-md-6">
                                    <input type="text" name="id" id="id" value="3" hidden>
                                    <button type="submit" id="btnSubmit7" name="submit" class="btn btn-custom">Ok</button>
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
                            <h5 class="pull-left">WHAT SHOULD YOU KNOW BEFORE PLAYING SATTAMATKA GAMES?</h5>

                            <button type="button" data-id="3" name="submit" class="btn btn-custom pull-right userbutton8"> Edit info </button>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Heading</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->title8; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Discription</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->discription8; ?></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="usermodel8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modal-label">About</h4>
                        </div>
                        <div style="color:green;padding:10px;font-size:20px" class="successUpdate"> </div>  
                        <form role="form"  id="aboutupdate8" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="modal-body">
                                <div class="form-group clearfix">
                                    <label for="inputMaxLength" class="col-md-3">Heading</label>
                                    <div class="col-md-9">
                                        <input type="text" name="title8" id="title8" class="form-control" id="inputMaxLength" value='' placeholder=""  >
                                    </div>
                                </div>                              

                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">Discription</label>
                                    <div class="col-md-9">
                                        <textarea type="text" name="discription8" id="discription8" class="form-control" value='' placeholder="" ></textarea>
                                    </div>
                                </div>                       
                            </div>
                            <div class="modal-footer">
                                
                                <div class="col-md-6">
                                    <input type="text" name="id" id="id" value="3" hidden>
                                    <button type="submit" id="btnSubmit8" name="submit" class="btn btn-custom">Ok</button>
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
                            <h5 class="pull-left">IS ONLINE SATTA PLAYING IS A GOOD CHOICE?</h5>

                            <button type="button" data-id="3" name="submit" class="btn btn-custom pull-right userbutton9"> Edit info </button>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Heading</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->title9; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Discription</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->discription9; ?></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="usermodel9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modal-label">About</h4>
                        </div>
                        <div style="color:green;padding:10px;font-size:20px" class="successUpdate"> </div>  
                        <form role="form"  id="aboutupdate9" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="modal-body">
                                <div class="form-group clearfix">
                                    <label for="inputMaxLength" class="col-md-3">Heading</label>
                                    <div class="col-md-9">
                                        <input type="text" name="title9" id="title9" class="form-control" id="inputMaxLength" value='' placeholder=""  >
                                    </div>
                                </div>                              

                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">Discription</label>
                                    <div class="col-md-9">
                                        <textarea type="text" name="discription9" id="discription9" class="form-control" value='' placeholder="" ></textarea>
                                    </div>
                                </div>                       
                            </div>
                            <div class="modal-footer">
                                
                                <div class="col-md-6">
                                    <input type="text" name="id" id="id" value="3" hidden>
                                    <button type="submit" id="btnSubmit9" name="submit" class="btn btn-custom">Ok</button>
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
                            <h5 class="pull-left">WHICH IS THE BEST ONLINE WEBSITE TO PLAY SATTAMATKA?</h5>

                            <button type="button" data-id="3" name="submit" class="btn btn-custom pull-right userbutton10"> Edit info </button>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Heading</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->title10; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Discription</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->discription10; ?></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="usermodel10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modal-label">About</h4>
                        </div>
                        <div style="color:green;padding:10px;font-size:20px" class="successUpdate"> </div>  
                        <form role="form"  id="aboutupdate10" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="modal-body">
                                <div class="form-group clearfix">
                                    <label for="inputMaxLength" class="col-md-3">Heading</label>
                                    <div class="col-md-9">
                                        <input type="text" name="title10" id="title10" class="form-control" id="inputMaxLength" value='' placeholder=""  >
                                    </div>
                                </div>                              

                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">Discription</label>
                                    <div class="col-md-9">
                                        <textarea type="text" name="discription10" id="discription10" class="form-control" value='' placeholder="" ></textarea>
                                    </div>
                                </div>                       
                            </div>
                            <div class="modal-footer">
                                
                                <div class="col-md-6">
                                    <input type="text" name="id" id="id" value="3" hidden>
                                    <button type="submit" id="btnSubmit10" name="submit" class="btn btn-custom">Ok</button>
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
                            <h5 class="pull-left">WHAT IS THE MINIMUM DEPOSIT AMOUNT TO PLAY SATTAMATKA ONLINE?</h5>

                            <button type="button" data-id="3" name="submit" class="btn btn-custom pull-right userbutton11"> Edit info </button>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Heading</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->title11; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Discription</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->discription11; ?></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="usermodel11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modal-label">About</h4>
                        </div>
                        <div style="color:green;padding:10px;font-size:20px" class="successUpdate"> </div>  
                        <form role="form"  id="aboutupdate11" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="modal-body">
                                <div class="form-group clearfix">
                                    <label for="inputMaxLength" class="col-md-3">Heading</label>
                                    <div class="col-md-9">
                                        <input type="text" name="title11" id="title11" class="form-control" id="inputMaxLength" value='' placeholder=""  >
                                    </div>
                                </div>                              

                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">Discription</label>
                                    <div class="col-md-9">
                                        <textarea type="text" name="discription11" id="discription11" class="form-control" value='' placeholder="" ></textarea>
                                    </div>
                                </div>                       
                            </div>
                            <div class="modal-footer">
                                
                                <div class="col-md-6">
                                    <input type="text" name="id" id="id" value="3" hidden>
                                    <button type="submit" id="btnSubmit11" name="submit" class="btn btn-custom">Ok</button>
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
                            <h5 class="pull-left">WHERE TO GET THE FASTEST SATTAMATKA RESULTS?</h5>

                            <button type="button" data-id="3" name="submit" class="btn btn-custom pull-right userbutton12"> Edit info </button>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Heading</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->title12; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Discription</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->discription12; ?></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="usermodel12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modal-label">About</h4>
                        </div>
                        <div style="color:green;padding:10px;font-size:20px" class="successUpdate"> </div>  
                        <form role="form"  id="aboutupdate12" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="modal-body">
                                <div class="form-group clearfix">
                                    <label for="inputMaxLength" class="col-md-3">Heading</label>
                                    <div class="col-md-9">
                                        <input type="text" name="title12" id="title12" class="form-control" id="inputMaxLength" value='' placeholder=""  >
                                    </div>
                                </div>                              

                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">Discription</label>
                                    <div class="col-md-9">
                                        <textarea type="text" name="discription12" id="discription12" class="form-control" value='' placeholder="" ></textarea>
                                    </div>
                                </div>                       
                            </div>
                            <div class="modal-footer">
                                
                                <div class="col-md-6">
                                    <input type="text" name="id" id="id" value="3" hidden>
                                    <button type="submit" id="btnSubmit12" name="submit" class="btn btn-custom">Ok</button>
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
                            <h5 class="pull-left">IS THE SATTAMATKA GAME LEGAL IN INDIA?</h5>

                            <button type="button" data-id="3" name="submit" class="btn btn-custom pull-right userbutton13"> Edit info </button>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Heading</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->title13; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="profile-row clearfix">
                                    <div class="col-sm-3">
                                        <span class="profile-cat">Discription</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="profile-info"><?php echo $pplrt->discription13; ?></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="usermodel13" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modal-label">About</h4>
                        </div>
                        <div style="color:green;padding:10px;font-size:20px" class="successUpdate"> </div>  
                        <form role="form"  id="aboutupdate13" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="modal-body">
                                <div class="form-group clearfix">
                                    <label for="inputMaxLength" class="col-md-3">Heading</label>
                                    <div class="col-md-9">
                                        <input type="text" name="title13" id="title13" class="form-control" id="inputMaxLength" value='' placeholder=""  >
                                    </div>
                                </div>                              

                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">Discription</label>
                                    <div class="col-md-9">
                                        <textarea type="text" name="discription13" id="discription13" class="form-control" value='' placeholder="" ></textarea>
                                    </div>
                                </div>                       
                            </div>
                            <div class="modal-footer">
                                
                                <div class="col-md-6">
                                    <input type="text" name="id" id="id" value="3" hidden>
                                    <button type="submit" id="btnSubmit13" name="submit" class="btn btn-custom">Ok</button>
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
    $("#btnSubmit1").on("click", function(event) {
        event.preventDefault();
        $.ajax({
            url: "<?php echo base_url();?>admin/save_popularity1",
            type: "POST",
            dataType: 'json',
            data: {
                'id': $('#id').val(),
                'title1': $('#title1').val(),
                'discription1': $('#discription1').val(),
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
    $(".userbutton1").click(function (e) {
        e.preventDefault(e);
        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');
        $('#aboutupdate1').trigger("reset");
        $('#usermodel1').modal('show');
        $.ajax({
            url: 'popularityById?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).done(function (response) {
            // Populate the form fields with the data returned from server
            $('#aboutupdate1').find('[name="title1"]').val(response.abouts.title1).end();
            $('#aboutupdate1').find('[name="discription1"]').val(response.abouts.discription1).end();
            
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
            url: 'popularityById?id=' + iid,
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
            url: "<?php echo base_url();?>admin/save_popularity2",
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
            url: 'popularityById?id=' + iid,
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
            url: "<?php echo base_url();?>admin/save_popularity3",
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
            url: 'popularityById?id=' + iid,
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
            url: "<?php echo base_url();?>admin/save_popularity4",
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



<script type="text/javascript">
$(document).ready(function () {
    $(".userbutton5").click(function (e) {
        e.preventDefault(e);
        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');
        $('#aboutupdate5').trigger("reset");
        $('#usermodel5').modal('show');
        $.ajax({
            url: 'popularityById?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).done(function (response) {
            // Populate the form fields with the data returned from server
            $('#aboutupdate5').find('[name="title5"]').val(response.abouts.title5).end();
            $('#aboutupdate5').find('[name="discription5"]').val(response.abouts.discription5).end();
            
        });
    });
});
</script>  

<script>
    $("#btnSubmit5").on("click", function(event) {
        event.preventDefault();
        $.ajax({
            url: "<?php echo base_url();?>admin/save_popularity5",
            type: "POST",
            dataType: 'json',
            data: {
                'id': $('#id').val(),
                'title5': $('#title5').val(),
                'discription5': $('#discription5').val(),
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
    $(".userbutton6").click(function (e) {
        e.preventDefault(e);
        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');
        $('#aboutupdate6').trigger("reset");
        $('#usermodel6').modal('show');
        $.ajax({
            url: 'popularityById?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).done(function (response) {
            // Populate the form fields with the data returned from server
            $('#aboutupdate6').find('[name="title6"]').val(response.abouts.title6).end();
            $('#aboutupdate6').find('[name="discription6"]').val(response.abouts.discription6).end();
            
        });
    });
});
</script>  


<script>
    $("#btnSubmit6").on("click", function(event) {
        event.preventDefault();
        $.ajax({
            url: "<?php echo base_url();?>admin/save_popularity6",
            type: "POST",
            dataType: 'json',
            data: {
                'id': $('#id').val(),
                'title6': $('#title6').val(),
                'discription6': $('#discription6').val(),
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
    $(".userbutton7").click(function (e) {
        e.preventDefault(e);
        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');
        $('#aboutupdate7').trigger("reset");
        $('#usermodel7').modal('show');
        $.ajax({
            url: 'popularityById?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).done(function (response) {
            // Populate the form fields with the data returned from server
            $('#aboutupdate7').find('[name="title7"]').val(response.abouts.title7).end();
            $('#aboutupdate7').find('[name="discription7"]').val(response.abouts.discription7).end();
            
        });
    });
});
</script>  


<script>
    $("#btnSubmit7").on("click", function(event) {
        event.preventDefault();
        $.ajax({
            url: "<?php echo base_url();?>admin/save_popularity7",
            type: "POST",
            dataType: 'json',
            data: {
                'id': $('#id').val(),
                'title7': $('#title7').val(),
                'discription7': $('#discription7').val(),
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
    $(".userbutton8").click(function (e) {
        e.preventDefault(e);
        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');
        $('#aboutupdate8').trigger("reset");
        $('#usermodel8').modal('show');
        $.ajax({
            url: 'popularityById?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).done(function (response) {
            // Populate the form fields with the data returned from server
            $('#aboutupdate8').find('[name="title8"]').val(response.abouts.title8).end();
            $('#aboutupdate8').find('[name="discription8"]').val(response.abouts.discription8).end();
            
        });
    });
});
</script>  


<script>
    $("#btnSubmit8").on("click", function(event) {
        event.preventDefault();
        $.ajax({
            url: "<?php echo base_url();?>admin/save_popularity8",
            type: "POST",
            dataType: 'json',
            data: {
                'id': $('#id').val(),
                'title8': $('#title8').val(),
                'discription8': $('#discription8').val(),
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
    $(".userbutton9").click(function (e) {
        e.preventDefault(e);
        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');
        $('#aboutupdate9').trigger("reset");
        $('#usermodel9').modal('show');
        $.ajax({
            url: 'popularityById?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).done(function (response) {
            // Populate the form fields with the data returned from server
            $('#aboutupdate9').find('[name="title9"]').val(response.abouts.title9).end();
            $('#aboutupdate9').find('[name="discription9"]').val(response.abouts.discription9).end();
            
        });
    });
});
</script>  

<script>
    $("#btnSubmit9").on("click", function(event) {
        event.preventDefault();
        $.ajax({
            url: "<?php echo base_url();?>admin/save_popularity9",
            type: "POST",
            dataType: 'json',
            data: {
                'id': $('#id').val(),
                'title9': $('#title9').val(),
                'discription9': $('#discription9').val(),
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
    $(".userbutton10").click(function (e) {
        e.preventDefault(e);
        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');
        $('#aboutupdate10').trigger("reset");
        $('#usermodel10').modal('show');
        $.ajax({
            url: 'popularityById?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).done(function (response) {
            // Populate the form fields with the data returned from server
            $('#aboutupdate10').find('[name="title10"]').val(response.abouts.title10).end();
            $('#aboutupdate10').find('[name="discription10"]').val(response.abouts.discription10).end();
            
        });
    });
});
</script>  


<script>
    $("#btnSubmit10").on("click", function(event) {
        event.preventDefault();
        $.ajax({
            url: "<?php echo base_url();?>admin/save_popularity10",
            type: "POST",
            dataType: 'json',
            data: {
                'id': $('#id').val(),
                'title10': $('#title10').val(),
                'discription10': $('#discription10').val(),
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
    $(".userbutton11").click(function (e) {
        e.preventDefault(e);
        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');
        $('#aboutupdate11').trigger("reset");
        $('#usermodel11').modal('show');
        $.ajax({
            url: 'popularityById?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).done(function (response) {
            // Populate the form fields with the data returned from server
            $('#aboutupdate11').find('[name="title11"]').val(response.abouts.title11).end();
            $('#aboutupdate11').find('[name="discription11"]').val(response.abouts.discription11).end();
            
        });
    });
});
</script>  


<script>
    $("#btnSubmit11").on("click", function(event) {
        event.preventDefault();
        $.ajax({
            url: "<?php echo base_url();?>admin/save_popularity11",
            type: "POST",
            dataType: 'json',
            data: {
                'id': $('#id').val(),
                'title11': $('#title11').val(),
                'discription11': $('#discription11').val(),
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
    $(".userbutton12").click(function (e) {
        e.preventDefault(e);
        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');
        $('#aboutupdate12').trigger("reset");
        $('#usermodel12').modal('show');
        $.ajax({
            url: 'popularityById?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).done(function (response) {
            // Populate the form fields with the data returned from server
            $('#aboutupdate12').find('[name="title12"]').val(response.abouts.title12).end();
            $('#aboutupdate12').find('[name="discription12"]').val(response.abouts.discription12).end();
            
        });
    });
});
</script>  


<script>
    $("#btnSubmit12").on("click", function(event) {
        event.preventDefault();
        $.ajax({
            url: "<?php echo base_url();?>admin/save_popularity12",
            type: "POST",
            dataType: 'json',
            data: {
                'id': $('#id').val(),
                'title12': $('#title12').val(),
                'discription12': $('#discription12').val(),
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
    $(".userbutton13").click(function (e) {
        e.preventDefault(e);
        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');
        $('#aboutupdate13').trigger("reset");
        $('#usermodel13').modal('show');
        $.ajax({
            url: 'popularityById?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).done(function (response) {
            // Populate the form fields with the data returned from server
            $('#aboutupdate13').find('[name="title13"]').val(response.abouts.title13).end();
            $('#aboutupdate13').find('[name="discription13"]').val(response.abouts.discription13).end();
            
        });
    });
});
</script>  


<script>
    $("#btnSubmit13").on("click", function(event) {
        event.preventDefault();
        $.ajax({
            url: "<?php echo base_url();?>admin/save_popularity13",
            type: "POST",
            dataType: 'json',
            data: {
                'id': $('#id').val(),
                'title13': $('#title13').val(),
                'discription13': $('#discription13').val(),
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