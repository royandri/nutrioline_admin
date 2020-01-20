	
	<script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/js/jquery.form.js"></script>
			<script>
			
			$(function () {
			
				$(document).ajaxStart(function() { Pace.restart(); }); 
			
			});
			
			jQuery(document).ready(function() {
			
			
			jQuery('#btns').addClass('disabled');       
			//elements
			var progressbox     = $('#progressbox');
			var progressbar     = $('#progressbar');
			var statustxt       = $('#statustxt');
			var submitbutton    = $("#simpandata");
			var myform          = $("#form_admin");
			var output          = $("#loading");
			var completed       = '0%';
			jQuery(myform).ajaxForm({
			beforeSend: function() { //brfore sending form
			submitbutton.attr('disabled', ''); // disable upload button
			statustxt.empty();
			progressbox.slideDown(); //show progressbar                         
			output.html("<div class='alert alert-info'><i class='fa fa-refresh fa-spin fa-fw'></i><span class='sr-only'>Loading...</span>Mengecek. . .</div>"); //update element with received data
			progressbar.width(completed); //initial value 0% of progressbar
			statustxt.html(completed); //set status text
			statustxt.css('color','#000'); //initial color of status text
			},
			uploadProgress: function(event, position, total, percentComplete) { //on progress
			progressbar.width(percentComplete + '%') //update progressbar percent complete
			statustxt.html(percentComplete + '%'); //update status text
			output.html("<div class='alert alert-info'><i class='fa fa-refresh fa-spin fa-fw'></i><span class='sr-only'>Loading...</span>Mengecek. . .</div>"); //update element with received data
			if(percentComplete>50)
			{
			statustxt.css('color','#fff'); //change status text to white after 50%
			}
			},
			complete: function(response) { // on complete
			output.html(response.responseText); //update element with received data
			//myform.resetForm();  // reset form
			submitbutton.removeAttr('disabled');
			jQuery('#btns').removeClass('disabled');                        //enable submit button
			progressbox.slideUp(); // hide progressbar
			}
			});
			});
			
			
			</script>