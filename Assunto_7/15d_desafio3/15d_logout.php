<?php
session_start();
session_unset();
session_destroy();

header("Location: 15d_login.php");
exit;