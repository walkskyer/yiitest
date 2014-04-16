<?php
/**
 * Created by JetBrains PhpStorm.
 * User: weijie
 * Date: 13-4-3
 * Time: 下午4:46
 * File: TestKE.php
 * To change this template use File | Settings | File Templates.
 */
/* @var SiteController $this*/
/* @var Article $model*/
$this->widget('ext.kindeditor.KindEditorWidget',array(
    'id'=>array('Article_title'),   //Textarea id
    // Additional Parameters (Check http://www.kindsoft.net/docs/option.html)
));
$this->widget('ext.kindeditor.KindEditorWidget',array(
    'id'=>'Article_content',
    'items'=>array(
      'height'=>'1000px',
    ),
));
?>

<div class="form">
    <?php
    /* @var CActiveForm $form*/
    $form=$this->beginWidget('CActiveForm', array(
        'id'=>'article-form',
        'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
)); ?>
    <div class="row">
        <?php echo $form->labelEx($model,'title'); ?>
        <?php echo $form->textArea($model,'title',array('visibility'=>'hidden')); ?>
        <?php echo $form->error($model,'title'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'content'); ?>
        <?php echo $form->textArea($model,'content',array('visibility'=>'hidden')); ?>
        <?php echo $form->error($model,'content'); ?>
    </div>
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? '添加' : '保存'); ?>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->