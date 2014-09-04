<?php $this->load->view(CLIENT_HEADER); ?>
<?php
//  display($this->session->all_userdata());
//display($user_data);
?>

<div class="row container-fluid">
    <div class="col-sm-10 col-md-10 col-xs-12">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page_title">Notifications</h1>
            </div>
        </div>

        <hr />
        <div class="row"> 

            <div class="col-sm-12 col-md-12"> 
                <?php foreach ($notifications as $noti) { ?>
                    <div class="notifications">
                        <a href="<?= $noti["link"] ?>">
                            <?= noti_icon($noti["type"]) ?>
                            <span class="badge_def" style="right: 15px;"><?= date("d M h:i a", strtotime($noti["datetime"])) ?></span>
                            <div class="noti_desc"><?= $noti["message"] ?></div>
                        </a>
                    </div>
                <?php } ?>
            </div>
            <!-- Ad --> 
        </div>
    </div>
    <div class="col-sm-2 sidebar"> <img src="<?php echo CLIENT_IMAGES; ?>ticker.jpg" class="mt20 img-responsive"> <img src="<?php echo CLIENT_IMAGES; ?>adspace.jpg" class="mt10 img-responsive"> <img src="<?php echo CLIENT_IMAGES; ?>adspace2.jpg" class="mt10 img-responsive"> <img src="<?php echo CLIENT_IMAGES; ?>adspace4.jpg" class="mt10 img-responsive"> </div>
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
    });
</script>
</body></html><script src="<?php echo CLIENT_SCRIPTS; ?>jquery-ui.min.js"></script>
<script src="<?php echo ADMIN_SCRIPTS; ?>plugins/plupload.full.min.js" type="text/javascript"></script>