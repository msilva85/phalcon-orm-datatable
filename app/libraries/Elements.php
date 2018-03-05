<?php
class Elements extends \Phalcon\Mvc\User\Component
{
  private $_headerMenu = [
    "navbar" => [
      "index" => [
        "caption"     => "Home",
        "controller"  => "Index",
        "action"      => "index"
      ],

      "register" => [
        "caption"     => "Register",
        "controller"  => "Index",
        "action"      => "register"
      ],

      "post" => [
        "caption"     => "Post",
        "controller"  => "Index",
        "action"      => "post"
      ],
    ]
  ];

  public function getMenu()
  {
    foreach($this->_headerMenu as $position => $menu)
    {
      echo "<div class='collapse navbar-collapse' id='myNavbar'>";
      echo "<ul class='nav navbar-nav ", $position, "'>";
      foreach($menu as $controller => $option)
      {
        echo "<li>";
        echo $this->tag->linkTo($option["controller"] . "/" . $option["action"], $option["caption"]);
        echo "</li>";
      }
      echo "</ul>";
      echo "</div>";
    }
  }
}
