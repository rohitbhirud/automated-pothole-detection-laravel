@include('layouts.header')

<div class="container">
	
	@include('layouts.jumbotron')

	<div class="row main-container">
		<div class="col-md-2 sidebar">
			@include('layouts.sidebar')
		</div>

		<div class="col-md-10 main">
			<div class="main-header text-center">
				<h3>{{ $title }}</h3>
			</div>

			<div class="content">
				@yield('content')
			</div>
		</div>

	</div>
</div>

@include('layouts.footer')