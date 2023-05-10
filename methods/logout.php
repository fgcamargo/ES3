<?php

session_start();

unset($_SESSION['id_user']);
unset($_SESSION['id_password']);

session_destroy();

header('Location: ../pages/logout.php');
