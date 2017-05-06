<?php
session_start();
unset($_SESSION["akademik"]);
session_destroy();
header("location:../index.php");