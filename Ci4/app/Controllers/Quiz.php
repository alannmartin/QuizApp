<?php namespace App\Controllers;

use App\Models\QuizModel;
use App\Models\ResultModel;
use CodeIgniter\Session\Session;
use Config\Database;
use Config\Services;
use Exception;

/**
 *
 */
class Quiz extends BaseController
{
    //instance variables
    protected Session $session;
    public $builder;
    public QuizModel $quizModel;
    public int $score;
    public string $users; //to be used for teachers dropdown

    /**
     *
     */
    public function __construct()
    {
        helper(['form', 'url', 'file', 'array', 'text']);
        //initialise Codeigniter Services
        $this->session = Services::session();
        $this->request = Services::request();
        $db = Database::connect();
        //instantiate the Quiz model which is used in this class
        $this->quizModel = new QuizModel();
        $this->db = Database::connect();
        $this->session->start(); //start the session services in CodeIgniter 4
        $this->score = 0; //set the score to zero

        //if a user is logged in, then fetch their credentials
        if (auth()->loggedIn()) {
            $this->user = auth()->user()->username; //fetch the username from shield auth()
            $this->user_id = auth()->id(); //fetch the user_id from shield auth()
        }
    }


    /**
     * @return string
     */
    public function index(): string
    {
        $quizModel = new QuizModel();
        $data['question'] = $quizModel->findAll();
        return view('pages/quiz/create_quiz',$data);
    }
    /**
     * @return string
     */
    public function find_teachers_quiz(): string
    {
        $model = model(QuizModel::class);
        //initialise Codeigniter Services
        $this->session = Services::session();
        $this->request = Services::request();

        $teacher = $this->request->getPost('teacher');
        $this->session->set('teacher', $teacher); //grab the teachers name in a session

        if ($this->request->getPost('teacher')) {
            $data['query'] = $model->get_teachers_quiz(); //based on search criteria
            return view('pages/quiz/take_quiz', $data);
        } else {
            //load the appropriate error page
           return view('pages/quiz/error_select_a_teacher');
        }
    }

    public function resultDisplay() //currently only accepts 5 questions
    {
        //initialise Codeigniter Services
        $this->session = Services::session();
        $this->request = Services::request();

        if ($this->request->getPost('ID1') and $this->request->getPost('ID2') and $this->request->getPost('ID3')
            and $this->request->getPost('ID4') and $this->request->getPost('ID5') !== NULL)
        {
            $data['posted'] = array(
                'ques1' => $this->request->getPost('ID1'),
                'ques2' => $this->request->getPost('ID2'),
                'ques3' => $this->request->getPost('ID3'),
                'ques4' => $this->request->getPost('ID4'),
                'ques5' => $this->request->getPost('ID5'),
            );

            //put the posted answers into session
            $this->session->set('your_answer1', $this->request->getPost('ID1'));
            $this->session->set('your_answer2', $this->request->getPost('ID2'));
            $this->session->set('your_answer3', $this->request->getPost('ID3'));
            $this->session->set('your_answer4', $this->request->getPost('ID4'));
            $this->session->set('your_answer5', $this->request->getPost('ID5'));


            $model = model(QuizModel::class);
            $data['results'] = $model->getQuestions();
            return view('pages/quiz/result_display', $data);

        }

        if ($this->request->getPost('ID6') and $this->request->getPost('ID7') and $this->request->getPost('ID8')
            and $this->request->getPost('ID9') and $this->request->getPost('ID10') !== NULL)
        {
            $data['posted'] = array(
                'ques6' => $this->request->getPost('ID6'),
                'ques7' => $this->request->getPost('ID7'),
                'ques8' => $this->request->getPost('ID8'),
                'ques9' => $this->request->getPost('ID9'),
                'ques10' => $this->request->getPost('ID10'),
            );

            //put the posted answers into session
            $this->session->set('your_answer1', $this->request->getPost('ID6'));
            $this->session->set('your_answer2', $this->request->getPost('ID7'));
            $this->session->set('your_answer3', $this->request->getPost('ID8'));
            $this->session->set('your_answer4', $this->request->getPost('ID9'));
            $this->session->set('your_answer5', $this->request->getPost('ID10'));

            $model = model(QuizModel::class);
            $data['results'] = $model->getQuestions();
            return view('pages/quiz/result_display', $data);

        }

        if ($this->request->getPost('ID11') and $this->request->getPost('ID12') and $this->request->getPost('ID13')
            and $this->request->getPost('ID14') and $this->request->getPost('ID15') !== NULL)
        {
            $data['posted'] = array(
                'ques11' => $this->request->getPost('ID11'),
                'ques12' => $this->request->getPost('ID12'),
                'ques13' => $this->request->getPost('ID13'),
                'ques14' => $this->request->getPost('ID14'),
                'ques15' => $this->request->getPost('ID15'),
            );

            //put the posted answers into session
            $this->session->set('your_answer1', $this->request->getPost('ID11'));
            $this->session->set('your_answer2', $this->request->getPost('ID12'));
            $this->session->set('your_answer3', $this->request->getPost('ID13'));
            $this->session->set('your_answer4', $this->request->getPost('ID14'));
            $this->session->set('your_answer5', $this->request->getPost('ID15'));

            $model = model(QuizModel::class);
            $data['results'] = $model->getQuestions();
            return view('pages/quiz/result_display', $data);

        }

        if ($this->request->getPost('ID16') and $this->request->getPost('ID17') and $this->request->getPost('ID18')
            and $this->request->getPost('ID19') and $this->request->getPost('ID20') !== NULL)
        {
            $data['posted'] = array(
                'ques16' => $this->request->getPost('ID16'),
                'ques17' => $this->request->getPost('ID17'),
                'ques18' => $this->request->getPost('ID18'),
                'ques19' => $this->request->getPost('ID19'),
                'ques20' => $this->request->getPost('ID20'),

            );

            //put the posted answers into session
            $this->session->set('your_answer1', $this->request->getPost('ID16'));
            $this->session->set('your_answer2', $this->request->getPost('ID17'));
            $this->session->set('your_answer3', $this->request->getPost('ID18'));
            $this->session->set('your_answer4', $this->request->getPost('ID19'));
            $this->session->set('your_answer5', $this->request->getPost('ID20'));

            $model = model(QuizModel::class);
            $data['results'] = $model->getQuestions();
            return view('pages/quiz/result_display', $data);

        }

        if ($this->request->getPost('ID21') and $this->request->getPost('ID22') and $this->request->getPost('ID23')
            and $this->request->getPost('ID24') and $this->request->getPost('ID25') !== NULL)
        {
            $data['posted'] = array(
                'ques21' => $this->request->getPost('ID21'),
                'ques22' => $this->request->getPost('ID22'),
                'ques23' => $this->request->getPost('ID23'),
                'ques24' => $this->request->getPost('ID24'),
                'ques25' => $this->request->getPost('ID25'),

            );

            //put the posted answers into session
            $this->session->set('your_answer1', $this->request->getPost('ID21'));
            $this->session->set('your_answer2', $this->request->getPost('ID22'));
            $this->session->set('your_answer3', $this->request->getPost('ID23'));
            $this->session->set('your_answer4', $this->request->getPost('ID24'));
            $this->session->set('your_answer5', $this->request->getPost('ID25'));

            $model = model(QuizModel::class);
            $data['results'] = $model->getQuestions();
            return view('pages/quiz/result_display', $data);

        }

        if ($this->request->getPost('ID26') and $this->request->getPost('ID27') and $this->request->getPost('ID28')
            and $this->request->getPost('ID29') and $this->request->getPost('ID30') !== NULL)
        {
            $data['posted'] = array(
                'ques26' => $this->request->getPost('ID26'),
                'ques27' => $this->request->getPost('ID27'),
                'ques28' => $this->request->getPost('ID28'),
                'ques29' => $this->request->getPost('ID29'),
                'ques30' => $this->request->getPost('ID30'),

            );

            //put the posted answers into session
            $this->session->set('your_answer1', $this->request->getPost('ID26'));
            $this->session->set('your_answer2', $this->request->getPost('ID27'));
            $this->session->set('your_answer3', $this->request->getPost('ID28'));
            $this->session->set('your_answer4', $this->request->getPost('ID29'));
            $this->session->set('your_answer5', $this->request->getPost('ID30'));

            $model = model(QuizModel::class);
            $data['results'] = $model->getQuestions();
            return view('pages\quiz\result_display', $data);

        }

        if ($this->request->getPost('ID31') and $this->request->getPost('ID32') and $this->request->getPost('ID33')
            and $this->request->getPost('ID34') and $this->request->getPost('ID35') !== NULL)
        {
            $data['posted'] = array(
                'ques31' => $this->request->getPost('ID31'),
                'ques32' => $this->request->getPost('ID32'),
                'ques33' => $this->request->getPost('ID33'),
                'ques34' => $this->request->getPost('ID34'),
                'ques35' => $this->request->getPost('ID35'),

            );

            //put the posted answers into session
            $this->session->set('your_answer1', $this->request->getPost('ID31'));
            $this->session->set('your_answer2', $this->request->getPost('ID32'));
            $this->session->set('your_answer3', $this->request->getPost('ID33'));
            $this->session->set('your_answer4', $this->request->getPost('ID34'));
            $this->session->set('your_answer5', $this->request->getPost('ID35'));

            $model = model(QuizModel::class);
            $data['results'] = $model->getQuestions();
            return view('pages/quiz/result_display', $data);

        }

        if ($this->request->getPost('ID36') and $this->request->getPost('ID37') and $this->request->getPost('ID38')
            and $this->request->getPost('ID39') and $this->request->getPost('ID40') !== NULL)
        {
            $data['posted'] = array(
                'ques36' => $this->request->getPost('ID36'),
                'ques37' => $this->request->getPost('ID37'),
                'ques38' => $this->request->getPost('ID38'),
                'ques39' => $this->request->getPost('ID39'),
                'ques40' => $this->request->getPost('ID40'),

            );

            //put the posted answers into session
            $this->session->set('your_answer1', $this->request->getPost('ID36'));
            $this->session->set('your_answer2', $this->request->getPost('ID37'));
            $this->session->set('your_answer3', $this->request->getPost('ID38'));
            $this->session->set('your_answer4', $this->request->getPost('ID39'));
            $this->session->set('your_answer5', $this->request->getPost('ID40'));

            $model = model(QuizModel::class);
            $data['results'] = $model->getQuestions();
            return view('pages/quiz/result_display', $data);

        }
        else
        {
            echo $this->radio_button_errors(); //All the questions must be answered
        }


    } //end function



    public function submit_create_form(): string //displays a new form to enter quiz details
    {
        $model = model(QuizModel::class);
        $data['rowCount'] = $model->getNumRows();
        return view('pages/quiz/create_quiz',$data);
    }

    /**
     * @throws \ReflectionException
     */
    public function create(): \CodeIgniter\HTTP\ResponseInterface|string
    {
        helper(['form', 'url', 'file', 'array', 'text']);
        $posted_data = $this->request->getPost(['question', 'choice1', 'choice2', 'choice3', 'choice4', 'answer']);

        // Checks whether the submitted data passes the validation rules.
        if (!$this->validateData($posted_data, [

            'question' => [
                'label' => 'Question',
                'rules' => 'required|min_length[2]|max_length[52]'
            ],
            'choice1' => [
                'label' => 'Answer A',
                'rules' => 'required|min_length[2]|max_length[52]'
            ],
            'choice2' => [
                'label' => 'Answer B',
                'rules' => 'required|min_length[2]|max_length[52]'
            ],
            'choice3' => [
                'label' => 'Answer C',
                'rules' => 'required|min_length[2]|max_length[52]'
            ],
            'choice4' => [
                'label' => 'Answer D',
                'rules' => 'required|min_length[2]|max_length[52]'
            ],
            'answer' => [
                'label' => 'Correct Answer',
                'rules' => 'required|min_length[2]|max_length[52]'
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
            'question' => $posts['question'],
            'choice1' => $posts['choice1'],
            'choice2' => $posts['choice2'],
            'choice3' => $posts['choice3'],
            'choice4' => $posts['choice4'],
            'answer' => $posts['answer'],
            'user_id' => $this->user_id,
            'user' => $this->user
        ]);

        //Redirect the user to see all of the questions
        return $this->response->redirect(base_url('display'));
    }

    public function display(): string
    {
        $model = model(QuizModel::class);
        $data['query'] = $model->get_quiz();
        return view('pages/quiz/display_quiz',$data);
    }

    // get posts from the form fields upon submission
    public function get_data_from_post(): array
    {
        $data['question'] = $this->request->getPost('question');
        $data['choice1'] = $this->request->getPost('choice1');
        $data['choice2'] = $this->request->getPost('choice2');
        $data['choice3'] = $this->request->getPost('choice3');
        $data['choice4'] = $this->request->getPost('choice4');
        $data['answer'] = $this->request->getPost('answer');
        return $data;
    }

    // displays records from the database ready for editing!
    public function edit(): string
    {
        //get the sal_id either from post or from the url
        if ($this->request->getPost()) {
            $quizID = $this->request->getpost('quizID');
        } else {
            //catch the quizID from the url
            $quizID = $this->request->getUri()->getSegment(3);
        }
        $model = model(QuizModel::class);
        $data['query'] = $model->get_where($quizID); //query a row matching the quiz_id
        return view('pages/quiz/edit_quiz', $data);

    }

    //updates form values then updates the database
    public function update(): string
    {
        //catch the quiz_id from the url
        $quizID = $this->request->getUri()->getSegment(3);
        //get the posted data from the form
        if ($this->request->getPost()) {
            $data = $this->get_data_from_post();
            $model = model(QuizModel::class);
            //call the update function in model
            $model->update_question($quizID, $data);
        } else {
            echo 'Sorry, no data is available';
        }

        $model = model(QuizModel::class);
        $data['query'] = $model->get_quiz(); //get_where($quiz_id);
        //$data['message'] = $this->session->setFlashdata
        //('message', 'The data was successfully updated');
        return view('pages/quiz/display_quiz', $data);

    }

    //deletes a single record in the database
    public function delete(): string
    {
        $model = model(QuizModel::class);
        //get the posted data from the form
        if ($this->request->getPost()) {
            $quizID = $this->request->getPost('quizID');
        } else {
            //catch the quiz_id from the url
            $quizID = $this->request->getUri()->getSegment(3);
        }
        $model->_delete($quizID);
        //redirects to the same page after updating changes
        //return redirect()->to($_SERVER['HTTP_REFERER']);
        $data['query'] = $model->get_quiz(); //for drop down
        return view('pages/quiz/display_quiz', $data);
    }

    public function submit_results_form(): string //displays a new form to enter quiz details
    {
       return view('pages/result/submit_results');
    }

    /* submits the quiz takers results to the tbl_result table in the database */
    public function submit_results(): \CodeIgniter\HTTP\ResponseInterface|string
    {
        $posted_data = $this->request->getPost(['quiz_taker', 'class', 'your_answer1',
            'your_answer2', 'your_answer3', 'your_answer4', 'final']);
            
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
            'final' => $this->session->get('score'),
            'user' => $this->session->get('teacher'), //session from the dropdown form
        ]);

        //Redirect the user to see all of the results from the quiz1 controller
        return $this->response->redirect(base_url('success'));
        //return redirect()->to($_SERVER['HTTP_REFERER'],'refresh');
    }

    public function success(): string
    {
        //return $this->response->redirect(base_url('quiz/results'));
        return view('pages/quiz/success');
    }

    //if any of the radio button answers are not selected...then
    public function radio_button_errors(): string
    {
        $data['message'] = '<h6 class="w3-container w3-padding w3-text-sand w3-center">' . 'Please answer ALL the questions' . '</h6>';
        return view('pages/quiz/radio_button_errors');
    }


    public function find_teacher(): string
    {
        $model = model(QuizModel::class);
        $data['teachers'] = $model->get_teachers_names(); //gets the unique teachers names for a dropdown
        return view('pages/quiz/find_teacher', $data);

    }

    public function tests(): string
    {
        $model = model(QuizModel::class);
        $data['query'] = $model->get_teachers_quiz(); //based on search criteria
        return view('pages/tests', $data);
    }

    public function get_quiz_ids(): string
    {
        $model = model(QuizModel::class);
        $data['query'] = $model->get_quiz_ids();
        return view('pages/tests', $data);
    }

    // function for counting the number of rows in the table for each teacher and returns an array
    public function countRowsForEachTeacher(): int|string
    {
        //$table = $this->get_table();
        $db = \Config\Database::connect();
        $this->builder = $db->table('quiz_questions');
        $this->builder->select('user');
        $this->builder->where('user', $this->session->get('teacher'));
        $query = $this->builder->countAllResults();
        return $query;
    }


} //end of class






