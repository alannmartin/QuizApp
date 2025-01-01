 <h1 class="w3-padding w3-mobile w3-center "><b>Teachers Quiz Engine</b></h1>
    <title><?php //echo $title;?></title>
    
    <table class="w3-table w3-striped  w3-mobile w3-small" style="margin-left:auto;margin-right:auto;width:93%">
        <th class="w3-right">
            <?php
            $data = array('class' => 'w3-button w3-round  w3-blue-gray','title' => 'Class Results');
            echo anchor(base_url().'results/index', 'Class Results',$data); //easier to use an anchor as a button
          ?>
        </th>
        <th class="w3-right">
            <?php
            $data = array('class' => 'w3-button w3-round w3-blue-gray','title' => 'Create Question');
            echo anchor(base_url().'create', 'Create Question',$data); //easier to use an anchor as a button
            ?>
        </th>
    </table>

    <?php
    if(!empty($query))
    {  ?>
    <table class="w3-table-all w3-mobile w3-tiny w3-hoverable" style="margin-left:auto;margin-right:auto;width:93%">

        <th style='' class=''><b><u>Question</u></b></th>
        <th style='' class=''><b><u>A</u></b></th>
        <th style='' class=''><b><u>B</u></b></th>
        <th style='' class=''><b><u>C</u></b></th>
        <th style='' class=''><b><u>D</u></b></th>
        <th style='' class=''><b><u>Correct</u></b></th>
        <th style='' class=''><b><u>Edit</u></b></th>
        <th style='' class=''><b><u>Trash</u></b></th>

        <?php
        //foreach($query->getResultArray() as $row)
        foreach($query->getResult() as $row)
        {
            ?>

            <tr>
                <td style='' class='w3-mobile'><?php echo $row->quiz_question;?></td>
                <td style='' class='w3-mobile'><?php echo $row->option_a;?></td>
                <td style='' class='w3-mobile'><?php echo $row->option_b;?></td>
                <td style='' class='w3-mobile'><?php echo $row->option_c;?></td>
                <td style='' class='w3-mobile'><?php echo $row->option_d?></td>
                <td style='' class='w3-mobile'><?php echo '<b>',$row->correct_answer.'</b>';?></td>

                <td>
                    <!--tack on the to the hyperlink anchor, and use an anchor as a button -->
                    <?= anchor(base_url().'quiz/edit/'.$row->quiz_id,'<i class="fa fa-pencil fa-lg w3-mobile" aria-hidden="true"></i>');?>
                </td>
                <td>
                    <!--tack on the to the hyperlink anchor and use an anchor as a button-->
                    <?php echo anchor(base_url().'quiz/delete/'.$row->quiz_id,'<i class="fa fa-trash fa-lg w3-mobile" aria-hidden="true" style="color:red"></i>');?>
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
            echo form_submit('submit','Logout','class= "w3-margin w3-mobile w3-button w3-black w3-text-white w3-round"');
            echo form_close();
    }
    ?>
        </div>
    </div>



