<?php
require "../db/dbBroker.php";
require "../model/Film.php";

// include('db/dbBroker.php');
// include('model/Film.php');


if (isset($_POST['id'])) {

    $status = Film::deleteById($_POST['id'], $conn);
    if ($status) {
        echo 'Success';
    } else {
        echo 'Failed';
    }
}
?>