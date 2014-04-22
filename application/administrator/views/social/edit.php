<?php $this->load->view('home/head'); ?>
<div align="center" style="height:40px;">
    <?php $this->load->view('home/menu'); ?>
</div>

<div class="mid_body">
    <div align="center">
        <div class="inner_mid" >

            <div class="top_bar" >

                <div class="top_bar_left" >  Edit Social Links </div>
                <div class="top_bar_right" >

                    <div class="top_menu">
                    </div>
                </div>

                <div class="clear"> </div>

            </div>

            <div class="add_down_list">

                <?php
                if (isset($error))
                    echo $error;
                echo validation_errors('<div class="error">', '</div>');

                echo form_open_multipart('');

                echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
                echo form_hidden('mid', $content->id);
                ?>

                <table width="900" border="0" align="center" cellpadding="5" cellspacing="0">
                    <tr>
                        <td width="225" height="25"> <div align="right" class="table_title " ><strong>Select Social Site:</strong><br />
                            </div></td>
                        <td height="25" align="left"><div  class="table_blank_radio" style="width:60%" align="left">
                                <label>

                                    <?php
                                    if ($content->name == '1') {
                                        $checked = "checked";
                                    } else {
                                        $checked = "";
                                    }

                                    if ($content->name == '2') {
                                        $checked2 = "checked";
                                    } else {
                                        $checked2 = "";
                                    }
                                    if ($content->name == '3') {
                                        $checked3 = "checked";
                                    } else {
                                        $checked3 = "";
                                    }
                                    if ($content->name == '4') {
                                        $checked4 = "checked";
                                    } else {
                                        $checked4 = "";
                                    }

                                    echo form_radio(array('name' => 'name', 'checked' => $checked, 'value' => '1',));
                                    ?>
                                    Facebook	  </label>
                                <label>
                                    <?php
                                    echo form_radio(array('name' => 'name', 'checked' => $checked2, 'value' => '2',));
                                    ?>
                                    Twitter	  </label>
                                <label>
                                    <?php
                                    echo form_radio(array('name' => 'name', 'checked' => $checked3, 'value' => '3',));
                                    ?>
                                    You Tube	  </label>
<!--                                <label>
                                    <?php
                                    echo form_radio(array('name' => 'name', 'checked' => $checked4, 'value' => '4',));
                                    ?>
                                    Google	  </label>-->

                            </div></td>
                    </tr>


                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title" ><strong>URL:</strong> </div></td>
                        <td height="25" align="left"><div class="table_blank">
                                <?php
                                echo form_input(array('name' => 'link', 'id' => 'link', 'value' => $content->link, 'size' => '40'))
                                ?>
                            </div></td>
                    </tr>  


                    <tr>
                        <td width="225" height="25"> <div align="right" class="table_title " ><strong>Status:</strong><br />
                            </div></td>
                        <td height="25" align="left"><div  class="table_blank_radio" style="width:300px" align="left">
                                <label>

                                    <?php
                                    if ($content->status == '1') {
                                        $checked = "checked";
                                    } else {
                                        $checked = "";
                                    }

                                    if ($content->status == '0') {
                                        $checked2 = "checked";
                                    } else {
                                        $checked2 = "";
                                    }

                                    echo form_radio(array('name' => 'status', 'checked' => $checked, 'value' => '1',));
                                    ?>
                                    Published	  </label>
                                <label>
                                    <?php
                                    echo form_radio(array('name' => 'status', 'checked' => $checked2, 'value' => '0',));
                                    ?>
                                    Unpublished	  </label>

                            </div></td>
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


                            </label></td>
                    </tr>
                </table>
                <?php echo form_close(); ?>
            </div>

        </div>
    </div>

</div>
<?php $this->load->view('home/footer'); ?>