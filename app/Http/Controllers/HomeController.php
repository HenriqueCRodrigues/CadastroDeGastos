<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;
use App\Models\Expense;
use App\Models\Recipe;
use App\Models\Account;
use App\Models\Contact;
use App\Http\Requests;
use App\Http\Requests\RecipeRequest;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
     
      $totalExpenses = DB::table('expenses')->sum('value');
      
      $totalRecipes  = DB::table('recipes')->sum('value');

      $id = Auth::user()->id;
      
      $despesas = Expense::where('user_id', $id)->get();

      $receitas = Recipe::where('user_id', $id)->get();

      $contas = Account::where('of_user', $id)->get();

      $contatos = Contact::where('of_user', $id)->get();


        return view('carteira.dashboard', compact('despesas', 'receitas','contas', 'contatos', 'totalExpenses', 'totalRecipes'));
    }
}