<!doctype html>
<?php
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

    if( (!(isset($_SESSION['email']))) || (!(isset($_SESSION['nickname']))) || (!(isset($_GET['N_ID']))) )
    {
        header('Location: ./index.php');
    }
    include "./data/DB_conn.php"; 
    $N_ID = $_GET['N_ID'];
    $sql = "select que_name,content,down_link,N_ID from question where N_ID=:N_ID";    
    $DB_q = $pdo->prepare($sql);
    $DB_q -> bindValue(':N_ID',$N_ID);
    $DB_q -> execute(); 
    $result = $DB_q -> fetch();
    $check = $result ? true : false;
    if(!$check) { header('Location: ./index.php'); }

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
    <script type="text/javascript" src="./js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="./js/gnb.js"></script>
    <link href="css/modal.css" rel="stylesheet" type="text/css" />
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
            <span>리버스 엔지니어링</span>
        </div>

        <div class="sub_imfo">
            <p><?php echo htmlspecialchars($result['que_name']); ?></p>
            <span>
                문제 내용
            </span>
        </div>

        <div class="list_que">
            <div class="queestion_content">
                <?php echo nl2br(htmlspecialchars($result['content'])); ?>
            </div>
            
            <div id="down_layout">
            <button onclick = "location.href = '<?php echo $result['down_link']; ?>' " class="button_view">다운로드</button>
            </div>
            
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