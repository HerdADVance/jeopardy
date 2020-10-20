<div class="register">
    <h1>Register</h1>
    <form wire:submit.prevent="submit">
    	<input type="name" wire:model="form.name" placeholder="Name" />
    	@error('form.name')<span class="red">{{ $message }}@enderror

    	<input type="email" wire:model="form.email" placeholder="E-Mail" />
    	@error('form.email')<span class="red">{{ $message }}@enderror

    	<input type="password" wire:model="form.password" placeholder="Password" />
    	@error('form.password')<span class="red">{{ $message }}@enderror
    	
    	<input type="text" wire:model="form.password_confirmation" placeholder="Confirm Password" />

    	<input type="submit" value="Register" />
    </form>
</div>
