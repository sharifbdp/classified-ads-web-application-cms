<?php $this->load->view('common/header'); ?>

    <body class='users users users-new'>
        
        <?php $this->load->view('common/top_menu'); ?>

        <div id='site-content'>

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
                                Do you already have an account?
                                <a href="<?php echo base_url('user/login');?>">Log in here</a>
                            </p>
                        </div>
                        <div class='col5 polar'>
                            <div class='tabs'>
                                <a class='tab' href='<?php echo base_url('user/login');?>'>
                                    Log in
                                </a>
                                <a class='active tab' href='<?php echo base_url('user/sign_up');?>'>
                                    Sign up
                                </a>
                            </div>
                            <div class='form-box'>
                                <div class='inner-box clearfix'>
                                    <div class='fieldset' id='signup-fields'>
                                        
                                        <?php echo form_open_multipart('', array('class' => 'new_user', 'id' => 'new_user'))?>
                                        
                                            <div class='field input poster-types'>
                                                <label>
                                                    <input checked="checked" id="user_poster_type_private" name="poster_type" type="radio" value="private" />
                                                    Private
                                                </label>
                                                <label>
                                                    <input id="user_poster_type_business" name="poster_type" type="radio" value="business" />
                                                    Business advertiser
                                                </label>
                                            </div>
                                            <div class='field'>
                                                <div class='input'>
                                                    <input class="required xl" id="user_name" name="name" placeholder="Name" value="<?php echo set_value('name');?>" size="30" type="text" />
                                                    <?php echo form_error('name', '<label for="name" class="error" style="display: block;">', '</label>'); ?>
                                                </div>
                                            </div>
                                            <div class='field'>
                                                <div class='input'>
                                                    <input class="required email xl" id="user_email" name="email" placeholder="Email" value="<?php echo set_value('email');?>" size="30" type="text" />
                                                    <?php echo form_error('email', '<label for="email" class="error" style="display: block;">', '</label>'); ?>
                                                </div>
                                            </div>
                                            <div class='field'>
                                                <div class='input'>
                                                    <input class="required xl" id="user_password" minlength="5" name="password" placeholder="Password" size="30" type="password" />
                                                    <?php echo form_error('password', '<label for="password" class="error" style="display: block;">', '</label>'); ?>
                                                </div>
                                            </div>
                                            <div class='field'>
                                                <div class='input'>
                                                    <input class="required xl" id="user_password_confirmation" name="c_password" placeholder="Confirm password" size="30" type="password" />
                                                    <?php echo form_error('c_password', '<label for="c_password" class="error" style="display: block;">', '</label>'); ?>
                                                </div>
                                            </div>
                                            <div class='field'>
                                                <div class='terms'>
                                                    By signing up for an account you agree to our <a href="<?php echo base_url('en/details/terms-conditions')?>" target="_blank">Terms &amp; Conditions</a>
                                                </div>
                                                <button class='btn polar'>
                                                    <span>Sign up</span>
                                                </button>
                                            </div>
                                        
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