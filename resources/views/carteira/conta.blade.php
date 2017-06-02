@extends('welcome')
@section('carteira')
<div class="form-group">
    <h1><center> CONTA </center></h1>
</div>
</br></br>
<div class="col-sm-12">
	<form name="form">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="form-group">
		        <label for="nome">Nome do Banco</label>
		        <input type="text" class="form-control" name="banco" id="descricao" required>
		    </div>
		    <div class="form-group">
		        <label for="nome">Número da conta</label>
		        <input type="text" class="form-control" name="tel" id="descricao">
		    </div>
		    <div class="form-group">
		        <label for="nome">Tipo</label>
		        <div class="form-group">
		            <select class="form-control" name="tipo">
		                <option>Corrente</option>
		                <option>Poupança</option>
		            </select>
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
	                    <th> Banco</th>
	                    <th> Número</th>
	                    <th> Tipo</th>
	                    <th> Editar</th>
	                    <th> Remover</th>
	                </tr>
	            </thead>
	            <tbody>
	                <tr>
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