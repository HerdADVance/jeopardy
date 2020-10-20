<div class="register">
    <h1>Login</h1>
    <form wire:submit.prevent="submit">

    	<input type="email" wire:model="form.email" placeholder="E-Mail" />
    	@error('form.email')<span class="red">{{ $message }}@enderror

    	<input type="password" wire:model="form.password" placeholder="Password" />
    	@error('form.password')<span class="red">{{ $message }}@enderror

    	<input type="submit" value="Login" />
    </form>
</div>
