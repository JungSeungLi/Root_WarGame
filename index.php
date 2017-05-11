<!doctype html>
<?php
    include "./data/DB_conn.php";
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

    $sql = "select track,que_name,day from question ORDER BY N_ID DESC LIMIT 6";     
    
    $DB_q = $pdo->query($sql);
    $result = $DB_q -> fetchAll();

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
    <link href="./css/silder.css" rel="stylesheet" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="http://malsup.github.com/jquery.cycle2.js"></script>
    <script src="./js/val_check.js" type="text/javascript"></script>

</head>

<body>
    <header>    
        
        <?php
            include "./site_title_user.php";
            include "./menu.php";
        ?>

            <div class="cycle-slideshow" data-cycle-fx=scrollHorz data-cycle-timeout=6000>

                <div class="cycle-pager"></div>

                <img src="./img/hacker1.jpg" alt="img1">
                <img src="./img/hacker2.png" alt="img2">
                <img src="./img/hacker3.jpg" alt="img3">
                <img src="./img/hacker4.png" alt="img4">

            </div>

    </header>

    <section>
        <div class="sub_imfo">
            <p>Hacking WarGame</p>
            <span>
                Root 동아리는 서울디지텍고등학교에 있는 해킹보안 동아리 입니다. 이 Root WarGame 페이지는 학생들이 문제를 풀어보며 실력을 향상시켜 나가기<br><br> 위해 제작하였습니다. 동아리 부원들이 문제를 만들어 올리고 풀며 랭킹전으로 경쟁을 하게 됩니다.
                즐겁게 플레이 해주시기 바랍니다. 랭킹 1위에게는<br><br> 특별한 무언가가 있을 예정입니다. 설마 우리 동아리 부원이 설마 설마 꼴찌를 하겠습니까 그렇죠?........ 포렌식과 리버싱 트랙님들 ^^ 기대하겠습니다.<br><br>
            </span>
        </div>


        <div class="root_imfo">
            <div class="left_imf">
                <iframe src="http://www.youtube.com/embed/A23OhD61pgA"></iframe>
            </div>
            <div class="right_imf">
                <span>Update Information</span>
                <div class="sun"></div>
                <ul>
                    <ul>
                        <li>분야</li>
                        <li>문제이름</li>
                        <li>날짜</li>
                    </ul>
                    
                    <?php
                    foreach($result as $row)
                    {
                    ?>
                        <ul>
                            <li><?php echo htmlspecialchars($row['track']);?> </li>
                            <li><?php echo htmlspecialchars($row['que_name']);?></li>
                            <li><?php echo htmlspecialchars($row['day']);?></li>
                        </ul>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>

        <div id="sub_menu">
            <div class="icon">
                <ul>
                    <li><a href="./wargame_imf.php"><img src="img/link_img01.png" alt="img1"><br><br>
                        <span>워게임 소개</span>
                        </a>
                    </li>
                    <li><a href="./program1.php"><img src="img/link_img02.png" alt="img2"><br><br>
                        <span>프로그램</span>
                        </a>
                    </li>
                    <li><a href="reversing.php"><img src="img/link_img04.png" alt="img3"><br><br>
                        <span>문제풀기</span>
                        </a>
                    </li>
                    <li><a href="rank.php"><img src="img/link_img05.png" alt="img4"><br><br>
                        <span>랭킹확인</span>
                        </a>
                    </li>
                </ul>
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