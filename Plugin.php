<?php

namespace Kanboard\Plugin\Gamify;

use Kanboard\Core\Plugin\Base;
use Kanboard\Controller\BaseController;

//use Kanboard\Plugin\Gamify\Action\TaskCloseExperience;
class Plugin extends Base
{
        public function initialize()
        {
            $this->template->setTemplateOverride('project_header/views', 'gamify:project_header/views');
            $this->template->hook->attach('template:layout:head', 'gamify:layout/head');
	    $this->template->hook->attach('template:task:sidebar:actions', 'gamify:gamify/task_sidebar');
	    $this->template->hook->attach('template:task:details:first-column', 'gamify:gamify/task_details');
	    $this->template->hook->attach('template:board:task:icons', 'gamify:gamify/small_task_xp');
	    $this->template->hook->attach('template:header:dropdown', 'gamify:gamify/add_user');
	    $this->on('task.close', function($container){
		$task_id = $this->request->getIntegerParam('task_id');
		$task = $this->taskFinderModel->getDetails($task_id);
		$user = $this->userModel->getByUsername($task['assignee_username']);
		$user_id = $user['id'];
		
		$txp = $this->taskMetadataModel->get($task_id, 'gamifyExperience', '10');
		$uxp = $this->userMetadataModel->get($user_id, 'gamifyExperience', '0');
		$sum = intval($txp) + intval($uxp);
		$x = $this->userMetadataModel->save($user_id, array('gamifyExperience' => $sum));
		return $x;
	    });

	    
	    
           


            //$this->template->setTemplateOverride('board/table_tasks', 'questlog:questlog/table_tasks');

            

        }

}
