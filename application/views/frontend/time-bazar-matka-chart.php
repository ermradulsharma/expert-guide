<?php $this->load->view('frontend/headerInner'); ?>
   
 <div class="container-fluids heading">
 <div class="row">
   <div class="col-lg-12 col-md-12 p0 subhead table-responsive">
    <table class="table table-bordered">
    <div class="text-center"><h2><i class="fa fa-heart" aria-hidden="true"></i>
 TIME BAZAR MATKA CHART  <i class="fa fa-heart" aria-hidden="true"></i>
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
 
        <?php  foreach ($jodi as $value):   ?>
      <tr>  

      <td><?php if ( $value->day == 'MON' ) {
        echo $value->result_no;
      }  ?></td>
      <td><?php if ( $value->day == 'TUE' ) {
        echo $value->result_no;
      }  ?></td>
      <td><?php if ( $value->day == 'WED' ) {
        echo $value->result_no;
      }  ?></td>
      <td><?php if ( $value->day == 'THU' ) {
        echo $value->result_no;
      }  ?></td>
      <td><?php if ( $value->day == 'FRI' ) {
        echo $value->result_no;
      }  ?></td>
      <td><?php if ( $value->day == 'SAT' ) {
        echo $value->result_no;
      }  ?></td>
      <td><?php if ( $value->day == 'SUN' ) {
        echo $value->result_no;
      }  ?></td>
      
    </tr>
      <?php endforeach ?>
</tbody></table>      
       

</div>
</div>
</div>

</div>



<?php $this->load->view('frontend/footerInner'); ?>