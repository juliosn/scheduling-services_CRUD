<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
					<h5 class="card-title">Cadastrar - Agendamento de Potenciais Clientes</h5>
					<p class="card-text">Sistema utilizado para agendamento de serviços.</p>
					<p>
						@if(Session::has('sucesso'))
						<div class="alert alert-success" role="alert">
							{{Session::get('sucesso')}}
						</div>
						@endif
						<form method="POST" action="{{url('atualizar-servicos')}}">
						@csrf
						<input type="hidden" name="id" value="{{$data->id}}">
							<div class="form-group">
								@error('nome')
								<div class="alert alert-danger" role="alert">
									{{$message}}
								</div>
								@enderror
								<label for="lblNome">Nome:</label>
								<input class="form-control" type="text" name="nome" value="{{$data->nome}}">
								<br>
							</div>
							<div class="form-group">
								@error('telefone')
								<div class="alert alert-danger" role="alert">
									{{$message}}
								</div>
								@enderror
								<label for="lblTelefone">Telefone:</label>
								<input class="form-control"  type="tel" name="telefone" placeholder="(xx)xxxxx-xxxx"
								value="{{$data->telefone}}">
								<br>
							</div>
							<div class="form-group">
								@error('origem')
								<div class="alert alert-danger" role="alert">
									{{$message}}
								</div>
								@enderror
								<label for="lblOrigem">Origem:</label>
								<select class="form-control" name="origem">
									<option selected disabled>{{$data->origem}}</option>
									<option>Celular</option>
									<option>Fixo</option>
									<option>Whatsapp</option>
									<option>Facebook</option>
									<option>Instagram</option>
									<option>Google Meu Negocio</option>
								</select>
								<br>
							</div>
							<div class="form-group">
								@error('datacont')
								<div class="alert alert-danger" role="alert">
									{{$message}}
								</div>
								@enderror
								<label for="lblData">Data do Contato:</label>
								<input class="form-control" type="date" name="datacont" value="{{$data->datacont}}">
								<br>
							</div>
							<div class="form-group">
								@error('obs')
								<div class="alert alert-danger" role="alert">
									{{$message}}
								</div>
								@enderror
								<label for="lblObs">Observação</label>
								<textarea class="form-control" name="obs" rows="3">{{$data->obs}}</textarea>
								<br>
							</div>
							<div>
								&nbsp
							</div>
							<button class="btn btn-primary">Editar</button>
						</form>
					</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
