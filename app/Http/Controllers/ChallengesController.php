<?php

namespace App\Http\Controllers;

use App\Repositories\ChallengesRepository;
use App\Repositories\TaskRepository;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Laracasts\Flash\Flash;
use Psy\Util\Str;
use Session;

class ChallengesController extends Controller
{
    private $challengesRepository;

    public function __construct(ChallengesRepository $challengesRepo)
    {
        $this->challengesRepository = $challengesRepo;
    }
    public function index()
    {
        $challenges = $this->challengesRepository->all();
        return view('challenges.index')
            ->with('challenges',$challenges);
    }
    public function create()
    {
        return view('challenges.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('fileUpload'))
        {
            $file = $request->fileUpload;
            $fileName=$file->getClientOriginalName();
            $folder = (string) \Illuminate\Support\Str::orderedUuid();
            $dir = 'uploads/challenges/'. $folder.'/';
           // $dir = 'uploads/challenges/' . $fileName;
            //check file exist and move file
            if (! File::exists($dir))
            {
                $file->move($dir, $fileName);
                $data['name']=$request->name;
                $data['filename']=$folder;
                $data['suggest']=$request->suggest;
                $data['created_at']=now();

                $this->challengesRepository->create($data);

                Flash::success('Create challenge successfully.');
                return redirect(route('challenges'));
            }
            else
            {
                Flash::error('File is exist!!!');
            }
        }
        else
        {
            Session::flash('error', 'You must choose the file!!!');
        }
        return redirect()->back();
    }


    public function checkAnswer(Request $request, $folder)
    {
        $answer = $request->get('answer').'.txt';
        $dir = 'uploads/challenges/'.$folder.'/';
        $filename = $dir.$answer;
        if(File::exists($filename))
        {
            $content = File::get(public_path($filename));
            return view('challenges.content', compact('content'));
        }
        else
        {
            Flash::error('Answer is not correct... 〤 Try again...');
            return redirect()->back();
        }
    }

}
