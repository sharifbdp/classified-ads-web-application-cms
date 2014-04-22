<?php $this->load->view('home/head'); ?>

<div class="main_body" >

    <div align="center" class="admin_name"> 
        <?php echo validation_errors('<div class="error" style="width: 50%">', '</div>'); ?>
        <img src="<?php echo base_url(); ?>image/name.jpg">
    </div>
    <div align="center">
        <div class="login_area">


            <div class="login_inner">
                <?php
                if ($this->session->flashdata('mail_success')) {
                    ?>
                    <div style="color: green; font-weight: bold; ">
                        <?php echo $this->session->flashdata('mail_success'); ?>
                    </div>
                    <br/>
                <?php } ?>

                <?php echo form_open('login/new_password'); ?>

                <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

                <p align="left"><u>Email Address</u></p>

                <br/>
                <?php
                echo form_input(array('name' => 'email', 'id' => 'email', 'value' => '', 'placeholder' => 'Enter your email address', 'size' => '30',));
                ?>

                <div class="submit">

                    <?php
                    echo form_submit(array('name' => 'forgot_password', 'id' => 'forgot_password', 'value' => 'Submit', 'style' => 'font-size:13px; text-align:center; margin-left: 35%; width:67px; height:21px; cursor:pointer; '));
                    ?>

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