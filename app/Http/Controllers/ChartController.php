<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Account;
use App\Http\Requests;
use App\Models\Expense;
use Charts;

class ChartController extends Controller
{
    public function index()
    {

        $chart = Charts::database(Expense::all(), 'bar', 'highcharts')
          ->setElementLabel("Gastos por mês")
          ->setResponsive(true)
          ->groupByMonth();
            return view('carteira.relatorio', ['chart' => $chart]);
    }
}