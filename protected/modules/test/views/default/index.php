<?php
$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>

<p>
这是action "<?php echo $this->action->id; ?>的驱动"。
这个事件属于"<?php echo $this->module->id; ?>" 模块中的控制器 "<?php echo get_class($this); ?>" .
</p>
<p>
可以通过修改 <tt><?php echo __FILE__; ?>来自定义这个页面。</tt>
</p>