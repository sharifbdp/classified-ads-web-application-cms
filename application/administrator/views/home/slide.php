<script type="text/javascript">
    $(function(){

        // Accordion
        $("#accordion").accordion({ header: "h3" });
				
        //hover states on the static widgets
        $('#dialog_link, ul#icons li').hover(
        function() { $(this).addClass('ui-state-hover'); }, 
        function() { $(this).removeClass('ui-state-hover'); }
    );
				
    });
</script>
<style type="text/css">
    /*demo page css*/
    /*body{ font: 62.5% "Trebuchet MS", sans-serif; margin: 50px;}*/
    h3 { text-align:left; } 
    .demoHeaders { margin-top: 2em; }
    #dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
    #dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
    ul#icons {margin: 0; padding: 0;}
    ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
    ul#icons span.ui-icon {float: left; margin: 0 4px;}
</style>



<?php
$user_name = $this->session->userdata('username');
?>

<div id="accordion">
    <div>
        <h3><a href="#">Logged In Users</a></h3>
        <div style="text-align: left; font-size: 12px;">
            <?php echo $user_name; ?>   
        </div>
    </div>

    <div>
        <h3><a href="#">Logged User Information</a></h3>
        <div style="text-align: left; font-size: 12px;">
            <?php
            $log_user = $this->Users->viewUser($this->session->userdata('uid'));
            ?>
            <strong>Login Date:</strong>&nbsp; <?php echo $log_user->last_login_date; ?><br/>
            <strong>Login IP:</strong> &nbsp;<?php echo $log_user->last_login_ip; ?>

        </div>
    </div>

</div>


