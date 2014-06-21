<?php $this->load->view('home/head'); ?>

<div align="center" style="height:40px;">

    <?php $this->load->view('home/menu'); ?>

</div>

<div class="mid_body">
    <div align="center">
        <div class="inner_mid">

            <div class="top_bar">

                <div class="top_bar_left"> Add New Ad </div>
                <div class="top_bar_right">

                    <div class="top_menu"> </div>

                </div>
                <div class="clear"> </div>
            </div>

            <div class="add_down_list">

                <?php echo validation_errors('<div class="error">', '</div>'); ?>
                <?php echo form_open_multipart(''); ?>

                <table width="900" border="0" align="center" cellpadding="5" cellspacing="0">

                    <tr>
                        <td width="225" height="25"> <div align="right" class="table_title " ><strong>Select Category:</strong><br />
                            </div></td>
                        <td height="25" align="left"> 
                            <select name="cid" autocomplete="off">
                                <option value="">Select a Category ...</option>
                                <?php $this->Ads->getTreeCategory(0, 0); ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td width="225" height="25"> <div align="right" class="table_title " ><br />
                            </div></td>
                        <td height="25" align="left">
                            <div class="table_blank_radio" style="width:225px" align="left">
                                <label>
                                    <?php echo form_radio(array('name' => 'for_what', 'value' => '1',)); ?>
                                    For Sale
                                </label>
                                <label>
                                    <?php echo form_radio(array('name' => 'for_what', 'value' => '2',)); ?>
                                    Wanted
                                </label>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td width="225" height="25"> <div align="right" class="table_title " ><strong>Select Brand:</strong><br />
                            </div></td>
                        <td height="25" align="left"> 
                            <select required="required" prompt="Select brand" name="car_brand" id="car_brand" style="width: 225px;">
                                <option value="">Select brand</option>
                                <option value="alfa-romeo">Alfa Romeo</option>
                                <option value="audi">Audi</option>
                                <option value="bmw">BMW</option>
                                <option value="buick">Buick</option>
                                <option value="cadillac">Cadillac</option>
                                <option value="changan">Changan</option>
                                <option value="chery">Chery</option>
                                <option value="chevrolet">Chevrolet</option>
                                <option value="chrysler">Chrysler</option>
                                <option value="citroen">Citroën</option>
                                <option value="daewoo">Daewoo</option>
                                <option value="daihatsu">Daihatsu</option>
                                <option value="datsun">Datsun</option>
                                <option value="dodge">Dodge</option>
                                <option value="ferrari">Ferrari</option>
                                <option value="fiat">Fiat</option>
                                <option value="ford">Ford</option>
                                <option value="geely">Geely</option>
                                <option value="gmc">GMC</option>
                                <option value="hino">Hino</option>
                                <option value="honda">Honda</option>
                                <option value="hummer">Hummer</option>
                                <option value="hyundai">Hyundai</option>
                                <option value="infiniti">Infiniti</option>
                                <option value="isuzu">Isuzu</option>
                                <option value="jaguar">Jaguar</option>
                                <option value="jeep">Jeep</option>
                                <option value="kia">Kia</option>
                                <option value="lamborghini">Lamborghini</option>
                                <option value="land-rover">Land Rover</option>
                                <option value="lincoln">Lincoln</option>
                                <option value="lexus">Lexus</option>
                                <option value="maruti">Maruti</option>
                                <option value="maruti-suzuki">Maruti Suzuki</option>
                                <option value="mazda">Mazda</option>
                                <option value="mercedes-benz">Mercedes-Benz</option>
                                <option value="mg">MG</option>
                                <option value="mini">Mini</option>
                                <option value="mitsubishi">Mitsubishi</option>
                                <option value="moto-guzzi">Moto Guzzi</option>
                                <option value="nissan">Nissan</option>
                                <option value="oldsmobile">Oldsmobile</option>
                                <option value="opel">Opel</option>
                                <option value="peugeot">Peugeot</option>
                                <option value="plymoth">Plymouth</option>
                                <option value="pontiac">Pontiac</option>
                                <option value="porsche">Porsche</option>
                                <option value="proton">Proton</option>
                                <option value="renault">Renault</option>
                                <option value="rover">Rover</option>
                                <option value="royal-enfield">Royal Enfield</option>
                                <option value="saab">SAAB</option>
                                <option value="saturn">Saturn</option>
                                <option value="scion">Scion</option>
                                <option value="seat">SEAT</option>
                                <option value="skoda">Skoda</option>
                                <option value="smart">Smart</option>
                                <option value="ssang-yong">Ssang Yong</option>
                                <option value="subaru">Subaru</option>
                                <option value="suzuki">Suzuki</option>
                                <option value="tata">Tata</option>
                                <option value="toyota">Toyota</option>
                                <option value="vauxhall">Vauxhall</option>
                                <option value="volkswagen">Volkswagen</option>
                                <option value="volvo">Volvo</option>
                                <option value="other">Other</option>
                            </select>
                            <?php
                            echo form_input(array('name' => 'name', 'id' => 'name', 'value' => set_value('name')));
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title"><strong>Ad Name :</strong> </div></td>
                        <td height="25" align="left"><div class="table_blank">
                                <?php
                                echo form_input(array('name' => 'name', 'id' => 'name', 'value' => set_value('name')));
                                ?>
                            </div></td>
                    </tr>

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title" ><strong>Ad Alias:</strong> </div></td>
                        <td height="25" align="left"><div class="table_blank">
                                <?php
                                echo form_input(array('name' => 'alias', 'id' => 'alias', 'value' => set_value('alias'), 'size' => '40'))
                                ?> &nbsp; ( Don't use any special character. Use <strong>-</strong> between the word )
                            </div></td>
                    </tr>



                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title"><strong>Ad Price :</strong> </div></td>
                        <td height="25" align="left"><div class="">
                                <?php
                                echo form_input(array('name' => 'price', 'id' => 'price', 'value' => set_value('price'), 'size' => '8'));
                                ?>
                            </div></td>
                    </tr>

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title"><strong>Blouse Price :</strong> </div></td>
                        <td height="25" align="left"><div class="">
                                <?php
                                echo form_input(array('name' => 'b_price', 'id' => 'b_price', 'value' => set_value('b_price'), 'size' => '6'));
                                ?>
                            </div></td>
                    </tr>

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title"><strong>Ad Code :</strong> </div></td>
                        <td height="25" align="left">
                            <div class="">
                                <?php
                                echo form_input(array('name' => 'p_code', 'id' => 'p_code', 'value' => set_value('p_code'), 'size' => '10'));
                                ?>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td width="225" height="25"><div align="right" class="table_title"><strong>Custom Link/URL :</strong> </div></td>
                        <td height="25" align="left"><div class="table_blank">
                                <?php
                                echo form_input(array('name' => 'custom_link', 'id' => 'custom_link', 'value' => set_value('custom_link')));
                                ?>  &nbsp; ( Please include <strong>http:// </strong>bofore you link )
                            </div></td>
                    </tr>

                    <tr> 
                        <td width="225" height="25">  <div align="right" class="table_title " ><strong>Ad Image:</strong> </div></td>
                        <td height="25" align="left"> 
                            <div class="" >
                                <?php
                                echo form_upload(
                                        array(
                                            'name' => 'upload_files',
                                            'id' => 'upload_files',
                                            'value' => set_value('upload_files'),
                                            'size' => '25'
                                        )
                                );
                                ?> <i style="font-weight: bold;">( width: 636px , Height: 960px )</i>

                            </div>

                        </td>
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
                        <td width="225" height="25"> <div align="right" class="table_title " ><strong>Summary:</strong><br />
                            </div></td>
                        <td height="25" align="left">&nbsp;</td>
                    </tr>

                    <tr>
                        <td colspan="2" >
                            <div class="add_details">
                                <?php echo $this->ckeditor->editor("summary", html_entity_decode(set_value('summary'))); ?>
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
                                <?php echo $this->ckeditor->editor("details", html_entity_decode(set_value('details'))); ?>
                            </div>
                        </td>
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
<script typr="text/javascript">
    $(function() {
        $("#name").keyup(function() {
            var alias = $(this).val();

            alias = alias.toLowerCase();

            alias = alias.replace(" ", "-");
            alias = alias.replace(" ", "-");
            alias = alias.replace(" ", "-");
            alias = alias.replace("`", "-");
            alias = alias.replace("~", "-");
            alias = alias.replace("!", "-");
            alias = alias.replace("@", "-");
            alias = alias.replace("#", "-");
            alias = alias.replace("%", "-");
            alias = alias.replace("^", "-");
            alias = alias.replace("&", "-");
            alias = alias.replace("*", "-");
            alias = alias.replace("(", "-");
            alias = alias.replace(")", "-");
            alias = alias.replace("{", "-");
            alias = alias.replace("}", "-");
            alias = alias.replace("_", "-");
            alias = alias.replace("+", "-");
            alias = alias.replace("|", "-");
            alias = alias.replace("/", "-");
            alias = alias.replace(".", "-");
            alias = alias.replace("'", "-");
            alias = alias.replace('"', "-");

            $("#alias").val(alias);

        });
    });
</script> 
<?php $this->load->view('home/footer'); ?>