<?php
    include "./DB_conn.php";  //pwd change
    $status = session_status();
    if(!isset($_POST['email'])) { header('Location: ../index.php'); }
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];
    $sql = "select email,nickname from user_imf where email=:email and passwd=:passwd";      // ID, PASSWORD CHECK QUERY  
    $day = date("Y-m-d H:i:s");
    $DB_q = $pdo->prepare($sql);
    $DB_q -> bindValue(':email',$email);
    $DB_q -> bindValue(':passwd',$passwd);
    $DB_q -> execute(); 
    
    $result = $DB_q->fetch();
    $check = $result ? true : false;
    
    if($check)
    {
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
        $_SESSION['email'] = $email;
        $_SESSION['nickname'] = $result['nickname'];
    }   
    else
    {
        echo "<script> alert('이메일 혹은 비밀번호가 일치하지 않습니다.'); </script>";
        echo "<script> location.href='../index.php'; </script>";
        $pdo = null;
        exit;
    }

    $sql = "insert into login_log (email,nick_name,day) values (:email,:nick_name,:day)";
    $DB_q = $pdo->prepare($sql);
    $DB_q -> bindValue(":email",$_SESSION['email']);
    $DB_q -> bindValue(":nick_name",$_SESSION['nickname']);
    $DB_q -> bindValue(":day",$day);
    $DB_q -> execute();

    echo "<script> location.href='../index.php'; </script>";
    $pdo = null;
    
    exit;
?>