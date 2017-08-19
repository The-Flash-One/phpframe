<?php
header("content-type:text/html;charset=utf-8");
class aa{
 static	function bb($ee){
		echo $ee;
	}
}
$ww = 55;
$ss = aa::bb($ww);
echo $ss;