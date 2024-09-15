<?php

$id = $_GET["id"] ?? 0;

unset($_SESSION["cart_$id"]);
redirect_to(route("gh"));