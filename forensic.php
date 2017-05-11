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

    if( (!(isset($_SESSION['email']))) || (!(isset($_SESSION['nickname'])))  )
    {
        header('Location: ./index.php');
    }
    include "./data/DB_conn.php";
    $sql = "select que_name,solve,down_link,N_ID from question where track='forensic'";     
    
    $DB_q = $pdo->query($sql);
    $result = $DB_q -> fetchAll();

    $sql = "select solve_name from user_imf where email=:email";     
    
    $DB_q = $pdo->prepare($sql);
    $DB_q -> bindValue(":email",$_SESSION['email']);
    $DB_q -> execute();
    $user_answer_check = $DB_q -> fetch();
    $str2 = explode(',', $user_answer_check['solve_name']);
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
                <span>사이버 포렌식</span>
            </div>

            <div class="sub_imfo">
                <p>포렌식 문제모음</p>
                <span>
                문제를 풀며 짱짱 포렌서로 성장해보세요!
            </span>
            </div>

            <div class="list_que">
               <?php
            
                foreach($result as $row)
                {
            ?>
                        <button  
                        <?php
                            foreach($str2 as $row2)
                            {
                                if($row2 == $row['N_ID'])
                                {
                        ?>
                                    style="border:1px solid #FF5E00"
                        <?php
                                    break;
                                }
                                else
                                {
                        ?>
                                    onclick = "location.href = './question_view.php?N_ID=<?php echo $row['N_ID']; ?>' "
                        <?php   
                                }
                            }
                        
                    
                                
                        ?>
                        
                        
                        ><?php echo htmlspecialchars($row['que_name']); echo "[slove:".htmlspecialchars($row['solve'])."]";?></button>
            <?php
                }
            ?>
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
