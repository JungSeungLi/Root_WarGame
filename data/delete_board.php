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
    
    if( (!isset($_SESSION['email'])) || (!isset($_GET['idx'])))
    {
        header('Location: ../index.php');
        $pdo = null;
        exit;
    }

    $idx = $_GET['idx'];
    
    $sql = "select idx,write_user from free_board where idx=:idx";    
    $DB_q = $pdo->prepare($sql);
    $DB_q -> bindValue(':idx',$idx);
    $DB_q -> execute(); 
    $result = $DB_q -> fetch();
    $check = $result ? true : false;
    if(!$check) { 
        echo "<script> alert('글이 없습니다.'); </script>";
        echo "<script> location.href='../index.php'; </script>";
        $pdo = null;
        exit;
    }
    if($result['write_user'] != $_SESSION['nickname'] )
    {
        echo "<script> alert('부적절한 접근입니다..'); </script>";
        echo "<script> location.href='../index.php'; </script>";
        $pdo = null;
        exit;
    }
    

    $sql = "DELETE FROM `free_board` WHERE idx=:idx"; 
        
    $DB_q = $pdo->prepare($sql);
    $DB_q -> bindValue(':idx',$idx);
    $DB_q -> execute(); 
   

    echo "<script> alert('삭제 성공.'); </script>";
    echo "<script> location.href='../index.php'; </script>";
    $pdo = null;
    
    exit;
?>