<?php $this->load->view('common/header'); ?>

    <body class='users users users-account'>
       
        <?php $this->load->view('common/top_menu'); ?>

        <div id='site-content'>


            <div class='wrap'>
                <div class='inner-box'>
                    
                    <?php if(!empty($my_fav_list)){
                            foreach ($my_fav_list as $list){
                            ?>
                    <h2>Your favorite ads list</h2>
                    
                    <ul class='items flat clearfix'>
                        <li>
                            <div class='item h-stack'>
                                <?php $all_images = $this->Fronts->get_all_ad_image_by_ad_id($list['id']); ?>
                                <div class='photo'>
                                    <a href="<?php echo base_url('en/view/' . $list['slug'])?>">
                                        <?php
                                        if ($all_images) {
                                            $sl = 1;
                                            foreach ($all_images as $img) {
                                                if ($sl == 1) {
                                                    ?>
                                                    <img src="<?php echo base_url(); ?>uploads/ad_image/thumbs/<?php echo $img['image_name']; ?>" alt="<?php echo $list['title']; ?>">
                                                    <?php
                                                } $sl++;
                                            }
                                        } else {
                                            ?>
                                            <img src="<?php echo base_url(); ?>images/no-image.png" alt="<?php echo $list['title']; ?>">
                                        <?php } ?>
                                    </a>
                                </div>
                                <div class='title'>
                                    <h3><a href="<?php echo base_url('en/view/' . $list['slug'])?>"><?php echo $list['title']; ?></a></h3>
                                    <div class='published'>Posted - <?php echo $this->Fronts->time_ago(strtotime($list['entry_date'])); ?></div>
                                </div>
                                <div class='item-actions'>
                                    <div class='links'>
                                        <a class='btn small delete' href='#' id="remove_favorites" data-slug="<?php echo $list['slug'];?>">
                                            <span><i class='ico-user-delete'></i>Remove</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    
                    <?php } }else{ ?>
                    <h2>You don't have any favorite  ads, yet.</h2>
                        <p>Click on the star <i class='star'>x</i> symbol on any ad to save it as a favorite. </p>
                    <?php } ?>
                    
                </div>
            </div>
            
            <div class='wrap'>
                <div class='item-box'>
                    <h2>Looking for something on Website.com?</h2>
                    <p>You can start here.</p>
                    <div class='btn-wrapper'>
                        <div class='bg left'></div>
                        <div class='bg right'></div>
                        <div class='btn-border'>
                            <a href="<?php echo base_url();?>en/all_ads" class="btn large"><span class="large">Browse all ads</span></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

<?php $this->load->view('common/footer'); ?>