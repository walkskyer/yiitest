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
    'id'=>'Article_content',   //Textarea id
    // Additional Parameters (Check http://www.kindsoft.net/docs/option.html)
    'items' => array(
        'width'=>'700px',
        'height'=>'300px',
        'themeType'=>'simple',
        'allowImageUpload'=>true,
        'allowFileManager'=>true,
        'items'=>array(
            'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic',
            'underline', 'removeformat', '|', 'justifyleft', 'justifycenter',
            'justifyright', 'insertorderedlist','insertunorderedlist', '|',
            'emoticons', 'image', 'link',),
    ),
)); ?>

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
        <?php echo $form->textField($model,'title',array('visibility'=>'hidden')); ?>
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