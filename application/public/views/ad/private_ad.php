                            <div class="spinner"></div>
                            <div class='top clearfix'>
                                
                                <ol class='breadcrumbs clearfix h-stack flat'>
                                    <li><a href="<?php echo base_url(); ?>en/all_ads" rel="up up">All ads</a><span>&rarr;</span></li>
                                    <?php
                                    if (!empty($cate_1_details) && empty($cate_2_details)) {
                                        ?>
                                        <li><a href="#" class="current" rel="current"><?php echo $cate_1_details->name; ?></a> in <?php echo "Ghana"; ?></li>
                                        <?php
                                    } else {
                                        // just for home page
                                        if(!empty($cate_1_details)){
                                            echo "<li><a href='#' rel='up'>{$cate_1_details->name}</a><span>&rarr;</span></li>";
                                        }else{
                                            echo "in Ghana";
                                        }
                                    }

                                    if (!empty($cate_2_details) && empty($cate_3_details)) {
                                        ?>
                                        <li><a href="#" class="current" rel="current"><?php echo $cate_2_details->name; ?></a> in <?php echo "Ghana"; ?></li>
                                        <?php
                                    }

                                    if (!empty($cate_2_details) && !empty($cate_3_details)) {
                                        ?>
                                        <li><a href="#" rel="up"><?php echo $cate_2_details->name; ?></a><span>&rarr;</span></li>
                                        <?php
                                    }
                                    if (!empty($cate_3_details)) {
                                        ?>
                                        <li><a href="#" class="current" rel="current"><?php echo $cate_3_details->name; ?></a> in <?php echo "Ghana"; ?></li>
                                    <?php } ?>
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
                                                <div class="photo <?php echo (count($all_images) > 0) ? 'plural' : ''; ?>">
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
                                                    <div class="price-container"><div class="price"><span class="data"><?php echo ($list['negotiable'] == 1) ? 'Negotiable' : round($list['price']); ?></span></div></div>
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
                                                <div class="photo"><span class="icon <?php echo (count($all_images) > 0) ? 'plural' : ''; ?>"></span></div>
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

                            <script type="text/javascript">
                            $(document).ready(function() {
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
                            });
                            </script>
