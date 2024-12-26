<h1 class="w3-container w3-mobile w3-center w3-text-black">Online Quiz Engine</h1>
<section class="w3-center w3-mobile">
<h5 class="w3-padding w3-mobile">
    This site will allow teachers and trainers to create their own online quizzes.
    After student login they will be able to take any quiz that their Teacher has created for them.
    They should use a quiz as a self assessment exercise to diagnose how well they have learnt.
    At the end of the quiz the app will give them immediate feedback of their results.
    Teachers and Trainers can  set their own test questions and answers and will have immediate access to their
    students results. No marking is necessary and the results are saved in the database along with questions and answers!
    The site is built with the CodeIgniter 4 php framework using W3.CSS for styling and HTMX with Alpine.js for special effects.

</h5>

<div class="w3-container w3-center w3-cell-row">

    <?php echo anchor('/login', 'Teacher Area', 'class= " w3-large w3-mobile w3-round-large w3-hover-khaki w3-button w3-red"');?>
</div>
<br>
<div class="w3-container w3-center w3-cell-row">
    <?php echo anchor('quiz/start', 'Student Area', 'class= "w3-large w3-mobile w3-round-large w3-hover-khaki w3-button w3-green"');?>

</div>


</section>
