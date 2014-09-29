<?php $this->load->view(CLIENT_HEADER);
?>


<script>
    function goBack() {
        window.location.href = "http://www.getmyuni.com/college/search";
    }
</script>
<div class="row container-fluid">
    <div class="col-sm-10 col-md-10 col-xs-12">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page_title">School Comparison</h1>
                <div class="btn btn-sm"><a  class="btn_back" onclick="goBack()"><i class="fa fa-caret-left col_light_blue "></i> Back</a></div>
            </div>
        </div>

        <div class="row mt20">
            <div class="col-sm-12 col-md-12">

                <ul class="metalisting givB">
                    <li class="compare_element"></li>
                    <li class="compare1"> <div class="compare_circle mt10">1 </div></li>
                    <li class="compare2"><div class="compare_circle mt10">2</div></li>
                    <li class="compare3"><div class="compare_circle mt10">3</div></li>
                </ul>
                <ul class="metalisting givB">
                    <li class="compare_element">
                        <div class="row"> 
                            <div class="col-sm-3 col-md-3">
                                <img src="<?php echo CLIENT_IMAGES; ?>icons/school.png"> 
                            </div> 
                            <div class="col-sm-9 col-md-9">School</div>
                        </div>
                    </li>
                    <li class="compare1"><input type="text" name="comp" data-cid="1" class="searchinput_compare form-control" placeholder="School Name"> </li>
                    <li class="compare2"><input type="text" name="comp" data-cid="2" class="searchinput_compare form-control" placeholder="School Name"></li>
                    <li class="compare3"><input type="text" name="comp" data-cid="3" class="searchinput_compare form-control" placeholder="School Name"></li>

                </ul>
                <ul class="metalisting details">
                    <li> 
                        <ul class="givB headers">
                            <li  class="compare_element">
                                <div class="row"> 
                                    <div class="col-sm-3 col-md-3">
                                        <img src="<?php echo CLIENT_IMAGES; ?>icons/location.png">
                                    </div>
                                    <div class="col-sm-8 col-md-8">Location</div>
                                </div>
                            </li>
                            <li  class="compare_element">
                                <div class="row"> 
                                    <div class="col-sm-3 col-md-3">
                                        <img src="<?php echo CLIENT_IMAGES; ?>icons/rank.png">
                                    </div>
                                    <div class="col-sm-8 col-md-8"> Rank</div>
                                </div>
                            </li>
                            <li  class="compare_element">
                                <div class="row"> 
                                    <div class="col-sm-3 col-md-3">
                                        <img src="<?php echo CLIENT_IMAGES; ?>icons/acceptance.png">
                                    </div>
                                    <div class="col-sm-8 col-md-8"> Acceptance rate</div>
                                </div>
                            </li>
                            <li  class="compare_element">
                                <div class="row"> 
                                    <div class="col-sm-3 col-md-3">
                                        <img src="<?php echo CLIENT_IMAGES; ?>icons/tution.png">
                                    </div>
                                    <div class="col-sm-8 col-md-8"> Tution fees</div>
                                </div>

                            </li>
                            <li  class="compare_element">
                                <div class="row"> 
                                    <div class="col-sm-3 col-md-3">
                                        <img src="<?php echo CLIENT_IMAGES; ?>icons/testscore.png"> 
                                    </div>
                                    <div class="col-sm-8 col-md-8">Test scores</div>
                                </div>
                            </li>
                            <li  class="compare_element">
                                <div class="row"> 
                                    <div class="col-sm-3 col-md-3">
                                        <img src="<?php echo CLIENT_IMAGES; ?>icons/industries.png">
                                    </div>
                                    <div class="col-sm-8 col-md-8">
                                        Industries</div>
                                </div>

                            </li>
                            <li  class="compare_element">
                                <div class="row"> 
                                    <div class="col-sm-3 col-md-3">
                                        <img src="<?php echo CLIENT_IMAGES; ?>icons/avgsalary.png"> 

                                    </div>

                                    <div class="col-sm-8 col-md-8">Average starting salary</div></div>
                            </li>
                            <li  class="compare_element">
                                <div class="row"> 
                                    <div class="col-sm-3 col-md-3">
                                        <img src="<?php echo CLIENT_IMAGES; ?>icons/avgexp.png">
                                    </div>

                                    <div class="col-sm-8 col-md-8">Average work experience</div></div>
                            </li>
                             <li  class="compare_element">
                                <div class="row"> 
                                    <div class="col-sm-3 col-md-3">
                                        <img src="<?php echo CLIENT_IMAGES; ?>icons/acceptance.png">
                                    </div>
                                    <div class="col-sm-8 col-md-8">College Profile Link</div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li> 
                        <ul class="givB givH" data-cid="1">

                        </ul>
                    </li>
                    <li> 
                        <ul class="givB givH" data-cid="2">

                        </ul>
                    </li>
                    <li> 
                        <ul class="givB givH" data-cid="3">

                        </ul>
                    </li>
                </ul>
            </div>
        </div>



    </div>

    <div class="col-sm-2 sidebar">
        <?php $this->load->view(CLIENT_TICKER_VIEW); ?>
        <?php $this->load->view(CLIENT_ADS_VIEW); ?>
    </div>

</div>
<div class="cleaner_30"></div>
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



<?php
$i = 1;
if (isset($ids)) {
    foreach ($ids as $id) {
        ?>
                                $.ajax({
                                    type: "POST",
                                    url: CLIENT_SITE_URL + 'client_college/get_college_data',
                                    data: {id: "<?= $id ?>", col: "<?= $i ?>"},
                                    success: function(data) {
                                        $("ul[data-cid='<?= $i ?>']").html(data);
                                        $("input[data-cid='<?= $i ?>']").val($("ul[data-cid='<?= $i ?>'] li ").eq("0").text());
                                        $("ul[data-cid='<?= $i ?>'] li ").eq("0").hide();
                                        $("ul[data-cid='<?= $i ?>'] li").each(function() {
                                            var tx = $(this).text();
                                            if (tx == "" || tx == " " || tx == 0 || tx == "$0" || tx == "0%") {
                                                $(this).text("No Info")
                                            }
                                        });
                                    }
                                });
        <?php
        $i++;
    }
}
?>

                        $('.multiselect').multiselect({
                            buttonWidth: '100%',
                            maxHeight: 300,
                            enableFiltering: true,
                            enableCaseInsensitiveFiltering: true,
                            filterBehavior: 'both'
                        });

                        $(".searchinput_compare").autocomplete({
                            source: SITE_URL + 'client/client_college/search_college_name',
                            select: function(event, ui) {
                                var repeat = 0;
                                var cid = $(this).attr("data-cid");
                                var val = ui.item.value;
                                $("input[data-cid!='" + cid + "']").each(function() {
                                    if (val == this.value) {
                                        alert("This School has been already Selected");
                                        repeat = 1;
                                    }
                                });
                                if (repeat == 0) {
                                    $.ajax({
                                        type: "POST",
                                        url: CLIENT_SITE_URL + 'client_college/get_college_data',
                                        data: {id: ui.item.id, col: cid},
                                        success: function(data) {
                                            $("ul[data-cid='" + cid + "']").html(data);
                                            $("ul[data-cid='" + cid + "'] li ").eq("0").hide();
                                            $("ul[data-cid='" + cid + "'] li").each(function() {
                                            var tx = $(this).text();
                                            if (tx == "" || tx == " " || tx == 0 || tx == "$0" || tx == "0%") {
                                                $(this).text("No Info")
                                            }
                                        });

                                        }
                                    });
                                } else {
                                    return false;
                                }
                            }
                        });


                    });
</script>

</body>
</html>
