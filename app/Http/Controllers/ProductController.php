<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Status;
use App\Models\SaleType;
use App\Models\PharmaceuticalForm;
use App\Models\Laboratory;
use App\Models\UnitMeasure;
use App\Models\Denomination;
use App\Models\Category;
use App\Models\Symptom;
use App\Models\ProductSymptom;
use App\Models\ProductImage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Helpers\FileHelper;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Fetch all products with their related category, denomination, sale type, pharmaceutical form, laboratory, unit measure and status
        $products = Product::with(['category', 'denomination', 'saleType', 'pharmaceuticalForm', 'laboratory', 'unitMeasure','status'])->get();
        // Return the products to a view (you can create a view for this)
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // Fetch all categories, denominations, sale types, pharmaceutical forms, laboratories, unit measures and statuses
        $categories = Category::all();
        $denominations = Denomination::all();
        $saleTypes = SaleType::all();
        $pharmaceuticalForms = PharmaceuticalForm::all();
        $laboratories = Laboratory::all();
        $unitMeasures = UnitMeasure::all();
        $statuses = Status::where('exclusive','product')->get();
        $symptoms = Symptom::all();
        // Return the create view with the categories, denominations, sale types, pharmaceutical forms, laboratories, unit measures and statuses
        return view('products.create', compact('categories', 'denominations', 'saleTypes', 'pharmaceuticalForms', 'laboratories', 'unitMeasures','symptoms', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //       
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'denomination' => 'required|exists:denominations,id',
            'saletype' => 'required|exists:sale_types,id',
            'pharmaceuticalforms' => 'required|exists:pharmaceutical_forms,id',
            'laboratory' => 'required|exists:laboratories,id',
            'unitmeasure' => 'required|exists:unit_measures,id',
            'status' => 'required|exists:statuses,id',
            'barcode' => 'required|string|max:255',
            'activesubstance' => 'required|string|max:255',
            'description' => 'required|string|max:1000',            
            'quantity' => 'required|integer|min:0',
            'stockmin' => 'required|integer|min:0',
            'stockmax' => 'required|integer|min:0',
            'unitsblister' => 'required|integer|min:0',
            'unitsbox' => 'required|integer|min:0',
            'sanitary_registration' => 'required|string|max:255',
            'expirationdate' => 'nullable|boolean',
            'salebypiece' => 'nullable|boolean',
            'symptoms' => 'required',
            'utility' => 'required',
            // Add other validation rules as needed
        ]);
        
        // Create a new product
        $product = Product::create([
            'category_id' => $request->category,
            'denomination_id' => $request->denomination,
            'sale_type_id' => $request->saletype,
            'pharmaceutical_form_id' => $request->pharmaceuticalforms,
            'laboratory_id' => $request->laboratory,
            'unit_measure_id' => $request->unitmeasure,
            'status_id' =>  $request->status,
            'barcode' => $request->barcode,
            'name' => $request->name,
            'active_principle' => $request->activesubstance,
            'description' => $request->description,            
            'utility' => $request->utility,
            'quantity' => $request->quantity,                      
            'stock_min' => $request->stockmin,
            'stock_max' => $request->stockmax,
            'units_blister' => $request->unitsblister,            
            'units_box' => $request->unitsbox,
            'sanitary_registration' => $request->sanitary_registration,  
            'expiration_date' => isset($request->expirationdate) ? 1 : 0, //$request->expiration_date,,
            'sale_piece' => isset($request->salebypiece) ? 1 : 0,             
        ]);               
        // sync the selected symptoms to the product
        $product->symptoms()->sync($request->symptoms);

        if($request->has('mainimagen')){  
            $uploadImageMain = $this->uploadImageMain($request);                       
            $imagesproduct = ProductImage::create([
                'product_id' => $product->id,
                'image_name' => $uploadImageMain['file_name'],
                'image_path' => $uploadImageMain['file_path'],
                'is_main' => true,
            ]);              
        }

        if($request->has('otherimagen')){            
            $uploadImageOther = $this->uploadImageOther($request);              
            foreach ($uploadImageOther as $value) {
                $imagesproduct = ProductImage::create([
                    'product_id' => $product->id,
                    'image_name' => $value['file_name'],
                    'image_path' => $value['file_path'],
                    'is_main' => false,
                ]);                 
            }           
        } 

        // Show a success message  
        Alert::toast('create Product successfully!', 'success')
        ->position('top-right')
        ->autoClose(3000)
        ->timerProgressBar();
        
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // Fetch the product with its related category, denomination, sale type, pharmaceutical form, laboratory, unit measure and status
        $product = Product::with(['category', 'denomination', 'saleType', 'pharmaceuticalForm', 'laboratory', 'unitMeasure','status'])->findOrFail($id);
        // Fetch the product images
        $productImages = ProductImage::where('product_id', $id)->get();
        // Fetch the product symptoms
        $productSymptoms = ProductSymptom::with('symptom')->where('product_id', $id)->get();       
        // Return the product to a view (you can create a view for this)
        return view('products.show', compact('product', 'productImages', 'productSymptoms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // Fetch the product with its related category, denomination, sale type, pharmaceutical form, laboratory, unit measure and status
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $denominations = Denomination::all();
        $saleTypes = SaleType::all();
        $pharmaceuticalForms = PharmaceuticalForm::all();
        $laboratories = Laboratory::all();
        $unitMeasures = UnitMeasure::all();
        $statuses = Status::where('exclusive','product')->get();
        $symptoms = Symptom::all();      
        $productSymptoms = ProductSymptom::where('product_id', $id)->pluck('symptom_id')->toArray();
        return view('products.edit', compact('product','categories', 'denominations', 'saleTypes', 'pharmaceuticalForms', 'laboratories', 'unitMeasures','symptoms', 'statuses','productSymptoms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'denomination' => 'required|exists:denominations,id',
            'saletype' => 'required|exists:sale_types,id',
            'pharmaceuticalforms' => 'required|exists:pharmaceutical_forms,id',
            'laboratory' => 'required|exists:laboratories,id',
            'unitmeasure' => 'required|exists:unit_measures,id',
            'status' => 'required|exists:statuses,id',
            'barcode' => 'required|string|max:255',
            'activesubstance' => 'required|string|max:255',
            'description' => 'required|string|max:1000',            
            'quantity' => 'required|integer|min:0',
            'stockmin' => 'required|integer|min:0',
            'stockmax' => 'required|integer|min:0',
            'unitsblister' => 'required|integer|min:0',
            'unitsbox' => 'required|integer|min:0',
            'sanitary_registration' => 'required|string|max:255',
            'expirationdate' => 'nullable|boolean',
            'salebypiece' => 'nullable|boolean',
            'symptoms' => 'required',
            'utility' => 'required',
            // Add other validation rules as needed
        ]);
        // Find the product
        $product = Product::findOrFail($id);
        // Update the product
        $product->update([
            'category_id' => $request->category,
            'denomination_id' => $request->denomination,
            'sale_type_id' => $request->saletype,
            'pharmaceutical_form_id' => $request->pharmaceuticalforms,
            'laboratory_id' => $request->laboratory,
            'unit_measure_id' => $request->unitmeasure,
            'status_id' =>  $request->status,
            'barcode' => $request->barcode,
            'name' => $request->name,
            'active_principle' => $request->activesubstance,
            'description' => $request->description,            
            'utility' => $request->utility,
            'quantity' => $request->quantity,                      
            'stock_min' => $request->stockmin,
            'stock_max' => $request->stockmax,
            'units_blister' => $request->unitsblister,            
            'units_box' => $request->unitsbox,
            'sanitary_registration' => $request->sanitary_registration,  
            'expiration_date' => isset($request->expirationdate) ? 1 : 0, //$request->expiration_date,,
            'sale_piece' => isset($request->salebypiece) ? 1 : 0,             
        ]);
        // sync the selected symptoms to the product
        $product->symptoms()->sync($request->symptoms);
        // Show a success message  
        Alert::toast('Update Product successfully!', 'success')
        ->position('top-right')
        ->autoClose(3000)
        ->timerProgressBar();
        
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function uploadImageMain(Request $request)
    {

        if ($request->mainimagen) {
            $archivoArray = json_decode($request->mainimagen, true);
            $ruta = FileHelper::saveBase64File($archivoArray, 'products'); 
        }       
        if (!$ruta) {
            return null;
        }
        return $ruta;
    }

    public function uploadImageOther(Request $request)
    {       
        if ($request->otherimagen) {
            
            foreach ($request->otherimagen as  $value) {
                $archivoArray = json_decode($value, true);     
                $ruta[] = FileHelper::saveBase64File($archivoArray, 'products'); 
            }                               
        }            
        
        if (!$ruta) {
            return null;
        }
        return $ruta;
    }
}
