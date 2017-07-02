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
	                        <a href="#" class="remover_conta" data-id="{{$conta->id}}"><li class="btn btn-sm btn-danger glyphicon glyphicon-remove"></li></a>
	                    </td>
	                </tr>
	                @endforeach
	            </tbody>
	        </table>
	    </div>
	</div>
</div>



        <script>
        
        		$('.remover_conta').click(function() 
        		{
		            var conta_id = $(this).attr("data-id");
		            deleteConta(conta_id);
		        });

				 function deleteConta(conta_id) {

					swal({
					  title: "Você quer remover esta conta ?",
					  text: "Você não poderá recuperar esta informação, após a remoção !",
					  type: "warning",
					  showCancelButton: true,
					  confirmButtonColor: "#DD6B55",
					  cancelButtonText: "Não",
					  confirmButtonText: "Sim, Remover Conta !",
					  closeOnConfirm: false
					},function() {
		                	$.ajax({
		                            
		                            url: "/usuario/conta/remover/"+conta_id,
		                            type: "get",
		                            
		                            
		                        })
		                        .done(function() {
		                            swal({
		                                title: "Removido!",
		                                text: "A conta foi removida com sucesso.",
		                                type: "success",
		                                confirmButtonText: "Ok"
		                            }, function() {
		                                setTimeout(function() { location.reload(1);}, 500);
		                            });
		                        }).error(function() {
		                    swal({
		                        title: "Erro",
		                        text: "A conta não pode ser removida.",
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