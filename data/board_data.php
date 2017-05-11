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
    
    if( (!isset($_SESSION['email'])) || (!isset($_POST['user_title'])))
    {
        header('Location: ../index.php');
        $pdo = null;
        exit;
    }

    $title = RemoveXSS($_POST['user_title']);
    $content = RemoveXSS($_POST['user_content']);
    $date = date("Y-m-d H:i:s");
    
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

    $sql = "insert into free_board(title,content,date,write_user) values (:title,:content,:date,:write_user)"; 
        
    $DB_q = $pdo->prepare($sql);
    $DB_q -> bindValue(':title',$title);
    $DB_q -> bindValue(':content',$content);
    $DB_q -> bindValue(':date',$date);
    $DB_q -> bindValue(':write_user',$_SESSION['nickname']);
    $DB_q -> execute(); 
   

    echo "<script> alert('업로드 성공.'); </script>";
    echo "<script> location.href='../index.php'; </script>";
    $pdo = null;
    
    exit;
?>