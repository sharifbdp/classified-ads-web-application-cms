<?php $this->load->view('common/header'); ?>

    <body class='ads ads ads-lost_password'>

        <?php $this->load->view('common/top_menu'); ?>

        <div id='site-content'>

            <?php if ($this->session->flashdata('mail_success')) { ?>
                <div class='alert wrap'>
                    <div class='box notice'>
                        <a class='polar close' href='#'>×</a><p><?php echo $this->session->flashdata('mail_success'); ?></p>
                    </div>
                </div>
                <?php
            }
            if ($this->session->flashdata('mail_error')) {
                ?>
                <div class='alert wrap'>
                    <div class='box error'>
                        <a class='polar close' href='#'>×</a><p><?php echo $this->session->flashdata('mail_error'); ?></p>
                    </div>
                </div>
            <?php } ?>
            
            <div class='wrap form-page'>
                
                <?php echo form_open_multipart('')?>
                    <div class='inner-box'>
                        <h1>Create a new password</h1>
                        <p>Enter the email address you used when you created the ad or account. You will receive an email with the information you need to change your password.</p>

                        <div class='field'>
                            <label for='email'>Your email:</label>
                            <div class='input'>
                                <input class='email' id='email' name='email' type='text'>
                                <?php echo form_error('email', '<label for="email" class="error" style="display: block;">', '</label>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class='actions page-actions'>
                        <button class='btn' type='submit'>
                            <span>Submit</span>
                        </button>
                    </div>
                <?php echo form_close();?>

            </div>

        </div>
        
<?php $this->load->view('common/footer'); ?>