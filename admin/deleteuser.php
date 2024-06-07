<?php

$delid = $_GET['id'];

require('../db/conn.php');
$sql_str = "delete from admins where id=$delid";
mysqli_query($conn, $sql_str);

header("location: listusers.php");