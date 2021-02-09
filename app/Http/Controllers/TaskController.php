<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepository;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Laracasts\Flash\Flash;
use Session;

class TaskController extends Controller
{
    private $taskRepository;

    public function __construct(TaskRepository $taskRepo)
    {
        $this->taskRepository = $taskRepo;
    }
    public function index()
    {
        $tasks = $this->taskRepository->all();
        return view('tasks.index')->with('tasks',$tasks);
    }


    public function store(Request $request)
    {
        if ($request->hasFile('fileUpload'))
        {
            $file = $request->fileUpload;
            $fileName=$file->getClientOriginalName();
            $dir = 'uploads/tasks/' . $fileName;
            //check file exist and move file
            if (! File::exists($dir))
            {
                $file->move('uploads/tasks/', $fileName);
                $data['name']=$fileName;
                $data['teacher_name']=Auth::user()->userName;
                $data['created_at']=now();

                $this->taskRepository->create($data);

                Flash::success('Task updated successfully.');
                return redirect(route('tasks'));
            }
            else
            {
                Flash::error('Fail!!!!');
            }
        }
        else
        {
            Session::flash('error', 'You must choose the file!!!');
        }
        return redirect()->back();
    }


    public function download($filename)
    {
        $filepath = public_path('uploads/tasks/' .$filename);
        return response()->download($filepath);
    }

}
