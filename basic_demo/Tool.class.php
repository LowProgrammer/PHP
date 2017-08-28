<?php  

	final class Tool{
		static public function _alertLocation($_info,$_url){
			echo "<script type=\"text/javascript\">alert('$_info');location.href='$_url';</script>";
		}

		static public function _alertBack($_info){
			echo "<script type=\"text/javascript\">alert('$_info');history.back();</script>";
		}


	}
?>