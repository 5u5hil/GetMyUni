	 

<?php $this->load->view(CLIENT_HEADER); ?>

<div class="row">
    <div class="col-sm-12 home_search_bg" >
        <div class="home_search">
            <div class="col-md-offset-1">
                <div><h1 class="tcol_white">Make the right choice</h1></div>
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="home_search_title">Search</div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <ul class="homesearch_submenu">
                            <li><a href="javascript:;"  id="bachelors" onClick="chk_active('bachelors')">BACHELORS</a></li>
                            <li><a href="javascript:;" id="masters" class="active"  onClick="chk_active('masters')">Masters</a></li>
                            <li><a href="javascript:;" id="doctorate" onClick="chk_active('doctorate')">Doctorate</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-offset-1 col-md-10 col-md-offset-1 jumbotron">
                <div class="row adv_search">
                    <div class="col-xs-12  col-md-6 left_box">
                        <h4 class="tcol_blue">Confused?</h4>
                        <h4 class="tcol_blue">Happens to the best of us. Let us help</h4>
                        <div class="cleaner_20"></div>
                        <form id="college_search_form" action="college/search" method="POST">

                            <table width="100%">
                                <tr>
                                <div class="hs_select_box">
                                    <td><div class="hs_number mr10"> 1 </div></td>
                                    <td>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label home_search_label">Select the discipline</label>
                                                    <select class="form-control new-select" name="type">
                                                        <option value="">Please select</option>
                                                        <?php
                                                        $fans = $get_field;
                                                        if (is_array($fans)) {
                                                            foreach ($fans as $val) {
                                                                ?>

                                                                <option value="<?php echo $val['field_name']; ?>"><?php echo $val['field_name']; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div><!-- col-sm-6 -->
                                        </div>
                                    </td>
                                </div>
                                </tr>
                                <tr>
                                <div class="hs_select_box">
                                    <td><div class="hs_number mr10"> 2 </div></td>
                                    <td><div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label home_search_label">Select your majors</label>
                                                    <select class="multiselect" name="course[]" multiple="multiple">

                                                        <?php
                                                        $fans = $get_domain;
                                                        if (is_array($fans)) {
                                                            foreach ($fans as $val) {
                                                                ?>

                                                                <option value="<?php echo $val['id']; ?>"><?php echo $val['domains_name']; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>           
                                                    </select>
                                                </div>
                                            </div><!-- col-sm-6 -->
                                        </div>
                                    </td>
                                </div>
                                </tr>

                                <tr>
                                <div class="hs_select_box">
                                    <td><div class="hs_number mr10"> 3 </div></td>
                                    <td><div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label home_search_label">Where would you like to study?</label>
                                                    <select class="form-control country multiselect" name="country[]" multiple="multiple">

                                                        <?php
                                                        $fans = $get_country;
                                                        if (is_array($fans)) {
                                                            foreach ($fans as $val) {
                                                                ?>

                                                                <option value="<?php echo $val['country_name']; ?>"><?php echo $val['country_name']; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>                                       
                                                    </select>
                                                </div>
                                            </div><!-- col-sm-6 -->
                                        </div>
                                    </td>
                                </div>
                                </tr>
                                <input type="hidden"  name="degree" id="degree" value="masters">
                                <tr>
                                    <td>&nbsp;</td>
                                    <td><input type="submit" value="Search" class="home_search_button"></td>
                                </tr>

                            </table>

                        </form>
                    </div>
                    <div class="col-xs-12  col-md-6 right_box">
                        <h4 class="tcol_blue">&nbsp;</h4>
                        <h4 class="tcol_blue">Already know what you want</h4>
                        <div class="cleaner_20"></div>
                        <form action="#" method="post">
                            <div class="hs_select_box">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label home_search_label">Enter School Name</label>
                                            <input type="text" name="searchinput"  class="form-control searchinput"/>
                                            <div class='shadow' id='shadow'>
                                                <select class='output' id='output' size='5' style="display:none;">
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" value="Search" class="home_search_button school_name">
                        </form>


                        <div class="adv_search_text font_sans">Wish to search for a school based on multiple criterion. Try our  intelli-advanced search</div>

                        <div class="adv_search_button" > <a href="<?php echo SITE_URL ?>college" class="advance_search"> Advanced Search </a></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row home_cat_section">
    <div class="col-sm-12">
        <div class="col-md-offset-1 col-md-10">
            <div class="row">
                <div class="col-md-3 text-center">
                    <center><a href="<?php echo CLIENT_SITE_URL ?>client_review_rating/review_rating_view"><img src="<?php echo CLIENT_IMAGES; ?>icons/review_rating.jpg" class="img-responsive"></a></center>
                    <div class="home_subtitle"><a  class="home_subtitle" href="<?php echo CLIENT_SITE_URL ?>client_review_rating/review_rating_view">Reviews & Ratings</a></div>
                    <p class="font_sans home_cat">Peer opinion/student’s voice </p>
                </div>
                <div class="col-md-3 text-center">
                    <center><a href="<?php echo CLIENT_SITE_URL ?>client_forums/forum_list_view"><img src="<?php echo CLIENT_IMAGES; ?>icons/forums.jpg" class="img-responsive"></a></center>
                    <div class="home_subtitle"><a class="home_subtitle" href="<?php echo SITE_URL ?>communities/1/">Forums</a></div>
                    <p class="font_sans home_cat">Any questions ?</p>
                </div>
                <div class="col-md-3 text-center">
                    <center><a  href="<?php echo CLIENT_SITE_URL ?>client_forums/forum_list_view"><img src="<?php echo CLIENT_IMAGES; ?>icons/communities.jpg" class="img-responsive"></a></center>
                    <div class="home_subtitle"><a class="home_subtitle" href="<?php echo CLIENT_SITE_URL ?>client_forums/forum_list_view">Communities</a></div>
                    <p class="font_sans home_cat">Meet fellow students</p>
                </div>
                <div class="col-md-3 text-center">
                    <center><a  href="<?php echo SITE_URL ?>news"><img src="<?php echo CLIENT_IMAGES; ?>icons/news.jpg" class="img-responsive"></a></center>
                    <div class="home_subtitle"><a class="home_subtitle" href="<?php echo SITE_URL ?>news">News</a></div>
                    <p class="font_sans home_cat">Know more/be aware</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="ad_space">
            <center><img src="<?php echo CLIENT_IMAGES; ?>ad1.jpg" class="img-responsive"></center>
        </div>
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

<script>
                                $(document).ready(function() {

                                    $('.multiselect').multiselect({
                                        buttonWidth: '100%',
                                        maxHeight: 300,
                                        enableFiltering: true,
                                        enableCaseInsensitiveFiltering: true,
                                        filterBehavior: 'both',
                                        selectAllValue: 'multiselect-all',
                                        includeSelectAllOption: true,
                                        selectAllText: "All"
                                    });


                                });
</script>

</body>
</html>