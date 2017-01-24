<?php
namespace Kanboard\Plugin\Gamify\Action;
use Kanboard\Model\TaskModel;
use Kanboard\Action\Base;
/**
 * Add xp to user
 *
 * @package action
 * @author  Robert Reith
 */
class TaskCloseExperience extends Base
{
    /**
     * Get automatic action description
     *
     * @access public
     * @return string
     */
    public function getDescription()
    {
        return t('Add Tasks EXP to users EXP when its closed.');
    }
    /**
     * Get the list of compatible events
     *
     * @access public
     * @return array
     */
    public function getCompatibleEvents()
    {
        return array(
            TaskModel::EVENT_CLOSE,
        );
    }
    /**
     * Get the required parameter for the action (defined by the user)
     *
     * @access public
     * @return array
     */
    public function getActionRequiredParameters()
    {
        return array(
		'task_id' => t('task_id'),
		'user_id' => t('user_id'),
        );
    }
    /**
     * Get the required parameter for the event
     *
     * @access public
     * @return string[]
     */
    public function getEventRequiredParameters()
    {
        return array(
            'task_id',
        );
    }
    /**
     * Execute the action
     *
     * @access public
     * @param  array   $data   Event data dictionary
     * @return bool            True if the action was executed or false when not executed
     */
    public function doAction(array $data)
    {
	$txp = $this->model->taskMetadataModel->get($data['task_id'], 'gamifyExperience', '10');	
	$uxp = $this->model->userMetadataModel->get($data['user_id'], 'gamifyExperience', '0');
	$sum = intval($txp) + intval($uxp);
	$x = $this->model->userMetadataModel->save($data['user_id'], array('gamifyExperience' => $sum));
        return $x;
    }
    /**
     * Check if the event data meet the action condition
     *
     * @access public
     * @param  array   $data   Event data dictionary
     * @return bool
     */
    public function hasRequiredCondition(array $data)
    {
        return true;
    }
}
