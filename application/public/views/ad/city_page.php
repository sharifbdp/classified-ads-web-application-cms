<?php $this->load->view('common/header'); ?>

    <body class='ads ads ads-index'>

        <?php $this->load->view('common/top_menu'); ?>

        <div id='site-content'>

            <div class='wrap'>
                <?php echo form_open('en/search', array('name' => 'search-product', 'id' => 'item-search', 'method' => 'get', 'onsubmit' => 'return validateForm()'));?>
                    <div class='h-stack fields clearfix'>
                        <div class='query'>
                            <input id='item-search-field' name='query' placeholder='What are you looking for?' type='text'>
                        </div>
                        <div class='category'>
                            <select id='ad_category_select' name='category'>
                                <option value="" selected="selected">All Categories</option>
                                <?php
                                $all_category = $this->Fronts->get_all_parent_category();
                                if(!empty($all_category)){
                                    foreach ($all_category as $cate){
                                        echo "<option value='{$cate['alias']}'>{$cate['name']}</option>";
                                    }
                                }
                                ?>
                                <option value="999">Other</option>
                            </select>
                        </div>
                        <div class='location'>
                            <select name='location'>
                                <option value=''>All of Ghana</option>
                                <?php
                                $all_location_data = $this->Fronts->get_all_location_data();
                                if(!empty($all_location_data)){
                                    foreach ($all_location_data as $data){
                                        echo "<option value='{$data['name']}'>{$data['name']}</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class='submit'>
                            <button class='btn large search-btn' type='submit'>
                                <span><i class='ico-search-btn'></i></span>
                            </button>
                        </div>
                    </div>
                <?php echo form_close();?>

                <div id='leaderboard'><div style='width:728px; height:90px;'><img src="http://pagead2.googlesyndication.com/simgad/14559388252663711552" /></div></div>
                <div class='row' id='serp'>
                    <div class='col3' id='serp-nav'>
                        <div class='inner-box-compact clearfix'>
                            <div class='categories'>
                                <ul class='flat tree'>
                                    <li class='indent-0'>
                                        <div class='current'>All Categories</div>
                                        <ul class='flat tree links'>
                                            <?php
                                            $all_parent_cate = $this->Fronts->get_all_parent_category();
                                            if ($all_parent_cate) {
                                                foreach ($all_parent_cate as $cate) {
                                                    $cate_ad = $this->Fronts->get_category_by_id($cate['id']);
                                                    if($cate_ad->parent_id != 0){
                                                    $cate_ad = $this->Fronts->get_category_by_id($cate['id']);
                                                    }
                                                    $count_cate_1_ad = $this->Fronts->count_ads_by_category_id($cate['id']);
                                                    ?>
                                                    <li><a href="<?php echo base_url('en/category/' . $cate['alias']);?>"><span class='title'><?php echo $cate['name']; ?></span><span class='count'>&nbsp;<?php echo $count_cate_1_ad;?></span></a></li>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <?php
                            $loc_alias = $this->uri->segment(3);
                            $city_alias = $this->uri->segment(4);

                            //$last_seg = end($this->uri->segments);
                            $location_details = $this->Fronts->get_location_details_by_alias($loc_alias);
                            $city_details = $this->Fronts->get_city_area_details_by_alias($city_alias);

                            $ad_location_id = (!empty($location_details)) ? $location_details->id : NULL;
                            $ad_city_id = (!empty($city_details)) ? $city_details->id : NULL;

                            $has_city = $this->Fronts->check_has_child_city_by_alias($loc_alias);
                            //var_dump($has_city);
                            ?>



                            <div class='ad-types'>
                                <ul class='flat tree'>
                                    <li class='indent-0'>
                                        <?php if ($has_city == FALSE || !empty($city_alias)) {
                                            $for_what = $this->input->get('for');
                                            $sale_active = ($for_what == 'sale' || $for_what == '')? 'active' : '';
                                            $wanted_active = ($for_what == 'wanted')? 'active' : '';
                                            ?>
                                            <ul class='flat tree links'>
                                                <li class='<?php echo $sale_active;?>'><a id="for-sale" href="<?php echo base_url() . $this->uri->uri_string();?>?for=sale">For sale</a></li>
                                                <li class='<?php echo $wanted_active;?>'><a id="for-wanted" href="<?php echo base_url() . $this->uri->uri_string();?>?for=wanted">Wanted</a></li>
                                            </ul>
                                        <?php } ?>
                                    </li>
                                </ul>
                            </div>

                            <div class='locations'>
                                <ul class='flat tree'>
                                    <li class='indent-0'>
                                        <a href="<?php echo base_url(); ?>en/all_ads">‹ All of Ghana</a>
                                    </li>

                                    <li class='indent-1'>
                                        <?php if (empty($city_details)) { ?>
                                            <div class='current'>
                                                <?php echo (!empty($location_details)) ? $location_details->name : 'No city found'; ?>
                                            </div>
                                            <ul class='flat tree links'>
                                                <?php
                                                if (!empty($has_city)) {
                                                    foreach ($has_city as $child) {
                                                        $count_cid_ad = $this->Fronts->count_ads_by_city_id($child['id']);
                                                        ?>
                                                        <li><a href="<?php echo base_url('en/city/' . $location_details->alias . '/' . $child['alias']); ?>"><span class='title'><?php echo $child['name']; ?></span><span class='count'>&nbsp;<?php echo $count_cid_ad; ?></span></a></li>
                                                    <?php }
                                                }
                                                ?>
                                            </ul>
                                            <?php
                                        } else {
                                            echo '<a href="' . base_url('en/city/' . $location_details->alias) . '">‹ ' . $location_details->name . '</a>';
                                        }
                                        ?>
                                    </li>

                                    <?php if (!empty($city_details)) { ?>
                                        <li class='indent-2'>
                                            <div class='current'><?php echo $city_details->name; ?></div>
                                        </li>
                                    <?php } ?>
                                </ul>

                            </div>

                            <?php if ($has_city == FALSE || !empty($city_alias)) { ?>
                            <div id="serp-filter">
                                <div class="filters">

                                    <div class="filter">
                                        <ul class="flat tree">
                                            <li class="indent-0">
                                                <div data-filter-type="price" class="current">Price</div>
                                                <div class="content clearfix">
                                                    <?php
                                                    echo form_open('', array('id' => 'price-search', 'method' => 'get'));
                                                    $min_price = $this->input->get('min-price', TRUE);
                                                    $max_price = $this->input->get('max-price', TRUE);
                                                    ?>
                                                    <div class="filter price"><span class="currency">$</span>
                                                        <input class="min" name="min-price" value="<?php echo ($min_price != NULL) ? $this->input->get('min-price') : '' ;?>"> - <input class="max" name="max-price" value="<?php echo ($max_price != NULL) ? $this->input->get('max-price') : '' ;?>">
                                                        <button type="submit">Go</button>
                                                    </div>
                                                    <?php echo form_close();?>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                            </div>
                            <?php } ?>
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
                                            <span class='ad-count'><?php echo (!empty($location_details)) ? $this->Fronts->count_ads_by_type_and_location_city_id(NULL, $ad_location_id, $ad_city_id) : '0';?></span>
                                        </a></div>
                                    <div id="private-ads" class='tab'>
                                        <a href="#">Private ads
                                            <span class='ad-count'><?php echo (!empty($location_details)) ? $this->Fronts->count_ads_by_type_and_location_city_id(1, $ad_location_id, $ad_city_id) : '0';?></span>
                                        </a></div>
                                    <div id="business-ads" class='tab'>
                                        <a href="#">Business ads
                                            <span class='ad-count'><?php echo (!empty($location_details)) ? $this->Fronts->count_ads_by_type_and_location_city_id(2,  $ad_location_id, $ad_city_id) : '0';?></span>
                                        </a>
                                    </div>
                                </div>
                                <div class='h-stack polar' id='sort-mode-nav'>
                                    <div class='sort-wrap'>
                                        <a class='current-sort' href='#'><span>Most Recent</span><i class='arrow'></i></a>
                                        <div class='sort-options' style="">
                                            <a id="most-recent" rel="<?php echo base_url('en/load_ads/all/recent/' . $loc_alias . "/" . $city_alias);?>" href='#'>Most Recent</a>
                                            <a id="low-price" rel="<?php echo base_url('en/load_ads/all/price/' . $loc_alias . "/" . $city_alias);?>" href='#'>Lowest Price</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id='item-listing'>
                            <div class='top clearfix'>

                                <ol class="breadcrumbs clearfix h-stack flat">
                                    <li><a rel="up up" href="http://localhost/bikroy/en/all_ads">All ads</a><span>→</span></li>
                                    <?php if(!empty($city_details)){ ?>
                                    <li><a rel="up up" href=""><?php echo $location_details->name?></a><span>→</span></li>
                                    <li><a rel="current" class="current" href=""><?php echo $city_details->name?></a> in Ghana</li>
                                    <?php }else{ ?>
                                    <li><a rel="current" class="current" href=""><?php echo (!empty($location_details)) ? $location_details->name : 'No city found'?></a> in Ghana</li>
                                    <?php } ?>

                                </ol>

                                <div class='h-stack polar' id='list-mode-nav'>
                                    <a class='regular current' href='#'>Regular</a>
                                    <a class='compact' href='#'>Compact</a>
                                </div>
                            </div>

                            <?php if(empty($content)){ ?>
                                <h1 style="text-align: center; margin: 15px 0px;">Sorry, No advertisement found.</h1>
                            <?php } ?>

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