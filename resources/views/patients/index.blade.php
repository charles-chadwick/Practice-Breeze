@extends("app")
@section("heading")
    
    <div class="flex">
        <div class="flex-1">
            {{ __("Patients") }}
        </div>
        <div>
            
            <flux:modal.trigger name="add_patient">
                <flux:button variant="primary">{{ __("Add New") }}</flux:button>
            </flux:modal>
            <flux:modal name="add_patient">
                <livewire:patient-profile />
            </flux:modal>
        </div>
    </div>
@endsection
@section("subheading")
    {{ __("A list of all the patients") }}
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
            <flux:table.cell>First</flux:table.cell>
            <flux:table.cell>Middle</flux:table.cell>
            <flux:table.cell>Last</flux:table.cell>
            <flux:table.cell>Birth Date</flux:table.cell>
            <flux:table.cell>Actions</flux:table.cell>
        </flux:table.columns>
        <flux:table.rows>
            @foreach($patients as $patient)
                <flux:table.row wire:key="{{ $patient->id }}">
                    <flux:table.cell>{{ $patient->first_name }}</flux:table.cell>
                    <flux:table.cell>{{ $patient->middle_name }}</flux:table.cell>
                    <flux:table.cell>{{ $patient->last_name }}</flux:table.cell>
                    <flux:table.cell>{{ $patient->birth_date }}</flux:table.cell>
                    
                    <flux:table.cell>
                        <flux:dropdown>
                            <flux:button>...</flux:button>
                            <flux:menu>
                                <flux:menu.item icon="user-circle">
                                    <flux:modal.trigger :name="'edit-profile-'.$patient->id">
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
                        <flux:modal :name="'edit-profile-'.$patient->id">
                            <livewire:patient-profile :patient="$patient"></livewire:patient-profile>
                        </flux:modal>
                    </flux:table.cell>
                
                
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>
@endsection