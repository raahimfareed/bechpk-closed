<?php
session_start();
if (!isset($_SESSION['initial_signup'])) {
    header('Location: index.php');
    exit();
} else {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('modules/head.php'); ?>

    <title>Bech.pk - Welcome <?php echo $_SESSION['initial_signup']; ?></title>
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
                            Welcome to Bech<span class='green-text text-darken-1'>.pk</span> <?php echo $_SESSION['initial_signup']; ?>!
                        </h4>
                        <p class="flow-text">
                            We've sent you an email with account verification, be sure to check your spam folder if you can't find it!<br />
                            If your account is not activated in the next 7 days, it will be deleted!
                        </p>
                    </div>
                </div>
            </div>
        </section>

    <?php include('modules/footer.php');?>

    <?php include('modules/scripts.php');?>
</body>

</html>

<?php
}
?>