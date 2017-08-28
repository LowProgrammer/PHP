function admin_top_nav(j) {
	for (var i = 1; i <= 5; i++) {
		$('#nav'+i).css('background-position','left bottom');
		$('#nav'+i).css('color','#fff');
	}
	$('#nav'+j).css('background-position','right bottom');
	$('#nav'+j).css('color','#3b6ea5');	
}