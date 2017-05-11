<!doctype html>
<?php
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
           <span>문제 등록</span>
        </div>
        
        <div class="sub_imfo">
            <p>업로드</p>
            <span>
                문제는 링크는 가급적 Root Google 드라이브로 웹 주소는 HTTP://넣고!
            </span>
        </div>
        
        <div class="main_imfo">
            <p>정보 입력</p>
            
            <form action="./data/upload.php" method="post" class="uploads">
                <select name="track">
                    <option value="reversing">리버스 엔지니어링</option>
                    <option value="forensic">사이버 포렌식</option>
                    <option value="pwnable">포너블</option>
                    <option value="web">웹 해킹</option>
                </select>
                <input type="text" name="que_name" placeholder="문제 제목" required>
                <input type="text" name="answer" placeholder="정답 입력" required>
                <textarea placeholder="내용 입력" name="content" required></textarea>
                <input type="text" name="down_link" placeholder="다운로드 경로(Google 드라이브 추천)" required>
                <input type="submit" value="문제등록">
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