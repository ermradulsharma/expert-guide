<?php $this->load->view('frontend/headerInner'); ?>
 
 <div class="container-fluids heading">
 <div class="row">
   <div class="col-lg-12 col-md-12 p0 subhead table-responsive">
    <table class="table table-bordered">
    <div class="text-center"><h2><i class="fa fa-heart" aria-hidden="true"></i>
  MILAN DAY PENAL CHART  <i class="fa fa-heart" aria-hidden="true"></i>
</h2></div>  
      <tbody>
 <thead>
        <th>DATE</th>
        <th colspan="3">MON</th>
        <th colspan="3">TUE</th>
        <th colspan="3">WED</th>
        <th colspan="3">THU</th>
        <th colspan="3">FRI</th>
        <th colspan="3">SAT</th>
        <th colspan="3">SUN</th>
    </thead>
   
      

      <?php 
      foreach ($jodi2 as $value){ 
      
      ?>
     <tr> 
      <td id="td-style"><?php if(isset($value['date'])) echo $value['date'];?></td>
      <td id="td-style"><?php if(isset($value['monvalue'])) echo chunk_split($value['monvalue']->result_open, 1, "<br>"); else echo "*<br>*<br>*";?></td>
      <td><?php if(isset($value['monvalue'])) echo $value['monvalue']->result_no; else echo "**";?></td>
      <td id="td-style"><?php if(isset($value['monvalue'])) echo chunk_split($value['monvalue']->result_close, 1, "<br>"); else echo "*<br>*<br>*";?></td>
     
      <td id="td-style"><?php if(isset($value['tuevalue'])) echo chunk_split($value['tuevalue']->result_open, 1, "<br>"); else echo "*<br>*<br>*";?></td>
      <td><?php if(isset($value['tuevalue'])) echo $value['tuevalue']->result_no;else echo "**";?></td>
      <td id="td-style"><?php if(isset($value['tuevalue'])) echo chunk_split($value['tuevalue']->result_close, 1, "<br>");else echo "*<br>*<br>*";?></td>
     
      <td id="td-style"><?php if(isset($value['wedvalue'])) echo chunk_split($value['wedvalue']->result_open, 1, "<br>");else echo "*<br>*<br>*";?></td>
      <td><?php if(isset($value['wedvalue'])) echo $value['wedvalue']->result_no;else echo "**";?></td>
      <td id="td-style"><?php if(isset($value['wedvalue'])) echo chunk_split($value['wedvalue']->result_close, 1, "<br>");else echo "*<br>*<br>*";?></td>
     
      <td id="td-style"><?php if(isset($value['thuvalue'])) echo chunk_split($value['thuvalue']->result_open, 1, "<br>");else echo "*<br>*<br>*";?></td>
      <td><?php if(isset($value['thuvalue'])) echo $value['thuvalue']->result_no;else echo "**";?></td>
      <td id="td-style"><?php if(isset($value['thuvalue'])) echo chunk_split($value['thuvalue']->result_close, 1, "<br>");else echo "*<br>*<br>*";?></td>
      
      <td id="td-style"><?php if(isset($value['frivalue'])) echo chunk_split($value['frivalue']->result_open, 1, "<br>");else echo "*<br>*<br>*";?></td>
      <td><?php if(isset($value['frivalue'])) echo $value['frivalue']->result_no;else echo "**";?></td>
      <td id="td-style"><?php if(isset($value['frivalue'])) echo chunk_split($value['frivalue']->result_close, 1, "<br>");else echo "*<br>*<br>*";?></td>
     
      <td id="td-style"><?php if(isset($value['satvalue'])) echo chunk_split($value['satvalue']->result_open, 1, "<br>");else echo "*<br>*<br>*";?></td>
      <td><?php if(isset($value['satvalue'])) echo $value['satvalue']->result_no;else echo "**";?></td>
      <td id="td-style"><?php if(isset($value['satvalue'])) echo chunk_split($value['satvalue']->result_close, 1, "<br>");else echo "*<br>*<br>*";?></td>
      
      <td id="td-style"><?php if(isset($value['sunvalue'])) echo chunk_split($value['sunvalue']->result_open, 1, "<br>");else echo "*<br>*<br>*";?></td>
      <td><?php if(isset($value['sunvalue'])) echo $value['sunvalue']->result_no;else echo "**";?></td>
      <td id="td-style"><?php if(isset($value['sunvalue'])) echo chunk_split($value['sunvalue']->result_close, 1, "<br>");else echo "*<br>*<br>*";?></td>
      
      </tr>
      <?php
      
    }?> 
      
      </tbody>
    </table>
   </div>
 </div>
</div>
   


  <?php $this->load->view('frontend/footerInner'); ?>

<style>
#cssTable td 
{
    text-align: center; 
    vertical-align: middle;
}
#td-style 
{
    font-size: 18px;
}
</style>
    