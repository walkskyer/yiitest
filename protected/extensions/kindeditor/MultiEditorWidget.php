<?php
/**
 * Created by JetBrains PhpStorm.
 * User: weijie
 * Date: 13-4-3
 * Time: 下午5:39
 * File: EditorWidget.php
 * To change this template use File | Settings | File Templates.
 */
/**
 * 这是rock写的一个kindeditor扩展，主要功能是实现同一页面可创建多个编辑器。
 */
class MultiEditorWidget extends  CWidget{

    public  $elements = array();//元素数组
    public  $string = '' ;
    public function run(){

        if(count($this->elements)):
            foreach($this->elements as $val){
                $this->string .= 'var beta'.$val.' = K.create(\'#'.$val.'\', KEConfig.adminfull);';
            }
            $cs = Yii::app()->getClientScript();
            $cs->registerScriptFile(sbu('libs/kindeditor/kindeditor-min.js'), CClientScript::POS_END);
            $cs->registerScriptFile(sbu('libs/kindeditor/config.js'), CClientScript::POS_END);
            $cssUrl = tbu('styles/beta-all.css');
            $script = <<<EOF
<script type="text/javascript">
$(function(){
$(':text:first').focus();
    KindEditor.ready(function(K) {
        var cssurl =  '{$cssUrl}';
        var imageUploadUrl = '/upload.php';
        KEConfig.adminmini.cssPath = [cssurl];
    	KEConfig.adminmini.uploadJson = imageUploadUrl;
        KEConfig.adminfull.cssPath = [cssurl];
    	KEConfig.adminfull.uploadJson = imageUploadUrl;
    	{$this->string}
    	$(document).on('click', '.post-pictures li', function(event){
            var html = $(this).html();
            betaContent.insertHtml(html);
        });
    });
});
</script>
EOF;
            echo $script;
        endif;


    }
}
