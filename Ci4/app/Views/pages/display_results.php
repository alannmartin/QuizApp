<section class="w3-container w3-center" style="margin-left:auto;margin-right:auto;width:43%">

<?php
//if ($_POST) {   //good debugging tool, allows you to see which variables were posted
    //echo '<pre>';
    //print_r($_POST);
//}

?>
    <?php  $this->session = \Config\Services::session(); ?>

    <div class="w3-container w3-row w3-white w3-center">
        <?php
        if(isset($headline))
        {
            echo '<h5><u>'.$headline.'</u></h5>';

        }
            if($this->session->get('your_answer1') AND $this->session->get('your_answer2') AND
                $this->session->get('your_answer3') AND $this->session->get('your_answer4') AND $this->session->get('your_answer5'))
            {
                   if(isset($status))
                   {
                       echo '<p>';
                       if($status == 'Correct')
                       {
                            echo '<p class="w3-text-green">'.$status.'</p>'; ?>
                            <img src="<?=base_url('assets/images/tick.png');?>"
                                 class="w3-mobile" alt=""style="width:3%">
                           <?php
                       }
                       else
                       {
                           echo '<p class="w3-text-red">'.$status.'</p>'; ?>
                           <img src="<?=base_url('assets/images/wrong.png');?>"
                                class="w3-mobile" alt=""style="width:3%">
                           <?php
                       }
                       echo '</p>';
                       echo '<br>';
                        
                       if(isset($total_score))
                       {
                           echo 'Your total score is '.'<h5>'.$total_score.'/'.'5'.'</h5>';

                           /* use an anchor link instead of a button  to submit the results to the database */
                           $data = array('class' => 'w3-button w3-mobile w3-tiny w3-round w3-border w3-black','title' => 'Submit Results');
                           echo '<p class="w3-left">'.anchor(base_url().'submit_results','Submit Results',$data).'</p>'; //easier to use an anchor as a button

                           /* use an anchor link instead of a button to simply close the page */
                           $data = array('class' => 'w3-button w3-mobile w3-tiny w3-round w3-border w3-blue-gray','title' => 'Close');
                           echo '<p class="w3-left">'.anchor(base_url().'/','Close',$data).'</p>'; //easier to use an anchor as a button

                       }
                  }
                  else
                  {
                      if(isset($message)) {
                          echo '<p>'.$message.'</p>';
                      }
                  }

        }
        ?>

    </div>
</section>

