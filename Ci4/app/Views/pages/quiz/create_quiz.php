<?= $this->extend('layouts/template'); ?>

<?= $this->section('title')?>Create Quiz<?=$this->endSection()?>

<?=$this->section('content')?>

<h3 style="text-align:center;text-decoration: underline;color:black;padding-right:5%;">Create New Quiz</h3>
 <br>
 <div id = "wrapper" style="width:83%; margin-left:auto;margin-right:auto;background-color:white;padding-left:2%;padding-right:2%;padding-bottom:1%;
border-left:rgb(158,169,190) 1px solid;border-top:rgb(158,169,190) 1px solid;border-right:rgb(158,169,190) 1px solid;
border-bottom:rgb(158,169,190) 1px solid;border-radius:10px;" class="w3-container">    <br>

 <div class="w3-container w3-mobile">

        <h4>Enter a Question with 4 Possible Answers</h4>
        <!--<h5 class="w3-center w3-mobile ">Please enter all fields</h5>-->

        <!--sprinkle a little Alpine.js in this div element-->
        <div
                x-data="{isOpen : false}">
            <button x-on:mouseenter="isOpen = true" x-on:mouseleave="isOpen = false" class="w3-button w3-medium w3-pale-green w3-round w3-border-0">
                Note....
            </button>
            <p x-show="isOpen" class="w3-container w3-text-teal">
                For best results it is a good practice to write a short question with FOUR clear descriptive optional answers. Only FIVE questions are allowed per quiz!
            </p>
        </div>
        <br>

     <?php
     if(isset($rowCount))
     {
         if($rowCount > 4) {
             echo "<p class='w3-text-red'>"."Only FIVE questions are allowed per quiz!"."</p>";
         }
     }
     ?>
        <?php echo form_open(base_url('create'));?>
        <?= csrf_field() ?>
        <table class="w3-table-all">            
        <?php $validation = service('validation');?>
                <td>
                    <?php
                    $question = array(

                        'class'=> 'w3-input w3-text-blue-gray',
                        'name' => 'question',
                        'id'   => 'question',
                        'placeholder' =>'Your question',
                        'title'=> 'Add Question',
                        'style'=> 'width:100%',                         
                        'value' => set_value('question'),
                    );

                    echo form_label('The Question', 'question') . form_input($question);
                    if(isset($_POST['create']))
                    {
                        if($validation->hasError('question'))
                        {?>
                            <div class='w3-padding w3-mobile w3-text-pale-red w3-pale-red'>
                                <?= $validation->getError('question'); ?>
                            </div>
                        <?php }
                    }
                    ?>
                </td>
            <tr>
                <td>
                    <?php
                    $choice1 = array(

                        'class'=> 'w3-input w3-text-blue-gray',
                        'name' => 'choice1',
                        'id' => 'choice1',
                        'placeholder' =>'Your optional answer',
                        'title'=>'Option A',
                        'style'=>'width:100%',
                        'value' => set_value('choice1'),
                    );
                    echo form_label('Answer A', 'option_a') . form_input($choice1);
                    if(isset($_POST['create']))
                    {
                        if($validation->hasError('choice1'))
                        {?>
                            <div class='w3-padding w3-mobile w3-text-pale-red w3-pale-red'>
                                <?= $validation->getError('choice1'); ?>
                            </div>
                        <?php }
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    $choice2 = array(

                        'class'=> 'w3-input w3-text-blue-gray',
                        'name' => 'choice2',
                        'id' => 'choice2',
                        'placeholder' =>'Your optional answer',
                        'title'=>'Option B',
                        'style'=>'width:100%',
                        'value' => set_value('choice2'),
                    );
                    echo form_label('Answer B', 'choice2') . form_input($choice2);
                    if(isset($_POST['create']))
                    {
                        if($validation->hasError('choice2'))
                        {?>
                            <div class='w3-padding w3-mobile w3-text-pale-red w3-pale-red'>
                                <?= $validation->getError('choice2'); ?>
                            </div>
                        <?php }
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    $choice3 = array(

                        'class'=> 'w3-input w3-text-blue-gray',
                        'name' => 'choice3',
                        'id' => 'choice3',
                        'placeholder' =>'Your optional answer',
                        'title'=>'Option C',
                        'style'=>'width:100%',
                        'value' => set_value('choice3'),
                    );
                    echo form_label('Answer C', 'choice3') . form_input($choice3);
                    if(isset($_POST['create']))
                    {
                        if($validation->hasError('choice3'))
                        {?>
                            <div class='w3-padding w3-mobile w3-text-pale-red w3-pale-red'>
                                <?= $validation->getError('choice3'); ?>
                            </div>
                        <?php }
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    $choice4 = array(

                        'class'=> 'w3-input w3-text-blue-gray',
                        'name' => 'choice4',
                        'id' => 'choice4',
                        'placeholder' =>'Your optional answer',
                        'title'=>'Option D',
                        'style'=>'width:100%',
                        'value' => set_value('choice4'),
                    );
                    echo form_label('Answer D', 'choice4') . form_input($choice4);
                    if(isset($_POST['create']))
                    {
                        if($validation->hasError('choice4'))
                        {?>
                            <div class='w3-padding w3-mobile w3-text-pale-red w3-pale-red'>
                                <?= $validation->getError('choice4'); ?>
                            </div>
                        <?php }
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    $answer = array(

                        'class'=> 'w3-input w3-text-blue-gray',
                        'name' => 'answer',
                        'id' => 'answer',
                        'placeholder' =>'Correct Answer: This answer must match the text from one of your optional answers.',
                        'title'=>'Answer',
                        'style'=>'width:100%',
                        'value' => set_value('answer'),
                    );
                    echo form_label('Option', 'answer') . form_input($answer);
                    if(isset($_POST['create']))
                    {
                        if($validation->hasError('answer'))
                        {?>
                            <div class='w3-padding w3-mobile w3-text-pale-red w3-pale-red'>
                                <?= $validation->getError('answer'); ?>
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
                    if(isset($rowCount)) {
                        if ($rowCount < 5) { //if there are less than 5 questions, then enable the button
                            echo form_submit('create', 'Process Results', 'class= "w3-button w3-mobile w3-tiny w3-black w3-text-white w3-round w3-border", title="Process Results"');
                        }
                    }
                    /* use an anchor link instead of a button */
                    $data = array('class' => 'w3-button w3-mobile w3-tiny w3-round w3-border w3-blue-grey','title' => 'Close');
                    echo anchor(base_url().'display','Close',$data); //easier to use an anchor as a button
                    echo form_close();
                    ?>
                </td>
            </tr>
        </table>
    </div>

     <?=$this->endSection(); ?>
