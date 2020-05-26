<ul id="adminSidenav" class="sidenav sidenav-fixed invesible-top">
    <li>
        <div class="user-view">
            <div class="background">
                <img src="assets/img/backgrounds/index_desktop.webp" alt="">
            </div>
            <a href="#user"><img src="<?php echo $Admin -> GetProfileImage(); ?>" class="circle" alt=""></a>
            <a href="#name"><span class="white-text name"><?php echo $Admin -> GetFirstName()." ".$Admin -> GetLastName(); ?></span></a>
            <a href="#email"><span class="grey-text text-lighten-3 email"><?php echo $Admin -> GetEmail(); ?></span></a>
        </div>
    </li>
    <li>
        <form action="search.php" method="GET">
            <div class="row">
                <div class="input-field col s12">
                    <input type="search" name="nav-search" id="navSearch" />
                    <label for="navSearch"><i class="material-icons grey-text">search</i></label>
                </div>
            </div>
        </form>
    </li>
    <li><a href="?p=0"><i class="material-icons left">dashboard</i> Dashboard</a></li>
    <li><a href="?p=1"><i class="material-icons left">verified_user</i> Admins</a></li>
    <li><a href="?p=1"><i class="material-icons left">group</i> Users</a></li>
    <li><a href="?p=1"><i class="material-icons left">image</i> Ads</a></li>
    <li><a href="?p=1"><i class="material-icons left">payment</i> Transactions</a></li>

</ul>