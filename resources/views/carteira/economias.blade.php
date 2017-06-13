@extends('welcome')
@section('carteira')
<div class="form-group">
    <h1><center> METAS DE ECONOMIA </center></h1>
</div>
</br></br>
<div class="col-sm-12">
	<form method="POST" action="{{strpos(Request::url(), 'editar') ? route('atualizar_economia', $economia->id) : route('salvar_economia')}}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="form-group">
		        <label for="name">Descrição</label>
		        <input type="text" class="form-control" name="desc" value="{{strpos(Request::url(), 'editar') ? $economia->desc : ''}}"  id="descricao" required>
		    </div>
		    <div class="input-group">
		        <span class="input-group-addon">R$</span>
		        <input type="number" min="0" class="form-control" name="value" value="{{strpos(Request::url(), 'editar') ? $economia->value : ''}}" id="value"
		               placeholder="Valor" required>
		    </div>
		    </br></br></br>
		    <input type="submit" class="btn btn-default">
        	
		</div>
		
	</form>
</div>
</br></br></br></br></br></br></br></br></br></br></br></br>
	<div class="col-md-12">
    <!-- START DATATABLE EXPORT -->
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <h3 class="panel-title">Economias</h3>
	            <div class="btn-group pull-right">
	                <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Exportar Tabela</button>
	                <ul class="dropdown-menu">
	                    <li><a href="#" onClick ="$('#customers2').tableExport({type:'json',escape:'false'});"><img src="{{ URL::asset('theme/img/icons/json.png')}}" width="24"/> JSON</a></li>
	                    <li><a href="#" onClick ="$('#customers2').tableExport({type:'xml',escape:'false'});"><img src="{{ URL::asset('theme/img/icons/xml.png')}}" width="24"/> XML</a></li>
	                    <li><a href="#" onClick ="$('#customers2').tableExport({type:'csv',escape:'false'});"><img src="{{ URL::asset('theme/img/icons/csv.png')}}" width="24"/> CSV</a></li>
	                    <li><a href="#" onClick ="$('#customers2').tableExport({type:'txt',escape:'false'});"><img src="{{ URL::asset('theme/img/icons/txt.png')}}" width="24"/> TXT</a></li>
	                    <li class="divider"></li>
	                    <li><a href="#" onClick ="$('#customers2').tableExport({type:'doc',escape:'false'});"><img src="{{ URL::asset('theme/img/icons/word.png')}}" width="24"/> Word</a></li>
	                    <li><a href="#" onClick ="$('#customers2').tableExport({type:'pdf',escape:'false'});"><img src="{{ URL::asset('theme/img/icons/pdf.png')}}" width="24"/> PDF</a></li>
	                </ul>
	            </div> 
	        </div>
        	<div class="panel-body">
            <table id="customers2" class="table datatable">
	            <thead>
	                <tr>
	                    <th> Descrição</th>
	                    <th> Valor total</th>
	                    <th> Editar</th>
	                    <th> Remover</th>
	                </tr>
	            </thead>
	            <tbody>
	            	@foreach($economias as $economia)
	                <tr>
	                    <td>{{$economia->desc}}</td>
	                    <td>{{$economia->value}}</td>
	                    <td>
	                         <a href="{{route('editar_economia', $economia->id)}}" class="btn btn-sm btn-warning glyphicon glyphicon-pencil"></a>
	                    </td>
	                    <td>
	                        <a href="{{route('remover_economia', $economia->id)}}" class="btn btn-sm btn-danger glyphicon glyphicon-remove"></a>
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