<?php if (session("client_user_id")) { ?>
    <div class="ticker">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <ul class="tickerul">
                    <?php
                    $ticks = get_ticker_notifications();
                    if (is_array($ticks)) {
                        foreach ($ticks as $tick) {
                            $user = get_user_details($tick["from"]);
                            $pic = json_decode($user[0]["profile_pic"], true);

                            $pic = $pic[0] ? $pic[0] : CLIENT_IMAGES . "defaultuser.jpg";
                            ?>
                            <a href="<?= $tick["link"] ?>" style="color: #2a6496;text-decoration: none;"><li class="tickerLi" data-tid="<?= $tick["id"] ?>">
                                    <img src="<?= $pic ?>" class="img-responsive ticker-img" />
                                    <?= $tick["message"] ?>

                                </li> </a>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <script>


        setInterval(function() {
            $.ajax({
                type: "POST",
                url: CLIENT_SITE_URL + "client_notification/get_new_ticks/",
                data: {id: $(".tickerul li").eq(0).attr("data-tid")},
                success: function(data) {
                    $(".tickerul").prepend(data);
                }
            });
        }, 3000);
    </script>
<?php } ?>