 <h3 style="text-align:center;text-decoration: underline;color:black;padding-right:5%;">Create New Quiz</h3>
 <br>
 <div id = "wrapper" style="width:63%; margin-left:auto;margin-right:auto;background-color:white;padding-left:2%;padding-right:2%;padding-bottom:1%;
border-left:rgb(158,169,190) 1px solid;border-top:rgb(158,169,190) 1px solid;border-right:rgb(158,169,190) 1px solid;
border-bottom:rgb(158,169,190) 1px solid;border-radius:10px;" class="w3-container">    <br>
    
 <div class="w3-container w3-mobile">

        <h4>Enter a Question with 5 Possible Answers</h4>
        <!--<h5 class="w3-center w3-mobile ">Please enter all fields</h5>-->

        <!--sprinkle a little Alpine.js in this div element-->
        <div
                x-data="{isOpen : false}">
            <button x-on:mouseenter="isOpen = true" x-on:mouseleave="isOpen = false" class="w3-button w3-medium w3-pale-green w3-round w3-border-0">
                Note....
            </button>
            <p x-show="isOpen" class="w3-container w3-text-black">
                For best results it is a good practice to make sure that you use the correct sequence of alphabetical letters for the correct answers
                to each question. For example, the correct answers for the FIVE questions shown below should be entered in the sequence D,B,C,C,A for each question.
                This is necessary so that the marking gets done correctly!
            </p>
        </div>
        <br>
        <?php echo form_open(base_url('create'));?>
        <?= csrf_field() ?>
        <table class="w3-table-all">            
        <?php $validation = service('validation');?>
                <td>
                    <?php
                    $quiz_question = array(

                        'class'=> 'w3-input w3-text-blue-gray',
                        'name' => 'quiz_question',
                        'id'   => 'quiz_question',
                        'placeholder' =>'Your question',
                        'title'=> 'Add Question',
                        'style'=> 'width:100%',                         
                        'value' => set_value('quiz_question'),
                    );

                    echo form_label('The Question', 'quiz_question').form_input($quiz_question);
                    if(isset($_POST['create']))
                    {
                        if($validation->hasError('quiz_question'))
                        {?>
                            <div class='w3-padding w3-mobile w3-text-pale-red w3-pale-red'>
                                <?= $validation->getError('quiz_question'); ?>
                            </div>
                        <?php }
                    }
                    ?>
                </td>
            <tr>
                <td>
                    <?php
                    $option_a = array(

                        'class'=> 'w3-input w3-text-blue-gray',
                        'name' => 'option_a',
                        'id' => 'option_a',
                        'placeholder' =>'Your optional answer',
                        'title'=>'Option A',
                        'style'=>'width:100%',
                        'value' => set_value('option_a'),
                    );
                    echo form_label('Answer A', 'option_a').form_input($option_a);
                    if(isset($_POST['create']))
                    {
                        if($validation->hasError('option_a'))
                        {?>
                            <div class='w3-padding w3-mobile w3-text-pale-red w3-pale-red'>
                                <?= $validation->getError('option_a'); ?>
                            </div>
                        <?php }
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    $option_b = array(

                        'class'=> 'w3-input w3-text-blue-gray',
                        'name' => 'option_b',
                        'id' => 'option_b',
                        'placeholder' =>'Your optional answer',
                        'title'=>'Option B',
                        'style'=>'width:100%',
                        'value' => set_value('option_b'),
                    );
                    echo form_label('Answer B', 'option_b').form_input($option_b);
                    if(isset($_POST['create']))
                    {
                        if($validation->hasError('option_b'))
                        {?>
                            <div class='w3-padding w3-mobile w3-text-pale-red w3-pale-red'>
                                <?= $validation->getError('option_b'); ?>
                            </div>
                        <?php }
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    $option_c = array(

                        'class'=> 'w3-input w3-text-blue-gray',
                        'name' => 'option_c',
                        'id' => 'option_c',
                        'placeholder' =>'Your optional answer',
                        'title'=>'Option c',
                        'style'=>'width:100%',
                        'value' => set_value('option_c'),
                    );
                    echo form_label('Answer C', 'option_c').form_input($option_c);
                    if(isset($_POST['create']))
                    {
                        if($validation->hasError('option_c'))
                        {?>
                            <div class='w3-padding w3-mobile w3-text-pale-red w3-pale-red'>
                                <?= $validation->getError('option_c'); ?>
                            </div>
                        <?php }
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    $option_d = array(

                        'class'=> 'w3-input w3-text-blue-gray',
                        'name' => 'option_d',
                        'id' => 'option_d',
                        'placeholder' =>'Your optional answer',
                        'title'=>'Option D',
                        'style'=>'width:100%',
                        'value' => set_value('option_d'),
                    );
                    echo form_label('Answer D', 'option_d').form_input($option_d);
                    if(isset($_POST['create']))
                    {
                        if($validation->hasError('option_d'))
                        {?>
                            <div class='w3-padding w3-mobile w3-text-pale-red w3-pale-red'>
                                <?= $validation->getError('option_d'); ?>
                            </div>
                        <?php }
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    $correct_answer = array(

                        'class'=> 'w3-input w3-text-blue-gray',
                        'name' => 'correct_answer',
                        'id' => 'correct_answer',
                        'placeholder' =>'Correct Answer: You should enter A,B,C, or D ',
                        'title'=>'Answer',
                        'style'=>'width:100%',
                        'value' => set_value('correct_answer'),
                    );
                    echo form_label('Option', 'correct_answer').form_input($correct_answer);
                    if(isset($_POST['create']))
                    {
                        if($validation->hasError('correct_answer'))
                        {?>
                            <div class='w3-padding w3-mobile w3-text-pale-red w3-pale-red'>
                                <?= $validation->getError('correct_answer'); ?>
                            </div>
                 <?php }
                    }
                    ?>
                </td>
               <?php echo form_close(); ?>
            </tr>
            <tr>
                <td>
                    <?php
                    echo form_submit('create','Process Results','class= "w3-button w3-mobile w3-tiny w3-black w3-text-white w3-round w3-border", title="Process Results"');

                    /* use an anchor link instead of a button */
                    $data = array('class' => 'w3-button w3-mobile w3-tiny w3-round w3-border w3-blue-grey','title' => 'Close');
                    echo anchor(base_url().'display','Close',$data); //easier to use an anchor as a button
                    echo form_close();
                    ?>
                </td>
            </tr>
        </table>
    </div>
