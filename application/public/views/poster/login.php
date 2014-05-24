<?php $this->load->view('common/header'); ?>

    <body class='session session session-new'>
        
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
                    <div class='row'>
                        <div class='col6'>
                            <h1>Manage all your ads in one place - for free!</h1>
                            <ul class='reasons flat'>
                                <li>
                                    View, edit and delete your ads.
                                </li>
                                <li>
                                    Save your contact details to save time when posting new ads.
                                </li>
                                <li>
                                    Keep track of your favorite ads.
                                </li>
                            </ul>
                            <p class='toggle-context'>
                                Don't have an account yet?
                                <a href="<?php echo base_url('user/sign_up');?>">Sign up now!</a>
                            </p>
                        </div>
                        <div class='col5 polar'>
                            <div class='tabs'>
                                <a class='active tab' href='<?php echo base_url('user/login');?>'>Log in</a>
                                <a class='tab' href='<?php echo base_url('user/sign_up');?>'>Sign up</a>
                            </div>
                            <div class='form-box'>
                                <div class='inner-box clearfix'>
                                    <div class='fieldset' id='login-fields'>
                                        
                                        <?php echo form_open_multipart('', array('class' => 'new_user', 'id' => 'new_user'))?>
                                            
                                            <div class='field'>
                                                <div class='input prepend'>
                                                    <span class='add-on xl'><i class='ico-email'></i></span>
                                                    <input class="required xl" id="user_email" name="email" placeholder="Enter your email" size="30" type="text" />
                                                    <?php echo form_error('email', '<label for="email" class="error" style="display: block;">', '</label>'); ?>
                                                </div>
                                            </div>
                                            <div class='field'>
                                                <div class='input prepend'>
                                                    <span class='add-on xl'><i class='ico-password'></i></span>
                                                    <input class="required xl" id="user_password" name="password" placeholder="Enter your password" size="30" type="password" />
                                                    <?php echo form_error('password', '<label for="password" class="error" style="display: block;">', '</label>'); ?>
                                                </div>
                                            </div>
                                            <div class='field'>
                                                <div class='input'>
                                                    <button class='btn polar'><span>Log in</span></button>
                                                </div>
                                            </div>
                                        
                                        <a href="<?php echo base_url('user/password'); ?>">Forgot password?</a>
                                            
                                        <?php echo form_close();?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
<?php $this->load->view('common/footer'); ?>