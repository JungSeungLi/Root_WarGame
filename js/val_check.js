function signup_data_check() {
    var email = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i;
    var passwd = /^[a-z0-9_]{4,20}$/;
    var nickname = /^[ㄱ-ㅎ|가-힣|a-z|A-Z|0-9|\*]+$/;

    if (signup_data.email.value == "") {
        alert("이메일을 입력해 주세요");
        signup_data.email.focus();
        return false;
    } else if (signup_data.passwd.value == "") {
        alert("비밀번호를 입력해 주세요");
        signup_data.passwd.focus();
        return false;
    } else if (signup_data.passwd2.value == "") {
        alert("비밀번호 확인을 입력해주세요");
        signup_data.passwd2.focus();
        return false;
    }


    if (!email.test(signup_data.email.value)) {
        alert("이메일 형식이 올바르지 않습니다.");
        signup_data.email.focus();
        return false;
    } else if (!passwd.test(signup_data.passwd.value)) {
        alert("4~20 영문,숫자로 이루어진 비밀번호를 적어주세요.");
        signup_data.passwd.focus();
        return false;
    } else if (!((signup_data.passwd.value) == (signup_data.passwd2.value))) {
        alert("비밀번호가 일치하지 않습니다.");
        signup_data.passwd2.focus();
        return false;
    } else if (!nickname.test(signup_data.nickname.value)) {
        alert("영문,숫자,한글로 이루어진 15자 이내의 닉네임를 적어주세요.");
        signup_data.nickname.focus();
        return false;
    }

    return true;

}


function user_write_check() {
    if (board.user_title.value == "") {
        alert("제목을 입력해주세요.");
        board.user_title.focus();
        return false;
    } else if (board.user_content.value == "") {
        alert("내용을 입력해주세요.");
        board.user_content.focus();
        return false;
    } else if (board.user_title.value.length > 20) {
        alert("제목을 20자 이내로 해주세요.");
        board.user_title.focus();
        return false;
    }
    

    return true;
}