<?php $this->load->view('home/head'); ?>

<div align="center" style="height:40px;">
    <?php $this->load->view('home/menu'); ?>
</div>

<div class="mid_body">
    <div align="center">
        <div class="inner_mid" >

            <div class="top_bar" >

                <div class="top_bar_left" > Add New City/Area </div>
                <div class="top_bar_right" >

                    <div class="top_menu">
                    </div>
                </div>

                <div class="clear"> </div>

            </div>

            <div class="add_down_list">
                <?php
                echo validation_errors('<div class="error">', '</div>');
                echo form_open('');
                ?>
                <table width="900" border="0" align="center" cellpadding="5" cellspacing="0">

                    <tr>
                        <td width="225" height="25"> <div align="right" class="table_title " ><strong>Select Location:</strong><br />
                            </div></td>
                        <td height="25" align="left">
                            <select name="lid">
                                <?php
                                $all_location = $this->Locations->get_all_data();
                                if ($all_location) {
                                    foreach ($all_location as $loc) {
                                        ?>
                                        <option value="<?php echo $loc['id']; ?>"><?php echo $loc['name']; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title" ><strong>City/Area Name:</strong> </div></td>
                        <td height="25" align="left"><div class="table_blank">
                                <?php
                                echo form_input(array('name' => 'name', 'id' => 'name', 'value' => set_value('name'), 'size' => '40'));
                                ?>
                            </div></td>
                    </tr>

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title" ><strong>City/Area Alias:</strong> </div></td>
                        <td height="25" align="left"><div class="table_blank">
                                <?php
                                echo form_input(array('name' => 'alias', 'id' => 'alias', 'value' => set_value('alias'), 'size' => '40'))
                                ?> &nbsp; ( Don't use any special character. Use <strong>-</strong> between the word )
                            </div></td>
                    </tr>

                    <tr>
                        <td width="225" height="25"> <div align="right" class="table_title " ><strong>Status:</strong><br />
                            </div></td>
                        <td height="25" align="left"><div  class="table_blank_radio" style="width:300px" align="left">
                                <label>

                                    <?php
                                    echo form_radio(array('name' => 'status', 'checked' => 'checked', 'value' => '1',));
                                    ?>
                                    Published	  </label>
                                <label>
                                    <?php
                                    echo form_radio(array('name' => 'status', 'value' => '0',));
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
                                echo form_submit(array('name' => 'submit', 'id' => 'submit', 'value' => 'Add'));
                                ?>

                            </label></td>
                    </tr>
                </table>
                <?php echo form_close(); ?>
            </div>

        </div>
    </div>

</div>
<script typr="text/javascript">
    $(function() {
        $("#name").keyup(function() {
            var Text = $(this).val();
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
            $("#alias").val(Text);
        });
    });
</script> 
<?php $this->load->view('home/footer'); ?>