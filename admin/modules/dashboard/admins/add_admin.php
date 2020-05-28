<?php
if($Admin -> GetPermissionLevel() > 3) {
    header('Location: dashboard.php?p=1');
} else {
?>

<div class="row">
    <div class="col s12 m8 offset-m2 l6 offset-l3 white">
        <h5 class="center-align">Add a new admin</h5>
        <form action="">
            <div class="row">
                <div class="col s12">
                    <p class="center-align">
                        <b class="red-text" id='addAdminFallbackError'>

                        </b>
                    </p>
                </div>
                <div class="col s12 m6 input-field">
                    <input type="text" name="admin_first_name" id="admin_first_name" />
                    <label for="admin_first_name">Admin First Name</label>
                    <span class="helper-text red-text right" id="adminFirstNameError"></span>
                </div>
                <div class="col s12 m6 input-field">
                    <input type="text" name="admin_last_name" id="admin_last_name" />
                    <label for="admin_last_name">Admin Last Name</label>
                    <span class="helper-text red-text right" id="adminLastNameError"></span>
                </div>
                <div class="col s12 input-field">
                    <input type="email" name="admin_email" id="admin_email" />
                    <label for="admin_email">Admin Email</label>
                    <span class="helper-text red-text right" id="adminEmailError"></span>
                </div>
                <div class="col s8 input-field">
                    <input type="password" name="admin_password" id="admin_password" />
                    <label for="admin_Password">Admin Password</label>
                    <span class="helper-text red-text right" id="adminPasswordError"></span>
                </div>
                <div class="col s4 input-field">
                    <input type="number" name="admin_permission" id="admin_permission" <?php if($Admin -> GetPermissionLevel() == 1) echo "min='1'"; else echo "min='4'" ?> max='10' />
                    <label for="admin_permission">Permissions</label>
                    <span class="helper-text red-text right" id="adminPermissionError"></span>
                </div>
                <div class="col s12">
                    <p class="right-align">
                        <button type="submit" class="btn blue">Add Admin</button>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
}
?>