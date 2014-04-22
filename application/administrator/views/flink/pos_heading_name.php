<?php $this->load->view('home/head'); ?>

<style>
    .edit {
        background: none repeat scroll 0 0 #CCCCCC;
        border: 1px solid #999999;
        padding: 4px;
    }
</style>
<div align="center" style="height:40px;">
    <?php $this->load->view('home/menu'); ?>
</div>

<div class="mid_body">
    <div align="center">
        <div class="inner_mid" >
            <div class="top_bar" >

                <div class="top_bar_left"> Edit footer position heading </div>
                <div class="top_bar_right">
                    <div class="top_menu"></div>
                </div>
                <div class="clear"> </div>
            </div>
            <div id="result"> </div>
                
            <div class="add_down_list">

                <?php echo form_open(); ?>

                <?php echo validation_errors('<div class="error">', '</div>'); ?>

                <table width="900" border="0" align="center" cellpadding="5" cellspacing="0">

                    <?php $pos_1 = $this->Flinks->getPosHeadByID(1); ?>
                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title"><strong>Position 1 :</strong></div></td>
                        <td  width="225" height="25" align="left"><div class="table_blank">
                                <?php
                                echo form_input(array('name' => 'name', 'id' => 'name_1', 'value' => $pos_1->name));
                                ?>
                            </div>
                        </td>
                        <td align="left">
                            <div align="left">
                                <a href="#" class="edit" rel="name_1">Edit</a>

                                <!-- 
                                <a id="submit" href="<?php echo base_url(); ?>flink/edit_posotion_heading/<?php echo $pos_1->id; ?>">Edit</a>

                                -->

                            </div>
                        </td>   
                    </tr>

                    <?php $pos_2 = $this->Flinks->getPosHeadByID(2); ?>
                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title"><strong>Position 2 :</strong></div></td>
                        <td  width="225" height="25" align="left"><div class="table_blank">
                                <?php
                                echo form_input(array('name' => 'name', 'id' => 'name_2', 'value' => $pos_2->name));
                                ?>
                            </div>
                        </td>
                        <td align="left">
                            <div align="left">
                                <a href="#" class="edit" rel="name_2">Edit</a>
                            </div>
                        </td>   
                    </tr>

                    <?php $pos_3 = $this->Flinks->getPosHeadByID(3); ?>
                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title"><strong>Position 3 :</strong></div></td>
                        <td  width="225" height="25" align="left"><div class="table_blank">
                                <?php
                                echo form_input(array('name' => 'name', 'id' => 'name_3', 'value' => $pos_3->name));
                                ?>
                            </div>
                        </td>
                        <td align="left">
                            <div align="left">
                                <a href="#" class="edit" rel="name_3">Edit</a>
                            </div>
                        </td>   
                    </tr>

                    <tr>
                        <td align="right">&nbsp;</td>
                        <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right">&nbsp;</td>
                        <td cols="2" align="center">
                            <label>
                                <a id="submit" href="<?php echo base_url(); ?>flink">Back To Footer Link</a>
                            </label>
                        </td>
                        <td align="right">&nbsp;</td>

                    </tr>

                </table>

                <?php echo form_close(); ?>

            </div>

        </div>

    </div>

</div>
<?php $this->load->view('home/footer'); ?>


<script type="text/javascript">

    $(function() {

        $('.edit').click(function(e) {
            e.preventDefault();
            var ids = $(this).attr('rel');
            var name = $('#' + ids).val();
            var array = ids.split('_');
            var id = array[1];

            //get input data as a array
            var post_data = {
                'name': name,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            };

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>flink/edit_posotion_heading/" + id,
                data: post_data,
                success: function(message) {
                    // return success message to the id='result' position
                    $("#result").html(message);
                }
            });

        });


    });

</script>