<?php

namespace App\Kernel\View;

use App\Kernel\Exceptions\ViewNotFoundException;

class View
{
  public function page(string $name): void
  {
    $pagePath = APP_PATH . "/views/pages/$name.php";

    if (!file_exists($pagePath)) {
      throw new ViewNotFoundException("View $name not found");
    }

    extract([
      'view' => $this,
    ]);

    include_once $pagePath;
  }

  public function component(string $name): void
  {
    $componentPath = APP_PATH . "/views/components/$name.php";

    if (!file_exists($componentPath)) {
      echo "Component $name not found";
      return;
    }

    include_once $componentPath;
  }
}
