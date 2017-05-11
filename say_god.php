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
           <span>부장 선생님 말씀</span>
        </div>
        
        <div class="sub_imfo">
            <p>고주형</p>
            <span>
                계속 공부하고 계속 배운걸 적용해야되 알겠지?
            </span>
        </div>
        
        <div class="main_imfo">
            <p>소개</p>
            
            <table>
                <tr class="table_col"> 
                    <td class="table_col_first">담당 교과</td>
                    <td>시스템 프로그래밍</td>
                </tr>
                
                <tr class="table_col">
                    <td class="table_col_first">신통력</td>
                    <td>이분의 존엄은 인간이 감히 함부로 판단할 수 없다.</td>
                </tr>
                
                <tr class="table_col">
                    <td class="table_col_first">계급</td>
                    <td>창조주(신)</td>
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