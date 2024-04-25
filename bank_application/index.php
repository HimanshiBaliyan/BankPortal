<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css" media="all">

</head>

<body>
    <div class="main">
        <div class="opt">
            <div class="panel">
                <div class="logo">
                    <a href="./">
                        <h2>CREATE <span>Bank</span></h2>
                    </a>
                </div>
                <div class="option">
                    <ul>
                        <li><a href="./?page=create_acc">Create Account</a></li>
                        <li><a href="./?page=passbook">Check Balance</a></li>
                        <li><a href="./?page=deposit">Deposit</a></li>
                        <li><a href="./?page=withdraw">Withdraw</a></li>
                        <li><a href="./?page=transfer">Transfer</a></li>
                        <li><a href="./?page=close_acc">Close Account</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="right-section">
            <div class="panel-right">
                <?php
                if (isset($_GET["page"])) {
                    include("./control/mypagefunc.php");
                ?>
                    <div class="pg">
                        <?php
                        echo mypage($_GET["page"]);
                        ?>
                    </div>
                <?php
                } else {
                ?>
                    <div class="pg">
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>