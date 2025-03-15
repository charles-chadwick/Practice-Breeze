@extends("app")
@section("heading")
	
	<div class="flex">
		<div class="flex-1">
			{{ __("Patients") }}
		</div>
		<div>
			
			<flux:modal.trigger name="add_appointment">
				<flux:button variant="primary">{{ __("Add New") }}</flux:button>
			</flux:modal>
			<flux:modal name="add_appointment">
				<livewire:appointment-form />
			</flux:modal>
		</div>
	</div>
@endsection
@section("subheading")
	<flux:separator class="my-4" />
	
	{{ __("A list of all the appointments") }}

@endsection
@section("content")
	@if (session()->has('message'))
		<flux:callout
				variant="success"
				icon="check-circle"
				heading="{{ session('message')  }}" />
	@endif
	<flux:table>
		<flux:table.columns>
			<flux:table.cell>
				<flux:link :href="route('appointments.index', ['order_by' => 'id'])">ID</flux:link>
			</flux:table.cell>
			<flux:table.cell>
				<flux:link :href="route('appointments.index', ['order_by' => 'date_and_time'])">Date and Time</flux:link>
			</flux:table.cell>
			<flux:table.cell>
				<flux:link :href="route('appointments.index', ['order_by' => 'title'])">Status</flux:link>
			</flux:table.cell>
			<flux:table.cell>
				<flux:link :href="route('appointments.index', ['order_by' => 'type'])">Type</flux:link>
			</flux:table.cell>
			<flux:table.cell>
				<flux:link :href="route('appointments.index', ['order_by' => 'title'])">Title</flux:link>
			</flux:table.cell>
			<flux:table.cell>
				Patient
			</flux:table.cell>
			<flux:table.cell>Actions</flux:table.cell>
		</flux:table.columns>
		<flux:table.rows>
			@foreach($appointments as $appointment)
				<flux:table.row wire:key="{{ $appointment->id }}">
					<flux:table.cell>#{{ $appointment->id }}</flux:table.cell>
					<flux:table.cell>
						<flux:badge>
							{{ $appointment->date }} @ {{ $appointment->time }}
						</flux:badge>
						</flux:table.cell>
					<flux:table.cell>{{ $appointment->status }}</flux:table.cell>
					<flux:table.cell>{{ $appointment->type }}</flux:table.cell>
					<flux:table.cell>{{ $appointment->title }}</flux:table.cell>
					<flux:table.cell>{{ $appointment->patient->full_name }}</flux:table.cell>
					
					<flux:table.cell>
						<flux:dropdown>
							<flux:button>...</flux:button>
							<flux:menu>
								<flux:menu.item icon="user-circle">
									<flux:modal.trigger :name="'edit-appointment-form-'.$appointment->id">
										<a href="#">Edit</a>
									</flux:modal.trigger>
								</flux:menu.item>
								
								<flux:menu.separator />
								<flux:menu.item
										variant="danger"
										icon="trash">Delete
								</flux:menu.item>
							</flux:menu>
						
						</flux:dropdown>

						<flux:modal :name="'edit-appointment-form-'.$appointment->id">
							<livewire:appointment-form :appointment="$appointment"></livewire:appointment-form>
						</flux:modal>
					</flux:table.cell>
				
				
				</flux:table.row>
			@endforeach
		</flux:table.rows>
	</flux:table>
@endsection