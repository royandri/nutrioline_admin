<script>

var menu = {
    kategori : document.getElementById("kategori")
}

$(document).ready(function(){
    loadKategori();
    loadPrevileges(0);
    $("#kategori").change(function(){
        loadPrevileges(menu.kategori.value);
    });
    
    $("#checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    $(document).on('click', '#batal', function(){
        $.each($("input:checkbox"), function(){            
            $(this).prop("checked", false);
        });
        menu.kategori.value = 0;
    })

});

$(document).on('click', 'input[type=checkbox]', function(){

    var data = $('.'+this.className).data("role");

    var checked = false;
    var check = document.getElementsByClassName(this.className);
    var parentCheck = document.getElementsByClassName(this.className+"-1");
    var childCheck = document.getElementsByClassName(this.className.substring(0, this.className.length-2));
    
    if(data == "parent") {
        if(check[0].checked) {
            for(var i = 0; i < childCheck.length; i++) {
                childCheck[i].checked = true;
            }
        }else {
            for(var i = 0; i < childCheck.length; i++) {
                childCheck[i].checked = false;
            }
        }
    } else if(data == "child") {
        if($('.' + this.className +':checked').length == $('.'+this.className).length) {
            parentCheck[0].checked = true;
        }else if($('.' + this.className +':checked').length == 0) {
            parentCheck[0].checked = false;
        }
    }    
});

function loadKategori(){
    GI.ajaxGet({
        url : '<?php echo api_url()?>user_kategori/get_aktif',
        success : function(data) {
            $("#kategori").append("<option value='0' selected>Pilih Kategori</option>");
            data.data.forEach(element => {
                $("#kategori").append("<option value=" + element.id + ">" + element.nama + "</option>");
            });
        },error(e){
            console.log("ERROR : "+e);
        }
    })
}

function loadPrevileges(id) {
    startLoadingMask();
    const row = $("#isi-menu");
    row.html("");
    var item = "";

    GI.ajaxGet({
        url : "<?php echo api_url()?>kategori_menu/get_menu_user_kategori/"+id,
        success : function(data) {
            data.data.forEach(element => {
                var checked = "checked";
                if(element.checked != "yes") {
                    checked = "";
                }
                item = `<div class="col-md-4 col-sm-6">`;
                item = item + `<input type="checkbox" class="${element.judul.replace(" ", "")}-1" value="${element.id}" data-role="parent" ${checked} name="menu" id="checkbox-${element.id}" /> <span class="caption-check">${element.judul}</span>`;

                if(element.submenu.length == 0) {
                    item = item + `<br>`;
                }
                element.submenu.forEach(submenu => {
                    if(submenu.checked != "yes") {
                        checked = "";
                    }
                    item = item + `<div class="container">`;
                    item = item + `<input type="checkbox" data-role="child" value="${submenu.id}" class="${element.judul.replace(" ", "")}" ${checked} name="menu" id="checkbox-${submenu.id}" /> <span class="caption-check">${submenu.judul}</span>`;
                    item = item + `</div>`;
                })
                item = item + `<br></div>`;
                row.append(item);
            });
            stopLoadingMask();
        },
        error : function(e){
            console.log("Error : "+e);
            stopLoadingMask();
        }
    });
}

function postMenuKategori(){
    if(!validation()) return;  

    startLoadingMask();
    $("#simpan").prop("disabled", true);

    GI.ajaxPost({
        url: "<?php echo api_url()?>kategori_menu/update_menu",
        params : {
            id_user_kategori    : menu.kategori.value,
            id_menu             : getChecked()
        },
        success: function(data){
            $("#loading").html(data.message);
            hideNotif("loading");
            $("#simpan").prop("disabled", false);
            stopLoadingMask();
            if(data.message == 0){
                loadPrevileges(menu.kategori.value);
            }
        },
        error: function(e) {
            $("#simpan").prop("disabled", true);
            stopLoadingMask();
            console.log("Error : "+e);
        }
    })
}

function validation() {
    if(menu.kategori.value == "0" || menu.kategori.value == null){
        alert("Kategori belum dipilih !");
        return false;
    }

    if(getChecked().length < 1) {
        alert("Previleges belum dipilih !");
        return false;
    }
    return true;    
}

function getChecked() {
    var checked = [];
    $.each($("input[name='menu']:checked"), function(){            
        checked.push($(this).val());
    });

    return checked;
}



</script>