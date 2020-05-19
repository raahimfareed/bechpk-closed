<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('modules/head.php'); ?>
    <title>Bech.pk - Sign Up</title>
</head>

<body class="grey lighten-4">
    <?php include('modules/navbar.php'); ?>
    <?php include('modules/sidenav.php'); ?>

        <?php include('modules/feedback_btn.php'); ?>
        
        <?php include('modules/login_form.php'); ?>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <h4 class="grey-text text-darken-4">
                            Signup
                        </h4>
                    </div>
                    <div class="col s12 m6">
                        <form action="includes/form-handlers/signup.inc.php" method="POST">
                            <div class="row">
                                <div class="col s12">
                                    <p>
                                        <b class="red-text">
                                            <?php
                                            // var_dump($_SESSION['errors_array']);
                                            if (isset($_SESSION['signup_errors_array']) && !empty($_SESSION['signup_errors_array'])) {
                                                foreach ($_SESSION['signup_errors_array'] as $error) {
                                                    echo $error;
                                                }
                                                // $_SESSION['errors_array'] = [];
                                            }
                                            ?>
                                        </b>
                                    </p>
                                </div>
                                <div class="col s6 input-field">
                                    <input type="text" name="signup_first_name" id="signup_first_name" value="<?php if(isset($_SESSION['signup_first_name'])) echo $_SESSION['signup_first_name']; ?>" />
                                    <label for="signup_first_name">First Name</label>
                                </div>
                                <div class="col s6 input-field">
                                    <input type="text" name="signup_last_name" id="signup_last_name" value="<?php if(isset($_SESSION['signup_last_name'])) echo $_SESSION['signup_last_name']; ?>" />
                                    <label for="signup_last_name">Last Name</label>
                                </div>
                                <div class="col s12 input-field">
                                    <input type="email" name="signup_email" id="signup_email" value="<?php if(isset($_SESSION['signup_email'])) echo $_SESSION['signup_email']; ?>" />
                                    <label for="signup_email">E-mail</label>
                                </div>
                                <div class="col s6 input-field">
                                    <input type="password" name="signup_password" id="signup_password" />
                                    <label for="signup_password">Password</label>
                                </div>
                                <div class="col s6 input-field">
                                    <input type="password" name="signup_confirm_password" id="signup_confirm_password" />
                                    <label for="signup_confirm_password">Confirm Password</label>
                                </div>
                                <div class="col s12 input-field right-align">
                                    <input type="submit" value="SIGNUP" class="btn green darken-1" name="signup_submit" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col s12 m6">
                        <div class="row">
                            <div class="col s12 m6 left-align">
                                <h5><b>Why signup?</b></h5>
                            </div>
                            <div class="col s12 m6 right-align">
                                <h5><b>کیوں سائن اپ کریں؟</b></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php include('modules/footer.php'); ?>
    
    <?php include('modules/scripts.php'); ?>
</body>

</html>