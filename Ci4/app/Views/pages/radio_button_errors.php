<?php

 //display error message to the user - Try Again
  if(isset($message))
  {
    echo $message;
  }

/* use an anchor link instead of a button  to submit the results to the database */
$data = array('class' => 'w3-button w3-mobile w3-center w3-large w3-round w3-blue','title' => 'Try Again');
echo '<p class="w3-center">'.anchor(base_url().'quiz/start','Try Again',$data).'</p>'; //easier to use an anchor as a button