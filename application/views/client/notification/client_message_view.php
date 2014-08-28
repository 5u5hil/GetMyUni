<?php $this->load->view(CLIENT_HEADER); ?>
<?php
//  display($this->session->all_userdata());
//display($user_data);
?>

<div class="row container-fluid">
    <div class="col-sm-10 col-md-10 col-xs-12">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page_title"></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-md-3"> <a href="javascript:void();" data-toggle="modal" data-target="#compose_message" class="btn btn-danger btn-sm btn-block" role="button"><i class="fa fa-plus"></i> COMPOSE</a> </div>
        </div>
        <hr />
        <div class="row"> 
            <!--<div class="col-sm-3 col-md-2">
                  <a href="#" class="btn btn-danger btn-sm btn-block" role="button">COMPOSE</a>
                  <hr />
                  <ul class="nav nav-pills nav-stacked">
                      <li class="active"><a href="#"><span class="badge pull-right">42</span> Inbox </a>
                      </li>
                      <li><a href="#">Starred</a></li>
                      <li><a href="#">Important</a></li>
                      <li><a href="#">Sent Mail</a></li>
                      <li><a href="#"><span class="badge pull-right">3</span>Drafts</a></li>
                  </ul>
              </div>-->
            <div class="col-sm-12 col-md-12"> 

                <!-- Nav tabs --> 

                <!-- Tab panes -->

                <div  id="home">
                    <div class="list-group"> 

                        <div href="#" class="list-group-item inbox_title">
                            <span class="name frm_message "><strong>From</strong></span> <span class="name frm_message "><strong>To</strong></span> <span class=""><strong>Subject</strong></span> <span class="text-muted" style="font-size: 11px;">&nbsp;</span> <span
                                class="pull-right mr20"><strong>Sent</strong></span> <span class="pull-right"> </span> </div>
                            <?php if ($messages) {
                                foreach ($messages as $msg) { ?>
                                <a href="<?= SITE_URL ?>message/<?= $msg["id"] ?>" class="list-group-item <?= $msg["read"] == 0 ? "read" : "unread" ?>">
                                    <span class="name frm_message" ><?= $msg["from"] == session("client_user_id") ? "You" : get_user_name_id($msg["from"]) ?></span><span class="name frm_message" ><?= $msg["to"] == session("client_user_id") ? "You" : get_user_name_id($msg["to"]) ?></span> <span class=""><?= $msg["subject"] ?></span> <span class="text-muted" style="font-size: 11px;">- <?= substr($msg["message"], 0, 20) . "..." ?></span> 
                                    <span class="badge_def"><?= date("d M h:i a", strtotime($msg["updated_at"])) ?></span> <span class="pull-right"> </span> 
                                </a>
                            <?php
                            }
                        } else {
                            echo "<div class='col-md-offset-2 col-sm-10 col-md-10 col-xs-12 mt20 alert alert-info'>You haven't sent or received any Messages!</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Ad --> 
        </div>
    </div>
    <div class="col-sm-2 sidebar"> <img src="<?php echo CLIENT_IMAGES; ?>ticker.jpg" class="mt20 img-responsive"> <img src="<?php echo CLIENT_IMAGES; ?>adspace.jpg" class="mt10 img-responsive"> <img src="<?php echo CLIENT_IMAGES; ?>adspace2.jpg" class="mt10 img-responsive"> <img src="<?php echo CLIENT_IMAGES; ?>adspace4.jpg" class="mt10 img-responsive"> </div>
</div>
</div>


<div class="modal fade" id="compose_message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close pull-right" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title tcol_darkblue mb30" id="myModalLabel">Compose Message</h3>
                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?= CLIENT_SITE_URL ?>client_notification/message_insert/">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">To</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="to" placeholder="Type name" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="where" class="col-sm-3 control-label">Subject</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="where" name="sub" placeholder="Subject" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="shortdesc" class="col-sm-3 control-label">Message</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="msg" required> </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="submit" value="Create" class="home_search_button">
                            <input type="button" value="Cancel" class="btn btn-default">
                        </div>
                    </div>
                </form>
            </div>
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

        $("input[name='to']").autocomplete({
            source: CLIENT_SITE_URL + "client_communities/search_users/",
            minLength: 2,
            select: function(event, ui) {
            }
        });
    });
</script>
</body></html><script src="<?php echo CLIENT_SCRIPTS; ?>jquery-ui.min.js"></script>
<script src="<?php echo ADMIN_SCRIPTS; ?>plugins/plupload.full.min.js" type="text/javascript"></script>