<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Repositories\UsersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Response;

class UsersController extends AppBaseController
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
            //Get student list
            $users = $this->usersRepository->getuserbyRoleid(3);
            return view('users.index')
                ->with('users', $users);
       //     }
    }
    /**
     * Show the form for creating a new Users.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
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
        $students['userName']=$request->userName;
        $students['name']=$request->name;
        $students['phone']=$request->phone;
        $students['email']=$request->email;
        $students['role_id']='3';
        $students['password']=Hash::make($request->password);
        $this->usersRepository->create($students);
        Flash::success('Users saved successfully.');

        return redirect(route('users.index'));
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

            $users = $this->usersRepository->find($id);

            if (empty($users)) {
                Flash::error('Users not found');

                return redirect(route('users.index'));
            }

        return view('users.show')->with('users', $users);
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
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }
        return view('users.edit')->with('users', $users);
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
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }
        if(@Auth::user()->role_id<3) {
            $data['userName']=$request->userName;
            $data['name']=$request->name;
            $data['phone']=$request->phone;
            $data['email']=$request->email;
            $data['role_id']='3';
            if ( $request->has('password')  ) {
                $data['password'] = Hash::make($request->password);
            }
            $students = $this->usersRepository->update($data, $id);
            Flash::success('Users updated successfully.');
            return redirect(route('users.index'));
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
        $users = $this->usersRepository->find($id);

        if (empty($users)) {
            Flash::error('Users not found');

            return redirect(route('users.index'));
        }

        $this->usersRepository->delete($id);

        Flash::success('Users deleted successfully.');

        return redirect(route('users.index'));
    }
}
