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

    // if($result){
    //   echo "Deu certo sem query!";
    // }else{
    //   echo "Vai ter que criar em!";
    // }

  return view('products.formRegistrer', ["result"=>$result]);

}

  public function viewForm(Request $request){
    // También se puede declarar como function index()
    return view('products.formRegistrer'); // concatenar la carpeta destino con punto //
  }

  public function viewFormUpdate(Request $request, $id=0){ // Hace el prepare, execute y fetch_OBJ
    $product = Product::find($id);
    if($product){ 
    return view('products.formUpdate', ["product"=>$product]);
    }else{
      return view('products.formUpdate');
    } // Tengo que validar si existe un producto, sino, el isset siempre será verdadero
  }

  public function update(Request $request){
  // Para atualizar devemos buscar um objeto ao invez de criar,
    // usando Product::find($idProduto)
    // Vai ser necessario usar rotas com parametro
    $product = Product::find($request->idProduct);
    $product->name = $request->nameProduct;
    $product->description = $request->desc;
    $product->quantity = $request->stock;
    $product->price = $request->price;
  
  
    $result = $product->save();
  
  return view('products.formUpdate', ["result"=>$result]);
  }

  public function delete(Request $request, $id=0){
    // En caso de que no pase ningún id, es igual a 0
    //Para deletar vc vai usar Product::destroy($id)
    $result = Product::destroy($id);
    if($result){
      return redirect('/produtos');
    } // En lugar de mandar para una view, doy una ruta para que revise el banco de datos y luego redireccione para esa ruta que contiene la página
  }

  public function viewAllProducts(Request $request){
    //Vai precisar do Product::All()

    $listProducts = Product::all();
    return view('products.products', ['listProducts'=>$listProducts]);
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