<?php

class HomepageController
{

    public function run()
    {

        $page = new view('homepage/homepage');

        Presenter::present($page);
    }
}


