<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta
			name="viewport"
			content="width=device-width, initial-scale=1">
	
	<title>Laravel</title>
	
	<!-- Fonts -->
	<link
			rel="preconnect"
			href="https://fonts.bunny.net">
	<link
			href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600"
			rel="stylesheet" />
	
	<!-- Styles / Scripts -->
	@vite(['resources/css/app.css', 'resources/js/app.js'])
	
	@fluxAppearance
</head>
<body class="min-h-screen bg-white dark:bg-zinc-800">
<flux:header
		container
		class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
	<flux:sidebar.toggle
			class="lg:hidden"
			icon="bars-2"
			inset="left" />
	
	<flux:brand
			href="#"
			logo="https://fluxui.dev/img/demo/logo.png"
			name="Acme Inc."
			class="max-lg:hidden dark:hidden" />
	<flux:brand
			href="#"
			logo="https://fluxui.dev/img/demo/dark-mode-logo.png"
			name="Acme Inc."
			class="max-lg:hidden! hidden dark:flex" />
	
	<flux:navbar class="-mb-px max-lg:hidden">
		<flux:navbar.item
				icon="home"
				href="#"
				current>Home
		</flux:navbar.item>
		<flux:navbar.item
				icon="calendar"
				href="#">Calendar
		</flux:navbar.item>
	</flux:navbar>
	
	<flux:spacer />
	
	<flux:navbar class="mr-4">
		<flux:navbar.item
				icon="magnifying-glass"
				href="#"
				label="Search" />
		<flux:navbar.item
				class="max-lg:hidden"
				icon="cog-6-tooth"
				href="#"
				label="Settings" />
		<flux:navbar.item
				class="max-lg:hidden"
				icon="information-circle"
				href="#"
				label="Help" />
	</flux:navbar>

</flux:header>

<flux:sidebar
		stashable
		sticky
		class="lg:hidden bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
	<flux:sidebar.toggle
			class="lg:hidden"
			icon="x-mark" />
	
	<flux:brand
			href="#"
			logo="https://fluxui.dev/img/demo/logo.png"
			name="Acme Inc."
			class="px-2 dark:hidden" />
	<flux:brand
			href="#"
			logo="https://fluxui.dev/img/demo/dark-mode-logo.png"
			name="Acme Inc."
			class="px-2 hidden dark:flex" />
	
	<flux:navlist variant="outline">
		<flux:navlist.item
				icon="home"
				href="#"
				current>Home
		</flux:navlist.item>
		<flux:navlist.item
				icon="calendar"
				href="#">Calendar
		</flux:navlist.item>
	
	</flux:navlist>
	
	<flux:spacer />
	
	<flux:navlist variant="outline">
		<flux:navlist.item
				icon="cog-6-tooth"
				href="#">Settings
		</flux:navlist.item>
		<flux:navlist.item
				icon="information-circle"
				href="#">Help
		</flux:navlist.item>
	</flux:navlist>
</flux:sidebar>

<flux:main container>
	<flux:heading
			size="xl"
			level="1">@yield("heading")</flux:heading>
	
	@hasSection("subheading")
		<flux:subheading
				size="lg"
				class="mb-6">@yield("subheading")</flux:subheading>
	@endif
	<flux:separator variant="subtle" />
	
	@yield("content")
</flux:main>

@fluxScripts
</body>
</html>