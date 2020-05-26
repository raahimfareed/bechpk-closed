<?php
// session_start();

require_once('dbh.class.php');

Class User extends Dbh {
    protected $user_id;
    protected $first_name;
    protected $last_name;
    protected $email;
    protected $profile_image;
    protected $profile_description;
    protected $total_ads;
    protected $active_ads;
    protected $account_status;
    protected $account_type;
    protected $profile_likes;
    protected $registration_date;

    
    public function AjaxAddUser ($first_name, $last_name, $email, $password, $date) {
        $user_id = md5(uniqid('', true));
        $sql = "SELECT * from users where `UserId` = ?";
        $stmt = $this -> GetDB() -> prepare($sql);
        if ($stmt -> execute([$user_id])) {
            while ($stmt -> rowCount() > 0) {
                $user_id = md5(uniqid('', true));
            }
        }
        
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $rand = mt_rand(1, 16); // Random number in between 1 and 16
        
        switch ($rand) {
            case 1:
                $profile_pic = "assets/images/profile-pics/defaults/head_alizarin.png";
                break;
                case 2:
                $profile_pic = "assets/images/profile-pics/defaults/head_amethyst.png";
            break;
            case 3:
                $profile_pic = "assets/img/profile-pics/defaults/head_belize_hole.png";
            break;
            case 4:
                $profile_pic = "assets/img/profile-pics/defaults/head_carrot.png";
            break;
            case 5:
                $profile_pic = "assets/img/profile-pics/defaults/head_deep_blue.png";
            break;
            case 6:
                $profile_pic = "assets/img/profile-pics/defaults/head_emerald.png";
            break;
            case 7:
                $profile_pic = "assets/img/profile-pics/defaults/head_green_sea.png";
            break;
            case 8:
                $profile_pic = "assets/img/profile-pics/defaults/head_nephritis.png";
            break;
            case 9:
                $profile_pic = "assets/img/profile-pics/defaults/head_pete_river.png";
            break;
            case 10:
                $profile_pic = "assets/img/profile-pics/defaults/head_pomegranate.png";
            break;
            case 11:
                $profile_pic = "assets/img/profile-pics/defaults/head_pumpkin.png";
                break;
            case 12:
                $profile_pic = "assets/img/profile-pics/defaults/head_red.png";
                break;
                case 13:
                $profile_pic = "assets/img/profile-pics/defaults/head_sun_flower.png";
            break;
            case 14:
                $profile_pic = "assets/img/profile-pics/defaults/head_turqoise.png";
            break;
            case 15:
                $profile_pic = "assets/img/profile-pics/defaults/head_wet_asphalt.png";
                break;
                case 16:
                $profile_pic = "assets/img/profile-pics/defaults/head_wisteria.png";
            break;
            default:
            $profile_pic = "assets/img/profile-pics/defaults/head_wet_asphalt.png";
        break;
        }
        
        $sql = "INSERT into users (`UserId`, `FirstName`, `LastName`, `Email`, `Password`, `ProfileImage`, `RegistrationDate`) values (?, ?, ?, ?, ?, ?, ?);";
        $stmt = $this -> GetDB() -> prepare($sql);
        if ($stmt -> execute([$user_id, $first_name, $last_name, $email, $hashed_password, $profile_pic, $date])) {
            return true;
        }
    }
    
    public function UserExists($email) {
        $sql = "SELECT * from users where `Email` = ?";
        $stmt = $this -> GetDB() -> prepare($sql);
        $stmt -> execute([$email]);
        if ($stmt -> rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function VerifyPassword($email, $password) {
        $sql = "SELECT * from users where Email = ?";
        $stmt = $this -> GetDB() -> prepare($sql);
        
        $stmt -> execute([$email]);
        
        if ($stmt -> rowCount() > 0) {
            $row = $stmt -> fetch();
            
            if ($row['AccountStatus'] == 2) return 13;
            else {
                if (password_verify($password, $row['Password'])) return 12;
                else return 11;
            }
        } else return 10;
        
    }
    
    public function GetUserId($email) {
        $sql = "SELECT * from users where Email = ?";
        $stmt = $this -> GetDB() -> prepare($sql);
        $stmt -> execute([$email]);
        $row = $stmt -> fetch();
        $this -> user_id = $row['UserId'];
        return $this -> user_id;
    }
    
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
            if ($stmt -> rowCount() > 0) {
                $row = $stmt -> fetch();

                // Check if account is banned
                if ($row['AccountStatus'] == 2) {
                    return 13;
                    
                } else {
                    if (password_verify($password, $row['Password'])) {
                        // Correct password
                        return 12;
                    } else {
                        // Incorrect pasword
                        return 11;
                    }
                }
                // Account does not exist
            } else return 10;
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
            $this -> profile_likes = $row['ProfileLikes'];
            $reg_date = new DateTime($row['RegistrationDate']);
            $this -> registration_date = $reg_date -> format("d-M-Y");
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
    public function GetProfileLikes() {
        return $this -> profile_likes;
    }
    public function GetRegistrationDate() {
        return $this -> registration_date;
    }
}