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
    
    if( (!($_SESSION['email']==="root@sdhs.kr")))
    {
       header('Location: ./index.php');
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
           <span>문제 삭제</span>
        </div>
        
        <div class="sub_imfo">
            <p>패치</p>
            <span>
                Ak Ak....
            </span>
        </div>
        
        <div class="main_imfo">
            <p>정보 입력</p>
            <form action="./data/delete_data.php" method="post" class="uploads">
                <select name="track">
                    <option value="reversing">리버스 엔지니어링</option>
                    <option value="forensic">사이버 포렌식</option>
                    <option value="pwnable">포너블</option>
                    <option value="web">웹 해킹</option>
                </select>
                <input type="text" name="que_name_check" placeholder="삭제할 문제 제목" required>
                <input type="submit" value="문제확인">
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