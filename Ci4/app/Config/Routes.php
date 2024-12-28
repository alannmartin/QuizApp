<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/* Better to use $routes->match when there are both GET and POST requests */


$routes->match(['GET','POST'],'/', 'Home::index'); //show the quiz questions

$routes->match(['GET','POST'],'new', 'Quiz::new'); //create a new quiz question

$routes->match(['GET','POST'],'create', 'Quiz::create'); //create a new quiz question

$routes->match(['GET','POST'],'save', 'Quiz::save'); //save the quiz questions

$routes->match(['GET','POST'],'display', 'Quiz::display'); //show the quiz questions

$routes->match(['GET','POST'],'quiz/delete/(:num)', 'Quiz::delete/$1');//delete a quiz question

$routes->match(['GET','POST'],'quiz/edit/(:num)', 'Quiz::edit/$1');//edit quiz question
$routes->match(['GET','POST'],'quiz/update/(:num)', 'Quiz::update/$1');//update quiz question

$routes->match(['GET','POST'],'submit_results', 'Quiz::submit_results'); //submit results to the database

$routes->match(['GET','POST'],'quiz/start', 'Quiz::start'); //start the quiz

$routes->match(['GET','POST'],'quiz/results', 'Quiz::results'); //fetches students results

$routes->match(['GET','POST'],'results/delete/(:num)', 'Results::delete/$1');//delete a student result
$routes->match(['GET','POST'],'results/index', 'Results::index'); //show the results page




service('auth')->routes($routes);