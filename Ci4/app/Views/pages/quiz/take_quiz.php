<?= $this->extend('layouts/template'); ?>

<?= $this->section('title'); ?>Find Teacher<?=$this->endSection();?>

<?=$this->section('content'); ?>

<div class="w3-container w3-margin w3-padding w3-white">
        <h3 class="w3-center">Quiz</h3>
        <h6 class="w3-center">Select the best answer for each question</h6>

       <?php $this->session = \Config\Services::session();?>

        <form method ="post" action ="<?php echo base_url()?>quiz/resultDisplay"> <!-should be posting to quiz/results-->

            <?php if(isset($query)) : ?>
                <?php foreach ($query as $row) : ?>
                    <?php $ans_array = array($row['choice1'],$row['choice2'],$row['choice3'],$row['choice4']);?>
                    <?php shuffle($ans_array);?>
                    <div class="w3-container">
                        <p><u><?=$row['question'];?></u></p>
                        <!--<input name = "choice1" type="radio" value="<?//=$row['quizID'];?>"/><?//=$row['choice1'];?><br>
                        <input name = "choice2" type="radio" value="<?//=$row['quizID'];?>"/><?//=$row['choice2'];?><br>
                        <input name = "choice3" type="radio" value="<?//=$row['quizID'];?>"/><?//=$row['choice3'];?><br>
                        <input name = "choice4" type="radio" value="<?//=$row['quizID'];?>"/><?//=$row['choice4'];?><br>-->

                        <input type="radio" name ="ID<?=$row['quizID'];?>" value="<?=$ans_array[0]?>"> <?=$ans_array[0]?><br>
                        <input type="radio" name ="ID<?=$row['quizID'];?>" value="<?=$ans_array[1]?>"> <?=$ans_array[1]?><br>
                        <input type="radio" name ="ID<?=$row['quizID'];?>" value="<?=$ans_array[2]?>"> <?=$ans_array[2]?><br>
                        <input type="radio" name ="ID<?=$row['quizID'];?>" value="<?=$ans_array[3]?>"> <?=$ans_array[3]?><br>
                    </div>

                <?php endforeach ?>

            <?php endif;?>


            <br/><br/>
            <table>
                <tr>
                    <td>
                        <?php
                        echo form_submit('quiz/results','Calculate Score','class= "w3-button w3-mobile w3-tiny w3-black w3-text-white w3-round w3-border", title="Calculate Score"');

                        /* use an anchor link instead of a button */
                        $data = array('class' => 'w3-button w3-mobile w3-tiny w3-round w3-border w3-blue-grey','title' => 'Close');
                        echo anchor(base_url().'/','Close',$data); //easier to use an anchor as a button

                        ?>
                        <?php form_close();?>
                    </td>
                </tr>
            </table>

        </form>
</div>
    <br>
</section>

<?=$this->endSection(); ?>