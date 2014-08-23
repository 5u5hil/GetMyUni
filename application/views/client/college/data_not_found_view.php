
			<?php $this->load->view(CLIENT_HEADER);?>
          <div class="row container-fluid">
           <div class="col-sm-10 col-md-10 col-xs-12">
           		<div class="row">
                	<div class="col-sm-12">
                		<h1 class="page_title">Advanced Search</h1>
                      
                     </div>
                </div>
                
                <div class="row mt30">
				<form id="advance_search" class="filter">
                	<div class="col-sm-3 col-md-3 col-xs-12">
                  <div class="accordion" id="leftMenu">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseOne">
                                  Degree Type <i class="fa fa-caret-down pull-right"></i> 
                            </a>
                        </div>
                        <div id="collapseOne" class="accordion-body collapse" style="height: 0px; ">
                            <div class="accordion-inner">
                                <ul class="acc_submenu">
                                    <li><input type="radio" name="degree" class="degree" id="bachelors" value="bachelors" <?php if (@$_POST['degree']=="bachelors"){echo "checked = true";} ?>> <label for="bachelors">Bachelors</label> </li>
                                    <li><input type="radio" name="degree" class="degree" id="masters" value="masters" <?php if (@$_POST['degree']=="masters"){echo "checked = true";}?>> <label for="masters">Masters</label></li>
                                    <li><input type="radio" name="degree" class="degree" id="doctorate" value="doctorate" <?php if (@$_POST['degree']=="doctorate"){echo "checked = true";}?>> <label for="doctorate">Doctorate</label></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseTwo">
                                Discipline <i class="fa fa-caret-down pull-right"></i>
                            </a>
                        </div>
                        <div id="collapseTwo" class="accordion-body collapse" style="height: 0px; ">
                            <div class="accordion-inner">
                                <ul class="acc_submenu">
                                   <select type="select" class="form-control type new-select" name="type" >
							<!--option value="">Select Field</option-->
							<?php 

									$fans = $get_field;
									
									
											if(is_array($fans))
											{
												foreach($fans as $val)
												{
													
													$selected       = '';
													if( isset($_POST['type']))
													{
													   
															if(@$_POST['type'] == $val['field_name'])
																$selected       = 'selected';
																
														
													}
													echo '<option '.$selected.' value="'.$val['field_name'].'" >'.$val['field_name'].'</option>';
												}
											}
								
							?>
						</select>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseThree">
                                 Majors <i class="fa fa-caret-down pull-right"></i>
                            </a>
                        </div>
                        <div id="collapseThree" class="accordion-body collapse" style="height: 0px; ">
                            <div class="accordion-inner">
                                <div class="acc_submenu"> 
                                     <select class="multiselect course" name="course[]" multiple="multiple" ize="5" type="select" >
									 <!--option value="">Select Field</option-->
										 <?php		
											$fans = $get_domain;
											if(is_array($fans))
											{
												foreach($fans as $val)
												{
													$selected       = '';
														if( isset($_POST['course']))
														{
															foreach(@$_POST['course'] as $k1 => $v1)
															{
																if($v1 == $val['id'])
																	$selected       = 'selected';
																	
															}
														}
														echo '<option '.$selected.' value="'.$val['id'].'" >'.$val['domains_name'].'</option>';
												}
											}
										?>
									</select>
                                 </div>         
                            </div>
                         </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseFour">
                                 Country<i class="fa fa-caret-down pull-right"></i>
                            </a>
                        </div>
                        <div id="collapseFour" class="accordion-body collapse" style="height: 0px; ">
                            <div class="accordion-inner">
							<div class="acc_submenu"> 
                               <select type="select" class="form-control country multiselect" name="country[]" multiple="multiple" size="5" >
						<!--option value="">Select Country</option-->
							 <?php 

                                                            $fans = $get_country;
                                                            foreach($fans as $val) 
                                                            {
                                                                 
                                                                $selected       = '';
                                                                if( isset($_POST['country']))
                                                                {
                                                                    foreach(@$_POST['country'] as $k1 => $v1)
                                                                    {
                                                                        if($v1 == $val['country_name'])
                                                                            $selected       = 'selected';
                                                                            
                                                                    }
                                                                }
                                                                echo '<option '.$selected.' value="'.$val['country_name'].'" >'.$val['country_name'].'</option>';
                                                            }
								?>
						</select>  
							</div>           
                            </div>
                         </div>
                    </div>
                   
                    
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseSeven">
                                 Average Course Fees <i class="fa fa-caret-down pull-right"></i>
                            </a>
                        </div>
                        <div id="collapseSeven" class="accordion-body collapse" style="height: 0px; ">
                            <div class="accordion-inner">
                                <div class="acc_submenu">
                                    <select type="select" class="form-control new-select tuition" name="tuition">
										<option value="">Select Field</option>
										<option value="0 AND 25000">0-25k$</option>
										<option value="25000 AND 50000">25-50k$</option>
										<option value="50000 AND 80000">50-80k$</option>
										<option value="4">80k+ $</option>
									</select>
                                </div>                 
                            </div>
                         </div>
                    </div>
					
					
					<div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseeight">
                                 Top Schools <i class="fa fa-caret-down pull-right"></i>
                            </a>
                        </div>
                        <div id="collapseeight" class="accordion-body collapse" style="height: 0px; ">
                            <div class="accordion-inner">
                                <div class="acc_submenu">
                                      <select type="select" class="form-control new-select topschools" name="topschools">
										<option value="">Select Field</option>
										<option value="<=10">Top10</option>
										<option value="<=50">Top 50</option>
										<option value="<=100">Top 100</option>
									</select>
                                </div>                 
                            </div>
                         </div>
                    </div>
					
					<div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapsenine">
                                 Test Scores <i class="fa fa-caret-down pull-right"></i>
                            </a>
                        </div>
                        <div id="collapsenine" class="accordion-body collapse" style="height: 0px; ">
                            <div class="accordion-inner">
                                <div class="acc_submenu">
                                    <select type="select" class="form-control new-select test" name="testscores" >
										<option value="">Select Field</option>
										<option value="gmat">GMAT</option>
										<option value="gre">GRE</option>
									</select>
									<input id="amount" type="hidden" class="form-control" readonly style="border:0; color:#f6931f; font-weight:bold;" name="test_scores">
									<div id="gmat" style="display:none">
                                     <p>
											<input id="amountshow" class="form-control" readonly style="border:0; color:#f6931f; font-weight:bold;" >
                                         
                                    </p>
                            		<div class="row"><div class="col-md-4 pull-left">0</div> <div class="col-md-4"></div> <div class="col-md-4 pull-right">800</div></div>
                            		<div class="row"> <div class="col-md-12"><div id="slider-range-min" >
										
									</div></div> </div>
									
									</div>
									
									<div id="gre" style="display:none">
                                    <p>
											<input id="amountshow1" class="form-control" readonly style="border:0; color:#f6931f; font-weight:bold;" >
                                         
                                    </p>
                            		<div class="row"><div class="col-md-4 pull-left">0</div> <div class="col-md-4"></div> <div class="col-md-4 pull-right">340</div></div>
                            		<div class="row"> <div class="col-md-12"><div id="slider-range-min1" >
										
									</div></div> </div>
									</div>
                                </div>                 
                            </div>
                         </div>
                    </div>
					
					<div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseten">
                                 Verbal ability <i class="fa fa-caret-down pull-right"></i>
                            </a>
                        </div>
                        <div id="collapseten" class="accordion-body collapse" style="height: 0px; ">
                            <div class="accordion-inner">
                                <div class="acc_submenu">
                                    <select type="select" class="form-control new-select verbalability" name="verbalability" >
										<option value="">Select Field</option>
										<option value="excellent">Excellent</option>
										<option value="good">Good </option>
										<option value="average">Average</option>
									</select>
                                </div>                 
                            </div>
                         </div>
                    </div>
					
					<div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseeleven">
                                 Quant ability <i class="fa fa-caret-down pull-right"></i>
                            </a>
                        </div>
                        <div id="collapseeleven" class="accordion-body collapse" style="height: 0px; ">
                            <div class="accordion-inner">
                                <div class="acc_submenu">
                                    <select type="select" class="form-control new-select quantability" name="quantability" >
										<option value="">Select Field</option>
										<option value="excellent">Excellent</option>
										<option value="good">Good </option>
										<option value="average">Average</option>
									</select>
                                </div>                 
                            </div>
                         </div>
                    </div>
					
					
					
					<div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapsetwelve">
                                 Career Choices <i class="fa fa-caret-down pull-right"></i>
                            </a>
                        </div>
                        <div id="collapsetwelve" class="accordion-body collapse" style="height: 0px; ">
                            <div class="accordion-inner">
                                <div class="acc_submenu">
                                    <select type="select" class="form-control topsector multiselect" name="topsector[]" multiple="multiple" size="5" >
								<!--option value="">Select Career</option-->
							 <?php 

                                                            $fans = $get_topsectors;
                                                            foreach($fans as $val) 
                                                            {
                                                                 
                                                                
                                                                echo '<option  value="'.$val['id'].'" >'.$val['top_sectors'].'</option>';
                                                            }
								?>
						</select>  
                                </div>                 
                            </div>
                         </div>
                    </div>
					
                </div>
                     </div>
                	</form>
                	<div class="col-sm-9 col-md-9 col-xs-12">
                		<div class="row tcol_darkblue">
                        	<div class="col-sm-3 col-md-3">
                            	<div class="hs_number mt10">1</div> School Name <span>x</span>
                            </div>
                        	<div class="col-sm-3 col-md-3">
                            	<div class="hs_number mt10">2</div> School Name <span>x</span>
                            </div>
                        	<div class="col-sm-3 col-md-3">
                            	<div class="hs_number mt10">3</div> School Name <span>x</span>
                            </div>
                        	<div class="col-sm-3 col-md-3">
                            	<div class="compare_circle mt10">+</div> Compare
                            </div>
                        </div>
                        
                        <div class="row mt30">
                         	
                            	<div class="col-sm-2 sort">
                                 	<span>Sort By:  </span>
                                </div>
                            	<div class="col-sm-2 sort_t">
                                 	<span class="sortby"><a href="javascript:;" > <div class="sorttext">Rank </div> <div class="w_15"><div class="row"><div class="sort_by_rank" id="asc"><i class="fa fa-lg fa-caret-up col_light_blue"></i></div><div class="sort_by_rank"  id="desc"><i class="fa fa-lg fa-caret-down col_light_blue"></i></div></div></div> </a></span>
                                </div>
                            	<div class="col-sm-3 sort_t">
								<span class="sortby"><a href="javascript:;"  > <div class="sorttext">Avg Tution Fees </div> <div class="w_15"><div class="row"><div class=" sort_by_tution" id="asc"><i class="fa fa-lg fa-caret-up col_light_blue"></i></div><div class="sort_by_tution" id="desc"><i class="fa fa-lg fa-caret-down col_light_blue"></i></div></div></div></a> </span>
                                </div>
                            	<div class="col-sm-2 relevance">
                               <span class="sortby"> Relevance </span>
                                </div>
                            	<div class="col-sm-3 relevance">
                               	&nbsp;
                                </div>
                          
                       </div>
					   
					   <div id="ajax_college_list">
						<?php $this->load->view('client/college/client_ajax_college_listing_view.php')?>
					   </div>
					   
						                   
                     </div>
                </div>
                <hr/>

           </div>
           
           <div class="col-sm-2 sidebar">
           	<img src="<?php echo CLIENT_IMAGES ;?>ticker.jpg" class="mt20 img-responsive">
           	<img src="<?php echo CLIENT_IMAGES ;?>adspace2.jpg" class="mt10 img-responsive">
           	<img src="<?php echo CLIENT_IMAGES ;?>adspace3.jpg" class="mt10 img-responsive">
           	
           </div>
          
          </div>
        
        <footer>
            <?php $this->load->view(CLIENT_FOOTER);?>
        </footer>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="<?php echo CLIENT_SCRIPTS ;?>jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo CLIENT_SCRIPTS ;?>bootstrap.min.js"></script>
	<link href="<?php echo CLIENT_CSS ;?>bootstrap-multiselect.css" rel="stylesheet">
    <script src="<?php echo CLIENT_SCRIPTS ;?>bootstrap-multiselect.js"></script>
	<script src="<?php echo CLIENT_SCRIPTS ;?>jquery-ui.min.js"></script>
	
   
	 
	<script>
		$(document).ready(function() {
		
		$('.multiselect').multiselect({
		 buttonWidth: '100%',
		 maxHeight: 300,
		 enableFiltering: true,
		 enableCaseInsensitiveFiltering: true,
		 filterBehavior: 'both'
	   });
	   
		
		});
	</script>
	  
    <script>
	
	$(document).ready(function() {
	
		$(function() {
		$( "#slider-range-min1" ).slider({
		  range: "min",
		  value: 0,
		  min: 0,
		  max: 340,
		  slide: function( event, ui ) {
			$( "#amount" ).val(ui.value + " and 340-gre");
			 $( "#amountshow1" ).val(ui.value);
		  }
		});
		
	  });
	  
	  
	  		$(function() {
		$( "#slider-range-min" ).slider({
		  range: "min",
		  value: 0,
		  min: 0,
		  max: 800,
		  slide: function( event, ui ) {
			$( "#amount" ).val(ui.value + " and 800-gmat");
			 $( "#amountshow" ).val(ui.value);
		  }
		});
		
	  });
	
	 $('.test').on('change', function(e) {
		var option = $(this).val();
		//alert(option);
		if(option == "gmat")
		{
			$("#gmat").css("display", "block");
			$("#gre").css("display", "none");
			
	
	  
		}
	  if(option == "gre")
		
	  {
		$("#gre").css("display", "block");
		$("#gmat").css("display", "none");
		
	  }
	 });
	 });
  </script>
  


  </body>
</html>
