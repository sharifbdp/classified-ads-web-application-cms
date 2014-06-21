<?php $this->load->view('common/header'); ?>

<body class='post_item post_item post_item-show'>

    <?php $this->load->view('common/top_menu'); ?>
    
    <?php
    echo form_open('en/publish');
    echo form_hidden('ad_id', $content->id);
    echo form_hidden('poster_status', $content->poster_status);
    ?>
    <div id="site-content">
        
        <div class="wrap">
            <div class="progress-bar">
                <div class="details step done"><i></i>Fill in details</div>
                <div class="step preview current"><i></i>Check your ad</div>
                <div class="step confirmation"><i></i>Confirmation</div>
            </div>
            <div class="inner-box ads-review"><h1>Please check your ad before publishing:</h1>
                <div class="wrap center-wrap">
                    <div class="contact-info">
                        <div class="row">
                            <div class="col2 label">Name</div>
                            <div class="col value"><?php echo $content->poster_name; ?></div>
                        </div>
                        <div class="row">
                            <div class="col2 label">Email</div>
                            <div class="col7 value">
                                <div id="email"><?php echo $content->poster_email; ?></div>
                                <div class="info">If your email is incorrect, you will not receive updates about your ad.</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col2 label">Phone no</div>
                            <div class="col value"><?php echo $content->poster_phone; ?></div>
                        </div>
                    </div>
                    <div class="section placement">
                        <div class="row">
                            <div class="col2 label">Category</div>
                            <div class="col value"><?php echo $content->cat_name; ?></div>
                        </div>
                        <div class="row">
                            <div class="col2 label"></div>
                            <div class="col value">
                                <?php
                                echo ($content->for_what == 1) ? 'For sale' : '';
                                echo ($content->for_what == 2) ? 'Wanted' : '';
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col2 label">Location</div>
                            <div class="col value">
                                <?php echo $content->location . ', ' . $content->city; ?>
                            </div>
                        </div>
                    </div>
                    <div class="section details">
                        <div class="row">
                            <div class="col2 label">Ad title</div>
                            <div class="col value"><?php echo $content->title; ?></div>
                        </div>
                        <div class="row">
                            <div class="col2 label">Description</div>
                            <div class="col6 value description"><p><?php echo $content->details; ?></p></div>
                        </div>
                        <?php
                        $ad_img_list = $this->Fronts->get_all_ad_image_by_ad_id($content->id);
                        if(!empty($ad_img_list)){
                        ?>
                        <div class="row" id="image-upload">
                            <div class="col2 label"></div>
                            <div class="col value images preview-images h-stack">
                                <?php foreach ($ad_img_list as $list){ ?>
                                <div class="image">
                                    <img src="<?php echo base_url('uploads/ad_image/' . $list['image_name']);?>" width="115" height="82" style="border: 1px solid #e4e4e4;margin-bottom: 8px;">
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col2 label">Price</div>
                            <div class="col6 value images h-stack">
                                USD $ <?php echo $content->price; ?>
                            </div>
                        </div>
                    </div>
                    <?php if($content->poster_status == 5){ ?>
                    <div class="password">
                        <div class="row create_account">
                            <div class="col2">&nbsp;</div>
                            <div class="col">
                                <label>
                                    <input type="checkbox" id="create_account" name="create_account">
                                    Create an account - so that you can manage your ads easily
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col2 label">
                                <label for="ad_password">Set password</label>
                            </div>
                            <div class="col2 value">
                                <?php echo form_password(array('name' => 'password', 'id' => 'ad_password', 'class' => 'required', 'minlength' => '5', 'autocomplete' => 'off', 'value' => set_value(''))); ?>
                                <?php echo form_error('password', '<label for="ad_password" class="error" style="display: block;">', '</label>'); ?>
                            </div>
                            <div class="col2 label">
                                <label for="password_confirm">Verify password</label>
                            </div>
                            <div class="col2 value">
                                <?php echo form_password(array('name' => 'c_password', 'id' => 'password_confirm', 'class' => 'required', 'autocomplete' => 'off', 'value' => set_value(''))); ?>
                                <?php echo form_error('c_password', '<label for="password_confirm" class="error" style="display: block;">', '</label>'); ?>
                            </div>
                            <div class="row">
                                <div class="col2">&nbsp;</div>
                                <div class="col6 info" id="password_note">A password will protect your ad and allow you to edit or delete it</div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="section payment"></div>
                    
                </div>
            </div>
            
            <div id="check-error-message" class="alert wrap hide">
                <br>
                <div class="box error">
                    Something went wrong while checking your ad. Please click "Check your ad" again to post your ad. If the error persists, please contact customer support.
                </div>
            </div>

            <div class="actions inner-box review-actions">
                <div class="center-wrap clearfix">
                    <div class="polar col">
                        <button value="Publish" type="submit" id="publish_item" class="btn large post publish"><span>Publish ad</span></button>
                    </div>
                    <div class="info">
                        <span class="polar">
                            Did you miss something?
                            <a href="<?php echo base_url("en/edit_ad/{$content->id}/{$content->slug}");?>" id="edit_item" class="btn small edit"><span>edit ad</span></a>
                        </span>
                        <span class="small-print polar">
                            By publishing your ad on Website.com, you agree to Website.com's <a href="<?php echo base_url(); ?>en/details/terms-conditions" target="_blank">terms and conditions</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
    
    <?php $this->load->view('common/footer'); ?>

<!--    <script type="text/javascript">
        $(function(){
            $('#publish_item').click(function() {
                $('form').attr('action', 'publish');
            });
            $('#edit_item').click(function() {
                $('form').attr('action', 'edit');
            });
        });
    </script>-->