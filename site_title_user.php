<div id="userimf">
    <?php
            if(isset($_SESSION['email']))
            {
            ?>
        <a href="#">
            <?php echo htmlspecialchars($_SESSION['nickname']); ?> 님 반갑습니다.</a>
        <?php
                if(($_SESSION['email'] === "root@sdhs.kr"))
                {
            ?>
            <a href="./question_up.php">문제 등록</a>
            <a href="./question_edit_imf.php">수정</a>
            <a href="./delete.php">삭제</a>
            <?php
                }
            ?>
                <a href="./data/logout.php">로그아웃</a>
                <?php
            }
            else
            {
            ?>

                    <a href="#open">로그인</a>
                    <a href="#signup">회원가입</a>
                    <?php
            }
            ?>
</div>
<div id="logo">
    <a href="index.php"><img src="img/logo.png" alt="logo"></a>
</div>