<h1 class="w3-container w3-mobile w3-center w3-text-black">Online Quiz Engine</h1>
<section class="w3-center w3-mobile">
<h5 class="w3-padding w3-mobile w3-round w3-card-4 w3-justify w3-light-gray w3-text-black w3-large w3-padding" style="width:96%;margin-left:auto;margin-right:auto;">
    This web app allows teachers and trainers to login and create an online quiz for their learners.
    The quiz serves as a self-diagnostic tool for learners to see how well they have understood certain concepts
    and they are given immediate feedback. Both teachers and trainers have access to their learners results for analysis. No marking is necessary and the results are saved in a
    database! This web app was built with the modern CodeIgniter4 framework (ver 4.5.5) using W3.CSS for styling and Alpine.js for special effects.
    The code for this web app is freely available for anyone from github at this url: <b>https://github.com/alannmartin</b> .<br>You can download the code for this web app and develop a copy for yourself because it is built with a
    free open source licence.

</h5>
<br>
<div class="w3-container w3-center w3-cell-row">

    <?php echo anchor('/login', 'Teacher Area', 'class= " w3-large w3-mobile w3-round-large w3-hover-khaki w3-button w3-red"');?>
</div>
<br>
<div class="w3-container w3-center w3-cell-row">
    <?php echo anchor('quiz/start', 'Student Area', 'class= "w3-large w3-mobile w3-round-large w3-hover-khaki w3-button w3-green"');?>

</div>


</section>
