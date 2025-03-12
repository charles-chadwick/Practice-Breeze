@extends("app")
@section("heading")
	{{ __("Profile for ".$user->full_name)  }}
@endsection
@section("content")
	@if (session()->has('message'))
		<flux:callout
				variant="success"
				icon="check-circle"
				heading="{{ session('message')  }}" />
	@endif
	<livewire:user-profile :user="$user" />
@endsection