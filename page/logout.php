<?php
include "../include/common.php";
session_start();
unset($_SESSION["username"]);
redirect_to("/page/login.php");