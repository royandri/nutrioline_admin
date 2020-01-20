<?php $url_lempar="".base_url()."dashboard"; ?>

<script>
var token  = localStorage.getItem("token");

if(token != null) {
    window.location = '<?php echo $url_lempar; ?>';
}
</script>

<?php

$title="Administrator Area";     
include $loadview.'login.php'; 

    
?>