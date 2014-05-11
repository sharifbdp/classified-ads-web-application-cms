<?php $this->load->view('common/header'); ?>

    <body class='ads ads ads-index'>

        <?php $this->load->view('common/top_menu'); ?>

        <div id='site-content'>

            <div class='wrap'>
                <form action='/en/ads-in-ghana' id='item-search' method='get'>
                    <div class='h-stack fields clearfix'>
                        <div class='query'>
                            <input id='item-search-field' name='query' placeholder='What are you looking for?' type='text'>
                        </div>
                        <div class='category'>
                            <select id='ad_category_select' name='category'><option value="">All Categories</option>
                                <option value="604">Cars &amp; Vehicles</option>
                                <option value="623">Property</option>
                                <option value="644" selected="selected">Electronics</option>
                                <option value="660">Home Appliances</option>
                                <option value="689">Personal Items</option>
                                <option value="714">Leisure, Sport &amp; Hobby</option>
                                <option value="748">Jobs &amp; Services</option>
                                <option value="793">Food &amp; Agriculture</option>
                                <option value="801">Pets &amp; Animals</option>
                                <option value="819">Education &amp; Teaching</option>
                                <option value="831">Other</option></select>
                        </div>
                        <div class='location'>
                            <select name='location'>
                                <option value=''>All of Ghana</option>
                                <optgroup label='Cities'>
                                    <option value='3811'>Accra</option>
                                    <option value='3899'>Kumasi</option>
                                    <option value='3948'>Sekondi Takoradi</option>
                                </optgroup>
                                <optgroup label='Regions'>
                                    <option value='3586'>Ashanti</option>
                                    <option value='3617'>Greater Accra</option>
                                    <option value='3634'>Eastern</option>
                                    <option value='3661'>Western</option>
                                    <option value='3684'>Northern</option>
                                    <option value='3711'>Brong-Ahafo</option>
                                    <option value='3739'>Volta</option>
                                    <option value='3765'>Central</option>
                                    <option value='3786'>Upper East</option>
                                    <option value='3800'>Upper West</option>
                                </optgroup>
                            </select>

                        </div>
                        <div class='submit'>
                            <button class='btn large search-btn' type='submit'>
                                <span>
                                    <i class='ico-search-btn'></i>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
                <div id='leaderboard'><div style='width:728px; height:90px;'><img src="http://pagead2.googlesyndication.com/simgad/14559388252663711552" /></div></div>
                <div class='row' id='serp'>
                    <div class='col3' id='serp-nav'>
                        <div class='inner-box-compact clearfix'>
                            <div class='categories'>
                                <ul class='flat tree'>
                                    <li class='indent-0'>
                                        <a href="<?php echo base_url();?>en/all_ads">‹ All Categories</a>
                                    </li>
                                    <li class='indent-1'>
                                        <div class='current'>
                                            <?php echo (!empty($cate_details)) ? $cate_details->name : 'No Category'; ?>
                                        </div>
                                        <?php if (!empty($cate_details)) { ?>
                                            <ul class='flat tree links'>
                                                <?php
                                                $all_child_cate = $this->Fronts->get_all_parent_category($cate_details->id);
                                                foreach ($all_child_cate as $child) {
                                                    ?>
                                                    <li><a href="<?php echo base_url('en/category/' . $child['alias']); ?>"><span class='title'><?php echo $child['name']; ?></span><span class='count'>&nbsp;0</span></a></li>
                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    </li>
                                </ul>

                            </div>
                            <div class='ad-types'>
                                <ul class='flat tree'>
                                    <li class='indent-0'>
                                    </li>
                                </ul>
                            </div>
                            <div class='locations'>
                                <ul class='flat tree'>
                                    <li class='indent-0'>
                                        <div class='current'>
                                            All of Ghana
                                        </div>
                                        <ul class='flat tree links'>
                                            <li>
                                                <a href="/en/electronics-in-accra"><span class='title'>Accra</span><span class='count'>&nbsp;29020</span></a></li>
                                            <li>
                                                <a href="/en/electronics-in-kumasi"><span class='title'>Kumasi</span><span class='count'>&nbsp;6584</span></a></li>
                                            <li>
                                                <a href="/en/electronics-in-greater-accra"><span class='title'>Greater Accra</span><span class='count'>&nbsp;2710</span></a></li>
                                            <li>
                                                <a href="/en/electronics-in-sekondi-takoradi"><span class='title'>Sekondi Takoradi</span><span class='count'>&nbsp;1976</span></a></li>
                                            <li>
                                                <a href="/en/electronics-in-central"><span class='title'>Central</span><span class='count'>&nbsp;1248</span></a></li>
                                            <li>
                                                <a href="/en/electronics-in-eastern"><span class='title'>Eastern</span><span class='count'>&nbsp;866</span></a></li>
                                            <li class='hidden'>
                                                <a href="/en/electronics-in-ashanti"><span class='title'>Ashanti</span><span class='count'>&nbsp;353</span></a></li>
                                            <li class='hidden'>
                                                <a href="/en/electronics-in-brong-ahafo"><span class='title'>Brong-Ahafo</span><span class='count'>&nbsp;298</span></a></li>
                                            <li class='hidden'>
                                                <a href="/en/electronics-in-northern"><span class='title'>Northern</span><span class='count'>&nbsp;135</span></a></li>
                                            <li class='hidden'>
                                                <a href="/en/electronics-in-upper-east"><span class='title'>Upper East</span><span class='count'>&nbsp;57</span></a></li>
                                            <li class='hidden'>
                                                <a href="/en/electronics-in-upper-west"><span class='title'>Upper West</span><span class='count'>&nbsp;85</span></a></li>
                                            <li class='hidden'>
                                                <a href="/en/electronics-in-volta"><span class='title'>Volta</span><span class='count'>&nbsp;223</span></a></li>
                                            <li class='hidden'>
                                                <a href="/en/electronics-in-western"><span class='title'>Western</span><span class='count'>&nbsp;288</span></a></li>
                                        </ul>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <div id='skyscraper'>
                            <div style='width:160px; height:600px;'></div>
                        </div>
                    </div>
                    
                    <div class='col9' id='serp-content'>
                        <div id='item-nav-bar'>
                            <div class='tabs'>
                                <div class='h-stack' id='scopes'>
                                    <div id="all-ads" class='tab current'>
                                        <a href="#">All ads
                                            <span class='ad-count'><?php echo $this->Fronts->count_ads_by_type();?></span>
                                        </a></div>
                                    <div id="private-ads" class='tab'>
                                        <a href="#">Private ads
                                            <span class='ad-count'><?php echo $this->Fronts->count_ads_by_type(1);?></span>
                                        </a></div>
                                    <div id="business-ads" class='tab'>
                                        <a href="#">Business ads
                                            <span class='ad-count'><?php echo $this->Fronts->count_ads_by_type(2);?></span>
                                        </a>
                                    </div>
                                </div>
                                <div class='h-stack polar' id='sort-mode-nav'>
                                    <div class='sort-wrap'>
                                        <a class='current-sort' href='#'><span>Most Recent</span><i class='arrow'></i></a>
                                        <div class='sort-options' style="">
                                            <a id="most-recent" rel="<?php echo base_url();?>en/load_ads/all" href='#'>Most Recent</a>
                                            <a id="low-price" rel="<?php echo base_url();?>en/load_ads/all" href='#'>Lowest Price</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id='item-listing'>
                            <div class='top clearfix'>
                                <ol class='breadcrumbs clearfix h-stack flat'>
                                    <li><a href="<?php echo base_url();?>en/all_ads" rel="up">All ads</a><span>&rarr;</span></li>
                                    <li>
                                        <h1>
                                            <a href="<?php echo base_url();?>en/all_ads" class="current" rel="current">Electronics</a> in Ghana
                                        </h1>
                                    </li>
                                </ol>
                                <div class='h-stack polar' id='list-mode-nav'>
                                    <a class='regular current' href='#'>Regular</a>
                                    <a class='compact' href='#'>Compact</a>
                                </div>
                            </div>
                            
                            <ul class='flat regular' id='item-rows'>
                                <?php
                                if (!empty($content)) {
                                    foreach ($content as $list) {
                                        ?>
                                        <li class='item'>
                                            <div class="h-stack">
                                                <?php $all_images = $this->Fronts->get_all_ad_image_by_ad_id($list['id']); ?>
                                                <div class="photo <?php echo (count($all_images) > 1) ? 'plural' : ''; ?>">
                                                    <div class="stack">
                                                        <?php
                                                        if ($all_images) {
                                                            $sl = 1;
                                                            foreach ($all_images as $img) {
                                                                if ($sl == 1) {
                                                                    ?>
                                                                    <img src="<?php echo base_url(); ?>uploads/ad_image/<?php echo $img['image_name']; ?>" alt="<?php echo $list['title']; ?>">
                                                                    <?php
                                                                } $sl++;
                                                            }
                                                        } else {
                                                            ?>
                                                            <img src="<?php echo base_url(); ?>images/no-image.png" alt="<?php echo $list['title']; ?>">
                                                        <?php } ?>
                                                    </div>
                                                </div>

                                                <div class="title-and-price clearfix">
                                                    <div class="title-container"><div class="title"><h2><a href="<?php echo base_url(); ?>en/view/<?php echo $list['slug']; ?>" title="<?php echo $list['title']; ?>"><?php echo $list['title']; ?></a></h2></div></div>
                                                    <div class="price-container"><div class="price"><span class="data"><?php echo ($list['negotiable'] == 1) ? 'Negotiable' : '$ '.round($list['price']); ?></span></div></div>
                                                </div>
                                                <div class="meta-container">
                                                    <div class="meta">
                                                        <span class="information-row properties"></span>
                                                        <span class="information-row">
                                                            <?php echo ($list['type'] == 2) ? '<i class="business-icon" title="Business">Business</i>' : ''; ?>
                                                            <span class="date"><?php echo $this->Fronts->time_ago(strtotime($list['entry_date'])); ?></span>,
                                                            <span class="category"><?php echo $list['cat_name']; ?></span>,
                                                            <span class="location"><?php echo $list['location']; ?></span>
                                                        </span>
                                                    </div>
                                                    <div class="extras"><a class="btn small favorite" href="#"><span><i class="ico-star"></i>Favorite</span></a></div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php
                                    }
                                }
                                ?>
                            </ul>

                            <ul id="item-rows" class="flat compact" style="display: none;">
                                <?php
                                if (!empty($content)) {
                                    foreach ($content as $list) {
                                        $all_images = $this->Fronts->get_all_ad_image_by_ad_id($list['id']);
                                        ?>
                                        <li class="item">
                                            <div class="h-stack">
                                                <div class="photo"><span class="icon <?php echo (count($all_images) > 1) ? 'plural' : ''; ?>"></span></div>
                                                <div class="title">
                                                    <h2>
                                                        <a href="<?php echo base_url(); ?>en/view/<?php echo $list['slug']; ?>">
                                                            <?php echo ($list['type'] == 2) ? '<i class="business-icon" title="Business">Business</i>' : ''; ?>
                                                            <?php echo $list['title']; ?>
                                                        </a>
                                                    </h2>
                                                </div>
                                                <div class="meta"><?php echo $list['location']; ?>, <span class="date"><?php echo $this->Fronts->time_ago(strtotime($list['entry_date'])); ?></span></div>
                                                <div class="polar h-stack">
                                                    <div class="attr"><?php echo ($list['negotiable'] == 1) ? '' : '$ ' . round($list['price']); ?></div>
                                                    <div class="fav-row"><a href="#" class="btn small favorite"><span><i class="ico-star"></i></span></a></div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php }
                                }
                                ?>
                            </ul>
                            
                        </div>
                        
                        <div class='pagination'></div>

                        <div id='server-side-pagination'>
                            
                        </div>
                    </div>
                </div>
            </div>

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