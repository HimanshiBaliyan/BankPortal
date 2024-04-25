<div class="details">
<h2>Check Passbook</h2>
<form action="./php_files/acc_details.php" method="POST">
    <div class="form-pan">
        <label for="">Account No. :</label><br>
        <input type="text" id="accno" name="accno">
    </div>

    <div class="form-pan">
        <label for="">Holder Name :</label><br>
        <input type="text" id="name" placeholder="Enter Name" name="acna"><br>
    </div>

    <div class="form-pan">
        <label>Transaction Type : </label><br><br>
        
        <input type="radio" name="acc" Value="balance" checked>
        <label for="" id="acc">Check Balance</label>

        <input type="radio" name="acc" value="passbook">
        <label for="" id="acc">View Passbook Status</label>
    </div>
    <div class="form-pan">
        <input type="submit" name="new_Account">
    </div>
</form>
<div class="message-box">
    <?php
    if (isset($_GET["success"])) {
        if ($_GET["success"] == "ok") {
    ?>
            <div class="alert_msg">
                <p>Your Account Create Successfully</p>
            </div>
    <?php
        }
    }
    ?>
</div>


</div>