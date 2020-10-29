<div class="register">
    <h1>Login</h1>
    <form wire:submit.prevent="submit">

    	<input type="text" wire:model="form.username" placeholder="Username" />
    	@error('form.username')<span class="red">{{ $message }}@enderror

    	<input type="password" wire:model="form.password" placeholder="Password" />
    	@error('form.password')<span class="red">{{ $message }}@enderror

    	<input type="submit" value="Login" />
    </form>
</div>
