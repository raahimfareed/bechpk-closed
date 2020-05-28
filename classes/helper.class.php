<?php
require_once('dbh.class.php');

Class Helper extends Dbh {
    public function UpdateSearch() {
        $sql = "SELECT Email, ProfileImage from users";
        $data = [];
        $stmt = $this -> GetDB() -> prepare($sql);
        $stmt -> execute();
        
        while ($row = $stmt -> fetch()) {
            $data[$row['Email']] = $row['ProfileImage'];
        }

        return $data;
    }
}