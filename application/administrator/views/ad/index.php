<?php $this->load->view('home/head'); ?>
<div align="center" style="height:40px;">
    <?php $this->load->view('home/menu'); ?>
</div>
<div class="mid_body">
    <div align="center">
        <div class="inner_mid" >

            <div class="top_bar" >

                <div class="top_bar_left" > Ad Management </div>
                <div class="top_bar_right">

                    <div class="top_menu">
                        <ul>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/ad/add" id="add"  title="Add in Website"  ><img src="<?php echo base_url(); ?>image/new.jpg" title="Add new" />
                                    <p> New </p>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:history.go(-1);" title="Go Back">
                                    <img src="<?php echo base_url(); ?>image/goback.png" width="32" height="32" border="0" />
                                    <p> Go Back </p>
                                </a>
                            </li>
                            <div class="clear"> </div>
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <?php
            if ($this->session->flashdata('name')) {
                ?>
                <div class="ok"><?php echo$this->session->flashdata('name'); ?></div>
            <?php } ?>
            <div class="down_list">

                <table width="96%" border="0" align="center" cellpadding="1" cellspacing="0" style="color:#333333">
                    <tr style="font-weight:bold; background:url(image/table_top_bg.jpg) repeat-x top #E0E0E0; border:#AFAFAF solid 1px;">
                        <td width="10" height="25" class="table_border" style="border-right:none;" ><div align="center" class="style2">#</div></td>
                        <td width="110" height="25" class="table_border" style="border-right:none;"><div align="center" class="style2">Title</div></td>
                        <td width="60" height="25" class="table_border" style="border-right:none;"><div align="center" class="style2">Category</div></td>
                        <td width="40" height="25" class="table_border" style="border-right:none;"><div align="center" class="style2">Price</div></td>
                        <td width="40" height="25" class="table_border" style="border-right:none;"><div align="center" class="style2">Entry date</div></td>
                        <td width="40" height="25" class="table_border" style="border-right:none;"><div align="center" class="style2">Status</div></td>
                        <td width="40" height="25" class="table_border" style="border-right:none;"><div align="center" class="style2">Delete</div></td>
                        <td width="40" height="25" class="table_border"><div align="center" class="style2">Publish</div></td>
                    </tr>

                    <?php
                    $cl = "#F1F1F1";
                    $sl = 1;
                    foreach ($content as $per_content):
                        if ($cl == "#F1F1F1") {
                            $cl = "#FFFFFF";
                        } else {
                            $cl = "#F1F1F1";
                        }
                        ?>

                        <tr bgcolor="<?php echo $cl; ?>">
                            <td width="33" bordercolor="#ff0000"  class="table_border" style="border-top:none; border-right:none;"><div align="center">
                                    <?php echo $sl; ?>
                                </div>
                            </td>
                            <td height="25" align="left" bordercolor="#FF0000"  class="table_border" style="border-top:none; border-right:none; padding-left:5px;">
                                <a href="<?php echo base_url('ad/view/' . $per_content['id']);?>"><?php echo $per_content['title']; ?></a>
                            </td>
                            <td height="25" align="center" bordercolor="#FF0000"  class="table_border" style="border-top:none; border-right:none; padding-left:5px;">
                                <?php
                                $cid = $per_content['cate_1'];
                                if (!empty($cid)) {
                                    $category_details = $this->Categorys->getCategory($cid);
                                    echo $category_details->name;
                                }
                                ?>
                            </td>
                            <td height="25" align="center" bordercolor="#FF0000"  class="table_border" style="border-top:none; border-right:none; padding-left:5px;">
                                <?php echo $per_content['price']; ?>
                            </td>
                            <td height="25" align="center" bordercolor="#FF0000"  class="table_border" style="border-top:none; border-right:none; padding-left:5px;">
                                <?php echo $per_content['entry_date']; ?>
                            </td>
                            <td height="25" bordercolor="#FF0000" class="table_border" style="border-top:none; border-right:none;"><div align="center">
                                    <?php
                                    if ($per_content['status'] == '1') {
                                        echo "<span style='color:green;'>Ad Published</span>";
                                    }
                                    if ($per_content['status'] == '0') {
                                        echo "<span style='color:#000;'>Pending ...</span";
                                    }
                                    if ($per_content['status'] == '5') {
                                        echo "<span style='color:red;'>Incomplete</span>";
                                    }
                                    if ($per_content['status'] == '7') {
                                        echo "<span style='color:#428BCA;'>Ad Unpublished</span>";
                                    }
                                    ?>
                                </div>
                            </td>

                            <td height="25" bordercolor="#FF0000" class="table_border" style="border-top:none; border-right:none;"><div align="center">
                                    <a href="<?php echo base_url(); ?>index.php/ad/delete/<?php echo $per_content['id']; ?>" onClick="return confirm('Do you sure to delete this item?');">
                                        <img src="<?php echo base_url(); ?>image/delet.png" width="16" height="16" border="0" /></a>
                                </div>
                            </td>
                            <td height="25" bordercolor="#FF0000" class="table_border" style="border-top:none; "><div align="center">
                                    <?php if ($per_content['status'] == '0' || $per_content['status'] == '7') { ?>
                                        <a href="<?php echo base_url(); ?>index.php/ad/active/<?php echo $per_content['id']; ?>" onClick="return confirm('Do you sure to active/publish this Advertizement?');"><img src="<?php echo base_url(); ?>image/un_publi.png" width="17" height="16" border="0" /></a>
                                        <?php
                                    }
                                    if ($per_content['status'] == '1') {
                                        ?>

                                        <a href="<?php echo base_url(); ?>index.php/ad/inactive/<?php echo $per_content['id']; ?>" onClick="return confirm('Do you sure to inactive/unpublish this Advertizement?');"><img src="<?php echo base_url(); ?>image/status.png" width="17" height="16" border="0" / ></a>
                                    <?php } ?>
                                </div>
                            </td>
                        </tr>

                        <?php
                        $sl++;
                    endforeach;
                    ?>

                </table>

                <div align="center">
                    <?php
                    echo $this->pagination->create_links();
                    ?>
                </div>

            </div>

        </div>
    </div>

</div>



<?php $this->load->view('home/footer'); ?>
