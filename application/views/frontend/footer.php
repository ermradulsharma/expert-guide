<?php $settings = $this->Admin_model->getSettingsValue(); ?>
    <!--Contact Admin-->
    <div class="container-fluids resultmatka1">
        <div class="row">
         <div class="col-lg-12 col-md-12 rlt bgY">
            <h3><?php echo $settings->copy_right; ?><br>
                CONTACT-( VIJAYA SIR)<br>
                <?php echo $settings->contact; ?><br>
            </h3>
        </div>

        <div class="col-lg-12 col-md-12 rlt bgY">
                <a href="<?php echo $settings->facebook; ?>" target="_blank" aria-label="facebook"><i class="fa fa-2x fa-facebook-square"></i></a>

                <a href="<?php echo $settings->twitter; ?>" target="_blank" aria-label="twitter"><i class="fa fa-2x fa-twitter-square"></i></a>

                <a href="<?php echo $settings->g_plus; ?>" target="_blank" aria-label="google"><i class="fa fa-2x fa-google-plus-square"></i></a>

                <a href="<?php echo $settings->youtube; ?>" target="_blank" aria-label="youtube"><i class="fa fa-2x fa-youtube-square"></i></a>
        </div>
        </div>
    </div>
    <!--End Contact Admin-->


<!--Footer Menu-->
<div class="container-fluids footer">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            Satta Matka * Satta Matka Results * <a href="https://satta-matka.com">Kalyan Matka</a> * SattaMatka * Matka tips * Free Matka Results * Kalyan Matka Results * <a href="https://satta-matka.com">Matka Chart</a> *  Satta Game * Matka Game * Mumbai Main * Kalyan Results * Kalyan Chart * Main Mumbai Chart * Online Matka Results * Satta Matka Tips * Milan Chart * Old Satta chart * Top Matka Guess * Matka Links * Live Satta Matka Results * Satta Matka Number * Satta Matka Software * Matka Chart * Matka * Free Matka Guessing <a href="https://satta-matka.com">Matka Tips</a>
        </div>
    </div> 
</div>
<!--End Footer Menu--> 

<a class="callbtn" href="tel:+91<?php echo $settings->contact; ?>" title="Call Now" style="display: block;">
 <i class="fa fa-4x fa-phone-square" aria-hidden="true"></i>
 </a>

 <a class="refreshbtn" type="button" onclick="window.location.reload()" title="Call Now" style="display: block;" style="cursor: pointer;">
 <i class="fa fa-4x fa-refresh" aria-hidden="true"></i>
 </a>
</body>
</html>