<?php
    include "./DB_conn.php";
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];
    $nickname = preg_replace ("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $_POST['nickname']); 

    $sql[0] = "select email from user_imf where email=:email";  
    $sql[1] = "select nickname from user_imf where nickname=:nickname";
    
    $bind_val[0] = ":email";
    $bind_val[1] = ":nickname";


    if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
    {
        echo "<script> alert('부적절한 접근입니다.\n이메일 형식이 올바르지 않습니다.'); </script>";
        echo "<script> history.go(-1); </script>";
        $pdo = null;
        exit;
    }
    else if(!preg_match("/^[A-Za-z0-9]{4,20}$/", $passwd))
    {
        echo "<script> alert('부적절한 접근입니다.\n4~20 영문,숫자로 이루어진 비밀번호를 적어주세요.'); </script>";
        echo "<script> history.go(-1); </script>";
        $pdo = null;
        exit;
    }


    for($i=0 ; $i<2 ; $i++)
    {
        $DB_q = $pdo->prepare($sql[$i]);
        $DB_q -> bindValue($bind_val[$i],($i==0) ? $email : $nickname);
        $DB_q -> execute();
        $result = $DB_q->fetch();
        $check = $result ? true : false;
        
        if($check)
        {
            switch ($i) 
            {
                case 0  : echo "<script> alert('이메일이 중복되었습니다.'); </script>";
                    break;
                case 1   : echo "<script> alert('닉네임이 중복되었습니다.'); </script>";
                    break;
                default  : echo "<script> alert('부적절한 접근입니다.'); </script>";
                    break;
            }
         
              $pdo = null;
              echo "<script> history.go(-1); </script>";
              exit;
        }
    }


    $sql = "insert into user_imf (email, passwd, nickname) values (:email, :passwd, :nickname)";
    $DB_in = $pdo->prepare($sql);
    $DB_in -> bindValue(':email',$email);
    $DB_in -> bindValue(':passwd',$passwd);
    $DB_in -> bindValue(':nickname',$nickname);
    $DB_in -> execute(); 
        
    $pdo = null;
    echo "<script> alert('회원가입 완료'); </script>";
    echo "<script> location.href='../index.php'; </script>";

?>