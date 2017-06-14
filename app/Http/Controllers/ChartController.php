<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;
use App\Http\Requests;
use Charts;

class ChartController extends Controller
{
    public function index()
    {

    	$expenses = DB::table('expenses')->where('user_id', Auth::user()->id)->sum('value');
    	$recipes = DB::table('recipes')->where('user_id', Auth::user()->id)->sum('value');
    
      
        $chart = Charts::create('bar', 'highcharts')
          ->setTitle("Despesas e Receitas")
          ->setElementLabel('Total')
          ->setLabels(['Despesas', 'Receitas'])
          ->setValues([$expenses,$recipes])
          ->setResponsive(true);
         
          return view('carteira.relatorio', ['chart' => $chart]);
    }
}

