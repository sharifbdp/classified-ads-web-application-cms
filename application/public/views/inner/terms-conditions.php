<?php $this->load->view('common/header'); ?>

    <body class='help help help-privacy_policy'>

       <?php $this->load->view('common/top_menu'); ?>

        <div id='site-content'>
            <div class='wrap'>
                <div class='inner-box'>
                    <?php 
                    if(!empty($content->head_line)){ echo "<h1>{$content->head_line}</h1>"; }
                    ?>
                    <?php 
                    if(!empty($content->details)){
                        echo $content->details;
                    }
                    ?>
                </div>
            </div>
        </div>
        
<?php $this->load->view('common/footer'); 