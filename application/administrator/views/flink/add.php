<?php $this->load->view('home/head'); ?>

<div align="center" style="height:40px;">

    <?php $this->load->view('home/menu'); ?>

</div>

<div class="mid_body">
    <div align="center">
        <div class="inner_mid" >

            <div class="top_bar" >

                <div class="top_bar_left"> Add Footer link </div>
                <div class="top_bar_right" >

                    <div class="top_menu"></div>

                </div>
                <div class="clear"> </div>
            </div>

            <div class="add_down_list">

                <?php echo validation_errors('<div class="error">', '</div>'); ?>
                <?php echo form_open(''); ?>
                <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

                <table width="900" border="0" align="center" cellpadding="5" cellspacing="0">
                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title"><strong>Link Name :</strong> </div></td>
                        <td height="25" align="left"><div class="table_blank">
                                <?php
                                echo form_input(array('name' => 'name', 'id' => 'name', 'value' => set_value('name')));
                                ?>
                            </div></td>
                    </tr>

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title"><strong>Links :</strong> </div></td>
                        <td height="25" align="left"><div class="table_blank">
                                <?php
                                echo form_input(array('name' => 'links', 'id' => 'links', 'value' => set_value('links')));
                                ?>
                            </div></td>
                    </tr>

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title"><strong>Position :</strong> </div></td>
                        <td height="25" align="left"><div class="table_blank">
                                <select name="position">
                                    <?php
                                    $all_heading = $this->Flinks->getAllPosHeading();
                                    $sl = 1;
                                    foreach ($all_heading as $head) {
                                        ?>
                                        <option value="<?php echo $head['id']; ?>">P<?php echo $sl; ?> - <?php echo $head['name']; ?></option>
                                        <?php
                                        $sl++;
                                    }
                                    ?>
                                </select>
                                <a href="<?php echo base_url(); ?>flink/edit_heading">Edit Heading</a>
                            </div></td>
                    </tr>

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title"><strong>Serial :</strong> </div></td>
                        <td height="25" align="left">
                            <div class="" style="width:200px" align="left">
                                <?php
                                echo form_input(array('name' => 'serial', 'id' => 'serial', 'value' => set_value('serial')));
                                ?>
                            </div></td>
                    </tr>

                    <tr>
                        <td width="225" height="25"> <div align="right" class="table_title " ><strong>Status:</strong><br />
                            </div></td>
                        <td height="25" align="left">
                            <div class="table_blank_radio" style="width:300px" align="left">
                                <label>
                                    <?php echo form_radio(array('name' => 'status', 'checked' => 'checked', 'value' => '1',)); ?>
                                    Published	  
                                </label>
                                <label>
                                    <?php echo form_radio(array('name' => 'status', 'value' => '0',)); ?>
                                    Unpublished	  
                                </label>

                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td align="right">&nbsp;</td>
                        <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right"><label>
                                <?php echo form_reset(array('name' => 'reset', 'id' => 'reset', 'value' => 'Clear')); ?>

                            </label></td>
                        <td align="left">
                            <label>
                                <?php echo form_submit(array('name' => 'submit', 'id' => 'submit', 'value' => 'Add')); ?>
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
