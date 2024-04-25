<div class="details">
    <h2>Close Account</h2>
    <form action="" method="POST"> 
        <div class="form-pan">
            <label for="">Account No. :</label><br>
            <input type="text" placeholder="Enter Account No." name="acno">
        </div>

        <div class="form-pan">
            <label for="">Holder Name :</label><br>
            <input type="text" placeholder="Enter Name" name="acna"><br>
        </div>
        <div class="form-pan">
            <input type="submit" name="close_acc">
        </div>
    </form>
    <div class="message-box">
        <?php
            if (isset(($_POST["close_acc"]))) {

                $holder_name = $_POST["acna"];
                $name_exp = explode(" ", $holder_name);
                $name = strtoupper($name_exp[0]);
                $acn = $_POST["acno"];

                $filename = $name . "_" . $acn . ".txt";
                $trans_file = "./data_files/trans_" . $filename;
                $bal_file = "./data_files/bal_" . $filename;
                $file = "./data_files/" . $filename;

                if (file_exists($file)) {
                    $balance_file = fopen($bal_file, 'r');

                    $data = fread($balance_file, filesize($bal_file));
                ?>
                    <div class="alert_msg">
                    <p>Balance in The Amount while closing : <?php echo $data ?></p>
                    </div>
                <?php
                    unlink($bal_file);
                    unlink($file);
                    unlink($trans_file);
                }
                else{
                ?>
                    <div class="alert_msg">
                    <p>Account Not Found</p>
                    </div>
                <?php
                }
            }
        ?>
    </div>
</div>



