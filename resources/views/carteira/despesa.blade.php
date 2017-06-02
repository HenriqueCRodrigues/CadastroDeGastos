@extends('welcome')
@section('carteira')
<div class="form-group">
    <h1><center> DESPESA </center></h1>
</div>
</br></br>
<div class="col-sm-12">
	<form name="form">
		<div class="col-md-5">
			<div class="form-group">
		        <label for="nome">Descrição</label>
		        <input type="text" class="form-control" name="descricao" id="descricao"
		               placeholder="Ex: Aluguel" required>
		    </div>
		    <label for="contaBancaria">Conta Bancária</label>
		    <div class="form-group">
		        <select class="form-control" name="contaBancaria">
		            <option>Itaú</option>
		            <option>Banco do Brasil</option>
		        </select>
		    </div>
			
		    <div class="input-group">
		        <span class="input-group-addon">R$</span>
		        <input type="number" min="0" class="form-control" name="valor" id="valor"
		               placeholder="Valor" required>
		        <span class="input-group-addon">,00</span>
		    </div>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-5">
		    <div class="form-group">
		        <label for="contato">Pagar para:</label>
		        <div class="form-group">
		            <select class="form-control" name="contato">
		                <option>Clayton</option>
		                <option>Felipe</option>
		                <option>Matheus</option>
		                <option>Henrique</option>
		            </select>
		        </div>
		    </div>
		    <div class="form-group">
				<label class="col-md-3 control-label">Data</label>
				<div class="form-group">
	                <input type="text" name="data" class="form-control datepicker" value="05-06-2017" data-date-format="dd-mm-yyyy">
		        </div>
			</div>
			<label for="contaBancaria">Relevância</label>
		    <div class="form-group">
		        <select class="form-control" name="relevancia">
		            <option>Itaú</option>
		            <option>Banco do Brasil</option>
		        </select>
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
	                    <th> Relevância</th>
	                    <th> Editar</th>
	                    <th> Remover</th>
	                </tr>
	            </thead>
	            <tbody>
	                <tr>
	                    <td></td>
	                    <td></td>
	                    <td></td>
	                    <td></td>
	                    <td></td>
	                    <td></td>
	                    <td>
	                        <button class="btn btn-sm btn-warning glyphicon glyphicon-pencil"></button>
	                    </td>
	                    <td>
	                        <button class="btn btn-sm btn-danger glyphicon glyphicon-remove"></button>
	                    </td>
	                </tr>
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