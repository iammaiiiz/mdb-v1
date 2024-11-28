<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    function index(){
        $activateProducts = Product::join('companies as c','c.id','=','products.company_id')
                            ->where('c.company_status','=','0')
                            ->where('products.product_status','=','0')
                            ->select('products.*')
                            ->get();
        $deactivateProducts = Product::join('companies as c','c.id','=','products.company_id')
                            ->where('c.company_status','=','1')
                            ->orWhere('products.product_status','=','1')
                            ->select('products.*')
                            ->get();
        return view('products.products',compact('activateProducts','deactivateProducts'));
    }
    function toggleActivate ($id){
        $product = Product::find($id);
        $product->product_status = $product->product_status == 1 ? 0 : 1;
        $product->save();
        return redirect('/products')->with('message','Toggle success');
    }
    function show($gtin){
        $product = Product::where('gtin',$gtin)
                            ->join('companies as c','c.id','=','products.company_id')
                            ->select('c.company_name','products.*')
                            ->first();
        return view('products.product',compact('product'));
    }
    function new(){
        $companies = Company::select('companies.company_name as c_name','companies.id as c_id')->get();
        return view('products.product_new',compact('companies'));
    }
    function randomGTIN(){
        $gtin = rand(10000000000000,99999999999999);
        $product = Product::where('GTIN',$gtin)->first();
        if($product){
            $this->randomGTIN();
        }else{
            return $gtin;
        }
    }
    function store(Request $r){
        $gtin = $this->randomGTIN();
        $img = $r->file('image');
        $imgName = $gtin.".".$img->getClientOriginalExtension();
        $img->move(public_path('images'),$imgName);

        $data = $r->all();
        $data['GTIN'] = $gtin;
        $data['image'] = $imgName;
        $product = Product::create($data);
        return $this->new();
    }
    function remove($id){
        Product::where('id',$id)->delete();
        return redirect('/products')->with('message','delete success');
    }

    function removeImage($GTIN){
        $product = Product::where('GTIN',$GTIN)->first();
        if($product){
            $imgPath = public_path('images/'.$product->image);
            FIle::delete($imgPath);
            $product->image = null;
            $product->save();
            return back()->with('message','delete image success');
        }else{
            return back()->with('message','delete image fail');
        }
    }

    function editImage($GTIN){
        return view('products.product_image_edit', compact('GTIN'));
    }

    function updateImage(Request $r,$GTIN){
        $product = Product::where('GTIN',$GTIN)->first();
        if($product){
            $imgPath = public_path('images/'.$product->image);
            FIle::delete($imgPath);

            $img = $r->file('image');
            $imgName = $GTIN.".".$img->getClientOriginalExtension();
            $img->move(public_path('images'),$imgName);

            $product->image = $imgName;
            $product->save();
            return back()->with('message','Update image success');
        }else{
            return back()->with('message','Update image fail');
        }
    }

    function allProducts(Request $r){
        $keyword = $r->query('query');
        $query = Product::query();
        if($keyword){
            $query->where('product_name_en','like','%'.$keyword.'%')
                ->orWhere('product_name_fr','like','%'.$keyword.'%')
                ->orWhere('product_description_en','like','%'.$keyword.'%')
                ->orWhere('product_description_fr','like','%'.$keyword.'%')
                ->get();
        }

        $products = $query->paginate(10);
        $response = [
            "data" => collect($products->items())->map(function($product){
                $company = Company::where('id',$product->company_id)->first();
                return [
                    "name" => [
                        "en" => $product->product_name_en,
                        "fr" => $product->product_name_fr
                    ],
                    "description" => [
                        "en" => $product->product_description_en,
                        "fr" => $product->product_description_fr
                    ],
                    "gtin" => $product->GTIN,
                    "brand" => $product->product_brand,
                    "countryOfOrigin" => $product->product_country_of_origin,
                    "weight" => [
                        "gross" => $product->product_gross,
                        "unit" => $product->product_unit
                    ],
                    "company"=>[
                        "companyName" => $company->company_name,
                        "companyAddress" => $company->company_address,
                        "companyTelephone" => $company->company_telephone,
                        "companyEmail" => $company->company_email
                    ],
                    "owner"=>[
                        "name" => $company->owner_name,
                        "mobileNumber" => $company->owner_number,
                        "email" => $company->owner_email
                    ],
                    "contact"=>[
                        "name" => $company->contact_name,
                        "mobileNumber" => $company->contact_number,
                        "email" => $company->contact_email
                    ]

                ];
            }),
            "pagination" => [
                "current_page" => $products->currentPage() ,
                "total_pages" => $products->lastPage() ,
                "per_page" => $products->perPage() ,
                "next_page_url" => $products->nextPageUrl(),
                "prev_page_url" => $products->previousPageUrl()
            ]
        ];
        return response($response,200);
    }

    function showProduct($GTIN){
        $product = Product::where('GTIN',$GTIN)->first();

        if(!$product || $product->product_status == 1){
            return response([
                "status" => "error",
                "message" => "404"
            ],400);
        }

        $company = Company::where('id',$product->company_id)->first();
        $response = [
            "name" => [
                "en" => $product->product_name_en,
                "fr" => $product->product_name_fr
            ],
            "description" => [
                "en" => $product->product_description_en,
                "fr" => $product->product_description_fr
            ],
            "gtin" => $product->GTIN,
            "brand" => $product->product_brand,
            "countryOfOrigin" => $product->product_country_of_origin,
            "weight" => [
                "gross" => $product->product_gross,
                "unit" => $product->product_unit
            ],
            "company"=>[
                "companyName" => $company->company_name,
                "companyAddress" => $company->company_address,
                "companyTelephone" => $company->company_telephone,
                "companyEmail" => $company->company_email
            ],
            "owner"=>[
                "name" => $company->owner_name,
                "mobileNumber" => $company->owner_number,
                "email" => $company->owner_email
            ]
        ];
        return response($response,200);
    }

    function gtin(){
        return view('products.gtin_vetification');
    }

    function gtinCheck(Request $r){
        $gtins = explode("\r\n",$r->gtin);
        $valid = Product::where('product_status',0)->whereIn("GTIN",$gtins)->get()->pluck('GTIN')->toArray();
        $results = [];
        $allValid = true;
        foreach($gtins as $gtin){
            if(in_array($gtin,$valid)){
                $results[] = [
                    "gtin" => $gtin,
                    "status" => "Valid"
                ];
            }else{
                $results[] = [
                    "gtin" => $gtin,
                    "status" => "Invalid"
                ];
                $allValid = false;
            }
        }
        return back()
            ->with('results',$results)
            ->with('status',$allValid);
    }

    function publicProduct(Request $r,$gtin){
        $lang = $r->query('lang');
        $product = Product::where('GTIN',$gtin)
                    ->join('companies as c','c.id','products.company_id')
                    ->select('products.*','c.company_name')
                    ->first();
        return view('products.public_product',compact('product','lang'));
    }
}
