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
      <div class="col-sm-3 col-md-3"> <a href="#" class="btn btn-danger btn-sm btn-block" role="button"><i class="fa fa-plus"></i> COMPOSE</a> </div>
      <div class="col-sm-2 col-md-2 pull-right"> <a href="#" class="btn btn-danger btn-sm " role="button"><i class="fa fa-trash-o"></i> Delete</a> </div>
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
            <div class="checkbox">
              <label>
                <input type="checkbox" class="mr5" title="Select all" >
              </label>
            </div>
              <span class="name frm_message ml20"><strong>From</strong></span> <span class=""><strong>Subject</strong></span> <span class="text-muted" style="font-size: 11px;">&nbsp;</span> <span
                                class="pull-right mr20"><strong>Sent</strong></span> <span class="pull-right"> </span> </div>
                                
             <a href="#" class="list-group-item">
            <div class="checkbox">
              <label>
                <input type="checkbox" class="mr5" >
              </label>
            </div>
            <span class="fa fa-star-o"></span> <span class="name frm_message" >Bhaumik Patel</span> <span class="">This is big title</span> <span class="text-muted" style="font-size: 11px;">- Hi hello how r u ?</span> <span
                                class="badge_def">12:10 AM</span> <span class="pull-right"> </span> </a>
                                
               <a href="#" class="list-group-item">
            <div class="checkbox">
              <label>
                <input type="checkbox" class="mr5">
              </label>
            </div>
            <span class="fa fa-star-o"></span> <span class="name frm_message">Bhaumik Patel</span> <span class="">This is big title</span> <span class="text-muted" style="font-size: 11px;">- Hi hello how r u ?</span> <span
                                        class="badge_def">12:10 AM</span> <span class="pull-right"> </span></a>
                                        
                                        
              <a href="#" class="list-group-item read">
            <div class="checkbox">
              <label>
                <input type="checkbox" class="mr5">
              </label>
            </div>
            <span class="fa fa-star"></span> <span class="name frm_message">Bhaumik Patel</span> <span class="">This is big title</span> <span class="text-muted" style="font-size: 11px;">- Hi hello how r u ?</span> <span
                                                class="badge_def">12:10 AM</span> <span class="pull-right"></span></a> </div>
        </div>
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