<form wire:submit.prevent="{{ $action }}">
	
	<div class="grid grid-cols-3">
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
					wire:model="middle_name"
					label="Middle Name"
					placeholder="Middle Name" />
		</div>
		
		<div class="p-4">
			<flux:input
					type="text"
					wire:model="last_name"
					label="Last Name"
					placeholder="Last Name" />
		</div>
		
		<div class="p-4 col-span-2 col-end-3">
			<flux:input
					type="email"
					wire:model="email"
					label="Email"
					placeholder="Email" />
		</div>
		<div class="p-4">
			<flux:input
					type="date"
					wire:model="birth_date"
					label="Birth Date"
					placeholder="Birth Date" />
		</div>
		<div class="p-4">
			<flux:input
					type="text"
					wire:model="gender"
					label="Gender"
					placeholder="Gender" />
		</div>
		<div class="col-span-2">
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
		</div>
		<div class="p-4 col-span-3 justify-center">
			<flux:button
					type="submit"
					variant="primary">Save
			</flux:button>
		</div>
	
	</div>
</form>