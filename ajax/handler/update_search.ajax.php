<?php
include('../../classes/helper.class.php');
$Helper = new Helper();
header('Content-Type: application/json');
echo json_encode($Helper -> UpdateSearch());