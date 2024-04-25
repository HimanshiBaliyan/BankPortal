<div class="details">
    <h2>Deposit Amount</h2>
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
            <label for="">Enter Amount to be Deposit:</label><br>
            <input type="text" id="name" placeholder="Enter Name" name="bal"><br>
        </div>
        <div class="form-pan">
            <input type="submit" name="deposit">
        </div>
    </form>
    <div class="message-box">
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "file_delete") {
        ?>
                <div class="alert_msg">
                    <p>Account Not Found</p>
                </div>
            <?php
            }
        } else if ($_GET["success"] == "ok") {
            ?>
            <div class="alert_msg">
                <p>Ammount Is Deposit <br>Deposit Amount = <?=$_GET["amt"]?><br>Final Amount=<?=$_GET["amt_two"]?></p>
            </div>
        <?php
        }
        ?>
    </div>
</div>