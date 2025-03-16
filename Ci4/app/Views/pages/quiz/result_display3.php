<?= $this->extend('layouts/template'); ?>

<?= $this->section('title'); ?>Results Page<?=$this->endSection();?>

<?=$this->section('content'); ?>

<section class="w3-container w3-mobile w3-center">

    <div class="w3-container w3-center w3-white">

     <h1>Your Results</h1>

    <?php $score = 0; ?>

    <?php $array11 = array(); ?>
    <?php $array12 = array(); ?>
    <?php $array13 = array(); ?>
    <?php $array14 = array(); ?>
    <?php $array15 = array(); ?>

    <?php $array16 = array(); ?>
    <?php $array17 = array(); ?>
    <?php $array18 = array(); ?>


    <?php  if(isset($posted))
    {
        foreach($posted as $ans)
        { ?>
            <?php  $array11[] = $ans;
        }
    }?>

    <?php  if(isset($results))
    {
        //var_dump($results);
        foreach($results as $row)
        {
            //push a $row onto a new array
            $array12[] = $row['answer'];
            $array13[] = $row['quizID'];
            $array14[] = $row['question'];
            $array15[] = $row['choice1'];
            $array16[] = $row['choice2'];
            $array17[] = $row['choice3'];
            $array18[] = $row['choice4'];
        }

    }
    ?>
    <div class="w3-container w3-margin w3-padding w3-display-middle w3-border w3-white">
    <?php
    for ($x=0; $x <=5; $x++)
    { ?>

    <form method="post" action="<?php echo base_url();?>quiz/find_teacher">
    <br><br>
        <?php
        if(isset($array13[$x]) AND isset($array14[$x]))
        {?>
            <p class="w3-container w3-left"><?php echo $array13[$x]?>.<?php echo $array14[$x]?></p><?php
        }?>

        <?php
        if(isset($array12[$x]) AND isset($array11[$x]))
        {?>
            <?php if ($array12[$x] != $array11[$x])
            { ?>
                <!--<p><span style="background-color: #FF9C9E"><?php //echo $array11[$x]?></span></p>-->
                <!--<p><span style="background-color: #ADFFB4"><?php //echo $array12[$x]?></span></p>-->
                <img src="<?= base_url('assets/images/wrong.png');?>" alt="Wrong Answer">  <?php
            }
            else
            { ?>
                <!--<p><span style="background-color: #ADFFB4"><?php //echo $array11[$x]?></span></p>-->
                <img src="<?= base_url('assets/images/tick.png');?>" alt="Correct Answer">
                <?php $score = $score + 1;
                $this->session = \Config\Services::session();
                $this->session->set('score', $score);
            }
        } ?>

        <?php
    }?>
        <div class="w3-container w3-center">
        <h2>Your Score: </h2>
        <h1><?= $score?>/5</h1>

        <!--<input type="submit" value="Play Again!">-->
        <?php   /* use an anchor link instead of a button  to submit the results to the database */
        $data = array('class' => 'w3-button w3-mobile w3-tiny w3-round w3-border w3-black','title' => 'Submit Results');
        echo '<p class="w3-left">'.anchor(base_url().'submit_results','Submit Results',$data).'</p>'; //easier to use an anchor as a button

        /* use an anchor link instead of a button to simply close the page */
        $data = array('class' => 'w3-button w3-mobile w3-tiny w3-round w3-border w3-blue-gray','title' => 'Close');
        echo '<p class="w3-left">'.anchor(base_url() . '/','Close',$data).'</p>'; //easier to use an anchor as a button?>
        <br><br>
    </form>
    </div>
    <br>
</div>
</section>

<?=$this->endSection();?>