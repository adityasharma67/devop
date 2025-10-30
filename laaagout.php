<?php
session_start();
session_up();
session_unset();
session_destroy();

header('Location: index.php');
exit();
session_start();
?>

