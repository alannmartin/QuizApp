<?= $this->extend('layouts/template'); ?>

<?= $this->section('title'); ?>Teachers Quiz Engine<?=$this->endSection();?>

<?=$this->section('content'); ?>

<div class="w3-top">
    <div class="w3-bar w3-mobile w3-black">
        <span class="w3-bar-item w3-text-white w3-mobile"><h5>Quiz Engine</h5></span>
        <a class="w3-bar-item w3-hover-opacity w3hover-black w3-right w3-button w3-text-white w3-mobile" href="https://www.privacypolicies.com/live/ed1500e4-5fa4-4b66-880c-3bdbffd65e66" target="_blank" class=""><h6>Privacy Policy</h6>
        </a> 
        <a 
            onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-hover-opacity w3-hover-black w3-right w3-button w3-text-white w3-mobile"><h6>More Info</h6>
        </a>        
    </div>
</div>

<div id="id01" class="w3-mobile w3-modal">
    <div class="w3-modal-content w3-animate-top w3-mobile w3-card-4">
        <header class="w3-container w3-light-grey">
            <span onclick="document.getElementById('id01').style.display='none'"
                  class="w3-button w3-display-topright">&times;</span>
            <h3>What this app is about ?</h3>
        </header>
        <div class="w3-container w3-bar">
            <p>
                This quiz engine is free for teachers or workplace trainers to create
                short multiple-choice text based quizzes for their learners. The quiz can help
                learners to diagnose their knowledge and understanding of certain concepts. You can use it to create FIVE multiple-choice questions. You need to register on the system first, so that you can login before creating your quiz or analysing your learners results.<br><br>
            </p>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<h1 class="w3-container w3-mobile w3-center w3-text-black">Teachers Quiz Engine</h1>
<br>
<div class="w3-container w3-mobile w3-center w3-cell-row">

    <?php echo anchor('/login', 'Teachers Area', 'class= " w3-meduim w3-mobile w3-round-large w3-hover-khaki w3-button w3-khaki"');?>
</div>
<br>
<div class="w3-container w3-mobile w3-center w3-cell-row">
    <?php echo anchor('quiz/find_teacher', 'Students Area', 'class= "w3-meduim w3-mobile w3-round-large w3-hover-khaki w3-button w3-green"');?>

</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<tr>
    <!--<table>
    <td>
        <a style="color:blue;" href="https://www.youtube.com/watch?v=oxTCczs5bM0" target="_blank" class="">Video 1</a>
    </td>
    </table>-->
    
    
<!--<body style="text-align: center">
        <h4>Watch Video</h4>
        <video width="400px" 
               height="300px" 
               controls="controls">
            <source src= 
            "https://media.geeksforgeeks.org/wp-content/uploads/20231020155223/
    Full-Stack-Development-_-LIVE-Classes-_-GeeksforGeeks.mp4"
                    type="video/mp4" />
        </video>
    </body>--> 
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?=$this->endSection(); ?>

