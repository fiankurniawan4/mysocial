<?php

namespace App\Livewire\Chat;

use App\Events\MessageSendEvent;
use App\Models\Message;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.chat')]
class Chat extends Component
{
    public $user;
    public $sender_id;
    public $receiver_id;
    public $message = '';
    public $messages = [];

    public function mount($id)
    {
        $this->sender_id = auth()->user()->id;
        $this->receiver_id = $id;

        $messages = Message::where(function ($query) {
            $query->where('sender_id', $this->sender_id)
                ->where('receiver_id', $this->receiver_id);
        })->orWhere(function ($query) {
            $query->where('sender_id', $this->receiver_id)
                ->where('receiver_id', $this->sender_id);
        })
            ->with('sender:id,name', 'receiver:id,name')
            ->get();

        foreach ($messages as $message) {
            $this->appendChatMessage($message);
        }
        $this->user = User::whereId($id)->first();
    }

    public function sendMessage()
    {
        $chatMessage = new Message();
        $chatMessage->sender_id = $this->sender_id;
        $chatMessage->receiver_id = $this->receiver_id;
        $chatMessage->message = $this->message;
        $chatMessage->save();

        $this->appendChatMessage($chatMessage);

        broadcast(new MessageSendEvent($chatMessage))->toOthers();

        $this->message = '';

    }

    #[On('echo-private:chat-channel.{sender_id},MessageSendEvent')]
    public function listenForMessage($event)
    {
        $chatMessage = Message::whereId($event['message']['id'])
            ->with('sender:id,name', 'receiver:id,name')
            ->first();

        $this->appendChatMessage($chatMessage);
    }

    public function appendChatMessage($message)
    {
        $this->messages[] = [
            'id' => $message->id,
            'message' => $message->message,
            'sender' => $message->sender->name,
            'receiver' => $message->receiver->name,
        ];
    }

    public function render()
    {
        if(auth()->user()->id == $this->user->id){
            abort(404, 'You cannot chat with yourself');
        }
        return view('livewire.chat.chat');
    }
}
