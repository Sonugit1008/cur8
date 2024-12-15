<?php

namespace App\Http\Controllers;

use Goutte\Client;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function index(){
            return view('index');
    }

    public function webScraping()
    {
        $client = new Client();
        $baseUrl = 'http://books.toscrape.com/catalogue/page-';
        $pageNumber = 1;
        $recordCount = 0;
        $maxRecords = 200; 
    
        while ($pageNumber < 200 && $recordCount < $maxRecords) {
            $crawler = $client->request('GET', $baseUrl . $pageNumber . '.html');
    
            if (!$crawler->filter('.product_pod')->count()) break;
    
            $crawler->filter('.product_pod')->each(function ($node) use (&$client, &$recordCount, $maxRecords) {
                if ($recordCount >= $maxRecords) return;
                $name = $node->filter('h3 a')->attr('title');
                $price = $node->filter('.price_color')->text();
                $rating = trim(str_replace('star-rating', '', $node->filter('.star-rating')->attr('class')));
                $detailLink = 'http://books.toscrape.com/catalogue/' . ltrim($node->filter('h3 a')->attr('href'), './');
                $detailCrawler = $client->request('GET', $detailLink);
                $description = $detailCrawler->filter('meta[name="description"]')->count()
                    ? $detailCrawler->filter('meta[name="description"]')->attr('content')
                    : ($detailCrawler->filter('#product_description + p')->count()
                        ? $detailCrawler->filter('#product_description + p')->text()
                        : 'No description available');



                $ratingMap = ['One' => 1,'Two' => 2,'Three' => 3, 'Four' => 4, 'Five' => 5];

                $exchangeRate = 85;
                $priceGBP = floatval(str_replace(['£'], '', $price)); 
                $priceINR = $priceGBP * $exchangeRate;
                $formattedPriceINR =round($priceINR, 2);

                $product = new Product();
                $product->name = $name;
                $product->price = $formattedPriceINR;
                $product->rating = $ratingMap[$rating];
                $product->description = $description;
                $product->save();
                $recordCount++;
            });
    
            $pageNumber++;
        }
    
        return response()->json([
            'status' => 1,
            'message' => $recordCount . ' records inserted successfully'
        ]);
    }

    public function productList(){
        $products = Product::orderBy('id','DESC')->paginate(10);
        return view('product',compact('products'));
    }

    public function productAdd(){

        return view('add-product');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|min:3|unique:products,name',
            'price' => 'required|numeric|min:0',
            'rating' => 'required|integer|between:1,5',
            'description' => 'required'
        ]);
        foreach ($validatedData as $key => $value) {
            $validatedData[$key] = is_string($value) ? strip_tags($value) : $value;
        }
        Product::create($validatedData);
        return redirect()->route('product-list')->with('message',"Add Product successfully");
    }

    public function analysisData(){

        $avgPrice = Product::avg('price');
        $lowPrice = Product::min('price');
        $highPrice = Product::max('price');
        $totalCount = Product::count('*');
        $topRated = Product::orderBy('rating', 'desc')->take(5)->get();
        $highestRatedProducts = Product::orderBy('price', 'DESC')->take(5)->get();
        $lowestRatedProducts = Product::orderBy('price', 'ASC')->take(5)->get();
        $ratingCounts = Product::select('rating', DB::raw('COUNT(*) as product_count'))->groupBy('rating')->orderBy('rating', 'ASC')->get();
        //dd($ratingCounts);
        $ratingCount=array();
        $productRating=array();
        $ratingMap = ['1' => 'One','2' => 'Two','3' => 'Three', '4' => 'Four', '5' => 'Five'];

        foreach($ratingCounts as $key=>$ratingNum){
            $ratingCount[]=$ratingNum->product_count;
            $productRating[]=$ratingMap[$ratingNum->rating];


        }
      //  dd($productRating);

        return view('analysis', compact('totalCount','avgPrice', 'topRated','lowPrice','highPrice','highestRatedProducts','lowestRatedProducts','ratingCount','productRating'));
    }

    public function productDetails($id){
        $product = Product::find($id);
       // dd($products);
        return view('product-details',compact('product'));

    }
    
}
