<?php
//namespace Kanboard\Controller;
namespace Kanboard\Plugin\Gamify\Controller;
use Kanboard\Controller\BaseController;
use Kanboard\Core\Controller\AccessForbiddenException;
use Kanboard\Model\TaskModel;
use Kanboard\Formatter\BoardFormatter;


class GamificationController extends BaseController
{
    public function show()
            {
		    /**
		     * 
		     *
		     *@access public
		     */
                $project = $this->getProject();
                //$search = $this->helper->projectHeader->getSearchQuery($project);
		//$this->response->html("<html><head><h1>hi</h1></head><body><p>hiiii</p></body></html>");
		/*$this->response->html($this->helper->layout->app('questlog:questlog/view_private', array(
		    'project' => $project,
                    'title' => $project['name'],
                    'description' => $this->helper->projectHeader->getDescription($project),
                    'board_private_refresh_interval' => $this->configModel->get('board_private_refresh_interval'),
                    'board_highlight_period' => $this->configModel->get('board_highlight_period'),
                    'swimlanes' => $this->taskLexer
			 ->build($search)
			 ->format(BoardFormatter::getInstance($this->container)->withProjectId($project['id']))
		)));
                /*$this->response->html($this->helper->layout->app('board/view_private', array(
                    'project' => $project,
                    'title' => $project['name'],
                    'description' => $this->helper->projectHeader->getDescription($project),
                    'board_private_refresh_interval' => $this->configModel->get('board_private_refresh_interval'),
                    'board_highlight_period' => $this->configModel->get('board_highlight_period'),
                    'swimlanes' => $this->taskLexer
                    ->build($search)
                    ->format($this->boardFormatter->withProjectId($project['id']))
	    )));*/

    }

    public function save()
    {
        $values = $this->request->getValues();
	$errors = array();
	$task = $this->getTask();
	$x = $this->taskMetadataModel->save($task['id'], array('gamifyExperience' => $values['exp']));
	return $this->index($values, $errors);
    }
    public function index()
    {
	    $task = $this->getTask();
	    $vall = $this->taskMetadataModel->get($task['id'], 'gamifyExperience', '10');
	    $this->response->html($this->helper->layout->task('gamify:gamify/add_exp_to_task', array(
		    'task' => $task,
		    'project' => $this->projectModel->getById($task['project_id']),
		    'values' => array(
			    'exp' => $vall,
		    ),
	    )));
    }
    public function get()
    {

	$task = $this->getTask();
	$asd = $this->taskMetadataModel->get($task['id'], 'gamifyExperience', '10');
    	$this->response->html($asd);
    
    }

    public function getuser()
    {

	$task = $this->getUser();
	$asd = $this->userMetadataModel->get($user['id'], 'gamifyExperience', '0');
    	$this->response->html($asd);
    
    }
    
}
