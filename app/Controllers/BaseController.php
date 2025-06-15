<?php namespace App\Controllers;

use CodeIgniter\Controller;

class BaseController extends Controller
{
    protected $helpers = ['url','form','text','cookie','date'];

    public function initController($request, $response, $logger)
    {
        parent::initController($request, $response, $logger);

        // Load custom helpers
        helper(['auth']);
        // mulai session
        \Config\Services::session();
    }
}
