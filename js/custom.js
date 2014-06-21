$(document).ready(function() {

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

    // add to favorite
    
    $('#add_to_favorite').click(function(e) {
        e.preventDefault();
        var post_data = { 'ad_alias': ad_alias, csrf_tok : csrf_hash };
        
        $.ajax({
            type: "POST",
            url: URL + 'user/add_to_favorite',
            data: post_data,
            success: function(data) {
                // return success
                
            }
        });
    });

});











/*
 
 var i18n = i18n || {};
 i18n.en = {
 account: {
 "delete-confirmation": "Are you sure you want to delete this ad?"
 },
 ad_types: {
 all: "All",
 buy: "Wanted",
 "education-teaching_teaching-training_coaching-training": {
 sell: "Offered"
 },
 "education-teaching_teaching-training_other": {
 sell: "Offered"
 },
 "education-teaching_teaching-training_private-lessons": "Offered",
 "education-teaching_teaching-training_tutoring": {
 sell: "Offered"
 },
 education_tuition: {
 sell: "Offered"
 },
 "education_tuition_bangla-medium": {
 sell: "Offered"
 },
 education_tuition_classes: {
 sell: "Offered"
 },
 "education_tuition_english-medium": {
 sell: "Offered"
 },
 "education_tuition_private-lessons": {
 sell: "Offered"
 },
 jobs: {
 sell: "Offered"
 },
 jobs_services: {
 sell: "Offered"
 },
 "jobs_services_bar-restaurant-bakery-services": {
 sell: "Offered"
 },
 "jobs_services_car-services": {
 sell: "Offered"
 },
 "jobs_services_car-transport-services": {
 sell: "Offered"
 },
 "jobs_services_caretaking-services": {
 sell: "Offered"
 },
 "jobs_services_cleaning-services": {
 sell: "Offered"
 },
 "jobs_services_computer-services": {
 sell: "Offered"
 },
 "jobs_services_construction-services": {
 sell: "Offered"
 },
 "jobs_services_dryers-cleaners-services": {
 sell: "Offered"
 },
 "jobs_services_electronics-engineering-services": {
 sell: "Offered"
 },
 "jobs_services_fashion-beauty-health-services": {
 sell: "Offered"
 },
 "jobs_services_fashion-health-beauty-services": {
 sell: "Offered"
 },
 "jobs_services_financial-legal-services": {
 sell: "Offered"
 },
 "jobs_services_food-catering-services": {
 sell: "Offered"
 },
 "jobs_services_home-services": {
 sell: "Offered"
 },
 "jobs_services_maritime-services": {
 sell: "Offered"
 },
 "jobs_services_media-entertainment-services": {
 sell: "Offered"
 },
 "jobs_services_mobile-phone-services": {
 sell: "Offered"
 },
 "jobs_services_music-event-services": {
 sell: "Offered"
 },
 jobs_services_other: {
 sell: "Offered"
 },
 "jobs_services_printing-services": {
 sell: "Offered"
 },
 "jobs_services_security-services": {
 sell: "Offered"
 },
 "jobs_services_travel-services": {
 sell: "Offered"
 },
 "jobs_services_visa-services": {
 sell: "Offered"
 },
 "jobs_services_writing-services": {
 sell: "Offered"
 },
 "pets-animals_caretakers-petsitters-dogwalkers": {
 sell: "Wants to become"
 },
 "pets-animals_veterinary-services": {
 sell: "Wants to become"
 },
 property_land: {
 rent: "For lease",
 rent_wanted: "Wanted - for lease"
 },
 property_lands: {
 rent: "For lease",
 rent_wanted: "Wanted - for lease"
 },
 property_plots: {
 rent: "For lease",
 rent_wanted: "Wanted - for lease"
 },
 rent: "For rent",
 rent_wanted: "Wanted – for rent",
 sell: "For sale",
 swap: "Swap",
 vacation_rent: "Vacation Rental",
 vacation_rent_wanted: "Vacation rental - wanted"
 },
 ads: {
 business: "Business",
 favorite: "Favorite",
 favorited: "Favorited",
 no_favorites: {
 business: "business",
 description: "This tab is an easy way of always having your favorite ads one click away.",
 help: "Click on the star <i class='star'>x</i> symbol on any ad to save it as a favorite. ",
 "private": "private",
 title: "You don't have any favorite %{adType} ads, yet."
 },
 no_result: {
 description: "Looks like we don't have exactly what you were looking for. Sorry about that.",
 title: "There are no ads here",
 title_business: "You don't have any business ads, yet.",
 title_private: "You don't have any private ads, yet."
 }
 },
 create_ad: {
 form: {
 error: {
 ad_category: "You must select a category",
 ad_location: "You must select a location",
 ad_password: "Password must be at least 5 characters",
 category_properties: {
 jobs_apply_via: "Please enter a valid URL or email address",
 vehicles_engine_capacity_cc: "You must enter a value between 0 and 10000",
 vehicles_engine_capacity_hp: "You must enter a value between 0 and 1000",
 vehicles_model_year: "You must enter a value between 1900 and 2014",
 jobs_company_website: "Please enter a valid URL, such as http://www.tonaton.com"
 }
 },
 help: {
 characters_remaining: "characters remaining"
 },
 labels: {
 ad_price: {
 buy: "Price",
 jobs: {
 buy: "Salary"
 },
 rent: "Rent",
 rent_wanted: "Max rent",
 sell: "Price",
 swap: "Price"
 },
 disable_virtual_keyboard: "Disable Keyboard",
 enable_virtual_keyboard: "Enable keyboard",
 seller_phone_no: "Phone no",
 your_company: "Company name",
 your_name: "Name"
 },
 photo_upload: {
 delete_confirmation: "Are you sure you want to delete it?",
 extension_error: "We don't allow photos in this format. Please use jpg, gif or png",
 upload_error: "Image upload failed, please try again"
 }
 }
 },
 featured_ad: {
 help: {
 body_l1: "This feature will <em>highlight your ad</em> and <em>move it up to the top of the listings</em> every 6 hours for 7 days.",
 body_l2: "What does this mean? When your ad is approved, it will be posted and highlighted in yellow. During the day it will move down the pages as usual, but after 6 hours, it will automatically be bumped up to the top of the listings again. This will be repeated every 6 hours for 7 days. Your ad will stay yellow for the full 7 days.",
 body_l3: "How does this help you?",
 body_l4: "Highlighted ads stand out, and newer ads get more visitors. So bumping up and highlighting your ad means getting more views and more replies. "
 }
 },
 form: {
 error: {
 password_match: "Passwords did not match"
 },
 mailcheck: 'Did you mean <a href="#">%{ email }</a>?'
 },
 moment: {
 calendar: {
 lastDay: "[Yesterday at] LT",
 lastWeek: "[last] dddd [at] LT",
 nextDay: "[Tomorrow at] LT",
 nextWeek: "dddd [at] LT",
 sameDay: "[Today at] LT",
 sameElse: "L"
 },
 months: "January_February_March_April_May_June_July_August_September_October_November_December",
 monthsShort: "Jan_Feb_Mar_Apr_May_Jun_Jul_Aug_Sep_Oct_Nov_Dec",
 relativeTime: {
 M: "a month",
 MM: "%d months",
 d: "a day",
 dd: "%d days",
 future: "in %s",
 h: "an hour",
 hh: "%d hours",
 m: "a minute",
 mm: "%d minutes",
 past: "%s ago",
 s: "a few seconds",
 y: "a year",
 yy: "%d years"
 },
 weekdays: "Sunday_Monday_Tuesday_Wednesday_Thursday_Friday_Saturday",
 weekdaysMin: "Su_Mo_Tu_We_Th_Fr_Sa",
 weekdaysShort: "Sun_Mon_Tue_Wed_Thu_Fri_Sat"
 },
 prettyDate: {
 today: "Today",
 yesterday: "Yesterday",
 timeDayFormat: "D MMM h:mm a",
 timeFormat: "h:mm a"
 },
 review: {
 account_password_label: "Account password",
 create_account_label: "Create an account - so that you can manage your ads easily",
 email_hidden_info: "Your email will be hidden on the ad.",
 email_incorrect_info: "If your email is incorrect, you will not receive updates about your ad.",
 featured_ad: {
 amount_payable: "Amount payable",
 choose_payment: "Please choose a payment method.",
 choose_payment_error: "You must choose a payment method.",
 headline: "Make your ad <em>stand out!</em>",
 learn_more: "Learn more.",
 pay_and_publish: "Pay and publish ad",
 product_info: "Highlight your ad and get more views for only %{price}.",
 product_leader: "Bump Up & Highlight for 7 days"
 },
 headline: "Please check your ad before publishing:",
 hide_phone_no: "Your phone no will be hidden in the ad",
 negotiable: "Negotiable",
 password_info: "A password will protect your ad and allow you to edit or delete it",
 password_label: "Set password",
 verify_password_label: "Verify password",
 warn_before_leave: "You haven't finished posting your ad yet."
 },
 select_category_prompt: "Select a category...",
 select_city_area_prompt: "Select city or area...",
 select_city_province_prompt: "Select city or region...",
 select_subcategory_prompt: "Select a subcategory...",
 seller_types: {
 business: "Business advertiser",
 "private": "Private"
 },
 serp: {
 filter: {
 count: "Showing <strong>%{number}</strong> of <strong>%{total}</strong> ads",
 reset: "Reset filters",
 toggle_button: "Filter result"
 },
 labels: {
 category: "Category"
 },
 link_tree_more: "See more...",
 linkshelf: {
 az: "A - Z"
 }
 },
 validation: {
 digits: "Please enter a number",
 email: "You must enter a valid e-mail address",
 max: "Please enter a value less than or equal to {0}.",
 min: "Please enter a value greater than or equal to {0}.",
 number: "Please enter a number",
 phone: "You must enter a valid phone number",
 required: "This field is required",
 url: "Please enter a valid URL",
 "url-or-email": "Please enter a valid URL or email address"
 },
 product_name: "Tonaton.com"
 };
 
 */