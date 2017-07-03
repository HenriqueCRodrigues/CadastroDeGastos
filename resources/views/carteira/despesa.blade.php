@extends('welcome')
@section('carteira')
<div class="form-group">
    <h1><center> DESPESA </center></h1>
</div>
</br></br>
<div class="col-sm-12">
	<form method="POST" action="{{strpos(Request::url(), 'editar') ? route('atualizar_despesa', $despesa->id) : route('salvar_despesa')}}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="col-md-5">
			<div class="form-group">
		        <label for="nome">Descrição</label>
		        <input type="text" class="form-control" name="name" value="{{strpos(Request::url(), 'editar') ? $despesa->name : ''}}" id="name"
		               placeholder="Ex: Aluguel" required>
		    </div>
		    <label for="contaBancaria">Conta Bancária</label>
		    <div class="form-group">
		        <select class="form-control" name="account_id">
		            @foreach($contas as $conta)
		            @if(strpos(Request::url(), 'editar') && $conta->id == $despesa->account_id)
		            <option value="{{$conta->id}}" selected>Banco: {{$conta->name_bank}} / Conta: {{$conta->typeAccount->name}}</option>
		            @else
		            <option value="{{$conta->id}}">Banco: {{$conta->name_bank}} / Conta: {{$conta->typeAccount->name}}</option>
		            @endif
		            @endforeach
		        </select>
		    </div>
			
		    <div class="input-group">
		        <span class="input-group-addon">R$</span>
		        <input type="number" min="0" class="form-control" name="value" value="{{strpos(Request::url(), 'editar') ? $despesa->value : ''}}" id="value"
		               placeholder="Valor" required>
		    </div>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-5">
		    <div class="form-group">
		        <label for="contato">Pagar para:</label>
		        <div class="form-group">
		            <select class="form-control" name="contact_id">
		                @foreach($contatos as $contato)
		                @if(strpos(Request::url(), 'editar') && $contato->id == $despesa->contact_id)
			            <option value="{{$contato->id}}" selected>{{$contato->name}}</option>
			            @else
			            <option value="{{$contato->id}}">{{$contato->name}}</option>
			            @endif
			            @endforeach
		            </select>
		            </select>
		        </div>
		    </div>
		    <div class="form-group">
				<label class="col-md-3 control-label">Data</label>
				<div class="form-group">
	                <input type="text" name="date" class="form-control datepicker" value="{{strpos(Request::url(), 'editar') ? $despesa->date : '2017-06-03'}}" data-date-format="dd-mm-yyyy">
		        </div>
			</div>	
		    <input type="submit" value="{{strpos(Request::url(), 'editar') ? 'Editar Despesa' : 'Cadastrar Despesa'}}" class="btn btn-default">
		</div>
	</form>
</div>
</br></br></br></br></br></br></br></br></br></br></br></br>
	<div class="col-md-12">
    <!-- START DATATABLE EXPORT -->
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <h3 class="panel-title">Tabela</h3>
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
	                    <td>{{$despesa->contact->name}}</td>
	                    <td>{{$despesa->date}}</td>
	     
	                    <td>
	                         <a href="{{route('editar_despesa', $despesa->id)}}" class="btn btn-sm btn-warning glyphicon glyphicon-pencil"></a>
	                    </td>
	                    <td>
	                        <a href="#" class="remover_despesa" data-id = "{{$despesa->id}}"><li class="btn btn-sm btn-danger glyphicon glyphicon-remove"></li></a>
	                    </td>
	                </tr>
	                @endforeach
	            </tbody>
	        </table>
	    </div>
	</div>
</div>
		
		<script>
				$('.remover_despesa').click(function() 
        		{
		            var despesa_id = $(this).attr("data-id");
		            deleteDespesa(despesa_id);
		        });

				 function deleteDespesa(despesa_id) {

					swal({
					  title: "Você quer remover esta despesa ?",
					  text: "Você não poderá recuperar esta informação, após a remoção !",
					  type: "warning",
					  showCancelButton: true,
					  confirmButtonColor: "#DD6B55",
					  cancelButtonText: "Não",
					  confirmButtonText: "Sim, Remover Despesa !",
					  closeOnConfirm: false
					},function() {
		                	$.ajax({
		                            
		                            url: "/usuario/despesas/remover/"+despesa_id,
		                            type: "get",
		                            
		                            
		                        })
		                        .done(function() {
		                            swal({
		                                title: "Removido!",
		                                text: "A despesa foi removida com sucesso.",
		                                type: "success",
		                                confirmButtonText: "Ok"
		                            }, function() {
		                                setTimeout(function() { location.reload(1);}, 500);
		                            });
		                        }).error(function() {
		                    swal({
		                        title: "Erro",
		                        text: "A despesa não pode ser removida.",
		                        type: "error",
		                        confirmButtonText: "Ok"
		                    }, function() {
		                        location.reload();
		                    });
		                });
            		});
			};


		</script>

		

@endsection