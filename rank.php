<!doctype html>
<?php
    include "./data/DB_conn.php";
    $status = session_status();
    if($status == PHP_SESSION_NONE){
        //There is no active session
        session_start();
    }else
    if($status == PHP_SESSION_DISABLED){
        //Sessions are not available
    }else
    if($status == PHP_SESSION_ACTIVE){
        //Destroy current and start new one
        session_destroy();
        session_start();
    }

    $sql = "select nickname,resolve from user_imf ORDER BY resolve DESC LIMIT 50"; 
    $DB_q = $pdo->query($sql);
    $result = $DB_q -> fetchAll();
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="Generator" content="EditPlus®">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <title>Root WarGame</title>
    <link href="css/common.css" rel="stylesheet" type="text/css" />
    <link href="css/layout.css" rel="stylesheet" type="text/css" />
    <link href="css/modal.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="./js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="./js/gnb.js"></script>
    <script src="js/val_check.js" type="text/javascript"></script>
</head>

<body>
    <header>
        <?php
            include "./site_title_user.php";
            include "./menu.php";
        ?>


    </header>

    <section>
        <div id="title">
            <span>워게임 랭킹</span>
        </div>

        <div class="sub_imfo">
            <p>개인전</p>
            <span>
                TOP 50 까지 랭킹에 등록 됩니다
            </span>
        </div>

        <div class="main_imfo">
            <p>랭킹 Top50</p>

            <table>
                <tr class="table_col">
                    <td class="table_col_first">순위</td>
                    <td>닉네임</td>
                    <td>해결한 문제수</td>
                </tr>
                <?php
                    $rank = 1;
                    foreach($result as $row)
                    {
                ?>
                    <tr class="table_col">
                        <td class="table_col_first"><?php echo $rank; ?></td>
                        <td><?php echo htmlspecialchars($row['nickname']); ?></td>
                        <td><?php echo htmlspecialchars($row['resolve']); ?></td>
                    </tr>
                <?php
                    $rank++;
                    }
                ?>

            </table>
        </div>

        <?php
            include "./footer.php";
        ?>

    </section>
    <?php
            include "./user_imfo_form.php";
        ?>
</body>

</html>