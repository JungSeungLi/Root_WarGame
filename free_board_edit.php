<!doctype html>
<?php
    include "./data/DB_conn.php";
    $status = session_status();
    if($status == PHP_SESSION_NONE){
        //There is no active session
        session_start();
    }else if($status == PHP_SESSION_DISABLED){
        //Sessions are not available
    }else if($status == PHP_SESSION_ACTIVE){
        //Destroy current and start new one
        session_destroy();
        session_start();
    }
    
    if( (!isset($_SESSION['email'])) || (!isset($_GET['idx'])))
    {
        header('Location: ../index.php');
        $pdo = null;
        exit;
    }
    $idx = $_GET['idx'];
    
    $sql = "select idx,title,content,write_user from free_board where idx=:idx";    
    $DB_q = $pdo->prepare($sql);
    $DB_q -> bindValue(':idx',$idx);
    $DB_q -> execute(); 
    $result = $DB_q -> fetch();
    $check = $result ? true : false;
    if(!$check) { 
        echo "<script> alert('글이 없습니다.'); </script>";
        echo "<script> location.href='../index.php'; </script>";
        $pdo = null;
        exit;
    }
    if($result['write_user'] != $_SESSION['nickname'] )
    {
        echo "<script> alert('부적절한 접근입니다..'); </script>";
        echo "<script> location.href='../index.php'; </script>";
        $pdo = null;
        exit;
    }



?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="Generator" content="EditPlus®">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <title>Root WarGame</title>
    <link href="./css/common.css" rel="stylesheet" type="text/css" />
    <link href="./css/layout.css" rel="stylesheet" type="text/css" />
    <link href="./css/modal.css" rel="stylesheet" type="text/css" />
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
           <span>게시글 수정</span>
        </div>
        
        <div class="sub_imfo">
            <p>수정</p>
            <span>
                Ak Ak....
            </span>
        </div>
        
        <div class="main_imfo">
            <p>정보 입력</p>
            <?php
                $N_ID = $result['idx'];
                $que_name = $result['title'];
                $content = $result['content'];
                $write_user = $result['write_user'];
            ?>
                <form action="./data/board_data_edit.php" method="post" class="uploads">
                    <input type="hidden" name="idx" value="<?php echo $N_ID; ?>">
                    <input type="hidden" name="write_user" value="<?php echo $write_user; ?>">
                    <input type="text" name="que_name" placeholder="제목" value="<?php echo $que_name; ?>" required>
                    <textarea placeholder="내용 수정" name="content" required><?php echo nl2br(htmlspecialchars($content)); ?></textarea>
                    <input type="submit" value="문제수정">
                </form>
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