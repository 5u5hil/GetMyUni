<?php $this->load->view(CLIENT_HEADER); ?>
<?php
//  display($this->session->all_userdata());
//display($user_data);
?>

<div class="row container-fluid">
    <div class="col-sm-10 col-md-10 col-xs-12">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page_title"> Message Details</h1>
            </div>
        </div>


        <div class="row"> 
            <div class="col-sm-12 col-md-12"> 
                <?php
                $count = count($messages);
                foreach ($messages as $msg) {
                    $get_user_details = get_user_details($msg["from"]);
                    if ($msg["from"] != session("client_user_id")) {
                        $to = $msg["from"];
                    } elseif ($count == 1) {
                        $to = $msg["to"];
                    }

                     $pic1 = stripslashes(str_replace(array("[", "]", "(", ")"), " ", $get_user_details[0]["profile_pic"]));
                    //$pic = json_decode($get_user_detail[0]["profile_pic"], true);
                    $pic = $pic1 ? $pic1 : CLIENT_IMAGES . "defaultuser.jpg";
                    
                    //$pic = $pic[0] ? $pic[0] : CLIENT_IMAGES . "defaultuser.jpg";
                    ?>
                    <div class="read_panel">
                        <div class="media">
                            <a href="#" class="pull-left"><img src=<?= $pic ?> class="media-image"></a>
                            <div class="media-body">
                                <span class="media-meta pull-right"><?= date("d M, h:i a", strtotime($msg["added_at"])) ?></span>
                                <div class="text-primary mname"><?= $get_user_details[0]["name"]; ?></div>
                            </div>
                        </div>

                        <h4 class="tcol_darkblue"><?= $msg["subject"] ?></h4>
                        <p class="text-justify"><?= $msg["message"] ?></p>

                    </div>
                <?php } ?>
                <?php
                $get_user_detail = get_user_details(session("client_user_id"));
                $pic1 = stripslashes(str_replace(array("[", "]", "(", ")"), " ", $get_user_detail[0]["profile_pic"]));
                //$pic = json_decode($get_user_detail[0]["profile_pic"], true);
                $pic = $pic1 ? $pic1 : CLIENT_IMAGES . "defaultuser.jpg";
                ?>
                <div class="media mt20">
                    <a href="<?= SITE_URL ?>/profile/<?= session("client_user_id") ?>/" class="pull-left"><img src=<?= $pic ?> class="media-image"></a>
                    <div class="media-body">
                        <form name="message_frm" action="<?= CLIENT_SITE_URL ?>client_notification/message_insert/" method="post">
                            <div class="row">
                                <div class="col-sm-10 col-md-10">
                                    <textarea class="form-control" name="msg" class="frm" placeholder="Reply Here...." required></textarea>
                                    <input type="hidden" name="pid" value="<?= $pid ?>" />
                                    <input type="hidden" name="sub" value="" />
                                    <input type="hidden" name="to" value="<?= isset($to) ? $to : session("client_user_id") ?>" />
                                </div>
                                <div class="col-sm-2 col-md-2">
                                    <input type="submit" class="btn btn-sm btn-info" value="Reply">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- Ad --> 
        </div>
    </div>
    <div class="col-sm-2 sidebar"> 
    <?php  $this->load->view(CLIENT_TICKER_VIEW);?>
    <?php $this->load->view(CLIENT_ADS_VIEW); ?>
    
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
<link href="<?php echo CLIENT_CSS; ?>bootstrap_hexagone.css" rel="stylesheet">
<script src="<?php echo CLIENT_SCRIPTS; ?>bootstrap-multiselect.js"></script> 
<script src="<?php echo CLIENT_SCRIPTS; ?>jquery-ui.min.js"></script> 
<script type="text/javascript" src="<?php echo CLIENT_MODULES ?>client_user_module_js.js"></script> 
<script>
    $(function() {
        $("#inbox_tab").tabs();
        $("textarea[name='msg']").keypress(function(e) {
            if (e.which == 13) {
                $("form").submit();
            }
        });
    });
</script>
</body></html><script src="<?php echo CLIENT_SCRIPTS; ?>jquery-ui.min.js"></script>
<script src="<?php echo ADMIN_SCRIPTS; ?>plugins/plupload.full.min.js" type="text/javascript"></script>