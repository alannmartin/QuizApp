<h1 class="w3-padding w3-mobile w3-center "><b>Students Results</b></h1>
<title><?php //echo $title;?></title>

<table class="w3-table-all w3-mobile w3-card-4 w3-small" style="margin-left:auto;margin-right:auto;width:95%">

</table>

<?php
if(!empty($query))
{  ?>
<table class="w3-table-all w3-mobile w3-card-4 w3-small w3-hoverable" style="margin-left:auto;margin-right:auto;width:95%">

    <th style='' class=''><b><u>Quiz Taker</u></b></th>
    <th style='' class=''><b><u>Class</u></b></th>
    <th style='' class=''><b><u>Answer 1</u></b></th>
    <th style='' class=''><b><u>Answer 2</u></b></th>
    <th style='' class=''><b><u>Answer 3</u></b></th>
    <th style='' class=''><b><u>Answer 4</u></b></th>
    <th style='' class=''><b><u>Answer 5</u></b></th>
    <th style='' class=''><b><u>Score</u></b></th>
    <th style='' class=''><b><u>Date</u></b></th>
    <th style='' class=''><b><u>Trash</u></b></th>


    <?php
    //foreach($query->getResultArray() as $row)
    foreach($query->getResult() as $row)
    {
        ?>

        <tr>
            <td style='' class='w3-mobile'><?php echo $row->quiz_taker;?></td>
            <td style='' class='w3-mobile'><?php echo $row->class;?></td>
            <td style='' class='w3-mobile'><?php echo $row->your_answer1;?></td>
            <td style='' class='w3-mobile'><?php echo $row->your_answer2;?></td>
            <td style='' class='w3-mobile'><?php echo $row->your_answer3;?></td>
            <td style='' class='w3-mobile'><?php echo $row->your_answer4;?></td>
            <td style='' class='w3-mobile'><?php echo $row->your_answer5;?></td>
            <td style='' class='w3-mobile w3-text-indigo'><?php echo '<b>'.$row->total_score.'</b>';?>/5</td>
            <td style='' class='w3-mobile'><?php echo $row->date_taken;?></td>

            <td>
                <!--tack on the to the hyperlink anchor and use an anchor as a button-->
                <?php echo anchor(base_url().'results/delete/'.$row->result_id,'<i class="fa fa-trash fa-lg w3-mobile" aria-hidden="true" style="color:red"></i>');?>
            </td>

        </tr>

        <?php
    }
    ?>
</table>

<!-- This is how to center a button a page with w3.css-->
<div class="w3-center w3-mobile">
    <div class="w3-bar w3-mobile">
        <?php
        echo form_open('/');
            echo form_submit('submit','Back','class= "w3-margin w3-mobile w3-button w3-black w3-text-white w3-round"');
        echo form_close();
        }
        ?>
    </div>
</div>


