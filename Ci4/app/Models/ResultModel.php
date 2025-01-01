<?php

namespace App\Models;

use CodeIgniter\Model;

class ResultModel extends Model
{

    protected \CodeIgniter\Session\Session $session;
    public $builder;

    protected $table      = 'tbl_result';
    protected $primaryKey = 'result_id';

    protected $returnType = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields =
        ["quiz_taker","class","your_answer1","your_answer2","your_answer3","your_answer4","your_answer5","total_score","date_taken"];


    function get_results(): bool|string|\CodeIgniter\Database\ResultInterface
    {
        $db = \Config\Database::connect();

        $this->builder = $db->table('tbl_result');
        $this->builder->select('result_id,quiz_taker,class,your_answer1,your_answer2,your_answer3,your_answer4,your_answer5,total_score,date_taken');
        $this->builder->orderBy('result_id');
        return $this->builder->get();
    }

    //for fetching a quiz question according to their $quiz_id
    function get_where($result_id): bool|string|\CodeIgniter\Database\ResultInterface
    {
        //use this service when you need to use it
        $request = \Config\Services::request();

        $db = \Config\Database::connect();
        $this->builder = $db->table('tbl_result');

        $this->builder->select('*');
        // grabs the quiz_id for the record to be edited
        $this->builder->where('result_id', $result_id);
        return $this->builder->get();

    }

    // model to specify an array of data to update a specific sal_id
    function update_question($result_id, $data): void
    {
        $db = \Config\Database::connect();
        $this->builder = $db->table('tbl_result');

        $this->builder->where('result_id', $result_id);
        $this->builder->update($data);
    }


    // model to specify a unique quiz_id to delete
    function _delete($result_id): void
    {
        //use this service when you need to use it
        $request = \Config\Services::request();

        // grabs the id from the URI for the record to be deleted
        $result_id = $request->getUri()->getSegment(3);

        $db = \Config\Database::connect();
        $this->builder = $db->table('tbl_result');

        $this->builder->where('result_id', $result_id);
        $this->builder->delete();

    }


    //for fetching a result according to the students $result_id
    function get_student_results($result_id): bool|string|\CodeIgniter\Database\ResultInterface
    {
        //use this service when you need to use a $request
        $request = \Config\Services::request();

        $db = \Config\Database::connect();
        $this->builder = $db->table('tbl_result');

        $this->builder->select('total_score');
        // grabs the quiz_id for the record to be edited
        $this->builder->where('result_id', $result_id);
        $query = $this->builder->get();
        return $query->getRow()->total_score;

    }



} //end of model