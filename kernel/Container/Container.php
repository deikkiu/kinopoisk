<?php

namespace App\Kernel\Container;

use App\Kernel\Router\Router;
use App\Kernel\Http\Request;
use App\Kernel\Validator\Validator;
use App\Kernel\View\View;

class Container
{
  public readonly Request $request;
  public readonly Router $router;
  private readonly View $view;
  private readonly Validator $validator;

  public function __construct()
  {
    $this->registerServices();
  }

  private function registerServices(): void
  {
    $this->request = Request::createFromGlobals();
    $this->view = new View();
    $this->router = new Router($this->view, $this->request);
    $this->validator = new Validator();
    $this->request->setValidator($this->validator);
  }
}
