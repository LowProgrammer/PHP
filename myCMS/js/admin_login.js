/**
 * Created by node4 on 2017/8/29.
 */
function checkLogin() {
    var input=$("form[name='login'] input");
    if(input.eq(0).val()==''||input.eq(0).val().length<2||input.eq(0).val().length>20){
        alert('警告：用户名不得为空并且不得小于两位大于二十位');
        input.eq(0).focus();
        return false;
    }
    if(input.eq(1).val()==''||input.eq(1).val().length<6){
        alert('密码不得小于六位');
        input.eq(1).focus();
        return false;
    }
    if(input.eq(2).val().length!=4){
        alert('验证码必须为四位');
        input.eq(2).focus();
        return false;
    }
    return true;
}