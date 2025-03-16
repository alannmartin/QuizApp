<?= $this->extend('layouts/template'); ?>

<?= $this->section('title'); ?>Find Your Teacher<?=$this->endSection();?>

<?=$this->section('content'); ?>

<section class ="w3-container">
    <br>
    <div class="w3-container w3-margin w3-padding">

        <div id = 'search' style="padding-left:1%;text-align:center;background-color:#ffffff; margin:auto;border-left:rgb(158,169,190) 1px solid;border-top:rgb(158,169,190)1px solid;
     border-right:rgb(158,169,190) 1px solid;border-bottom:rgb(158,169,190) 1px solid;
	-webkit-border-radius  : 8px;
	 -moz-border-radius    : 8px;
	 -o-border-radius      : 8px;
	 -ms-border-radius     : 8px;
	 -khtml-border-radius  : 8px;
	 border-radius         : 8px;
	">

            <?php
                //if (isset($teachers)) {   //good debugging tool, allows you to see which variables were posted
                //echo '<pre>';
                    //print_r($teachers);
                //}
            ?>
            <br>
            <?php echo form_open(base_url() . 'quiz/find_teachers_quiz');?>
            
            <?php if(isset($teachers)) : ?>
            <?php {
                $teacher[''] = 'Select Teacher';  //for displaying in dropdown list	
                foreach ($teachers as $row) :
                    $teacher[$row['user']] = $row['user'];
                endforeach;	
            } ?>	
            <?php endif;?>
            <?= form_dropdown('teacher',$teacher , set_value('teacher')," class='w3-button w3-round w3-border' id='teacher' ");?>

            <?php
            echo '<br>';
            echo '<br>';   
            
            echo form_submit('Submit', 'Submit','class="w3-button w3-round w3-blue w3-border", title="Please select your teacher name"');

            echo form_close();
            echo '<h6 style="color: #354f6f;text-align:center;">Select your teachers name</h6>';
            ?>
        </div>
        <br/>
        <br/>
        <br/>
    </div>

</section>

<?=$this->endSection(); ?>