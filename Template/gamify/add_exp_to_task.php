<div class="page-header">
    <h2><?= t('Set Experience') ?></h2>
</div>
<form method="post" action="<?= $this->url->href('GamificationController', 'save', array('plugin' => 'gamify','task_id' => $task['id'])) ?>" autocomplete="off" class="form-inline">


    <?= $this->form->label(t('Set experience for this task'), 'exp') ?>
    <?= $this->form->text('exp', $values, array(), array(), 'form-numeric') ?>

    <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue"/>
</form>
