<?= $this->extend('layouts/template'); ?>

<?= $this->section('title'); ?>Edit Quiz<?=$this->endSection();?>

<?=$this->section('content'); ?>

<section class="w3-container">
<!--#d9edf7-->
<br>

<div class="w3-container w3-margin w3-padding">

<h3 class="w3-center">Edit Question and Answers</h3>

<?php $this->session = \Config\Services::session();?>

<div class="w3-text-green w3-center">
    <?= $this->session->getFlashdata('message');?>
</div>

<?php
if (!empty($query)) {
    foreach($query->getResult() as $row)
    { ?>

        <!-- Saves changes to the tbl_quiz table -->
        <form action ="<?=base_url('quiz/update/'.$row->quizID); ?>" method="POST" >

            <div>
                <input class="w3-input w3-text-black" type="text" name="question" required placeholder = "The question"
                    value="<?= $row->question;?>"/>
            </div>
            <div>
                <input class="w3-input w3-text-blue-gray" type="text" name="choice1" placeholder = "Option A"
                    value="<?= $row->choice1;?>"/>
            </div>
            <div>
                <input class="w3-input w3-text-blue-gray" type="text" name="choice2" required placeholder = "Option B"
                    value="<?= $row->choice2;?>"/>
            </div>
            <div>
                <input class="w3-input w3-text-blue-gray" type="text" name="choice3" required placeholder = "Option C"
                       value="<?= $row->choice3;?>"/>
            </div>
            <div>
                <input class="w3-input w3-text-blue-gray" name="choice4" required placeholder = "Option D"
                    value="<?=$row->choice4;?>"/>
            </div>
            <div>
                <input class="w3-input w3-text-blue-gray" name="answer" required placeholder = "Correct Answer"
                    value="<?= $row->answer;?>"/>
            </div>
            <div>
                <input input type="hidden" name="quizID_id" value="<?=$row->quizID;?>"/>
            </div>
           <br>
            <div>
                <button class="w3-button w3-khaki w3-round" type="submit" >Update</button>
            </div>
        </form>

    <?php

        }
}
?>

</div>
    <br>
</section>

<?= $this->endSection(); ?>