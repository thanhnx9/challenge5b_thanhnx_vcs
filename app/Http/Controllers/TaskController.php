<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepository;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Laracasts\Flash\Flash;
use Session;

class TaskController extends Controller
{
    private $taskRepository;
    private $userRepository;

    public function __construct(TaskRepository $taskRepo)
    {
        $this->taskRepository = $taskRepo;
    }
    public function index()
    {
        $tasks = $this->taskRepository->all();
        return view('tasks.index')->with('tasks',$tasks);
    }

//    //Submit solution/answer
//    public function submit()
//    {
//        return view('Assignment.submit_solution');
//    }

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

    public function storeAnswer(Request $request)
    {
        if ($request->hasFile('fileUpload'))
        {
            $file = $request->fileUpload;
            $dir = 'uploads/answer/' . $file->getClientOriginalName();
            if (! File::exists($dir))
            {
                $file->move('uploads/answer/', $file->getClientOriginalName());
                DB::table('assignments')->insert(
                    [
                        'studentUsername' => session('username'),
                        'filename' => $file->getClientOriginalName(),
                        'create_at' => now(),
                    ]);
                Session::flash('success', 'Bạn đã thêm bài làm thành công. ✔');
            }
            else
            {
                Session::flash('error', 'Bài làm đã tồn tại. 〤');
            }
        }
        else{
            Session::flash('error', 'Bạn chưa chọn file. 〤');
        }
        return redirect()->back();
    }

    public function listAnswer(){
        $directory = 'uploads/answer/';
        $allFiles = File::files($directory);
        $submits = (DB::table('assignments'))->select('filename','studentUsername','create_at')->get();;
        return view('Assignment.list_answer', compact('allFiles','submits'));
    }

    public function downloadAssignment($filename)
    {
        $filepath = public_path('uploads/assignment/' .$filename);
        return response()->download($filepath);
    }

    public function downloadAnswer($filename)
    {
        $filepath = public_path('uploads/answer/' .$filename);
        return response()->download($filepath);
    }

}
