<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batch; // Assuming you have a Batch model
use App\Models\Status; // Assuming you have a Status model
use App\Models\Supplier; // Assuming you have a Supplier model
use App\Models\Product; // Assuming you have a Product model
use App\Models\ProductImage; // Assuming you have a ProductImage model
use RealRashid\SweetAlert\Facades\Alert;
class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batches = Batch::with(['product', 'supplier', 'status'])->get();
        return view('batches.index', compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {        
        return view('batches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //   
        $request->validate([
            'product' => 'required|exists:products,id',
            'supplier' => 'required|exists:suppliers,id',
            'status_id' => 'required|exists:statuses,id',           
            'batchnumber' => 'required|string|max:255',           
            'expirationdate' => 'required|date_format:d-m-Y',
            'quantity' => 'required|integer|min:1',
            'purchase_price' => 'required|numeric|min:0',
            'sale_price' => 'required|numeric|min:0',
            'sale_blister' => 'nullable|numeric|min:0',
            'sale_piece' => 'nullable|numeric|min:0'
        ]);
        $batche = Batch::create([
            'product_id' => $request->product,
            'supplier_id' => $request->supplier,
            'status_id' => $request->status_id,
            'batch_number_internal' => $request->batchnumber,
            'batch_number_manufacturer' => $request->batchnumber,
            'expiration_date' => \Carbon\Carbon::createFromFormat('d-m-Y', $request->expirationdate),
            'quantity' => $request->quantity,
            'purchase_price' => $request->purchase_price,
            'sale_price' => $request->sale_price,
            'sale_blister' => $request->sale_blister,
            'sale_piece' => $request->sale_piece
        ]);
         // Show a success message  
        Alert::toast('create Batch successfully!', 'success')
        ->position('top-right')
        ->autoClose(3000)
        ->timerProgressBar();
        /*  dd($request->all()); */
        return redirect()->route('batches.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $batch = Batch::with(['product', 'supplier', 'status'])->findOrFail($id);
       
        $days = \Carbon\Carbon::now()->diffInDays($batch->expiration_date);
        $batch->expiration_days = round($days);
       /*  $batch->expiration_date = \Carbon\Carbon::createFromFormat('Y-m-d', $batch->expiration_date)->format('d-m-Y');
        $batch->purchase_price = number_format($batch->purchase_price, 2, '.', '');
        $batch->sale_price = number_format($batch->sale_price, 2, '.', '');
        $batch->sale_blister = number_format($batch->sale_blister, 2, '.', '');
        $batch->sale_piece = number_format($batch->sale_piece, 2, '.', '');
        $batch->quantity = number_format($batch->quantity, 2, '.', '');
        $batch->status = Status::find($batch->status_id);
        $batch->product = Product::find($batch->product_id);
        $batch->supplier = Supplier::find($batch->supplier_id); */
        $productImages = ProductImage::where('product_id', $batch->product_id)->get();
        return view('batches.show', compact('batch','productImages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
