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
           <span>WarGame 소개</span>
        </div>
        
        <div class="sub_imfo">
            <p>WarGame 이란?</p>
            <span>
                해킹공부에 도움이 되는 문제들을 모아놓고 해결하는 게임
            </span>
        </div>
        
        <div class="main_imfo">
            <p>Root WarGame</p>
            
            <table>

                <tr class="table_col">
                    <td class="table_col_first">리버싱 / 포너블</td>
                    <td>시스템 취약점 분석 문제로 이루어져 있습니다.</td>
                </tr>
                
                <tr class="table_col">
                    <td class="table_col_first">사이버 포렌식</td>
                    <td>증거를 확보하는 문제로 이루어져 있습니다.</td>
                </tr>
                
                <tr class="table_col">
                    <td class="table_col_first">웹 해킹</td>
                    <td>웹 취약점 분석 문제로 이루어져 있습니다.</td>
                </tr>
                
                <tr class="table_col">
                    <td class="table_col_first">랭킹전</td>
                    <td>다른 유저와 경쟁할 수 있습니다.</td>
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