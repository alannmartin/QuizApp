<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/* Use a named route when it is applicable using ,['as' => 'routes_name']); */

/* Better to use $routes->match when there are both GET and POST requests */
    $routes->match(['GET','POST'],'/', 'Splash::index'); //show the quiz questions

/* Start of Routes for quiz controller */
    $routes->match(['GET','POST'],'new', 'Quiz::new'); //create a new quiz question
    $routes->match(['GET','POST'],'create', 'Quiz::create'); //create a new quiz question
    $routes->match(['GET','POST'],'save', 'Quiz::save'); //save the quiz questions
    $routes->match(['GET','POST'],'success', 'Quiz::success'); //save the quiz questions
    $routes->match(['GET','POST'],'display', 'Quiz::display'); //show the quiz questions
    $routes->match(['GET','POST'],'quiz/delete/(:num)', 'Quiz::delete/$1');//delete a quiz question
    $routes->match(['GET','POST'],'quiz/edit/(:num)', 'Quiz::edit/$1',['as' => 'edit_question']);//edit quiz question
    $routes->match(['GET','POST'],'quiz/update/(:num)', 'Quiz::update/$1');//update quiz question
    $routes->match(['GET','POST'],'submit_results', 'Quiz::submit_results'); //submit results to the database
    $routes->match(['GET','POST'],'quiz/start', 'Quiz::start'); //start the quiz
    $routes->match(['GET','POST'],'quiz/results', 'Quiz::results'); //fetches students results
    $routes->match(['GET','POST'],'quiz/find_teacher', 'Quiz::find_teacher'); //find your teacher
    $routes->match(['GET','POST'],'quiz/find_teachers_quiz', 'Quiz::find_teachers_quiz'); //find teachers quiz
    $routes->match(['GET','POST'],'quiz/tests', 'Quiz::tests'); //find your teachers quiz
    $routes->match(['GET','POST'],'quiz/get_quiz_ids', 'Quiz::get_quiz_ids'); //find quiz_ids for a teacher

    // TESTING THESE ROUTES WITH THE ARRAY SOLUTION
    $routes->match(['GET','POST'],'quiz/resultDisplay', 'Quiz::resultDisplay');
    $routes->match(['GET','POST'],'quiz/display', 'Quiz::display');

/* End Routes for quiz controller */

/* Start Routes for Result controller */
$routes->match(['GET','POST'],'result/delete/(:num)', 'Result::delete/$1',['as'  => 'delete_record']);//delete a student result
$routes->match(['GET','POST'],'result/index', 'Result::index'); //show the results page
/* End Routes for Result controller */

service('auth')->routes($routes);