<style>

p{
    margin: 0 0 0 !important;
}

.notfound {
    color: #1D3A5E;
    text-align: center;
    padding-top: 120px;
}

.notfound .head-404{
    display:inline !important; 
    font-size: 50px;
    /* font-weight: bold; */
    letter-spacing: 20px; 
    padding: 0px !important;
    margin: 0px !important;
}

.left-404{
    color: #1D3A5E;
    border-right: 2px solid #1D3A5E;
}

.right-404{
    color: #1D3A5E;
    padding: 0;
    padding-left: 20px !important;
}

.head-right-404 {
    letter-spacing: 3px;
    font-size: 20pt;
}

.caption-right-404 {
    letter-spacing: 1px;
    padding-top: 5px;
    font-size: 8pt;
    margin-top: -40px;
}

.caption-right-404-2 {
    font-size: 8pt;
}

.notfound button {
    font-size: 8pt;
    letter-spacing: 1px;
    height: 30px;
    width: 70px;
    color: white;
    margin-top: 10px;
    background-color: #1D3A5E;
    border-radius: 5px;
}

.notfound button:focus{
    outline: none !important;
    -webkit-box-shadow: none !important;
}

.notfound button:hover{
    cursor: pointer;
    opacity: 0.9;
}

@media (min-width: 768px) {
    .notfound .head-404{
        font-size: 200px;
    }

    .caption-right-404 {
        font-size: 13pt;
    }

    .caption-right-404-2 {
        font-size: 13pt;
    }

    .head-right-404 {
        font-size: 30pt;
    }
    
    .notfound button {
        font-size: 11pt;
        height: 35px;
        width: 90px;
        margin-top: 15px;
    }
}
</style>


<div class="notfound"> 
    <div class="">
        <center>
            <table>
                <tr>
                    <td class="left-404">
                        <p class="head-404"> 404 </p>
                    </td>
                    <td class="right-404">
                        <p class="head-right-404"> SORRY ! </p>
                        <p class="caption-right-404"> The Page You're Looking For</p>
                        <p class="caption-right-404-2"> Was Not Found </p>
                        <button id="home" type="button">Go Home</button>
                    </td>
                </tr>
            </table>
        </center>

    </div>
</div>

<script>
    var button = document.getElementById("home");
    button.addEventListener("click",function(e){
        window.location.href = "<?php echo base_url() ?>";
    },false);
 </script>