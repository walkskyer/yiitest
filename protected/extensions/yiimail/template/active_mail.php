<?php
/**
 * Created by JetBrains PhpStorm.
 * User: weijie
 * Date: 13-3-8
 * Time: 上午11:31
 * File: active_mail.php
 * To change this template use File | Settings | File Templates.
 */?>
<?php
/* @var string $send_mail*/
/* @var string $active_url*/
?>
<div style="line-height:40px;height:40px;"></div>
<p style="margin:0px;padding:0px;"><strong style="font-size:14px;line-height:24px;color:#333333;font-family:arial,sans-serif;">亲爱的用户：</strong></p>
<p style="margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:'宋体',arial,sans-serif;"
        >您好！</p>
<p style="margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:'宋体',arial,sans-serif;"
        >您于<?php echo date('Y年 m月d日 H:i',time());?>注册<?php echo Yii::app()->name;?>帐号<a target="_blank" href="mailto:<?php echo $send_mail?>"><?php echo $send_mail?><wbr>om</a>，点击以下链接，即可激活该帐号：</p>
<p style="margin:0px;padding:0px;"><a style="line-height:24px;font-size:12px;font-family:arial,sans-serif;color:#0000cc" target="_blank"
                                      href="<?php echo $active_url;?>"><?php echo $active_url;?></a></p>
<p style="margin:0px;padding:0px;line-height:24px;font-size:12px;color:#979797;font-family:arial,sans-serif;"
        >(如果您无法点击此链接，请将它复制到浏览器地址栏后访问)</p>
<p style="margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:'宋体',arial,sans-serif;"
        >1、为了保障您帐号的安全性，请在 48小时内完成激活，此链接将在您激活过一次后失效！</p>
<p style="margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:'宋体',arial,sans-serif;"
        >2、请尽快完成激活，否则过期，即<?php echo date('Y年 m月d日 H:i',time()+(86400*2));?>后<?php echo Yii::app()->name;?>将有权收回该帐号。</p>
<div style="line-height:80px;height:80px;"></div>
<p style="margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:'宋体',arial,sans-serif;"
        ><?php echo Yii::app()->name;?>帐号团队</p>
<p style="margin:0px;padding:0px;line-height:24px;font-size:12px;color:#333333;font-family:'宋体',arial,sans-serif;"
        >2013年03月08日</p>
