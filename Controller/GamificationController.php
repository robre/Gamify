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

	for
	var_dump($values);
	$this->taskMetadataModel->save($values['task_id'], ['gamifyExperience' => $values['exp']]);
	return $this->index($values, $errors);
    }
    public function index()
    {
	    $task = $this->getTask();
	    $this->response->html($this->helper->layout->task('gamify:gamify/add_exp_to_task', array(
		    'task' => $task,
		    'project' => $this->projectModel->getById($task['project_id']),
		    'values' => array(
			    'exp' => 10,
		    ),
	    )));
    }
    public function get()
    {
	//$asd = $this->taskMetadataModel->get($this->getTask(), 'gamifyExperience', 10);
	$asd = $this->taskMetadataModel->getAll($this->getTask());
    	$this->response->html($asd);
    
    }
    
}
