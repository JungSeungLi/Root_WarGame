<?php
    include "./DB_conn.php";  //pwd change
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
    
    if((!($_SESSION['email'] === "root@sdhs.kr")) || (!isset($_POST['que_name_check'])) )
    {
        header('Location: ../index.php');
        $pdo = null;
        exit;
    }
    
    $track = $_POST['track'];
    $que_name_check = $_POST['que_name_check'];

    $sql = "select que_name from question where que_name=:que_name_check and track=:track";
    $DB_q = $pdo -> prepare($sql);
    $DB_q -> bindValue(":que_name_check",$que_name_check);
    $DB_q -> bindValue(":track",$track);
    $DB_q -> execute();
    $result = $DB_q->fetch();
    $check = $result ? true : false;
    if(!$check) 
    { 
        echo "<script> alert('문제가 없습니다.'); </script>";
        echo "<script> history.go(-1); </script>";
        $pdo = null;
        exit;
    }

    $sql = "delete from question where que_name=:que_name_check and track=:track";
    $DB_q = $pdo -> prepare($sql);
    $DB_q -> bindValue(":que_name_check",$que_name_check);
    $DB_q -> bindValue(":track",$track);
    $DB_q -> execute();
    
    echo "<script> alert('삭제완료.'); </script>";
    echo "<script> location.href='../index.php'; </script>";
    $pdo = null;
    exit;
?>