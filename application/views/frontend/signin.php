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
                                <h1>Login</h1>
                            </div>
                        </div>
                    </div>
                    <div class="form-wrapper">
                        <?php if (!empty($this->session->flashdata('feedback'))) { ?>
                            <div class="message">
                                <?php echo $this->session->flashdata('feedback') ?>
                            </div>
                        <?php
                        }
                        ?>
                        <?php if (!empty($message)) { ?>
                            <div class="message">
                                <?php echo validation_errors(); ?>
                                <?php echo @$message; ?>

                            </div>
                        <?php
                        }
                        ?>
                        <?php echo form_open('frontend/save_signin'); ?>
                        <div class="form">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" id="email" value="<?php if (isset($_COOKIE['email'])) {
                                                                                                            echo $_COOKIE['email'];
                                                                                                        } ?>" aria-describedby="" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" value="<?php if (isset($_COOKIE['password'])) {
                                                                                    echo $_COOKIE['password'];
                                                                                } ?>" class="form-control" id="password" aria-describedby="" placeholder="Enter password" required>
                            </div>

                            <!--    <div class="form-group">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember-me">
                        <label class="form-check-label" for="remember-me">Remember me plz!</label>
                    </div> -->


                            <a href="<?php echo base_url(); ?>registration" type="button" class="btn btn-warning">Register</a>&nbsp <input type="submit" class="btn btn-success btn-fullwidth" id="loginBtn" data-id="dashboard" value="Submit">
                        </div>
                        <?php echo form_close(); ?>

                    </div>
                    <br><br>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4"></div>
    </div>
</div>




<script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendor/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap3.min.js"></script>
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

    .btn-primary:hover {
        color: #fff;
        background-color: #00cd00;
        border-color: #00cd00;
    }

    .bgwhite {
        background: #fff;
        color: #000;
        text-transform: uppercase;
        border: 4px solid #00cd00;
        border-radius: 25px;
        padding: 25px;
    }

    .adminsir {
        text-align: center;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .adminsir h1 {
        color: #fff;
        font-size: 24px;
    }

    .adminsir span {
        color: red;
    }

    .adminsir i {

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

    .form-header {
        text-align: center;
        margin-top: 30px;
    }



    .btn-primary:not(:disabled):not(.disabled).active,
    .btn-primary:not(:disabled):not(.disabled):active,
    .show>.btn-primary.dropdown-toggle {
        color: #fff;
        background-color: #00cd00;
        border-color: #00cd00;
    }
</style>

<?php $this->load->view('frontend/footerInner'); ?>