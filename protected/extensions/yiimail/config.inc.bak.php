<?php
/**
 * Created by JetBrains PhpStorm.
 * User: weijie
 * Date: 13-3-5
 * Time: 上午11:26
 * File: config.inc.php
 * To change this template use File | Settings | File Templates.
 */
return array(
    'Host'=>'smtp..com',//smtp主机
    'Username'=>'@.com',//SMTP账号 注意：普通邮件认证不需要加 @域名
    'Password'=>'',//SMTP账号密码
    'From'=>'@.com',// 发件人邮箱，需填写Host类似的邮箱，如yourmail@163.com
    'FromName'=>'发件人名称',// 发件人名称
    'CharSet'=>'utf-8',// 这里指定字符集
    'Encoding'=>'base64',// 收件人邮箱和姓名
    'SMTPSecure'=>'',//连接类型，为空默认为http
    'Port'=>25,//不使用使用安全连接时，端口一般为25
    'SMTPAuth'=>true,//smtp安全验证开关
);
?>
