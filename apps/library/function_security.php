<?php
function remove_spaces($string) {
$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}


function filter_injection($secure){
$filter = stripslashes(strip_tags(htmlspecialchars($secure,ENT_QUOTES)));
return $filter;
}


function enkrip($passwd){
$pre="cffweb";
$passwd="$pre$passwd";
$data=md5($passwd);
return $data;
}

function validateEmail($email) {
return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function pesan_error($pesan){
$pesan="<div id='gagal' class='alert alert-danger' role='alert'>
<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
<span class='sr-only'>Error:</span>
$pesan  
<button type='button' class='close' data-dismiss='alert'>
<i class='ace-icon fa fa-times'></i></button>
</div>
";
return $pesan;
}

function pesan_sukses_lempar($pesan,$lempar){
$pesan="<div id='sukses' class='alert alert-success'>

<strong><i class='fa fa-refresh fa-spin fa-fw'></i><span class='sr-only'>Loading...</span> $pesan</strong>

</div>
<script>
document.location.href='$lempar'
</script>
";
return $pesan;
}

function pesan_sukses($pesan){
$pesan="<div id='sukses' class='alert alert-info'>

<strong>$pesan</strong>
<button type='button' class='close' data-dismiss='alert'>
<i class='ace-icon fa fa-times'></i>
</button>

</div>
";
return $pesan;
}


?>