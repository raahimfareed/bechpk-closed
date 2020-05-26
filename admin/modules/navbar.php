    <!-- Navigation Bar -->
    <div class="navbar-fixed">
        <nav class="grey lighten-3">
            <div class="nav-wrapper grey lighten-3">
                <div class="container">
                    <a href="index.php" class="brand-logo grey-text text-darken-4"><b>Bech<span class="green-text text-darken-1">.pk</span></b></a>
                    <a href="#!" class="sidenav-trigger" data-target="main-mobile-nav"><i
                            class="material-icons grey-text text-darken-4">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <?php if(!isset($_SESSION['user_id'])) {?>
                        <li><a href="#login" class="green-text text-darken-1 modal-trigger"><b>LOGIN</b></a></li>
                        <?php
                        } else {
                            $User = new User();
                            $User -> GetInfo($_SESSION['user_id']);
                        ?>
                        <li class="valign-wrapper"><a href="#" class="green-text text-darken-1 modal-trigger valign-wrapper dropdown-trigger" data-target="userMenu"><img class="navbar-img" src="<?php echo $User -> GetProfileImage() ?>" alt=""> &nbsp; <b><?php echo $User -> GetFirstName(); ?></b></a></li>
                        <?php
                        }
                        ?>
                        <li><a href="sell.php" class="btn btn-large green darken-1"><i
                                    class="material-icons left">camera_alt</i><b>SELL</b></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <nav class="search">
        <div class="nav-wrapper grey lighten-3">
            <form class="container" method="get" action="post">
                <div class="input-field">
                    <input id="search" class="tooltipped" type="search" data-position="bottom"
                        data-tooltip="Search for Mobiles, Cars, and much more" title="" required />
                    <label class="label-icon" for="search"><i class="material-icons grey-text">search</i></label>
                    <i class="material-icons">close</i>
                </div>
            </form>
        </div>
    </nav>


    <!-- Main Products Showcase -->
    <main>
        <div class="nav-category">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#!"><b class="valign-wrapper black-text">Categories <i
                                    class="material-icons">keyboard_arrow_down</i></b></a></li>
                    <li><a href="#!" class="grey-text text-darken-2 link-transition">Mobiles</a></li>
                    <li><a href="#!" class="grey-text text-darken-2 link-transition">Laptops</a></li>
                    <li><a href="#!" class="grey-text text-darken-2 link-transition">Automobiles</a></li>
                    <li><a href="#!" class="grey-text text-darken-2 link-transition">Motorbikes</a></li>
                    <li><a href="#!" class="grey-text text-darken-2 link-transition">Jobs</a></li>
                    <li><a href="#!" class="grey-text text-darken-2 link-transition">Real Estate</a></li>
                    <li><a href="#!" class="grey-text text-darken-2 link-transition">Freelancing</a></li>
                </ul>
            </div>
        </div>
        
        <?php
        if(isset($_SESSION['user_id'])) {
        ?>
            <ul id="userMenu" class="dropdown-content">
                <?php
                if ($User -> GetAccountStatus() == 0) {
                ?>
                <li>
                    <a class="valign-wrapper"><i class="material-icons yellow-text text-darken-2">report_problem</i> Account not activated!</a>
                </li>
                <?php
                }
                ?>
                <li><a href="profile.php">Profile <span class="badges green right">1</span></a></li>
                <li><a href="profile.php">Settings</a></li>
                <li class="divider"></li>
                <li><a href="includes/logout.inc.php?user_id=<?php echo $_SESSION['user_id']; ?>" class="red-text logout_trigger">Logout</a></li>
            </ul>
        <?php
        }
        ?>

        