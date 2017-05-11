<div id="wrap">
    <div class="top_wrap">
        <div id="gnb">
            <div class="gnb_wrap">
                <ul id="gnb_menu">
                    <li id="menu01"><a href="./introduce.php" class="dep01">Root WarGame</a>
                        <div id="dep02_01" class="dep02">
                            <div class="sub_nav">
                                <div class="sub_rt_nav">
                                    <ul class="dep02_nav">
                                        <li><a href="./introduce.php">Root 소개</a></li>
                                        <li><a href="./say_god.php">부장 선생님 말씀</a></li>
                                        <li><a href="./wargame_imf.php">WarGame 소개</a></li>
                                    </ul>
                                    <ul class="dep02_nav">
                                        <li><a href="./program1.php">해킹보안 전문가 예비학교</a></li>
                                        <li><a href="./program2.php">SDHS 주니어 소프트웨어</a></li>
                                        <li><a href="./program3.php">교내 해킹보안 대회</a></li>
                                        <li><a href="./program4.php">교내 취약점 보고 대회</a></li>
                                    </ul>
                                    <ul class="dep02_nav">
                                        <li><a href="./reversing.php">시스템</a></li>
                                        <ul class="dep03">
                                            <li><a href="./reversing.php">리버스 엔지니어링</a></li>
                                            <li><a href="./forensic.php">사이버 포렌식</a></li>
                                            <li><a href="./pwnable.php">포너블</a></li>
                                        </ul>
                                        <li><a href="./webhacking.php">웹</a></li>
                                        <ul class="dep03">
                                            <li><a href="./webhacking.php">웹 해킹</a></li>
                                        </ul>
                                    </ul>
                                    <ul class="dep02_nav">
                                        <li><a 
                                               <?php
                                                    if(isset($_SESSION['email']))
                                                    {
                                               ?>
                                                    href="#answer"
                                               <?php
                                                    }
                                                    else
                                                    {
                                               ?>
                                                    href="javascript:alert('로그인 해주세요');"
                                               <?php
                                                    }
                                               ?>
                                            >정답입력</a></li>
                                        
                                        <li><a href="./board.php">자유게시판</a></li>
                                        <li><a href="./rank.php">랭킹</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li id="menu02"><a href="./program1.php" class="dep01">Program</a>
                        <div id="dep02_02" class="dep02">
                            <div class="sub_nav">
                                <div class="sub_rt_nav">
                                    <ul class="dep02_nav">
                                        <li><a href="./introduce.php">Root 소개</a></li>
                                        <li><a href="./say_god.php">부장 선생님 말씀</a></li>
                                        <li><a href="./wargame_imf.php">WarGame 소개</a></li>
                                    </ul>
                                    <ul class="dep02_nav">
                                        <li><a href="./program1.php">해킹보안 전문가 예비학교</a></li>
                                        <li><a href="./program2.php">SDHS 주니어 소프트웨어</a></li>
                                        <li><a href="./program3.php">교내 해킹보안 대회</a></li>
                                        <li><a href="./program4.php">교내 취약점 보고 대회</a></li>
                                    </ul>
                                    <ul class="dep02_nav">
                                        <li><a href="./reversing.php">시스템</a></li>
                                        <ul class="dep03">
                                            <li><a href="./reversing.php">리버스 엔지니어링</a></li>
                                            <li><a href="./forensic.php">사이버 포렌식</a></li>
                                            <li><a href="./pwnable.php">포너블</a></li>
                                        </ul>
                                        <li><a href="./webhacking.php">웹</a></li>
                                        <ul class="dep03">
                                            <li><a href="./webhacking.php">웹 해킹</a></li>
                                        </ul>
                                    </ul>
                                    <ul class="dep02_nav">
                                        <li><a 
                                               <?php
                                                    if(isset($_SESSION['email']))
                                                    {
                                               ?>
                                                    href="#answer"
                                               <?php
                                                    }
                                                    else
                                                    {
                                               ?>
                                                    href="javascript:alert('로그인 해주세요');"
                                               <?php
                                                    }
                                               ?>
                                            >정답입력</a></li>
                                        
                                        <li><a href="./board.php">자유게시판</a></li>
                                        <li><a href="./rank.php">랭킹</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li id="menu03"><a href="./reversing.php" class="dep01">Challenge</a>
                        <div id="dep02_03" class="dep02">
                            <div class="sub_nav">
                                <div class="sub_rt_nav">
                                    <ul class="dep02_nav">
                                        <li><a href="./introduce.php">Root 소개</a></li>
                                        <li><a href="./say_god.php">부장 선생님 말씀</a></li>
                                        <li><a href="./wargame_imf.php">WarGame 소개</a></li>
                                    </ul>
                                    <ul class="dep02_nav">
                                        <li><a href="./program1.php">해킹보안 전문가 예비학교</a></li>
                                        <li><a href="./program2.php">SDHS 주니어 소프트웨어</a></li>
                                        <li><a href="./program3.php">교내 해킹보안 대회</a></li>
                                        <li><a href="./program4.php">교내 취약점 보고 대회</a></li>
                                    </ul>
                                    <ul class="dep02_nav">
                                        <li><a href="./reversing.php">시스템</a></li>
                                        <ul class="dep03">
                                            <li><a href="./reversing.php">리버스 엔지니어링</a></li>
                                            <li><a href="./forensic.php">사이버 포렌식</a></li>
                                            <li><a href="./pwnable.php">포너블</a></li>
                                        </ul>
                                        <li><a href="./webhacking.php">웹</a></li>
                                        <ul class="dep03">
                                            <li><a href="./webhacking.php">웹 해킹</a></li>
                                        </ul>
                                    </ul>
                                    <ul class="dep02_nav">
                                        <li><a 
                                               <?php
                                                    if(isset($_SESSION['email']))
                                                    {
                                               ?>
                                                    href="#answer"
                                               <?php
                                                    }
                                                    else
                                                    {
                                               ?>
                                                    href="javascript:alert('로그인 해주세요');"
                                               <?php
                                                    }
                                               ?>
                                            >정답입력</a></li>
                                        
                                        <li><a href="./board.php">자유게시판</a></li>
                                        <li><a href="./rank.php">랭킹</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li id="menu04"><a href="" class="dep01">Other</a>
                        <div id="dep02_04" class="dep02">
                            <div class="sub_nav">
                                <div class="sub_rt_nav">
                                    <ul class="dep02_nav">
                                        <li><a href="./introduce.php">Root 소개</a></li>
                                        <li><a href="./say_god.php">부장 선생님 말씀</a></li>
                                        <li><a href="./wargame_imf.php">WarGame 소개</a></li>
                                    </ul>
                                    <ul class="dep02_nav">
                                        <li><a href="./program1.php">해킹보안 전문가 예비학교</a></li>
                                        <li><a href="./program2.php">SDHS 주니어 소프트웨어</a></li>
                                        <li><a href="./program3.php">교내 해킹보안 대회</a></li>
                                        <li><a href="./program4.php">교내 취약점 보고 대회</a></li>
                                    </ul>
                                    <ul class="dep02_nav">
                                        <li><a href="./reversing.php">시스템</a></li>
                                        <ul class="dep03">
                                            <li><a href="./reversing.php">리버스 엔지니어링</a></li>
                                            <li><a href="./forensic.php">사이버 포렌식</a></li>
                                            <li><a href="./pwnable.php">포너블</a></li>
                                        </ul>
                                        <li><a href="./webhacking.php">웹</a></li>
                                        <ul class="dep03">
                                            <li><a href="./webhacking.php">웹 해킹</a></li>
                                        </ul>
                                    </ul>
                                    <ul class="dep02_nav">
                                        <li><a 
                                               <?php
                                                    if(isset($_SESSION['email']))
                                                    {
                                               ?>
                                                    href="#answer"
                                               <?php
                                                    }
                                                    else
                                                    {
                                               ?>
                                                    href="javascript:alert('로그인 해주세요');"
                                               <?php
                                                    }
                                               ?>
                                            >정답입력</a></li>
                        
                                        <li><a href="./board.php">자유게시판</a></li>
                                        <li><a href="./rank.php">랭킹</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>