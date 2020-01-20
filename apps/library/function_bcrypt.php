<?php
function bcrypt($password){
$options=array('cost'=>'12', 'salt' =>'VQUUdxdHwwDl6LSGm1jbeNN');
$hash=password_hash($password,PASSWORD_BCRYPT, $options);
return $hash;
}
?>