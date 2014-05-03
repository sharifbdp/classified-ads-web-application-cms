<?php $this->load->view('common/header'); ?>

    <body class='home home home-index'>

        <?php $this->load->view('common/top_menu'); ?>

        <div id='site-content'>
            <div id='home-top'>
                <div class='wrap'>
                    <h1 id='header'><a href="#">Welcome to website.com - <strong>the largest marketplace</strong> in Ghana </a></h1>
                    <p class='slogan'>Buy and sell everything from <a href="#">used cars</a> to <a href="#">mobile phones</a> and <a href="#">computers</a>, or search for <a href="#">property</a>, <a href="#">jobs</a> and <a href="#">more</a> in Ghana. <br/>Select a region below to get started:</p>
                    <div class='row content'>
                        <div class='wrap sidebar'>
                            <div id="map" class="col">
                                <img alt=" - " height="428" id="map-imagemap" src="images/transparent_map-2ebbd7cb21c3980daa0bddcc9c7ce5fc.gif" usemap="#tonaton-map" width="320" />
                                <div id='map-layer'>
                                    <div class='city accra'></div>
                                    <div class='city kumasi'></div>
                                    <div class='city sekondi-takoradi'></div>
                                    <div class='western'></div>
                                    <div class='central'></div>
                                    <div class='greater-accra'></div>
                                    <div class='volta'></div>
                                    <div class='eastern'></div>
                                    <div class='ashanti'></div>
                                    <div class='brong-ahafo'></div>
                                    <div class='northern'></div>
                                    <div class='upper-west'></div>
                                    <div class='upper-east'></div>
                                </div>
                                <div class='tooltip'>
                                    <div class='txt'></div>
                                </div>
                                <map name='tonaton-map'>
                                    <area class='accra' coords='238,335,11' data-title='Accra' href='#accra' shape='circle'>
                                    <area class='kumasi' coords='154,265,9' data-title='Kumasi' href='#kumasi' shape='circle'>
                                    <area class='sekondi-takoradi' coords='140,376,9' data-title='Sekondi Takoradi' href='#sekondi-takoradi' shape='circle'>
                                    <area class='western' coords='68,360,89,356,87,333,74,326,60,270,68,249,81,252,85,270,109,286,117,279,127,289,121,295,142,316,143,327,155,332,164,349,157,365,128,385,114,371' data-title='Western' href='#western' shape='poly'>
                                    <area class='central' coords='161,366,204,355,230,335,216,322,184,321,176,313,161,315,138,304,130,291,123,295,139,309,145,317,144,327,158,331,157,341,167,351,158,357' data-title='Central' href='#central' shape='poly'>
                                    <area class='greater-accra' coords='286,323,263,321,231,338,220,323,226,318,232,323,241,321,247,308,256,310,263,315,275,307,285,314,290,319' data-title='Greater Accra' href='#greater-accra' shape='poly'>
                                    <area class='volta' coords='272,146,292,170,284,263,318,303,299,323,290,323,283,307,268,306,257,300,255,291,264,283,258,274,263,228,235,181,247,169,258,176,267,166,254,163,262,142,273,145' data-title='Volta' href='#volta' shape='poly'>
                                    <area class='eastern' coords='177,308,197,271,194,264,205,259,215,244,222,244,238,235,262,239,255,258,260,264,254,272,261,283,252,297,264,303,265,312,255,307,245,308,239,320,219,320,186,320,177,308' data-title='Eastern' href='#eastern' shape='poly'>
                                    <area class='ashanti' coords='123,288,132,290,137,305,161,312,178,312,184,284,198,271,191,261,205,260,215,243,225,243,236,236,215,224,209,218,188,216,175,221,170,211,154,227,145,225,140,221,126,221,125,228,142,236,127,248,121,243,107,256,118,257,111,269,108,285,114,279,121,280' data-title='Ashanti' href='#ashanti' shape='poly'>
                                    <area class='brong-ahafo' coords='71,244,89,192,102,176,98,145,123,180,138,181,148,175,147,169,140,167,142,152,163,149,168,143,184,154,177,167,186,193,203,169,240,193,260,233,256,237,235,236,209,219,190,217,174,222,171,210,157,224,143,225,142,219,125,222,126,229,141,235,127,248,118,242,110,257,118,258,107,283,98,274,84,269,82,251,70,251' data-title='Brong-Ahafo' href='#brong-ahafo' shape='poly'>
                                    <area class='northern' coords='88,93,111,84,149,80,160,66,154,62,164,48,179,54,186,42,198,43,208,33,209,42,243,30,272,56,269,101,282,107,277,146,261,146,253,165,266,167,257,176,245,170,223,180,204,169,189,182,186,192,177,167,184,152,163,141,141,154,142,170,148,174,126,183,88,129,92,110' data-title='Northern' href='#northern' shape='poly'>
                                    <area class='upper-west' coords='166,13,86,13,79,27,77,42,84,52,87,66,88,91,97,91,105,83,149,81,150,72,159,68,153,61,161,46,172,49,157,33,165,22' data-title='Upper West' href='#upper-west' shape='poly'>
                                    <area class='upper-east' coords='167,10,218,11,234,3,253,9,247,32,209,43,205,32,197,44,185,40,177,54,172,47,159,33,166,20' data-title='Upper East' href='#upper-east' shape='poly'>
                                </map>

                            </div>
                            <div id="region-list" class="col h-stack">
                                <div class="region cities">
                                    <h3>Cities</h3>
                                    <ul class="flat">
                                        <li>
                                            <a href="#" class="accra">Accra</a>
                                        </li>
                                        <li>
                                            <a href="#" class="kumasi">Kumasi</a>
                                        </li>
                                        <li>
                                            <a href="#" class="sekondi-takoradi">Sekondi Takoradi</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="region regions">
                                    <h3>Regions</h3>
                                    <ul class="flat">
                                        <li>
                                            <a href="#" class="ashanti">Ashanti</a>
                                        </li>
                                        <li>
                                            <a href="#" class="greater-accra">Greater Accra</a>
                                        </li>
                                        <li>
                                            <a href="#" class="eastern">Eastern</a>
                                        </li>
                                        <li>
                                            <a href="#" class="western">Western</a>
                                        </li>
                                        <li>
                                            <a href="#" class="northern">Northern</a>
                                        </li>
                                        <li>
                                            <a href="#" class="brong-ahafo">Brong-Ahafo</a>
                                        </li>
                                        <li>
                                            <a href="#" class="volta">Volta</a>
                                        </li>
                                        <li>
                                            <a href="#" class="central">Central</a>
                                        </li>
                                        <li>
                                            <a href="#" class="upper-east">Upper East</a>
                                        </li>
                                        <li>
                                            <a href="#" class="upper-west">Upper West</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class='col' id='safety-note'>
                                <img alt=" - " src="<?php echo base_url();?>images/shield-74754336b01f4af4d8bebef9ef7e4349.png" />
                                <div>All ads on website.com are reviewed manually before publishing. <a href="#">More on buying and selling safely on website.com</a></div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class='linkshelf' id='home-categories'>
                    <div class='wrap links'>

                        <?php
                        $first_set_cate = $this->Fronts->get_all_parent_category(4, 0);
                        $second_set_cate = $this->Fronts->get_all_parent_category(4, 4);
                        $third_set_cate = $this->Fronts->get_all_parent_category(4, 8);
                        ?>

                        <?php if (!empty($first_set_cate)) { ?>
                            <ul class='row flat'>
                                <?php
                                foreach ($first_set_cate as $cate_1) {
                                    $count_loc_ad_1 = $this->Fronts->count_ads_by_location_id($cate_1['id']);
                                    ?>
                                    <li class='col3'>
                                        <h3><a href="#"><div class='text'><?php echo $cate_1['name']; ?></div><span class='ad-count'><?php echo $count_loc_ad_1; ?></span></a></h3>
                                        <p><?php echo $cate_1['summary']; ?></p>
                                    </li>
                                <?php } ?>
                            </ul>
                            <?php
                        }
                        if (!empty($second_set_cate)) {
                            ?>
                            <ul class='row flat'>
                                <?php
                                foreach ($second_set_cate as $cate_2) {
                                    $count_loc_ad_2 = $this->Fronts->count_ads_by_location_id($cate_2['id']);
                                    ?>
                                    <li class='col3'>
                                        <h3><a href="#"><div class='text'><?php echo $cate_2['name']; ?></div><span class='ad-count'><?php echo $count_loc_ad_2; ?></span></a></h3>
                                        <p><?php echo $cate_2['summary']; ?></p>
                                    </li>
                                <?php } ?>
                            </ul>
                            <?php
                        }
                        if (!empty($third_set_cate)) {
                            ?>
                            <ul class='row flat'>
                                <?php
                                foreach ($third_set_cate as $cate_3) {
                                    $count_loc_ad_3 = $this->Fronts->count_ads_by_location_id($cate_3['id']);
                                    ?>
                                    <li class='col3'>
                                        <h3><a href="#"><div class='text'><?php echo $cate_3['name']; ?></div><span class='ad-count'><?php echo $count_loc_ad_3; ?></span></a></h3>
                                        <p><?php echo $cate_3['summary']; ?></p>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class='wrap'>
                <div class='item-box'>
                    <h2>Do you have something to sell?</h2>
                    <p>Post your ad for free on website.com</p>
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

<?php $this->load->view('common/footer');