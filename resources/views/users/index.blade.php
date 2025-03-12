@extends("app")
@section("heading")
	
	<div class="flex">
		<div class="flex-1">
			{{ __("Users") }}
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
	{{ __("A list of all the users") }}
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
			<flux:table.cell>Role</flux:table.cell>
			<flux:table.cell>First</flux:table.cell>
			<flux:table.cell>Last</flux:table.cell>
			<flux:table.cell>Email</flux:table.cell>
			<flux:table.cell>Actions</flux:table.cell>
		</flux:table.columns>
		<flux:table.rows>
			@foreach($users as $user)
				<flux:table.row wire:key="{{ $user->id }}">
					<flux:table.cell>{{ $user->role }}</flux:table.cell>
					<flux:table.cell>{{ $user->first_name }}</flux:table.cell>
					<flux:table.cell>{{ $user->last_name }}</flux:table.cell>
					<flux:table.cell>{{ $user->email }}</flux:table.cell>
					
					<flux:table.cell>
						<flux:dropdown>
							<flux:button>...</flux:button>
							<flux:menu>
								<flux:menu.item icon="user-circle">
									<flux:modal.trigger :name="'edit-profile-'.$user->id">
										<a href="#">Profile</a>
									</flux:modal.trigger>
								</flux:menu.item>
								
								<flux:menu.separator />
								<flux:menu.item
										variant="danger"
										icon="trash">Delete
								</flux:menu.item>
							</flux:menu>
						
						</flux:dropdown>
						<flux:modal :name="'edit-profile-'.$user->id">
							<livewire:user-profile :user="$user"></livewire:user-profile>
						</flux:modal>
					</flux:table.cell>
				
				
				</flux:table.row>
			@endforeach
		</flux:table.rows>
	</flux:table>
@endsection