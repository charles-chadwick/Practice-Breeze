@extends("app")
@section("heading")

	<div class="flex">
		<div class="flex-1">
		{{ __("Patients") }}
		</div>
		<div>
			
			<flux:modal.trigger name="add_user">
			<flux:button variant="primary">{{ __("Add New") }}</flux:button>
			</flux:modal>
			<flux:modal name="add_user">
				<livewire:user-profile />
			</flux:modal>
		</div>
	</div>
@endsection
@section("subheading")
	{{ __("A list of all the patients") }}
@endsection
@section("content")
	@if (session()->has('message'))
		
		<div class="alert alert-success">
			{{ session('message') }}
		</div>
	
	@endif
	<flux:table>
		<flux:table.columns>
			<flux:table.cell>Name</flux:table.cell>
			<flux:table.cell>Email</flux:table.cell>
			<flux:table.cell>DOB</flux:table.cell>
			<flux:table.cell>Actions</flux:table.cell>
		</flux:table.columns>
		<flux:table.rows>
			@foreach($patients as $patient)
				<flux:table.row wire:key="{{ $patient->id }}">
					<flux:table.cell>{{ $patient->full_name }}</flux:table.cell>
					<flux:table.cell>{{ $patient->email }}</flux:table.cell>
					<flux:table.cell>{{ $patient->profile->dob }}</flux:table.cell>
					<flux:table.cell>
						<flux:dropdown>
							<flux:button>...</flux:button>
							<flux:menu>
								<flux:menu.item icon="user-circle">
									<a href="{{ route('users.profile', $patient->id) }}">Profile</a>
								</flux:menu.item>
								
								<flux:menu.separator />
								<flux:menu.item
										variant="danger"
										icon="trash">Delete
								</flux:menu.item>
							</flux:menu>
						
						</flux:dropdown>
					</flux:table.cell>
				
				
				</flux:table.row>
			@endforeach
		</flux:table.rows>
	</flux:table>
@endsection