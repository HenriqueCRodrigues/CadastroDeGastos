@extends('welcome')
@section('carteira')
<div class="form-group">
    <h1><center> RECEITA </center></h1>
</div>
</br></br>
<div class="col-sm-12">
	<form method="POST" action="{{strpos(Request::url(), 'editar') ? route('atualizar_receita', $receita->id) : route('salvar_receita')}}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="col-md-5">
			<div class="form-group">
		        <label for="nome">Descrição</label>
		        <input type="text" class="form-control" name="name" value="{{strpos(Request::url(), 'editar') ? $receita->name : ''}}" id="name"
		               placeholder="Ex: Formatei computador" required>
		    </div>
		    <label for="contaBancaria">Conta Bancária</label>
		    <div class="form-group">
		        <select class="form-control" name="account_id">
		            @foreach($contas as $conta)
		            @if(strpos(Request::url(), 'editar') && $conta->id == $receita->account_id)
		            <option value="{{$conta->id}}" selected>Banco: {{$conta->name_bank}} / Conta: {{$conta->typeAccount->name}}</option>
		            @else
		            <option value="{{$conta->id}}">Banco: {{$conta->name_bank}} / Conta: {{$conta->typeAccount->name}}</option>
		            @endif
		            @endforeach
		        </select>
		    </div>
			
		    <div class="input-group">
		        <span class="input-group-addon">R$</span>
		        <input type="number" min="0" class="form-control" name="value" value="{{strpos(Request::url(), 'editar') ? $receita->value : ''}}" id="value"
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
		            @if(strpos(Request::url(), 'editar') && $contato->id == $receita->contact_id)
		            <option value="{{$contato->id}}" selected>{{$contato->name}}</option>
		            @else
		            <option value="{{$contato->id}}">{{$contato->name}}</option>
		            @endif
		            @endforeach
		            </select>
		        </div>
		    </div>
		    <div class="form-group">
				<label class="col-md-3 control-label">Data</label>
				<div class="form-group">
	                <input type="text" class="form-control datepicker" name="date" value="{{strpos(Request::url(), 'editar') ? $receita->date : '2017-06-03'}}" >
		        </div>
			</div>
		    <input type="submit" value="{{strpos(Request::url(), 'editar') ? 'Editar Receita' : 'Cadastrar Receita'}}" class="btn btn-default">
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
	                        <a href="{{route('editar_receita', $receita->id)}}" class="btn btn-sm btn-warning glyphicon glyphicon-pencil"></a>
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