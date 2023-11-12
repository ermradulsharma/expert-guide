<?php $this->load->view('frontend/headerInner'); ?>
  
<!--SATTA MATKA Heading-->
<div class="container-fluids heading">
 <div class="row">
   <div class="col-lg-12 col-md-12 p0 subhead table-responsive">
    <table class="table table-bordered">
    <div class="text-center"><h2><i class="fa fa-heart" aria-hidden="true"></i>
 RAJDHANI DAY CHART <i class="fa fa-heart" aria-hidden="true"></i>
</h2></div>  
     <tbody>

    <thead>
        <th>MON</th>
        <th>TUE</th>
        <th>WED</th>
        <th>THU</th>
        <th>FRI</th>
        <th>SAT</th>
        <th>SUN</th>
    </thead>
   
      

      <?php 
      foreach ($jodi2 as $value){ 
      
      ?>
     <tr> 
      <td><?php echo $value['monvalue'];?></td>
      <td><?php echo $value['tuevalue'];?></td>
      <td><?php echo $value['wedvalue'];?></td>
      <td><?php echo $value['thuvalue'];?></td>
      <td><?php echo $value['frivalue'];?></td>
      <td><?php echo $value['satvalue'];?></td>
      <td><?php echo $value['sunvalue'];?></td>
      
      </tr>
      <?php
      
    }?> 
      
    
 
      </tbody>
    </table>
   </div>
 </div>
</div>
   


  <?php $this->load->view('frontend/footerInner'); ?>
   