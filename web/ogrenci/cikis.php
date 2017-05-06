<?php
session_start();
unset($_SESSION["ogrenci_no"]);
session_destroy();
header("location:../index.php");