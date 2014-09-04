<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Get My Uni</title>

        <!-- Bootstrap -->
        <link href="<?php echo CLIENT_CSS; ?>custom.css" rel="stylesheet">
        <link href="<?php echo CLIENT_CSS; ?>bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo CLIENT_CSS; ?>bootstrap-theme.min.css" rel="stylesheet">
        <link href="<?php echo CLIENT_CSS; ?>style.css" rel="stylesheet">
        <link href="<?php echo CLIENT_CSS; ?>social-buttons.css" rel="stylesheet">
        <link rel="shortcut icon" href="<?php echo CLIENT_IMAGES; ?>GMU_favicon.png" />
        <link rel="stylesheet" href="<?php echo CLIENT_FONTS; ?>font-awesome/css/font-awesome.min.css">
        <script src="<?php echo ADMIN_SCRIPTS; ?>jquery-1.10.2.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo CLIENT_MODULES ?>client_user_module_js.js"></script>

    </head>
    <body>
        <div id="fb-root"></div>

        <?php
        $current_url = current_url();
        ?>	 					

        <div class="container">


            <div class="row">

                <nav class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header col-md-3">
                            <a class="navbar-brand" href="<?php echo SITE_URL; ?>"><img src="<?php echo CLIENT_IMAGES; ?>logo.png" ></a>
                        </div>

                    </div><!-- /.container-fluid -->
                </nav>
            </div>



            <div class="row">

                <div class="col-md-offset-4 col-md-4 col-sm-4 col-xs-12 text-center">

                    <center>



                        <div id="signup_form_div"  <?php if ($current_url == SITE_URL . "index.php/user/login") { ?>style="display:none;" <?php } else { ?> style="display:block;" <?php } ?>>
                            <form id="signup_form">
                                <div class="form-group">
                                    <input type="password" placeholder="New Password" class="form-control input-lg npass" name="password">
                                    <label for="name" class="error" id="email_err">This field is required.</label>
                                </div>
                                <div class="form-group">
                                    <input type="password" placeholder="Re-Enter the New Password" class="form-control input-lg rnpass" name="npassword">
                                    <label for="name" class="error" id="password_err">This field is required.</label>
                                </div>
                                <input type="hidden" name="email" class="email" value="<?= $email ?>" />
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12"><input type="submit" class="sign_up femdsub" value="Reset" id="signup_btn"> </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </center>
                </div>
            </div>
        </div>


    </div>



    <script src="<?php echo CLIENT_SCRIPTS; ?>jquery.min.js"></script>

    <script src="<?php echo CLIENT_SCRIPTS; ?>bootstrap.min.js"></script>
</body>
</html>
<script>

    $(document).ready(function() {
        $(".femdsub").click(function(e) {
            e.preventDefault();

            if ($(".npass").val() == "" || $(".rnpass").val() == "") {
                alert("Please fill both the fields");
            } else if ($(".npass").val() != $(".rnpass").val()) {
                alert("Passwords did not match!");
            } else {
                $.ajax({
                    url: "/client/client_login/update_password",
                    type: "post",
                    data: {email: $(".email").val(), pass: $(".npass").val()},
                    success: function(data) {
                        if (data == 1) {
                            alert("Your Password has been Updated!");
                            top.location.href = "<?= SITE_URL ?>/user/login";
                        } else {
                            alert("Please try again");
                        }

                    }
                });
            }
        });
    });

</script>
