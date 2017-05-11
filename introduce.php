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
           <span>동아리 소개</span>
        </div>
        
        <div class="sub_imfo">
            <p>Root</p>
            <span>
                서울디지텍고등학교 해킹보안 동아리 Root 입니다.
            </span>
        </div>
        
        <div class="main_imfo">
            <p>전공분야</p>
            
            <table>
                <tr class="table_col"> 
                    <td class="table_col_first">웹 해킹</td>
                    <td>Web Service의 취약점 분석 혹은 침투테스트를 하는 분야이다.</td>
                </tr>
                
                <tr class="table_col">
                    <td class="table_col_first">리버스 엔지니어링</td>
                    <td>소프트웨어 시스템의 구성요소를 알아 내고, 시스템을 분석하는 기술을 공부하는 분야이다.</td>
                </tr>
                
                <tr class="table_col">
                    <td class="table_col_first">사이버 포렌식</td>
                    <td>타인의 전자 디바이스를 이용해 치킨을 주문하는 방법을 연구하는 분야이다.</td>
                </tr>
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