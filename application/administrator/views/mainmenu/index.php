<?php $this->load->view('home/head'); ?>

<div align="center" style="height:40px;">
    <?php $this->load->view('home/menu'); ?>
</div>

<div class="mid_body">
    <div align="center">
        <div class="inner_mid" >
            <div class="top_bar" >

                <div class="top_bar_left"> Main Menu </div>
                <div class="top_bar_right">

                    <div class="top_menu">
                        <ul>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/mainmenu/add" id="add"  title="Add new Main Menu"  ><img src="<?php echo base_url(); ?>image/new.jpg" title="Add new" />
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
            if ($this->session->flashdata('item_name')) {
                ?>
                <div class="ok">   <?php echo$this->session->flashdata('item_name'); ?>  </div>
            <?php } ?>

            <div class="down_list">

                <table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">

                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Menu Name</th>
                            <th>Page Template</th>
                            <th>Serial</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>Publish</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $sl = 1;
                        foreach ($main_menus as $menu):
                            if ($sl % 2 == 0) {
                                $cl = "even gradeC";
                            } else {
                                $cl = "odd gradeX";
                            }
                            ?>

                            <tr class="<?php echo $cl; ?>">
                                <td><?php echo $sl; ?></td>
                                <td><?php echo $menu['name']; ?></td>
                                <td><?php echo $menu['page_template']; ?></td>

                                <td class="center"><?php echo $menu['serial']; ?></td>
                                <td class="center"><?php
                                    if ($menu['status'] == '1') {
                                        echo "Active";
                                    }
                                    if ($menu['status'] == '0') {
                                        echo "Inactive";
                                    }
                                    ?>
                                </td>

                                <td class="center">
                                    <a href="<?php echo base_url(); ?>index.php/mainmenu/edit/<?php echo $menu['id']; ?>" onClick="return confirm('Are you sure?');">
                                        <img src="<?php echo base_url(); ?>image/edit.png" width="15" height="16" border="0" /></a>
                                </td>

                                <td class="center">
                                    <a href="<?php echo base_url(); ?>index.php/mainmenu/delete/<?php echo $menu['id']; ?>" onClick="return confirm('Are you sure?');">
                                        <img src="<?php echo base_url(); ?>image/delet.png" width="16" height="16" border="0" /></a>
                                </td>

                                <td class="center">
                                    <?php if ($menu['status'] == '0') { ?>
                                        <a href="<?php echo base_url(); ?>index.php/mainmenu/active/<?php echo $menu['id'] ?>" onClick="return confirm('Are you sure?');"><img src="<?php echo base_url(); ?>image/status.png" width="17" height="16" border="0" /></a>
                                        <?php
                                    }
                                    if ($menu['status'] == '1') {
                                        ?>

                                        <a href="<?php echo base_url(); ?>index.php/mainmenu/inactive/<?php echo $menu['id'] ?>" onClick="return confirm('Are you sure?');"><img src="<?php echo base_url(); ?>image/un_publi.png" width="17" height="16" border="0" / ></a>
                                    <?php } ?>
                                </td>

                            </tr>

                            <?php
                            $sl++;
                        endforeach;
                        ?>

                    </tbody>

                    <tfoot></tfoot>

                </table>

            </div>

        </div>
    </div>

</div>

<?php $this->load->view('home/footer'); ?>