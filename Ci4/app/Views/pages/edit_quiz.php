<section class="w3-container">
<!--#d9edf7-->
<br>

<div id = "wrapper" style="width:43%; margin-left:auto;margin-right:auto;background-color:white;padding-left:2%;padding-right:2%;padding-bottom:1%;
border-left:rgb(158,169,190) 1px solid;border-top:rgb(158,169,190) 1px solid;border-right:rgb(158,169,190) 1px solid;
border-bottom:rgb(158,169,190) 1px solid;border-radius:10px;" class="w3-container">

<h3 style="text-align:center;text-decoration: underline;color:black;padding-right:5%;">Update Quiz Details</h3>

<?php $this->session = \Config\Services::session();?>

<div class="w3-text-green w3-center">
    <?= $this->session->getFlashdata('message');?>
</div>

<?php
if (!empty($query)) {
    foreach($query->getResult() as $row)
    { ?>

        <!-- Saves changes to the tbl_quiz table -->
        <form action ="<?=base_url('quiz/update/'.$row->quiz_id); ?>" method="POST" >

            <div>
                <input class="w3-input w3-text-blue-gray" type="text" name="quiz_question" required placeholder = "The question"
                    value="<?= $row->quiz_question;?>"/>
            </div>
            <div>
                <input class="w3-input w3-text-blue-gray" type="text" name="option_a" placeholder = "Option A"
                    value="<?= $row->option_a;?>"/>
            </div>
            <div>
                <input class="w3-input w3-text-blue-gray" type="text" name="option_b" required placeholder = "Option B"
                    value="<?= $row->option_b;?>"/>
            </div>
            <div>
                <input class="w3-input w3-text-blue-gray" type="text" name="option_c" required placeholder = "Option C"
                       value="<?= $row->option_c;?>"/>
            </div>
            <div>
                <input class="w3-input w3-text-blue-gray" name="option_d" required placeholder = "Option D"
                    value="<?=$row->option_d;?>"/>
            </div>
            <div>
                <input class="w3-input w3-text-blue-gray" name="correct_answer" required placeholder = "Correct Answer"
                    value="<?= $row->correct_answer;?>"/>
            </div>
            <div>
                <input input type="hidden" name="person_id" value="<?=$row->quiz_id;?>"/>
            </div>

            <br><br>
            <div>
                <button class="w3-button w3-blue w3-round w3-border" type="submit" >Update</button>
            </div>
        </form>

    <?php

        }
}
?>

</div>
    <br>
</section>