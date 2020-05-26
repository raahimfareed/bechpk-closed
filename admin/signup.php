<?php
include('classes/admin.class.php');
$adminId = md5(uniqid('master', true));
$first = 'Raahim';
$last = 'Fareed';
$email = 'root@localhost';
$password = 'OmegaHaxR3';
$profileImg = 'assets/img/user-uploads/profile-pics/master.png';
$permissionLevel = 1;
$date = date('Y-m-d');
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

$Dbh = new Dbh();

$sql = "INSERT into `admins` (`AdminId`, `FirstName`, `LastName`, `Email`, `Password`, `ProfileImage`, `PermissionLevel`, `RegistrationDate`) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";


try {
    $stmt = $Dbh -> GetDB() -> prepare($sql);
    $stmt -> execute([$adminId, $first, $last, $email, $hashedPassword, $profileImg, $permissionLevel, $date]);
} catch(PDOException $e) {
    echo $e;
}