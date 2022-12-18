<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MovieController extends Controller
{
    protected $model;
    protected $viewsDomain = 'movies.';

    public function __construct()
    {
        $this->model = new Movie();
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

        if ($request->filled('rate')){
            $records = $records->where('rate', $request->rate);
        }

        if ($request->filled('category')){
            $records = $records->where('category_id', $request->category);
        }

        $records = $records->with('category')->orderBy('created_at','desc')->get();
        $categories = Category::all();
        $rates = [1,2,3,4,5];
        return $this->view('index', compact('records', 'categories', 'rates'));
    }


    public function create()
    {
        $categories = Category::all();
        return $this->view('create', compact('categories'));
    }

    public function store(MovieRequest $request)
    {
        $data = $request->except('image');
        if($request->hasFile('image')){
            $file = $request->image;
            $filename = $file->getClientOriginalName();
            $f_name_array = explode('.', $filename);
            $f_file_ext = end($f_name_array);
            $file_name = time().'.'.$f_file_ext;
            $file->move('images', $file_name);
            $data['image'] = $file_name;
        }
        $this->model->create($data);
        return redirect(route('movies.index'))->with(['success' => __('added successfully')]);
    }

    public function show(Movie $movie)
    {
        //
    }

    public function edit($id)
    {
        $record = $this->model->findOrFail($id);
        $categories = Category::all();
        return $this->view('edit', compact('record', 'categories'));
    }

    public function update(MovieRequest $request, $id)
    {
        $record = $this->model->findOrFail($id);

        $data = $request->except('image');

        if($request->hasFile('image')){

            if(File::exists('images/'.$record->image)){
                File::delete('images/'.$record->image);
            }

            $file = $request->image;
            $filename = $file->getClientOriginalName();
            $f_name_array = explode('.', $filename);
            $f_file_ext = end($f_name_array);
            $file_name = time().'.'.$f_file_ext;
            $file->move('images', $file_name);
            $data['image'] = $file_name;
        }

        $record->update($data);
        return redirect(route('movies.index'))->with(['success' => __('updated successfully')]);
    }

    public function destroy($id)
    {
        $record = $this->model->findOrFail($id);

        if(File::exists('images/'.$record->image)){
            File::delete('images/'.$record->image);
        }

        $record->delete();
        return redirect()->back()->with(['success' => __('deleted successfully')]);
    }
}
