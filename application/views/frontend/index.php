<?php $this->load->view('frontend/header'); ?>
    
    <!--SATTA MATKA About-->
    <div class="container-fluids heading1">
        <div class="row">
            <div class="col-lg-12 col-md-12 p0">
                <p class="m0"><?php echo $m_description->description ?></p>
            </div>
        </div> 
    </div>
    <!--End SATTA MATKA About-->

    <!--SATTA MATKA Menu-->
    <div class="container-fluids heading1">
        <div class="row">
            <div class="col-lg-12 col-md-12 p0">
                <p class="m0"><?php echo $b_description->description ?></p>
            </div>
        </div> 
    </div> 
    <!--End SATTA MATKA Menu-->


    <!--LIVE UPDATE-->
    <div class="container-fluids liveUpd">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-center">
                <h1>!! LIVE UPDATE !!</h1>
            </div>
        </div>

        <div class="row resultinner">
            <?php 


            // echo '<pre>'; print_r($value); 
            //   echo '<pre>'; print_r($mrkt); 
                   
            foreach ($mrkt as $value) {

               if(!($value->result_open_start_time=="" && $value->result_open_end_time=="")){

               

                    // echo '<pre>'; print_r($value); 
                   
                    date_default_timezone_set("Asia/Kolkata");

                    $current_time = date("H:i:s");
                

                    $date1 = DateTime::createFromFormat('H:i:s', $current_time);
                    $sot = $value->result_open_start_time;
                    $eot = $value->result_open_end_time;
                    $datesot = DateTime::createFromFormat('H:i:s', $sot);
                    $dateeot = DateTime::createFromFormat('H:i:s', $eot);

                    $sct = $value->result_close_start_time;
                    $ect = $value->result_close_end_time;
                    $datesct = DateTime::createFromFormat('H:i:s', $sct);
                    $dateect = DateTime::createFromFormat('H:i:s', $ect);
                    
                
                  
                   if (($date1 > $datesot && $date1 < $dateeot) || ($date1 > $datesct && $date1 < $dateect) ) {
                      ?>
                          <div class="col-lg-12 col-md-12 bdr">
                            
                         <?php 

                         $id = $value->id;
                         $mrkt_name = $this->Admin_model->ResultValueById($id);
                      
            

                         if ($mrkt_name>'') {
                             $resultopnval =  $mrkt_name->result_open;  
                             $resultval =  $mrkt_name->result_no;                     
                             $resultclsval =  $mrkt_name->result_close;

                             ?>
                              <h3> <?php echo $value->market_name ?><br>
                <?php echo $resultopnval; ?>-<?php echo $resultval; ?>-<?php echo $resultclsval; ?></h3>

                      <?php     }else{ ?>

                        <?php  if ($mrkt_name == "") {   ?>
                        
                        <h3> <?php echo $value->market_name ?></h3><br> <?php echo "<h1>Loading....</h1><br>"; ?>
                   
                        <?php } } ?>


                         </div>
                        <?php
                    }
                  } } ?>
               
                
        </div> 
           
    </div>
   
    <!--End LIVE UPDATE-->


      <!--LIVE UPDATE-->
    

    <div class="container-fluids liveUpd">
         
        <br>
        <div class="row dnld">
            <div class="col-lg-12 col-md-12 text-center">
                <p><?php echo $lives->description ?>
                </p>
            </div>
        </div>  



    </div>
   
    <!--End LIVE UPDATE-->

   
    <!--End LIVE UPDATE-->

    <!--DOWNLOAD FREE APP-->
    <div class="container-fluids download">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-center">
                <h1>DOWNLOAD FREE APP</h1>
            </div>
        </div> 

        <div class="row dnld">
            <div class="col-lg-12 col-md-12 text-center">
                <a class="dlink" rel="noopener" href="https://play.google.com/store/apps/details?id=ppapps.sattamatka" target="_bland">
                    <img src="data:image/png;base64,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" alt="satta matka"  >
                </a>
                <br>
                <a class="alink" href="https://play.google.com/store/apps/details?id=ppapps.sattamatka">
                    <img src="data:image/gif;base64,R0lGODlhKQAJAPsAMQAAAP8AAP8zM/9mZt0AAMwAACIAAHcAAFUAAO4AAIgAAP+ZmQAAAAAAAAAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh+QQJIwAAACwBAAEAJwAHAAAEUxCAIIK8OOstqZXCMAjEFZznhHYr+gHhWAbDIh9d9lrvpNe32CBQQLBSqhZyBRINiwmBNKEw5DCfLDYTnVYBBULhezWZXclXeGyVHBBtjnz+bkcAACH5BAUjAAAALAEAAQAnAAcAAAQ+EIAggrw46y2plcIwCARnnuFYBsOiHmeMsS55pENQIHKP64iEYJhQGHoyIdEIKBAKTKTMCT1KDgirVIa1RgAAOw==" alt="" ><span>&nbsp Free Android App &nbsp</span><img src="data:image/gif;base64,R0lGODlhKQAJAPsAMQAAAP8AAP8zM/9mZt0AAMwAACIAAHcAAFUAAO4AAIgAAP+ZmQAAAAAAAAAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh+QQJIwAAACwBAAEAJwAHAAAEUxCAIIK8OOstqZXCMAjEFZznhHYr+gHhWAbDIh9d9lrvpNe32CBQQLBSqhZyBRINiwmBNKEw5DCfLDYTnVYBBULhezWZXclXeGyVHBBtjnz+bkcAACH5BAUjAAAALAEAAQAnAAcAAAQ+EIAggrw46y2plcIwCARnnuFYBsOiHmeMsS55pENQIHKP64iEYJhQGHoyIdEIKBAKTKTMCT1KDgirVIa1RgAAOw==" alt="">
                </a>
            </div>
        </div> 
    </div> 
    <!--End DOWNLOAD FREE APP-->

   

    <!--LIVE SATTA MATKA RESULT-->
    <div class="container-fluids result">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-center">
                <h1> <span class="heart"> ♥ ♥ ♥</span> LIVE SATTA MATKA RESULT <span class="heart">♥ ♥ ♥</span></h1>
            </div>
        </div>
          <div class="row resultinner">
            <?php  foreach ($mrkt as $value):  ?>
            <div class="col-lg-12 col-md-12 bdr">
                <a href="<?= base_url('user/jodhi?market='.base64_encode($value->id)) ?>" class="btn_chart postionL">Jodi</a>
               
                <h3><?php echo $value->market_name; ?><br>
                <?php $id = $value->id;
                     $result_jodi = $this->Admin_model->ResultValueById($id);
                    if (!empty($result_jodi)) {
                     echo $result_jodi->result_open;
                     }?>-<?php  $id = $value->id;
                     $result_jodi = $this->Admin_model->ResultValueById($id);
                    if (!empty($result_jodi)) {
                     echo $result_jodi->result_no;
                     }?>-<?php  $id = $value->id;
                     $result_jodi = $this->Admin_model->ResultValueById($id);
                    if (!empty($result_jodi)) {
                     echo $result_jodi->result_close;
                     }?></h3>
                <small><?php echo $value->result_display_start_time ?> &nbsp;<?php echo $value->result_display_end_time ?></small>
                <a href="<?= base_url('user/panels?market='.base64_encode($value->id)) ?>" class="btn_chart postionR">Panel</a>
            </div>
           <?php   endforeach ?>
            <div class="col-lg-12 col-md-12 addgame">
                <h3>ADD GAME-MARKET CALL <?php echo $settings->contact; ?></h3>
            </div>
        </div>  
    </div>
   
    <!--End LIVE SATTA MATKA RESULT-->

    <!-- कल्याण अचूक सिंगके जोड़ी-->
    <div class="container-fluids kalyanachuk">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-center">   
                <h1>!!! कल्याण अचूक सिंगके जोड़ी !!!</h1>
            </div>
        </div>

        <div class="row kalyanInner">
            <div class="col-lg-12 col-md-12 cuv_bdr1">
                <img src="<?php $id = "9" ;
               $w_imgValue = $this->Admin_model->getw_imgValue($id);
                  echo base_url(); ?>assets/img/whatsappimg/<?php echo $w_imgValue->image; ?>" >
            </div>
            <div class="col-lg-12 col-md-12">
            <ul>
                <?php foreach ($achuklist as $value) { ?>
                    <li class="cuv_bdr"><?php echo $value->description; ?></li>
               <?php    } ?>
                
                <li class="cuv_bdr">Call <?php echo $settings->contact; ?></li>
                <li class="cuv_bdr">ट्रायल मांगने वाले लोग काल ना करें</li>
            </ul>
            </div>
          
        </div> 
    </div>
    <!--End कल्याण अचूक सिंगके जोड़ी--> 

    <!--SATTA MATKA Title-->
    <div class="container-fluids liveUpd">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-center">
                <h1>DAILY FIXED GUESSING SE </h1>
            </div>
        </div>

         <div class="row dguess">
            <div class="col-lg-12 col-md-12 text-center">
                <p>
                    <?php echo $guessingdata->pass;   ?>
                </p>
            </div>
            <div class="col-lg-12 col-md-12 text-center">
                <hr>
                *** <a title="Satta Matka" hreflang="en" href="https://satta-matka.com">Satta Matka</a> ***
                <h3>
                 <?php 
            if (date("l") == 'Sunday') {
                echo "रविवार (Raviwar)";
            }

            if (date("l") == 'Monday') {
                echo "सोमवार (Somvar)";
            }

            if (date("l") == 'Tuesday') {
                echo "मंगलवार (Mangalwar)";
            }

            if (date("l") == 'Wednesday') {
                echo "बुधवार (Budhwar)";
            }

            if (date("l") == 'Thursday') {
                echo "गुरुवार (Guruwar)";
            }

            if (date("l") == 'Friday') {
                echo "शुक्रवार (Shukrawar)";
            }

            if (date("l") == 'Saturday') {
                echo "शनिवार (Shaniwar, Shanivar)";
            }

             ?>
             <?php echo date('d-m-Y'); ?>
                <br>
                DATE FIX CALL ADMIN SIR
                <br>
                <?php echo $settings->contact; ?> 
                <h3>
            </div>
        </div> 

    </div> 
    <!--End SATTA MATKA Title-->


    <!-- Days Special -->
    <div class="container-fluids guruwar">
        <h3>
            <?php 
            if (date("l") == 'Sunday') {
                echo "रविवार (Raviwar)";
            }

            if (date("l") == 'Monday') {
                echo "सोमवार (Somvar)";
            }

            if (date("l") == 'Tuesday') {
                echo "मंगलवार (Mangalwar)";
            }

            if (date("l") == 'Wednesday') {
                echo "बुधवार (Budhwar)";
            }

            if (date("l") == 'Thursday') {
                echo "गुरुवार (Guruwar)";
            }

            if (date("l") == 'Friday') {
                echo "शुक्रवार (Shukrawar)";
            }

            if (date("l") == 'Saturday') {
                echo "शनिवार (Shaniwar, Shanivar)";
            }

             ?>
             <?php echo date('d-m-Y'); ?>
            SPECIAL KALYAN OFFICE SE LEAK GAME KALYAN AND MAIN RATAN DATE FIX SINGLE OPEN SINGLE JODI WITH PATTI
            <br>
            <font color="red" class="callAdmin">
                CALL VIJAY SIR <img src="data:image/gif;base64,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" alt="satta matka" > 
                [<?php echo $settings->contact; ?>] 
            </font>
            <br>
            ==&gt;&gt; GAME CHARGES ONLY=5500 RS/-ADVANCE ONLY VIP CUSTOMERS &lt;&lt;==
        </h3>
    </div>
    <!--End Days Special -->

    <!--FREE MATKA TIPS-->
    <div class="container-fluids kalyanachuk">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-center">
                <h1>FREE MATKA TIPS</h1>
            </div>
        </div> 
         <div class="row">
            <div class="col-lg-12 col-md-12 tipsinner">
                <h3>31-3-2022<br>
                <span class="marketName">KALYAN</span><br>
                 OPEN TO CLOSE<br>
                [ 2 ] [ 7 ]<br>
                23..28..73..78<br>
                110....160</h3>
            </div>
            <div class="col-lg-12 col-md-12 tipsinner">
                <h3>कल्याण और मैंने बाजार<br>
                    मिलान डे और मिलान नाईट<br>
                    राजधानी डे और राजधानी नाईट<br>
                    टाइम बाजार में अगर अप्पको पासिंग गेम चलिए थो<br>
                    5500/- एडवांस फीस है<br>
                    सिंगल जोड़ी और पट्टी मिलेगा फिक्स 100% कन्फर्म<br>
                    कॉल एडमिन सर<br>
                    <?php echo $settings->contact; ?>
                    
                </h3>
            </div>
            <div class="col-lg-12 col-md-12 tipsinner">
                <h3>31-3-2022<br>
                <span class="marketName">Main Bazar</span><br>
                OPEN TO CLOSE<br>
                [ 3 ] [ 8 ]<br>
                31..36..81..86<br>
                120....170</h3>
            </div>
            <div class="col-lg-12 col-md-12 tipsinner">
                <h3>1-4-2022<br>
                <span class="marketName">MILAN DAY</span><br>
                OPEN TO CLOSE<br>
                [ 9 ] [ 0 ] [ 2 ] [ 3 ]<h3>
            </div>
            <div class="col-lg-12 col-md-12 tipsinner">
                <h3>31-3-2022<br>
                <span class="marketName">MILAN NIGHT</span><br>
                OPEN TO CLOSE<br>
                [ 8 ] [ 9 ] [ 1 ] [ 2 ]</h3>
            </div>
           <div class="col-lg-12 col-md-12 tipsinner">
                <h3>31-3-2022<br>
                <span class="marketName">RAJDHANI NIGHT</span><br>
                OPEN TO CLOSE<br>
                [ 5 ] [ 6 ] [ 8 ] [ 9 ]</h3>
            </div>
           <div class="col-lg-12 col-md-12 tipsinner">
                <h3>31-3-2022<br>
                <span class="marketName">KALYAN NIGHT</span><br>
                OPEN TO CLOSE<br>
                [ 1 ] [ 2 ] [ 4 ] [ 5 ]</h3>
            </div>
           <div class="col-lg-12 col-md-12  tipsinner">
                <h3>1-4-2022<br>
                <span class="marketName">TIME BAZAR</span><br>
                OPEN TO CLOSE<br>
                [ 5 ] [ 6 ] [ 8 ] [ 9 ]</h3>
            </div>
            <hr>
        </div> 
    </div>
   
    <!--End FREE MATKA TIPS-->

    <!--TIME TABLE-->
     <div class="container-fluids tableb">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-center">
                <h1>TIME TABLE</h1>
            </div>
        </div> 

        <div class="row">
        <div class="col-lg-12 col-md-12  p0 table table-responsive">
            <table class="table table-bordered">
                <thead class="th">
                    <tr >
                        <th>MARKET</th>
                        <th>OPEN</th>
                        <th>CLOSE</th>
                    </tr>
                </thead>
                <tbody class="td">
                   
                    <?php  foreach ($charts as $value): ?>
                         <tr>
                        <td><?php  $id = $value->market_id;
                     $mrkt_name = $this->Admin_model->getmarketValue($id);
                    if (!empty($mrkt_name)) {
                     echo $mrkt_name->market_name;
                     } else{
                        print("-");
                     } ?></td>
                        <td><?php echo $value->open; ?></td>
                        <td><?php echo $value->close; ?></td>
                    </tr>
                    <?php endforeach ?>
                
                </tbody>
            </table>
        </div>
    </div> 
    </div>


    
    <!--End TIME TABLE-->

    <!-- NEW USERS REGISTER HERE FREE -->
    <div class="container-fluids register">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-center">
                <h1>
                    <a title="GUESSING FORUM "  href="registration">
                        NEW USERS REGISTER HERE FREE 
                    </a>
                    <img src="data:image/gif;base64,R0lGODlhMgAZANUtAP/Nz/4wOv5rcv/BxP5dZP48Rf+4vP42QP+hpf+vs//8/P/Z2v4QG/4KFv5ocP/z9P/5+f/k5v/w8f+PlP4kL/5LU//W2P+GjP+ytv4WIf4HE/5iav+bn/+Vmv+mq//t7v5UXP4qNf4ZJP/f4P5xeP4fKf5XX//Hyv/29/5CS//T1f5FTv4EEP///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh+QQJMgAtACwAAAAAMgAZAAAGocCWcEgsGo/IpHLJbDqfwwUGSm0CCCxBdXs8VVhgLXc8SIHP4jHVUDi70+pm4uCumwD4vH7Px1uWCggBdYSFhocBSRAcFIeOj4WJRigdJZCXmJJDDxMimJ+QmhIXGaCmjpqBIaeshJpDHoOtra9Ec7OntUVsuJ+6RgMrvaFOACCHcHFNKliEycpNCxsab9BbIw4NYdZcESQMz9xPHwPi5lVBACH5BAUyAC0ALAAAAAAyABkAAAYuwJZwSCwaj8ikcslsOp/QqHRKrVqv2Kx2y+16v+CweEwum8/otHrNbrvf8Hg2CAA7" alt="Satta Matka Registration" >
                </h1>
            </div>
        </div> 
    </div>
    <!-- End NEW USERS REGISTER HERE FREE -->

    <!--DAILY GAMES ZONE-->
    <div class="container-fluids dgz">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-center">
                <h1>DAILY GAMES ZONE</h1>
            </div>
        </div> 
        <div class="row">
            <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game1.gif" alt="sattamatka" >
                <a href="guessing-forum">MATKA MEMBER FORUM AND FAST RESULT</a>
                <img src="assets/frontend/images/Satta_Matka_Daily_Game1.gif" alt="sattamatka">
            </div>
             <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game1.gif" alt="sattamatka" >
                <a href="#">MATKA FREE LIVE RESULT AND SATTA MATKA FAST RESULT </a>
                <img src="assets/frontend/images/Satta_Matka_Daily_Game1.gif" alt="sattamatka">
            </div>
             <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game1.gif" alt="satta matka" > 
                <a href="satta-matka-tips-today-free-samajseva-game">FREE GAME SAMAJSEVA
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game1.gif" alt="sattamatka" >
                </a>
            </div>
             <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game1.gif" alt="satta matka" > 
                <a href="weekly-jodi-panna-all-satta-matka-cards">
                    WEEKLY
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game1.gif" alt="sattamatka" >
                </a>
            </div>
             <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game1.gif" alt="satta matka" > 
                <a href="#">SATTA KING 
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game1.gif" alt="sattamatka" >
                </a>
            </div>
            <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game1.gif" alt="satta matka" > 
                <a href="satta-matka-vip-membership">
                    VIP KE
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game1.gif" alt="sattamatka" >
                </a>
            </div>
            <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game1.gif" alt="satta matka" > 
                <a href="all-satta-matka-and-jodi-patti-records">ALL SATTA MATKA CHARTS.
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game1.gif" alt="sattamatka" >
                </a>
            </div>
            <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game1.gif" alt="satta matka" > 
                <a href="daily-single-and-chart-matka-trick">
                    WEEKLY JODI & PATTI CHART
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game1.gif" alt="sattamatka" >
                </a>
            </div>
            <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game1.gif" alt="satta matka" > 
                <a href="#">
                    SATTA MATKA FREE APP
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game1.gif" alt="sattamatka" >
                </a>
            </div>
            <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game1.gif" alt="satta matka" > 
                <a href="#">SATTA MATKA
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game1.gif" alt="sattamatka" >
                </a>
            </div>
             <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game1.gif" alt="satta matka" > 
                <a href="#">
                    SATTA MATKA BLOGS
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game1.gif" alt="sattamatka" >
                </a>
            </div>
        </div>
    </div>
    <!--End DAILY GAMES ZONE-->

    <!--CHARTS ZONE-->
    <div class="container-fluids dgz">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-center">
                <h1>CHARTS ZONE</h1>
            </div>
        </div> 
        <div class="row">
            <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="satta matka" > 
                <a href="time-bazar-matka-chart">
                    TIME CHART
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="sattamatka" >
                </a>
            </div>
            <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="satta matka" > 
                <a href="kalyan-matka-jodi-chart">
                    KALYAN CHART 
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="sattamatka" >
                </a>
            </div>
            <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="satta matka" > 
                <a href="main-bazar-matka-jodi-chart">
                    MAIN BAZAR CHART
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="sattamatka" >
                </a>
            </div>
            <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="satta matka" > 
                <a href="milan-day-matka-jodi-chart">
                    MILAN DAY CHART  
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="sattamatka" >
                </a>
            </div>
            <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="satta matka" > 
                <a href="milan-night-matka-jodi-chart">
                    MILAN NIGHT CHART
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="sattamatka" >
                </a>
            </div>
            <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="satta matka" > 
                <a href="rajdhani-day-matka-jodi-chart">
                    RAJDHANI DAY CHART 
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="sattamatka" >
                </a>
            </div>
            <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="satta matka" > 
                <a href="rajdhani-night-matka-jodi-chart">
                    RAJDHANI NIGHT CHART 
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="sattamatka" >
                </a>
            </div>
            <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="satta matka" > 
                <a href="aishwarya-matka-jodi-chart">
                    AISHWARYA CHART
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="sattamatka" >
                </a>
            </div>
            <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="satta matka" > 
                <a href="bhendibazar-matka-jodi-chart">
                    BHENDI BAZAR CHART 
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="sattamatka" >
                </a>
            </div>
             <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="satta matka" > 
                <a href="satyam-matka-jodi-chart">
                    SATYAM CHART  
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="sattamatka" >
                </a>
            </div>
             <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="satta matka" > 
                <a href="morning-day">
                    MORNING DAY CHART
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="sattamatka" >
                </a>
            </div>
        </div> 
    </div>
    <!--End CHARTS ZONE-->

    <!--FREE MATKA PANEL CHARTS-->
    <div class="container-fluids dgz">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-center">
                <h1>FREE MATKA PANEL CHARTS</h1>
            </div>
        </div> 
         <div class="row">
            <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="satta matka"> 
                <a href="time-bazar-matka-panel-chart-pana-chart-patti-chart">
                    TIME PANEL CHART 
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="sattamatka" >
                </a>
            </div>
            <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="satta matka"> 
                <a href="kalyan-matka-panel-chart-pana-chart-patti-chart">
                    KALYAN PANEL CHART 
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="sattamatka" >
                </a>
            </div>
             <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="satta matka"> 
                <a href="main-bazar-matka-panel-chart">
                    MAIN BAZAR PANEL CHART
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="sattamatka" >
                </a>
            </div>
            <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="satta matka"> 
                <a href="milan-day-matka-panel-chart-pana-chart-patti-chart">
                    MILAN DAY PANEL CHART 
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="sattamatka" >
                </a>
            </div>
             <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="satta matka"> 
                <a href="milan-night-matka-panel-chart-pana-chart-patti-chart">
                    MILAN NIGHT PANEL CHART
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="sattamatka" >
                </a>
            </div>
             <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="satta matka"> 
                <a href="rajdhani-day-matka-panel-chart-pana-chart-patti-chart">
                    RAJDHANI DAY PANEL CHART 
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="sattamatka" >
                </a>
            </div>
            <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="satta matka"> 
                <a href="rajdhani-night-matka-panel-chart-pana-chart-patti-chart">
                    RAJDHANI NIGHT PANEL CHART 
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="sattamatka" >
                </a>
            </div>
            <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="satta matka"> 
                <a href="aishwarya-matka-panel-chart-pana-chart-patti-chart">
                    AISHWARYA PANEL CHART
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="sattamatka" >
                </a>
            </div>
             <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="satta matka"> 
                <a href="bhendibazar-matka-panel-chart-pana-chart-patti-chart">
                    BHENDI BAZAR PANEL CHART 
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="sattamatka" >
                </a>
            </div>
            <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="satta matka"> 
                <a href="satyam-matka-panel-chart-pana-chart-patti-chart">
                    SATYAM PANEL CHART  
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="sattamatka" >
                </a>
            </div>
             <div class="col-lg-12 col-md-12 bck_clr_rad">
                <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="satta matka" > 
                <a href="morning-day-panel-chart">
                    MORNING DAY PANEL CHART
                    <img src="assets/frontend/images/Satta_Matka_Daily_Game2.gif" alt="sattamatka">
                </a>
            </div>
        </div> 
    </div>
    <!--End FREE MATKA PANEL CHARTS-->

    <!--FAQ-->
    <div class="container-fluids faq">
        <div class="row">  
            <?php foreach ($faq as $value): ?>

                <div class="col-lg-12 col-md-12 text-center">
                <h4><?php echo $value->question; ?></h4>
                <p class="p0"><?php echo $value->answer; ?></p>
                <hr>
                </div>

            <?php endforeach ?>
            
        </div> 
    </div>
    <!--End FAQ-->

    <!--Popularity-->
    <div class="container-fluids faq">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-center">
                <br>
                <h4><?php echo $pplrt->title1; ?></h4>
                <p class="p0"><?php echo $pplrt->discription1; ?></p>
                <hr>
            </div>
              <div class="col-lg-12 col-md-12 text-center">
                <h4><?php echo $pplrt->title2; ?></h4>
                <p class="p0"><?php echo $pplrt->discription2; ?></p>
                <hr>
            </div>
              <div class="col-lg-12 col-md-12 text-center">
                <h4><?php echo $pplrt->title3; ?></h4>
                <p class="p0"><?php echo $pplrt->discription3; ?></p>
                 
                <hr>
            </div>
              <div class="col-lg-12 col-md-12 text-center">
                <h4><?php echo $pplrt->title4; ?></h4>
                 <p class="p0"><?php echo $pplrt->discription4; ?></p>
                <hr>
            </div>
              <div class="col-lg-12 col-md-12 text-center">
                <h4><?php echo $pplrt->title5; ?></h4>
                <p class="p0"><?php echo $pplrt->discription5; ?></p>
                <hr>
            </div>
              <div class="col-lg-12 col-md-12 text-center">
                <h4><?php echo $pplrt->title6; ?></h4>
                <p class="p0"><?php echo $pplrt->discription6; ?></p>
                <hr>
            </div>
              <div class="col-lg-12 col-md-12 text-center">
                <h4><?php echo $pplrt->title7; ?></h4>
                <p class="p0"><?php echo $pplrt->discription7; ?></p>
                <hr>
            </div>
              <div class="col-lg-12 col-md-12 text-center">
                <h4><?php echo $pplrt->title8; ?></h4>
                <p class="p0"><?php echo $pplrt->discription8; ?></p>
                <hr>
            </div>
              <div class="col-lg-12 col-md-12 text-center">
                <h4><?php echo $pplrt->title9; ?></h4>
                <p class="p0"><?php echo $pplrt->discription9; ?></p>
                <hr>
            </div>
              <div class="col-lg-12 col-md-12 text-center">
                <h4><?php echo $pplrt->title10; ?></h4>
                <p class="p0"><?php echo $pplrt->discription10; ?></p>
                <hr>
            </div>
              <div class="col-lg-12 col-md-12 text-center">
                <h4><?php echo $pplrt->title11; ?></h4>
                <p class="p0"><?php echo $pplrt->discription11; ?></p>
                <hr>
            </div>
              <div class="col-lg-12 col-md-12 text-center">
                <h4><?php echo $pplrt->title12; ?></h4>
                <p class="p0"><?php echo $pplrt->discription12; ?></p>
                <hr>
            </div>
              <div class="col-lg-12 col-md-12 text-center">
                <h4><?php echo $pplrt->title13; ?></h4>
                <p class="p0"><?php echo $pplrt->discription13; ?></p>

            </div>
        </div> 
    </div>

    <!--About-->
    <div class="container-fluids faq">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-center">
                <h4><?php echo $abt->title; ?></h4>
                <p class="p0"><?php echo $abt->discription; ?></p>
                <hr>
            </div>
            <div class="col-lg-12 col-md-12 text-center">
                <h4><?php echo $abt->title2; ?></h4>
                <p class="p0"><?php echo $abt->discription2; ?></p>
                <hr>
            </div>
            <div class="col-lg-12 col-md-12 text-center">
                <h4><?php echo $abt->title3; ?></h4>
                <p class="p0"><?php echo $abt->discription3; ?></p>
                <hr>
            </div>
             <div class="col-lg-12 col-md-12 text-center">
                <h4><?php echo $abt->title4; ?></h4>
                <p class="p0"><?php echo $abt->discription4; ?></p>
                
            </div>
            
        </div> 
    </div>
    <!--End Popularity-->

    <!--Wikipedia-->
    <div class="container-fluids wiki">
        <div class="row outerbdr">
            <div class="col-lg-12 col-md-12 text-center p0">
                <p class="m0"><?php echo $wikivalue->description; ?></p>
                <a href="https://satta-matka.com/satta-matka-gambling-wikipedia-information/">Satta Matka Wiki</a>
            </div>
        </div> 
    </div>
    <!--End Wikipedia-->

    <!-- Days Special-->
    <div class="container-fluids guruwar">
        <h3>
            <?php 
            if (date("l") == 'Sunday') {
                echo "रविवार (Raviwar)";
            }

            if (date("l") == 'Monday') {
                echo "सोमवार (Somvar)";
            }

            if (date("l") == 'Tuesday') {
                echo "मंगलवार (Mangalwar)";
            }

            if (date("l") == 'Wednesday') {
                echo "बुधवार (Budhwar)";
            }

            if (date("l") == 'Thursday') {
                echo "गुरुवार (Guruwar)";
            }

            if (date("l") == 'Friday') {
                echo "शुक्रवार (Shukrawar)";
            }

            if (date("l") == 'Saturday') {
                echo "शनिवार (Shaniwar, Shanivar)";
            }

             ?>
             <?php echo date('d-m-Y'); ?> SPECIAL KALYAN OFFICE SE LEAK GAME KALYAN AND MAIN RATAN DATE FIX SINGLE OPEN SINGLE JODI WITH PATTI
            <br>
            <font color="red">
                CALL VIJAY SIR <img src="data:image/gif;base64,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" alt="satta matka"> 
                [<?php echo $settings->contact; ?>] 
            </font>
            <br>
            ==&gt;&gt; GAME CHARGES ONLY=5500 RS/-ADVANCE ONLY VIP CUSTOMERS &lt;&lt;==
        </h3>
    </div>
    <!-- End Days Special-->

    <!--Marquee  DISCLAIMER-->
    <div class="container-fluids desclaimer">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <marquee><h1><?php echo $desclaimers->desclaimer ?></h1>
                </marquee>
            </div>
        </div>
    </div>
    <!--End Marquee  DISCLAIMER-->
<?php $this->load->view('frontend/footer'); ?>


<style>
.bdr h1{
    color: red;
}

</style>