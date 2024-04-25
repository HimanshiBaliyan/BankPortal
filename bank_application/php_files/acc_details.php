<?php
include("../control/bankInfo.php");

date_default_timezone_set("Asia/Calcutta");

if (isset($_POST["new_Account"])) {
    createAccount($_POST["accno"], $_POST["name"], date("d-m-Y", strtotime($_POST["dob"])), $_POST["acc"], $_POST["amount"]);
} else if (isset($_POST["deposit"])) {
    depositAmount($_POST["accno"], $_POST["acna"], $_POST["bal"]);
} else if (isset($_POST["withdraw"])){
    withdrawAmount($_POST["accno"], $_POST["acna"], $_POST["bal"]);
} else if(isset($_POST["transfer"])){
    transfer($_POST["acno1"],$_POST["acna1"],$_POST["acno2"],$_POST["acna2"], $_POST["amount"]);
}

?>