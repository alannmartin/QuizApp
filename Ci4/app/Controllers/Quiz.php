<?php

namespace App\Controllers;

use App\Models\QuizModel;
use App\Models\ResultModel;
use http\Env\Response;

class Quiz extends BaseController
{
    //declare instance variables
    protected $session;
    public $builder;
    public $db;
    public int $score;


    function __construct()
    {
        helper(['form', 'url', 'file', 'array', 'text']);
        //use this service before using $this->>session
        $this->session = \Config\Services::session();
        //loading the db instance
        $this->db = db_connect();
        $this->builder = $this->db->table('tbl_quiz');
        //use this service before using $this->request
        $this->request = \Config\Services::request();
        $this->score = 0;

    }

    public function index(): string
    {
        $data['title'] = 'Create Quiz';
        $model = model(QuizModel::class);
        $data['query'] = $model->get_quiz();
        $data['posts'] = $this->get_data_from_post();

        return view('partials/header', $data)
            . view('pages/create_quiz');
    }

    public function submit_create_form(): string //displays a new form to enter quiz details
    {
        $data['title'] = 'Create Quiz';
        return view('partials/header', $data)
            . view('pages/create_quiz');
    }

    /**
     * @throws \ReflectionException
     */
    public function create(): \CodeIgniter\HTTP\ResponseInterface|string
    {
        helper(['form', 'url', 'file', 'array', 'text']);
        $posted_data = $this->request->getPost(['quiz_question', 'option_a', 'option_b', 'option_c', 'option_d', 'correct_answer']);

        // Checks whether the submitted data passes the validation rules.
        if (!$this->validateData($posted_data, [

            'quiz_question' => [
                'label' => 'Question',
                'rules' => 'required|min_length[12]|max_length[52]'
            ],
            'option_a' => [
                'label' => 'Answer A',
                'rules' => 'required|min_length[12]|max_length[52]'
            ],
            'option_b' => [
                'label' => 'Answer B',
                'rules' => 'required|min_length[12]|max_length[52]'
            ],
            'option_c' => [
                'label' => 'Answer C',
                'rules' => 'required|min_length[12]|max_length[52]'
            ],
            'option_d' => [
                'label' => 'Answer D',
                'rules' => 'required|min_length[12]|max_length[52]'
            ],
            'correct_answer' => [
                'label' => 'Correct Answer',
                'rules' => 'required|min_length[12]|max_length[52]'
            ],
        ])) {
            // When the validation fails, return the form and show error messages if they exist..
            return $this->submit_create_form();
        }
        // Get the validated data that was posted.
        $posts = $this->validator->getValidated();
        // Instantiate the model to use
        $model = model(QuizModel::class);
        // Save validated post data to the database
        $model->save([
            'quiz_question' => $posts['quiz_question'],
            'option_a' => $posts['option_a'],
            'option_b' => $posts['option_b'],
            'option_c' => $posts['option_c'],
            'option_d' => $posts['option_d'],
            'correct_answer' => $posts['correct_answer'],
        ]);
        //Redirect the user to see all of the questions
        return $this->response->redirect(base_url('display'));
    }

    public function display(): string
    {
        $data['title'] = 'Display Quiz';
        $model = model(QuizModel::class);
        $data['query'] = $model->get_quiz();
        return view('partials/header', $data)
            . view('pages/display_quiz');
    }

    // get posts from the form fields upon submission
    public function get_data_from_post(): array
    {
        $data['quiz_question'] = $this->request->getPost('quiz_question');
        $data['option_a'] = $this->request->getPost('option_a');
        $data['option_b'] = $this->request->getPost('option_b');
        $data['option_c'] = $this->request->getPost('option_c');
        $data['option_d'] = $this->request->getPost('option_d');
        $data['correct_answer'] = $this->request->getPost('correct_answer');
        return $data;
    }

    // displays records from the database ready for editing!
    public function edit(): string
    {
        //get the sal_id either from post or from the url
        if ($this->request->getPost()) {
            $quiz_id = $this->request->getpost('quiz_id');
        } else {
            //catch the quiz_id from the url
            $quiz_id = $this->request->getUri()->getSegment(3);
        }
        $data['heading'] = " ";  //sets a heading for the page
        $model = model(QuizModel::class);
        $data['query'] = $model->get_where($quiz_id); //query a row matching the quiz_id
        return view('partials/header')
            . view('pages/edit_quiz', $data);

    }

    //updates form values then updates the database
    public function update(): string
    {
        //catch the quiz_id from the url
        $quiz_id = $this->request->getUri()->getSegment(3);
        //get the posted data from the form
        if ($this->request->getPost()) {
            $data = $this->get_data_from_post();
            $model = model(QuizModel::class);
            //call the update function in tbk_quiz model
            $model->update_question($quiz_id, $data);
        } else {
            echo 'Sorry, no data is available';
        }

        $model = model(QuizModel::class);
        $data['query'] = $model->get_quiz(); //get_where($quiz_id);
        //$data['message'] = $this->session->setFlashdata
        //('message', 'The data was successfully updated');
        return view('partials/header')
            . view('pages/display_quiz', $data);

    }

    //deletes a single record in the database
    public function delete(): string
    {
        $model = model(QuizModel::class);
        //get the posted data from the form
        if ($this->request->getPost()) {
            $quiz_id = $this->request->getPost('quiz_id');
        } else {
            //catch the quiz_id from the url
            $quiz_id = $this->request->getUri()->getSegment(3);
        }
        $model->_delete($quiz_id);
        //redirects to the same page after updating changes
        //return redirect()->to($_SERVER['HTTP_REFERER']);
        $data['title'] = 'Delete';
        $data['query'] = $model->get_quiz(); //for drop down
        return view('partials/header')
            . view('pages/display_quiz', $data);
    }

    // For starting the quiz - returns everything from tbl_quiz
    public function start(): string
    {
        $data['headline'] = "";  //sets a heading for the page
        $model = model(QuizModel::class);
        $data['query'] = $model->findAll();
        return view('partials/header')
            . view('pages/take_quiz', $data);
    }

    /*---------------------- For checking the status of each question e.g. Correct or InCorrect -------------------

     The following sequence is required for keeping the correct answers in the database,
     always keep them in this order D, B, C, C, A
*/
    public function results(): void
    {
        $model = model(QuizModel::class);

        if ($this->request->getPost('quiz_id1') and $this->request->getPost('quiz_id2') and $this->request->getPost('quiz_id3')
            and $this->request->getPost('quiz_id4') and $this->request->getPost('quiz_id5') !== NULL) {

            $data['headline'] = 'Question 1';

            if ($this->request->getPost('quiz_id1') == $model->get_optionD(1)) {
                $data['your_answer1'] = $this->request->getPost('quiz_id1');
                $this->session->set('your_answer1', $data['your_answer1']);
                $data["status"] = 'Correct';
                $data['score1'] = $this->score + 1; //increment the score by 1
                $this->session->set('score1', $data['score1']);  //place score1 into session
                echo view('partials/header')
                    . view('pages/display_results', $data);
            } else {
                $data['your_answer1'] = $this->request->getPost('quiz_id1');
                $this->session->set('your_answer1', $data['your_answer1']);
                $data["status"] = 'Incorrect';
                $data['score1'] = $this->score; // no score
                $this->session->set('score1', $data['score1']);  //place score1 into session
                echo view('partials/header')
                    . view('pages/display_results', $data);
            }


            $data['headline'] = 'Question 2';

            if ($this->request->getPost('quiz_id2') == $model->get_optionB(2)) {
                $data['your_answer2'] = $this->request->getPost('quiz_id2');
                $this->session->set('your_answer2', $data['your_answer2']);
                $data["status"] = 'Correct';
                $data['score2'] = $this->score + 1;                //increment the score by 1
                $this->session->set('score2', $data['score2']);    //place score2 into session
                echo view('partials/header')
                    . view('pages/display_results', $data);
            } else {
                $data['your_answer2'] = $this->request->getPost('quiz_id2');
                $this->session->set('your_answer2', $data['your_answer2']);
                $data["status"] = 'Incorrect';
                $data['score2'] = $this->score; //no score
                $this->session->set('score2', $data['score2']);   //place score2 into session

                echo view('partials/header')
                    . view('pages/display_results', $data);
            }


            $data['headline'] = 'Question 3';

            if ($this->request->getPost('quiz_id3') == $model->get_optionC(3)) {
                $data['your_answer3'] = $this->request->getPost('quiz_id3');
                $this->session->set('your_answer3', $data['your_answer3']);
                $data["status"] = 'Correct';
                $data['score3'] = $this->score + 1;                //increment the score by 1
                $this->session->set('score3', $data['score3']);    //place score3 into session
                echo view('partials/header')
                    . view('pages/display_results', $data);
            } else {
                $data['your_answer3'] = $this->request->getPost('quiz_id3');
                $this->session->set('your_answer3', $data['your_answer3']);
                $data["status"] = 'Incorrect';
                $data['score3'] = $this->score; // no score
                $this->session->set('score3', $data['score3']);  //place score3 into session
                echo view('partials/header')
                    . view('pages/display_results', $data);
            }


            $data['headline'] = 'Question 4';

            if ($this->request->getPost('quiz_id4') == $model->get_optionC(4)) {
                $data['your_answer4'] = $this->request->getPost('quiz_id4');
                $this->session->set('your_answer4', $data['your_answer4']);
                $data["status"] = 'Correct';
                $data['score4'] = $this->score + 1;               //increment score by 1
                $this->session->set('score4', $data['score4']);   //place score4 into session
                echo view('partials/header')
                    . view('pages/display_results', $data);
            } else {
                $data['your_answer4'] = $this->request->getPost('quiz_id4');
                $this->session->set('your_answer4', $data['your_answer4']);
                $data["status"] = 'Incorrect';
                $data['score4'] = $this->score; // no score
                $this->session->set('score4', $data['score4']);  //place score4 into session
                echo view('partials/header')
                    . view('pages/display_results', $data);
            }


            $data['headline'] = 'Question 5';

            if ($this->request->getPost('quiz_id5') == $model->get_optionA(5))
            {
                $data['your_answer5'] = $this->request->getPost('quiz_id5');
                $this->session->set('your_answer5', $data['your_answer5']);
                $data["status"] = 'Correct';
                $data['score5'] = $this->score + 1;                //increment the score by 1
                $this->session->set('score5', $data['score5']);    //place score5 into session
                $data['score1'] = $this->session->get('score1');   //get the value of score1 from session
                $data['score2'] = $this->session->get('score2');   //get the value of score2 from session
                $data['score3'] = $this->session->get('score3');   //get the value of score3 from session
                $data['score4'] = $this->session->get('score4');   //get the value of score4 from session
                $data['score5'] = $this->session->get('score5');   //get the value of score5 from session
                $data['total_score'] = $data['score1'] + $data['score2'] + $data['score3'] + $data['score4'] + $data['score5']; //add the session values together
                $this->session->set('total_score', $data['total_score']); // places the total_score into session
                echo view('partials/header')
                    . view('pages/display_results', $data);
            }
            else
            {
                $data['your_answer5'] = $this->request->getPost('quiz_id5');
                $this->session->set('your_answer5', $data['your_answer5']);
                $data["status"] = 'Incorrect';
                $data['score5'] = $this->score; // no score
                $this->session->set('score5', $data['score5']);  //place score5 into session
                $data['score1'] = $this->session->get('score1');   //get the value of score1 from session
                $data['score2'] = $this->session->get('score2');   //get the value of score2 from session
                $data['score3'] = $this->session->get('score3');   //get the value of score3 from session
                $data['score4'] = $this->session->get('score4');   //get the value of score4 from session
                $data['score5'] = $this->session->get('score5');   //get the value of score5 from session
                $data['total_score'] = $data['score1'] + $data['score2'] + $data['score3'] + $data['score4'] + $data['score5']; //add the session values together
                $this->session->set('total_score', $data['total_score']); // places the total_score into session
                echo view('partials/header')
                    . view('pages/display_results', $data);
            }
        }
        else
        {
            echo $this->radio_button_errors();
        }
    }



    public function submit_results_form(): string //displays a new form to enter quiz details
    {
        $data['title'] = 'Submit Results';
        return view('partials/header', $data)
            . view('pages/submit_results');
    }

    /* submits the quiz takers results to the tbl_result table in the database */
    public function submit_results(): \CodeIgniter\HTTP\ResponseInterface|string
    {
        $data['title'] = 'Submit Results';
        $posted_data = $this->request->getPost(['quiz_taker', 'class','your_answer1',
            'your_answer2','your_answer3','your_answer4','your_answer5','total_score']);
        // Checks whether the submitted data passed the validation rules.
        if (!$this->validateData($posted_data, [
            
            'quiz_taker' => [
                'label' => 'Name',
                'rules' => 'required|min_length[4]|max_length[52]'
            ],
            'class' => [
                'label' => 'Section',
                'rules' => 'required|max_length[52]'
            ],
            // no rules required when retrieving a values from session
        ])) {
            // When the validation fails, return the form and show error messages if they exist..
            return $this->submit_results_form();
        }
        // Get the validated data that was posted.
        $posts = $this->validator->getValidated();
        // instantiate the model to use
        $model = model(ResultModel::class);
        // Save validated post data to the database
        $model->save([
            'quiz_taker' => $posts['quiz_taker'],
            'class' => $posts['class'],
            'your_answer1' => $this->session->get('your_answer1'),
            'your_answer2' => $this->session->get('your_answer2'),
            'your_answer3' => $this->session->get('your_answer3'),
            'your_answer4' => $this->session->get('your_answer4'),
            'your_answer5' => $this->session->get('your_answer5'),
            'total_score' => $this->session->get('total_score'),
        ]);

        //Redirect the user to see all of the questions
        return $this->response->redirect(base_url('display'));
    }

    //if any of the radio button answers are not selected...then
    public function radio_button_errors(): string
    {
        $data['title'] = 'Radio Button Errors';
        $data['message'] = '<h3 class="w3-text-red w3-center">'.'Please answer ALL the questions'.'</h3>';
        return view('partials/header')
            . view('pages/radio_button_errors',$data);
    }


} // end of class