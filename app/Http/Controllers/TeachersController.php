<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Response;

class TeachersController extends AppBaseController
{
    /** @var  UsersRepository */
    private $usersRepository;

    public function __construct(UsersRepository $usersRepo)
    {
        $this->usersRepository = $usersRepo;
    }

    /**
     * Display a listing of the Users.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //if user is student show list user
        $users = $this->usersRepository->getuserbyRoleid(2);
        return view('teachers.index')
            ->with('teachers', $users);
    }
    /**
     * Show the form for creating a new Users.
     *
     * @return Response
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created Users in storage.
     *
     * @param CreateUsersRequest $request
     *
     * @return Response
     */
    public function store(CreateUsersRequest $request)
    {
//        $input = $request->all();
//        $users = $this->usersRepository->create($input);
        $teachers['userName']=$request->userName;
        $teachers['name']=$request->name;
        $teachers['phone']=$request->phone;
        $teachers['email']=$request->email;
        $teachers['role_id']='2';
        $teachers['password']=Hash::make($request->password);
        $this->usersRepository->create($teachers);

        Flash::success('Teachers saved successfully.');

        return redirect(route('teachers.index'));
    }

    /**
     * Display the specified Users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {

        $teachers = $this->usersRepository->find($id);

        if (empty($teachers)) {
            Flash::error('Teacher not found');

            return redirect(route('teachers.index'));
        }

        return view('teachers.show')->with('teachers', $teachers);
    }

    /**
     * Show the form for editing the specified Users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $teachers = $this->usersRepository->find($id);

        if (empty($teachers)) {
            Flash::error('Teachers not found');

            return redirect(route('teachers.index'));
        }
        return view('teachers.edit')->with('teachers', $teachers);
    }

    /**
     * Update the specified Users in storage.
     *
     * @param int $id
     * @param UpdateUsersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsersRequest $request)
    {
        $teachers = $this->usersRepository->find($id);

        if (empty($teachers)) {
            Flash::error('Teachers not found');

            return redirect(route('teachers.index'));
        }
        if(@Auth::user()->role_id<3) {
            //return 'Day la Student';
            $data['userName']=$request->userName;
            $data['name']=$request->name;
            $data['phone']=$request->phone;
            $data['email']=$request->email;
            $data['role_id']='2';
            if ( $request->has('password')  ) {
                $data['password'] = Hash::make($request->password);
            }
            $data = $this->usersRepository->update($data, $id);
          //  $users = $this->usersRepository->update($request->all(), $id);
            Flash::success('Teachers updated successfully.');
            return redirect(route('teachers.index'));
        }

//        $users = $this->usersRepository->update($request->all(), $id);
//        Flash::success('Users updated successfully.');
//        return redirect(route('users.index'));
    }

    /**
     * Remove the specified Users from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $teachers = $this->usersRepository->find($id);

        if (empty($teachers)) {
            Flash::error('Teachers not found');

            return redirect(route('teachers.index'));
        }

        $this->usersRepository->delete($id);

        Flash::success('Teachers deleted successfully.');

        return redirect(route('teachers.index'));
    }
}
