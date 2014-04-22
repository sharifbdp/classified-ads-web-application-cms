<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Admin Panel</title>

        <link href="<?php echo base_url(); ?>image/weekend_party.jpeg" rel="shortcut icon" type="image/jpeg" />
        <!-- png fixer-->
        <!--[if lt IE 7]>
                <script type="text/javascript" src="<?php echo base_url(); ?>unitpngfix.js"></script>
        <![endif]--> 
        <!-- png fixer  -->

        <link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>css/inner.css" rel="stylesheet" type="text/css" />
        <link type="text/css" href="<?php echo base_url(); ?>css/smoothness/jquery-ui-1.8.4.custom.css" rel="stylesheet" />

        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.8.23.custom.min.js"></script>

        <!-- Datatables Style/JS -->
        <style type="text/css" title="currentStyle">
            @import "<?php echo base_url(); ?>datatables/css/jquery.dataTables_themeroller.css";
        </style>

        <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>datatables/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#example').dataTable({
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers"
                });
            });
        </script>
        <!-- Datatables Style/JS -->

    </head>

    <body>

        <div>

            <div class="login_body">

                <!-- Top Head Section Start -->
                <div class="head"> 

                    <div class="head_left">

                        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>image/company_name.jpg" border="0" /></a><small style="color:#666666">V2.2 </small>  </div>

                    <div class="head_right"> 
                        <div class="head_right_web_home"><a href="<?php echo base_url(); ?>../" title="Web Home"><img src="<?php echo base_url(); ?>image/world.png" border="0" /></a></div>
                        <div class="head_right_admin_home"><a href="<?php echo base_url(); ?>" title="Admin Home"> <img src="<?php echo base_url(); ?>image/web_home.png"  border="0"/></a></div>
                        <div class="head_right_log"><a href="<?php echo base_url(); ?>login/logout" title="Logout"> <img src="<?php echo base_url(); ?>image/log_out.png" border="0" /></a></div>

                        <div class="clear"> </div>
                    </div>
                    <div class="clear"> </div>

                </div>
                <div class="head_border">  </div>
                <!-- Top Head Section End -->

            </div>

        </div>
