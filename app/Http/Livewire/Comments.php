<?php

namespace App\Http\Livewire;

use App\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{

	use WithPagination;

	//  public $comments;
	public $newComment;
	public $image;
	public $ticketId = 2;

	protected $listeners = [
		'fileUpload' => 'handleFileUpload',
		'ticketSelected' // don't need 2nd half if same name as function
	];

	// Mount is one of the Livewire lifecycle hooks
	public function mount(){
		//$initialComments = Comment::get();
		//$this->comments = $initialComments;
	}

	// Updated is one of the Livewire lifecycle hooks
	public function updated($field){
		$this->validateOnly($field, [
			'newComment' => 'required|max:255'
		]);
	}

	public function addComment(){

		$this->validate(['newComment' => 'required|max:255']);

		$image = $this->storeImage();

		$createdComment = Comment::create([
			'body' => $this->newComment,
			'user_id' => 1,
			'ticket_id' => $this->ticketId,
			'image' => $image
		]);

		//$this->comments->prepend($createdComment);

		$this->newComment = "";
		$this->image = "";

		session()->flash('message', 'Comment added successfully');
	}

	public function handleFileUpload($imageData){
		$this->image = $imageData;
	}

	public function removeComment($commentId){
		$comment = Comment::find($commentId);
		Storage::disk('public')->delete($comment->image);
		$comment->delete();
		//$this->comments = $this->comments->except($commentId);
		session()->flash('message', 'Comment deleted successfully');
	}

	public function storeImage(){
		if(!$this->image) return null;

		$img = ImageManagerStatic::make($this->image)->encode('jpg');
		$name = Str::random() . '.jpg';
		Storage::disk('public')->put($name, $img);
		return $name;
	}

	public function ticketSelected($ticketId){
		$this->ticketId = $ticketId;
	}

    public function render()
    {
        return view('livewire.comments', [
        	'comments' => Comment::where('ticket_id', $this->ticketId)->latest()->get()
        ]);
    }
}
