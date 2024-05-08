<?php
session_start();
//admin going off
unset($_SESSION['adminlogin']);
//pharmacist going off
unset($_SESSION['pass']);
//patient
unset($_SESSION['patientpassword']);
//redirection page
header("location:portals.html");

?>