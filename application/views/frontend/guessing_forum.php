
<?php $this->load->view('frontend/headerInner'); ?>

<div class="container-fluids heading">
	<div class="row">  
		<div class="col-md-12">
		    <div class="toptblheading">
		    	<h2>
		    		<i class="fa fa-heart" aria-hidden="true"></i> Post Your Guess <i class="fa fa-heart" aria-hidden="true"></i>
				</h2>
			</div>
		</div> 
	</div>	

    <div class="row">   
    		<div class="col-lg-12 col-md-12">
	    		<form action="<?php echo base_url()?>frontend/save_forum " method="post" id="forumsave">
					  <div class="form-group">
					    <textarea type="text" name="comment" id="comment" class="form-control txtarea" placeholder="Enter Comment"></textarea>
					  </div>
					  <div class="row">
					  		<div class="col-md-3"></div>
					  		<div class="col-md-6">
					  			<input type="text" name="user_id" id="user_id" value="<?php echo $this->session->userdata('user_login_id')?>" hidden>
					  			<input type="text" name="full_name" id="full_name" value="<?php echo $this->session->userdata('name')?>" hidden>
								<button type="submit" class="btn btn-success btn-cust">Submit</button>
								<br>
					  		</div>
					  		<div class="col-md-3"></div>
					  </div>
					</form>
	    	</div>	
    </div>
</div>

	<?php foreach ($comments as  $value): ?>
      <div class="container-fluids kalyanachuk">
        <div class="row">
            <div class="col-lg-6 col-md-6 text-left ">
                <h5 class="clr"><?php  echo $value->full_name; ?></h5>
            </div>
            <div class="col-lg-6 col-md-6 text-right">
                <h5><?php echo $value->date; ?></h5>
            </div>
        </div> 
         <div class="row">
           
            <div class="col-lg-12 col-md-12 tipsinner">
                <p  ><?php  echo $value->comment; ?> </p>
            </div>
         </div>
             <div class="row">
            <div class="col-lg-4 col-md-4 ">
            <button type="submit" class="btn btn-success btn-cust">QUOTE</button>
            </div>
            <div class="col-lg-4 col-md-4 ">
            <button type="submit" class="btn btn-success btn-cust">TOP</button>
             </div>
            <div class="col-lg-4 col-md-4 ">
            <button type="submit" class="btn btn-success btn-cust">DOWN</button>
             </div>
            </div>
          
        </div>
    <?php endforeach ?>



   

<style type="text/css">

	.kalyanachuk h5{
		color: #ffc107;
	}
	.txtarea{
		    display: block;
		    margin: 10px auto;
		    width: 95%;
		    border: 2px solid #00cd00;
		    height: 300px !important;
	}

	.btn-cust{
		    display: block;
		    margin: 0 auto;
		    width: 95%;
		    border: 2px solid #1e7e34;
		    font-size: 17px;
		}

</style>

<?php $this->load->view('frontend/footerInner'); ?>