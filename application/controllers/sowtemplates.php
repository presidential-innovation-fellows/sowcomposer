<?php

class Sowtemplates_Controller extends Base_Controller {

  public function action_new() {
    $view = View::make('sowtemplates.new');
    $this->layout->content = $view;
  }

  public function action_create() {
    $tp = Templateparser::parse(Input::get('sowbody'));

    $view = View::make('sowtemplates.create');
    $view->template = $tp;
    $this->layout->content =  $view;
  }

}