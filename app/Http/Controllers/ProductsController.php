<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\User;
use DB;
use Hash;
use Auth;
use File;
use Image;
use Mail;
use Lang;
use Session;
use DateTime;

class ProductsController extends Controller
 {
 
    public function getAllProducts(){

        $allProducts =  Product::orderBy('id', 'DESC')->get() ;

        return view('products',compact('allProducts'));
    }

    public function addProduct(){
         return view( 'add-product' );
    }

    public function addProductDetails(Request $request)
    {
        
      try {
        $post = $request->all();
           
        if(!empty($post)) {
           
          // check SKU

           $sku = $post['product_sku'] ; 
 
           $checkSku = Product::where('product_sku', $sku )->first();
      
           if($checkSku) { 
              Session::flash('error_msg', 'This SKU Already exist, please try another !!');
              return redirect()->back();
          }

            $userId = Session::get('admin_info')['id'] ;
 
            if ($request['image']) {

                if ($request->hasFile('image'))
                {
                    $image = $request->file('image');
                    $img = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/uploads/image/');
                    $image->move($destinationPath, $img);
                }
                $image = $img ;
              }  
           
            $productSave = Product::insertGetId([ 'product_name'=>$post['product_name'], 'image'=>$image , 'product_sku'=>$post['product_sku'] , 'description'=>$post['description'], 'quantity'=>$post['quantity'], 'added_by' => $userId ]);
 
             if(!empty($productSave)) {
                DB::commit();
  
               Session::flash('success_msg', 'Product created Successfully!!');
                
               return redirect('getAllProducts' );

            }else{

                DB::rollback();
                Session::flash('error_msg', 'Product Not Created, please try again !!');
                return redirect()->back();
            }
          } else {
                DB::rollback();
                Session::flash('error_msg', 'Something went wrong, please contact Admin !!');
                return redirect()->back();
        }
       } catch (\Exception $e) {
      
        return $e->getMessage();
     }  

    }

    public function removeProduct($id)
    {
       $delete = Product::where('id',decrypt($id))->delete() ;
 
       if($delete){
         
             return redirect()->back()
                ->with('success_msg', 'Product Deleted Succesfully!');
         } else {
            
             return redirect()->back()
                ->with('error_msg', 'Product Not Deleted!');
         }
    }

    public function getSingleProductDetails($id)
    {
       $product = Product::where('id',decrypt($id))->first();
       return view('edit-product',compact('product')) ;
    }

    public function editProductDetails(Request $request)
    {
        
      try {
        $post = $request->all();
           
        if(!empty($post)) {

            $product_id = $post['product_id'];
 
            if ($request['image']) {

                if ($request->hasFile('image'))
                {
                    $image = $request->file('image');
                    $img = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/uploads/image/');
                    $image->move($destinationPath, $img);
                }
                $data['image'] = $img ;
              }  
           
            $data['product_name'] = $post['product_name'];
            $data['product_sku'] = $post['product_sku'] ;
            $data['description'] = $post['description'] ;
            $data['quantity'] = $post['quantity'] ;

            $productUpdate = Product::where('id',$product_id)->update($data);
 
             if(!empty($productUpdate)) {
                
               DB::commit();
               Session::flash('success_msg', 'Product created Successfully!!');
               return redirect('getAllProducts' );

            }else{

                DB::rollback();
                Session::flash('error_msg', 'Product Not Created, please try again !!');
                return redirect()->back();
            }
          } else {
                DB::rollback();
                Session::flash('error_msg', 'Something went wrong, please contact Admin !!');
                return redirect()->back();
        }
       } catch (\Exception $e) {
      
        return $e->getMessage();
     }  

    }

   public function addtoCart(Request $request)
   {
      $userId = Session::get('admin_info')['id'] ;
      $product_id = $request->prod_id ;
      $quantity = $request->qty ;

      $cart = DB::table('user_cart')->where(['user_id'=>$userId, 'product_id'=>$product_id])->first();
       // Get Qty
       $prodct = Product::where('id',$product_id)->first();

       if(!empty( $cart )){
          $quantity = $cart->quantity + $quantity ;
       }

      $addCart = DB::table('user_cart')
        ->updateOrInsert(['user_id'=>$userId , 'product_id'=>$product_id ],
        ['user_id'=>$userId, 'product_id'=>$product_id ,	'quantity'=> $quantity ]) ;
 
        // update Qty
        $data['quantity'] = $prodct->quantity - $quantity ;
        $updateProd = Product::where('id',$product_id)->update($data);

        Session::flash('success_msg', 'Product added Successfully!!');
        return redirect('getAllProducts' );
   }

   public function myCart(Request $request)
   {
      $userId = Session::get('admin_info')['id'] ;
 
      $cartProducts = DB::table('user_cart')
            ->join('tbl_products', 'user_cart.product_id', '=', 'tbl_products.id')
           
            ->select('user_cart.*', 'tbl_products.product_name', 'tbl_products.product_sku','tbl_products.image' )
            ->where('user_cart.user_id',$userId)
            ->orderBy("user_cart.id", "desc")
            ->get();
    
      return view('cart-products',compact('cartProducts')) ;
   }

   public function removeProductFromCart($id)
    {
      $userId = Session::get('admin_info')['id'] ;
      $cart = DB::table('user_cart')->where([ 'id'=> decrypt($id) ])->first();

      // Get Qty ===
      $prodct = Product::where('id',$cart->product_id)->first() ;
      $quantity = $cart->quantity ;

       // update Qty
       $data['quantity'] = $prodct->quantity + $quantity ;
       $updateProd = Product::where('id',$cart->product_id)->update($data) ;

       // delete cart 
        DB::table('user_cart')->where([ 'id'=> decrypt($id) ])->delete();

       Session::flash('success_msg', 'Product removed from cart Successfully!!') ;
       return redirect('my-cart' );

   }
 
 }