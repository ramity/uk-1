<?php
class randomImage
{
	function generate($int)
	{
		if($int===1)//login
		{
			echo '<style>div.login{background:url("http://localhost/image/gif/'.rand(1, 39).'.gif") no-repeat scroll 0px 0px / 100% 100% #fff;}</style>';
		}
		if($int===2)//register
		{
			echo '<style>div.register{background:url("http://localhost/image/gif/'.rand(1, 39).'.gif") no-repeat scroll 0px 0px / 100% 100% #fff;}</style>';
		}
		if($int===3)//validate
		{
			echo '<style>div.validate{background:url("http://localhost/image/gif/'.rand(1, 39).'.gif") no-repeat scroll 0px 0px / 100% 100% #fff;}</style>';
		}
	}
}
?>