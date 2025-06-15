<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\NewsModel;
use App\Models\CategoryModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $data = [
            'stats' => [
                'users'      => (new UserModel())->countAllResults(),
                'news'       => (new NewsModel())->countAllResults(),
                'drafts'     => (new NewsModel())->where('is_published', 0)->countAllResults(),
                'categories' => (new CategoryModel())->countAllResults(),
            ],
            'title' => 'Dashboard'
        ];

        return view('dashboard/index', $data);
    }
}
