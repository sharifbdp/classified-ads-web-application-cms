<?php $this->load->view('home/head'); ?>


<div align="center" style="height:40px;">
    <?php $this->load->view('home/menu'); ?>
</div>

<div class="mid_body">
    <div align="center">
        <div class="inner_mid" >
            <div class="top_bar" >

                <div class="top_bar_left"> View Advertisement </div>
                <div class="top_bar_right">
                    <div class="top_menu"></div>
                </div>
                <div class="clear"> </div>
            </div>

            <div class="add_down_list">

                <table width="900" border="0" align="center" cellpadding="5" cellspacing="0">

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title"><strong>Ad Title :</strong> </div></td>
                        <td height="25" align="left">
                            <div class="table_blank">
                                <?php echo $content->title; ?>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title" ><strong>Ad Details :</strong> </div></td>
                        <td height="25" align="left"><div class="table_blank">
                                <?php echo $content->details; ?>
                            </div></td>
                    </tr>

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title" ><strong>Category name :</strong> </div></td>
                        <td height="25" align="left"><div class="table_blank">
                                <?php echo $content->cat_name; ?>
                            </div></td>
                    </tr>

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title"><strong>Ad Price :</strong> </div></td>
                        <td height="25" align="left"><div class="">
                                <?php echo "USD " . $content->price;?>
                                <?php echo ($content->negotiable == 1) ? " (Negotiable)" : ""; ?>
                            </div></td>
                    </tr>

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title"><strong>Ad Location/City :</strong> </div></td>
                        <td height="25" align="left"><div class="">
                                <?php echo $content->location . " &rsaquo; " . $content->city; ?>
                            </div></td>
                    </tr>

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title"><strong>Why this ad :</strong> </div></td>
                        <td height="25" align="left"><div class="">
                                <?php echo ($content->for_what == 1) ? "For Sale" : "Wanted"; ?>
                            </div></td>
                    </tr>

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title"><strong>Ad Type :</strong> </div></td>
                        <td height="25" align="left"><div class="">
                                <?php echo ($content->type == 1) ? "Private" : "Business"; ?>
                            </div></td>
                    </tr>
                    
                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title"><strong>Ad Entry Date :</strong> </div></td>
                        <td height="25" align="left"><div class="">
                                <?php echo $content->entry_date; ?>
                            </div></td>
                    </tr>

                    <tr>
                        <td width="225" height="25">  <div align="right" class="table_title " ><strong>Ad Image:</strong> </div></td>
                        <td height="25" align="left">
                            <?php
                            $ad_img_list = $this->Ads->get_all_ad_image_by_ad_id($content->id);
                            if (!empty($ad_img_list)) {
                                foreach ($ad_img_list as $list) { ?>
                                    <div class="image_list">
                                        <img src="<?php echo base_url('../uploads/ad_image/' . $list['image_name']); ?>" width="115" height="82" style="border: 1px solid #e4e4e4;">
                                    </div>
                                <?php }
                            }
                            ?>
                       </td>
                    </tr>
                    
                    <tr>
                        <td colspan="2"><hr></td>
                    </tr>
                    
                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title"><strong>Ad Poster Name :</strong> </div></td>
                        <td height="25" align="left">
                                <?php echo $content->poster_name; ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title"><strong>Ad Poster Email :</strong> </div></td>
                        <td height="25" align="left">
                                <?php echo $content->poster_email; ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title"><strong>Ad Poster Phone :</strong> </div></td>
                        <td height="25" align="left">
                                <?php echo $content->poster_phone; ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td width="225" height="25"> <div align="right" class="table_title " ><strong>Status:</strong><br />
                            </div></td>
                        <td height="25" align="left">
                            <?php
                                if ($content->status == '1') {
                                    echo "<span style='color:green;'>Ad Published</span>";
                                }
                                if ($content->status == '0') {
                                    echo "<span style='color:#000;'>Pending for review...</span";
                                }
                                if ($content->status == '5') {
                                    echo "<span style='color:red;'>Incomplete</span>";
                                }
                                if ($content->status == '7') {
                                    echo "<span style='color:#428BCA;'>Ad Unpublished</span>";
                                }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td align="right">&nbsp;</td>
                        <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right">
                            <a href="<?php echo base_url(); ?>index.php/ad/delete/<?php echo $content->id; ?>" onClick="return confirm('Do you sure to delete this item?');">
                                <button>Delete</button>
                            </a>
                        </td>
                        
                        <td align="left">
                             <?php if ($content->status == '0' || $content->status == '7') { ?>
                                <a href="<?php echo base_url(); ?>index.php/ad/active/<?php echo $content->id; ?>" onClick="return confirm('Do you sure to active/publish this Advertizement?');">
                                    <button>Publish</button>
                                </a>
                                <?php
                            }
                            if ($content->status == '1') {
                                ?>
                                <a href="<?php echo base_url(); ?>index.php/ad/inactive/<?php echo $content->id; ?>" onClick="return confirm('Do you sure to inactive/unpublish this Advertizement?');">
                                    <button>Unpublish</button>
                                </a>
                            <?php } ?>
                        </td>
                    </tr>
                           
                </table>

                <?php echo form_close(); ?>

            </div>

        </div>

    </div>

</div>

<?php $this->load->view('home/footer'); ?>