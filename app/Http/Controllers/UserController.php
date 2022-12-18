<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $model;
    protected $viewsDomain = 'users.';

    public function __construct()
    {
        $this->model = new User();
    }

    private function view($view, $params = [])
    {
        return view($this->viewsDomain . $view, $params);
    }

    public function index(Request $request)
    {
        $records =  $this->model->query();

        if ($request->filled('name')){
            $records = $records->where(function($q) use ($request){
                $q->where('name', 'LIKE', "%{$request->name}%")
                ->orWhere('username', 'LIKE', "%{$request->name}%");
            });
        }

        if ($request->filled('email')){
            $records = $records->where('email', 'LIKE', "%{$request->email}%");
        }

        if ($request->filled('phone')){
            $records = $records->where('phone', 'LIKE', "%{$request->phone}%");
        }

        $records = $records->orderBy('created_at','desc')->get();

        return $this->view('index', compact('records'));
    }


    public function create()
    {
        return $this->view('create');
    }

    public function store(UserRequest $request)
    {
        $data = $request->except('password');
        $data['password'] = bcrypt($request->password);
        $this->model->create($data);
        return redirect(route('users.index'))->with(['success' => __('added successfully')]);
    }

    public function show(User $user)
    {
        //
    }

    public function edit($id)
    {
        $record = $this->model->findOrFail($id);
        return $this->view('edit', compact('record'));
    }

    public function update(UserRequest $request, $id)
    {
        $record = $this->model->findOrFail($id);

        $data = $request->except('password');

        if($request->filled('password')){
            $data['password'] = bcrypt($request->password);
        }
        $record->update($data);
        return redirect(route('users.index'))->with(['success' => __('updated successfully')]);
    }

    public function destroy($id)
    {
        $record = $this->model->findOrFail($id);
        $record->delete();
        return redirect()->back()->with(['success' => __('deleted successfully')]);
    }
}
