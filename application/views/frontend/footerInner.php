<?php $settings = $this->Admin_model->getSettingsValue(); ?>
<div class="goToTop"> <a href="#chart_Top"><button><i class="fa fa-arrow-up" aria-hidden="true"></i>
 Go to Top <i class="fa fa-arrow-up" aria-hidden="true"></i>
</button></a></div>
<div class="dateFix" id="chart_Bottom"> <div class="matkaFixKalyan">
<div class="container-fluids fifthBlock">
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
            <br>KALYAN AUR MUMBAI<br>DATE FIX SINGLE JODI PATTI<br><i class="fa fa-phone" aria-hidden="true"></i> CALL <?php echo $settings->contact; ?> <br><i class="fa fa-angle-double-right" aria-hidden="true"></i> ADVANCE ONLY= 5500 /- <i class="fa fa-angle-double-left" aria-hidden="true"></i>
            
        </h3>
    </div>


<div class="container-fluids footer1">
    <div class="row p15">
            <div class="col-lg-3 col-md-3 block">
                <h3>CONTACT</h3>
                <hr>

                <ul>
                    <li><h1><i class="fa fa-mobile-phone"></i><?php echo $settings->contact; ?></h1></li>
                    <li class="mtop"><a href="<?php echo $settings->facebook; ?>" target="_blank" aria-label="facebook" class="rtpadd"> 
                    <i class="fa fa-2x fa-facebook-square"></i>
                </a>

                <a href="<?php echo $settings->twitter; ?>" target="_blank" aria-label="twitter" class="rtpadd">
                    <i class="fa fa-2x fa-twitter-square"></i>
                </a>

                <a href="<?php echo $settings->g_plus; ?>" target="_blank" aria-label="google" class="rtpadd">
                    <i class="fa fa-2x fa-google-plus-square"></i>
                </a>

                <a href="<?php echo $settings->youtube; ?>" target="_blank" aria-label="youtube" class="padd">
                    <i class="fa fa-2x fa-youtube-square"></i>
                </a></li>

                    <li><small><i class="fa fa-copyright" aria-hidden="true" ></i><?php echo $settings->copy_right; ?></small></li>
                </ul>
               </div>

            <div class="col-lg-3 col-md-3 block1">
                <h3>IMPORTANT LINKS</h3>
                <hr>
                <ul>
                    
                    <li><i class="fa fa-arrow-circle-right"></i> <a href="satta-matka-guessing-forum">MEMBER FORUM</a></li>
                    <li><i class="fa fa-arrow-circle-right"></i> <a href="#">LIVE RESULT</a></li>
                    <li><i class="fa fa-arrow-circle-right"></i> <a href="satta-matka-tips-today-free-samajseva-game">FREE GAME</a></li>
                    <li><i class="fa fa-arrow-circle-right"></i> <a href="weekly-jodi-panna-all-satta-matka-cards">WEEKLY</a></li>
                    <li><i class="fa fa-arrow-circle-right"></i> <a href="#">SATTA KING</a></li>
                    <li><i class="fa fa-arrow-circle-right"></i> <a href="satta-matka-vip-membership">VIP</a></li>
                    <li><i class="fa fa-arrow-circle-right"></i> <a href="registration">Register</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-3 block1">
                <h3>CHARTS ZONE</h3>
                <hr>
                <ul>
                    
                    <li><i class="fa fa-arrow-circle-right"></i> <a href="time-bazar-matka-chart">TIME CHART </a></li>
                    <li><i class="fa fa-arrow-circle-right"></i> <a href="kalyan-matka-jodi-chart">KALYAN CHART</a></li>
                    <li><i class="fa fa-arrow-circle-right"></i> <a href="#">MAIN MUMBAI CHART</a></li>
                    <li><i class="fa fa-arrow-circle-right"></i> <a href="milan-day-matka-jodi-chart">MILAN DAY CHART</a></li>
                    <li><i class="fa fa-arrow-circle-right"></i> <a href="milan-night-matka-jodi-chart">MILAN NIGHT CHART</a></li>
                    <li><i class="fa fa-arrow-circle-right"></i> <a href="rajdhani-day-matka-jodi-chart">RAJDHANI DAY CHART</a></li>
                    <li><i class="fa fa-arrow-circle-right"></i> <a href="rajdhani-night-matka-jodi-chart">RAJDHANI NIGHT CHART</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-3 block1">
                <h3>PANEL CHARTS</h3>
                <hr>
                <ul>
                    <li><i class="fa fa-arrow-circle-right"></i> <a href="kalyan-matka-panel-chart-pana-chart-patti-chart"> 
                             KALYAN PANEL CHART
                        </a>
                    </li>
                    <li><i class="fa fa-arrow-circle-right"></i> <a href="#">MUMBAI PANEL CHART</a></li>
                    <li><i class="fa fa-arrow-circle-right"></i> <a href="milan-day-matka-panel-chart-pana-chart-patti-chart">MILAN DAY PANEL CHART</a></li>
                    <li><i class="fa fa-arrow-circle-right"></i> <a href="milan-night-matka-panel-chart-pana-chart-patti-chart">MILAN NIGHT PANEL CHART</a></li>
                    <li><i class="fa fa-arrow-circle-right"></i> <a href="rajdhani-day-matka-panel-chart-pana-chart-patti-chart">RAJDHANI DAY PANEL CHART</a></li>
                    <li><i class="fa fa-arrow-circle-right"></i> <a href="rajdhani-night-matka-panel-chart-pana-chart-patti-chart">RAJDHANI NIGHT PANEL CHART</a></li>
                </ul>
            </div>

    </div>
</div>

</div>
</div>
</div>
<a class="callbtn" href="tel:+919898394402" title="Call Now" style="display: block;">
 <i class="fa fa-4x fa-phone-square" aria-hidden="true"></i>
 </a>

 <a class="refreshbtn" type="button" onclick="window.location.reload()" title="Refresh" style="display: block;" style="cursor: pointer;">
 <i class="fa fa-4x fa-refresh" aria-hidden="true"></i>
 </a>

</body>
</html>

