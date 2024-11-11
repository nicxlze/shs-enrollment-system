<?php
if (isset($_GET['lrn_number'])) {
    $lrn_number = $_GET['lrn_number'];
    header("Location: details.php?lrn_number=" . $lrn_number);
    exit();
} else {
    header("Location: main.php");
    exit();
}
?>
