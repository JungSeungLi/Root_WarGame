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

    if( (!(isset($_SESSION['email']))) || (!(isset($_SESSION['nickname']))) || (!(isset($_GET['idx']))) )
    {
        header('Location: ./index.php');
    }
    include "./data/DB_conn.php"; 
    $idx = $_GET['idx'];
    $sql = "select idx,title,content,date,write_user from free_board where idx=:idx";    
    $DB_q = $pdo->prepare($sql);
    $DB_q -> bindValue(':idx',$idx);
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
            <p><?php echo htmlspecialchars($result['title']); ?></p>
            <span>
                작성자 : <?php echo $result['write_user']; ?>
            </span>
        </div>

        <div class="list_que">
            <div class="queestion_content">
                <?php echo nl2br(htmlspecialchars($result['content'])); ?>
            </div>
            
            <div id="down_layout">
            <?php
                if($_SESSION['nickname'] === $result['write_user'])
                {
            ?>
                <button onclick = "location.href = './free_board_edit.php?idx=<?php echo $result['idx']; ?>' " class="button_view">글수정</button>
                <button onclick = "location.href = './data/delete_board.php?idx=<?php echo $result['idx']; ?>' " class="button_view">삭제</button>
            <?php
                }
            ?>
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