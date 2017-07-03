<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Expense;
use App\Models\Recipe;

use Auth;
use App\Http\Requests;
use Charts;

class ChartController extends Controller
{
    public function index()
    {

      $expenses = Expense::where('user_id', Auth::user()->id)->sum('value');
      $recipes = Recipe::where('user_id', Auth::user()->id)->sum('value');
      
      if($expenses == null) $expenses = 0;
      if($recipes == null) $recipes = 0;

    
      
        $chart = Charts::create('bar', 'highcharts')
          ->setTitle("Despesas e Receitas")
          ->setElementLabel('Total')
          ->setLabels(['Despesas', 'Receitas'])
          ->setValues([$expenses,$recipes])
          ->setResponsive(true);
         
          return view('carteira.relatorio', ['chart' => $chart]);
    }
}

