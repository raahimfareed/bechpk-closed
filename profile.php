<?php
session_start();
require_once('classes/user.class.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('modules/head.php'); ?>
    <title>Bech.pk - Harjaga, Harpal</title>
</head>

<body class="grey lighten-4">
    <?php include('modules/navbar.php'); ?>
    <?php include('modules/sidenav.php'); ?>
    <?php include('modules/feedback_btn.php'); ?>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div class="row white section">
                            <div class="col s4 m3 l2 center-align">
                                <?php
                                $User = new User(); $User -> GetInfo($_SESSION['user_id']);
                                ?>
                                <img src="<?php echo $User -> GetProfileImage(); ?>" class="profile-user-img" alt="">
                            </div>
                            <div class="col s8 m9 l10">
                                <div class="row">
                                    <div class="col s12">
                                        <h4>
                                            <?php
                                            echo $User -> GetFirstName()." ".$User -> GetLastName();
                                            ?>
                                        </h4>
                                        <h6>
                                            <?php
                                            echo $User -> GetEmail();
                                            ?>
                                        </h6>
                                        <p>
                                            <?php
                                            echo $User -> GetProfileDescription();
                                            ?>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col s6 m4 center-align">
                                        <b>Total Ads</b>
                                        <br>
                                        <?php echo $User -> GetTotalAds(); ?>
                                    </div>
                                    <div class="col s6 m4 center-align">
                                        <b>Account Type</b>
                                        <br>
                                        <?php echo $User -> GetAccountType(); ?>
                                    </div>
                                    <div class="col m4 center-align hide-on-small-only">
                                        <b>Likes</b>
                                        <br>
                                        <?php echo $User -> GetProfileLikes(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <h4 class="grey-text text-darken-4">
                                    My Ads
                                </h4>
                                <div class="row">
                                    <div class="col s6 m4 l3">
                                        <a href="http://www.google.com/">
                                            <div class="card hoverable small">
                                                <div class="card-image">
                                                    <img src="https://source.unsplash.com/1200x600/?mobile" alt="" />
                                                </div>
                                                <div class="card-content">
                                                    <h6 class="truncate black-text"><b>47,000</b></h6>
                                                    <p class="truncate grey-text text-darken-2">Buy Samsung S8+</p>
                                                    <p class="right-align grey-text"><small>Today</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col s6 m4 l3">
                                        <a href="http://www.google.com/">
                                            <div class="card hoverable small">
                                                <div class="card-image">
                                                    <img src="https://source.unsplash.com/750x1334/?mobile" alt="" />
                                                </div>
                                                <div class="card-content">
                                                    <h6 class="truncate black-text"><b>23,000</b></h6>
                                                    <p class="truncate grey-text text-darken-2">Buy iPhone 5s</p>
                                                    <p class="right-align grey-text"><small>Today</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col s6 m4 l3">
                                        <a href="">
                                            <div class="card hoverable small">
                                                <div class="card-image">
                                                    <img src="./assets/img/profile-pics/defaults/head_alizarin.png" alt="" />
                                                </div>
                                                <div class="card-content">
                                                    <h6 class="truncate black-text"><b>77,000</b></h6>
                                                    <p class="truncate grey-text text-darken-2">Huawei Mate 10S</p>
                                                    <p class="right-align grey-text"><small>Today</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col s6 m4 l3">
                                        <a href="">
                                            <div class="card hoverable small">
                                                <div class="card-image">
                                                    <img src="https://source.unsplash.com/250x253/?mobile" alt="" />
                                                </div>
                                                <div class="card-content">
                                                    <h6 class="truncate black-text"><b>47,000</b></h6>
                                                    <p class="truncate grey-text text-darken-2">Buy Samsung S8+</p>
                                                    <p class="right-align grey-text"><small>Today</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col s6 m4 l3">
                                        <a href="http://www.google.com/">
                                            <div class="card hoverable small">
                                                <div class="card-image">
                                                    <img src="https://source.unsplash.com/250x249/?mobile" alt="" />
                                                </div>
                                                <div class="card-content">
                                                    <h6 class="truncate black-text"><b>47,000</b></h6>
                                                    <p class="truncate grey-text text-darken-2">Buy Samsung S8+</p>
                                                    <p class="right-align grey-text"><small>Today</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col s6 m4 l3">
                                        <a href="http://www.google.com/">
                                            <div class="card hoverable small">
                                                <div class="card-image">
                                                    <img src="https://source.unsplash.com/250x248/?mobile" alt="" />
                                                </div>
                                                <div class="card-content">
                                                    <h6 class="truncate black-text"><b>23,000</b></h6>
                                                    <p class="truncate grey-text text-darken-2">Buy iPhone 5s</p>
                                                    <p class="right-align grey-text"><small>Today</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col s6 m4 l3">
                                        <a href="">
                                            <div class="card hoverable small">
                                                <div class="card-image">
                                                    <img src="https://source.unsplash.com/250x247/?mobile" alt="" />
                                                </div>
                                                <div class="card-content">
                                                    <h6 class="truncate black-text"><b>77,000</b></h6>
                                                    <p class="truncate grey-text text-darken-2">Huawei Mate 10S</p>
                                                    <p class="right-align grey-text"><small>Today</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col s6 m4 l3">
                                        <a href="">
                                            <div class="card hoverable small">
                                                <div class="card-image">
                                                    <img src="https://source.unsplash.com/250x246/?mobile" alt="" />
                                                </div>
                                                <div class="card-content">
                                                    <h6 class="truncate black-text"><b>47,000</b></h6>
                                                    <p class="truncate grey-text text-darken-2">Buy Samsung S8+</p>
                                                    <p class="right-align grey-text"><small>Today</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        <p class="center-align">
                                            <a href="" class="btn green darken-1">LOAD MORE</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <h4 class="grey-text text-darken-4">
                                    Favourites
                                </h4>
                                <div class="row">
                                    <div class="col s6 m4 l3">
                                        <a href="http://www.google.com/">
                                            <div class="card hoverable small">
                                                <div class="card-image">
                                                    <img src="https://source.unsplash.com/250x249/?mobile" alt="" />
                                                </div>
                                                <div class="card-content">
                                                    <h6 class="truncate black-text"><b>47,000</b></h6>
                                                    <p class="truncate grey-text text-darken-2">Buy Samsung S8+</p>
                                                    <p class="right-align grey-text"><small>Today</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col s6 m4 l3">
                                        <a href="http://www.google.com/">
                                            <div class="card hoverable small">
                                                <div class="card-image">
                                                    <img src="https://source.unsplash.com/250x248/?mobile" alt="" />
                                                </div>
                                                <div class="card-content">
                                                    <h6 class="truncate black-text"><b>23,000</b></h6>
                                                    <p class="truncate grey-text text-darken-2">Buy iPhone 5s</p>
                                                    <p class="right-align grey-text"><small>Today</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col s6 m4 l3">
                                        <a href="">
                                            <div class="card hoverable small">
                                                <div class="card-image">
                                                    <img src="https://source.unsplash.com/250x247/?mobile" alt="" />
                                                </div>
                                                <div class="card-content">
                                                    <h6 class="truncate black-text"><b>77,000</b></h6>
                                                    <p class="truncate grey-text text-darken-2">Huawei Mate 10S</p>
                                                    <p class="right-align grey-text"><small>Today</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col s6 m4 l3">
                                        <a href="">
                                            <div class="card hoverable small">
                                                <div class="card-image">
                                                    <img src="https://source.unsplash.com/250x246/?mobile" alt="" />
                                                </div>
                                                <div class="card-content">
                                                    <h6 class="truncate black-text"><b>47,000</b></h6>
                                                    <p class="truncate grey-text text-darken-2">Buy Samsung S8+</p>
                                                    <p class="right-align grey-text"><small>Today</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        <p class="center-align">
                                            <a href="" class="btn green darken-1">LOAD MORE</a>
                                        </p>
                                    </div>
                                </div>
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