@extends('welcome')
@section('carteira')
<div class="form-group">
    <h1><center> CONTA </center></h1>
</div>
</br></br>
<div class="col-sm-12">
	<form method="POST" action="{{strpos(Request::url(), 'editar') ? route('atualizar_conta', $conta->id) : route('salvar_conta')}}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="form-group">
		        <label for="nome">Nome do Banco</label>
		        <input type="text" class="form-control" name="name_bank" value="{{strpos(Request::url(), 'editar') ? $conta->name_bank : ''}}" id="descricao" required>
		    </div>

		    <div class="form-group">
		        <label for="nome">Agência</label>
		        <input type="text" class="form-control" name="agency" value="{{strpos(Request::url(), 'editar') ? $conta->number : ''}}" id="descricao">
		    </div>

		    <div class="form-group">
		        <label for="nome">Número da conta</label>
		        <input type="text" class="form-control" name="number" value="{{strpos(Request::url(), 'editar') ? $conta->number : ''}}" id="descricao">
		    </div>
		    <div class="form-group">
		        <label for="nome">Tipo</label>
		        <div class="form-group">
		            <select class="form-control" name="type_account_id">
		                @if(strpos(Request::url(),'editar'))
		                <option value="1">Corrente</option>
		                <option value="2" @if($tc == 2) selected @endif>Poupança</option>
		                @else
		                 <option value="1">Corrente</option>
		                <option value="2">Poupança</option>
		                @endif
		            </select>
		        </div>
		    </div>
		    <input type="submit" value="{{strpos(Request::url(), 'editar') ? 'Editar Conta' : 'Cadastrar Conta'}}" class="btn btn-default">
		</div>

		
		
	</form>
	    <div class="panel-body">
	            <table class="table">
	            <thead>
	                <tr>
	                    <th> Banco</th>
	                    <th> Agência</th>
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
	                    <td>{{$conta->agency}}</td>
	                    <td>{{$conta->number}}</td>
	                    <td>{{$conta->typeAccount->name}}</td>
	                    <td>
	                        <a href="{{route('editar_conta', $conta->id)}}" class="btn btn-sm btn-warning glyphicon glyphicon-pencil"></a>
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