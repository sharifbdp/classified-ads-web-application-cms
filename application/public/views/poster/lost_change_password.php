<?php $this->load->view('common/header'); ?>

    <body class='ads ads ads-show'>

        <?php $this->load->view('common/top_menu'); ?>

        <div id="site-content">
            
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

            <div class="wrap form-page">
                
                <?php echo form_open_multipart('', array('class' => 'new_user', 'id' => 'edit-password'))?>
                    
                    <div class="inner-box">
                        <h1>Create a new password</h1>
                        <p>Please enter a new password for your account.</p>
                        <div class="field">
                            <label>Password</label>
                            <div class="input">
                                <input type="password" size="30" name="password" minlength="5" id="user_password" class="required">
                                <?php echo form_error('password', '<label for="password" class="error" style="display: block;">', '</label>'); ?>
                            </div>
                        </div>
                        <div class="field">
                            <label>Confirm password</label>
                            <div class="input">
                                <input type="password" size="30" name="c_password" id="user_password_confirmation">
                                <?php echo form_error('c_password', '<label for="c_password" class="error" style="display: block;">', '</label>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        <button type="submit" class="btn"name="submit_form" value="change_lost_password"><span>Change password</span></button>
                    </div>
                </form>

            </div>

        </div>

<?php $this->load->view('common/footer'); ?>