<?php
error_reporting(0);
include("object_Citizen.php");

session_start();

$method = $_POST['method'];

$method();

function UpdateCitizenProfile()
{
    include("DatabaseConnection.php");

    $sql = "alter session set NLS_DATE_FORMAT='YYYY-MM-DD'";
    $command = oci_parse($connection, $sql);
    $r = oci_execute($command, OCI_NO_AUTO_COMMIT);
    if (!$r) {
        $exception = oci_error($command);
        echo 'ERROR: ' . $exception['code'] . ' - ' . $exception['message'];
        return;
    }

    $sql = "begin CITIZEN_UPDATE_RECORD(:oldid, :id, :lastname, :firstname, :birthday, :gender, "
        . ":hometown, :province, :district, :town, :street, :phone, :oldphone, :email); end;";

    $command = oci_parse($connection, $sql);
    oci_bind_by_name($command, ':oldid', $_SESSION['CitizenProfile']->get_id());
    oci_bind_by_name($command, ':id', $_POST['id']);
    oci_bind_by_name($command, ':lastname', $_POST['lastname']);
    oci_bind_by_name($command, ':firstname', $_POST['firstname']);
    oci_bind_by_name($command, ':birthday', $_POST['birthday']);
    oci_bind_by_name($command, ':gender', $_POST['gender']);
    oci_bind_by_name($command, ':hometown', $_POST['hometown']);
    oci_bind_by_name($command, ':province', $_POST['province']);
    oci_bind_by_name($command, ':district', $_POST['district']);
    oci_bind_by_name($command, ':town', $_POST['town']);
    oci_bind_by_name($command, ':street', $_POST['street']);
    oci_bind_by_name($command, ':phone', $_SESSION['CitizenProfile']->get_phone());
    oci_bind_by_name($command, ':oldphone', $_SESSION['CitizenProfile']->get_phone());
    oci_bind_by_name($command, ':email', $_POST['email']);

    $r = oci_execute($command);
    if (!$r) {
        $exception = oci_error($command);
        echo 'ERROR: ' . $exception['code'] . ' - ' . $exception['message'];
        return;
    }

    echo 'Profile Updated!';

    include("CitizenLoadProfile.php");
}