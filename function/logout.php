<?php if(!empty($_COOKIE['X'])){if(isset($_COOKIE['X'])){setcookie("X","",time() - 3600,"/",".ramity.com",false,true);header('Location:http://ramity.com');die();}}?>