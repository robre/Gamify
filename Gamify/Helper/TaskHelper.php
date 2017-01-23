<?php

namespace Kanboard\Plugin\Gamify\Helper\TaskHelper;

use Kanboard\Core\Base;

class TaskHelper extends Base
{
    public function selectExperience(array $values, array $errors = array(), array $attributes = array())
    {
	$attributes = array_merge(array('tabindex="1000"'), $attributes);
	$html = $this->helper->form->label(t('Experience for this Task'), 'experience');
	$html .= $this->helper->form->numeric('experience', $values, $errors, $attributes);
	$html .= ' '.t('EXP');
        return $html;
    }
}
