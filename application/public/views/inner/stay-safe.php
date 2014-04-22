<?php $this->load->view('common/header'); ?>
    
    <body class='help help help-staysafe'>

        <?php $this->load->view('common/top_menu'); ?>

        <div id='site-content'>

            <div class='wrap'>
                <div class='inner-box top'>
                    <?php 
                    if(!empty($content->head_line)){ echo "<h1>{$content->head_line}</h1>"; }
                    if(!empty($content->summary)){ echo $content->summary; }
                    ?>
                </div>
                <div class='row main'>
                    <div class='col3 nav'>
                        <div class='backdrop'></div>
                        <ul class='flat'>
                            <li><a class='faq' href='<?php echo base_url();?>en/details/faq'>FAQ<i></i></a></li>
                            <li><a class='sell-fast' href='<?php echo base_url();?>en/details/how-to-sell-fast'>How to Sell Fast<i></i></a></li>
                            <li class='current'><a class='stay-safe' href='<?php echo base_url();?>en/details/stay-safe'>Stay safe<i></i></a></li>
                            <li><a class='contact' href='<?php echo base_url();?>en/details/contact-us'>Contact us<i></i></a></li>
                            <li><a class='about' href='<?php echo base_url();?>en/details/about-us'>About us<i></i></a></li>
                        </ul>
                    </div>
                    <div class='col9 content'>
                        <div class='inner-box'>
                            
                            <?php 
                            if(!empty($content->details)){
                                echo $content->details;
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        
<?php $this->load->view('common/footer'); 