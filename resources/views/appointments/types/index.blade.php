@extends("app")
@section("heading")
	{{__("Appointment Types")}}
@endsection
@section("subheading")
	All the appointment types!
@endsection
@section("content")
	
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
							sup
						</flux:modal>
					</flux:table.cell>
				</flux:table.row>
			@endforeach
		</flux:table.rows>
	</flux:table>

@endsection