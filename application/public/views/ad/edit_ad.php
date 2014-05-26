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
                    <p class='link'><a href="<?php echo base_url('en/details/faq');?>">Click here to see all of our posting rules. </a></p>
                </div>

                <div class='progress-bar'>
                    <div class='current details step'><i></i>Fill in details</div>
                    <div class='step preview'><i></i>Check your ad</div>
                    <div class='step confirmation'><i></i>Confirmation</div>
                </div>

                <?php //echo validation_errors('<div class="error">', '</div>'); ?>
                <?php echo form_open_multipart('', array('class' => 'new_ad', 'id' => 'ads-form'))?>

                    <div class='inner-box form-content clearfix'>
                        <fieldset>
                            <button id="decoy-btn" type="submit">
                                <div class='btn btn-post'><span>Check your ad</span></div>
                            </button>
                            <div class='row field category'>
                                <div class='label col2'>
                                    <label for="ad_category_id">Category</label>
                                </div>
                                <div class='input col6'>
                                    <div class='select_tree' id='ad_category_id'>
                                        <select autocomplete='off' name="cate_2">
                                            <option value="">Select a category...</option>
                                            <?php
                                            $cate_value = $content->cate_2;
                                            $all_cate_1 = $this->Fronts->get_all_parent_category(0);
                                            foreach ($all_cate_1 as $cate_1) {
                                                $all_cate_2 = $this->Fronts->get_all_parent_category($cate_1['id']);
                                                echo '<optgroup label="' . $cate_1['name'] . '" data-id="' . $cate_1['id'] . '">';
                                                foreach ($all_cate_2 as $cate_2) {
                                                    $selected = ($cate_value == $cate_2['id']) ? 'selected=selected' : '';
                                                    echo "<option value='" . $cate_2['id'] . "' {$selected}>" . $cate_2['name'] . "</option>";
                                                }
                                                echo '</optgroup>';
                                            }
                                            ?>
                                            <option value="999">Other</option>
                                        </select>
                                        <select autocomplete='off' name="cate_3" style="display: none;">
                                            
                                        </select>
                                    </div>
                                    <?php echo form_error('cate_2', '<label for="ad_category_id" class="error" style="display: block;">', '</label>'); ?>
                                </div>
                            </div>
                            <div class='row field ad-types'>
                                <div class='label col2'></div>
                                <div class='input col6'>
                                    <div class='inline-inputs'>
                                        <?php
                                        $for_what = $content->for_what;
                                        $checked_1 = ($for_what == 1) ? TRUE : FALSE;
                                        $checked_2 = ($for_what == 2) ? TRUE : FALSE;
                                        ?>
                                        <label>
                                            <?php echo form_radio(array('name' => 'for_what', 'value' => '1', 'checked' => $checked_1)); ?>
                                            <span>For sale</span>
                                        </label>
                                        <label>
                                            <?php echo form_radio(array('name' => 'for_what', 'value' => '2', 'checked' => $checked_2)); ?>
                                            <span>Wanted</span>
                                        </label>
                                    </div>
                                    <?php echo form_error('for_what', '<label for="for_what" class="error" style="display: block;">', '</label>'); ?>
                                </div>
                            </div>

                            <div id="attr-partial" class="properties">

                                <div class="row field title">
                                    <div class="label col2">
                                        <label for="ad_title">Ad title</label>
                                    </div>
                                    <div class="input col6">
                                        <?php echo form_input(array('name' => 'title', 'id' => 'ad_title', 'class' => 'string required', 'maxlength' => '40', 'value' => $content->title)); ?>
                                        <?php echo form_error('title', '<label for="ad_title" class="error" style="display: block;">', '</label>'); ?>
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
                                        <?php echo form_textarea(array('name' => 'details', 'id' => 'ad_description', 'class' => 'text required countdown', 'rows' => '8', 'cols' => '58', 'maxlength' => '5000', 'value' => $content->details))?>
                                        <?php echo form_error('details', '<label for="ad_description" class="error" style="display: block;">', '</label>'); ?>
                                        <div class="feedback">
                                            Good descriptions increase your ad's chances of success. Describe features, dimensions, condition and what's included.
                                        </div>
                                        <span class="countdown" style="display: none;"><span></span>&nbsp;characters remaining</span>
                                    </div>
                                </div>
                                <div id="price-container" class="row field price">
                                    <div class="row field">
                                        <div class="label col2">
                                            <label for="ad_price">Price</label>
                                        </div>
                                        <div class="col6 input prepend">
                                            <div class="inline-inputs">
                                                <div class="add-on">$USD</div>
                                                <?php echo form_input(array('name' => 'price', 'id' => 'ad_price', 'class' => 'numeric integer optional digits ascii', 'size' => '30', 'value' => $content->price)); ?>
                                                <span class="input boolean optional ad_negotiable">
                                                    <label for="price_negotiable" class="boolean optional checkbox">
                                                        <input type="checkbox" value="1" name="negotiable" id="price_negotiable" class="boolean optional">Negotiable
                                                    </label>
                                                </span>
                                                <?php echo form_error('price', '<label for="ad_price" class="error" style="display: block;">', '</label>'); ?>
                                                <div class="feedback">Pick the right price. Everything sells if the price is right.</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div id="image-upload" class="row field images">
                                    <div class="label col2">
                                        <label for="add_image">Upload images</label>
                                    </div>
                                    <div class="input col6">
                                        <div class="input clearfix h-stack">
                                            <div class="upload-box">
                                                <label for="add_image" class="input-container">
                                                    <div class="btn tiny btn-upload-photo">
                                                        <span>Click to add photo</span>
                                                    </div>
                                                </label>

                                                <div style="width: 130px; height: 100px; display: inline-block;" class="showImage">
                                                    <img  id="showImg" src="<?php echo base_url();?>images/add_img_icon.png" alt="" border="0" width="130px" height="100px"/>
                                                </div>

                                                <input type="file" name="ad_image[]" onchange='Test.UpdatePreview(this)' accept="image/*" id="upload" />
                                            </div>
                                        </div>
                                        <div class="feedback show" id="after_ad_more_img">
                                            Must be either a JPEG, GIF or PNG image file (max 5MB).
                                        </div>
                                        <button id="add_more_image">Add More</button>
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                        <fieldset>
                            <div class='legend'>About you</div>
                            <div class='row field seller-type'>
                                <div class='label col2'></div>
                                <div class='input col6'>
                                    <div class='inline-inputs'>
                                        <?php
                                        $ad_type = $content->type;
                                        $ch_1 = ($ad_type == 1) ? TRUE : FALSE;
                                        $ch_2 = ($ad_type == 2) ? TRUE : FALSE;
                                        ?>
                                        <div class='seller-types' id='seller-types'>
                                            <label>
                                                <?php echo form_radio(array('name' => 'type', 'value' => '1', 'class' => 'required', 'id'=> 'ad_poster_poster_type_private', 'checked' => $ch_1)); ?>
                                                <span>Private</span>
                                            </label>
                                            <label>
                                                <?php echo form_radio(array('name' => 'type', 'value' => '2', 'class' => 'required', 'id'=> 'ad_poster_poster_type_business', 'checked' => $ch_2)); ?>
                                                <span>Business</span>
                                            </label>
                                        </div>
                                    </div>
                                    <?php echo form_error('type', '<label for="ad_type" class="error" style="display: block;">', '</label>'); ?>
                                </div>
                            </div>
                            <div class='row field poster_name'>
                                <div class='label col2'>
                                    <label class="required" for="ad_poster_name">Name</label>
                                </div>
                                <div class='input col6'>
                                    <?php echo form_input(array('name' => 'name', 'id' => 'ad_poster_name', 'class' => 'required', 'maxlength' => '30', 'size' => '30', 'value' => $content->poster_name)); ?>
                                    <?php echo form_error('name', '<label for="ad_poster_name" class="error" style="display: block;">', '</label>'); ?>
                                </div>
                            </div>
                            <div class='row field poster_email'>
                                <div class='label col2'>
                                    <label for="ad_poster_email">Email</label>
                                </div>
                                <div class='input col6'>
                                    <?php echo form_input(array('name' => 'email', 'id' => 'ad_poster_email', 'class' => 'required email ascii', 'size' => '40', 'value' => $content->poster_email)); ?>
                                    <?php echo form_error('email', '<label for="ad_poster_email" class="error" style="display: block;">', '</label>'); ?>
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
                                                <?php echo form_input(array('name' => 'phone', 'id' => 'ad_poster_phone_number', 'class' => 'phone required ascii', 'maxlength' => '21', 'value' => $content->poster_phone)); ?>
                                                <?php echo form_error('phone', '<label for="ad_poster_phone_number" class="error" style="display: block;">', '</label>'); ?>
                                                <input class="extra-field" id="ad_poster_hide_phone_numbers" name="p_status" type="checkbox" value="1" />
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
                                        <select id='ad_location_id' name="ad_location">
                                            <option value=''>Select a location...</option>
                                            <?php
                                            $all_location = $this->Fronts->get_all_location_data();
                                            if ($all_location) {
                                                foreach ($all_location as $loc) {
                                                    $location_selected = ($content->ad_location == $loc['id']) ? 'selected=selected' : '';
                                                    ?>
                                                    <option value="<?php echo $loc['id']; ?>" <?php echo $location_selected;?>><?php echo $loc['name']; ?></option>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <?php echo form_error('ad_location', '<label for="ad_location_id" class="error" style="display: block;">', '</label>'); ?>
                                </div>
                            </div>
                            <div class='row field location'>
                                <div class='label col2'>
                                    <label for="ad_area_id">City/Area</label>
                                </div>
                                <div class='input col6'>
                                    <div class='select_tree'>
                                        <select id='ad_area_id' name="ad_city">
                                            <option value=''>First Select a location...</option>
                                            <?php if(!empty($content->ad_city)){ ?>
                                            <option value="<?php echo $content->ad_city; ?>" selected="selected"><?php echo $content->city; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <?php echo form_error('ad_city', '<label for="ad_area_id" class="error" style="display: block;">', '</label>'); ?>
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

                <?php echo form_close();?>

            </div>

        </div>

<?php $this->load->view('common/footer'); ?>

        <script type="text/javascript">
            $(document).ready(function() {

                var MaxInputs       = 8; //maximum input boxes allowed
                var InputsWrapper   = $("#after_ad_more_img"); //Input boxes wrapper ID
                var AddButton       = $("#add_more_image"); //Add button ID

                var x = InputsWrapper.length; //initlal text box count
                var FieldCount=1; //to keep track of text box added

                $(AddButton).click(function (e)  //on add input button click
                {
                        if(x <= MaxInputs){
                            FieldCount++; //text box added increment
                            //add input box
                            $(InputsWrapper).append('<div class="more_image_box"><input type="file" name="ad_image[]" id="field_'+ FieldCount +'" value=""/><a href="#" class="removeclass">&times;</a></div>');
                            x++; //text box increment
                        }
                return false;
                });

                $("body").on("click",".removeclass", function(e){ //user click on remove text
                        if( x > 1 ) {
                                $(this).parent('div').remove(); //remove text box
                                x--; //decrement textbox
                        }
                return false;
                });
                
                // load sub category list (cate_3)  by select category(cate_2)
                $("select[name=cate_2]").change(function() {

                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url(); ?>en/view_category_list_by_parent/"+$(this).val(),
                        dataType: "HTML",
                        success: function(data){
                            $('select[name=cate_3]').empty();
                            if(data !== ''){
                               $('select[name=cate_3]').show();
                               $('select[name=cate_3]').append(data);
                            }else{$('select[name=cate_3]').hide();}
                        }
                    });

                });
                
                // load area by select city
                $('#ad_location_id').change(function() {

                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url(); ?>en/view_area_by_location/"+$('#ad_location_id').val(),
                        dataType: "HTML",
                        success: function(data){
                            $('#ad_area_id').empty();
                            if(data !== ''){
                               $("#ad_area_id").append(data);
                            }else{
                               $("#ad_area_id").append("<option value=''>No City/Area found</option>");
                            }
                        }
                    });

                });

//                //set price negotiable
//                $('#price_negotiable').change(function() {
//                    if ($(this).attr("checked")) {
//                       $('#ad_price').val('0');
//                       $('#ad_price').attr('readonly', 'readonly');
//                    }else{
//                       $('#ad_price').val('');
//                       $('#ad_price').removeAttr('readonly');
//                    }
//                });

                //set business name
                $('#ad_poster_poster_type_business').click(function() {
                    if ($(this).attr("checked")) {
                       $('.poster_name div label').text('Business Name');
                    }else{
                       $('.poster_name div label').text('Name');
                    }
                });
                $('#ad_poster_poster_type_private').click(function() {
                    if ($(this).attr("checked")) {
                       $('.poster_name div label').text('Name');
                    }else{
                       $('.poster_name div label').text('Business Name');
                    }
                });

            });

            $(function() {
                Test = {
                    UpdatePreview: function(obj) {
                        // if IE < 10 doesn't support FileReader
                        if (!window.FileReader) {
                            // don't know how to proceed to assign src to image tag
                        } else {
                            var reader = new FileReader();
                            var target = null;

                            reader.onload = function(e) {
                                target = e.target || e.srcElement;
                                $("#showImg").prop("src", target.result);
                            };
                            reader.readAsDataURL(obj.files[0]);
                        }
                    }
                };
            });
        </script>
