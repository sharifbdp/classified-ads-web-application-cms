<?php $this->load->view('common/header'); ?>

    <body class='post_ad post_ad post_ad-show'>

        <?php $this->load->view('common/top_menu'); ?>

        <div id='site-content'>

            <div class='wrap'>
                <div class='inner-box-compact col3 polar-abs' id='posting-rules'>
                    <h3>Quick rules</h3>
                    <ul>
                        <li>Make sure you post in the correct category.</li>
                        <li>Do not post the same ad more than once. Duplicate ads will be rejected.</li>
                        <li>Do not upload pictures with watermarks. Invalid pictures will be removed.</li>
                        <li>Do not put your email or phone numbers in the title or description.</li>
                    </ul>
                    <p class='link'>
                        <a href="/en/help#q-11">Click here to see all of our posting rules. </a>
                    </p>
                </div>

                <div class='progress-bar'>
                    <div class='current details step'>
                        <i></i>
                        Fill in details
                    </div>
                    <div class='step preview'>
                        <i></i>
                        Check your ad
                    </div>
                    <div class='step confirmation'>
                        <i></i>
                        Confirmation
                    </div>
                </div>

                <noscript class='ads-form'>
                <div class='wrap'>
                    <div class='inner-box'>
                        <h2>Tonaton.com uses a lot of JavaScript.</h2>
                        <p>If you can't enable it in your browser, you're probably going to have a better experience on our <a href='http://m.tonaton.com/post_ad'>mobile version</a>.</p>
                    </div>
                </div>
                </noscript>
                <div class='inner-box loading'></div>
                <form accept-charset="UTF-8" action="" class="new_ad" enctype="multipart/form-data" id="ads-form" method="post">

                    <div class='inner-box form-content clearfix'>
                        <fieldset>
                            <button id="decoy-btn" type="submit">
                                <div class='btn btn-post'>
                                    <span>Check your ad</span>
                                </div>
                            </button><div class='row field category'>
                                <div class='label col2'>
                                    <label for="ad_category_id">Category</label>
                                </div>
                                <div class='input col6'>
                                    <div class='select_tree' id='ad_category_id'>
                                        <select autocomplete='off' name="cid">
                                            <option value="">Select a category...</option>
                                            <?php $this->Fronts->getTreeCategory(0, 0); ?>
                                            <option value="831">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class='row field ad-types'>
                                <div class='label col2'></div>
                                <div class='input col6'>
                                    <div class='inline-inputs'>
                                        <label>
                                            <input class="required" name="sale_type" type="radio" value="1" />
                                            <span>
                                                For sale
                                            </span>
                                        </label>
                                        <label>
                                            <input class="required" name="sale_type" type="radio" value="2" />
                                            <span>
                                                Wanted
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div id="attr-partial" class="properties">

                                <div class="row field title">
                                    <div class="label col2">
                                        <label for="ad_title">Ad title</label>
                                    </div>
                                    <div class="input col6">
                                        <input type="text" size="42" name="ad_title" maxlength="40" id="ad_title" class="string required">
                                        <div class="feedback">
                                            Keep it short and simple - and no price.
                                        </div>
                                    </div>
                                </div>
                                <div class="row field description">
                                    <div class="label col2">
                                        <label for="ad_description">Description</label>
                                    </div>
                                    <div class="input col6">
                                        <textarea rows="8" name="ad_description" maxlength="5000" id="ad_description" cols="60" class="text required countdown"></textarea>
                                        <div class="feedback">
                                            Good descriptions increase your ad's chances of success. Describe features, dimensions, condition and what's included.
                                        </div><span class="countdown" style="display: none;"><span></span>&nbsp;characters remaining</span>
                                    </div>
                                </div>
                                <div id="price-container" class="row field price">
                                    <div class="row field">
                                        <div class="label col2">
                                            <label for="ad_price">Price</label>
                                        </div>
                                        <div class="col6 input prepend">
                                            <div class="inline-inputs">
                                                <div class="add-on">
                                                    $USD
                                                </div>
                                                <input type="text" size="30" name="ad_price" id="ad_price" class="numeric integer optional digits ascii">
                                                <span class="input boolean optional ad_negotiable">
                                                    <label for="price_negotiable" class="boolean optional checkbox">
                                                        <input type="checkbox" value="1" name="price_negotiable" id="price_negotiable" class="boolean optional">Negotiable
                                                    </label>
                                                </span>
                                                <div class="feedback">Pick the right price. Everything sells if the price is right.</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div id="image-upload" class="row field images">
                                    <div class="label col2">
                                        <label for="add_image">
                                            Upload images
                                        </label>
                                    </div>
                                    <div class="input col6">
                                        <div class="input clearfix h-stack">
                                            <div class="upload-box">
                                                <label for="add_image" class="input-container">
                                                    <div class="btn tiny btn-upload-photo">
                                                        <span>Click to add photo</span>
                                                    </div>
                                                </label>
                                                <input type="file" name="add_image" id="add_image">
                                            </div>
                                        </div>
                                        <div class="feedback show">
                                            Must be either a JPEG, GIF or PNG image file (max 5MB).
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                        <fieldset>
                            <div class='legend'>
                                About you
                            </div>
                            <div class='row field seller-type'>
                                <div class='label col2'></div>
                                <div class='input col6'>
                                    <div class='inline-inputs'>
                                        <div class='seller-types' id='seller-types'>
                                            <label>
                                                <input class="required" id="ad_poster_poster_type_private" name="ad_poster_type" type="radio" checked="checked" value="1" />
                                                <span>
                                                    Private
                                                </span>
                                            </label>
                                            <label>
                                                <input class="required" id="ad_poster_poster_type_business" name="ad_poster_type" type="radio" value="2" />
                                                <span>
                                                    Business
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='row field poster_name'>
                                <div class='label col2'>
                                    <label class="required" for="ad_poster_name">Name</label>
                                </div>
                                <div class='input col6'>
                                    <input class="required" id="ad_poster_name" maxlength="30" name="ad_poster_name" size="30" type="text" />
                                </div>
                            </div>
                            <div class='row field poster_email'>
                                <div class='label col2'>
                                    <label for="ad_poster_email">Email</label>
                                </div>
                                <div class='input col6'>
                                    <input class="required email ascii" id="ad_poster_email" name="ad_poster_name" size="40" type="text" />
                                    <div id='mailcheck'></div>
                                    <div class='feedback'>
                                        Your email will be hidden on the ad, but we need it to send you updates about your ad.
                                    </div>
                                </div>
                            </div>
                            <div class='row field phone_no'>
                                <div class='label col2'>
                                    <label for="ad_poster_phone_number">Phone no</label>
                                </div>
                                <div class='input col6'>
                                    <div class='inline-inputs'>
                                        <div class='phone-nos'>
                                            <div class='phone-no'>
                                                <input class="phone required ascii" id="ad_poster_phone_number" maxlength="21" name="ad_poster_phone_number" type="text" />
                                                <input class="extra-field" id="ad_poster_hide_phone_numbers" name="ad_poster_phone_number_status" type="checkbox" value="1" />
                                                <label for="ad_poster_phone_number_status">Hide phone number</label>
                                                <div class='feedback'>
                                                    Enter a phone number starting with 0 (include the district code for landline numbers). Do not enter the country code.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='row field opt-out'>
                                <div class='label col2'></div>
                                <div class='input col6'>
                                    <input checked="checked" id="ad_poster_opt_out" name="ad_poster_opt_out" type="checkbox" value="1" />
                                    <label for="ad_poster_opt_out">I do not want to be contacted by external telemarketers.</label>
                                </div>
                            </div>

                            <div class='row field location'>
                                <div class='label col2'>
                                    <label for="ad_location_id">Location</label>
                                </div>
                                <div class='input col6'>
                                    <div class='select_tree'>
                                        <select id='ad_location_id' name="ad_location_id">
                                            <option value=''>Select a location...</option>
                                            <?php
                                            $all_location = $this->Fronts->get_all_location_data();
                                            if ($all_location) {
                                                foreach ($all_location as $loc) {
                                                    ?>
                                                    <option value="<?php echo $loc['id']; ?>"><?php echo $loc['name']; ?></option>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class='row field location'>
                                <div class='label col2'>
                                    <label for="ad_area_id">City/Area</label>
                                </div>
                                <div class='input col6'>
                                    <div class='select_tree'>
                                        <select id='ad_area_id' name="ad_area_id">
                                            <option value=''>First Select a location...</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class='actions form-actions inner-box-compact'>
                        <button class="btn post submit" id="post-item-submit" type="submit"><span>
                                Check your ad
                            </span>
                        </button><div class='checking hide' id='check-messages'>
                            <span class='check-in-progress muted'>
                                Checking your ad
                            </span>
                        </div>
                    </div>
                    <div class='alert wrap hide' id='check-error-message'>
                        <br>
                        <div class='box error'>
                            Something went wrong while checking your ad. Please click &quot;Check your ad&quot; again to post your ad. If the error persists, please contact customer support.
                        </div>
                    </div>
                    <div class='actions inner-box review-actions'>
                        <div class='center-wrap wrap clearfix'>
                            <div class='polar col'>
                                <button class="btn large post publish" name="publish" type="submit" value="Publish"><span>
                                        Publish ad
                                    </span>
                                </button></div>
                            <div class='info'>
                                <span class='polar'>
                                    Did you miss something?
                                    <a class='btn small edit' href='edit'>
                                        <span>
                                            edit ad
                                        </span>
                                    </a>
                                </span>
                                <span class='small-print polar'>
                                    By publishing your ad on Tonaton.com, you agree to Tonaton.com's <a href="/en/terms" data-ui-nav="modal">terms and conditions</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>


            </div>

        </div>
        
<?php $this->load->view('common/footer'); 