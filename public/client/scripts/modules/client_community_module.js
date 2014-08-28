$(document).ready(function() {

    $("html").scrollTop();
    $('.hidden_div').hide();
    $('.hidden_comment_div').hide();

    $('.default_div').hover(function() {

        $(this).find('.hidden_div').show();

    });


    $('.default_div').on("mouseleave", function() {

        $(this).find('.hidden_div').hide();

    });

    $('.default_comment_div').hover(function() {

        $(this).find('.hidden_comment_div').show();

    });


    $('.default_comment_div').on("mouseleave", function() {

        $(this).find('.hidden_comment_div').hide();

    });


    $(".dspam").click(function() {
        if (user_id != '') {
            $("#mySpam button[value='0']").attr("data-did", $(this).attr("data-did"));
            $("#mySpam").modal();
        } else {
            $("#myModalLogin").modal();
        }
    });

    $(".ddel").click(function() {
        if (user_id != '') {
            $("#myDel button[value='0']").attr("data-did", $(this).attr("data-did"));
            $("#myDel").modal();
        } else {
            $("#myModalLogin").modal();
        }
    });

    $(".cspam").click(function() {
        if (user_id != '') {
            $("#myCSpam button[value='0']").attr("data-did", $(this).attr("data-did"));
            $("#myCSpam button[value='0']").attr("data-cid", $(this).attr("data-cid"));
            $("#myCSpam").modal();
        } else {
            $("#myModalLogin").modal();
        }
    });

    $(".cdel").click(function() {
        if (user_id != '') {
            $("#myCDel button[value='0']").attr("data-did", $(this).attr("data-did"));
            $("#myCDel button[value='0']").attr("data-cid", $(this).attr("data-cid"));
            $("#myCDel").modal();
        } else {
            $("#myModalLogin").modal();
        }
    });

    $("#mySpam button").click(function() {
        if ($(this).val() == 0) {
            var did = $(this).attr("data-did");
            var url = $(location).attr('href');
            $.ajax({
                type: "POST",
                url: CLIENT_SITE_URL + "client_communities/wall_discussion_spam_send/",
                data: {id: did, url: url},
                success: function(data) {
                    if (data != '') {

                    }
                }
            });
        }
        $('#mySpam').modal('toggle');
    });


    $("#myDel button").click(function() {
        if ($(this).val() == 0) {
            var did = $(this).attr("data-did");
            $.ajax({
                type: "POST",
                url: CLIENT_SITE_URL + "client_communities/delete_wall_discussion/",
                data: {id: did},
                success: function(data) {
                    if (data != '') {

                    }
                }
            });
        }
        $('#myDel').modal('toggle');
    });


    $("#myCSpam button").click(function() {
        if ($(this).val() == 0) {
            var did = $(this).attr("data-did");
            var cid = $(this).attr("data-cid");
            var url = $(location).attr('href');
            $.ajax({
                type: "POST",
                url: CLIENT_SITE_URL + "client_communities/wall_comment_spam_send/",
                data: {id: did, cid: cid, url: url},
                success: function(data) {
                    if (data != '') {

                    }
                }
            });
        }
        $('#myCSpam').modal('toggle');
    });

    $("#myCDel button").click(function() {
        if ($(this).val() == 0) {
            var did = $(this).attr("data-did");
            var cid = $(this).attr("data-cid");
            $.ajax({
                type: "POST",
                url: CLIENT_SITE_URL + "client_communities/delete_wall_discussion_comment/",
                data: {id: cid, did: did},
                success: function(data) {
                    if (data != '') {

                    }
                }
            });
        }
        $('#myCDel').modal('toggle');
    });



    $(".newpostform").submit(function() {
        if (user_id != '') {
            return true;
        } else {
            $("#myModalLogin").modal();
        }
        return false;
    });

    $(".commentInput").keypress(function(e) {
        if (e.which == 13 && $(this).val() != '' && $(this).val() != ' ') {
            if (user_id != '') {


                var did = $(this).attr("data-did");
                var cid = $(this).attr("data-cid");
                var comment = $(this).val();
                $("input[data-did='" + did + "']").val("");
                $("input[data-did='" + did + "']").attr("disabled", "disabled");
                $.ajax({
                    type: "POST",
                    url: CLIENT_SITE_URL + "client_communities/wall_discussion_comment_insert/",
                    data: {id: did, cid: cid, comment: comment},
                    success: function(data) {
                        if (data != '') {
                            var udetails = data.split("|");
                            var cno = $(".cmNo" + did).text();
                            if (cno == "") {
                                $(".cmNo" + did).text("1");
                            } else {
                                cno = parseInt(cno);
                                cno = cno + 1;
                                $(".cmNo" + did).text(cno);
                            }
                            $("input[data-did='" + did + "']").removeAttr("disabled");
                            $(".d" + did + ".row.subsection .subcomment .subCB").append('<div class="subcommentbox"><div class="mb10"><div class="profilepic"><img src="' + udetails[1] + '"></div><div class="tcol_blue f_16"> ' + udetails[0] + '</div><div class="tcol_grey f_12"> <i class="fa fa-clock-o"> </i> 1s ago</div></div><div class="subcomments">' + comment + '</div></div>');
                            $(".d" + did + ".row.subsection .subcomment ").animate({scrollTop: $(".d" + did + ".row.subsection .subcomment ")[0].scrollHeight}, 1000);
                        }
                    }
                });
            } else {
                $("#myModalLogin").modal();
            }
        }
    });

    $(document).on("click", ".like", function(e) {

        var did = $(this).attr("data-did");
        var cid = $(this).attr("data-cid");

        $.ajax({
            type: "POST",
            url: CLIENT_SITE_URL + "client_communities/wall_discussion_like_insert/",
            data: {id: did, cid: cid},
            success: function(data) {
                $("a.like[data-did='" + did + "']").text("Unlike");
                $("a.like[data-did='" + did + "']").addClass("unlike");
                $("a.like[data-did='" + did + "']").removeClass("like");

            }
        });

    });


    $(document).on("click", ".unlike", function(e) {

        var did = $(this).attr("data-did");
        var cid = $(this).attr("data-cid");

        $.ajax({
            type: "POST",
            url: CLIENT_SITE_URL + "client_communities/wall_discussion_unlike_insert/",
            data: {id: did, cid: cid},
            success: function(data) {
                $("a.unlike[data-did='" + did + "']").html('<i class="fa fa-thumbs-up"> </i>Like');
                $("a.unlike[data-did='" + did + "']").addClass("like");
                $("a.unlike[data-did='" + did + "']").removeClass("unlike");
            }
        });
    });

    $("a[class^=shwCm]").click(function() {
        $("#" + $(this).attr("class")).slideToggle("fast", function() {
        });
    });
    $("input.commentInput").click(function() {
        $("#shwCm" + $(this).attr("data-did")).slideDown();
    });
    $(".upic").click(function() {
        $(".picupl").html("<div class='tcol_blue f_18 pull-left mr20'>Choose an Image</div> <input type='file' name='file' class='pull-left' id='file' required />");
    });
    $(".postt").click(function() {
        $(".picupl").html("");
    });

    $(document).on("click", ".join", function(e) {
        if (user_id != '') {
            var cid = $(this).attr("data-cid");
            var ce = this.hasAttribute("data-ce");
            $.ajax({
                type: "POST",
                url: CLIENT_SITE_URL + "client_communities/community_join_insert/",
                data: {cid: cid},
                success: function(data) {
                    $("a.join[data-cid='" + cid + "']").html('<i class="fa fa-minus"></i> Leave');
                    $("a.join[data-cid='" + cid + "']").addClass("unjoin");
                    $("a.join[data-cid='" + cid + "']").removeClass("join");
                    $(".create_cm").attr("data-target", "#create_event")
                    var fno = parseInt($(".mnum").text());
                    fno = fno + 1;
                    $(".mnum").text(fno);
                    $('#myModalJoin').modal('hide');
                    if (ce) {
                        $("#create_event").modal();
                    }
                }
            });
        } else {
            $("#myModalLogin").modal();
        }
    });
    $(document).on("click", ".unjoin", function(e) {
        var cid = $(this).attr("data-cid");
        $.ajax({
            type: "POST",
            url: CLIENT_SITE_URL + "client_communities/community_unjoin_insert/",
            data: {cid: cid},
            success: function(data) {
                $("a.unjoin[data-cid='" + cid + "']").html('<i class="fa fa-plus"></i> Join');
                $("a.unjoin[data-cid='" + cid + "']").addClass("join");
                $("a.unjoin[data-cid='" + cid + "']").removeClass("unjoin");
                $(".create_cm").attr("data-target", "#myModalJoin")
                var fno = parseInt($(".mnum").text());
                fno = fno - 1;
                $(".mnum").text(fno);

            }
        });
    });

    $(".inviteMembers")
            // don't navigate away from the field on tab when selecting an item
            .bind("keydown", function(event) {
                if (event.keyCode === $.ui.keyCode.TAB &&
                        $(this).autocomplete("instance").menu.active) {
                    event.preventDefault();
                }
            })
            .autocomplete({
                source: function(request, response) {
                    $.getJSON(CLIENT_SITE_URL + "client_communities/search_users/", {
                        term: extractLast(request.term)
                    }, response);
                },
                search: function() {
                    // custom minLength
                    var term = extractLast(this.value);
                    if (term.length < 1) {
                        return false;
                    }
                },
                focus: function() {
                    // prevent value inserted on focus
                    return false;
                },
                select: function(event, ui) {
                    var terms = split(this.value);
                    // remove the current input
                    terms.pop();
                    // add the selected item
                    terms.push(ui.item.value);
                    // add placeholder to get the comma-and-space at the end
                    terms.push("");
                    this.value = terms.join(", ");
                    return false;
                }
            });

});


function split(val) {
    return val.split(/,\s*/);
}
function extractLast(term) {
    return split(term).pop();
}

