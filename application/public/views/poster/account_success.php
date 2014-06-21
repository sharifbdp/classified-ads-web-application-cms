<?php $this->load->view('common/header'); ?>

    <body class='users users users-account'>

        <?php $this->load->view('common/top_menu'); ?>

        <div id='site-content'>
            <?php if ($this->session->flashdata('sign_success')) { ?>
                <div class='alert wrap'>
                    <div class='box success'>
                        <a class='polar close' href='#'>×</a><p><?php echo $this->session->flashdata('sign_success'); ?></p>
                    </div>
                </div>
                <?php
            }
            if ($this->session->flashdata('sign_error')) {
                ?>
                <div class='alert wrap'>
                    <div class='box error'>
                        <a class='polar close' href='#'>×</a><p><?php echo $this->session->flashdata('sign_error'); ?></p>
                    </div>
                </div>
            <?php } ?>

            <div class='wrap'>
                <div class='inner-box'>
                    <h2 class='published-ads'>Published ads</h2>
                    <ul class='items flat clearfix'>

                        <?php if(!empty($my_ad_list)){
                                foreach ($my_ad_list as $list){
                            ?>
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
                                    <div class='published'><?php echo $this->Fronts->time_ago(strtotime($list['entry_date'])); ?></div>
                                </div>
                                <div class='item-actions'>
                                    <div class='links'>
                                        <a class='btn small edit' href='<?php echo base_url("en/edit_ad/{$list['id']}/{$list['slug']}");?>'>
                                            <span><i class='ico-user-edit'></i>Edit</span>
                                        </a>
                                        <a class='btn small delete' href='#'>
                                            <span><i class='ico-user-delete'></i>Delete</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php } }else{ ?>
                            <h4 style="text-align: center;">No Ad found. Go <a href="<?php echo base_url('en/post_ad');?>">here</a> to post ad.</h4>
                        <?php } ?>
                    </ul>

                    <div class='hide' id='no-ads'>
                        <div class='wrap'>
                            <div class='item-box'>
                                <h2>Looks like you don't have any ads yet</h2>
                                <p>What are you waiting for? Posting ads is free</p>
                                <div class='btn-wrap'>
                                    <a href="<?php echo base_url('en/post_ad');?>" class="btn large post"><span class="large">Post an ad now</span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

<?php $this->load->view('common/footer'); ?>