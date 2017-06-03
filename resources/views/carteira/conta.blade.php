@extends('welcome')
@section('carteira')
<div class="form-group">
    <h1><center> CONTA </center></h1>
</div>
</br></br>
<div class="col-sm-12">
	<form method="POST" action="{{route('salvar_conta')}}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="form-group">
		        <label for="nome">Nome do Banco</label>
		        <input type="text" class="form-control" name="name_bank" id="descricao" required>
		    </div>
		    <div class="form-group">
		        <label for="nome">Número da conta</label>
		        <input type="text" class="form-control" name="number" id="descricao">
		    </div>
		    <div class="form-group">
		        <label for="nome">Tipo</label>
		        <div class="form-group">
		            <select class="form-control" name="type_account_id">
		                <option value="1">Corrente</option>
		                <option value="2">Poupança</option>
		            </select>
		        </div>
		    </div>
		    <input type="submit" value="Cadastrar Conta" class="btn btn-default">
		</div>

		
		
	</form>
	    <div class="panel-body">
	            <table class="table">
	            <thead>
	                <tr>
	                    <th> Banco</th>
	                    <th> Número</th>
	                    <th> Tipo</th>
	                    <th> Editar</th>
	                    <th> Remover</th>
	                </tr>
	            </thead>
	            <tbody>
	            	@foreach($contas as $conta)
	                <tr>
	                    <td>{{$conta->name_bank}}</td>
	                    <td>{{$conta->number}}</td>
	                    <td>{{$conta->typeAccount->name}}</td>
	                    <td>
	                        <button class="btn btn-sm btn-warning glyphicon glyphicon-pencil"></button>
	                    </td>
	                    <td>
	                        <a href="{{route('remover_conta', $conta->id)}}" class="btn btn-sm btn-danger glyphicon glyphicon-remove"></a>
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