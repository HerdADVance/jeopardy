
<div class="wrap">
    <h1>Comments</h1>

    @error('newComment')<span class="error">{{$message}}</span>@enderror
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <section>
        @if($image)
            <img src="{{ $image }}" />
        @endif
        <input type="file" id="image" wire:change="$emit('fileChosen')">
    </section>

    <form wire:submit.prevent="addComment">
    	<textarea wire:model.debounce.500ms="newComment" placeholder="Whats up?"></textarea>
    	<button type="submit">Add Comment</button>
	</form>

    @foreach($comments as $comment)
    	<div class="comment">
    		<h2>{{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}</h2>
    		<p>{{ $comment->body }}</p>
            @if($comment->image)
                <img src="{{ $comment->imagePath }}" />
            @endif
            <button wire:click="removeComment({{$comment->id}})" class="red">Delete Comment</button>
    	</div>

    @endforeach


    <script>
        window.livewire.on('fileChosen', () => {
            let inputField = document.getElementById('image');
            let file = inputField.files[0]
            let reader = new FileReader();
           
            reader.onloadend = () => {
                window.livewire.emit('fileUpload', reader.result);
            }

            reader.readAsDataURL(file);
        })
    </script>

</div>