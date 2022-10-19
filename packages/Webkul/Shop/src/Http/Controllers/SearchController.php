<?php

namespace Webkul\Shop\Http\Controllers;

use Illuminate\Http\Request;
use Webkul\Product\Models\ProductFlat;
use Webkul\Product\Repositories\SearchRepository;

class SearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Product\Repositories\SearchRepository  $searchRepository
     * @return void
     */
    public function __construct(protected SearchRepository $searchRepository)
    {
        parent::__construct();
    }

    /**
     * Index to handle the view loaded with the search results
     * 
     * @return \Illuminate\View\View 
     */
    public function index()
    {
        $results = $this->searchRepository->search(request()->all());

        return view($this->_config['view'])->with('results', $results->count() ? $results : null);
    }

    public function search(Request $request)
    {

        if($request->ajax()){
            $output = '';

            $products = ProductFlat::where('name', 'LIKE', '%'.$request->term.'%')
                                ->orWhere('price', 'LIKE', '%'.$request->term.'%')
                                ->get();
        
            if($products){
                foreach($products as $product){
                    $output .= 
                    '<div class="card-body">
                    <img class="card-img-top" src="">
                        <h5 class="card-title"><b>'.$product->name.'</b></h5>
                        <h5 class="card-title"><b>'.$product->price.'</b></h5>
                    </div>
                    ';
                }
    
                return response()->json($output);
            }
        }       

        return view($this->_config['view']);
    }
}
