<section class="w3-container">

    <br>

    <?php  $this->session = \Config\Services::session();?>

    <div id = "wrapper" style="width:43%; margin-left:auto;margin-right:auto;background-color:white;padding-left:2%;padding-right:2%;padding-bottom:1%;
border-left:rgb(158,169,190) 1px solid;border-top:rgb(158,169,190) 1px solid;border-right:rgb(158,169,190) 1px solid;
border-bottom:rgb(158,169,190) 1px solid;border-radius:10px;" class="w3-container">

        <h3 style="text-align:center;text-decoration: underline;color:black;padding-right:5%;">Submit Results</h3>

        <?php echo form_open(base_url('submit_results'));?>
        <?= csrf_field() ?>
        <table class="w3-table w3-mobile">

            <?php $validation = \Config\Services::validation(); ?>

            <td>
                <?php
                $quiz_taker = array(

                    'class'=> 'w3-input w3-text-blue-gray',
                    'name' => 'quiz_taker',
                    'id'   => 'quiz_taker',
                    'placeholder' =>'Your name',
                    'title'=>'Quiz Taker',
                    'style'=>'width:100%',
                    'value' => set_value('quiz_taker'),
                );

                echo form_label('Quiz Taker', 'quiz_taker').form_input($quiz_taker);
                if(isset($_POST['quiz/submit_results']))
                {
                    if($validation->hasError('quiz_taker'))
                    {?>
                    <div class='w3-padding w3-mobile w3-text-pale-red w3-pale-red'>
                        <?= $validation->getError('quiz_taker'); ?>
                    </div>
                <?php }
                }
                ?>
            </td>

            <tr>
                <td>
                    <?php
                    $class = array(

                        'class'=> 'w3-input w3-border w3-text-blue-gray',
                        'name' => 'class',
                        'id' => 'class',
                        'placeholder' =>'Your class or section',
                        'title'=>'Class',
                        'style'=>'width:100%',
                        'value' => set_value('class'),
                    );
                    echo form_label('Class or Section', 'class').form_input($class);
                    if(isset($_POST['quiz/submit_results']))
                    {
                        if($validation->hasError('class'))
                        {?>
                            <div class='w3-padding w3-mobile w3-text-pale-red w3-pale-red'>
                                <?= $validation->getError('class'); ?>
                            </div>
                        <?php }
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    $total_score = array(

                        'class'=> 'w3-input w3-border w3-light-gray w3-text-blue-gray',
                        'name' => 'total_score',
                        'readonly' => 'readonly',
                        'id' => 'total_score',
                        'placeholder' => $this->session->get('total_score'),
                        'title'=>'Score',
                        'style'=>'width:100%',
                        'value' => set_value('total_score'),
                    );
                    echo form_label('Total Score', 'total_score').form_input($total_score);
                    if(isset($_POST['quiz/submit_results']))
                    {
                        if($validation->hasError('total_score')) {?> <!--not a required field-->}
                        {?>
                            <div class='w3-padding w3-mobile w3-text-pale-red w3-pale-red'>
                                <?= $validation->getError('total_score'); ?>
                            </div>
                        <?php }
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    $your_answer1 = array(

                        'class'=> 'w3-input w3-border w3-text-blue-gray',
                        'type' => 'hidden',
                        'name' => 'your_answer1',
                        'id' => 'your_answer1',
                        'placeholder' => $this->session->get('your_answer1'),
                        'title'=>'Answer 1',
                        'style'=>'width:100%',
                        'value' => set_value('your_answer1'),
                    );
                    echo form_label('', 'your_answer1').form_input($your_answer1);

                    if($validation->hasError('your_answer1')) {?> <!--not a required field-->
                        <div class='w3-padding w3-mobile w3-text-pale-red w3-pale-red'>
                            <?= $validation->getError('your_answer1'); ?> <!--display single line error -->
                        </div>
                    <?php }?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    $your_answer2 = array(

                        'class'=> 'w3-input w3-border w3-text-blue-gray',
                        'type' => 'hidden',
                        'name' => 'your_answer2',
                        'id' => 'your_answer2',
                        'placeholder' => $this->session->get('your_answer2'),
                        'title'=>'Answer 2',
                        'style'=>'width:100%',
                        'value' => set_value('your_answer2'),
                    );
                    echo form_label('', 'your_answer2').form_input($your_answer2);

                    if($validation->hasError('your_answer2')) {?> <!--not a required field-->
                        <div class='w3-padding w3-mobile w3-text-pale-red w3-pale-red'>
                            <?= $validation->getError('your_answer2'); ?> <!--display single line error -->
                        </div>
                    <?php }?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    $your_answer3 = array(

                        'class'=> 'w3-input w3-border w3-text-blue-gray',
                        'type' => 'hidden',
                        'name' => 'your_answer3',
                        'id' => 'your_answer3',
                        'placeholder' => $this->session->get('your_answer3'),
                        'title'=>'Answer 3',
                        'style'=>'width:100%',
                        'value' => set_value('your_answer3'),
                    );
                    echo form_label('', 'your_answer3').form_input($your_answer3);

                    if($validation->hasError('your_answer3')) {?> <!--not a required field-->
                        <div class='w3-padding w3-mobile w3-text-pale-red w3-pale-red'>
                            <?= $validation->getError('your_answer3'); ?> <!--display single line error -->
                        </div>
                    <?php }?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    $your_answer4 = array(

                        'class'=> 'w3-input w3-border w3-text-blue-gray',
                        'type' => 'hidden',
                        'name' => 'your_answer4',
                        'id' => 'your_answer4',
                        'placeholder' => $this->session->get('your_answer4'),
                        'title'=>'Answer 4',
                        'style'=>'width:100%',
                        'value' => set_value('your_answer4'),
                    );
                    echo form_label('', 'your_answer4').form_input($your_answer4);

                    if($validation->hasError('your_answer4')) {?> <!--not a required field-->
                        <div class='w3-padding w3-mobile w3-text-pale-red w3-pale-red'>
                            <?= $validation->getError('your_answer4'); ?> <!--display single line error -->
                        </div>
                    <?php }?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    $your_answer5 = array(

                        'class'=> 'w3-input w3-border w3-text-blue-gray',
                        'type' => 'hidden',
                        'name' => 'your_answer5',
                        'id' => 'your_answer5',
                        'placeholder' => $this->session->get('your_answer5'),
                        'title'=>'Answer 5',
                        'style'=>'width:100%',
                        'value' => set_value('your_answer5'),
                    );
                    echo form_label('', 'your_answer').form_input($your_answer5);

                    if($validation->hasError('your_answer5')) {?> <!--not a required field-->
                        <div class='w3-padding w3-mobile w3-text-pale-red w3-pale-red'>
                            <?= $validation->getError('your_answer5'); ?> <!--display single line error -->
                        </div>
                    <?php }?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    echo form_submit('quiz/submit_results','Submit','class= "w3-button w3-mobile w3-tiny w3-black w3-text-white w3-round w3-border", title="Submit"');

                    /* use an anchor link instead of a button */
                    $data = array('class' => 'w3-button w3-mobile w3-tiny w3-round w3-border w3-blue-grey','title' => 'Close');
                    echo anchor(base_url().'/','Close',$data); //easier to use an anchor as a button

                    ?>
                </td>
            </tr>
        </table>

</section>