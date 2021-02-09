<?php

namespace App\Http\Controllers;

use App\Repositories\SolutionRepository;
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

class SolutionController extends Controller
{
    private $solutionRepository;
    private $taskRepository;

    public function __construct(SolutionRepository $solutionRepo,TaskRepository $taskRepo)
    {
        $this->solutionRepository = $solutionRepo;
        $this->taskRepository = $taskRepo;
    }
    public function index()
    {
        $solutions = $this->solutionRepository->all();
        return view('solutions.index')->with('solutions',$solutions);
    }

    //Submit solution/answer
    public function submit($task_id)
    {
        return view('solutions.submit',compact('task_id'));
    }

    public function store(Request $request, $task_id)
    {
        if ($request->hasFile('fileUpload'))
        {
            $file = $request->fileUpload;
            $fileName=$file->getClientOriginalName();
            $dir = 'uploads/solutions/' . $fileName;
            if (! File::exists($dir))
            {
                $file->move('uploads/solutions/', $fileName);
                $task=$this->taskRepository->getTaskwithTaskid($task_id);
                $data['name']=$fileName;
                $data['task_name']=$task->name;
                $data['student_name']=Auth::user()->userName;
                $data['created_at']=now();

                $this->solutionRepository->create($data);
                Session::flash('success', 'Solution updated successfully. ✔');
            }
            else
            {
                Flash::error('error', 'Solution updated fail. 〤');
            }
        }
        else{
            Flash::error('error', 'You must choose the file!〤');
        }
        return redirect()->back();
    }

    public function downloadSolution($filename)
    {
        $filepath = public_path('uploads/solutions/' .$filename);
        return response()->download($filepath);
    }

}
