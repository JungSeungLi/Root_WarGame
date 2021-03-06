<!doctype html>
<?php session_start(); ?>
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
            <span>교내 취약점 보고 대회</span>
        </div>

        <div class="sub_imfo">
            <p>교내 대회</p>
            <span>
                교내 해킹 대회
            </span>
        </div>

        <div class="main_imfo">
            <p>교내 취약점 보고 대회</p>
        </div>

        <div class="program_imfo">
            <span>진행 예정입니다.</span>
            <div class="sun"></div><br><br>
           <span>교내 취약점 보고 대회는 재학생을 대상으로 서울디지텍고등학교 해킹보안동아리<br><br>Root에서 주최하는 대회입니다. 매년 하반기에 진행되며 2,3학년 학생이 대회를<br><br>대회를 운영합니다. 기존 교내 대회랑은 다른 모의해킹 & 보고 대회입니다.</span>
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