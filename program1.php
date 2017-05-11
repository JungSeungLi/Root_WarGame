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
            <span>해킹보안 전문가 예비학교</span>
        </div>

        <div class="sub_imfo">
            <p>여름학교</p>
            <span>
                중학생 대상 기술발표 프로그램
            </span>
        </div>

        <div class="main_imfo">
            <p>해킹보안 전문가 예비학교</p>
        </div>

        <div class="program_imfo">
            <span>매년 여름방학에 진행됩니다.</span>
            <div class="sun"></div><br><br>
            <span>해킹보안 전문가 예비학교는 중학생을 대상으로 서울디지텍고등학교 해킹보안동아리<br><br>Root 부원들이 기초 해킹강연 및 기술발표를 하는 프로그램입니다. 매년 여름에 진행<br><br>됩니다. 2,3 학년을 위주로 발표가 진행되지만 1학년 학생의 실력이 뛰어날경우<br><br>해당 학생이 발표를 맡게 됩니다. 나머지 학생들은 랜선 만듭시다. ^^</span>
             <div class="sun"></div>
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