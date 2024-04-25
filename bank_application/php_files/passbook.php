<div class="details">
    <h2>PassBook</h2>
    <form action="" method="POST">
        <div class="form-pan">
            <label for="">Account No. :</label><br>
            <input type="text" placeholder="Enter Account No." name="accno">
        </div>

        <div class="form-pan">
            <label for="">Holder Name :</label><br>
            <input type="text" placeholder="Enter Name" name="acna"><br>
        </div>
        <div class="form-pan">
            <input type="submit" name="passbook">
        </div>
    </form>
    <?php
        if(isset($_POST["passbook"])){
            $no = $_POST["accno"];
            $name = $_POST["acna"];
            $name_exp = explode(" ", $name);

            $firstName = strtoupper($name_exp[0]);
            $filename = "trans_".$firstName."_".$no.".txt"; 
            $fname = "./data_files/".$filename;

            if(file_exists($fname)){
                $trans_file = fopen($fname, 'r'); 
                
                $data=fread($trans_file,filesize($fname));

                $line = explode("\n",$data);

            ?>
            <table cellpadding="5" style="border:1px solid #111; background-color:rgba(245, 225, 225,0.9); color:red; margin-top:50px">
                <tr>
                    <th>Trans Type</th>
                    <th>Account No.</th>
                    <th>Transfer</th>
                    <th>Holder Name</th>
                    <th>Date/Time</th>
                    <th>Type</th>
                    <th>Transcation amount</th>
                    <th>Total Amount</th>
                </tr>
                <?php
                    for($i=1;$i<count($line);$i++){
                    ?>
                        <tr>
                        <?php
                        $content = explode("|", $line[$i]);
                        for($j=0;$j<count($content);$j++){
                        ?>
                            <td style="border:1px solid #111; text-align:center; color:red;">
                            <?php
                                echo $content[$j];
                                ?>
                            </td>
                        <?php } ?>
                        </tr>
                    <?php
                    }
                    ?>
            </table>

            <?php
            }else{

                ?>
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
                } 
                ?>
            </div>
            <?php
            }
            
        }
        ?>
    
</div>