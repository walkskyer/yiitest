<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <?php $assetsUrl = $this->module->assetsUrl; ?>
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo $assetsUrl; ?>/css/for_yii/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo $assetsUrl; ?>/css/for_yii/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo $assetsUrl; ?>/css/for_yii/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo $assetsUrl; ?>/css/for_yii/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $assetsUrl; ?>/css/for_yii/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php
    Yii::app()->clientScript->registerScript('admincpnav','
            $(document).ready(function(){
            var admincpnav = $(window.parent.document).find("#admincpnav");
            admincpnav.empty();
            admincpnav.html($("#breadcrumbs").html());
            admincpnav.find("a").attr("target","main");
            //$("h1").after($("#hidden_item").html());
            $("#hidden_item").empty();
            $("h1").attr("id","title");
        });
    ');?>
</head>

<body>

<div class="container" id="page">
	<!--<div id="header"></div>--><!-- header -->
	<!--<div id="mainmenu"></div>--><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		    'htmlOptions'=>array('id'=>'breadcrumbs', 'class'=>'breadcrumbs','style'=>'display:none;'),
			'links'=>$this->breadcrumbs,
			'homeLink'=>false,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
    <style type="text/css">
        #title {
            color: #0099CC;
            font-size: 16px;
            font-weight: bold;
            height: 24px;
            line-height: 24px;
            margin: 0 24px 12px 0;
        }
        .note {
            background: none repeat scroll 0 0 #F6F6F6;
            color: #0099CC;
            height: 30px;
            line-height: 30px;
            padding-left: 10px;
            vertical-align: middle;
            margin-bottom: 2px;
        }
    </style>
    <div id="hidden_item">
        <div class="note"> 提示： </div>
    </div>
	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
