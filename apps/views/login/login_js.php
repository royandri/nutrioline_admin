<?php
$url_lempar="".base_url()."dashboard";
?>

<script>

$(document).ready(function(){
    /*
    * Fungsi login ketika tombol signin di klik
    */
    $("#signin").click(function(){
        var form = $("#loginf")[0];
        var data = new FormData(form);
        $.ajax({
            type: "POST",
            url: "<?php echo api_url()?>user/post/login",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {
                if (data.success == 1) {
                    localStorage.setItem('token', data.data.token);
                    toastr.success(data.message);
                    window.location = '<?php echo $url_lempar; ?>';
                }else{                    
                    setTimeout(function(){ $("#loading").html(null); }, 2000);
                    toastr.warning(data.message);
                }
            },
            error: function (e) {
                console.log("ERROR : ", e);
                toastr.warning(data.message);
        
            }
        });
    })
})



/*
* Fungsi mengarahkan tombol enter ke button
* @param String (ID Input & ID Button)
*/
function keyEnter(idInput, idButton) {
    var input = document.getElementById(idInput);
    input.addEventListener("keyup", function (event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById(idButton).click();
        }
    });
}

keyEnter('username','signin');
keyEnter('password','signin');
</script>