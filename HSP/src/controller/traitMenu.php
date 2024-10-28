<?php
session_start();
session_unset();
session_destroy();
header('Location: /HSP/index.php');
exit();