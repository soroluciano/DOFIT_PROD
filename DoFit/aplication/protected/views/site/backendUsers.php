<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
    'About',
);
?>


<h1>About</h1>
<p>hola mundo</p>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
'dataProvider' => $model->search(),
'filter' => $model,
//lets tell the pager to use our own css file
'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css'),
//the same for our entire grid. Note that this value can be set to "false"
//if you set this to false, you'll have to include the styles for grid in some of your css files
//'cssFile'=>false,
'cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css',
//changing the text above the grid can be fun
'summaryText' => 'Yiiplayground is showing you {start} - {end} of {count} cool records',
//and you can even set your own css class to the grid container
'htmlOptions' => array('class' => 'grid-view rounded'),
'columns' => array(
array(
'name' => 'username',
'type' => 'raw',
'value' => 'CHtml::encode($data->username)'
),
array(
'name' => 'email',
'type' => 'raw',
'value' => 'CHtml::link(CHtml::encode($data->email), "mailto:".CHtml::encode($data->email))',
),
//styling default buttons
array(
'header' => '(fake) Actions',
'class' => 'CButtonColumn',
'viewButtonImageUrl' => Yii::app()->baseUrl . '/css/gridViewStyle/images/' . 'gr-view.png',
'updateButtonImageUrl' => Yii::app()->baseUrl . '/css/gridViewStyle/images/' . 'gr-update.png',
'deleteButtonImageUrl' => Yii::app()->baseUrl . '/css/gridViewStyle/images/' . 'gr-delete.png',
),
),
));


?>


<?php /*foreach ($model as $data): ?>
    <h1><?php echo $data->username; ?></h1>
<?php endforeach;*/ ?>




