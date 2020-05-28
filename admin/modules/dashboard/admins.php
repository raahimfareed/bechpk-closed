<div class="row">
    <div class="col s12">
        <h3>Admins</h3>
    </div>
</div>

<?php
if (!isset($_GET['s']) || empty($_GET['s'])) {
?>

<div class="row">
    <div class="col s12 m6">
        <div class="row">
            <div class="col 12">
                <h4>
                    Manage all admins
                </h4>
                <p><a href="?p=1&s=1" class="btn purple">Manage</a></p>
            </div>
            <?php
            if ($Admin -> GetPermissionLevel() <= 3) {
            ?>
                <div class="col 12">
                    <h4>
                        Add new admin
                    </h4>
                    <p><a href="?p=1&s=2" class="btn blue">Add</a></p>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="col s12 m3 offset-m1">
        <div class="card custom-small green lighten-1">
            <div class="card-content">
                <span class="card-title white-text center-align"><b>Total Admins</b></span>
                <h3 class="center-align grey-text text-lighten-4"><b><?php echo $Admin -> GetAdminsNum(); ?></b></h3>
            </div>
        </div>
    </div>
</div>

<?php
} else {
    switch ($_GET['s']) {
        case 1:
            include('admins/all_admins.php');
            break;
        case 2:
            if ($Admin -> GetPermissionLevel() <= 3) {
                include('admins/add_admin.php');
            } else {
                header('Location: dashboard.php?p=1');
            }
            break;
        default:
            header('Location: dashboard.php?p=1');
            break;
    }
}
?>