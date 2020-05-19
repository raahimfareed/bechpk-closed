        <?php
        if (isset($_SESSION['user_id'])) {
            $User = new User();
            $User -> GetInfo($_SESSION['user_id']);
        ?>
        <ul class="sidenav" id="main-mobile-nav">
            <li>
                <div class="user-view">
                    <div class="background grey darken-4">
                    </div>
                    <a href="profile.php?<?php echo $_SESSION['user_id']; ?>" id="user"><img src="<?php echo $User -> GetProfileImage() ?>" class="circle" alt=""></a>
                    <a href="#!" id="name"><span class="white-text name"><?php echo $User -> GetFirstName()." ".$User -> GetLastName(); ?></span></a>
                    <a href="#!" id="name"><span class="grey-text text-lighten-3 email"><?php echo $User -> GetEmail(); ?></span></a>
                </div>
            </li>

            <?php
            if ($User -> GetAccountStatus() == 0) {
            ?>
            <li>
                <a class="valign-wrapper"><i class="material-icons yellow-text text-darken-2">report_problem</i> Account not activated!</a>
            </li>
            <?php
            } 
            ?>
            <li><a href="" class="btn btn-large green"><i class="material-icons left">camera_alt</i><b>SELL</b></a></li>
            <li><a href="profile.php?<?php echo $_SESSION['user_id']; ?>">Profile</a></li>
            <li><a href="settings.php">Settings</a></li>
            <li><a href="includes/logout.inc.php?user_id=<?php echo $_SESSION['user_id']; ?>" class="red-text">Logout</a></li>
        </ul>
        <?php
        } else {
        ?>

        <ul class="sidenav" id="main-mobile-nav">
            <li>
                <div class="user-view">
                    <div class="background grey darken-4">
                    </div>
                    <a href="#!" id="user"><img src="assets/img/profile-pics/defaults/head_nephritis.png" class="circle" alt=""></a>
                    <a href="#!" id="name"><span class="white-text name">Guest</span></a>
                    <a href="#!" id="name"><span class="grey-text text-lighten-3 email"></span></a>
                </div>
            </li>
            <li><a href="#login" class="green-text text-darken-1 modal-trigger"><b>LOGIN</b></a></li>
            <li><a href="" class="btn btn-large green"><i class="material-icons left">camera_alt</i><b>SELL</b></a></li>
        </ul>

        <?php
        }
        ?>