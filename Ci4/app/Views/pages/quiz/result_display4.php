<?= $this->extend('layouts/template'); ?>

<?= $this->section('title'); ?>Results Page<?=$this->endSection();?>

<?=$this->section('content'); ?>
<section class="w3-container w3-mobile w3-center">

    <div class="w3-container w3-center w3-white">

        <h1>Your Results</h1>

    <?php $score = 0; ?>

    <?php $array16 = array(); ?>
    <?php $array17 = array(); ?>
    <?php $array18 = array(); ?>
    <?php $array19 = array(); ?>
    <?php $array20 = array(); ?>
    <?php $array21 = array(); ?>
    <?php $array22 = array(); ?>
    <?php $array23 = array(); ?>


    <?php  if(isset($posted))
    {
        foreach($posted as $ans)
        { ?>
            <?php  $array16[] = $ans;
        }
    }?>

    <?php  if(isset($results))
    {
        //var_dump($results);
        foreach($results as $row)
        {
            //push a $row onto a new array
            $array17[] = $row['answer'];
            $array18[] = $row['quizID'];
            $array19[] = $row['question'];
            $array20[] = $row['choice1'];
            $array21[] = $row['choice2'];
            $array22[] = $row['choice3'];
            $array23[] = $row['choice4'];
        }

    }
    ?>

    <div class="w3-container w3-margin w3-padding w3-display-middle w3-border w3-white">
    <?php
    for ($x=0; $x <=5; $x++)
    { ?>

        <form method="post" action="<?= base_url();?>quiz/find_teacher">
        <br><br>
        <?php
        if(isset($array18[$x]) AND isset($array19[$x]))
        {?>
            <p class="w3-container w3-left"><?php echo $array18[$x]?>.<?= $array19[$x]?></p><?php
        }?>

        <?php
        if(isset($array17[$x]) AND isset($array16[$x]))
        {?>

        <?php if ($array17[$x] != $array16[$x])
        { ?>
            <!--<p><span style="background-color: #FF9C9E"><?//=$array16[$x]?></span></p>-->
            <!--<p><span style="background-color: #ADFFB4"><?//=//$array17[$x]?></span></p>-->
            <img src="<?= base_url('assets/images/wrong.png');?>" alt="Wrong Answer"><?php
        }
        else
        { ?>
            <!--<p><span style="background-color: #ADFFB4"><?php //echo $array16[$x]?></span></p>-->
            <img src="<?= base_url('assets/images/tick.png');?>" alt="Correct Answer">
            <?php $score = $score + 1;
            $this->session = \Config\Services::session();
            $this->session->set('score', $score);
        } ?>

<?php }

   }?>
        <div class="w3-container w3-center">
            <h2>Your Score: </h2>
            <h1><?= $score;?>/5</h1>

            <!--<input type="submit" value="Play Again!">-->
            <?php   /* use an anchor link instead of a button  to submit the results to the database */
            $data = array('class' => 'w3-button w3-mobile w3-tiny w3-round w3-border w3-black','title' => 'Submit Results');
            echo '<p class="w3-left">'.anchor(base_url().'submit_results','Submit Results',$data).'</p>'; //easier to use an anchor as a button

            /* use an anchor link instead of a button to simply close the page */
            $data = array('class' => 'w3-button w3-mobile w3-tiny w3-round w3-border w3-blue-gray','title' => 'Close');
            echo '<p class="w3-left">'.anchor(base_url() . '/','Close',$data).'</p>'; //easier to use an anchor as a button ?>
            <br><br>
    </form>
        </div>
        <br>
    </div>
</section>

<?=$this->endSection();?>