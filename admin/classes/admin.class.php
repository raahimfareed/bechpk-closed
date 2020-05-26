<?php
include_once('dbh.class.php');

Class Admin extends Dbh {
    protected $admin_id;
    protected $first_name;
    protected $last_name;
    protected $email;
    protected $profile_image;
    protected $account_status;
    protected $admin_permissions;
    protected $registration_date;

}