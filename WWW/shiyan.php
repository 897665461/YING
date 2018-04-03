<?php
class shiyan
{

    public $nianling;
    public $xingbie;
    public $xingming;
    public function jiedhou($nianling,$xingbie,$mingzi)
    {
        $this->nianling = $nianling;
        $this->xingbie = $xingbie;
        $this->xingming = $mingzi;

    }
    public function shuchu()
    {
        print_r($this->nianling);
    }
}

$shiyan = new shiyan();
$shiyan->jiedhou(11,22,33);
$shiyan->shuchu();
$shiyan1 = new shiyan();
$shiyan1->nianling = 1212;
$shiyan1->shuchu();
