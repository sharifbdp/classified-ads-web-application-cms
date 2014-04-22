<?php $this->load->view('home/head'); ?>
<div align="center" style="height:40px;">
    <?php $this->load->view('home/menu'); ?>
</div>

<div class="mid_body">
    <div align="center">
        <div class="inner_mid" >

            <div class="top_bar" >

                <div class="top_bar_left" > Edit Content/Information  </div>
                <div class="top_bar_right" >

                    <div class="top_menu"></div>

                </div>

                <div class="clear"> </div>
            </div>

            <div class="add_down_list">

                <?php
                echo validation_errors('<div class="error">', '</div>');
                echo form_open();
                ?>
                
                <table width="900" border="0" align="center" cellpadding="5" cellspacing="0">
                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title" ><strong>Head line:</strong> </div></td>
                        <td height="25" align="left"><div class="table_blank">
                                <?php
                                echo form_input(array('name' => 'head_line', 'id' => 'head_line', 'value' => $content->head_line));
                                ?>
                            </div></td>
                    </tr>

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title" ><strong>Main Menu:</strong> </div></td>
                        <td height="25" align="left"><div class="table_blank">
                                <select name="mid" id="main_menu_id">
                                    <option selected="selected">Select A Main Menu</option>
                                    <?php
                                    foreach ($allmainmenu as $main_menu):
                                        ?>
                                        <option value="<?php echo $main_menu['id']; ?>" <?php if ($content->mid == $main_menu['id']) { ?> selected="selected" <?php } ?>><?php echo $main_menu['name']; ?></option>

                                    <?php endforeach; ?>
                                </select>
                            </div></td>
                    </tr>
                    
                    
                    <tr>
                        <td width="225" height="25"> <div align="right" class="table_title " ><strong>Status:</strong><br />
                            </div></td>
                        <td height="25" align="left"><div class="table_blank_radio" align="left">
                                <label>
                                    <?php
                                    $checked = '';
                                    $checked2 = '';
                                    if ($content->status == '1') {
                                        $checked = "checked";
                                    }
                                    if ($content->status == '0') {
                                        $checked2 = "checked";
                                    }
                                    ?>

                                    <?php
                                    echo form_radio(array('name' => 'status', 'checked' => $checked, 'value' => '1',));
                                    ?>
                                    Yes	  </label>
                                <label>
                                    <?php
                                    echo form_radio(array('name' => 'status', 'checked' => $checked2, 'value' => '0',));
                                    ?>
                                    No	  </label>

                            </div></td>
                    </tr>

                    <tr>
                        <td width="225" height="25"> <div align="right" class="table_title " ><strong>Summary:</strong><br />
                            </div></td>
                        <td height="25" align="left">&nbsp;</td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <div class="add_details">
                                <?php echo $this->ckeditor->editor("summary", $content->summary); ?>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td width="225" height="25"> <div align="right" class="table_title " ><strong>Details:</strong><br />
                            </div></td>
                        <td height="25" align="left">&nbsp;</td>
                    </tr>

                    <tr>
                        <td colspan="2" >
                            <div class="add_details">
                                <?php echo $this->ckeditor->editor("details", $content->details); ?>
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

                            </label></td>
                    </tr>
                </table>
                <?php echo form_close(); ?>
            </div>

        </div>
    </div>

</div>


<?php $this->load->view('home/footer'); ?>