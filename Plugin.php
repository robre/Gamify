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
	    //$this->helper->register('myTask', '\Kanboard\Plugins\Gamify\Helper\TaskHelper'); // ohne .php?
//	    $this->helper->register('myTask', 'gamify:TaskHelper'); // ohne .php?
	    //$this->template->hook->attach('template:task:form:third-column', 'gamify:gamify/add_task');
	    //$this->hook->on('controller:task:form:default', function (array $default_values) {
            //return empty($default_values['experience']) ? array('experience' => 10) : array();
        //});
	    $this->template->hook->attach('template:task:sidebar:actions', 'gamify:gamify/task_sidebar');
	    $this->template->hook->attach('template:task:details:first-column', 'gamify:gamify/task_details');
	    $this->template->hook->attach('template:board:task:icons', 'gamify:gamify/small_task_xp');
	    $this->on('task.close', function($container){
	   	//error_log(var_dump($container));
		    //
		    //
		    //
		$task_id = $this->request->getIntegerParam('task_id');
		$task = $this->taskFinderModel->getDetails($task_id);
		$user = $this->userModel->getByUsername($task['assignee_username']);
		$user_id = $user['id'];
		
		$txp = $this->model->taskMetadataModel->get($task_id, 'gamifyExperience', '10');
		$uxp = $this->model->userMetadataModel->get($user_id, 'gamifyExperience', '0');
		$sum = intval($txp) + intval($uxp);
		$x = $this->model->userMetadataModel->save($user_id, array('gamifyExperience' => $sum));
		return $x;



/*
		echo "<pre>";
		//echo var_dump($container);
		echo "-xxx-\n";
		echo var_dump($task);
		echo var_dump($user);
		echo "--------------";
		echo "--------------2";
		//echo var_dump($container->getTaskId());
		echo "</pre>";
		die("ok");*/


	    });

	    //$this->actionManager->register(new TaskCloseExperience($this->container));	    
	    
	    
           


            //$this->template->setTemplateOverride('board/table_tasks', 'questlog:questlog/table_tasks');

            
//            $this->route->addRoute('/questlog', 'questlogViewController', 'show', 'questlog');

        }

}
