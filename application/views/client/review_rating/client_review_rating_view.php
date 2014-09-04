
<?php $this->load->view(CLIENT_HEADER); ?>
<?php $current_url = current_url() ?>
<div class="row container-fluid">
    <div class="col-sm-10 col-md-10 col-xs-12">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page_title">Search School Review</h1>
            </div>
        </div>
        <div class="row mt30">

            <?php $this->load->view(CLIENT_REVIEW_RATING_SIDE_BAR) ?>
            <div id="ajax_college_review_list">
                <div class="col-sm-9 col-md-9 col-xs-12">
                    <div class="review_rating_home">
                        <div class="row">
                            <div class="col-md-offset-2 col-sm-8 col-md-8">
                                <h1 class="tcol_white"><img src="<?php echo CLIENT_IMAGES; ?>icons/review_rating.png"> Reviews and Ratings</h1>
                                <div class="tcol_white f_16"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt50">
                        <div class="col-md-offset-1 col-sm-10 col-md-10">
                            <h3 class="tcol_grey">Recent Reviews</h3>
                            <div id="myCarousel" class="carousel slide">

                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                         <?php 
                                    
                                        $count = 1;
                                        $review = $get_review_rating;
                                        if (is_array($review)) {
                                            foreach ($review as $ans_review)
                                        {
                                        if ($count%3 == 1)
                                        {  
                                         ?>

                                         <div class="item event_<?php echo $count;?> <?php  if($count == 1) { echo 'active';} ?>">
                                             <div class="row-fluid">

                                        <?php
                                        }

                                        ?>
                                                    <div class="col-sm-4 col-md-4 col-xs-6 text-center"> 
                                                    <div class="tcol_darkblue f_16"></div>
                                                    <div class="tcol_darkblue f_16 mh66"><?php echo (strlen($ans_review["school_name"]) > 20) ? substr($ans_review["school_name"],0,20).'...' : $ans_review["school_name"];?></div> 
                                                        <div class="read_all">
                                                            <a href="<?php echo SITE_URL ?>client/client_review_rating/review_details_view/<?php echo clean_string($ans_review["school_name"]); ?>/<?php echo $ans_review["college_id"]; ?>">Read all
                                                            </a>
                                                        </div>
                                                    </div>
					<?php
                                            if ($count%3 == 0)
                                            { 
                                            echo "</div></div>";
                                            }
                                            $count++;
                                            }
                                            if ($count%3 != 1) echo "</div></div>";
                                            }

                                       ?>

                                    	


                                </div><!--/carousel-inner-->

                                <a class="left carousel-control top0" href="#myCarousel" data-slide="prev"><i class="fa fa-angle-left fa-4x tcol_grey"></i></a>
                                <a class="right carousel-control top0" href="#myCarousel" data-slide="next"><i class="fa fa-angle-right fa-4x tcol_grey"></i></a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
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
<script src="<?php echo CLIENT_SCRIPTS; ?>jquery-ui.min.js"></script>

</body>
</html>
