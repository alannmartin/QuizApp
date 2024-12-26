<?php

namespace App\Models;

use CodeIgniter\Model;

class QuizModel extends Model
{

    protected \CodeIgniter\Session\Session $session;
    public $builder;

    protected $table      = 'tbl_quiz';
    protected $primaryKey = 'quiz_id';

    protected $returnType = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields =
        ["quiz_question","option_a","option_b","option_c","option_d","correct_answer"];


    function get_quiz(): bool|string|\CodeIgniter\Database\ResultInterface
    {
        $db = \Config\Database::connect();

        $this->builder = $db->table('tbl_quiz');
        $this->builder->select('quiz_id,quiz_question,option_a,option_b,option_c,option_d,correct_answer');
        $this->builder->orderBy('quiz_id');
        return $this->builder->get();
    }

    //for fetching a quiz question according to their $quiz_id
    function get_where($quiz_id): bool|string|\CodeIgniter\Database\ResultInterface
    {
        //use this service when you need to use it
        $request = \Config\Services::request();

        $db = \Config\Database::connect();
        $this->builder = $db->table('tbl_quiz');

        $this->builder->select('*');
        // grabs the quiz_id for the record to be edited
        $this->builder->where('quiz_id', $quiz_id);
        return $this->builder->get();

    }

    // model to specify an array of data to update a specific sal_id
    function update_question($quiz_id, $data): void
    {
        $db = \Config\Database::connect();
        $this->builder = $db->table('tbl_quiz');

        $this->builder->where('quiz_id', $quiz_id);
        $this->builder->update($data);
    }


    // model to specify a unique quiz_id to delete
    function _delete($quiz_id): void
    {
        //use this service when you need to use it
        $request = \Config\Services::request();

        // grabs the id from the URI for the record to be deleted
        $quiz_id = $request->getUri()->getSegment(3);
        //$quiz_id = 3; //this works....

        $db = \Config\Database::connect();
        $this->builder = $db->table('tbl_quiz');

        $this->builder->where('quiz_id', $quiz_id);
        $this->builder->delete();

    }

    //for fetching the correct_answer according to the $quiz_id
    function get_results($quiz_id): bool|string|\CodeIgniter\Database\ResultInterface
    {
        //use this service when you need to use a $request
        $request = \Config\Services::request();

        $db = \Config\Database::connect();
        $this->builder = $db->table('tbl_quiz');

        $this->builder->select('correct_answer');
        // grabs the quiz_id for the record to be edited
        $this->builder->where('quiz_id', $quiz_id);
        $query = $this->builder->get();
        return $query->getRow()->correct_answer;

    }

    // ----------------- Models for getting correct answers for the 5 questions ------------------------

    /*
     * Question 1
     */

    //for fetching option D according to the $quiz_id
    function get_optionD($quiz_id): bool|string|\CodeIgniter\Database\ResultInterface
    {
        //use this service when you need to use a $request
        $request = \Config\Services::request();

        $db = \Config\Database::connect();
        $this->builder = $db->table('tbl_quiz');

        $this->builder->select('option_d');
        // grabs the quiz_id for the record to be edited
        $this->builder->where('quiz_id', $quiz_id);
        $query = $this->builder->get();
        return $query->getRow()->option_d;

    }
    /*
     *  Question 2
     */

    //for fetching option B according to the $quiz_id
    function get_optionB($quiz_id): bool|string|\CodeIgniter\Database\ResultInterface
    {
        //use this service when you need to use a $request
        $request = \Config\Services::request();

        $db = \Config\Database::connect();
        $this->builder = $db->table('tbl_quiz');

        $this->builder->select('option_b');
        // grabs the quiz_id for the record to be edited
        $this->builder->where('quiz_id', $quiz_id);
        $query = $this->builder->get();
        return $query->getRow()->option_b;

    }

    /*
     * Questions 3 & 4
     */

    //for fetching option C according to the $quiz_id
    function get_optionC($quiz_id): bool|string|\CodeIgniter\Database\ResultInterface
    {
        //use this service when you need to use a $request
        $request = \Config\Services::request();

        $db = \Config\Database::connect();
        $this->builder = $db->table('tbl_quiz');

        $this->builder->select('option_c');
        // grabs the quiz_id for the record to be edited
        $this->builder->where('quiz_id', $quiz_id);
        $query = $this->builder->get();
        return $query->getRow()->option_c;

    }

    /*
     *  Question 5
     */

    //for fetching option A according to the $quiz_id - Question 5
    function get_optionA($quiz_id): bool|string|\CodeIgniter\Database\ResultInterface
    {
        //use this service when you need to use a $request
        $request = \Config\Services::request();

        $db = \Config\Database::connect();
        $this->builder = $db->table('tbl_quiz');

        $this->builder->select('option_a');
        // grabs the quiz_id for the record to be edited
        $this->builder->where('quiz_id', $quiz_id);
        $query = $this->builder->get();
        return $query->getRow()->option_a;

    }


}// end of class