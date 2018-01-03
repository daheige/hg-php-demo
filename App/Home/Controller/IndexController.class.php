<?php
namespace Home\Controller;

class IndexController extends BaseController
{

    public function index()
    {
        $this->assign('title', 'daheige');
        $this->display();
    }
    public function test()
    {
        echo logic('Test')->getUser();
        $this->display();
    }
}
