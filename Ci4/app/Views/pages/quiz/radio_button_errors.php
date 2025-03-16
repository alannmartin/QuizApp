<?= $this->extend('layouts/template'); ?>

<?= $this->section('title'); ?>Please try again<?=$this->endSection();?>

<?=$this->section('content'); ?>

<?php

 //display error message to the user - Try Again
  if(isset($message))
  {
    echo $message;
  }

/* use an anchor link instead of a button  to submit the results to the database */
$data = array('class' => 'w3-button w3-mobile w3-center w3-large w3-round w3-blue','title' => 'Try Again');
echo '<p class="w3-container w3-center w3-margin">'.anchor(base_url() . '/','Try Again',$data).'</p>'; ?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?= $this->endSection(); ?>