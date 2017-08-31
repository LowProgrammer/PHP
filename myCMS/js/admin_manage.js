$(document).ready(function(){
	var level=$('#level').val();
	//alert(level);
	if(level) {
        $('option').eq(level - 1).attr('selected', 'selected');
        //alert('12');
    }
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
	if(input.eq(0).val()==''||input.eq(0).val().length<2){
		alert('警告：用户名不得为空并且不得小于两位');
		input.eq(0).focus();
		return false;
	}
    if(input.eq(1).val()==''||input.eq(1).val().length<6){
        alert('警告：密码不得为空并且不得小于六位');
        input.eq(1).focus();
        return false;
    }

    if(input.eq(2).val()!=input.eq(2).val()){
        alert('警告：密码不一致');
        input.eq(1).focus();
        return false;
    }
	return true;
}
//验证update
function checkUpdateForm() {
    var input=$("form[name='update'] input");
    if(input.eq(5).val()==''||input.eq(5).val().length<6){
        alert('警告：密码不得为空并且不得小于六位');
        input.eq(5).focus();
        return false;
    }
    return true;
}