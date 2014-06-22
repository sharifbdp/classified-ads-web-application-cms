        <div id='site-floor'>
            <div class='wrap'>
                <div class='row'>
                    <div class='col5'>
                        <div class='no-like clearfix' id='facebook'>
                            <div class='fb-icon'></div>
                            <div class='link'><a href="#" target="_blank">Find us on Facebook</a></div>
                        </div>
                        <div class='separator'></div>
                        <div class='muted'>Copyright &copy; Redress Infotech Ltd.</div>
                    </div>
                    
                    <div class='col7'>
                        <div id='floor-nav'>
                            <div class='quarter'>
                                <ul>
                                    <lh><span class='heading muted'>How To Sell Fast</span></lh>
                                    <?php
                                    $first_set_menu = $this->Fronts->getAllMenu(2, 0);
                                    if (!empty($first_set_menu)) {
                                        foreach ($first_set_menu as $first) {
                                            ?>
                                            <li><a href="<?php echo base_url(); ?>en/details/<?php echo $first['m_alias']; ?>"><?php echo $first['name']; ?></a></li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class='quarter'>
                                <ul>
                                    <lh><span class='heading muted'>Company</span></lh>
                                    <?php
                                    $second_set_menu = $this->Fronts->getAllMenu(3, 2);
                                    if (!empty($second_set_menu)) {
                                        foreach ($second_set_menu as $second) {
                                            ?>
                                            <li><a href="<?php echo base_url(); ?>en/details/<?php echo $second['m_alias']; ?>"><?php echo $second['name']; ?></a></li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class='quarter'>
                                <ul>
                                    <lh><span class='heading muted'>Help &amp; support</span></lh>
                                    <?php
                                    $third_set_menu = $this->Fronts->getAllMenu(3, 5);
                                    if (!empty($third_set_menu)) {
                                        foreach ($third_set_menu as $third) {
                                            ?>
                                            <li><a href="<?php echo base_url(); ?>en/details/<?php echo $third['m_alias']; ?>"><?php echo $third['name']; ?></a></li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class='quarter'>
                                <?php
                                    $social_fblink = $this->Fronts->getAllSocialLinks(1);
                                    $social_twlink = $this->Fronts->getAllSocialLinks(2);
                                    $social_ytlink = $this->Fronts->getAllSocialLinks(3);
                                    
                                    $fblink = "https://www.facebook.com/";
                                    $ytlink = "http://www.youtube.com/";
                                    $twlink = "https://www.twitter.com/";
                                ?>
                                <ul>
                                    <lh><span class='heading muted'>Social</span></lh>
                                    <li><a href="<?php echo (!empty($social_fblink)) ? $social_fblink->link : $fblink; ?>" target="_blank">Facebook</a></li>
                                    <li><a href="<?php echo (!empty($social_twlink)) ? $social_twlink->link : $twlink; ?>" target="_blank">Twitter</a></li>
                                    <li><a href="<?php echo (!empty($social_ytlink)) ? $social_ytlink->link : $ytlink; ?>" target="_blank">YouTube</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <?php
        $cate_1_alias = $this->uri->segment(3);
        $cate_2_alias = $this->uri->segment(4);
        $cate_3_alias = $this->uri->segment(5);
        
        $for_what = $this->input->get('for');
        $sale_wanted = '';
        if ($for_what == 'wanted') {
            $sale_wanted = '?for=wanted';
        }
        if ($for_what == 'sale') {
            $sale_wanted = '?for=sale';
        }
        ?>
        
        <script src="<?php echo base_url();?>js/jquery-1.11.0.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            URL = "<?php echo base_url(); ?>";
            current_url = "<?php echo current_url(); ?>"
            c1_alias = "<?php echo ($cate_1_alias != '') ? $cate_1_alias . '/' : ''; ?>";
            c2_alias = "<?php echo ($cate_2_alias != '') ? $cate_2_alias . '/' : ''; ?>";
            c3_alias = "<?php echo ($cate_3_alias != '') ? $cate_3_alias . '/' : ''; ?>";
            sale_wanted = "<?php echo $sale_wanted;?>";
            query = "<?php echo ($this->input->get('query')) ? '?query=' . $this->input->get('query') : '' ;?>";
            ad_category = "<?php echo ($this->input->get('category')) ? '&category=' . $this->input->get('category') : '' ;?>";
            ad_location = "<?php echo ($this->input->get('location')) ? '&location=' . $this->input->get('location') : '' ;?>";
            min_price = "<?php echo ($this->input->get('min-price')) ? '?min-price=' . $this->input->get('min-price') : '' ;?>";
            max_price = "<?php echo ($this->input->get('max-price')) ? '&max-price=' . $this->input->get('max-price') : '' ;?>";
            ad_alias = "<?php echo ($cate_1_alias != '') ? $cate_1_alias : ''; ?>";
            csrf_hash = "<?php echo $this->security->get_csrf_hash(); ?>";
        </script>
        <script src="<?php echo base_url();?>js/custom.js" type="text/javascript"></script>
        
        <!-- Add mousewheel plugin (this is optional) -->
        <script type="text/javascript" src="<?php echo base_url('asset/lib/jquery.mousewheel-3.0.6.pack.js')?>"></script>

        <!-- Add fancyBox -->
        <link rel="stylesheet" href="<?php echo base_url('asset/source/jquery.fancybox.css')?>" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php echo base_url('asset/source/jquery.fancybox.pack.js')?>"></script>

        <link rel="stylesheet" href="<?php echo base_url('asset/source/helpers/jquery.fancybox-thumbs.css')?>" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php echo base_url('asset/source/helpers/jquery.fancybox-thumbs.js')?>"></script>

    </body>
</html>
