<?php

namespace dkeeper\tree;

/**
 * This is just an example.
 */
class Tree extends \yii\base\Widget
{
    public $dataSource = [];

    public $treeOptions = [];

    public $options = [];

    public $nodeOptions = [];

    public $name;

    public function init(){
        if(!isset($this->options['id'])){
            $this->options['id'] = $this->getId();
        }
        TreeAssets::register($this->getView());
    }

    public function run()
    {
        echo \yii\helpers\Html::tag('ul','',$this->options);
        $script = "
        $.fn.zTree.init($('#".$this->options['id']."'), ".\yii\helpers\Json::encode($this->treeOptions).", ".\yii\helpers\Json::encode($this->dataSource).");
        ";
        $this->view->registerJs($script,\yii\web\View::POS_LOAD);
    }
}