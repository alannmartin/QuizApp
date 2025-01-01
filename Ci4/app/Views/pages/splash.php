 
    <div class="w3-top">
    <div class="w3-bar w3-mobile w3-black">
        <span class="w3-bar-item w3-text-white w3-mobile"><h5>QuizEngine</h5></span>
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
                The purpose of this quiz app is to enable teachers or workplace trainers to create
                their own multiple-choice text based quiz for their learners. This quiz can help their
                learners to diagnose their own knowledge and understanding of certain key concepts that they
                have learned. This web app is FREE to use for any quiz that contains only five (5)
                questions per quiz. <br><br>
                You can see how this quiz app works by watching my youtube video.Teachers and trainers need to register
                themselves so that they can login before creating a new quiz and their learners will not be able
                to tamper with a quiz or learners results.<br><br>
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
<div class="w3-container w3-center w3-cell-row">

    <?php echo anchor('/login', 'Teacher Login', 'class= " w3-large w3-mobile w3-round-large w3-hover-khaki w3-button w3-khaki"');?>
</div>
<br>
<div class="w3-container w3-center w3-cell-row">
    <?php echo anchor('quiz/start', 'Student Area', 'class= "w3-large w3-mobile w3-round-large w3-hover-khaki w3-button w3-green"');?>

</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

