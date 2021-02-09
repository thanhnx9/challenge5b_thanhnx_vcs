<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreateMessagesRequest;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Session;
use App\Repositories\MessagesRepository;



class MessagesController extends Controller
{
    private $messagesRepository;
    private $usersRepository;

    public function __construct(MessagesRepository $messagesRepo, UsersRepository $usersRepo)
    {
        $this->messagesRepository = $messagesRepo;
        $this->usersRepository=$usersRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create($receiver_id)
    {
        return view('messages.create',compact('receiver_id'));
    }
    public function showSentMessage()
    {
        //   $messages = $this->messagesRepository->all();
        $sender=Auth::user()->userName;
        $messages=$this->messagesRepository->getSentMessage($sender);
        if($messages!=null){
            return view('messages.showSentMessage')
                ->with('messages', $messages);
        }
    }

    public function store(Request $request,$receiver_id)
    {
        $requestAll = $request->all();
//        //Chuc nang nhan tin.
//        if(session('check')=='inbox')
//        {
        $receiver_data= $this->usersRepository->getuserbyUserid($receiver_id);
        $dataInsert = array(
            'receiver' => $receiver_data->userName,
            'sender' => Auth::user()->userName,
            'message' => $requestAll['message']
        );
        $insertData=$this->messagesRepository->create($dataInsert);
        if($insertData)
        {
            Session::flash('success', 'Send message successfully. ✔');
            return redirect(url('/outbox'));
        }
        else
        {
            Session::flash('error', 'Send message fail! 〤');
        }

        return redirect()->back();
    }
    public function show($id)
    {
//        $messages = $this->messagesRepository->find($id);
//
//        if (empty($messages)) {
//            Flash::error('Messages not found');
//
//            return redirect(route('messages.index'));
//        }
//
//        return view('messages.show')->with('messages', $messages);
    }

    public function edit($id)
    {
        $messages = $this->messagesRepository->find($id);

        if (empty($messages)) {
            Flash::error('Messages not found');

            return redirect(route('outbox'));
        }
        return view('messages.edit')->with('messages', $messages);

    }

    public function update($id, Request $request)
    {
        $message = $this->messagesRepository->find($id);
        $data['message']=$request->message;
        $data['created_at']=now();
        $data['sender']=$message->sender;
        $data['receiver']=$message->receiver;

        $updateData=$this->messagesRepository->update($data,$id);

        if ($updateData) {
            Session::flash('success', 'Edit message successfully! ✔ ');
            return redirect(route('outbox'));
        }else {
            Session::flash('error', 'Edit message fail! 〤');
        }
      //  return redirect()->back();
    }

    public function destroy($id)
    {
        $messages = $this->messagesRepository->find($id);

        if (empty($messages)) {
            Flash::error('Messages not found');

            return redirect(route('messages.showSentMessage'));
        }
        $this->messagesRepository->delete($id);

        Flash::success('Message deleted successfully! ✔');
        //Session::flash('success', 'Message deleted successfully! ✔');
        return redirect()->back();

    }

}
