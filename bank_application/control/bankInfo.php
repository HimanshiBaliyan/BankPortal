<?php
date_default_timezone_set("Asia/Calcutta");

function createAccount($account_number, $holder_name, $dob, $account_type, $deposit_amount)
{

    $name_exp = explode(" ", $holder_name);

    $firstName = strtoupper($name_exp[0]);

    $filename = $firstName . "_" . $account_number . ".txt";

    /* Account info File */
    $file = fopen("../data_files/" . $filename, 'w') or die("Error : file can't open");
    $content = $account_number . "|" . $holder_name . "|" . $dob . "|" . $account_type;
    fwrite($file, $content) or die("Error : Can't write to file");

    /* Transation File */
    transFile("CR", $filename, $account_number, "-", $holder_name, $deposit_amount, $deposit_amount, "Deposit", "New Account");

    /* Balance File */
    balanceFile($filename, $deposit_amount);
    ?>
    <script>
        window.location.href = "../?page=create_acc&success=ok"
    </script>
    <?php
}

function transFile($tran_type, $filename, $account_number, $trans_acc_num = "-", $holder_name, $deposit_amount, $oldamount = 0, $trans_type = "", $sts = "New Account")
{
    $transation_file = "trans_" . $filename;

    $trans_file = fopen("../data_files/" . $transation_file, 'a') or die("Error : file can't open");
    $a = date(" F d, Y h:i:s A");

    if ($sts === "New Account") {
        $trans_content = "\n" . $tran_type . "|" . $account_number . "|" . $trans_acc_num . "|" . $holder_name . "|" . $a . "|New Account|0|0";
        fwrite($trans_file, $trans_content) or die("Error : Can't write to file");
    }
    if ($deposit_amount != 0) {
        $trans_content_2 = "\n" . $tran_type . "|" . $account_number . "|" . $trans_acc_num . "|" . $holder_name . "|" . $a . "|" . $trans_type . "|" . $oldamount . "|" . $deposit_amount;

        $trans_file_2 = fopen("../data_files/" . $transation_file, 'a') or die("Error : file can't open");
        fwrite($trans_file_2, $trans_content_2) or die("Error : Can't write to file");
    }
    fclose($trans_file);
}

function balanceFile($filename, $deposit_amount)
{
    $deposit_file = "bal_" . $filename;
    $d_file = fopen("../data_files/" . $deposit_file, 'w') or die("Error : file can't open");
    $d_content = $deposit_amount;
    fwrite($d_file, $d_content) or die("Error : Can't write to file");
    fclose($d_file);
}

function depositAmount($account_number, $holder_name, $balance,$sts="CR",$other_number="-")
{

    $name_exp = explode(" ", $holder_name);

    $firstName = strtoupper($name_exp[0]);
    $only_file = $firstName . "_" . $account_number . ".txt";
    $filename = "bal_" . $firstName . "_" . $account_number . ".txt";

    $file = "../data_files/bal_" . $firstName . "_" . $account_number . ".txt";
    if (file_exists($file)) {
        $read_open = fopen($file, 'r');
        $aka = (int) fread($read_open, filesize($file));
        $ob = $balance;
        $balance = $balance + $aka;
        balanceFile($only_file, $balance);
        transFile($sts, $only_file, $account_number, $other_number, $holder_name, $balance, $ob, "Deposit", "dip");
        if($sts =="CR"){
            ?>
            <script>
            window.location.href = "../?page=deposit&success=ok&amt=<?= $ob ?>&amt_two=<?= $balance ?>";
            </script> 
        <?php  
        }

    } else {
    ?>
        <script>
            window.location.href = "../?page=deposit&error=file_delete"
        </script>
        <?php
    }
}

function withdrawAmount($account_number, $holder_name, $balance,$sts="DB",$other_number="-")
{

    $name_exp = explode(" ", $holder_name);

    $firstName = strtoupper($name_exp[0]);
    $only_file = $firstName . "_" . $account_number . ".txt";
    $filename = "bal_" . $firstName . "_" . $account_number . ".txt";

    $file = "../data_files/bal_" . $firstName . "_" . $account_number . ".txt";
    if (file_exists($file)) {
        $read_open = fopen($file, 'r');
        $aka = (int) fread($read_open, filesize($file));

        if ($aka >= $balance) {
            global $ob;
            $ob = $balance;
            $balance =  $aka - $balance;
            balanceFile($only_file, $balance);
            transFile($sts, $only_file, $account_number, $other_number, $holder_name, $balance, $ob, "Widthdraw", "dip");

            if($sts =="DB"){
                ?>
                <script>
                    window.location.href = "../?page=withdraw&success=ok&amt=<?= $ob ?>&amt_two=<?= $balance ?>";
                </script> 
            <?php  
            }
        } else {
        ?>
            <script>
                window.location.href = "../?page=withdraw&error=balance_null";
            </script>
        <?php
        }

    } else {
    ?>
        <script>
            window.location.href = "../?page=withdraw&error=file_delete"
        </script>
    <?php
    }
}

function transfer($from_acno, $from_acna, $to_acno, $to_acna, $amount)
{

    // Sender name
    $from_name_exp = explode(" ", $from_acna);
    $from_first_name = strtoupper($from_name_exp[0]);
    
    // Receiver Name
    $to_name_exp = explode(" ", $to_acna);
    $to_first_name = strtoupper($to_name_exp[0]);

    // Sender File
    $sender_file = "trans_" .$from_first_name . "_" . $from_acno. ".txt";
    // Receiver File
    $receiver_file = "trans_" . $to_first_name . "_" . $to_acno . ".txt";

    $sender = "../data_files/".$sender_file;
    $receiver = "../data_files/".$receiver_file;

    if (file_exists($sender) && file_exists($receiver)) {
        withdrawAmount($from_acno, $from_acna, $amount,"Transfer",$to_acno);
        depositAmount($to_acno, $to_acna, $amount,"Receive",$from_acno);
    }else {
    ?>
        <script>
            window.location.href = "../?page=transfer&error=file_delete";
        </script>
    <?php
    }
    ?>
        <script>
            window.location.href = "../?page=transfer&success=ok&amt=<?= $amount ?>";
        </script>
<?php
}
?>