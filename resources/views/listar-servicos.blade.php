<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/style.css">
        <title>Sistema WEB</title>
        @vite([
                'resources/js/app.js', 
                'resources/css/app.css',
                'node_modules/bootstrap/dist/css/bootstrap.min.css',
                'node_modules/bootstrap/dist/js/bootstrap.bundle.js'
            ])
    </head>
    <body>
    <div class="container">
		<div>
			&nbsp
		</div>
		<div class="row">
			<nav class="navbar navbar-expand-lg navbar-dark bg-primary col-12 px-3">
				<a class="navbar-brand" href="{{url('/')}}">SISTEMA WEB</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="{{url('/')}}">Cadastrar</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('listar-servicos')}}">Consultar</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
        <div class="row">
			<div class="card mb-3 col-12">
				<div class="card-body">
                    <h2>Consulta de Serviços</h2>
                    @if(Session::has('sucesso'))
						<div class="alert alert-success" role="alert">
							{{Session::get('sucesso')}}
						</div>
						@endif
                    <table class="table">
                        <thead>
                            <tr>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Origem</th>
                            <th>Data do Contato</th>
                            <th>Observação</th>
                            <th>Ação</th>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($data as $ser)
                                <tr>
                                    <td>{{$ser->nome}}</td>
                                    <td>{{$ser->telefone}}</td>
                                    <td>{{$ser->origem}}</td>
                                    <td>{{$ser->datacont}}</td>
                                    <td>{{$ser->obs}}</td>
                                    <td><a class="btn btn-primary m-1" href="{{url('editar-servicos/'.$ser->id)}}">Editar</a><a class="btn btn-danger m-1" href="{{url('excluir-servicos/'.$ser->id)}}">Excluir</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>