<?php $this->load->view('common/header'); ?>
    
    <body class='help contacts contacts contacts-new'>

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
                            <li><a class='stay-safe' href='<?php echo base_url();?>en/details/stay-safe'>Stay safe<i></i></a></li>
                            <li class='current'><a class='contact' href='<?php echo base_url();?>en/details/contact-us'>Contact us<i></i></a></li>
                            <li><a class='about' href='<?php echo base_url();?>en/details/about-us'>About us<i></i></a></li>
                        </ul>
                    </div>
                    <div class='col9 content'>
                        <div class='inner-box'>
                            
                            <h2>Contact us</h2>
                            <p>If you did not find the answer to your question or problem on this page, then please get in touch with us using the form below. We endeavor to answer your messages as soon as possible.</p>
                            <hr>
                            
                            <form accept-charset="UTF-8" action="" class="new_support_ticket" id="new_support_ticket" method="post">
                                <div class='row field'>
                                    <div class='label col2'><label for="support_ticket_name">Your name</label></div>
                                    <div class='input col'><input class="required" id="support_ticket_name" name="support_ticket[name]" size="30" type="text" /></div>
                                </div>
                                <div class='row field'>
                                    <div class='label col2'><label for="support_ticket_email">Your email</label></div>
                                    <div class='input col'><input class="required email" id="support_ticket_email" name="support_ticket[email]" size="30" type="text" /></div>
                                </div>
                                <div class='row field'>
                                    <div class='label col2'><label for="support_ticket_message">Message</label></div>
                                    <div class='input col'><textarea class="required" cols="40" id="support_ticket_message" name="support_ticket[message]" rows="8">
                                        </textarea></div>
                                </div>
                                <div class='row field'>
                                    <div class='label col2'>&nbsp;</div>
                                    <div class='input col'>
                                        <button class='submit btn' type='submit'>
                                            <span>Send your message</span>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <hr>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        
<?php $this->load->view('common/footer'); 