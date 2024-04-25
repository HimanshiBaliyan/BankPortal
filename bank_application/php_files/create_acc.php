<div class="page">
    <div class="details">

    <h2>Create Account</h2>
        <form action="./php_files/acc_details.php" method="POST">
            <div class="form-pan">
                <label for="">Account No. :</label><br>
                <input type="text" id="accno" value="<?= rand(999, 9999) ?>" readonly name="accno">
            </div>

            <div class="form-pan">
                <label for="">Holder Name :</label><br>
                <input type="text" id="name" placeholder="Enter Name" name="name"><br>
            </div>

            <div class="form-pan">
                <label for="">Date of Birth :</label><br>
                <input type="date" id="dob" name="dob"><br>
            </div>

            <div class="form-pan">
                <label>Type of Account : </label><br><br>
                <input type="radio" name="acc" Value="Saving" checked>
                <label for="" id="acc">Saving</label>
                <input type="radio" name="acc" Value="Current">

                <label for="" id="acc">Current</label>
                <input type="radio" name="acc" Value="Deposit">

                <label for="" id="acc">Deposit</label>
            </div>

            <div class="form-pan">
                <label for="">Deposit Amount:</label><br>
                <input type="text" name="amount" value="0"><br>
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

</div>