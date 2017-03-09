<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;
use Cake\ORM\TableRegistry;
use RestApi\Controller\ApiController;
use EmailQueue\EmailQueue;
use Cake\Console\ShellDispatcher;

class EmailsController extends ApiController
{

    public function add()
    {
        if ($this->request->is(['post'])) {
            $to = $this->request->data('toEmail');
            $data = $this->request->data('emailBody');
            $subject = $this->request->data('emailSubject');

            if (empty($to) || empty($data) || empty($subject)) {
                $this->httpStatusCode = 400;
                $this->apiResponse['message'] = 'Make sure you have set all parameters as array of objects.';
                return;
            }

            $options['subject'] = $subject;

            try {
                // Update user information
                $usersTable = TableRegistry::get('Users');

                    $userEntity = $usersTable->newEntity();
                    $userEntity->email = $to;
                    $usersTable->save($userEntity);

                // Store email request to database
                if (EmailQueue::enqueue($to, $data, $options)) {
                    $this->apiResponse['message'] = 'Request saved successfully in queue.';
                    return;
                } else {
                    $this->httpStatusCode = 400;
                    $this->apiResponse['message'] = 'Failed to save in queue.';
                    return;
                }
            } catch (Exception $e) {
                $this->httpStatusCode = 400;
                $this->apiResponse['message'] = 'Failed to save in queue.';
            }
        } else {
            $this->httpStatusCode = 400;
            $this->apiResponse['message'] = 'Bad request.';
        }
    }

    public function send(){
        $shell = new ShellDispatcher();
        $output = $shell->run(['cake', 'EmailQueue.sender']);

        if (0 === $output) {
            $this->apiResponse['message'] = 'Success from shell command.';
        } else {
            $this->apiResponse['message'] = 'Failure from shell command.';
        }
    }

    public function status() {
        $usersTable = TableRegistry::get('Users');
        $query = $usersTable->find();

        if (($this->request->is('post')) && isset($this->request->data['email']) ) {
            $emails = json_decode($this->request->data('email'), true);
            if (is_array($emails)) {
                $query->where(['email IN' => $emails]);
            }
        }
        $query->select(['email', 'email_count']);
        $users = $query->all();
        $this->apiResponse['message'] = $users;
    }

}
