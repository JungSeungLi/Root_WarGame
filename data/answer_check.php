<?php
    include "./DB_conn.php";
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
    if(!(isset($_SESSION['email']))) { 
        header('Location: ../index.php');
        $pdo = null;
        exit;  
    }

    if(!(isset($_POST['answer']))) {
        header('Location: ../index.php');
        $pdo = null;
        exit; 
    
    }

    $answer = $_POST['answer'];
    $day = date("Y-m-d H:i:s");

    $sql = "select solve_name from user_imf where email=:email";     
    
    $DB_q = $pdo->prepare($sql);
    $DB_q -> bindValue(":email",$_SESSION['email']);
    $DB_q -> execute();
    $user_answer_check = $DB_q -> fetch();
    $str2 = explode(',', $user_answer_check['solve_name']);

    $sql = "select N_ID from question where answer=:answer";     
    $DB_q = $pdo->prepare($sql);
    $DB_q -> bindValue(":answer",$answer);
    $DB_q -> execute();
    $question_number = $DB_q -> fetch();

    foreach($str2 as $row)
    {
        if((int)$row === $question_number['N_ID'])
        {
            echo "<script> alert('이미 해결했습니다.'); </script>";
            echo "<script> location.href='../index.php'; </script>";
            $pdo = null;
            exit;
            break;       
        }
    }


    $sql = "select track,answer,solve,N_ID from question where 1";     
    
    $DB_q = $pdo->query($sql);
    $result = $DB_q -> fetchAll();
   

    $track = "num";

    $sql = "select solve_name,resolve from user_imf where email=:email";
    $DB_q = $pdo -> prepare($sql);
    $DB_q -> bindValue(":email",$_SESSION['email']);
    $DB_q -> execute();
    $userimf = $DB_q -> fetch();

    $sql = "insert into answer_input_log (email,name,try_answer,day) values (:email, :name, :try_answer, :day)";
    $DB_q = $pdo->prepare($sql);
    $DB_q -> bindValue(":email",$_SESSION['email']);
    $DB_q -> bindValue(":name",$_SESSION['nickname']);
    $DB_q -> bindValue(":try_answer",$answer);
    $DB_q -> bindValue(":day",$day);
    $DB_q -> execute();
    
    foreach($result as $row)
    {
        if($answer == $row['answer'])
        {
            $row['solve']++;
            $sql = "update question set solve=:solve where N_ID=:N_ID";
            $DB_q = $pdo->prepare($sql);
            $DB_q -> bindValue(":solve",$row['solve']);
            $DB_q -> bindValue(":N_ID",$row['N_ID']);
            $DB_q -> execute();
            
            $userimf['resolve']++;        
            $N_ID_data = (string)$row['N_ID'];
            
            $solve_name = $userimf['solve_name'].",".$N_ID_data;
            
            $sql = "update user_imf set resolve=:resolve,solve_name=:solve_name where email=:email";
            $DB_q = $pdo->prepare($sql);
            $DB_q -> bindValue(":resolve",$userimf['resolve']);
            $DB_q -> bindValue(":solve_name",$solve_name);
            $DB_q -> bindValue(":email",$_SESSION['email']);
            $DB_q -> execute();
            echo "<script> alert('정답입니다.'); </script>";
            echo "<script> location.href='../index.php'; </script>";
            $pdo = null;
            exit;
            break;       
        }
    }
    echo "<script> alert('오답입니다.'); </script>";
    echo "<script> location.href='../index.php'; </script>";
    $pdo = null;
    exit;

?>