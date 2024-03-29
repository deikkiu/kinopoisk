<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Kernel\Validator\Validator;
use App\Kernel\View\View;

class MovieController extends Controller
{
  public function index(): void
  {
    $this->view('movies');
  }

  public function add(): void
  {
    $this->view('admin/movies/add');
  }

  public function store()
  {
    $validation = $this->request()->validate([
      'name' => ['required', 'min:3', 'max: 20']
    ]);

    if (!$validation) {
      dd('Validation failed', $this->request()->errors());
    }

    dd('Validation passed');
  }
}
