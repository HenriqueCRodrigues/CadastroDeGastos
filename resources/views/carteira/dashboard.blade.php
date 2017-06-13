@extends('welcome')
@section('carteira')
<div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
            <div class="widget widget-info widget-padding-sm">
                <div class="widget-big-int plugin-clock">00:00</div>
                <div class="widget-subtitle plugin-date">Loading...</div>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-5">
        <div class="widget widget-default widget-item-icon">
            <div class="widget-item-left">
                <span class="fa fa-shopping-cart"></span>
            </div>  
            <div class="widget-data">  
                <div>                                    
                    <div class="widget-title">Despesas</div>
                <div class="widget-int">R${{number_format($totalExpenses,2,',','.')}}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
    </div>
    <div class="col-md-5">
        <div class="widget widget-default widget-item-icon">
            <div class="widget-item-left">
                <span class="fa fa-money"></span>
            </div>  
            <div class="widget-data">  
                <div>                                    
                    <div class="widget-title">Receitas</div>
                    <div class="widget-int">R${{number_format($totalRecipes,2,',','.')}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title-box">
                    <h3>Despesas</h3>
                    <span>Tabela de gastos</span>
                </div>                                    
                <ul class="panel-controls" style="margin-top: 2px;">
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                                         
                </ul>
            </div>
            <div class="panel-body">
                <table class="table datatable_simple">
                    <thead>
                        <tr>
                            <th> Descrição</th>
                            <th> Conta</th>
                            <th> Valor</th>                     
                            <th> Pago para:</th>
                            <th> Data</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($despesas as $despesa)
                        <tr>
                            <td><strong>{{$despesa->name}}</strong></td>
                            <td>Banco: {{$despesa->account->name_bank}} / Tipo: {{$despesa->account->typeAccount->name}}</td>
                            <td>{{$despesa->value}}</td>
                            <td>{{$despesa->contact->name}}</td>
                            <td>{{$despesa->date}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title-box">
                    <h3>Receitas</h3>
                    <span>Tabela de recebimentos</span>
                </div>                                    
                <ul class="panel-controls" style="margin-top: 2px;">
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>                                      
                </ul>
            </div>
            <div class="panel-body">
                <table class="table datatable_simple">
                    <thead>
                        <tr>
                            <th> Descrição</th>
                            <th> Conta</th>
                            <th> Valor</th>                     
                            <th> Pago para:</th>
                            <th> Data</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($receitas as $receita)
                        <tr>
                            <td><strong>{{$receita->name}}</strong></td>
                            <td>Banco: {{$receita->account->name_bank}} / Tipo: {{$receita->account->typeAccount->name}}</td>
                            <td>{{$receita->value}}</td>
                            <td>{{$receita->contact->name}}</td>
                            <td>{{$receita->date}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
   
@endsection