/**
 * Created by node4 on 2017/8/28.
 */
$(document).ready(function () {
    var title=$('#title').text();
    var a=$('.mes');
    a.removeClass('selected');
    for (var i = 0; i < a.length; i++) {

        if(a.eq(i).text()==title){
            a.eq(i).addClass('selected');
        }
    }
});
//验证add
function checkAdd() {
    var input=$("form[name='add'] input");
    if(input.eq(1).val()==''||input.eq(1).val().length<2||input.eq(1).val().length>20){
        alert('警告：用户名不得为空并且不得小于两位大于二十位');
        input.eq(1).focus();
        return false;
    }
    if(input.eq(2).val().length>200){
        alert('警告：描述信息不得大于200位');
        input.eq(2).focus();
        return false;
    }


    return true;
}
//验证update
function checkUpdateForm() {
    var input=$("form[name='update'] input");
    if(input.eq(2).val()==''||input.eq(2).val().length<2||input.eq(2).val().length>20){
        alert('警告：用户名不得为空并且不得小于两位大于二十位');
        input.eq(2).focus();
        return false;
    }
    if(input.eq(3).val().length>200){
        alert('警告：描述信息不得大于200位');
        input.eq(3).focus();
        return false;
    }

    return true;
}