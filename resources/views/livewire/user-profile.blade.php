@php use App\Enums\UserRole; @endphp
<form wire:submit.prevent="{{ $action }}">
	
	<div class="grid grid-cols-2">
		<div class="p-4">
			<flux:input
					type="text"
					wire:model="first_name"
					label="First Name"
					placeholder="First Name" />
		</div>
		
		<div class="p-4">
			<flux:input
					type="text"
					wire:model="last_name"
					label="Last Name"
					placeholder="Last Name" />
		</div>
		
		<div class="p-4">
			<flux:select
					wire:model="role"
					label="Role">
				@foreach(UserRole::values() as $role_type => $role)
					<flux:select.option value="{{ $role_type }}">{{ $role }}</flux:select.option>
				@endforeach
			</flux:select>
		</div>
		
		<div class="p-4">
			<flux:input
					type="email"
					wire:model="email"
					label="Email"
					placeholder="Email" />
		</div>
		<div class="p-4">
			<flux:input
					type="password"
					wire:model="password"
					label="Password"
					placeholder="Password" />
		</div>
		<div class="p-4">
			<flux:input
					type="password"
					wire:model="password_confirmation"
					label="Confirm Password"
					placeholder="Confirm Password" />
		</div>
		
		<div class="p-4 col-span-2 justify-center">
			<flux:button
					type="submit"
					variant="primary">Save
			</flux:button>
		</div>
	
	</div>
</form>