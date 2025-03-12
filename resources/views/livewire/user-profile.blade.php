<form wire:submit.prevent="{{ $action }}">

	<div class="grid grid-cols-3 sm:grid-cols-2">
		<div class="p-4">
			<flux:input
					type="text"
					wire:model="first_name"
					name="first_name"
					label="First Name"
					placeholder="First Name" />
		</div>
		
		<div class="p-4">
			<flux:input
					type="text"
					wire:model="middle_name"
					name="middle_name"
					label="Middle Name"
					placeholder="Middle Name" />
		</div>
		
		<div class="p-4">
			<flux:input
					type="text"
					wire:model="last_name"
					name="last_name"
					label="Last Name"
					placeholder="Last Name" />
		</div>
		
		<div class="p-4">
			<flux:input
					type="email"
					wire:model="email"
					name="email"
					label="Email"
					placeholder="Email" />
		</div>
		
		<div class="p-4">
			<flux:input
					type="date"
					wire:model="dob"
					name="dob"
					label="Date of Birth"
					placeholder="Date of Birth" />
		</div>
		
		<div class="p-4">
			<flux:select label="Gender" placeholder="Gender" wire:model="gender">
				<flux:select.option value="Male">Male</flux:select.option>
				<flux:select.option value="Female">Female</flux:select.option>
			</flux:select>
		</div>
		
		<div class="p-4 grid-cols-4 col-start-2 sm:grid-cols-2 sm:col-start-1">
		<flux:button type="submit" variant="primary" class="w-full">Save</flux:button>
		</div>
	
	</div>
</form>