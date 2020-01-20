<!DOCTYPE html>
<?php $url_lempar="".base_url()."login"; ?>

<script>

var token  = localStorage.getItem("token");
if(token == null) {
    window.location = '<?php echo $url_lempar; ?>';
}

</script>