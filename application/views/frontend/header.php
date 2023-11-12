<?php $settings = $this->Admin_model->getSettingsValue(); ?>
<!doctype html>
    <html lang="en">
    <head>
        <!--====== Required meta tags ======-->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="<?php echo $settings->description ?>">
        <meta name="keywords" content="<?php echo $settings->meta_key ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--====== Title ======-->
        <title><?php echo $settings->sitetitle ?></title>
        <!--====== Favicon Icon ======-->   
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/frontend/images/favicon.png" type="image/png">
        <!--====== Nice Number css ======-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/jquery.nice-number.min.css">
        <!--====== Bootstrap css ======-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/bootstrap.min.css">
        <!--====== Fontawesome css ======-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/font-awesome.min.css">
        <!--====== Default css ======-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/default.css">
        <!--====== Style css ======-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/style.css">
        <!--====== Responsive css ======-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/responsive.css">
        <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@800&display=swap" rel="stylesheet"> -->

       <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    </head>

    <body>
     <!--SATTA MATKA Heading-->
     <div class="container-fluids heading">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-center">
                
                    <img src=" <?php echo base_url(); ?>assets/img/<?php echo $settings->sitelogo; ?>" alt="satta-mataka">
               
            </div>
        </div> 
    </div> 
    <!-- End SATTA MATKA Heading-->