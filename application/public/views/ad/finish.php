<?php $this->load->view('common/header'); ?>

<body class='post_item post_item post_item-finish'>

    <?php $this->load->view('common/top_menu'); ?>

    <div id='site-content'>

        <div class='wrap'>
            <div class='progress-bar'>
                <div class='details done step'><i></i>Fill in details</div>
                <div class='done preview step'><i></i>Check your ad</div>
                <div class='confirmation done step'><i></i>Confirmation</div>
            </div>

            <div class='inner-box'>
                <?php if(!empty($content)) { 
//                    echo "<pre>";
//                    echo print_r($content);
//                    echo "</pre>";
                    ?>
                <h2 class='confirmation-headline'>Your ad was successfully submitted for review</h2>
                <p class='confirmation-info'>
                    Please note it can take up to <strong>1 hour</strong> for your ad to be published on the site. <br>Once the ad has been reviewed, you will receive an email at <strong><?php echo $content->poster_email;?></strong>.
                </p>
                <ul class='regular flat' id='item-rows'>
                    <li class='item'>
                        <div class='h-stack'>
                            <div class='photo'>
                                <img src='http://res.cloudinary.com/saltside-production/image/private/t_thumb/81614b44-81b5-4c94-b615-1c7e29aec430.jpg'>
                            </div>
                            <div class='inner'>
                                <div class='col'>
                                    <h2><span><?php echo $content->title; ?></span></h2>
                                    <div class='meta'>
                                        <span class='category'><?php echo $content->cat_name;?></span>
                                        <span class='location'><?php echo ', ' . $content->city;?></span>
                                    </div>
                                </div>
                                <div class='attr polar'><span class='data'>USD $ <?php echo $content->price; ?></span></div>
                            </div>
                        </div>
                    </li>
                </ul>
                <?php }else{ ?>
                <div class='alert' id='check-error-message'>
                    <br>
                    <div class='box error'>
                        Something went wrong while checking your ad. Please click &quot;Check your ad&quot; again to post your ad. If the error persists, please contact customer support.
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

<!--        <div class="wrap">
            <div class="similar-items wrap">
                <h2>You might also like...</h2>
                <div class="inner-box">
                    <div data-ui="gallery" data-ui-transition="slide 500" class="gallery">
                        <div class="stage">
                            <div class="items" style="width: 4390px; left: -878px;"><div class="item h-stack" style="width: 878px;">
                                    <a href="/en/acer-aspire-one-d270-for-sale-dhaka-33"><div class="inner-content">
                                            <img src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/412bed75-8340-4345-8e78-c18202ae0b7f.jpg" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/412bed75-8340-4345-8e78-c18202ae0b7f.jpg" class="similar-ad loaded" alt=" - ">
                                            <div class="title">Acer Aspire One D270</div>
                                            <div class="price"></div>
                                        </div>
                                    </a><a href="/en/acer-aspire-4315-for-sale-dhaka-5"><div class="inner-content">
                                            <img src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/4fad4c27-bd4b-4aaa-a0bf-11eb65ce3e60.jpg" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/4fad4c27-bd4b-4aaa-a0bf-11eb65ce3e60.jpg" class="similar-ad loaded" alt=" - ">
                                            <div class="title">Acer Aspire 4315</div>
                                            <div class="price"></div>
                                        </div>
                                    </a><a href="/en/acer-aspire-one-for-sale-dhaka-90"><div class="inner-content">
                                            <img src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/7bd453e7-b5b1-4179-bdb6-bacb9f584cba.jpg" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/7bd453e7-b5b1-4179-bdb6-bacb9f584cba.jpg" class="similar-ad loaded" alt=" - ">
                                            <div class="title">Acer aspire one</div>
                                            <div class="price"></div>
                                        </div>
                                    </a><a href="/en/acer-aspire-from-usa-for-sale-dhaka-1"><div class="inner-content">
                                            <img src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/b58ad1d8-cfbc-4b96-b145-7cdf8af96f7f.jpg" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/b58ad1d8-cfbc-4b96-b145-7cdf8af96f7f.jpg" class="similar-ad loaded" alt=" - ">
                                            <div class="title">ACER ASPIRE FROM USA</div>
                                            <div class="price"></div>
                                        </div>
                                    </a><a href="/en/acer-aspire-5520-for-sale-dhaka"><div class="inner-content">
                                            <img src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/c3106aaa-b6a0-4bf4-b4ab-874958925ec8.jpg" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/c3106aaa-b6a0-4bf4-b4ab-874958925ec8.jpg" class="similar-ad loaded" alt=" - ">
                                            <div class="title">acer aspire 5520</div>
                                            <div class="price"></div>
                                        </div>
                                    </a>
                                </div>
                                <div class="item h-stack" style="width: 878px;">
                                    <a href="/en/acer-aspire-for-sale-dhaka-45"><div class="inner-content">
                                            <img src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/e7774994-8c3d-11e3-b7cb-22000a270a3d.jpg" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/e7774994-8c3d-11e3-b7cb-22000a270a3d.jpg" class="similar-ad loaded" alt=" - ">
                                            <div class="title">acer aspire</div>
                                            <div class="price"></div>
                                        </div>
                                    </a><a href="/en/acer-aspire-for-sale-dhaka-51"><div class="inner-content">
                                            <img src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/ac7f3265-9094-4a1c-a9be-2ef0a4305da0.jpg" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/ac7f3265-9094-4a1c-a9be-2ef0a4305da0.jpg" class="similar-ad loaded" alt=" - ">
                                            <div class="title">acer aspire</div>
                                            <div class="price"></div>
                                        </div>
                                    </a><a href="/en/acer-aspire-v5-122p-touchscreen-laptop-for-sale-dhaka"><div class="inner-content">
                                            <img src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/a889451a-01f4-4a32-a2fa-9b9c2d79e6c9.jpg" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/a889451a-01f4-4a32-a2fa-9b9c2d79e6c9.jpg" class="similar-ad loaded" alt=" - ">
                                            <div class="title">New TouchScreen ACER Aspire V5 Laptop</div>
                                            <div class="price"></div>
                                        </div>
                                    </a><a href="/en/acer-aspire-4749z-for-sale-dhaka-10"><div class="inner-content">
                                            <img src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/80a5dd41-b370-4638-8e72-338856955d33.jpg" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/80a5dd41-b370-4638-8e72-338856955d33.jpg" class="similar-ad loaded" alt=" - ">
                                            <div class="title">Acer Aspire 4749z</div>
                                            <div class="price"></div>
                                        </div>
                                    </a><a href="/en/acer-aspire-one-725-for-sale-dhaka-52"><div class="inner-content">
                                            <img src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/e6d6c480-fa2b-4628-b315-a9c7db793d9c.jpg" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/e6d6c480-fa2b-4628-b315-a9c7db793d9c.jpg" class="similar-ad loaded" alt=" - ">
                                            <div class="title">Acer aspire one 725</div>
                                            <div class="price"></div>
                                        </div>
                                    </a>
                                </div>
                                <div class="item h-stack" style="width: 878px;">
                                    <a href="/en/acer-aspire-4736z-laptop-for-sale-dhaka-27"><div class="inner-content">
                                            <img src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/4522edf9-4752-4d0d-878f-c44888a6214d.jpg" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/4522edf9-4752-4d0d-878f-c44888a6214d.jpg" class="similar-ad loaded" alt=" - ">
                                            <div class="title">Acer Aspire 4736Z Laptop</div>
                                            <div class="price"></div>
                                        </div>
                                    </a><a href="/en/acer-aspire-5552-for-sale-dhaka-2"><div class="inner-content">
                                            <img src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/30017581-8d2c-4f2c-88be-cc8b9574a436.jpg" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/30017581-8d2c-4f2c-88be-cc8b9574a436.jpg" class="similar-ad loaded" alt=" - ">
                                            <div class="title">acer aspire 5552</div>
                                            <div class="price"></div>
                                        </div>
                                    </a><a href="/en/acer-aspire-4752-series-for-sale-dhaka-1"><div class="inner-content">
                                            <img src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/af6d3db3-2227-4a60-88f0-8f84f6c4aae1.jpg" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/af6d3db3-2227-4a60-88f0-8f84f6c4aae1.jpg" class="similar-ad loaded" alt=" - ">
                                            <div class="title">ACER Aspire 4752 Series</div>
                                            <div class="price"></div>
                                        </div>
                                    </a><a href="/en/acer-aspire-5735z-for-sale-dhaka-2"><div class="inner-content">
                                            <img src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/60426b80-7ee9-40c4-b9ca-231013f942c5.jpg" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/60426b80-7ee9-40c4-b9ca-231013f942c5.jpg" class="similar-ad loaded" alt=" - ">
                                            <div class="title">Acer Aspire 5735z ,</div>
                                            <div class="price"></div>
                                        </div>
                                    </a><a href="/en/acer-aspire-5742z-for-sale-dhaka-4"><div class="inner-content">
                                            <img src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/42dfe294-8b14-11e3-881f-123143013573.jpg" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/42dfe294-8b14-11e3-881f-123143013573.jpg" class="similar-ad loaded" alt=" - ">
                                            <div class="title">acer aspire 5742z</div>
                                            <div class="price"></div>
                                        </div>
                                    </a>
                                </div>
                                <div class="item h-stack" style="width: 878px;">
                                    <a href="/en/acer-aspire-one-d270-for-sale-dhaka-33"><div class="inner-content">
                                            <img src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/412bed75-8340-4345-8e78-c18202ae0b7f.jpg" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/412bed75-8340-4345-8e78-c18202ae0b7f.jpg" class="similar-ad loaded" alt=" - ">
                                            <div class="title">Acer Aspire One D270</div>
                                            <div class="price"></div>
                                        </div>
                                    </a><a href="/en/acer-aspire-4315-for-sale-dhaka-5"><div class="inner-content">
                                            <img src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/4fad4c27-bd4b-4aaa-a0bf-11eb65ce3e60.jpg" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/4fad4c27-bd4b-4aaa-a0bf-11eb65ce3e60.jpg" class="similar-ad loaded" alt=" - ">
                                            <div class="title">Acer Aspire 4315</div>
                                            <div class="price"></div>
                                        </div>
                                    </a><a href="/en/acer-aspire-one-for-sale-dhaka-90"><div class="inner-content">
                                            <img src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/7bd453e7-b5b1-4179-bdb6-bacb9f584cba.jpg" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/7bd453e7-b5b1-4179-bdb6-bacb9f584cba.jpg" class="similar-ad loaded" alt=" - ">
                                            <div class="title">Acer aspire one</div>
                                            <div class="price"></div>
                                        </div>
                                    </a><a href="/en/acer-aspire-from-usa-for-sale-dhaka-1"><div class="inner-content">
                                            <img src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/b58ad1d8-cfbc-4b96-b145-7cdf8af96f7f.jpg" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/b58ad1d8-cfbc-4b96-b145-7cdf8af96f7f.jpg" class="similar-ad loaded" alt=" - ">
                                            <div class="title">ACER ASPIRE FROM USA</div>
                                            <div class="price"></div>
                                        </div>
                                    </a><a href="/en/acer-aspire-5520-for-sale-dhaka"><div class="inner-content">
                                            <img src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/c3106aaa-b6a0-4bf4-b4ab-874958925ec8.jpg" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/c3106aaa-b6a0-4bf4-b4ab-874958925ec8.jpg" class="similar-ad loaded" alt=" - ">
                                            <div class="title">acer aspire 5520</div>
                                            <div class="price"></div>
                                        </div>
                                    </a>
                                </div>
                                <div class="item h-stack" style="width: 878px;">
                                    <a href="/en/acer-aspire-for-sale-dhaka-45"><div class="inner-content">
                                            <img src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/e7774994-8c3d-11e3-b7cb-22000a270a3d.jpg" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/e7774994-8c3d-11e3-b7cb-22000a270a3d.jpg" class="similar-ad loaded" alt=" - ">
                                            <div class="title">acer aspire</div>
                                            <div class="price"></div>
                                        </div>
                                    </a><a href="/en/acer-aspire-for-sale-dhaka-51"><div class="inner-content">
                                            <img src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/ac7f3265-9094-4a1c-a9be-2ef0a4305da0.jpg" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/ac7f3265-9094-4a1c-a9be-2ef0a4305da0.jpg" class="similar-ad loaded" alt=" - ">
                                            <div class="title">acer aspire</div>
                                            <div class="price"></div>
                                        </div>
                                    </a><a href="/en/acer-aspire-v5-122p-touchscreen-laptop-for-sale-dhaka"><div class="inner-content">
                                            <img src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/a889451a-01f4-4a32-a2fa-9b9c2d79e6c9.jpg" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/a889451a-01f4-4a32-a2fa-9b9c2d79e6c9.jpg" class="similar-ad loaded" alt=" - ">
                                            <div class="title">New TouchScreen ACER Aspire V5 Laptop</div>
                                            <div class="price"></div>
                                        </div>
                                    </a><a href="/en/acer-aspire-4749z-for-sale-dhaka-10"><div class="inner-content">
                                            <img src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/80a5dd41-b370-4638-8e72-338856955d33.jpg" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/80a5dd41-b370-4638-8e72-338856955d33.jpg" class="similar-ad loaded" alt=" - ">
                                            <div class="title">Acer Aspire 4749z</div>
                                            <div class="price"></div>
                                        </div>
                                    </a><a href="/en/acer-aspire-one-725-for-sale-dhaka-52"><div class="inner-content">
                                            <img src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/e6d6c480-fa2b-4628-b315-a9c7db793d9c.jpg" data-src="http://res.cloudinary.com/saltside-production/image/private/t_featthumb/e6d6c480-fa2b-4628-b315-a9c7db793d9c.jpg" class="similar-ad loaded" alt=" - ">
                                            <div class="title">Acer aspire one 725</div>
                                            <div class="price"></div>
                                        </div>
                                    </a>
                                </div></div>
                        </div>
                        <div class="dots">
                            <a href="#" data-ui-nav="1" class="current"></a>
                            <a href="#" data-ui-nav="2" class=""></a>
                            <a href="#" data-ui-nav="3" class=""></a>
                        </div>
                        <div class="small-arrows">
                            <a href="#" data-ui-nav="prev" class="arrow">Prev</a>
                            <a href="#" data-ui-nav="next" class="arrow">Next</a>
                        </div>
                    </div>
                    <a class="polar view-more-similar-items" href="/en/computers-accessories-laptops-netbooks-in-dhaka">More ads</a>
                </div>
            </div>

        </div>-->

        <div class='wrap'>
            <div class='item-box'>
                <h2>Do you have something to sell?</h2>
                <p>Post your ad for free on Website.com</p>
                <div class='btn-wrapper'>
                    <div class='bg left'></div>
                    <div class='bg right'></div>
                    <div class='btn-border'>
                        <a href="<?php echo base_url()?>en/post_ad" class="btn large post"><span class="large">Post your free ad</span></a>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php $this->load->view('common/footer'); ?>