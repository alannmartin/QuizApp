<?php

namespace App\Controllers;

use App\Models\ResultModel;
use App\Models\QuizModel;

class Result extends BaseController
{
    //declare instance variables
    protected $session;
    public $builder;
    public $db;
    //public $user_id; //the id of the logged-in user
    //public $user;

    function __construct()
    {
        helper(['form', 'url', 'file', 'array', 'text']);
        //use this service before using $this->>session
        $this->session = \Config\Services::session();
        //loading the db instance
        $this->db = db_connect();
        $this->builder = $this->db->table('quiz_results');
        //use this service before using $this->request
        $this->request = \Config\Services::request();
    }

    public function index(): string
    {
        $data['title'] = 'Student Results';
        $model = model(ResultModel::class);
        $data['query'] = $model->get_results();
        $data['posts'] = $this->get_data_from_post();
        return view('pages/result/student_results', $data);
    }


    public function display(): string
    {
        $data['title'] = 'Display';
        $model = model(ResultModel::class);
        $data['query'] = $model->get_results();
        return view('pages/result/student_results', $data);
    }

    // get posts from the form fields upon submission
    public function get_data_from_post(): array
    {
        $data['quiz_taker'] = $this->request->getPost('quiz_taker');
        $data['user'] = $this->session->get('search');
        $data['class'] = $this->request->getPost('class');
        $data['your_answer1'] = $this->request->getPost('your_answer1');
        $data['your_answer2'] = $this->request->getPost('your_answer2');
        $data['your_answer3'] = $this->request->getPost('your_answer3');
        $data['your_answer4'] = $this->request->getPost('your_answer4');
        //$data['your_answer5'] = $this->request->getPost('your_answer5');
        $data['final'] = $this->request->getPost('final');
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
        return view('pages/quiz/edit_results', $data);

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
        return view('pages/result/student_results', $data);

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
        return $this->response->redirect(base_url('result/index'));
    }

} //end of class

