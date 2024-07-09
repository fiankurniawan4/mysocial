<?php

namespace App\Livewire\Auth;

use App\Models\Article;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

class Profile extends Component
{
    public $id;
    public $name, $username, $password, $password_confirmation;

    public function profileUpdate()
    {
        if (auth()->user()->id != $this->id) {
            flash('error', 'Kamu tidak bisa mengedit profile orang lain.');
            return;
        }

        $this->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = User::find($this->id)->update([
            'name' => $this->name,
            'username' => $this->username,
            'password' => bcrypt($this->password),
        ]);

        flash('success', 'Profile updated successfully.');
        $this->dispatch('refreshProfile', $user);
    }

    #[On('refreshProfile')]
    public function updateList($user)
    {
    }

    public function mount($id) {
        $user = User::find($id);

        $this->id = $user->id;
        $this->name = $user->name;
        $this->username = $user->username;
    }

    public function render()
    {
        return view('livewire.auth.profile', [
            'user' => User::find($this->id),
            'total_articles' => Article::where('user_id', $this->id)->count(),
        ])->title('Profile | ' . User::find($this->id)->name);
    }
}
