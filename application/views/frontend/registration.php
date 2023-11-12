
<?php $this->load->view('frontend/headerInner'); ?>

<div class="container-fluid bgwhite">
    <div class="row">
        <div class="col-lg-4 col-md-4"></div>
        <div class="col-lg-4 col-md-4" style="background:#00cd00;border-radius: 25px;">
      
<div id="wrapper" class="wrapper-login">
                        <div class="login-inner">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="form-header">
                                        <h1>Register</h1>
                                    </div>
                                </div>
                            </div>
                        <div class="form-wrapper">
                        <!--Validation error message-->
                            <?php if(!empty($message)){ ?>
                            <div class="message">
                            <?php echo @$message;?>
                            </div>
                            <?php } else if ($this->session->flashdata('feedback')) { ?>
                                <div class="message">
                                <strong>Danger! </strong><?php echo $this->session->flashdata('feedback')?>
                                </div>
                            <?php } ?>                              
                            <?php echo form_open('login/user_SignUP'); ?>
                            <div class="form">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Enter fullname" required>
                                </div>                                
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" id="password" aria-describedby="password" placeholder="Enter password" required>
                                </div>                                
                                <div class="form-group">
                                    <input type="password" name="confirm_password" class="form-control" id="confirmPassword" aria-describedby="confirmPassword" placeholder="Confirm password" equalTo="#password" required>
                                </div>
                                
                                <input type="submit" class="btn btn-primary" type="button" value="Submit"> &nbsp <a href="<?php echo base_url(); ?>login/signIn" class="btn btn-primary" type="button">Login</a>
                            </div>
                            <?php echo form_close(); ?>
                           
                        </div>
                    </div>
                </div>

            
</div>
</div>
</div>


    
 <script src="<?php echo base_url();?>assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/vendor/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/vendor/bootstrap3.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    
    <script type="text/javascript">
            $('form').validate();
    </script>
    <style type="text/css">
         .form-wrapper {
            width: 100%;
            margin: 0 auto;
            padding: 50px;
            background-color: #fff;
            animation: flip;
            animation-duration: 320ms;
        }
        @keyframes flip {
            from {
                transform: rotateY(180deg);
            }
            to {
                transform: rotateY(0deg);
            }
        }
        .btn-primary {
            color: #fff;
            background-color: #00cd00;
            border-color: #00cd00;
        }

        .btn-primary:hover{
            color: #fff;
            background-color: #00cd00;
            border-color: #00cd00;
        }
        .bgwhite{
            background: #fff;
            color: #000;
            text-transform: uppercase;
            border: 4px solid #00cd00;
            border-radius: 25px;
            padding: 25px;
        }
        .adminsir{
            text-align: center;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .adminsir h1{
          color: #fff;
          font-size: 24px;
        }

        .adminsir span{
          color: red;
        }
        .adminsir i{
        
          color: green;
        }

        .form-wrapper {
                width: 100%;
                margin: 0 auto;
                padding: 50px;
                background-color: #fff;
                animation: flip;
                animation-duration: 320ms;
                border-radius: 50px;
                margin-bottom: 10px;
            }

        .form-header{
            text-align: center;
            margin-top: 30px;
        }

        .btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle {
    color: #fff;
    background-color: #00cd00;
    border-color: #00cd00;
}

    </style>

<?php $this->load->view('frontend/footerInner'); ?>



