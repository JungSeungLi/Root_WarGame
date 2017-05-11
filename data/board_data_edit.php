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
    
    if( (!isset($_SESSION['email'])) || (!isset($_POST['write_user'])))
    {
        header('Location: ../index.php');
        $pdo = null;
        exit;
    }
    
    $sql = "select idx,write_user from free_board where idx=:idx";    
    $DB_q = $pdo->prepare($sql);
    $DB_q -> bindValue(':idx',$_POST['idx']);
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


    $title = RemoveXSS($_POST['que_name']);
    $content = RemoveXSS($_POST['content']);
    
    if( ($title == "") || ($content == "") )
    {
        echo "<script> alert('내용을 입력해주세요.'); </script>";
        echo "<script> location.href='../index.php'; </script>";
        $pdo = null;
        exit;
    }
    else if( ((strlen($title)) > 20) )
    {
        echo "<script> alert('제목을 20자 이내로 해주세요.'); </script>";
        echo "<script> location.href='../index.php'; </script>";
        $pdo = null;
        exit;
    }

    $sql = "update free_board set title=:title, content=:content where idx=:idx and write_user=:write_user"; 
        
    $DB_q = $pdo->prepare($sql);
    $DB_q -> bindValue(':title',$title);
    $DB_q -> bindValue(':content',$content);
    $DB_q -> bindValue(':idx',$_POST['idx']);
    $DB_q -> bindValue(':write_user',$_SESSION['nickname']);
    $DB_q -> execute();
   

    echo "<script> alert('수정 성공.'); </script>";
    echo "<script> location.href='../index.php'; </script>";
    $pdo = null;
    
    exit;
?>