@extends("app")
@section("heading")
	
	<div class="flex">
		<div class="flex-1">
			{{ __("Appointment Types") }}
		</div>
		<div>
			
			<flux:modal.trigger name="add_appointment">
				<flux:button variant="primary">{{ __("Add New") }}</flux:button>
			</flux:modal>
			<flux:modal name="add_appointment">
				<livewire:appointment-type-form />
			</flux:modal>
		</div>
	</div>
@endsection
@section("subheading")
	All the appointment types!
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
				<flux:link :href="route('types.index', ['order_by' => 'title'])">Title</flux:link>
			</flux:table.cell>
			<flux:table.cell>
				<flux:link :href="route('types.index', ['order_by' => 'length'])">Length</flux:link>
			</flux:table.cell>
			<flux:table.cell>
				Description
			</flux:table.cell>
			<flux:table.cell>Action</flux:table.cell>
		</flux:table.columns>
		<flux:table.rows>
			@foreach($appointment_types as $appointment_type)
				<flux:table.row wire:key="{{ $appointment_type->id }}">
					<flux:table.cell>
						{{ $appointment_type->title }}
					</flux:table.cell>
					<flux:table.cell>
						{{ $appointment_type->length }}
					</flux:table.cell>
					<flux:table.cell>
						{{ $appointment_type->description }}
					</flux:table.cell>
					<flux:table.cell>
						<flux:dropdown>
							<flux:button>...</flux:button>
							<flux:menu>
								<flux:menu.item icon="user-circle">
									<flux:modal.trigger :name="'edit-appointment-form-'.$appointment_type->id">
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
						
						<flux:modal :name="'edit-appointment-form-'.$appointment_type->id">
							<livewire:appointment-type-form :type="$appointment_type" />
						</flux:modal>
					</flux:table.cell>
				</flux:table.row>
			@endforeach
		</flux:table.rows>
	</flux:table>

@endsection