<section class="w3-container">
    <!--#d9edf7-->
    <br>

    <div id = "wrapper" style="width:43%; margin-left:auto;margin-right:auto;background-color:white;padding-left:2%;padding-right:2%;padding-bottom:1%;
border-left:rgb(158,169,190) 1px solid;border-top:rgb(158,169,190) 1px solid;border-right:rgb(158,169,190) 1px solid;
border-bottom:rgb(158,169,190) 1px solid;border-radius:10px;" class="w3-container">

        <h3 style="text-align:center;text-decoration: underline;color:black;padding-right:5%;">Quiz</h3>
        <h6 class="w3-center">Select the best answer for each question</h6>

        <?php $this->session = \Config\Services::session();?>

        <form method ="post" action ="<?php echo base_url()?>quiz/results">

            <?php if(isset($query)) : ?>
                <?php foreach ($query as $row) : ?>
                    <?php $ans_array = array($row['option_a'],$row['option_b'],$row['option_c'],$row['option_d']);?>
                    <?php shuffle($ans_array);?>
                    <div class="w3-container">
                        <p><u><?=$row['quiz_question'];?></u></p>
                        <input type="radio" name ="quiz_id<?=$row['quiz_id'];?>" value="<?=$ans_array[0]?>"> <?=$ans_array[0]?><br>
                        <input type="radio" name ="quiz_id<?=$row['quiz_id'];?>" value="<?=$ans_array[1]?>"> <?=$ans_array[1]?><br>
                        <input type="radio" name ="quiz_id<?=$row['quiz_id'];?>" value="<?=$ans_array[2]?>"> <?=$ans_array[2]?><br>
                        <input type="radio" name ="quiz_id<?=$row['quiz_id'];?>" value="<?=$ans_array[3]?>"> <?=$ans_array[3]?><br>
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