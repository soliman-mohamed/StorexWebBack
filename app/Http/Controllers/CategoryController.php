<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $model;
    protected $viewsDomain = 'categories.';

    public function __construct()
    {
        $this->model = new Category();
    }

    private function view($view, $params = [])
    {
        return view($this->viewsDomain . $view, $params);
    }

    public function index(Request $request)
    {
        $records =  $this->model->query();

        if ($request->filled('title')){
            $records = $records->where('title', 'LIKE', "%{$request->title}%");
        }
        $records = $records->orderBy('created_at','desc')->get();

        return $this->view('index', compact('records'));
    }


    public function create()
    {
        return $this->view('create');
    }

    public function store(CategoryRequest $request)
    {
        $this->model->create($request->only('title'));
        return redirect(route('categories.index'))->with(['success' => __('added successfully')]);
    }

    public function show(Category $category)
    {
        //
    }

    public function edit($id)
    {
        $record = $this->model->findOrFail($id);
        return $this->view('edit', compact('record'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $record = $this->model->findOrFail($id);
        $record->update($request->only('title'));
        return redirect(route('categories.index'))->with(['success' => __('updated successfully')]);
    }

    public function destroy($id)
    {
        $record = $this->model->findOrFail($id);
        $record->delete();
        return redirect()->back()->with(['success' => __('deleted successfully')]);
    }
}
