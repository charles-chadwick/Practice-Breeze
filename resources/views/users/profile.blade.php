@extends("app")
@section("heading")
	{{ __("Profile for ".$user->full_name)  }}
@endsection
@section("content")
<livewire:user-profile :user="$user" />
@endsection