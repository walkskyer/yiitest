<?php
/*$this->breadcrumbs=array(
	''=>array('index'),
	'Create',
);*/
/* @var UserController $this*/
/* @var User $model*/
$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>注册用户</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>