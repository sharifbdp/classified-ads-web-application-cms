        <div id='site-head'>
            <div class='fill'>
                <div class='wrap'>
                    <div class='row'>
                        <div class='col' id='site-logo'>
                            <a href="<?php echo base_url();?>">website.com</a>
                        </div>
                        <ul class='col h-stack flat' id='site-nav'>
                            <li><a href="<?php echo base_url();?>en/all_ads"><span>All Ads</span></a></li>
                            <li><a href="<?php echo base_url();?>en/details/faq"><span>Help & Support</span></a></li>
                        </ul>
                        <div class='polar'>
                            <ul class='h-stack flat col' id='site-nav-aux'>
                                <li>
                                    <?php if ($this->session->userdata('user_logged')) { 
                                        echo "<a href=" . base_url('user') . "><span>" . $this->session->userdata('name') . "</span></a>";
                                     }else{ ?>
                                        <a href="<?php echo base_url();?>user/login"><span>Log in</span></a>
                                    <?php } ?>
                                </li>
                            </ul>
                            <a class='col btn post btn-bold' href='<?php echo base_url();?>en/post_ad' id='post-free-ad'>
                                <span><strong>Post Your Ad</strong></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($this->session->userdata('user_logged')) {  ?>
        <div id='user-nav-bg'></div>
        <div id='user-nav'>
            <div class='wrap'>
                <div class='row'>
                    <ul class='flat h-stack'>
                        <li><a href="<?php echo base_url('user');?>"><i class='ico-user-ads'></i>My ads</a></li>
                        <li class='favorites'><a href="<?php echo base_url('user/favorites');?>"><span><i class='ico-star'></i>Favorites</span></a></li>
                        <li class='current'><a href="<?php echo base_url('user/settings');?>"><i class='ico-user-settings'></i>Settings</a></li>
                    </ul>
                    <ul class='polar flat h-stack'>
                        <li><a href="<?php echo base_url('user/logout');?>"><i class='ico-user-logout'></i>Log Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php } ?>
                
                
<?php /*        <div id="user-nav-bg"></div>
        <div id="user-nav">
<div class="wrap">
<div class="row">
<ul class="flat h-stack">
<li class="current">
<a href="/en/account"><i class="ico-user-ads"></i>
My ads
</a></li>
<li class="favorites">
<a href="/en/favorites"><span>
<i class="ico-star"></i>
Favorites
</span>
</a></li>
<li>
<a href="/en/settings"><i class="ico-user-settings"></i>
Settings
</a></li>
</ul>
<ul class="polar flat h-stack">
<li>
<a href="/en/users/log_out"><i class="ico-user-logout"></i>
Log Out
</a></li>
</ul>
</div>
</div>
</div>
 * 
 */
?>