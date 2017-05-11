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
    
    if((!($_SESSION['email'] === "root@sdhs.kr")) || (!isset($_POST['que_name'])) )
    {
        header('Location: ../index.php');
        $pdo = null;
        exit;
    }
    
    $N_ID = $_POST['N_ID'];
    $track = $_POST['track'];
    $que_name = RemoveXSS($_POST['que_name']);
    $down_link = $_POST['down_link'];
    $answer = $_POST['answer'];
    $content = RemoveXSS($_POST['content']);
    $date = date("Y-m-d H:i:s");
    
    $sql = "UPDATE question SET track=:track,que_name=:que_name,content=:content,answer=:answer,down_link=:down_link,day=:date WHERE N_ID=:N_ID";          
    $DB_q = $pdo->prepare($sql);
    $DB_q -> bindValue(':track',$track);
    $DB_q -> bindValue(':que_name',$que_name);
    $DB_q -> bindValue(':answer',$answer);
    $DB_q -> bindValue(':down_link',$down_link);
    $DB_q -> bindValue(':date',$date);
    $DB_q -> bindValue(':content',$content);
    $DB_q -> bindValue(':N_ID',$N_ID);
    $DB_q -> execute(); 
   
    echo "<script> alert('변경 성공.'); </script>";
    echo "<script> location.href='../index.php'; </script>";
    $pdo = null;
    
    exit;
?>