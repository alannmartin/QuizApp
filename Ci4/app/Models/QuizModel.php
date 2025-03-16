<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Services;
use Exception;

class QuizModel extends Model
{
    protected \CodeIgniter\Session\Session $session;
    public $builder;
    private string|int|null $user_id;

    protected $table = 'quiz_questions';
    protected $primaryKey = 'quizID';
    protected $allowedFields = ['user_id','user','question', 'choice1', 'choice2', 'choice3', 'choice4', 'answer'];
    //protected $allowCallbacks = true;
    //protected $beforeInsert = ['callBeforeInsert'];
    //protected $beforeUpdate = ['beforeUpdate'];
    //private ?string $user;

/*
    protected function callBeforeInsert()
    {

        //if a user is logged in, then fetch their credentials
        if (auth()->loggedIn())
        {
            $db = \Config\Database::connect();
            $this->user = auth()->user()->username; //fetch the username from shield auth()
            $this->user_id = auth()->id(); //fetch the user_id from shield auth()

            //$this->builder = $db->table('quiz_questions');

            //$this->builder->where('user_id', $this->user_id);
            $query = $db->query('SELECT user FROM quiz_questions WHERE user_id = "$this->user_id"');

            if($query->getNumRows() == 5) {
                echo 'You cannot do that';
            }
            // Get the total count of rows in the  table
            //$rowCount = $this->builder->countAllResults();
            //if ($rowCount <= 5) {
               //return $data;
            //}
            //else
            //{
               //return false;
            //}
        }
    }
*/

    function getNumRows(): int|string
     {
         //if a user is logged in, then fetch their credentials
         if (auth()->loggedIn())
         {
             $db = \Config\Database::connect();
             $this->user = auth()->user()->username; //fetch the username from shield auth()
             $this->user_id = auth()->id(); //fetch the user_id from shield auth()

             $this->builder = $db->table('quiz_questions');
             $this->builder->select('*');
             $this->builder->where('user_id', $this->user_id);

             // Get the total number of rows in that section of the table
             return $this->builder->countAllResults();

         }

     }



    //function to fetch an individual teachers quiz  based on their username when they first registered
    function getQuestions(): array
    {
        $db = \Config\Database::connect();

        //use this service before using $this->request
        $this->request = \Config\Services::request();

        //use this service before using $this->>session
        $this->session = \Config\Services::session();
        $user = $this->session->get('teacher');

        $this->builder = $db->table('quiz_questions');
        $this->builder->select('quizID,user_id,user,question,choice1,choice2,choice3,choice4,answer');
        $this->builder->where('user', $user);
        $this->builder->orderBy('quizID');
        return $this->builder->get()->getResultArray();
    }




    function get_quiz()
    {
        $db = \Config\Database::connect();

        // get the logged in users id from shield auth()
        //$user_id = auth()->id();
        
        //if a user is logged in, then fetch their credentials
        if (auth()->loggedIn()) 
        {
            $this->user = auth()->user()->username; //fetch the username from shield auth()
            $this->user_id = auth()->id(); //fetch the user_id from shield auth()
            
            $this->builder = $db->table('quiz_questions');
            $this->builder->select('quizID,user,question,choice1,choice2,choice3,choice4,answer');
            $this->builder->where('user_id', $this->user_id);
            $this->builder->orderBy('quizID' ,'ASC'); //only fetch the question from the logged in us
            return $this->builder->get();
        }
    }


    //function to fetch an individual teachers quiz  based on their username when they first registered
    function get_teachers_quiz(): bool|array|\CodeIgniter\Database\ResultInterface
    {
        $db = \Config\Database::connect();

        //use this service before using $this->request
        $this->request = \Config\Services::request();

        //use this service before using $this->>session
        $this->session = \Config\Services::session();
        $user = $this->request->getPost('teacher'); //gets the value posted from the dropdown

        // place username from the search form into session
        $this->session->set('teacher', $user);


        $this->builder = $db->table('quiz_questions');
        $this->builder->select('quizID,user_id,user,question,choice1,choice2,choice3,choice4,answer');
        $this->builder->where('user', $user);
        $this->builder->orderBy('quizID');
        return $this->builder->get()->getResultArray(); //this solved the problem about object vs array ?
    }

/* ........................BUSY .....................*/
    
    //function to fetch an individual teachers names in the quiz_questions table
    function get_teachers_names(): bool|array|\CodeIgniter\Database\ResultInterface
    {
        $db = \Config\Database::connect();
        
        //use this service before using $this->request
        $this->request = \Config\Services::request();
        
        //use this service before using $this->>session
        $this->session = \Config\Services::session();
        
        $this->builder = $db->table('quiz_questions');
        
        $this->builder->select('user');
        $this->builder->distinct(); //fetches a distinct name only, notice the order here!   
        $this->builder->orderBy('user','ASC');
        return $this->builder->get()->getResultArray(); //this solved the problem about object vs array ?
    }

/* ..................................................*/

    
    function get_where($quizID): bool|string|\CodeIgniter\Database\ResultInterface
    {
        //use this service when you need to use it
        //$request = \Config\Services::request();

        $db = \Config\Database::connect();
        $this->builder = $db->table('quiz_questions');
        $this->builder->select('*');
        // grabs the quiz_id for the record to be edited
        $this->builder->where('quizID', $quizID);
        return $this->builder->get();

    }

    function update_question($quizID, $data): void
    {
        $db = \Config\Database::connect();
        $this->builder = $db->table('quiz_questions');

        $this->builder->where('quizID', $quizID);
        $this->builder->update($data);
    }



}

