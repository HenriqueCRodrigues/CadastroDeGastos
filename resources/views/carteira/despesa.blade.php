@extends('welcome')
@section('carteira')
<div class="form-group">
    <h1><center> DESPESA </center></h1>
</div>
</br></br>
<div class="col-sm-12">
	<form method="POST" action="{{route('salvar_despesa')}}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="col-md-5">
			<div class="form-group">
		        <label for="nome">Descrição</label>
		        <input type="text" class="form-control" name="name" id="name"
		               placeholder="Ex: Aluguel" required>
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
		        <label for="contato">Pagar para:</label>
		        <div class="form-group">
		            <select class="form-control" name="contact_id">
		                @foreach($contatos as $contato)
			            <option value="{{$contato->id}}">{{$contato->name}}</option>
			            @endforeach
		            </select>
		            </select>
		        </div>
		    </div>
		    <div class="form-group">
				<label class="col-md-3 control-label">Data</label>
				<div class="form-group">
	                <input type="text" name="date" class="form-control datepicker" value="2017-06-03" data-date-format="dd-mm-yyyy">
		        </div>
			</div>
			
		    <button type="submit" class="btn btn-default">Submit
        	</button>
		</div>

		
		
	</form>
	    <div class="panel-body">
	            <table class="table">
	            <thead>
	                <tr>
	                    <th> Descrição</th>
	                    <th> Conta</th>
	                    <th> Valor</th>	                    
	                    <th> Pago para:</th>
	                    <th> Data</th>
	                    <th> Editar</th>
	                    <th> Remover</th>
	                </tr>
	            </thead>
	            <tbody>
	            	@foreach($despesas as $despesa)
	                <tr>
	                    <td>{{$despesa->name}}</td>
	                    <td>Banco: {{$despesa->account->name_bank}} / Tipo: {{$despesa->account->typeAccount->name}}</td>
	                    <td>{{$despesa->value}}</td>
	                    <td>{{$despesa->account->name}}</td>
	                    <td>{{$despesa->date}}</td>
	     
	                    <td>
	                        <button class="btn btn-sm btn-warning glyphicon glyphicon-pencil"></button>
	                    </td>
	                    <td>
	                        <a href="{{route('remover_despesa', $despesa->id)}}" class="btn btn-sm btn-danger glyphicon glyphicon-remove"></a>
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