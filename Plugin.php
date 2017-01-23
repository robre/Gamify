<?php

namespace Kanboard\Plugin\Gamify;

use Kanboard\Core\Plugin\Base;

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



            //$this->template->setTemplateOverride('board/table_tasks', 'questlog:questlog/table_tasks');

            
//            $this->route->addRoute('/questlog', 'questlogViewController', 'show', 'questlog');

        }

}
