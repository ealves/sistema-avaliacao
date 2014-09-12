<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class DashboardController extends AppController {

    public function index(){

        $this->loadModel('Course');

        $this->loadModel('Questionary');
        $this->loadModel('Rate');
        $questionary = $this->Questionary->find('first');

        $questionariesRate = $this->Rate->find('list', array('fields' => 'questionary_id', 'group' => array('questionary_id')));
        $coursesRate = $this->Rate->find('list', array('fields' => 'course_id', 'group' => array('course_id')));
        $grades = $this->Rate->find('list', array('fields' => array('grade', 'grade'), 'group' => array('grade')));
//        var_dump($grades);

        $courses = $this->Rate->Course->find('list', array('fields' => array('id', 'name'), 'conditions' => array('id' => $coursesRate)));

        $questionaries = $this->Questionary->find('list', array('recursive' => -1, 'conditions' => array('id' => $questionariesRate)));
        $this->set(compact('questionaries', 'questionary', 'courses', 'grades'));

        $this->loadModel('EvaluationPeriod');
        $evaluationPeriods = $this->EvaluationPeriod->find('list', array('fields' => array('id', 'start'), 'order' => array('start' => 'desc')));

        foreach($evaluationPeriods as $k => $v)
        {
            if((int)date('m', strtotime($v)) < 7)
                $evaluationPeriods[$k] = (int)date('Y', strtotime($v)) . ' - 1º Semestre';
            else
                $evaluationPeriods[$k] = (int)date('Y', strtotime($v)) . ' - 2º Semestre';
        }
        $periods = $evaluationPeriods;

        $this->set(compact('questionaries', 'questionary', 'courses', 'grades', 'periods'));

        $course_id = 0;
        if(isset($this->request->query['course_id']))
            $course_id = $this->request->query['course_id'];

        $this->set('course_id', $course_id);
    }

    public function report(){

        /*if($this->request->query['grade'] == 0 OR $this->request->query['course_id'] == ''){
            $this->Session->setFlash(__('Selecione o curso e o período'));
            $this->redirect(array('action' => 'index'));
        }*/

        if (isset($this->request->query['period']))
            $period_id = $this->request->query['period'];
            $this->set('period', $period_id);

        if (isset($this->request->query['question_id']))
            $question_id = $this->request->query['question_id'];

        if (isset($this->request->query['course_id']))
            $course_id = $this->request->query['course_id'];

        if (isset($this->request->query['questionary_id']))
            $questionary_id = $this->request->query['questionary_id'];

        if (isset($this->request->query['grade'])){
            $grade = $this->request->query['grade'];
            $this->set('grade', $grade);
        }

        $this->loadModel('Rate');
        $this->loadModel('Question');

        $this->loadModel('Course');
        $this->set('course', $this->Course->find('first', array('recursive' => -1, 'conditions' => array('id' => $this->request->query['course_id']))));

        $courses = $this->Course->find('all');
        $this->loadModel('Questionary');
        $questionary = $this->Questionary->find('first', array('conditions' => array('id' => $questionary_id)));
        $this->set('questionary', $questionary);
        $this->set('courses', $courses);

//        var_dump($questionary);
        if($questionary['Questionary']['subjects'])
        {
//            echo 'ok';
            $conditions = array();
            if($course_id != '')
                $conditions['CourseSubject.course_id'] = $course_id;

            if($grade != '')
               $conditions['CourseSubject.grade'] = $grade;

            if($this->Auth->user('role_id') == 3)
                $conditions['CourseSubject.user_id'] = $this->Auth->user('id');

            $this->loadModel('CourseSubject');
            $subjects = $this->CourseSubject->find('all', array('fields' => array('Subject.*'),
                                                                'conditions' => $conditions
                                                                )
                                                   );

//            var_dump($subjects);
            $this->set('subjects', $subjects);

            $questions = $this->Questionary->find('all', array('recursive' => -1,
                                                                 'fields' => array('Question.*'),
                                                                'conditions' => array('Questionary.id' => $questionary_id),
                                                            'joins' => array(
                                                                array(
                                                                    'table' => 'questionary_questions',
                                                                    'alias' => 'QuestionaryQuestion',
                                                                    'type' => 'INNER',
                                                                    'conditions' => array('QuestionaryQuestion.questionary_id = Questionary.id')
                                                                ),
                                                                array(
                                                                    'table' => 'questions',
                                                                    'alias' => 'Question',
                                                                    'type' => 'INNER',
                                                                    'conditions' => array('QuestionaryQuestion.question_id = Question.id')
                                                         ))));
            //var_dump($questions);
            if(empty($questions))
            {
                $this->Session->setFlash(__('Não há avaliação para este relatório'));
                $this->redirect(array('action' => 'index'));
            }

            $i = 0;



            foreach ( $questions as $question){

    //            var_dump($question['Question']['name']);
                $data = array();
                foreach ( $subjects as $subject){
    //                var_dump($subject['Subject']['name']);

                    $conditions = array();
                    $conditions['Rate.evaluation_period_id'] = $period_id;

                    if($grade != '')
                        $conditions['Rate.grade'] = $grade;

                    $conditions['Rate.question_id'] = $question['Question']['id'];
                    $conditions['Rate.subject_id'] = $subject['Subject']['id'];

                    $results = $this->Rate->find('all', array('recursive' => -1, 'fields' => array('SUM(Rate.rate) AS Rate, COUNT(*) Total'),
                                                              'conditions' => $conditions
                                                                                    //'Rate.course_id' => $subject['Subject']['id'],
                                                                                    //'Rate.grade' => $grade),
                                                              //'group' => array('Rate.question_id'),
                                                               ));
//                    var_dump($results);
                    if(isset($results[0][0]['Rate']))
                        $data[] = $results[0][0]['Rate']/$results[0][0]['Total'];
                    else
                        $data[] = '-';
                }

                $questions[$i]['Question']['average'] = $data;
                $i++;
            }

            $this->set('questions', $questions);
        }
        else
        {
            /*$this->loadModel('QuestionaryQuestion');
            $questions = $this->QuestionaryQuestion->find('all', array('recursive' => -1, 'fields' => array('Questions.*, SUM(Rate.rate) AS Total'),
                                                                'conditions' => array('QuestionaryQuestion.questionary_id' => $questionary_id
                                                                ),
                                                              'joins' => array(
                                                                  array(
                                                                      'table' => 'questions',
                                                                      'alias' => 'Questions',
                                                                      'type' => 'INNER',
                                                                      'conditions' => array('QuestionaryQuestion.question_id = Questions.id',
                                                                      )
                                                                  ),

                                                                array(
                                                                    'table' => 'rates',
                                                                    'alias' => 'Rate',
                                                                    'type' => 'INNER',
                                                                    'conditions' => array(//'Rate.questionary_id = QuestionaryQuestion.questionary_id',
                                                                                          'Rate.question_id = QuestionaryQuestion.question_id',
                                                                                          'Rate.grade = 7',
                                                                                          )
                                                                     )
                                                                 )
                                                              )
                                                          );*/

            $this->loadModel('Rate');

            $conditions = array();

            $conditions['Rate.evaluation_period_id'] = $period_id;

            if(isset($questionary_id))
                $conditions['Rate.questionary_id'] = $questionary_id;
            if($course_id != '')
                $conditions['Rate.course_id'] = $course_id;
            if($grade != '')
                $conditions['Rate.grade'] = $grade;

            $questions = $this->Rate->find('all', array('recursive' => -1, 'fields' => array('Question.*, SUM(Rate.rate) AS Rate, COUNT(*) AS Votes'),
                                                    'conditions' => $conditions,
                                                    'group' => array('Question.id'),
                                                                'joins' => array(
                                                                    array(
                                                                        'table' => 'questions',
                                                                        'alias' => 'Question',
                                                                        'type' => 'INNER',
                                                                        'conditions' => array('Rate.question_id = Question.id',
                                                                        )
                                                                    )
                                                                )
                                                            )
                                                        );

//            var_dump($questions);
            $this->set('questions', $questions);
        }

    }

    public function comments(){

        $conditions = array();
        $grade = '';
        if ($this->request->query['period'])
            $conditions['evaluation_period_id'] = $this->request->query['period'];

        if ($this->request->query['course_id'])
            $conditions['course_id'] = $this->request->query['course_id'];

        if ($this->request->query['questionary_id'])
            $conditions['questionary_id'] = $this->request->query['questionary_id'];

        if ($this->request->query['grade']){
            $grade = $this->request->query['grade'];
            $conditions['grade'] = $grade;
        }

        $this->set('grade', $grade);

        $this->loadModel('Course');
        $this->set('course', $this->Course->find('first', array('recursive' => -1, 'conditions' => array('id' => $this->request->query['course_id']))));

        $courses = $this->Course->find('all');
        $this->loadModel('Questionary');
        $this->loadModel('Comments');
        $questionary = $this->Questionary->find('first', array('conditions' => array('id' => $conditions['questionary_id'])));
        $this->set('questionary', $questionary);
        $this->set('courses', $courses);

        $comments = $this->Comments->find('all', array('conditions' => $conditions));
        $this->set('comments', $comments);

    }

    public function setPass()
    {
        $this->loadModel('User');
        $this->autoRender = false;
        //$users = $this->User->find('all');
        $users = $this->User->find('all', array('conditions' => array('User.role_id' => 4)));

        $data = array();
        foreach ($users as $user)
        {
            $pass = AuthComponent::password($user['User']['funcional']);


            $data[] = array('User' => array('id' => $user['User']['id'],
                'password' => $pass
            )
            );

        }
        var_dump($data);
        $this->User->saveAll($data);
    }
}