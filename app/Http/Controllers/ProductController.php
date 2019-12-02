<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Product;
use Auth;

class ProductController extends Controller{

  public function create(Request $request){
    // fica responsavel por cadastrar um produto
    
    $newProduct = new Product();
    $newProduct->name = $request->nameProduct;
    $newProduct->description = $request->desc;
    $newProduct->quantity = $request->stock;
    $newProduct->price = $request->price;
    $newProduct->user_id = Auth::user()->id;
    // Auth es una clase global de Laravel que toda vez que crea un objeto genera ese método 
    
    $result = $newProduct->save();

    if($result){
      echo "Deu certo sem query!";
    }else{
      echo "Vai ter que criar em!";
    }
  }

  public function viewForm(Request $request){
    // También se puede declarar como function index()
    return view('products.form'); // concatenar la carpeta destino con punto //
  }

  public function update(Request $request){
    // Para atualizar devemos buscar um objeto ao invez de criar,
    // usando Product::find($idProduto)
    // Vai ser necessario usar rotas com parametro
  }

  public function delete(Request $request){
    //Para deletar vc vai usar Product::destroy($id)
  }

  public function viewAllProducts(Request $request){
    //Vai precisar do Product::All()
  }

  public function viewOneProduct(Request $request){
    //Vai precisar do Product::find($idProduct)
  }

}



// outro jeito de fazer. Unificando as rotas 
// public function create(Request $request){
//   if ($request->isMethod('GET')){
//     return view('formulario');
//   }else{
    
//   }



?>