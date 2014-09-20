<?php $this->load->view(ADMIN_HEADER);?>
		<script type="text/javascript" src="<?php echo ADMIN_MODULES?>admin_college_event_module_js.js"></script>
		<div class="pageheader">
		  <h2><i class="fa fa-home"></i>College Event<!--span>All elements to manage your School...</span--></h2>
		  <!--div class="breadcrumb-wrapper">
			<span class="label">You are here:</span>
			<ol class="breadcrumb">
			  <li><a href="index.php">GetMyUni</a></li>
			  <li class="active">Manage College</li>
			</ol>
		  </div-->
		</div>
		<?php
	// display($get_school);
	?>
			<div class="row">
		<div class="col-md-12">
 
            <form id="school_event_form">
                
                <?php
				
                   // $ans = $get_school_event_id;
                                //display($ans);
                        if($this->uri->segment(4))
                        {
                                $ans = $get_school_event_id;
                               // display($ans);
                                //display(json_decode($ans->college_logo));
                        }

		?>
                
                
            <div class="panel panel-default">
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-6">
				
				<div class="form-group">
					<label class="control-label">Event Image <span class="asterisk">*</span></label>
					
					  <div class='controls'><div id='filelist' ></div>
									<div style='clear:both;'></div>
									<div id='container'>
                                                                            <?php if(isset($ans->event_img)){ if(!empty($ans->event_img)){ $logo = $ans->event_img; $ans_file_name = (explode(".",$logo)); echo "<div class='display_image' id='main-$ans_file_name[0]'><image src='/public/admin/scripts/plugins/uploads/event_img/$logo'  height='100px' width='100px'><br><input type='hidden' id='event_img' name='event_img' id='filename' value='$logo'> <a class='remove_logo' id='$ans_file_name[0]' href='javascript:;'>Remove</a></div>";}}?>
									<br>
									<div style="clear:both;"></div>
									<a id='eventimg' href='javascript:;'><button><b>Choose File</b></button></a>
										
									</div>
									<span id="image1_err"  class="error"></span> <span id="imgerror" class="error"></span>
					</div>
					
				</div>
				
                  <div class="form-group">
                    <label class="control-label">Event Name <span class="asterisk">*</span></label>
                    <input type="text" name="event_name" class="form-control" value="<?php echo isset($ans->event_name)  ? $ans->event_name : ''?>"/>
                    <label for="name" class="error" id="event_name_err">This field is required.</label>
                  </div>
				  <div class="form-group">
                    <label class="control-label">Event Date <span class="asterisk">*</span></label>
                    <input type="text" name="event_date" class="form-control"  id="event_date" value="<?php echo isset($ans->event_date)  ? $ans->event_date : ''?>"/>
                    <label for="name" class="error" id="event_date_err">This field is required.</label>
                  </div>
				   <div class="form-group">
                    <label class="control-label">Event Location <span class="asterisk">*</span></label>
                    <input type="text" name="event_location" class="form-control" value="<?php echo isset($ans->event_location)  ? $ans->event_location : ''?>"/>
                    <label for="name" class="error" id="event_location_err">This field is required.</label>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">School Name <span class="asterisk">*</span></label>
                    <div class="ckbox ckbox-default"> 
						<select type="select" class="form-control" id="school_name" name="school_name">
						<option value="">Select School Name</option>
							<?php
								display($get_school);
								if(is_array($get_school))
								{
									foreach($get_school as $val)
									{
									
                                                                            $selected       = '';
                                                                            if( $ans != "no")
                                                                            {


                                                                                if($ans->event_school_id == $val['id'])
                                                                                        $selected       = 'selected';

                                                                                ?>
                                                                                <option <?php echo $selected;?> value="<?php echo $val['id']?>"><?php echo $val['school_name']."-".$val['field_name']?></option>
                                                      <?php
                                                                            }
							?>
										
										
							<?php		}
									
								}
								
							?>
							
						</select>
						 <!--input type="text" name="school_name" class="form-control" id="school_name"/-->
					  </div>
                    <label for="degree" class="error" id="school_name_err">This field is required.</label>
                  </div>
                     
                </div>
				
				 <input type="hidden" name="hidden_event_id" id="hidden_college_id" value="<?php echo $this->uri->segment(4);?>">
                	 <div class="clearfix"></div>
                   <div class="col-sm-4"><input type="submit" class="btn btn-danger btn-block" value="Cancel"></div>
                   <div class="col-sm-4"><input type="submit" class="btn btn-primary btn-block" id="event_btn" value="Submit"></div>
            
              </div><!-- row -->
              </div>
            </div> 
            
           </form>
        </div>
        
      </div>
			
		</div><!-- contentpanel -->
    
	</div><!-- mainpanel -->
  
	
</section>
<?php $this->load->view(ADMIN_FOOTER);?>
<script src="<?php echo ADMIN_SCRIPTS ;?>plugins/plupload.full.min.js" type="text/javascript"></script>
<script type="text/javascript">
// Custom example logic
$(function() {
        var site_url                                                            = '<?php echo SITE_URL?>';//$("#hidden_site_url").val(); 
        var uploader                                                            = new plupload.Uploader({
        runtimes                                                                : 'gears,html5,flash,silverlight,browserplus',
        browse_button                                                           : 'eventimg',
        container                                                               : 'container',
        max_file_size                                                           : '10mb',
        url                                                                     : '<?php echo ADMIN_SCRIPTS ;?>plugins/upload.php/?image_type=event_img',//site_url+'admin/breed/process_image',
        flash_swf_url                                                           : site_url+'ui/admin/scripts/plugin/plupload/js/plupload.flash.swf',
        silverlight_xap_url                                                     : site_url+'ui/admin/scripts/plugin/plupload/js/plupload.silverlight.xap',
        filters : [
                {title : "Image files", extensions : "jpg,gif,png,jpeg"},
                {title : "Zip files", extensions : "zip"},
                //{title : "Video files", extensions : "mp4"}
        ],
        resize                                                          : {width : 768, height : 500, quality : 100}
	});

	uploader.bind('Init', function(up, params) {
		//$('#filelist').html("<div>Current runtime: " + params.runtime + "</div>");
	});

	$('#eventimg').click(function(e) {
		uploader.start();
		e.preventDefault();
	});

	uploader.init();

	uploader.bind('FilesAdded', function(up, files) {
           
            
                $.each(files, function(i, file) {
                                $('#filelist').append(
                                        '<div class="images temp_class"   id="' + file.id + '" style="float:left;margin-right:10px;">  <b></b>' +
                                '</div>');
                                });
            
            
                                
		uploader.start();
                uploader.refresh();
                //setTimeout(function () { up.start(); });
		//up.refresh(); // Reposition Flash/Silverlight
	});

	uploader.bind('UploadProgress', function(up, file) {
            //alert('test');
		$('#' + file.id + " b").html(file.percent + "%");
           
	});

	uploader.bind('Error', function(up, err) {
		$('#filelist').append("<div>Error: " + err.code +
			", Message: " + err.message +
			(err.file ? ", File: " + err.file.name : "") +
			"</div>"
		);

		up.refresh(); // Reposition Flash/Silverlight
	});

	uploader.bind('FileUploaded', function(up, file,info) {
                var obj = JSON.parse(info.response);
		$('#' + file.id + " b").html("100%");
		$('#' + file.id ).html('<img src="ui/admin/images/ajax-loader.gif">');
                var image_width                                                         = $("#hidden_image_width").val();
                var image_height                                                        = $("#hidden_image_height").val();
        
                //alert(site_url);
                //alert(image_width+image_height);
                var filename                                                    = obj.result.cleanFileName;              
                $.ajax({
                    type                                                        : 'POST',
                    url                                                         : '<?php echo ADMIN_SCRIPTS ;?>plugins/file_rename_resize.php',
                    data                                                        : {filename:filename,file_id:file.id,filetype:'eventimg',site_url:'<?php echo SITE_URL;?>'},
                    dataType                                                    : 'json',        
                    success: function(data)
                    {
                        value                                                   = eval(data);
						//alert(value.image);
                        $('#' + file.id ).html('');
                        $('#' + file.id).removeClass("temp_class");
						$('#' + file.id  ).html(value.image);
                        if(value.error == 'success')
                        {
                           
                           $('#' + file.id  ).html(value.image);
                             $('#image_err').html('');
                        }
                        else
                        {
                            $('#image_err').html(value.image);
                        }
                        
                    }
                });
               
	});
        
        
        
});

</script>
   <link href="<?php echo CLIENT_CSS; ?>jquery-ui.css" rel="stylesheet">
<script src="<?php echo CLIENT_SCRIPTS ;?>jquery-ui.min.js"></script>

 
