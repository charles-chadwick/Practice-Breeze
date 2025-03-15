<form wire:submit.prevent="{{ $action }}">
	
	
	<div class="p-4">
		<flux:input
				type="text"
				wire:model="title"
				label="Title"
				placeholder="Title" />
	</div>
	
	<div class="p-4">
		<flux:textarea
				wire:model="description"
				label="Description"
				placeholder="Description" />
	</div>
	
	<div class="p-4">
		<flux:input
				type="text"
				wire:model="length"
				label="Length"
				placeholder="Length" />
	</div>
	
	<div class="p-4">
		<flux:button
				type="submit"
				variant="primary">Save
		</flux:button>
	</div>

</form>