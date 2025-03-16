<?= $this->extend('layouts/template'); ?>

<?= $this->section('title')?>Display Quiz<?=$this->endSection()?>

<?=$this->section('content'); ?>

    <table class="w3-table w3-mobile w3-small">
        <th class="w3-right">
            <?php
            $data = array('class' => 'w3-button w3-round  w3-blue-gray','title' => 'Class Results');
            echo anchor(base_url().'result/index', 'Class Results',$data); //easier to use an anchor as a button
          ?>
        </th>
        <th class="w3-right">
            <?php
            $data = array('class' => 'w3-button w3-round w3-blue-gray','title' => 'Create Question');
            echo anchor(base_url().'create', 'Create Question',$data); //easier to use an anchor as a button
            ?>
        </th>
    </table>

    <div class="w3-container w3-padding">
    <?php
    if(!empty($query))
    {  ?>
    <table class="w3-table-all w3-padding w3-center w3-white w3-tiny w3-hoverable">

        <th style='' class=''><b><u>Question</u></b></th>
        <th style='' class=''><b><u>A</u></b></th>
        <th style='' class=''><b><u>B</u></b></th>
        <th style='' class=''><b><u>C</u></b></th>
        <th style='' class=''><b><u>D</u></b></th>
        <th style='' class=''><b><u>Correct</u></b></th>
        <th style='' class=''><b><u>Edit</u></b></th>
        <!--<th style='' class=''><b><u>&nbsp;</u></b></th>-->

        <?php
        //foreach($query->getResultArray() as $row)
        foreach($query->getResult() as $row)
        {
            ?>

            <tr>
                <td style='' class='w3-mobile'><?php echo $row->question;?></td>
                <td style='' class='w3-mobile'><?php echo $row->choice1;?></td>
                <td style='' class='w3-mobile'><?php echo $row->choice2;?></td>
                <td style='' class='w3-mobile'><?php echo $row->choice3;?></td>
                <td style='' class='w3-mobile'><?php echo $row->choice4?></td>
                <td style='' class='w3-mobile'><?php echo '<b>',$row->answer.'</b>';?></td>

                <td>
                    <!-- this shows how to use a named route to delete a record by tacking on the id with a javascript alert confirmation -->
                    <a href="<?= route_to('edit_question', $row->quizID,);?>"onclick="return confirm('Are you sure you want to continue?')">
                        <i class="fa fa-pencil fa-lg w3-padding w3-mobile" aria-hidden="true" style="color:green"></i></a>
                </td>
                <!--<td>
                    // tack on the to the hyperlink anchor and use an anchor as a button
                    <?php //echo anchor(base_url() . 'quiz/delete/' .$row->quizID,'<i class="fa fa-trash fa-lg w3-mobile" aria-hidden="true" style="color:red"></i>');?>
                </td>-->

            </tr>

            <?php
        }
        ?>
    </table>
    </div>

    <!-- This is how to center a button a page with w3.css-->
    <div class="w3-mobile">
        <div class="w3-bar w3-center w3-padding w3-mobile">
            <?php
            echo form_open('/');
            echo form_submit('submit','Logout','class= "w3-center w3-padding w3-mobile w3-button w3-black w3-text-white w3-round"');
            echo form_close();
    }
    ?>
        </div>
    </div>

<?= $this->endSection(); ?>



