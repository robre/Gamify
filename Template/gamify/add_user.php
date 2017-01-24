<li>
	<?= $this->url->link('<i class="fa fa-diamond fa-fw"></i>', 'GamificationController', 'getuser', array('user_id' => $this->user->getId(), 'plugin' => 'gamify'), false, 'popover') ?>
	   <!-- <?= /*$this->url->icon('diamond', t('My Experience'), 'GamificationController', 'getuser', array('plugin' => 'gamify', 'user_id' => $this->user->getId())) */?>-->
</li>
