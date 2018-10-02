<!DOCTYPE html>
<html lang="en">
    @include('layout.front.head')
	<body>
		@include('layout.front.navbar')

    @yield('body')

    @include('layout.front.footer')
	</body>
</html>
