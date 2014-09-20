<?php $this->load->view(CLIENT_HEADER); ?>
<?php $members = json_decode($community[0]["members"], true) ?>
<div class="row container-fluid">
    <div class="col-sm-10 col-md-10 col-xs-12">
        <div class="row">
            <div class="col-sm-7"> 
                <div class="btn btn-sm"><a class="btn_back back_page" onclick="javascript:history.go(-1)" ><i class="fa fa-caret-left col_light_blue"></i> Back</a></div>
            </div>
            <div class="col-sm-3">
                <div class="btn btn-sm invite_members"> <a href="javascript:void();"  class="inviteM">Invite Members </a></div>
            </div>
            <div class="col-sm-2">
                <div class="create_communities_but pull-right"><a href="javascript:void();" data-cid="<?= $community[0]["id"] ?>" class="<?= in_array(session("client_user_id"), $members) ? "unjoin" : "join" ?>"> <i class="fa fa-<?= in_array(session("client_user_id"), $members) ? "minus" : "plus" ?>"></i> <?= in_array(session("client_user_id"), $members) ? "Leave" : "Join" ?></a> </div>                            
            </div>
        </div>
        <div class="row mt50">
            <div class="col-sm-2 col-md-2 col-xs-12 "> <img src="<?= $community[0]["pic"] != '' ? SITE_URL . 'uploads/comm_pics/' . $community[0]["pic"] : CLIENT_IMAGES . "default_community.jpg" ?>" class="communityimg"> </div>
            <div class="col-sm-8 col-md-8 col-xs-12 ">
                <h3 class="tcol_darkblue mt0"><?= $community[0]["cname"] ?></h3>
                <p class="tcol_grey text-justify"> <?= $community[0]["desc"] ?> </p>
            </div>
        </div>
        <hr>
              <!--Members-->
        <div class="row mt30">
            <div class="col-sm-3 col-md-3 col-xs-12 ">
                <h3 class="tcol_darkblue mt0">Members</h3>
                <div class="f_16 tcol_grey"> <span class="mnum f_24 col_light_blue"><?= count($members) ?></span> member<span class="plural"><?= count($members) > 1 ? '(s)' : '' ?></span> in this group</div>
            </div>
            <div class="col-sm-9 col-md-9 col-xs-12 ">
            	<div class="row">
        	<div class="col-sm-12">
                    <?php if(!empty($members)) {?>
            <div class="owl-wrapper">
              <div id="owl-example" class="owl-carousel">
  
  
   <?php
                            foreach ($members as $memeber) {
                                $udetails = get_user_details($memeber);
                                //display($udetails);
                                $name = $udetails[0]["name"];
                                //$pic = json_decode($udetails[0]["profile_pic"], true);
                                //$pic = $pic[0];
                                $pic =  $pro_pic = stripslashes(str_replace(array("[", "]", "(", ")"), " ", $udetails[0]["profile_pic"]));
                                ?> 
                                <div class="item"> <a href="<?php echo SITE_URL ?>client/client_user/user_show_profile/<?php echo $memeber; ?>" class="thumbnail text-center" target ="_blank"> <img src= <?= $pic ? $pic : CLIENT_IMAGES . "defaultuser.jpg"; ?> alt="Image" class="img-responsive stprof"> <span class="tcol_dark_blue f_16"><?= $name ?></span> </a> </div>
                            <?php }
                            ?>

</div>
 
<div class="customNavigation">
  <a class="btn prev owl-prev"><i class="fa fa-angle-left fa-4x tcol_grey"></i></a>
  <a class="btn next owl-next"><i class="fa fa-angle-right fa-4x tcol_grey"></i></a>
</div>
</div>
                    <?php 
                    }
                    
                    else {

                            echo "<div class='col-sm-12 alert alert-info'>No Members Yet!</div>";
                    }
                        
                    ?>
                
                </div>
        </div>
            
                
            </div>
        </div>
        <!--Members-->
        <hr>
        <!--Members-->
        <div class="row mt30">
            <div class="col-sm-3 col-md-3 col-xs-12 ">
                <h3 class="tcol_darkblue mt0">Events</h3>
                <div class="create_communities_but mt90 create_cm" data-target="#<?= session('client_user_id') ? in_array(session("client_user_id"), $members) ? "create_event" : "myModalJoin"  : "myModalLogin" ?>" data-toggle="modal"><a href=javascript:void();> <i class="fa fa-plus"></i> Create Events</a> </div>

                <div class="modal fade" id="myModalJoin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close pull-right" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h3 class="modal-title tcol_darkblue mb10" id="myModalLabel">Join!</h3>
                                Please 
                                <a href="javascript:void();" data-ce="1" data-cid="<?= $community[0]["id"] ?>" class="<?= in_array(session("client_user_id"), $members) ? "unjoin" : "join" ?>"> <i class="fa fa-<?= in_array(session("client_user_id"), $members) ? "minus" : "plus" ?>"></i> <?= in_array(session("client_user_id"), $members) ? "Leave" : "Join" ?></a>                            
                                the community First 
                                <!--                                <div class="form-group mt10">
                                                                    <div class="col-sm-4">
                                                                        <input type="button" value="Cancel" class="closeM btn btn-default">
                                                                    </div>
                                                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>




                <div class="modal fade" id="create_event" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-body">
                                <button type="button" class="close pull-right" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h3 class="modal-title tcol_darkblue mb30" id="myModalLabel">Event Name</h3>
                                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?= CLIENT_SITE_URL ?>client_communities/event_insert/">
                                    <div class="form-group">
                                        <label for="name" class="col-sm-3 control-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="name" name="ename" placeholder="Type name" required/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="shortdesc" class="col-sm-3 control-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="desc" required> </textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="where" class="col-sm-3 control-label">Where</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="where" name="location" placeholder="where" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="datetime" class="col-sm-3 control-label">Date</label>
                                        <div class="col-sm-9">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="date" maxlength="10" class="form-control" name="edate" id="date" placeholder="date" min="<?= date("Y-m-d"); ?>" required/>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="time"  name="etime"placeholder="time" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="where" class="col-sm-3 control-label">Event Picture</label>
                                        <div class="col-sm-9">
                                            <input type="file" id="file" name="file" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <input type="hidden" name="cid" value="<?= $community[0]["id"] ?>" />
                                            <input type="hidden" name="uriseg" value="<?= $this->uri->segment(2, 0) ?>" />
                                            <input type="submit" value="Create" class="home_search_button">
                                            <input type="button" value="Cancel" class=" closeM btn btn-default">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 col-md-9 col-xs-12 ">
                <?php  if (!empty($events)) {?>
<div class="owl-wrapper">

               <div id="owl-example2" class="owl-carousel1">
                    
                        <?php
                       
                            foreach ($events as $event) {
                                ?>
                                 <div class="item">
                                    
                                        <div class="thumbnail">
                                            <div class="event_icon1"> <img src="<?= $event["pic"] != '' ? SITE_URL . 'uploads/comm_pics/' . $event["pic"] : CLIENT_IMAGES . "icons/calendar-icon.png" ?>"  class="img-responsive"> </div>
                                            <div class="event_detail">
                                                <div class="comm_event">Event name: <?= $event["ename"] ?></div>
                                                <div>Date: <?= date("d M Y", strtotime($event["edate"])) ?> </div>
                                                <div> Location: <?= $event["location"] ?> </div>
                                                <div > 
                                                    <!--a href="javascript:void();" class="event_social"> <i class="fa fa-facebook tcol_darkblue"> </i></a> 
                                                    <a href="javascript:void();" class="event_social"><i class="fa  fa-linkedin tcol_darkblue"></i></a> 
                                                    <a href=javascript:void(); class="event_social"><i class="fa  fa-google-plus tcol_darkblue"></i></a--> 
                                                    <a href=javascript:void(); onclick="event_invite('<?= $event["ename"] ?>')" class="event_social1">Invite</a> 
                                                </div>
                                            </div>
                                        </div>
                                   
                                </div>
                                <?php
                            }
                      
                        ?> 
                  

                    <!--/carousel-inner--> 

                     </div>
                      <div class="customNavigation">
  <a class="btn prev owl-prev1"><i class="fa fa-angle-left fa-4x tcol_grey"></i></a>
  <a class="btn next owl-next1"><i class="fa fa-angle-right fa-4x tcol_grey"></i></a>
</div>
            </div>
                
                <?php 
                
                      } else {
                            echo "<div class='col-sm-12 alert alert-info'>No Events Yet!</div>";
                        }
                ?>
                
        </div>
        <div class="clearfix"></div>

        <hr>
        <div class="row mb50">
            <div class="col-sm-12 col-md-12">
                <div class="big_title"> Wall <span> Have a question? Let's get started.</span></div>
            </div>
            <div class="col-sm-12 col-md-12"  data-toggle="collapse" data-target="#toggle-walls">
                <div class="pull-right pointer mb30"> <div class="closearrow"> </div> </div>
            </div>

            <div class="col-sm-12 col-md-12 collapse in" id="toggle-walls">
                <iframe style="width: 100%;border: none;" frameborder="0" id="iframe" height="500" src="<?= CLIENT_SITE_URL ?>client_communities/community_wall/<?= $this->uri->segment(3, 0) ?>/1/<?= $this->uri->segment(2, 0) ?>"  ></iframe>      
            </div>
        </div>

    </div>
    


</div>

<div class="col-sm-2 sidebar">
        <?php $this->load->view(CLIENT_TICKER_VIEW); ?>
        <?php $this->load->view(CLIENT_ADS_VIEW); ?>
    </div>
<footer>
    <?php $this->load->view(CLIENT_FOOTER); ?>
</footer>


<div class="modal fade" id="myModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLogin" aria-hidden="true"> 
    <div class="modal-dialog modal-lg"> 
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"> Login with one of the below options</h4>
            </div> 
            <div class="modal-body">
                <?php $this->load->view(CLIENT_USER_POPUP_VIEW); ?> 
            </div>
        </div> 
    </div>
</div> 


<div class="modal fade" id="myModalInvite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close pull-right" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title tcol_darkblue mb30" id="myModalLabel">Invite!</h3>
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-5" data-toggle="collapse" data-target="#gmu_invite"><a href="#" class="btn btn-sm invite_members">GMU Invite</a> </div>
                    <div class="col-sm-5"><a href="#" class="btn btn-facebook invite_fb">Facebook Invite</a>
                    </div>
                    <div class="row mt50">
                        <div class="col-sm-12">
                            <div class="collapse" id="gmu_invite">
                                <form id="inviteMForm">
                                    <div class="form-group">
                                        <label for="invitegmu" class="col-sm-4 control-label"> Invite GMU Members </label>
                                        <div class="col-sm-8">
                                            <textarea class="inviteMembers form-control" name="sinput" placeholder="Start typing Name of the invitee"></textarea>
                                        </div>
                                        <input type="hidden" name="cid" value="<?= $community[0]["id"] ?>" />
                                        <input type="hidden" name="cname" value="<?= $community[0]["cname"] ?>" />
                                    </div>

                                    <div class="form-group ">
                                        <div class="col-sm-12 mt20">
                                            <div class="pull-right"> 
                                                <input type="submit" value="Submit" class="btn btn-primary invitesubmit">
                                                <input type="button" value="Cancel" class="btn closeM btn-default">
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModalEventInvite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close pull-right" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title tcol_darkblue mb30" id="myModalLabel">Invite!</h3>
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-5" data-toggle="collapse" data-target="#gmu_invite2"><a href="#" class="btn btn-sm invite_members">GMU Invite</a> </div>
                    <div class="col-sm-5"><a href="#" class="btn btn-facebook invite_fb">Facebook Invite</a>
                    </div>
                    <div class="row mt50">
                        <div class="col-sm-12">
                            <div class="collapse" id="gmu_invite2">
                                <form id="inviteEMForm">
                                    <div class="form-group">
                                        <label for="invitegmu" class="col-sm-4 control-label"> Invite GMU Members </label>
                                        <div class="col-sm-8">
                                            <textarea class="inviteMembers form-control" name="sinput" placeholder="Start typing Name of the invitee"></textarea>
                                        </div>
                                        <input type="hidden" name="ename" value="" />
                                        <input type="hidden" name="cid" value="<?= $community[0]["id"] ?>" />
                                        <input type="hidden" name="cname" value="<?= $community[0]["cname"] ?>" />
                                    </div>

                                    <div class="form-group ">
                                        <div class="col-sm-12 mt20">
                                            <div class="pull-right"> 
                                                <input type="submit" value="Submit" class="btn btn-primary eventinvitesubmit">
                                                <input type="button" value="Cancel" class="btn closeM btn-default">
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    var user_id = "<?= session('client_user_id') ?>";
</script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="<?php echo CLIENT_SCRIPTS; ?>jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="<?php echo CLIENT_SCRIPTS; ?>bootstrap.min.js"></script>
<link href="<?php echo CLIENT_CSS; ?>bootstrap-multiselect.css" rel="stylesheet">
<link href="<?php echo CLIENT_CSS; ?>owl.carousel.css" rel="stylesheet">
<link href="<?php echo CLIENT_CSS; ?>owl.theme.css" rel="stylesheet">
<script src="<?php echo CLIENT_SCRIPTS; ?>bootstrap-multiselect.js"></script> 
<script src="<?php echo CLIENT_SCRIPTS; ?>jquery-ui.min.js"></script> 
<script type="text/javascript" src="<?php echo CLIENT_MODULES ?>client_user_module_js.js"></script> 
<script src="<?php echo CLIENT_SCRIPTS; ?>bootbox.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_MODULES ?>client_community_module.js"></script> 
<script src="<?php echo CLIENT_SCRIPTS; ?>owl.carousel.js"></script>

<script>
  	$(document).ready(function() {
 
 var owlWrap = $('.owl-wrapper');
    // checking if the dom element exists
    if (owlWrap.length > 0) {
        // check if plugin is loaded
        if (jQuery().owlCarousel) {
            owlWrap.each(function(){
                var carousel= $(this).find('.owl-carousel'),
                    navigation = $(this).find('.customNavigation'),
                    nextBtn = navigation.find('.next'),
                    prevBtn = navigation.find('.prev'),
                    playBtn = navigation.find('.play'),
                    stopBtn = navigation.find('.stop');
                
              carousel.owlCarousel({
                  itemsCustom : [
						[0, 1],
						[479, 2],
						[768, 2],
						//[995, 2],
						[1200, 5]
					],
					navigation  : false,
					stopOnHover : true,
					autoPlay    : false
              });
             
              // Custom Navigation Events
              nextBtn.click(function(){
                carousel.trigger('owl.next');
              });
              prevBtn.click(function(){
                carousel.trigger('owl.prev');
              });
             
            });
        };
    };
    
    
    if (owlWrap.length > 0) {
        // check if plugin is loaded
        if (jQuery().owlCarousel) {
            owlWrap.each(function(){
                var carousel= $(this).find('.owl-carousel1'),
                    navigation = $(this).find('.customNavigation'),
                    nextBtn = navigation.find('.next'),
                    prevBtn = navigation.find('.prev'),
                    playBtn = navigation.find('.play'),
                    stopBtn = navigation.find('.stop');
                
              carousel.owlCarousel({
                  itemsCustom : [
						[0, 1],
						[479, 2],
						[768, 2],
						//[995, 2],
						[1200, 4]
					],
					navigation  : false,
					stopOnHover : true,
					autoPlay    : false
              });
             
              // Custom Navigation Events
              nextBtn.click(function(){
                carousel.trigger('owl.next');
              });
              prevBtn.click(function(){
                carousel.trigger('owl.prev');
              });
             
            });
        };
    }; 
    
    
});
  </script> 

<script type="text/javascript">
    $(document).ready(function() {
        //                        $('#myCarousel. #myCarousel1').carousel({
        //                            interval: 10000
        //                        });

        $(".inviteM").click(function() {
            if (user_id == "") {
                $("#myModalLogin").modal();
            } else {
                $("#myModalInvite").modal();
            }

        });

        $(".closeM").click(function() {
            $(".modal").modal("hide");
        });
        $(".btn.btn-facebook.invite_fb").click(function() {
            FB.ui({
                method: 'apprequests',
                message: 'Invite your Facebook Friends'
            }, function(response) {
                if (response) {
                    $(".modal").modal("hide");
                    bootbox.alert("Invitation Sent Successfully!");
                } else {
                    //alert('Failed To Invite');
                }
            });
        });

        $(".invitesubmit").click(function(e) {
            e.preventDefault();
            if ($("#inviteMForm .inviteMembers").val() == "") {
                alert("Please Select atleast one invitee");
            } else {
                $.ajax({
                    type: "post",
                    url: CLIENT_SITE_URL + "client_communities/send_join_invite/",
                    data: $("#inviteMForm").serialize(),
                    success: function() {
                        $(".modal").modal("hide");
                        bootbox.alert("Invitation Sent Successfully!");
                    }
                });
            }
        });

        $(".eventinvitesubmit").click(function(e) {
            e.preventDefault();
            if ($("#inviteEMForm .inviteMembers").val() == "") {
                alert("Please Select atleast one invitee");
            } else {
                $.ajax({
                    type: "post",
                    url: CLIENT_SITE_URL + "client_communities/send_event_invite/",
                    data: $("#inviteEMForm").serialize(),
                    success: function() {
                        $(".modal").modal("hide");
                        bootbox.alert("Invitation Sent Successfully!");
                    }
                });
            }
        });
        
         $(function() 
		 {
			$( "#date" ).datepicker({
                            
                            minDate: 0
                            
                        });
                        
		});
        
        

    });

    function event_invite(ename) {
        if (user_id == "") {
            $("#myModalLogin").modal();
        } else {
            $("#myModalEventInvite input[name='ename']").val(ename);
            $("#myModalEventInvite").modal();
        }
    }
</script>
</body></html><script src="<?php echo CLIENT_SCRIPTS; ?>jquery-ui.min.js"></script>
<script src="<?php echo ADMIN_SCRIPTS; ?>plugins/plupload.full.min.js" type="text/javascript"></script>