<?php
// session_start();

require_once('dbh.class.php');

Class User extends Dbh {
    protected $first_name;
    protected $last_name;
    protected $email;
    protected $profile_image;
    protected $profile_description;
    protected $total_ads;
    protected $active_ads;
    protected $account_status;
    protected $account_type;
    protected $registration_date;

    public function AddUser($user_id, $first_name, $last_name, $email, $password, $profile_pic, $date) {
        $sql = "INSERT into users (`UserId`, `FirstName`, `LastName`, `Email`, `Password`, `ProfileImage`, `RegistrationDate`) values (?, ?, ?, ?, ?, ?, ?);";
        $stmt = $this -> GetDB() -> prepare($sql);
        if ($stmt -> execute([$user_id, $first_name, $last_name, $email, $password, $profile_pic, $date])) {
            return true;
        }
    }

    public function LoginUser($email, $password) {
        $sql = "SELECT * from users where `Email` = ?";
        $stmt = $this -> GetDB() -> prepare($sql);

        if ($stmt -> execute([$email])) {
            $row = $stmt -> fetch();

            if ($row['AccountStatus'] == 2) {
                return 12;
                
            } else {
                if (password_verify($password, $row['Password'])) {
                    return 11;
                } else {
                    return 10;
                }
            }
        }
    }

    public function GetInfo($user_id) {
        $sql = "SELECT * from users where UserId = ?";
        $stmt = $this -> GetDB() -> prepare($sql);
        $stmt -> execute([$user_id]);
        if ($stmt -> rowCount() != 1) {
            return false;
        } else {
            $row = $stmt -> fetch();
            $this -> first_name = $row['FirstName'];
            $this -> last_name = $row['LastName'];
            $this -> email = $row['Email'];
            $this -> profile_image = $row['ProfileImage'];
            $this -> profile_description = $row['ProfileDescription'];
            $this -> total_ads = $row['TotalAds'];
            $this -> active_ads = $row['ActiveAds'];
            $this -> account_status = $row['AccountStatus'];
            $this -> account_type = $row['AccountType'];
            $this -> registration_date = $row['RegistrationDate'];
            return true;
        }
    }

    public function SetFirstName($user_id, $first_name) {

    }
    public function SetLastName($user_id, $last_name) {

    }
    public function SetEmail($user_id, $email) {

    }
    public function SetProfileImage($user_id, $profile_image) {

    }
    public function SetProfileDescription($user_id, $profile_description) {

    }
    public function SetTotalAds($user_id, $total_ads) {

    }
    public function SetActiveAds($user_id, $active_ads) {

    }
    public function SetAccountStatus($user_id, $account_status) {

    }
    public function SetAccountType($user_id, $account_type) {

    }
    public function GetFirstName() {
        return $this -> first_name;
    }
    public function GetLastName() {
        return $this -> last_name;
    }
    public function GetEmail() {
        return $this -> email;
    }
    public function GetProfileImage() {
        return $this -> profile_image;
    }
    public function GetProfileDescription() {
        return $this -> profile_description;
    }
    public function GetTotalAds() {
        return $this -> total_ads;
    }
    public function GetActiveAds() {
        return $this -> active_ads;
    }
    public function GetAccountStatus() {
        return $this -> account_status;
    }
    public function GetAccountType() {
        return $this -> account_type;
    }
}