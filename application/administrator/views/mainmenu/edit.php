<?php $this->load->view('home/head'); ?>

<div align="center" style="height:40px;">
    <?php $this->load->view('home/menu'); ?>
</div>

<div class="mid_body">
    <div align="center">
        <div class="inner_mid">
            <div class="top_bar">

                <div class="top_bar_left"> Edit Main Menu </div>
                <div class="top_bar_right">

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
                echo form_open('');
                ?>
                <table width="900" border="0" align="center" cellpadding="5" cellspacing="0">
                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title" ><strong>Menu Name:</strong> </div></td>
                        <td height="25" align="left"><div class="table_blank_medium">
                                <?php
                                echo form_input(array('name' => 'name', 'id' => 'name', 'autocomplete' => 'off', 'value' => $content->name, 'size' => '40'))
                                ?>
                            </div></td>
                    </tr>

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title" ><strong>Menu Alias:</strong> </div></td>
                        <td height="25" align="left"><div class="table_blank_medium">
                                <?php
                                echo form_input(array('name' => 'm_alias', 'id' => 'm_alias', 'value' => $content->m_alias, 'size' => '40'))
                                ?> &nbsp; ( Don't use any special character. Use <strong>-</strong> between the word )
                            </div></td>
                    </tr>

                    <tr>
                        <td width="225" height="25"> <div align="right" class="table_title " ><strong>Page Template:</strong><br />
                            </div></td>
                        <td height="25" align="left"> 

                            <?php
                            foreach ($page_template as $cn) {
                                $pagelinks[$cn['template_name']] = $cn['template_name'];
                            }

                            echo form_dropdown('page_template', $pagelinks, $content->page_template);
                            ?>

                        </td>
                    </tr>


                    <tr> 
                        <td width="225" height="25">  <div align="right" class="table_title " ><strong>Serial:</strong> </td>
                        <td height="25" align="left"> 
                            <div class="" >
                                <?php
                                echo form_input(array('name' => 'serial', 'id' => 'serial', 'value' => $content->serial, 'size' => '10'))
                                ?>
                            </div>
                        </td>
                    </tr>

                    <tr> 
                        <td width="225" height="25"><div align="left" class="table_title "><strong><u>SEO Settings</u>:</strong></div></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title"><strong>Page Title:</strong> </div></td>
                        <td height="25" align="left">
                            <div class="table_blank">
                                <?php
                                echo form_input(array('name' => 'page_title', 'id' => 'page_title', 'value' => $content->page_title, 'size' => '50'))
                                ?>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title"><strong>Meta Keywords:</strong></div></td>
                        <td colspan="2">
                            <div class="caption">
                                <?php echo form_textarea(array('name' => 'meta_keywords', 'rows' => '2', 'cols' => '48', 'id' => 'meta_keywords', 'value' => $content->meta_keywords)); ?>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title"><strong>Meta Description:</strong></div></td>
                        <td colspan="2">
                            <div class="caption">
                                <?php echo form_textarea(array('name' => 'meta_description', 'rows' => '3', 'cols' => '48', 'id' => 'meta_description', 'value' => $content->meta_keywords)); ?>
                            </div>
                        </td>
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
<script typr="text/javascript">
    $(function() {
        $("#name").keyup(function() {
            var Text = $(this).val();
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
            $("#m_alias").val(Text);
        });
    });
</script>
<?php $this->load->view('home/footer'); ?>