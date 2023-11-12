<?php $this->load->view('admin/header'); ?>
        <div class="wrapper-page">

            <div class="page-title">
                <h1><i class="icon-list"></i> Packeges</h1>
            </div>

            <div class="page-content">
                <div class="container-fluid">                   
                <div class="row">
                    <div class="col-md-12">
                        <div class="content_wrapper">

                            <div class="table_banner clearfix">
                                <h5 class="table_banner_title">Packeges</h5>
                                
                                    <div class="buy_button">
            							<button id="subcategory" class="btn btn-custom pull-right">
                                            Add Packege
                                        </button>
                                    </div>
                            </div> 

                            <div class="table_body text-left">
                            <table id="example" class="table table-condensed responsive table_custom" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>SR No</th>
                                            <th>Packege Name</th>
                                            <th>Cost</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?PHP $sr=1; 
                                        foreach($pkg_list as $value): ?>
                                        <tr>
                                            <td><?php echo $sr; ?></td>
                                            <td><?php $id = $value->packege_id;
                                        $pkg_name = $this->Admin_model->getSubscriptionbyid($id);
                                           if (!empty($pkg_name)) {
                                             echo $pkg_name->packege_name;
                                             } else{
                                                print("Select Another Packege Name");
                                             } ?></td>
                                            <td><?php echo $value->cost; ?></td>
                                            <td><?php echo $value->status; ?></td>
                                            <td class="action-buttons">
                                                <button type="button" class="subcategory" data-id="<?php echo $value->id; ?>" name="submit" class="catbutton">
                                                    <i class="icon-pencil"></i>
                                                </button>   
                                                 <a onclick="return confirm('Are you sure to delete this data?')" href="packegelist_delet?id=<?php echo $value->id; ?>">
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
        <span class="flashmessage"></span>
        </div>

		<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="subcategoryform" role="dialog" style="display: none;" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header modal-primary">
                        <button aria-label="Close" class="close" data-dismiss="modal" onclick="location.reload()" type="button"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modal-label">Packege</h4>
                    </div>

                    <form enctype="multipart/form-data" action="saveSubscription"  method="post" name="addSubcription" role="form" id="addSubcription" accept-charset="utf-8">
                        <div class="modal-body">

                            <div class="form-group clearfix">
                                <label class="col-md-3" for="textareaMaxLength">Packege Name</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="packege_id" name="packege_id"  style="width: 100%">
                                        <option value="">Select Package</option>
                                         <?php foreach($pkg as $value): ?>
                                                <option value="<?php echo $value->id; ?>"><?php echo $value->packege_name; ?></option>
                                            <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group clearfix">
                                <label class="col-md-3" for="inputMaxLength">Add Cost</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="cost" name="cost" placeholder="Add Cost"  type="number" value=''>
                                </div>
                            </div>

                            <div class="form-group clearfix">
                                <label class="col-md-3" for="textareaMaxLength">Status</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="status" name="status"  style="width: 100%">
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

                        </div>

                        <div class="modal-footer">
                            <input name="id" type="hidden" value="">
                            <button class="btn btn-custom" id="addSubcription" name="submit" type="submit">Save</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        
<script type="text/javascript">
        $(document).ready(function () {
            $("#subcategory").click(function (e) {
                e.preventDefault(e);
                $('#subcategoryform').modal('show');
            });
        });
</script>

<script type="text/javascript">
$(document).ready(function () {
    $(".subcategory").click(function (e) {
        e.preventDefault(e);
        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');
        $('#addSubcription').trigger("reset");
        $('#subcategoryform').modal('show');
        $.ajax({
            url: '<?php echo base_url()?>admin/PackegeById?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
            
        }).done(function (response) {
            // Populate the form fields with the data returned from server
			$('#addSubcription').find('[name="id"]').val(response.packege.id).end();
            $('#addSubcription').find('[name="packege_id"]').val(response.packege.packege_id).end();
            $('#addSubcription').find('[name="cost"]').val(response.packege.cost).end();
            $('#addSubcription').find('[name="status"]').val(response.packege.status).end();
		});
    });
});
</script>

<!--Include footer section-->
<?php $this->load->view('admin/footer'); ?>