<?php $this->load->view('home/head'); ?>

<div align="center" style="height:40px;">

    <?php $this->load->view('home/menu'); ?>

</div>

<div class="mid_body">
    <div align="center">
        <div class="inner_mid" >

            <div class="top_bar" >

            <div class="top_bar_left" > Edit Admin User </div>
                <div class="top_bar_right" >

                    <div class="top_menu">

                    </div>

                </div>

                <div class="clear"> </div>

            </div>

            <div class="add_down_list">

                <?php
                echo validation_errors('<div class="error">', '</div>');
                ?>

                <?php
                echo form_open();
                ?>
                <table width="900" border="0" align="center" cellpadding="5" cellspacing="0">
                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title" ><strong>User Name:</strong> </div></td>
                        <td height="25" align="left"><div class="table_blank">
                                <?php
                                echo form_input(array('name' => 'name', 'id' => 'name', 'value' => $content->name));
                                ?>
                                <?php
                                echo form_hidden('lid', $content->id);
                                echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                                ?>

                            </div></td>
                    </tr>

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title" ><strong>Login ID (Username/Email):</strong> </div></td>
                        <td height="25" align="left"><div class="table_blank">
                                <?php
                                echo form_input(array('name' => 'email', 'id' => 'email', 'value' => $content->email));
                                ?>
                            </div></td>
                    </tr>

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title" ><strong>Reset Your Password:</strong> </div></td>
                        <td height="25" align="left"><div class="table_blank">
                                <?php
                                echo form_password(array('name' => 'password', 'id' => 'password', 'value' => '', 'autocomplete' => 'false'));
                                ?>
                            </div>
                        </td>
                    </tr>
                   
                   <tr>
                        <td width="225" height="25"><div align="right" class="table_title" ><strong>Confirm Your Password:</strong> </div></td>
                        <td height="25" align="left"><div class="table_blank">
                                <?php
                                echo form_password(array('name' => 'cpassword', 'id' => 'cpassword', 'value' => '', 'autocomplete' => 'false'));
                                ?>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td align="right">&nbsp;</td>
                        <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right"><label>
                                <?php
                                echo form_reset(array('name' => 'reset', 'id' => 'reset', 'value' => 'Clear'));
                                ?>

                            </label></td>
                        <td align="left"><label>
                            <?php
                            echo form_submit(array('name' => 'submit', 'id' => 'submit', 'value' => 'Edit'));
                            ?>

                            </label>
                        </td>
                    </tr>
                </table>
                <?php echo form_close(); ?>
            </div>

        </div>
    </div>

</div>

<?php $this->load->view('home/footer'); ?>