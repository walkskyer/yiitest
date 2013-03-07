<?php
/**
 * Created by JetBrains PhpStorm.
 * User: weijie
 * Date: 13-3-4
 * Time: 下午5:47
 * File: Mail.php
 * To change this template use File | Settings | File Templates.
 */
define('MAIL_PATH', dirname(__FILE__));
class Mail
{
    /* @var PHPMailer*/
    protected $_mail;
    protected $_config = null;

    public function __construct()
    {
        require_once(MAIL_PATH . DIRECTORY_SEPARATOR . 'phpmailer' . DIRECTORY_SEPARATOR . 'class.phpmailer.php');
        $this->init();
    }

    protected function init()
    {
        if ($this->_mail == null) {
            $this->_config = require_once(MAIL_PATH . DIRECTORY_SEPARATOR . 'config.inc.php');
            $this->_mail = new PHPMailer();
            $this->_mail->IsSMTP();
            if ($this->_config != null) {
                foreach ($this->_config as $key => $val) {
                    $this->_mail->$key = $val;
                }
            }
            //$this->_mail->AddReplyTo("test@yiimail.com","yiimail");
        }
    }

    public function send($sendto_email, $username, $subject, $msg)
    {
        try {
            $this->_mail->AddAddress($sendto_email, $username);
            $this->_mail->Subject = $subject;
            $this->_mail->MsgHTML($msg);
            $this->_mail->Send();
        } catch (phpmailerException $e) {
            echo $e->errorMessage(); //Pretty error messages from PHPMailer
        } catch (Exception $e) {
            echo $e->getMessage(); //Boring error messages from anything else!
        }
    }

    public function test($sendto_email, $username)
    {
        $testMsg = file_get_contents(MAIL_PATH . '/test.html');
        $this->send($sendto_email, $username, '这是由yiimail发出的测试邮件', $testMsg);
    }
}
