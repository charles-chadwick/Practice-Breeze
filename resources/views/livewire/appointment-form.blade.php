<form wire:submit.prevent="save">
	
	<div class="grid grid-cols-2">
		
		<div class="p-4 col-span-2">
			<flux:select
					wire:model="patient_id"
					label="Patient">
				@foreach($patients as $patient)
					<flux:select.option value="{{ $patient->id }}">{{ $patient->full_name }}</flux:select.option>
				@endforeach
			</flux:select>
		</div>
		
		<div class="col-span-2">
			<div class="p-4">
				<flux:input
						type="date"
						wire:model="date"
						label="Date"
						placeholder="Date" />
			</div>
		</div>
		<div class="p-4">
			<flux:input
					type="time"
					wire:model="time"
					label="Time"
					placeholder="Time" />
		</div>
		<div class="p-4">
			<flux:input
					type="number"
					wire:model="length"
					label="Length"
					placeholder="Length" />
		</div>
		
		<div class="p-4">
			<flux:select
					wire:model="appointment_type_id"
					label="Type">
				@foreach($types as $type)
					<flux:select.option value="{{ $type->id }}" wire:key="{{ $type->id }}">{{ $type->title }}</flux:select.option>
				@endforeach
			</flux:select>
		</div>
		
		<div class="p-4">
			<flux:select
					wire:model="status"
					label="Status">
				@foreach($statuses as $status_key => $status)
					<flux:select.option value="{{ $status }}" wire:key="{{ $status_key }}">{{ $status }}</flux:select.option>
				@endforeach
			</flux:select>
		</div>
		
		<div class="p-4 col-span-2">
			<flux:input
					type="text"
					wire:model="title"
					label="Title"
					placeholder="Title" />
		</div>
		
		<div class="p-4 col-span-2">
			<flux:textarea
					wire:model="comments"
					label="Comments"
					placeholder="Comments" />
		</div>
		
		<div class="p-4">
			<flux:button
					type="submit"
					variant="primary">Save
			</flux:button>
		</div>
	
	</div>
</form>