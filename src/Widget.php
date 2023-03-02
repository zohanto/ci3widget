<?php

class Widget
{
  protected $CI;

  public function __construct($config)
  {
    if (!empty($config)) {
      foreach ($config as $property => $value) {
        $this->$property = $value;
      }
    }

    $this->CI = &get_instance();
    $this->init();
  }

  public static function load($name = null, $config = null)
  {
    $CI = &get_instance();
    $dir = APPPATH . "core/" . $CI->router->fetch_directory() . "../widgets/";
    $widgetClassName = ucfirst($name);
    include($dir . $widgetClassName . ".php");

    $widget = new $widgetClassName($config);
    $widget->run();
  }

  protected function render($data = null)
  {
    $this->CI->load->view("widgets/" . strtolower(get_class($this)), $data);
  }

  public function init()
  {
  }

  public function run()
  {
  }
}
