<?php namespace App\Controllers;

use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new CategoryModel();
    }

    public function index()
    {
        return view('categories/index', [
            'categories' => $this->model->findAll(),
            'title'      => 'Categories'
        ]);
    }

    public function create()
    {
        return view('categories/form', ['title'=>'Create Category']);
    }

    public function store()
    {
        $this->model->save(['name'=>$this->request->getPost('name')]);
        return redirect()->to('/categories')->with('message','Category created');
    }

    public function edit($id)
    {
        return view('categories/form', [
            'category' => $this->model->find($id),
            'title'    => 'Edit Category'
        ]);
    }

    public function update($id)
    {
        $this->model->update($id, ['name'=>$this->request->getPost('name')]);
        return redirect()->to('/categories')->with('message','Category updated');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/categories')->with('message','Category deleted');
    }
}
