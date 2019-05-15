<!DOCTYPE html>
<html lang="pt">
<head>
	<title>3º TRAIL das EIRAS</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}"/>
	<meta name="description" content="3ª edição do Trail das Eiras trata-se de uma prova de Trail running que percorre trilhos e caminhos na zona florestal do monte das Eiras, inseridos na área de Vermoim e zonas adjacentes do Concelho de Vila Nova de Famalicão.">
	<meta name="keywords" content="trail,natureza,running,prozis">
	
	<link rel="icon" href="favicon.ico">
	
	<link rel="stylesheet" href="{{ elixir('css/app.css') }}"/>
</head>
<body>
<div class="site-wrap" id="app">
	@include('layouts.navbar')
	
	@include('sections.hero')
	
	@include('sections.about')
	
	@include('sections.categories')
	
	@include('sections.schedule')
	
	@include('sections.sponsors')
	
	@include('layouts.footer')
</div>

<script src="{{ asset('js/template.js') }}"></script>
<script src="{{ elixir('js/app.js') }}"></script>

</body>
</html>
