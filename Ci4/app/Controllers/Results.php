<?php

namespace App\Controllers;

use App\Models\ResultModel;
use App\Models\QuizModel;

class Results extends BaseController
{
    //declare instance variables
    protected \CodeIgniter\Session\Session $session;
    public \CodeIgniter\Database\BaseBuilder $builder;
    public \CodeIgniter\Database\BaseConnection $db;

    function __construct()
    {
        helper(['form', 'url', 'file', 'array', 'text']);
        //use this service before using $this->>session
        $this->session = \Config\Services::session();
        //loading the db instance
        $this->db = db_connect();
        $this->builder = $this->db->table('tbl_result');
        //use this service before using $this->request
        $this->request = \Config\Services::request();
    }

    public function index(): string
    {
        $data['title'] = 'Student Results';
        $model = model(ResultModel::class);
        $data['query'] = $model->get_results();
        $data['posts'] = $this->get_data_from_post();
        return view('partials/header', $data)
            . view('pages/student_results');
    }


    public function display(): string
    {
        $data['title'] = 'Display';
        $model = model(ResultModel::class);
        $data['query'] = $model->get_results();
        return view('partials/header', $data)
            . view('pages/student_results');
    }

    // get posts from the form fields upon submission
    public function get_data_from_post(): array
    {
        $data['quiz_taker'] = $this->request->getPost('quiz_taker');
        $data['class'] = $this->request->getPost('class');
        $data['your_answer1'] = $this->request->getPost('your_answer1');
        $data['your_answer2'] = $this->request->getPost('your_answer2');
        $data['your_answer3'] = $this->request->getPost('your_answer3');
        $data['your_answer4'] = $this->request->getPost('your_answer4');
        $data['your_answer5'] = $this->request->getPost('your_answer5');
        $data['total_score'] = $this->request->getPost('total-score');
        return $data;
    }

    // displays records from the database ready for editing!
    public function edit(): string
    {
        //get the sal_id either from post or from the url
        if ($this->request->getPost()) {
            $result_id = $this->request->getpost('result_id');
        } else {
            //catch the quiz_id from the url
            $quiz_id = $this->request->getUri()->getSegment(3);
        }
        $data['heading'] = " ";  //sets a heading for the page
        $model = model(ResultModel::class);
        $data['query'] = $model->get_where($result_id); //query a row matching the quiz_id
        return view('partials/header')
            . view('pages/edit_results', $data);

    }

    //updates form values then updates the database
    public function update(): string
    {
        //catch the quiz_id from the url
        $result_id = $this->request->getUri()->getSegment(3);
        //get the posted data from the form
        if ($this->request->getPost()) {
            $data = $this->get_data_from_post();
            $model = model(ResultModel::class);
            //call the update function in tbk_quiz model
            $model->update_question($result_id, $data);
        } else {
            echo 'Sorry, no results found';
        }
        //redirects to the same page (update_salary view) after updating changes
        //return redirect()->to($_SERVER['HTTP_REFERRER']);

        $model = model(ResultModel::class);
        $data['query'] = $model->get_student_results(); //get_where($quiz_id);
        //$data['message'] = $this->session->setFlashdata
        //('message', 'The data was successfully updated');
        return view('partials/header')
            . view('pages/student_results', $data);

    }

    //deletes a single record in the database
    public function delete(): \CodeIgniter\HTTP\ResponseInterface
    {
        $ResultModel = model(ResultModel::class);
        //get the posted data from the form
        if ($this->request->getPost()) {
            $result_id = $this->request->getPost('result_id');
        } else {
            //catch the result_id from the url
            $result_id = $this->request->getUri()->getSegment(3);
        }
        $ResultModel->_delete($result_id);
        return $this->response->redirect(base_url('results/index'));
    }

} //end of class

