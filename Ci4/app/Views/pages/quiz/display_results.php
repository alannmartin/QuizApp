<section class="w3-container w3-mobile w3-center">

    <?php //if ($_POST) {   //good debugging tool, allows you to see which variables were posted
        //echo '<pre>';
       //print_r($_POST); //show the whole array in its glory
    //}
    //$this->session = \Config\Services::session();
    //$this->session->set('post1', $_POST['ID6']); //the first post
    //$this->session->set('post2', $_POST['ID7']); //the second  post



    //foreach ($_POST as $posts)
    //{
        //print_r($posts); // All data for a single question

        //print_r($posts['ID6']);// Just one property of a question.
    //}

   //if(isset($query)) {
        //print_r($query);
   //}

    //echo $this->session->get('answer');


    ?>

    <div class="w3-container w3-row w3-white w3-center">
        <?php
        if(isset($headline))
        {
            echo '<h5><u>'.$headline.'</u></h5>';

        }

        if(isset($status) AND $status == 'Correct')
        {
            echo '<p>';
           // echo '<p class="w3-text-green">'.$status.'</p>'; ?>
            <img src="<?=base_url('assets/images/tick.png');?>"
                 alt=""style="width:3%">
            <?php
        }
        //else
        //{
            //if(isset($message)) {
                //echo '<p>'.$message.'</p>';
            //}
        //}
        if(isset($status) AND $status == 'Wrong')
        {
            //echo '<p class="w3-text-red">'.$status.'</p>'; ?>
            <img src="<?=base_url('assets/images/wrong.png');?>"
                 alt=""style="width:3%">
            <?php
        }
        //else
        //{
            //if(isset($message)) {
                //echo '<p>'.$message.'</p>';
            //}
        //}
        echo '</p>';
        echo '<br>';

        if(isset($final))
        {
            echo 'Your total score is '.'<h5>'.$final.'/'.'5'.'</h5>';

            /* use an anchor link instead of a button  to submit the results to the database */
            $data = array('class' => 'w3-button w3-mobile w3-tiny w3-round w3-border w3-black','title' => 'Submit Results');
            echo '<p class="w3-left">'.anchor(base_url().'submit_results','Submit Results',$data).'</p>'; //easier to use an anchor as a button

            /* use an anchor link instead of a button to simply close the page */
            $data = array('class' => 'w3-button w3-mobile w3-tiny w3-round w3-border w3-blue-gray','title' => 'Close');
            echo '<p class="w3-left">'.anchor(base_url() . '/','Close',$data).'</p>'; //easier to use an anchor as a button

        }
        else
        {
            if(isset($message)) {
               echo '<p>'.$message.'</p>';
            }
        }
        ?>


    </div>
</section>

