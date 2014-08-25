
<?php $this->load->view(CLIENT_HEADER); ?>
<div class="row container-fluid">
    <div class="col-sm-10 col-md-10 col-xs-12">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page_title">Profile</h1>
            </div>
        </div>

        <div class="row mt20">
            <div class="col-sm-12 col-md-12 mb20">
                <h3 class="tcol_darkblue"> <?php echo session('full_name') ?>, let's get started on your profile </h3>
            </div>

            <form class="pre_profile" id="pre_registration_form" onsubmit="return false;">

                <div class="col-sm-2 col-md-2">
                    <div class="profile_bluecircle pull-right"> 1</div>
                </div>

                <div class="col-sm-10 col-md-10 mb20">
                    <div class="f_18 tcol_darkblue mb10">What level of education are you looking for?</div>
                    <?php 
                            if($master_degree)
                            {
                                foreach($master_degree as $master)
                                {
									
									  $checked       = '';
									  if($master["id"]== "1")
									  $checked = 'checked';
                                    echo '<input '.$checked.' type="radio" name="int_degree"  id="int_degree_'.$master['id'].'"  value="'.$master['id'].'"> <label for="int_degree_'.$master['id'].'">'.$master['degree_name'].'</label> ';
                                }
                            }
                        ?>
                </div>
                <div class="clearfix"></div>

                <div class="col-sm-2 col-md-2">
                    <div class="profile_redcircle pull-right"> 2</div>
                </div>

                <div class="col-sm-10 col-md-10 mb20">
                    <div class="f_18 tcol_darkblue mb10">What field are you looking to study?</div>
                    <?php 
                            if($study_field)
                            {
                                foreach($study_field as $field)
                                {
                                    echo '<input type="radio" name="int_field" id="int_field_'.$master['id'].'"   value="'.$field['id'].'"> <label for="int_field_'.$master['id'].'">'.$field['field_name'].'</label> ';
                                }
                            }
                        ?>
                </div>
                <div class="clearfix"></div>

                <div class="col-sm-2 col-md-2">
                    <div class="profile_bluecircle pull-right"> 3</div>
                </div>

                <div class="col-sm-10 col-md-10 mb20">
                    <div class="f_18 tcol_darkblue mb10">Which domain are you looking to pursue?</div>

                    <select type="select" name="domain" class="form-control new-select" name="test">
                        <option value="">Domain</option>
                        <?php 
                            if($get_domain)
                            {
                                foreach($get_domain as $domain)
                                {
                                    echo '<option value="'.$domain['id'].'">'.$domain['domains_name'].'</option>';
                                }
                            }
                        ?>
                        					
                    </select>
                </div>
                <div class="clearfix"></div>

                <div class="col-sm-2 col-md-2">
                    <div class="profile_redcircle pull-right"> 4</div>
                </div>

                <div class="col-sm-10 col-md-10 mb20">
                    <div class="f_18 tcol_darkblue mb10">Country of residence</div>

                    <select type="select" name="country" class="form-control new-select" >
                        <option value="">Country name</option>
                        <?php 
                            if($country)
                            {
                                foreach($country as $con)
                                {
                                    echo '<option value="'.$con['country_id'].'">'.$con['country_name'].'</option>';
                                }
                            }
                        ?>					
                    </select>
                </div>

                <div class="clearfix"></div>

                <div class="col-sm-2 col-md-2">
                    <div class="profile_bluecircle pull-right"> 5</div>
                </div>

                <div class="col-sm-10 col-md-10 mb20">
                    <div class="f_18 tcol_darkblue mb10">Preferred destination</div>

                    <select type="select" name="preferred_destination" class="form-control new-select" >
                        <option value="">Destination</option>
                        <?php 
                            if($country)
                            {
                                foreach($country as $con)
                                {
                                    echo '<option value="'.$con['country_id'].'">'.$con['country_name'].'</option>';
                                }
                            }
                        ?>							
                    </select>
                </div>

                <div class="clearfix"></div>

                <div class="col-sm-2 col-md-2">
                </div>

                <div class="col-sm-10 col-md-10 mb20">
                    <input type="submit" value="Create my profile" class="createmyprofile">
                </div>
            </form>
        </div>

    </div>

   <div class="col-sm-2 sidebar">
			 <?php  $this->load->view(CLIENT_TICKER_VIEW);?>
			 <?php $this->load->view(CLIENT_ADS_VIEW); ?>
   </div>

</div>

<footer>
    <?php $this->load->view(CLIENT_FOOTER); ?>
</footer>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo CLIENT_SCRIPTS; ?>jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo CLIENT_SCRIPTS; ?>bootstrap.min.js"></script>
<link href="<?php echo CLIENT_CSS; ?>bootstrap-multiselect.css" rel="stylesheet">
<script src="<?php echo CLIENT_SCRIPTS; ?>bootstrap-multiselect.js"></script>
<script src="<?php echo CLIENT_SCRIPTS; ?>jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_MODULES?>client_user_module_js.js"></script>


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




</body>
</html>
