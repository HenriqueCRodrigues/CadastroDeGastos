@extends('welcome')
@section('carteira')
<div class="form-group">
    <h1><center> RECEITA </center></h1>
</div>
</br></br>
<div class="col-sm-12">
	<form method="POST" action="{{route('salvar_receita')}}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="col-md-5">
			<div class="form-group">
		        <label for="nome">Descrição</label>
		        <input type="text" class="form-control" name="name" id="name"
		               placeholder="Ex: Formatei computador" required>
		    </div>
		    <label for="contaBancaria">Conta Bancária</label>
		    <div class="form-group">
		        <select class="form-control" name="account_id">
		            @foreach($contas as $conta)
		            <option value="{{$conta->id}}">Banco: {{$conta->name_bank}} / Conta: {{$conta->typeAccount->name}}</option>
		            @endforeach
		        </select>
		    </div>
			
		    <div class="input-group">
		        <span class="input-group-addon">R$</span>
		        <input type="number" min="0" class="form-control" name="value" id="value"
		               placeholder="Valor" required>
		        <span class="input-group-addon">,00</span>
		    </div>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-5">
		    <div class="form-group">
		        <label for="contato">Recebido de:</label>
		        <div class="form-group">
		            <select class="form-control" name="contact_id">
		            @foreach($contatos as $contato)
		            <option value="{{$contato->id}}">{{$contato->name}}</option>
		            @endforeach
		            </select>
		        </div>
		    </div>
		    <div class="form-group">
				<label class="col-md-3 control-label">Data</label>
				<div class="form-group">
	                <input type="text" class="form-control datepicker" name="date" value="2017-06-03">
		        </div>
			</div>
		    <input type="submit" value="Cadastrar Receita" class="btn btn-default">
		</div>

		
		
	</form>
	    <div class="panel-body">
	            <table class="table">
	            <thead>
	                <tr>
	                    <th> Descrição</th>
	                    <th> Conta</th>
	                    <th> Valor</th>	                    
	                    <th> Recebido de:</th>
	                    <th> Data</th>
	                    <th> Editar</th>
	                    <th> Remover</th>
	                </tr>
	            </thead>
	            <tbody>
	            	@foreach($receitas as $receita)
	                <tr>
	                    <td>{{$receita->name}}</td>
	                    <td>Banco: {{$receita->account->name_bank}} / Tipo: {{$receita->account->typeAccount->name}}</td>
	                    <td>{{$receita->value}}</td>
	                    <td>{{$receita->contact->name}}</td>
	                    <td>{{$receita->date}}</td>
	                    <td>
	                        <button class="btn btn-sm btn-warning glyphicon glyphicon-pencil"></button>
	                    </td>
	                    <td>
	                        <a href="{{route('remover_receita', $receita->id)}}" class="btn btn-sm btn-danger glyphicon glyphicon-remove"></a>
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