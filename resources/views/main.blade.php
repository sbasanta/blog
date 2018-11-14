@include('partials._head')
@include('partials._nav')
<body>

<div class="container">
	@include('partials._messages')
	

@yield('body')

@include('partials._footer')

</div><!--container-->
@include('partials._javascript')