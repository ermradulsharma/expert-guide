<?php $this->load->view('admin/header'); ?>
<!--Include header section-->
<div class="wrapper-page">

    <div class="page-title">
        <h1><i class="icon-list"></i> FAQS</h1>
    </div>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="content_wrapper">

                        <div class="table_banner clearfix">
                            <h5 class="table_banner_title"> FAQS</h5>
                            <div class="buy_button">
                                <button type="button" id="category" class="btn btn-custom pull-right" data-toggle="modal" data-target="#settingfrom">
                                    Add Commisons 
                                </button>
                            </div>
                        </div>

                        <div class="table_body text-left">
                            <table id="example" class="table table-condensed responsive table_custom" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>SR No</th>
                                        <th>Cut Off</th>
                                        <th>Commisons</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><?= @$commisions['cut_off'] ?></td>
                                         <td><?= @$commisions['commisions'] ?></td>
                                        <td class="action-buttons">
                                            <button type="button" name="submit" class="userbutton" data-id="U136" onclick="edit_commsions('<?=  @$commisions['cut_off']  ?>' , '<?= @$commisions['commisions'] ?>')">
                                                    <i class="icon-pencil"></i>
                                                </button>
                                         
                                        </td>
                                    </tr>
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
<!--Category validation modal-->
<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="settingfrom" role="dialog" style="display: none;" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header modal-primary">
                <button aria-label="Close" class="close" data-dismiss="modal" onclick="location.reload()" type="button"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-label">Settings</h4>
            </div>

            <div class="successUpdate" style="color:green;padding:10px;font-size:20px"></div>
            <form enctype="multipart/form-data" id="catmodal" action="<?= base_url('admin/commission') ?>" method="post" name="catmodal" role="form" accept-charset="utf-8">

                <div class="modal-body">

                    <div class="form-group clearfix">
                        <label class="col-md-3" for="inputMaxLength">Cut Off</label>
                        <div class="col-md-9">
                            <input class="form-control" id="cutoff" name="cutoff" placeholder="Enter cutoff" required type="number" value=''>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-3" for="inputMaxLength">Commions</label>
                        <div class="col-md-9">
                        <input class="form-control" id="commisons" name="commisons" placeholder="Enter Commisons" required type="number" value=''>

                        </div>
                    </div>

                  

                </div>

                <div class="setmessage"></div>

                <div class="modal-footer">
                    <input id="id" name="id" type="hidden" value="">
                    <button class="btn btn-custom" onclick="form_submit()"  name="submit" type="submit">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>


<script>
    function edit_commsions(cut_off ,comm){
       $('#cutoff').val(cut_off);
       $('#commisons').val(comm); 
       
       $("#category").click();

    }
    
function form_submit(){
    setTimeout(()=>{
        window.location.reload();
    },3000)
}
</script>



<!--Include footer section-->
<?php $this->load->view('admin/footer'); ?>