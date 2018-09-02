<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Inventory VIews
         View::composer('Admin.Inventory.list',function($view){

             $customers = DB::table('tbl_customer')
                        ->select(DB::raw('count(*) as id'))
                        ->orderBy('id','desc')
                        ->get();
            $view->with('customers',$customers);


        }); 
         View::composer('Admin.Inventory.list',function($view){

             $sales = DB::table('tbl_sales')
                        ->select(DB::raw('count(*) as id'))
                        ->orderBy('id','desc')
                        ->get();
            $view->with('sales',$sales);


        }); 
         View::composer('Admin.Inventory.list',function($view){

             $suppliers = DB::table('tbl_suppliers')
                        ->select(DB::raw('count(*) as id'))
                        ->orderBy('id','desc')
                        ->get();
            $view->with('suppliers',$suppliers);


        }); 
         View::composer('Admin.Inventory.list',function($view){

             $purchases = DB::table('tbl_purchase')
                        ->select(DB::raw('count(*) as id'))
                        ->orderBy('id','desc')
                        ->get();
            $view->with('purchases',$purchases);


        }); 
         View::composer('Admin.Inventory.list',function($view){

             $products = DB::table('tbl_product')
                        ->select(DB::raw('count(*) as id'))
                        ->orderBy('id','desc')
                        ->get();
            $view->with('products',$products);


        }); 

         // Dashboard Views
         View::composer('Admin.Home.index',function($view){

             $customers = DB::table('tbl_customer')
                        ->select(DB::raw('count(*) as id'))
                        ->orderBy('id','desc')
                        ->get();
            $view->with('customers',$customers);


        }); 
         View::composer('Admin.Home.index',function($view){

             $sales = DB::table('tbl_sales')
                        ->select(DB::raw('count(*) as id'))
                        ->orderBy('id','desc')
                        ->get();
            $view->with('sales',$sales);


        }); 
         View::composer('Admin.Home.index',function($view){

             $suppliers = DB::table('tbl_suppliers')
                        ->select(DB::raw('count(*) as id'))
                        ->orderBy('id','desc')
                        ->get();
            $view->with('suppliers',$suppliers);


        }); 
         View::composer('Admin.Home.index',function($view){

             $purchases = DB::table('tbl_purchase')
                        ->select(DB::raw('count(*) as id'))
                        ->orderBy('id','desc')
                        ->get();
            $view->with('purchases',$purchases);


        }); 
         View::composer('Admin.Home.index',function($view){

             $products = DB::table('tbl_product')
                        ->select(DB::raw('count(*) as id'))
                        ->orderBy('id','desc')
                        ->get();
            $view->with('products',$products);


        }); 

          // Report VIews
View::composer('Admin.Reports.purchase_report',function($view){

            $purchases = DB::table('tbl_purchase')
                    ->join('tbl_suppliers','tbl_purchase.supplier_id','=','tbl_suppliers.id')
                    ->join('tbl_product','tbl_purchase.product_id','=','tbl_product.id')
                    ->select('tbl_purchase.*','tbl_suppliers.supplier_name','tbl_product.product_name','tbl_product.product_image')
                    ->orderBy('tbl_purchase.id','desc')
                    ->get();
            $view->with('purchases',$purchases);


        }); 
View::composer('Admin.Reports.sales_report',function($view){

             $sales = DB::table('tbl_sales')
                ->join('tbl_customer','tbl_sales.customer_id',
                    '=','tbl_customer.id')
                ->join('tbl_product','tbl_sales.product_id',
                    '=','tbl_product.id')
                ->select('tbl_sales.*','tbl_product.id','tbl_product.product_image','tbl_product.product_name',
                'tbl_customer.customer_name')
                ->orderBy('tbl_sales.id','desc')
                ->get();
            $view->with('sales',$sales);
        }); 
View::composer('Admin.Reports.item_report',function($view){

             $items = DB::table('tbl_product')
                    ->orderBy('id','desc')
                    ->get();
            $view->with('items',$items);
        }); 
View::composer('Admin.Reports.hr_report',function($view){

             $employees= DB::table('tbl_employee')
                    ->get();
            $view->with('employees',$employees);
        }); 
View::composer('Admin.Reports.supplier_report',function($view){

              $suppliers = DB::table('tbl_suppliers')
                    ->get();
            $view->with('suppliers',$suppliers);
        }); 
View::composer('Admin.Reports.user_report',function($view){

             $users = DB::table('users')
                    ->get();
            $view->with('users',$users);
        }); 
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
