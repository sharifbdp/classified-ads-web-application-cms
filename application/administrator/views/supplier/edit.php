<?php $this->load->view('home/head'); ?>

<style>
    .delete_image { width: auto; height: auto; }
</style>

<div align="center" style="height:40px;">
    <?php $this->load->view('home/menu'); ?>
</div>

<div class="mid_body">
    <div align="center">
        <div class="inner_mid" >
            <div class="top_bar" >

                <div class="top_bar_left"> Edit Leading Supplier </div>
                <div class="top_bar_right">
                    <div class="top_menu"></div>
                </div>
                <div class="clear"> </div>
            </div>

            <div class="add_down_list">

                <?php echo validation_errors('<div class="error">', '</div>'); ?>
                <?php echo form_open_multipart(''); ?>
                <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

                <table width="900" border="0" align="center" cellpadding="5" cellspacing="0">

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title" ><strong>Supplier Name:</strong> </div></td> 
                        <td height="25" align="left"><div class="table_blank">
                                <?php
                                echo form_input(array('name' => 'name', 'id' => 'name', 'value' => $content->name));
                                ?>
                            </div>
                        </td>
                    </tr>

                    <tr> 
                        <td width="225" height="25">  <div align="right" class="table_title " ><strong>Supplier Image:</strong> </div></td>
                        <td height="25" align="left"> 
                            <?php
                            if (empty($content->image)) {
                                echo form_upload('upload_files');
                            } else {
                                ?>
                                <img src="<?php echo base_url(); ?>../uploads/supplier_slider/<?php echo $content->image; ?>" alt="" width="" height="" class="delete_image"/> <img alt="<?php echo $content->id; ?>" src="<?php echo base_url(); ?>image/delete_cross.png" class="delete_cross" />
                            <?php } ?>
                            <i style="font-weight: bold; vertical-align: top;">( width: 73px , Height: 42px )</i>
                        </td>
                    </tr>

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title"><strong>Serial :</strong> </div></td>
                        <td height="25" align="left">
                            <div class="" style="width:200px" align="left">
                                <?php
                                echo form_input(array('name' => 'serial', 'id' => 'serial', 'value' => $content->serial));
                                ?>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td width="225" height="25"> <div align="right" class="table_title " ><strong>Status:</strong><br />
                            </div></td>
                        <td height="25" align="left"><div class="table_blank_radio" style="width:300px" align="left">
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

                            </label>
                        </td>
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

<script type="text/javascript">
    $(function() {

        //delete print image
        $("img.delete_cross").click(function() {

            var id = $(this).attr("alt");

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>supplier/delete_images",
                data: {'id': id, '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'},
                success: function(data) {
                    // return success

                    if (data.status = 'ok') {
                        alert('Successfully delete Image!');
                        window.location.reload(true);
                    }

                }
            });

        });

    });
</script> 

<?php $this->load->view('home/footer'); ?>