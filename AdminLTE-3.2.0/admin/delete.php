<?php

require '../config/db.php';
$id = $_GET['id'];

$sql = "DELETE FROM posts WHERE id = $id";

if (mysqli_query($connection,$sql)) {
    header ("location: index.php");
}else {
    echo "Error deleting";
};
