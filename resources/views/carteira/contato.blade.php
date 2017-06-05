@extends('welcome')
@section('carteira')
<div class="form-group">
    <h1><center> CONTATO </center></h1>
</div>
</br></br>
<div class="col-sm-12">
	<form method="POST" action="{{strpos(Request::url(), 'editar') ? route('atualizar_contato', $contato->id) : route('salvar_contato')}}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="form-group">
		        <label for="name">Nome</label>
		        <input type="text" class="form-control" name="name" value="{{strpos(Request::url(), 'editar') ? $contato->name : ''}}" id="descricao" required>
		    </div>
		    <div class="form-group">
		        <label for="phone">Telefone</label>
		        <input type="text" class="form-control" name="phone" value="{{strpos(Request::url(), 'editar') ? $contato->phone : ''}}" id="descricao">
		    </div>
		    <div class="form-group">
		        <label for="email">E-mail</label>
		        <input type="text" class="form-control" name="email" value="{{strpos(Request::url(), 'editar') ? $contato->email : ''}}" id="descricao">
		    </div>
		    <input type="submit" value="{{strpos(Request::url(), 'editar') ? 'Editar Contato' : 'Cadastrar Contato'}}" class="btn btn-default">
        	
		</div>

		
		
	</form>
	    <div class="panel-body">
	            <table class="table">
	            <thead>
	                <tr>
	                    <th> Nome</th>
	                    <th> Telefone</th>
	                    <th> E-mail</th>
	                    <th> Editar</th>
	                    <th> Remover</th>
	                </tr>
	            </thead>
	            <tbody>
	            @foreach($contatos as $contato)
	                <tr>
	                    <td>{{$contato->name}}</td>
	                    <td>{{$contato->phone}}</td>
	                    <td>{{$contato->email}}</td>
	                    <td>
	                         <a href="{{route('editar_contato', $contato->id)}}" class="btn btn-sm btn-warning glyphicon glyphicon-pencil"></a>
	                    </td>
	                    <td>
	                        <a href="{{route('remover_contato', $contato->id)}}" class="btn btn-sm btn-danger glyphicon glyphicon-remove"></a>
	                    </td>
	                </tr>
	              @endforeach
	            </tbody>
	        </table>
	    </div>
	</div>
</div>


		<script type="text/javascript" src="{{ URL::asset('theme/js/plugins/bootstrap/bootstrap-datepicker.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/bootstrap/bootstrap-timepicker.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/bootstrap/bootstrap-colorpicker.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/bootstrap/bootstrap-file-input.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/bootstrap/bootstrap-select.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('theme/js/plugins/tagsinput/jquery.tagsinput.min.js') }}"></script>

@endsection