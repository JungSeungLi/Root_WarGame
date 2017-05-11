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
        
            include "./data/DB_conn.php";
            $sql = "select * from free_board where 1";     

            $DB_q = $pdo->query($sql);
            $result = $DB_q -> fetchAll();
        ?>
    </header>

    <section>
        <div id="title">
           <span>게시판</span>
        </div>
        
        <div class="sub_imfo">
            <p>FREE</p>
            <span>
                자유게시판 입니다.
            </span>
        </div>
        
        <div class="main_imfo">
            <p>목록</p>
            
            <table>
                <tr class="table_col"> 
                    <td class="table_col_first">작성자</td>
                    <td>제목</td>
                    <td>날짜</td>
                </tr>
                
                <?php
                    foreach($result as $row)   
                    {
                ?>
                    <tr class="table_col"> 
                        <td class="table_col_first"><?php echo $row['write_user'] ?></td>
                        <td><a href="view_board.php?idx=<?php echo $row['idx'] ?>"><?php echo htmlspecialchars($row['title']); ?></a></td>
                        <td><?php echo $row['date'] ?></td>
                    </tr>
                <?php
                    }
                ?>
                
            </table>
            
            <div id="write_imf">
                <?php
                    if(isset($_SESSION['email']))
                    {
                ?>
                    <button type="button" onclick="location.href='./write.php' ">글작성</button>
                <?php
                    }
                ?>
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