<?php

class AdminModule extends CWebModule
{
    /**
     * @var string 模块的资源文件url
     */
    private $_assetsUrl;

	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}

    /**
     * 获取模块的资源文件url
     * @return mixed
     */
    public function getAssetsUrl()
    {
        if($this->_assetsUrl===null)
            $this->_assetsUrl=Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.modules.admin.assets'));
        return $this->_assetsUrl;
    }

    /**
     * 设置模块的资源文件url
     * @param $value
     */
    public function setAssetsUrl($value)
    {
        $this->_assetsUrl=$value;
    }
}
