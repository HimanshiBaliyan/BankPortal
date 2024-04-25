<div class="details">
    <h2>Transfer Amount</h2>
    <form action="./php_files/acc_details.php" method="POST"> 
        <div class="form-pan">
            <label for="">Transfer from Account No. :</label><br>
            <input type="text" placeholder="Enter Account No." name="acno1">
        </div>
        <div class="form-pan">
            <label for="">Transfer from Holder Name :</label><br>
            <input type="text" placeholder="Enter Name" name="acna1"><br>
        </div>
        <div class="form-pan">
            <label for="">Transfer to Account No. :</label><br>
            <input type="text" placeholder="Enter Account No." name="acno2">
        </div>
        <div class="form-pan">
            <label for="">Transfer to Holder Name :</label><br>
            <input type="text" placeholder="Enter Name" name="acna2"><br>
        </div>
        <div class="form-pan">
            <label for="">Amount to be deposit :</label><br>
            <input type="text" placeholder="Enter Amount" name="amount"><br>
        </div>
        <div class="form-pan">
            <input type="submit" name="transfer">
        </div>
    </form>
    <div class="message-box">
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "file_delete") {
        ?>
                <div class="alert_msg">
                    <p>Any of the Account Not Found</p>
                </div>
            <?php
            }
        } else if ($_GET["success"] == "ok") {
            ?>
            <div class="alert_msg">
                <p>Amount Is Transfer Successfully <br>transfer Amount = <?=$_GET["amt"]?></p>
            </div>
        <?php
        }
        ?>
        
    </div>
</div>



