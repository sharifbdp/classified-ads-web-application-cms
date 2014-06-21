<?php $this->load->view('home/head'); ?>

<div class="main_body" >

    <div align="center" class="admin_name"> 
        <?php echo validation_errors('<div class="error" style="width: 50%">', '</div>'); ?>
    </div>
    <div align="center">
        <div class="login_area">

            
            <div class="login_inner">
                <?php echo form_open('login/check'); ?>

                <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

                <p align="left"> Username/Email </p>
                <?php
                echo form_input(array('name' => 'email', 'id' => 'email', 'value' => 'Username', 'size' => '30',));
                ?>
                <p align="left" class="pass"> Password </p>

                <?php
                echo form_password(array('name' => 'password', 'id' => 'password', 'value' => '******', 'size' => '30',));
                ?>
                <div class="submit">
                    <div class="submit_left"><a href="<?php echo base_url(); ?>login/forgot_password">Forgot password</a>?</div>
                    <div class="submit_right">

                        <?php
                        echo form_submit(array('name' => 'login', 'id' => 'login', 'style' => 'background-image:url(' . base_url() . 'image/login_button.jpg); background-repeat:no-repeat;border:0px; width:67px; height:21px; cursor:pointer; '));
                        ?>

                        <?php
//<input name="login" type="submit" id="login"
//style="background-image:url(image/login_button.jpg); background-repeat:no-repeat;
                        ?>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

    <div align="center" >
        <div align="left" style="width:300px;"> <a href="#"></a></div>
    </div>

</div>

<?php $this->load->view('home/footer'); ?>