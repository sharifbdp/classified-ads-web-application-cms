<?php $this->load->view('common/header'); ?>
    
    <body class='help contacts contacts contacts-new'>

        <?php $this->load->view('common/top_menu'); ?>

        <div id='site-content'>
            
            <?php if ($this->session->flashdata('feedback_success')) { ?>
                <div class='alert wrap'>
                    <div class='box notice'>
                        <a class='polar close' href='#'>×</a><p><?php echo $this->session->flashdata('feedback_success'); ?></p>
                    </div>
                </div>
                <?php
            }
            if ($this->session->flashdata('feedback_error')) {
                ?>
                <div class='alert wrap'>
                    <div class='box error'>
                        <a class='polar close' href='#'>×</a><p><?php echo $this->session->flashdata('feedback_error'); ?></p>
                    </div>
                </div>
            <?php } ?>
            
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
                            <?php
                                if(!empty($content->details)){ echo $content->details; }
                            ?>
                            <hr>
                            
                            
                            <?php echo form_open('', array('class' => 'new_support_ticket', 'id' => 'new_support_ticket'));?>    
                                <div class='row field'>
                                    <div class='label col2'><label for="support_ticket_name">Your name</label></div>
                                    <div class='input col'>
                                        <input class="required" id="support_ticket_name" name="support_ticket_name" value="<?php echo set_value('support_ticket_name');?>" size="30" type="text" />
                                        <?php echo form_error('support_ticket_name', '<label for="support_ticket_name" class="error" style="display: block;">', '</label>'); ?>
                                    </div>
                                </div>
                                <div class='row field'>
                                    <div class='label col2'><label for="support_ticket_email">Your email</label></div>
                                    <div class='input col'>
                                        <input class="required email" id="support_ticket_email" name="support_ticket_email" value="<?php echo set_value('support_ticket_email');?>" size="30" type="text" />
                                        <?php echo form_error('support_ticket_email', '<label for="support_ticket_email" class="error" style="display: block;">', '</label>'); ?>
                                    </div>
                                </div>
                                <div class='row field'>
                                    <div class='label col2'><label for="support_ticket_message">Message</label></div>
                                    <div class='input col'>
                                        <textarea class="required" cols="40" id="support_ticket_message" name="support_ticket_message" rows="8"><?php echo set_value('support_ticket_message');?></textarea>
                                        <?php echo form_error('support_ticket_message', '<label for="support_ticket_message" class="error" style="display: block;">', '</label>'); ?>
                                    </div>
                                </div>
                                <div class='row field'>
                                    <div class='label col2'>&nbsp;</div>
                                    <div class='input col'>
                                        <button class='submit btn' type='submit' name="contact_us_submit" value="contact_us_form">
                                            <span>Send your message</span>
                                        </button>
                                    </div>
                                </div>
                            
                            <?php echo form_close();?>

                            <hr>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        
<?php $this->load->view('common/footer'); 