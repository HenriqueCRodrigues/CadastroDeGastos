<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;
use Session;
use App\Http\Requests;
use Charts;

class ChartController extends Controller
{
    public function index()
    {

    	$expenses = DB::table('expenses')->sum('value');
    	$recipes = DB::table('recipes')->sum('value');

      if(!Session::get('user.saldo') || Session::get('user.saldo') == '')
      {
          Session::put('user.saldo', $totalRecipes-$totalExpenses);
      }
      
        $chart = Charts::create('bar', 'highcharts')
          ->setTitle("Despesas e Receitas")
          ->setElementLabel('Total')
          ->setLabels(['Despesas', 'Receitas'])
          ->setValues([$expenses,$recipes])
          ->setResponsive(true);
         
          return view('carteira.relatorio', ['chart' => $chart]);
    }
}