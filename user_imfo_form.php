<div class="white_content" id="open">
    <div>
        <div class="content_exit">
            <a href="#close">X</a>
        </div>
        <center>
            <p>Login</p>
            <form action="./data/login.php" method="post">
                <input type="text" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                <input type="password" name="passwd" placeholder="Password" required>
                <input type="submit" value="로그인" class="submit">
            </form>
        </center>
    </div>
</div>

<div class="white_content" id="signup">
    <div>
        <div class="content_exit">
            <a href="#close">X</a>
        </div>
        <center>
            <p>SignUp</p>
            <form action="./data/signup.php" method="post" name="signup_data" onsubmit="return signup_data_check()">
                <input type="text" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                <input type="password" name="passwd" placeholder="Password" required>
                <input type="password" name="passwd2" placeholder="Password_check" required>
                <input type="text" name="nickname" placeholder="Nickname" required>
                <input type="submit" value="회원가입" class="submit">
            </form>
        </center>
    </div>
</div>

<div class="white_content" id="answer">
    <div>
        <div class="content_exit">
            <a href="#close">X</a>
        </div>
        <center>
            <p>Answer</p>
            <form action="./data/answer_check.php" method="post">
                <input type="text" name="answer" placeholder="Input Answer" required>
            </form>
        </center>
    </div>
</div>
