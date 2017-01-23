<?php 
$attributes = array();
$attributes = array_merge(array('tabindex="1000"'), $attributes);
	$html = $this->helper->form->label(t('Experience for this Task'), 'experience');
	$html .= $this->helper->form->numeric('experience', $values, $errors, $attributes);
	$html .= ' '.t('EXP');
        echo $html;


?>
<?= /**$this->myTask->selectExperience($values, $errors)**/ ?>
