<?php
/**
 * Created by JetBrains PhpStorm.
 * User: weijie
 * Date: 13-3-7
 * Time: 下午3:41
 * File: form.php
 * To change this template use File | Settings | File Templates.
 */
/* @var UserController $this*/
/* @var User $model*/
/* @var CActiveForm $form*/
$form=$this->beginWidget('CActiveForm', array(
    'id'=>'register',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
));?>
<p class="note">带有 <span class="required">*</span> 的为必填项。</p>
<div class="row">
    <?php echo $form->labelEx($model,'username'); ?>
    <?php echo $form->textField($model,'username'); ?>
    <?php echo $form->error($model,'username'); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model,'password'); ?>
    <?php echo $form->textField($model,'password'); ?>
    <?php echo $form->error($model,'password'); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model,'email'); ?>
    <?php echo $form->textField($model,'email'); ?>
    <?php echo $form->error($model,'email'); ?>
</div>
<div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? '注册' : '保存'); ?>
</div>
<?php $this->endWidget(); ?>