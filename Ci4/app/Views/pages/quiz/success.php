<?= $this->extend('layouts/template'); ?>

<?= $this->section('title'); ?>Success<?=$this->endSection();?>

<?=$this->section('content'); ?>


<h4 class="w3-center">Thank you for taking this quiz!</h4>


<div class="w3-bar w3-center w3-mobile">
    <?php
        echo form_open('/');
            echo form_submit('submit','Home','class= "w3-margin w3-mobile w3-button w3-black w3-text-white w3-round"');
        echo form_close();
        ?>
</div>

<?= $this->endSection(); ?>


