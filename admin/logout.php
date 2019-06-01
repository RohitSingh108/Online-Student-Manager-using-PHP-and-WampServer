<?php

session_start();

session_destroy();

header('location:../login.php'); //session destroyed and redirected to login page








?>