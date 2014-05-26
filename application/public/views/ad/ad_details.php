<?php $this->load->view('common/header'); ?>

    <body class='ads ads ads-show'>

        <?php $this->load->view('common/top_menu'); ?>

        <div id='site-content'>
            
            <?php /*
            <div class="alert wrap">
                <div class="box success"><a href="#" class="polar close">×</a>
                    <p>This ad has been reported, thank you.</p>
                </div>
            </div>
             */
            ?>
            
            <div class='wrap'>
                <?php if(!empty($content)){ ?>
                <div class='item-top row'>
                    <div class='col'>
                        <ol class='breadcrumbs clearfix h-stack flat'>
                            <li><a href="<?php echo base_url(); ?>en/all_ads" rel="up up">All ads</a><span>&rarr;</span></li>
                            <?php
                            $cate_1 = $this->Fronts->get_category_by_id($content->cate_1);
                            $cate_2 = $this->Fronts->get_category_by_id($content->cate_2);
                            $cate_3 = $this->Fronts->get_category_by_id($content->cate_3);
                            if ($cate_1) {
                                ?>
                                <li><a href="#" rel="up"><?php echo $cate_1->name; ?></a><span>&rarr;</span></li>
                                <?php
                            }
                            if ($cate_2 && empty($cate_3)) {
                                ?>
                                <li><a href="#" class="current" rel="current"><?php echo $cate_2->name; ?></a> in <?php echo $content->city; ?></li>
                            <?php
                            }

                            if ($cate_2 && $cate_3) {
                                ?>
                                <li><a href="#" rel="up"><?php echo $cate_2->name; ?></a><span>&rarr;</span></li>
                                <?php
                            }
                            if ($cate_3) {
                                ?>
                                <li><a href="#" class="current" rel="current"><?php echo $cate_3->name; ?></a> in <?php echo $content->city; ?></li>
                        <?php } ?>
                        </ol>
                    </div>

                    <div class='item-nav polar'>
                        <a class='back' href='<?php echo base_url(); ?>en/all_ads'><i>&laquo;</i>Back to listing</a>
                        <?php
                        $prev_ad = $this->Fronts->get_previous_ad($content->id);
                        if (!empty($prev_ad)) {
                            ?>
                            <a class='prev' href='<?php echo base_url('en/view/' . $prev_ad->slug); ?>'><i>&lsaquo;</i>Previous ad</a>
                            <?php
                        }
                        $next_ad = $this->Fronts->get_next_ad($content->id);
                        if (!empty($next_ad)) {
                            ?>
                            <a class='next' href='<?php echo base_url('en/view/' . $next_ad->slug); ?>'>Next ad<i>&rsaquo;</i></a>
                        <?php } ?>
                    </div>

                </div>
                <div class='inner-box item-details'>
                    <h1><?php echo $content->title;?> <small><?php echo ($content->for_what == 1) ? 'For sale' : 'Wanted';?></small></h1>
                    <div class='item-meta'>
                        <div class='item-info'>
                            Posted by <a href="#contact-email" class="contact"><?php echo $content->poster_name;?></a><?php echo ($content->type == 2) ? " (Business ad) " : "";?>
                            <time class='item-date'><?php echo date('d M  h:i a', strtotime($content->entry_date));?></time><span class='item-location'>, <?php echo $content->city;?></span>
                            <a class='btn small' data-ui-nav='modal' href='#favorite-login'>
                                <span><i class='ico-star'></i>Favorite</span>
                            </a>
                            
                            <?php /*
                            <a class='btn small share' data-ui-nav='modal' href='#share'>
                                <span><i class='ico-share'></i>Share this ad</span>
                            </a>
                             */
                            ?>
                            
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col ' id='item-main'> <!-- four-rd-padding -->
                            <?php if(!empty($all_images)){
                                if(count($all_images) == 1){
                                ?>
                            <div id='single-image'>
                                <div class='frame'>
                                    <div class='items'>
                                        <div class='item'>
                                            <?php
                                            foreach ($all_images as $img){
                                            ?>
                                            <img alt="<?php echo $content->title;?>" src="<?php echo base_url('uploads/ad_image/' . $img['image_name']); ?>" />
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class='shadow'></div>
                            </div>
                                <?php }else{ ?>
                            <div data-ui-default='0' data-ui='gallery' id='gallery'>
                                <div class='frame'>
                                    <div class='items'>
                                        <?php foreach ($all_images as $img){?>
                                        <div class='item'>
                                            <img alt="<?php echo $content->title;?>" src="<?php echo base_url('uploads/ad_image/' . $img['image_name']); ?>" />
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class='arrows'>
                                        <a data-ui-nav='prev' href='#'><i class='arrow'>prev</i></a>
                                        <a data-ui-nav='next' href='#'><i class='arrow'>next</i></a>
                                    </div>
                                </div>
                                <div class='shadow'></div>
                                <div class='thumbs'>
                                    <?php $sl=1; foreach ($all_images as $img){?>
                                    <a data-ui-nav='<?php echo $sl;?>' href='#'>
                                        <img alt=" - " src="<?php echo base_url('uploads/ad_image/thumbs/' . $img['image_name']); ?>" width="105" height="75" />
                                    </a>
                                    <?php $sl++; } ?>
                                </div>
                            </div>
                            <?php } } ?>
                            <div id='item-information-left'>
                                <div class='copy' id='item-text-description'><p><?php echo $content->details;?></p></div>
                            </div>
                            
                            <?php /*
                            <div class='row four-rd-row'>
                                <div class='col'>
                                    <div class='item-actions'>
                                        <ul class='four-rd'>
                                            <li>
                                                <a class='phone' href=''>
                                                    <span class='contact-text'>024XXXXXXXX</span>
                                                    <span class='additional-text'>Click to show phone number</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class='email send-email-btn' href=''>
                                                    <span class='contact-text'>Reply by email</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                             * 
                             */
                            ?>
                        </div>
                        <div class='col' id='item-information-right'>
                            <div class='item-actions'>
                                <ul class='four-rd'>
                                    <li>
                                        <a class='phone' href=''>
                                            <span class='contact-text'><?php echo $content->poster_phone;?></span>
<!--                                            <span class='additional-text'>Click to show phone number</span>-->
                                        </a>
                                    </li>
                                    <li>
                                        <a class='email send-email-btn' href='<?php echo 'mailto:' . $content->poster_email;?>'>
                                            <span class='contact-text'>Reply by email</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class='price-tag'>
                                <div class='tag'>USD $ <?php echo round($content->price);?></div>
                            </div>
                            <div class='attributes'>
                                <?php echo ($content->negotiable == 1) ?'<div class="negotiable">(Price is negotiable)</div>' : ''; ?>
                                <div id='item-attributes'>
                                    <div class='attr'>
                                        <span class='label'>Category:</span>
                                        <span class='value'><a href='#'><?php echo (!empty($cate_3)) ? $cate_3->name : $cate_2->name;?></a></span>
                                    </div>
                                    <div class='attr'>
                                        <span class='label'>Location:</span>
                                        <span class='value'><a href='#'><?php echo $content->city . ', ' . $content->location;?></a></span>
                                    </div>
                                    <?php /*
                                    <div class='attr'>
                                        <span class='label'>Brand:</span>
                                        <span class='value'>Samsung</span>
                                    </div>
                                    <div class='attr'>
                                        <span class='label'>Features:</span>
                                        <span class='value'>Touch</span>
                                    </div>
                                     */ ?>
                                </div>
                            </div>

                            <div id='detail-banner'><div id='div-gpt-ad-1386319362694-141' style='width:250px; height:250px;'></div></div>
                        </div>
                    </div>
                </div>


<?php /*
                 <div data-ui='modal' id='share'>

                                    <div id='item-nav-bar'>
                                        <div class='tabs'>
                                            <div class='h-stack'>
                                                <div class='tab current'>
                                                    <a href='#social'>Social Sharing</a>
                                                </div>
                                                <div class='tab'>
                                                    <a href='#email'>Email</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='tab-content' id='social'>
                                        <div class='inner-box clearfix'>
                                            <h2>Share this ad</h2>
                                            <div class='facebook-like'></div>
                                            <div class='twitter-tweet'>
                                                <a class='twitter-share-button' data-count='none' data-hashtags='tonatonghana' data-text='slightly used galaxy note 1 at&amp;t  for sale in Kumasi' data-via='tonatonghana' href='https://twitter.com/share'></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='tab-content ui-helper-hidden' id='email'>
                                        <form accept-charset="UTF-8" action="/en/slightly-used-galaxy-note-1-att-for-sale-kumasi/friend_emails" class="new_friend_email" id="new_friend_email" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="V0IkNbC0qB5NFmX1crSwoRf/+dNqkkX3YqHxeaEt3u8=" /></div><div class='inner-box'>
                                                <h2>Email this ad to a friend</h2>
                                                <fieldset>
                                                    <div class='field'>
                                                        <label for="friend_email_name">Your name</label>
                                                        <div class='input'><input class="required" id="friend_email_name" name="friend_email[name]" size="30" type="text" /></div>
                                                    </div>
                                                    <div class='field'>
                                                        <label for="friend_email_from">Your email</label>
                                                        <div class='input'><input class="required email ascii" id="friend_email_from" name="friend_email[from]" size="30" type="text" /></div>
                                                    </div>
                                                    <div class='field'>
                                                        <label for="friend_email_to">Your friend&#x27;s email</label>
                                                        <div class='input'><input class="required email ascii" id="friend_email_to" name="friend_email[to]" size="30" type="text" /></div>
                                                    </div>
                                                    <div class='field'>
                                                        <label for="friend_email_body">Message</label>
                                                        <div class='input'><textarea cols="40" id="friend_email_body" name="friend_email[body]" rows="5">
                                                            </textarea></div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class='actions'>
                                                <button class='btn' type='submit'>
                                                    <span>
                                                        Send message
                                                    </span>
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>-->


 */
?>
                
                <?php /*
                <div class='col6' data-ui='modal' id='report-item-modal' style="display: none;">
                    <form accept-charset="UTF-8" action="" method="post">
                        <div style="margin:0;padding:0;display:inline">
                            <input name="utf8" type="hidden" value="&#x2713;" />
                            <input name="authenticity_token" type="hidden" value="V0IkNbC0qB5NFmX1crSwoRf/+dNqkkX3YqHxeaEt3u8=" />
                        </div>
                        <div class='inner-box'>
                            <h2>Is there something wrong with this ad?</h2>
                            <p>We're constantly working hard to assure that our ads meet high standards and we are very grateful for any kind of feedback from our users.</p>
                            <div class='field'>
                                <label for='report-reason'> Reason </label>
                                <div class='input'>
                                    <select class='required' id='report-reason' name='report_email[reason]'>
                                        <option value=''>-- Select a reason --</option>
                                        <option value='sold_unavailable'>Item sold/unavailable</option>
                                        <option value='fraud'>Fraud</option>
                                        <option value='duplicate'>Duplicate</option>
                                        <option value='spam'>Spam</option>
                                        <option value='wrong_category'>Wrong category</option>
                                        <option value='offensive'>Offensive</option>
                                        <option value='other'>Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class='field'>
                                <label for="report_email_email">Your Email</label>
                                <div class='input'><input class="required email" id="report_email_email" name="report_email" size="30" type="text" /></div>
                            </div>
                            <div class='field'>
                                <label for="report_email_message">Message</label>
                                <div class='input'><textarea class="required" cols="40" id="report_email_message" name="report_message" rows="8">
                                    </textarea></div>
                            </div>
                        </div>
                        <div class='actions'>
                            <button class='btn' type='submit'><span>Send report</span></button>
                        </div>
                    </form>

                </div>
                */
                ?>
                
                <div class='bottom-bar actions inner-box-compact'>
                    <div class='h-stack'></div>
                    <div class='polar h-stack'>
<!--                        <a href="#" id="report-item" class="btn report" data-ui-nav="modal"><span><i class='ico-report'></i>Report Ad</span></a>-->
                        <a href="<?php echo base_url('user/login');?>" class="btn edit"><span><i class='ico-edit'></i>Edit or delete ad</span></a>
                    </div>
                </div>

                
                
                <?php 
                /*
                <div class='ui-helper-hidden' id='contact-seller'>
                    <div class='clearfix'>
                        <div class='contact col7' id='contact-email'>
                            <div class='inner-box'>
                                <form accept-charset="UTF-8" action="/en/slightly-used-galaxy-note-1-att-for-sale-kumasi/email_seller" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="V0IkNbC0qB5NFmX1crSwoRf/+dNqkkX3YqHxeaEt3u8=" /></div><h2>Send de-young a message</h2>
                                    <div class='row'>
                                        <div class='col'>
                                            <div class='field name'>
                                                <label for="contact_seller_email_name">Your name</label>
                                                <div class='input'><input class="required" id="contact_seller_email_name" name="contact_seller_email[name]" size="30" type="text" /></div>
                                            </div>
                                            <div class='field email'>
                                                <label for="contact_seller_email_email">Your email</label>
                                                <div class='input'><input class="required email" id="contact_seller_email_email" name="contact_seller_email[email]" size="30" type="text" /></div>
                                            </div>
                                            <div class='field'>
                                                <label for="contact_seller_email_phone_no">Phone No (Optional)</label>
                                                <div class='input'><input class="phone ascii" id="contact_seller_email_phone_no" name="contact_seller_email[phone_no]" size="30" type="text" /></div>
                                            </div>
                                            <div class='field'>
                                                <label for="contact_seller_email_message">Message</label>
                                                <div class='input'><textarea class="required" cols="77" id="contact_seller_email_message" name="contact_seller_email[message]" rows="8">
                                                    </textarea></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class='contact col7' id='contact-phone-numbers'>
                            <div class='inner-box'>
                                <h2>Call de-young</h2>
                                <div class='number'>
                                    <i class='ico-phone'></i>
                                    0242759813
                                </div>
                            </div>
                        </div>
                        <div class='contact col7' id='contact-apply-via'>
                        </div>
                        <div class='col4' id='stay-safe'>
                            <div class='inner-box'>
                                <div class='inner-box-compact'>
                                    <h3>Stay Safe</h3>
                                    <h4>How to stay safe when you are trading at Website.com:</h4>
                                    <ul>
                                        <li>Keep things simple. Keep things local. Make sure you conclude your deals by meeting people face to face.</li>
                                        <li>Make sure you are completely satisfied with the item before any money exchanges hands.</li>
                                    </ul>
                                    <h4>How to spot potential frauds and scams:</h4>
                                    <ul>
                                        <li>A potential fraudster will often recommend a payment service that is unfamiliar or unorthodox.</li>
                                        <li>If an item seems too good to be true, it probably is. A fraudster will often appear to be selling an item that is usually expensive at a suspiciously low price. Be aware.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='bottom-bar actions inner-box-compact'>
                        <button class='btn contact'>
                            <span>
                                <i class='ico-mail'></i>
                                Send message
                            </span>
                        </button>
                    </div>
                </div>
                */ 
                ?>
            <?php } else { ?>
                <div class="inner-box">
                    <div class="item-box page_not_found">
                        <h1>Ad is not available</h1>
                        <p>Search for other ads in your area:</p>
                        <p></p>
                        <div class="simple-search-box">
                            <div class="green-container">
                                <?php echo form_open('en/search', array('name' => 'search-product', 'id' => 'simple-search', 'method' => 'get', 'onsubmit' => 'return validateForm()'));?>
                                    <div class="query">
                                        <input type="text" value="" placeholder="What are you looking for?" name="query" class="large">
                                    </div>
                                    <div class="submit">
                                        <button type="submit" class="btn large search-btn">
                                            <span><i class="ico-search-btn"></i></span>
                                        </button>
                                    </div>
                                <?php echo form_close();?>
                            </div>
                        </div>
                        <p></p>
                    </div>
                </div>
            <?php } ?>
            </div>

            <?php /*
            <div class='similar-items wrap'>
                <h2>You might also like...</h2>
                <div class='inner-box'>
                    <div class='gallery' data-ui-transition='slide 500' data-ui='gallery'>
                        <div class='stage'>
                            <div class='items'>
                                <div class='item h-stack'>
                                    <a href="/en/brand-new-samsung-galaxy-note-1-att-for-sale-kumasi-1"><div class='inner-content'>
                                            <img alt=" - " class="similar-ad" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/3b2c2ba2-18e0-4a06-b3ba-de4c06d3cc0f.jpg" src="images/blank-d6e4126f384afc5f296de87b704883cb.png" />
                                            <div class='title'>Brand new samsung galaxy note 1 (at&amp;t)</div>
                                            <div class='price'></div>
                                        </div>
                                    </a><a href="/en/slightly-used-galaxy-s2-att-for-sale-kumasi"><div class='inner-content'>
                                            <img alt=" - " class="similar-ad" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/3316c65b-2689-4512-8e9f-15a406fadd8f.jpg" src="images/blank-d6e4126f384afc5f296de87b704883cb.png" />
                                            <div class='title'>slightly used  galaxy s2 at&amp;t</div>
                                            <div class='price'></div>
                                        </div>
                                    </a><a href="/en/samsung-galaxy-note-tmobile-sgh-t879-for-sale-kumasi"><div class='inner-content'>
                                            <img alt=" - " class="similar-ad" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/bd170e55-8693-4886-a6f4-71b4283efa82.jpg" src="images/blank-d6e4126f384afc5f296de87b704883cb.png" />
                                            <div class='title'>Samsung Galaxy Note AT&amp;T SGH i717</div>
                                            <div class='price'></div>
                                        </div>
                                    </a><a href="/en/slightly-used-samsung-galaxy-s2-for-sale-kumasi-3"><div class='inner-content'>
                                            <img alt=" - " class="similar-ad" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/0bb5e504-8b96-4daf-9464-b6d502c91f9f.jpg" src="images/blank-d6e4126f384afc5f296de87b704883cb.png" />
                                            <div class='title'>Slightly used Samsung galaxy s2</div>
                                            <div class='price'></div>
                                        </div>
                                    </a><a href="/en/samsung-galaxy-note-1-for-sale-kumasi-116"><div class='inner-content'>
                                            <img alt=" - " class="similar-ad" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/0932f2d9-6617-48c2-b83d-cd6bde178606.jpg" src="images/blank-d6e4126f384afc5f296de87b704883cb.png" />
                                            <div class='title'>Samsung galaxy note 1</div>
                                            <div class='price'></div>
                                        </div>
                                    </a>
                                </div>
                                <div class='item h-stack'>
                                    <a href="/en/samsung-galaxy-note-1-for-sale-kumasi-83"><div class='inner-content'>
                                            <img alt=" - " class="similar-ad" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/f96a8876-89e2-11e3-b24f-22000a270a3d.jpg" src="images/blank-d6e4126f384afc5f296de87b704883cb.png" />
                                            <div class='title'>Samsung galaxy note 1</div>
                                            <div class='price'></div>
                                        </div>
                                    </a><a href="/en/galaxy-note-1-for-sale-kumasi-12"><div class='inner-content'>
                                            <img alt=" - " class="similar-ad" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/42541b98-8771-11e3-b58b-12313b0619d6.jpg" src="images/blank-d6e4126f384afc5f296de87b704883cb.png" />
                                            <div class='title'>samsung galaxy note 1</div>
                                            <div class='price'></div>
                                        </div>
                                    </a><a href="/en/galaxy-note-1-for-sale-kumasi-17"><div class='inner-content'>
                                            <img alt=" - " class="similar-ad" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/eae5b9ea-1c75-4bec-a426-8c630cca938d.jpg" src="images/blank-d6e4126f384afc5f296de87b704883cb.png" />
                                            <div class='title'>galaxy note 1</div>
                                            <div class='price'></div>
                                        </div>
                                    </a><a href="/en/samsung-galaxy-note-1-for-sale-kumasi-92"><div class='inner-content'>
                                            <img alt=" - " class="similar-ad" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/75017d63-d123-4ae1-a0b0-76ad78b46c18.jpg" src="images/blank-d6e4126f384afc5f296de87b704883cb.png" />
                                            <div class='title'>samsung galaxy note 1</div>
                                            <div class='price'></div>
                                        </div>
                                    </a><a href="/en/sumsung-t-mobile-s1-for-sale-kumasi"><div class='inner-content'>
                                            <img alt=" - " class="similar-ad" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/37b410ce-89a3-11e3-9a19-22000a270a3d.jpg" src="images/blank-d6e4126f384afc5f296de87b704883cb.png" />
                                            <div class='title'>Fresh not in box Samsung at&amp;t galaxy s1</div>
                                            <div class='price'></div>
                                        </div>
                                    </a>
                                </div>
                                <div class='item h-stack'>
                                    <a href="/en/tmobile-att-for-sale-kumasi"><div class='inner-content'>
                                            <img alt=" - " class="similar-ad" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/402f9846-876d-11e3-a40f-123143013573.jpg" src="images/blank-d6e4126f384afc5f296de87b704883cb.png" />
                                            <div class='title'>T-mobile at&amp;t</div>
                                            <div class='price'></div>
                                        </div>
                                    </a><a href="/en/samsung-galaxy-s2-att-for-sale-kumasi-29"><div class='inner-content'>
                                            <img alt=" - " class="similar-ad" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/79664d43-156c-42d5-bb70-f7e596940faa.jpg" src="images/blank-d6e4126f384afc5f296de87b704883cb.png" />
                                            <div class='title'>SAMSUNG GALAXY S2. (AT&amp;T)</div>
                                            <div class='price'></div>
                                        </div>
                                    </a><a href="/en/att-galaxy-infuse-4g-for-sale-kumasi"><div class='inner-content'>
                                            <img alt=" - " class="similar-ad" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/2512d903-a74b-45ef-9095-2ccd9e28c647.jpg" src="images/blank-d6e4126f384afc5f296de87b704883cb.png" />
                                            <div class='title'>At&amp;t galaxy infuse 4G</div>
                                            <div class='price'></div>
                                        </div>
                                    </a><a href="/en/slightly-used-samsung-galaxy-s3-for-sale-kumasi-6"><div class='inner-content'>
                                            <img alt=" - " class="similar-ad" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/79216e5c-8e68-11e3-bfc1-123142007d7d.jpg" src="images/blank-d6e4126f384afc5f296de87b704883cb.png" />
                                            <div class='title'>slightly used samsung galaxy s3</div>
                                            <div class='price'></div>
                                        </div>
                                    </a><a href="/en/slightly-used-samsung-galaxy-ace-for-sale-kumasi-1"><div class='inner-content'>
                                            <img alt=" - " class="similar-ad" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/14f5ee6e-8a65-11e3-9e86-123143013573.jpg" src="images/blank-d6e4126f384afc5f296de87b704883cb.png" />
                                            <div class='title'>slightly used samsung galaxy ace</div>
                                            <div class='price'></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class='dots'>
                            <a data-ui-nav='1' href='#'></a>
                            <a data-ui-nav='2' href='#'></a>
                            <a data-ui-nav='3' href='#'></a>
                        </div>
                        <div class='small-arrows'>
                            <a class='arrow' data-ui-nav='prev' href='#'>Prev</a>
                            <a class='arrow' data-ui-nav='next' href='#'>Next</a>
                        </div>
                    </div>
                    <a href="/en/mobile-phones-in-kumasi" class="polar view-more-similar-items">More ads</a>
                </div>
            </div>
            */ ?>

<!--            <div data-ui='modal' id='favorite-login'>
                  <div class='inner-box'>
                      Please log in or sign up for an account to save Favorites.
                  </div>
                  <div class='actions'>
                      <a href="/en/users/log_in" class="btn"><span>Log in</span>
                      </a><a href="/en/users/sign_up" class="btn"><span>Sign up</span>
                     </a></div>
            </div>-->


            <div class='wrap'>
                <div class='item-box'>
                    <h2>Do you have something to sell?</h2>
                    <p>Post your ad for free on Website.com</p>
                    <div class='btn-wrapper'>
                        <div class='bg left'></div>
                        <div class='bg right'></div>
                        <div class='btn-border'>
                            <a href="<?php echo base_url();?>en/post_ad" class="btn large post"><span class="large">Post your free ad</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php $this->load->view('common/footer'); ?>
