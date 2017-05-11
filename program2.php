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
            <span>주니어 소프트웨어</span>
        </div>

        <div class="sub_imfo">
            <p>겨울학교</p>
            <span>
                중학생 대상 프로그래밍 강의 프로그램
            </span>
        </div>

        <div class="main_imfo">
            <p>SDHS 주니어 소프트웨어</p>
        </div>

        <div class="program_imfo">
            <span>매년 겨울방학에 진행됩니다.</span>
            <div class="sun"></div><br><br>
            <span>SDHS 주니어 소프트웨어는 예비 고1을 대상으로 서울디지텍고등학교 해킹보안동아리<br><br>Root 부원들이 기초 프로그래밍 강의 및 팀 멘토링를 하는 프로그램입니다. <br><br>매년 겨울에 진행됩니다. 2학년 학생이 발표를 하며 1학년 학생들이 멘토를 맡는 식으로<br><br>프로그램이 진행됩니다. Root 6기 멤버들이 주니어소프트웨어 1기를 처음으로 진행<br><br>하였습니다.</span>
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