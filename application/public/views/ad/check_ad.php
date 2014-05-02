<?php $this->load->view('common/header'); ?>

<body class='post_item post_item post_item-show'>

    <?php $this->load->view('common/top_menu'); ?>

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
                            <div class="col value"><?php echo $name;?></div>
                        </div>
                        <div class="row">
                            <div class="col2 label">Email</div>
                            <div class="col7 value">
                                <div id="email"><?php echo $email;?></div>
                                <div class="info">If your email is incorrect, you will not receive updates about your ad.</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col2 label">Phone no</div>
                            <div class="col value"><?php echo $phone;?></div>
                        </div>
                    </div>
                    <div class="section placement">
                        <div class="row">
                            <div class="col2 label">Category</div>
                            <div class="col value">
                                <?php 
                                $main_cate = $this->Fronts->get_category_by_id($cid);
                                if(!empty($main_cate)){
                                    echo $main_cate->name;
                                    if($main_cate->parent_id != '0'){
                                        $sub_cate = $this->Fronts->get_category_by_id($main_cate->parent_id);
                                        echo ' &Implies; ' . $sub_cate->name;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col2 label"></div>
                            <div class="col value">
                                <?php 
                                echo ($for_what == 1) ? 'For sale' : ''; 
                                echo ($for_what == 2) ? 'Wanted' : ''; 
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col2 label">Location</div>
                            <div class="col value">
                                <?php 
                                $location_details = $this->Fronts->get_location_details_by_id($ad_location);
                                if(!empty($location_details)){ echo $location_details->name; }

                                $city_details = $this->Fronts->get_city_details_by_id($ad_city);
                                if(!empty($city_details)){ echo ' &Implies; ' . $city_details->name; }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="section details">
                        <div class="row">
                            <div class="col2 label">Ad title</div>
                            <div class="col value"><?php echo $title; ?></div>
                        </div>
                        <div class="row">
                            <div class="col2 label">Description</div>
                            <div class="col6 value description"><p><?php echo $details; ?></p></div>
                        </div>
                        <div class="row" id="image-upload">
                            <div class="col2 label"></div>
                            <div class="col value images preview-images h-stack">
                                <div class="image">
                                  <a href="http://res.cloudinary.com/saltside-production/image/private/t_large_tonaton/bb86cdf2-3e5f-4105-9e75-1d38ae78f95d.jpg" data-ui-nav="modal" class="frame"><img src="http://res.cloudinary.com/saltside-production/image/private/t_gallerythumb/bb86cdf2-3e5f-4105-9e75-1d38ae78f95d.jpg"></a>
                                </div>
                            </div>
                          </div>
                        <div class="row">
                            <div class="col2 label">Price</div>
                            <div class="col6 value images h-stack">
                                USD $ <?php echo $price;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="check-error-message" class="alert wrap hide">
                <br>
                <div class="box error">
                    Something went wrong while checking your ad. Please click "Check your ad" again to post your ad. If the error persists, please contact customer support.
                </div>
            </div>
            
            <?php 
            echo form_open('');
            echo form_hidden('ad_id', $ad_id);
            ?>
                <div class="actions inner-box review-actions">
                    <div class="center-wrap clearfix">
                        <div class="polar col">
                            <button value="Publish" type="submit" id="publish_item" class="btn large post publish"><span>Publish ad</span></button>
                        </div>
                        <div class="info">
                            <span class="polar">
                                Did you miss something?
                                <button value="Edit" type="submit" id="edit_item" class="btn small edit"><span>edit ad</span></button>
                            </span>
                            <span class="small-print polar">
                                By publishing your ad on Tonaton.com, you agree to Tonaton.com's <a data-ui-nav="modal" href="/en/terms">terms and conditions</a>
                            </span>
                        </div>
                    </div>
                </div>
            <?php echo form_close();?>
        </div>
    </div>

    <?php $this->load->view('common/footer'); ?>

    <script type="text/javascript">
        $(function(){
            $('#publish_item').click(function() {
                $('form').attr('action', 'publish');
            });
            $('#edit_item').click(function() {
                $('form').attr('action', 'edit');
            });
        });
    </script>