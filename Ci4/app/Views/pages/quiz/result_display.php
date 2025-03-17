<?= $this->extend('layouts/template'); ?>

<?= $this->section('title'); ?>Results Page<?=$this->endSection();?>

<?=$this->section('content'); ?>

<section class="w3-container w3-mobile w3-center">

    <div class="w3-container w3-center w3-white">

    <h1>Your Results</h1>

    <?php $score = 0; ?>

    <!-- Must use 8 arrays e.g. one for the posted $ans and the others for the rows in the quiz_questions table -->
    <?php $array1 = array(); //for the posted $ans ?>
    <?php $array2 = array(); //for the row answer ?>
    <?php $array3 = array(); //for the row quizID ?>
    <?php $array4 = array(); //for the row question ?>
    <?php $array5 = array(); //for the row choice1 ?>
    <?php $array6 = array(); //for the row choice2 ?>
    <?php $array7 = array(); //for the row choice3 ?>
    <?php $array8 = array(); //for the row choice4 ?>


    <?php  if(isset($posted))
    {
       foreach($posted as $ans)
       { ?>
        <?php  $array1[] = $ans;
       }
    }?>

    <?php  if(isset($results))
    {
        //var_dump($results);
        foreach($results as $row)
        {
          //push a $row onto a new array
          $array2[] = $row['answer'];
          $array3[] = $row['quizID'];
          $array4[] = $row['question'];
          $array5[] = $row['choice1'];
          $array6[] = $row['choice2'];
          $array7[] = $row['choice3'];
          $array8[] = $row['choice4'];
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
        //$row['quizID'] . $row['question']
        if(isset($array3[$x]) AND isset($array4[$x]))
        {?>
            <p class="w3-container w3-left"><?=$array3[$x]?> . <?=$array4[$x]?></p><?php
        }?>
     <!--------------------------------------------------------------------------------------------------->
      <?php
      //check if these values are set: e.g $row['answer'](database answer) != $row['ans'](posted ans)
      if(isset($array2[$x]) AND isset($array1[$x]))
      {?>
          <?php
          //$row['answer'](database answer) != $row['ans'](posted ans)
          if ($array2[$x] != $array1[$x])
          { ?>
              <img src="<?= base_url('assets/images/wrong.png');?>" alt="Wrong Answer">  <?php
          }
          else
          { ?>
             <img src="<?= base_url('assets/images/tick.png');?>" alt="Correct Answer">
             <?php $score = $score + 1;
             $this->session = \Config\Services::session();
             $this->session->set('score', $score);
          }
      } ?>

   <!------------------------------------------------------------------------------------------------------>
  <?php
  }?>

    <div class="w3-container w3-center">
        <h2>Your Score: </h2>
        <h1><?php echo $score?>/5</h1>

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