<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>


<p>
    You are currently signed in as ID:  <?php echo Yii::app()->user->getId(); ?>
    <?php if(Yii::app()->user->isGuest == false): ?>
    <p><?php echo CHtml::link('Log out', array('site/logout')); ?> </p>
<?php endif; ?>
</p>
