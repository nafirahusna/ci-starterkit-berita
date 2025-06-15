<?php namespace App\Controllers;

use App\Models\NewsModel;
use App\Models\CategoryModel;

class NewsController extends BaseController
{
    protected $news, $category;

    public function __construct()
    {
        $this->news     = new NewsModel();
        $this->category = new CategoryModel();
    }

    public function index()
    {
        $builder = $this->news->select('news.*, categories.name AS category')
                              ->join('categories','categories.id=news.category_id');

        // filter status
        $status = $this->request->getGet('status');
        if ($status === 'draft')     $builder->where('is_published', 0);
        if ($status === 'pending')   $builder->where('is_published', 0);

        $data = [
            'newsList'  => $builder->findAll(),
            'title'     => 'News'
        ];
        return view('news/index', $data);
    }

    public function create()
    {
        return view('news/form', [
            'categories'=> $this->category->findAll(),
            'title'     => 'Create News'
        ]);
    }

    public function store()
    {
        $file = $this->request->getFile('image');
        $imgName = $file && $file->isValid() ? $file->getRandomName() : null;
        if ($imgName) $file->move(WRITEPATH.'uploads', $imgName);

        $this->news->save([
            'title'        => $this->request->getPost('title'),
            'slug'         => url_title($this->request->getPost('title'), '-', true),
            'content'      => $this->request->getPost('content'),
            'image'        => $imgName,
            'category_id'  => $this->request->getPost('category_id'),
            'author_id'    => session('user_id'),
            'is_published' => 0
        ]);
        return redirect()->to('/news')->with('message','News saved as draft');
    }

    public function edit($id)
    {
        return view('news/form', [
            'news'       => $this->news->find($id),
            'categories' => $this->category->findAll(),
            'title'      => 'Edit News'
        ]);
    }

    public function update($id)
    {
        $data = [
            'title'        => $this->request->getPost('title'),
            'slug'         => url_title($this->request->getPost('title'), '-', true),
            'content'      => $this->request->getPost('content'),
            'category_id'  => $this->request->getPost('category_id'),
        ];

        $file = $this->request->getFile('image');
        if ($file && $file->isValid()) {
            // hapus lama
            $old = $this->news->find($id)['image'];
            if ($old) @unlink(WRITEPATH."uploads/{$old}");
            $newName = $file->getRandomName();
            $file->move(WRITEPATH.'uploads', $newName);
            $data['image'] = $newName;
        }

        $this->news->update($id, $data);
        return redirect()->to('/news')->with('message','News updated');
    }

    public function delete($id)
    {
        $item = $this->news->find($id);
        if ($item['image']) @unlink(WRITEPATH."uploads/{$item['image']}");
        $this->news->delete($id);
        return redirect()->to('/news')->with('message','News deleted');
    }

    public function approve($id)
    {
        $this->news->update($id, ['is_published'=>1]);
        return redirect()->to('/news')->with('message','News published');
    }

    // Endpoint AJAX untuk slug otomatis
    public function slugify()
    {
        $title = $this->request->getGet('title');
        return $this->response->setJSON([
            'slug' => url_title($title, '-', true)
        ]);
    }
}
