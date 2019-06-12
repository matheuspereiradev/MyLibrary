<?php
 
require_once '../genericos/init.php';
 
if (!isLoggedIn())
{
    header('Location: ../telas/form-login.php');
}