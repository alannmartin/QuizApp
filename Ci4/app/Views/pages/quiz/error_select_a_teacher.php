<?= $this->extend('layouts/template'); ?>

<?= $this->section('title'); ?>Please try again<?=$this->endSection();?>

<?=$this->section('content'); ?>

<h4 class="w3-container w3-center">Please select your Teacher</h4>


<div class="w3-bar w3-center w3-mobile">
    <?php
    echo form_open('/');
     echo form_submit('','Try Again','class= "w3-margin w3-mobile w3-button w3-red w3-text-white w3-round"');
    echo form_close();
    ?>
</div>

<?=$this->endSection();?>
