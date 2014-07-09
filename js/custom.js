$(document).ready(function() {

    $('map area').mouseover(function() {
        var title = $(this).attr("data-title");
        var cssClass = $(this).attr("class");
        $(".tooltip").addClass(cssClass);
        $(".tooltip").css("display", "block");
        $('.txt').text(title);
    }).mouseout(function() {
        var cssClass = $(this).attr("class");
        $(".tooltip").removeClass(cssClass);
        $(".tooltip").css("display", "none");
        $('.txt').text('');
    });

    $('map area').click(function() {
        var cityAlias = $(this).attr("href");
        var alias = cityAlias.replace(/#/, '/');
        document.location.href = URL + "en/city" + alias;
    });

    $('.current-sort').click(function(e) {
        e.preventDefault();
        var style = $('.sort-options').attr('style');
        if (style === '' || style === 'display: none;') {
            $('.sort-options').show(300);
            $('i.arrow').addClass('open');
        } else {
            $('.sort-options').hide(300);
            $('i.arrow').removeClass('open');
        }
    });

    $('a.phone').click(function() {
        $('#contact-seller').removeClass('hide');
        $("#contact-phone-numbers").css("display", "block");
        $("#contact-email").css("display", "none");
        $('.send-email-button').addClass('invisible');
    });

    $('a.send-email-btn').click(function() {
        $('#contact-seller').removeClass('hide');
        $("#contact-phone-numbers").css("display", "none");
        $("#contact-email").css("display", "block");
        $('.send-email-button').removeClass('invisible');

    });
    // ready
    $(document).on({
        ajaxStart: function() {
            $body = $("#item-listing");
            $body.addClass("loading");
        },
        ajaxStop: function() {
            $body.removeClass("loading");
        }
    });
    //end

    $('#all-ads').click(function(e) {
        e.preventDefault();
        var ajax = URL + "en/load_ads/all/recent/" + c1_alias + c2_alias + c3_alias + sale_wanted + query + ad_category + ad_location + min_price + max_price;
        $(this).addClass('current');
        $('#private-ads, #business-ads').removeClass('current');
        $('#most-recent, #low-price').prop('rel', ajax);
        $('#for-sale, #for-wanted').prop('rel', ajax);
        $.ajax({
            type: "GET",
            url: ajax,
            success: function(data) {
                // return success
                $('#item-listing').html(data);
            }
        });
    });

    $('#private-ads').click(function(e) {
        e.preventDefault();
        var ajax = URL + "en/load_ads/private/recent/" + c1_alias + c2_alias + c3_alias + sale_wanted + query + ad_category + ad_location + min_price + max_price;
        $(this).addClass('current');
        $('#all-ads, #business-ads').removeClass('current');
        $('#most-recent, #low-price').prop('rel', ajax);
        $('#for-sale, #for-wanted').prop('rel', ajax);
        $.ajax({
            type: "GET",
            url: ajax,
            success: function(data) {
                // return success
                $('#item-listing').html(data);
            }
        });
    });

    $('#business-ads').click(function(e) {
        e.preventDefault();
        var ajax = URL + "en/load_ads/business/recent/" + c1_alias + c2_alias + c3_alias + sale_wanted + query + ad_category + ad_location + min_price + max_price;
        $(this).addClass('current');
        $('#all-ads, #private-ads').removeClass('current');
        $('#most-recent, #low-price').prop('rel', ajax);
        $('#for-sale, #for-wanted').prop('rel', ajax);
        $.ajax({
            type: "GET",
            url: ajax,
            success: function(data) {
                // return success
                $('#item-listing').html(data);
            }
        });
    });


    $("div.page span a").on("click", function(e) {
        e.preventDefault();
        var ajax = $(this).attr('href');
        $.ajax({
            type: "GET",
            url: ajax,
            success: function(data) {
                // return success
                $('#item-listing').html(data);

            }
        });

    });




    $('#most-recent').click(function(e) {
        e.preventDefault();
        var ajax = $('#most-recent').attr('rel');
        $.ajax({
            type: "GET",
            url: ajax,
            success: function(data) {
                // return success
                $('#item-listing').html(data);
                $('.sort-options').hide(300);
                $('i.arrow').removeClass('open');
            }
        });
    });

    $('#low-price').click(function(e) {
        e.preventDefault();
        var ajax = $('#low-price').attr('rel');
        var url = ajax.replace("recent", "price");
        $.ajax({
            type: "GET",
            url: url,
            success: function(data) {
                // return success
                $('#item-listing').html(data);
                $('.sort-options').hide(300);
                $('i.arrow').removeClass('open');
            }
        });
    });

    $('a.compact').click(function(e) {
        e.preventDefault();
        $('.flat.regular').hide(200);
        $('.flat.compact').show(200);
        $('a.regular').removeClass('current');
        $('a.compact').addClass('current');
    });

    $('a.regular').click(function(e) {
        e.preventDefault();
        $('.flat.compact').hide(200);
        $('.flat.regular').show(200);
        $('a.compact').removeClass('current');
        $('a.regular').addClass('current');
    });

    $('#report-item').click(function(e) {
        e.preventDefault();
        $("#report-item-modal").dialog();
    });

    // add to favorite login
    $('#add_to_favorite_login').click(function(e) {
        e.preventDefault();
        var post_data = {'current_url': current_url, csrf_tok: csrf_hash};

        $.ajax({
            type: "POST",
            url: URL + 'user/add_to_favorite_login',
            data: post_data,
            success: function(data) {
                // return success
                window.location = URL + "user/login";
            }
        });
    });

    // add to favorite
    $('#add_to_favorite').click(function(e) {
        e.preventDefault();
        var post_data = {'ad_alias': ad_alias, csrf_tok: csrf_hash};

        $.ajax({
            type: "POST",
            url: URL + 'user/add_to_favorite',
            data: post_data,
            success: function(data) {
                // return success
                $.fancybox.showLoading();

                $.fancybox({
                    'content': data,
                    'height': 20,
                    'minHeight': 20,
                    'width': 380,
                    'minWidth': 380,
                    'scrolling': false
                });
                
                $('.ico-star').addClass('ico-star-shine').removeClass('ico-star');
            }
        });
    });
    
    // remove from favorite
    $('#remove_favorites').click(function(e) {
        e.preventDefault();
        var post_data = {'ad_alias': $(this).attr('data-slug'), csrf_tok: csrf_hash};

        $.ajax({
            type: "POST",
            url: URL + 'user/remove_from_favorite',
            data: post_data,
            success: function(data) {
                // return success
                $.fancybox.showLoading();

                $.fancybox({
                    'content': data,
                    'height': 20,
                    'minHeight': 20,
                    'width': 380,
                    'minWidth': 380,
                    'scrolling': false,
                    'afterClose': function() {
                        window.location.reload();
                    }
                });
            }
        });
    });
});