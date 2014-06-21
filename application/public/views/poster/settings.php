<?php $this->load->view('common/header'); ?>

    <body class='users users users-settings'>
        
        <?php $this->load->view('common/top_menu'); ?>

        <div id='site-content'>
            
            <?php if ($this->session->flashdata('sign_success')) { ?>
                <div class='alert wrap'>
                    <div class='box notice'>
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
                        
                        <?php echo form_open_multipart('', array('class' => 'form-box', 'id' => 'new_user'))?>
                        
                        <div class='col6' id='details'>
                                
                            <div class='inner-box'>
                                <h2>Change Details</h2>
                                <div class='field'>
                                    <div class='input'>
                                        <label>
                                            <input checked="checked" class="required" id="user_poster_type_private" name="poster_type" type="radio" value="private" />
                                            <span>Private</span>
                                        </label>
                                        <label>
                                            <input class="required" id="user_poster_type_business" name="poster_type" type="radio" value="business" />
                                            <span>Business</span>
                                        </label>
                                    </div>
                                </div>
                                <div class='field'>
                                    <label for="user_name">Name</label>
                                    <div class='input'>
                                        <input id="user_name" name="name" size="30" type="text" value="<?php echo $poster_details->name;?>" />
                                        <?php echo form_error('name', '<label for="name" class="error" style="display: block;">', '</label>'); ?>
                                    </div>
                                </div>
                                <div class='field'>
                                    <label for="user_phone_no">Phone number</label>
                                    <div class='input'>
                                        <input id="phone_no" name="phone" type="tel" value="<?php echo $poster_details->phone;?>" />
                                        <?php echo form_error('phone', '<label for="phone" class="error" style="display: block;">', '</label>'); ?>
                                    </div>
                                </div>
                                <div class='bottom'>
                                    <button class='btn' type='submit' name="submit_form" value="update_details"><span>Update Details</span></button>
                                </div>
                            </div>

                        </div>
                        
                        <div class='col5 polar' id='password'>
                            
                            <div class='inner-box'>
                                <h2>Change password</h2>
                                <div class='field'>
                                    <label for="user_current_password">Current password</label>
                                    <div class='input'>
                                        <input class="required" id="user_current_password" name="current_password" size="30" type="password" />
                                        <?php echo form_error('current_password', '<label for="current_password" class="error" style="display: block;">', '</label>'); ?>
                                    </div>
                                </div>
                                <div class='field'>
                                    <label for="user_new_password">New password</label>
                                    <div class='input'>
                                        <input id="user_password" minlength="5" name="password" size="30" type="password" />
                                        <?php echo form_error('password', '<label for="password" class="error" style="display: block;">', '</label>'); ?>
                                    </div>
                                </div>
                                <div class='field'>
                                    <label for="user_password_confirmation">Password confirmation</label>
                                    <div class='input'>
                                        <input id="user_password_confirmation" name="c_password" size="30" type="password" />
                                        <?php echo form_error('c_password', '<label for="c_password" class="error" style="display: block;">', '</label>'); ?>
                                    </div>
                                </div>
                                <div class='bottom'>
                                    <button class='btn' type='submit' name="submit_form" value="change_password"><span>Change password</span></button>
                                </div>
                            </div>
                          
                        </div>
                        
                        <?php echo form_close();?>
                        
                    </div>
                </div>
            </div>


        </div>
        
<?php $this->load->view('common/footer'); ?>