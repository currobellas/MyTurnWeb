<?php
session_start();
$queue = isset($_SESSION['queue']) ? $_SESSION['queue'] : [];
echo json_encode($queue);
?>
