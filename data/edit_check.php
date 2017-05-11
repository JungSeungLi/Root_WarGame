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

    $sql = "select que_name,answer,down_link,content,N_ID from question where que_name=:que_name_check and track=:track";
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

    echo "<form method='post' action='../question_edit_imf2.php' name='form'>";
    echo "<input type='hidden' name='que_name' value='{$result['que_name']}'>";
    echo "<input type='hidden' name='answer' value='{$result['answer']}'>";
    echo "<input type='hidden' name='down_link' value='{$result['down_link']}'>";
    echo "<textarea name='content' style='display:none;'>{$result['content']}</textarea>";
    echo "<input type='hidden' name='N_ID' value='{$result['N_ID']}'>";
    echo "<script>document.form.submit();</script>";
    echo "</form>";
    $pdo = null;
    exit;
?>