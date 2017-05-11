<?php
    include "./DB_conn.php";
    include "./xssremove.php";
    $status = session_status();
    if($status == PHP_SESSION_NONE)
    {
           //There is no active session
        session_start();
    }
    else if($status == PHP_SESSION_DISABLED)
    {
        //Sessions are not available
    }
    else if($status == PHP_SESSION_ACTIVE)
    {
        //Destroy current and start new one
        session_destroy();
        session_start();
    }
    
    if( (!($_SESSION['email']==="root@sdhs.kr")) || (!isset($_POST['track'])))
    {
        header('Location: ../index.php');
        $pdo = null;
        exit;
    }

    $track = RemoveXSS($_POST['track']);
    $que_name = RemoveXSS($_POST['que_name']);
    $answer = $_POST['answer'];
    $down_link = $_POST['down_link'];
    $content = RemoveXSS($_POST['content']);
    $date = date("Y-m-d H:i:s");
    
    $sql = "insert into question(track,que_name,answer,down_link,day,content) values (:track,:que_name,:answer,:down_link,:date,:content)";     
        
    $DB_q = $pdo->prepare($sql);
    $DB_q -> bindValue(':track',$track);
    $DB_q -> bindValue(':que_name',$que_name);
    $DB_q -> bindValue(':answer',$answer);
    $DB_q -> bindValue(':down_link',$down_link);
    $DB_q -> bindValue(':date',$date);
    $DB_q -> bindValue(':content',$content);
    $DB_q -> execute(); 
   

    echo "<script> alert('업로드 성공.'); </script>";
    echo "<script> location.href='../index.php'; </script>";
    $pdo = null;
    
    exit;
?>