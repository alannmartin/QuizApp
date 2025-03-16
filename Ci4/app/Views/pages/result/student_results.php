<?= $this->extend('layouts/template'); ?>

<?= $this->section('title'); ?>Students Results<?=$this->endSection();?>

<?=$this->section('content'); ?>

<h1 class="w3-padding w3-mobile w3-center "><b>Students Results</b></h1>
<title><?php //echo $title;?></title>
<br>
<div class="w3-container w3-padding">
<?php
if(!empty($query))
{  ?>
<table class="w3-table w3-mobile w3-tiny w3-white w3-hover">

    <th style='' class='w3-mobile'><b><u>Name</u></b></th>
    <th style='' class='w3-mobile'><b><u>Class</u></b></th>
    <th style='' class='w3-mobile'><b><u>Ans</u></b></th>
    <th style='' class='w3-mobile'><b><u>Ans</u></b></th>
    <th style='' class='w3-mobile'><b><u>Ans</u></b></th>
    <th style='' class='w3-mobile'><b><u>Ans</u></b></th>
    <th style='' class='w3-mobile'><b><u>Score</u></b></th>
    <th style='' class='w3-mobile'><b><u>Date</u></b></th>
    <th style='' class='w3-mobile'><b><u>Trash</u></b></th>


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
            <td style='' class='w3-mobile w3-text-indigo'><?php echo '<b>'.$row->final.'</b>';?>/5</td>
            <td style='' class='w3-mobile'><?php echo $row->date_taken;?></td>

            <td>
                <!-- the old way, tack on the to the hyperlink anchor and use an anchor as a button -->
                <?php //echo anchor(base_url().'result/delete/'.$row->result_id,'<i class="fa fa-trash fa-lg w3-padding w3-mobile" aria-hidden="true" style="color:red"></i>');?>

                <!-- the new way shows how to use a named route to delete a record by tacking on the id with a javascript alert confirmation -->
                <a href="<?= route_to('delete_record', $row->result_id,);?>" onclick="return confirm('Are you sure you want to delete this?')">
                    <i class="fa fa-trash fa-lg w3-padding w3-mobile" aria-hidden="true" style="color:red"></i></a>

            </td>

        </tr>

        <?php
    }
    ?>
</table>
</div>

<!-- This is how to center a button a page with w3.css-->
<div class="w3-center w3-mobile">
    <div class="w3-bar w3-padding w3-mobile">
        <?php
        echo form_open('display');
            echo form_submit('submit','Back','class= "w3-mobile w3-button w3-black w3-text-white w3-round"');
        echo form_close();
        }
        ?>
    </div>
</div>

<?= $this->endSection(); ?>



