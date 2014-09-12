<?php
App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');
/**
 * Questionaries Controller
 *
 * @property Questionary $Questionary
 */
class EvaluationController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {

        if ( $this->Auth->user('role_id') < 4 )
        {
            $this->redirect('/evaluation/view/3');
        }
        else
        {
            /*$this->loadModel('Voter');
            $voter = $this->Voter->find('first', array('conditions' => array('user_id' => $this->Auth->user('id'))));

            //var_dump($voter);

            if ( $voter )
            {
                $this->Session->setFlash(__('Obrigado por votar!!!'));
                $this->redirect('/users/login');
            }*/

            if($this->Session->read('Hash'))
            {
                $this->loadModel('TempRate');
                $answered = $this->TempRate->find('first', array(//'fields' => array('question_id', 'questionary_id'),
                                                                'conditions' => array('hash' => $this->Session->read('Hash')),

                    /*'joins' => array(
                        array(
                            'table' => 'questionaries',
                            'alias' => 'Questionary',
                            'type' => 'INNER',
                            'conditions' => array('TempRate.questionary_id = Questionary.id')
                        ))*/
                ));

//                var_dump($answered);

                if ( $answered )
                {
                    $this->loadModel('QuestionaryRole');
                    $questionaries_neighbors = $this->QuestionaryRole->find('first', array(
                            'conditions' => array(
                                'QuestionaryRole.role_id' => $this->Auth->user('role_id'),
                                'status' => 1,
                                'Questionary.order >' => $answered['Questionary']['order']
                            ),
                            'order' => array('Questionary.order ASC'))
                    );
//                    var_dump($questionaries_neighbors);
                    $this->redirect('/evaluation/view/' . $questionaries_neighbors['Questionary']['id'] . '?grade=' . $this->Auth->user('grade') . '&course_id=' . $this->Auth->user('course_id'));
                }

            }
            $this->redirect('/evaluation/view?grade=' . $this->Auth->user('grade') . '&course_id=' . $this->Auth->user('course_id') . '&questionary_id=1');
        }

        $this->Session->delete('Student.id');
        $this->loadModel('Course');

        $courses = $this->Course->find('list', array('fields' => array('id', 'name')));
        //var_dump($courses);

        $this->loadModel('Questionary');
        $questionary = $this->Questionary->find('first');
        $this->set('questionary', $questionary);

        $this->set('courses', $courses);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {

        if($this->Auth->user('role_id') != 4)
        {
            $this->loadModel('EvaluationPeriod');

            $period = $this->EvaluationPeriod->find('first', array('order' => array('start' => 'desc')));
            $periodDateStart = strtotime($period['EvaluationPeriod']['start']);
            $periodDateEnd = strtotime($period['EvaluationPeriod']['end']);
            $dateNow = strtotime(date('Y-m-d H:i:s'));
            $periodOfEvaluation = false;

            if($dateNow >= $periodDateStart AND $dateNow <= $periodDateEnd){
                $this->Session->write('evaluation_period_id', $period['EvaluationPeriod']['id']);
                $periodOfEvaluation = true;
            }

            if($periodOfEvaluation){
                $this->loadModel('Voter');
                $voter = $this->Voter->find('first', array('conditions' => array('user_id' => $this->Auth->user('id'),
                    'datetime >=' => $period['EvaluationPeriod']['start'],
                    'datetime <=' => $period['EvaluationPeriod']['end'])));
                if($voter){
                    $this->Session->setFlash(__('Obrigado por votar!!!'));
                    $this->redirect('/dashboard');
                }
            }else{
                $this->Session->setFlash(__('Período de avaliação encerrado!!!'));
                $this->redirect('/dashboard');
            }
        }

        if($id == null AND $this->request->query['grade'] == 0 ){
            //$this->Session->setFlash(__('Selecione o curso e o período'));
            $this->redirect(array('action' => 'index'));
        }
        //echo $this->Session->read('Student.id');

        $this->loadModel('Questionary');

        if (isset($this->request->query['question_id']))
            $question_id = $this->request->query['question_id'];

        if ($this->Auth->user('course_id') > 0)
            $course_id = $this->Auth->user('course_id');

        if (isset($this->request->query['questionary_id']))
            $questionary_id = $this->request->query['questionary_id'];


        if (isset($this->request->query['grade'])){
            $grade = $this->request->query['grade'];
        }

        /*if ( $this->Session->read('User') AND $this->Session->read('User') != $this->Auth->user('id'))
            $this->Session->write('Hash', '');*/


        if ( !$this->Session->read('Hash') ){
            //$this->loadModel('Voter');
            //$this->Voter->create();
            $hash = md5(date('Y-m-d H:i:s') . rand(0, 999) . $this->Auth->user('id'));
            //$this->Voter->save(array('Voter' => array('id' => $hash, 'user_id' => $this->Auth->user('id'), 'datetime' => date('Y-m-d H:i:s'))));

            $this->Session->write('Hash', $hash);
            $this->Session->write('idUser', $this->Auth->user('id'));

        }

        /*if ( isset($hash) OR $this->Session->read('Hash'))
        {*/
            $this->loadModel('TempRate');
            $answered = $this->TempRate->find('list', array('fields' => array('question_id'),
                                                            'conditions' => array('hash' => $this->Session->read('Hash')),
                                                            'group' => array('question_id')
                                                            ));
        //}

//        var_dump($answered);

        $this->loadModel('QuestionaryQuestion');

        if ( isset($course_id) AND $id == null ){

            //echo 'ok';
            $this->loadModel('Subject');

            if (isset($this->request->query['question_id'])){
                $question = $this->QuestionaryQuestion->find('first',
                                                                array('conditions' => array('question_id' => $question_id, 'Question.status' => 1),
                                                                    'order' => array('Question.type_id' => 'ASC')
                                                                        )
                                                             );
            }else{
                $question = $this->QuestionaryQuestion->find('first',
                                                                array(
                                                                  'conditions' => array('questionary_id' => $questionary_id,
                                                                                        'Question.status' => 1,
                                                                                        'Question.id !=' => $answered
                                                                                    ),
                                                                    'order' => array('Question.type_id' => 'ASC')
                                                                    )

                                                             );
            }

            $questionsCount = $this->QuestionaryQuestion->find('count',
                                                                    array(
                                                                          'conditions' => array('questionary_id' => $questionary_id,
                                                                                                'Question.status' => 1
                                                                          )
                                                                    )
                                                                );

//            var_dump($question);

            if ( !$question ){
                $this->Session->setFlash(__('Não há perguntas para esta avaliação'));
                $this->redirect(array('action' => 'index'));
            }

            $questions_neighbors = $this->QuestionaryQuestion->find('neighbors', array('field' => 'id', 'value' => $question['Question']['id'],
                                                                                        'conditions' => array('questionary_id' => $questionary_id,
                                                                                                              'Question.status' => 1)));

            $this->set('questions_neighbors', $questions_neighbors);
            $this->set('question', $question);
            $this->set('questionary_id', $questionary_id);
            $this->set('course_id', $course_id);
            $this->set('questionsCount', $questionsCount);

//            echo $grade;
            $this->loadModel('CourseSubject');
            $subjects = $this->CourseSubject->find('all', array('fields' => array('CourseSubject.id', 'Subject.*', 'User.name'),
                                                                'conditions' => array('CourseSubject.course_id' => $course_id,
                                                                'CourseSubject.grade' => $grade)
            ));

//            var_dump($subjects);
            $this->set('subjects', $subjects);
            $this->set('grade', $grade);

            $questionary = $this->Questionary->find('first', array('conditions' => array('id' => $questionary_id)));
            $this->set('questionary', $questionary);

//            var_dump($question['Question']['id']);
            //var_dump(CakeSession::read('question_number'));
            //var_dump(CakeSession::read('question_id'));

//            echo var_dump($questionsCount);
//            echo var_dump(count($answered));
//            var_dump($answered);
            if ( count($answered) > 0 )
            {
                //$questionsCount = (int)$questionsCount-count($answered);
                CakeSession::write('question_number', count($answered)+1);
            }
            else
            {
                CakeSession::write('question_number', 1);
            }

            /*if ( CakeSession::read('question_number') AND $question['Question']['id'] != CakeSession::read('question_id')){
                $question_number = (int)CakeSession::read('question_number');
                CakeSession::write('question_number', $question_number+1);

                if(!isset($question_id))
                    CakeSession::write('question_number', 1);
            }else{
                CakeSession::write('question_number', 1);
            }
            CakeSession::write('question_id', $question['Question']['id']);*/
        }
        else
        {
            $questions = $this->QuestionaryQuestion->find('all',
                                                          array('conditions' => array('questionary_id' => $id,
                                                                                      'question_id !=' => $answered
                                                                                      )
                                                               )
                                                          );


            $this->set('questions', $questions);
            $this->set('questionary_id', $id);

            $questionary = $this->Questionary->find('first', array('conditions' => array('id' => $id)));
            $this->set('questionary', $questionary);
        }

        if(isset($course_id)){
//            var_dump((int)$course_id);
                $this->loadModel('Course');
                $course = $this->Course->find('first', array('conditions' => array('id' => $course_id)));
                $this->set('course', $course);
        }

        $this->loadModel('QuestionaryRole');
        $questionaries = $this->QuestionaryRole->find('all', array('conditions' => array('role_id' => $this->Auth->user('role_id')),
                                                                    'order' => array('Questionary.order ASC')));

        /*var_dump($questionaries);
        var_dump($questionary);*/
        if($id == null)
            $id = $questionary_id;

        $questionaries_neighbors = $this->QuestionaryRole->find('first', array(
            'conditions' => array(
                                        'QuestionaryRole.role_id' => $this->Auth->user('role_id'),
                                        'status' => 1,
                                        'Questionary.order >' => $questionary['Questionary']['order']
                                        ),
                                        'order' => array('Questionary.order ASC'))
                );

//        var_dump($questionaries_neighbors);
        $this->set('questionaries_neighbors', $questionaries_neighbors);
	}

}
