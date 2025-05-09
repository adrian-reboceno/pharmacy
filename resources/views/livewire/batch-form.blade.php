
<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}   
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="mb-3">
                <label for="product" class="form-label">Product</label>
                <select  wire:model.live="selectProduct" id="product" name="product" class="form-select mb-3" aria-label="Default select example">   
                        <option value="">Select product</option>                                            
                    @foreach ( $products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach                                     
                </select>
            </div>
            @error('product')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- end col -->

        <div class="col-lg-3 col-sm-6">
            <div class="mb-3">
                <label for="supplier" class="form-label">Supplier</label>
                <select wire:model="selectSupplier" id="supplier" name="supplier" class="form-select mb-3" aria-label="Default select example">                                              
                    @foreach ( $suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach 
                </select>
            </div>
            @error('supplier')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- end col -->     
        <div class="col-lg-3 col-sm-6">
            <div class="mb-3">
                <label for="batchnumber" class="form-label">Batch number</label>
                <input type="text" class="form-control" placeholder="batch number" id="batchnumber" name="batchnumber" value="{{ old('batchnumber') }}">
            </div>
            @error('batchnumber')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>                      
    </div>
    <!-- end row -->   
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="mb-3">
                <label for="expirationdate" class="form-label">Expiration date</label>
                <input type="text" class="form-control" name="expirationdate" data-provider="flatpickr" data-date-format="d-m-Y" >                                   
            </div>
            @error('expirationdate')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>             
        <!-- end col -->
        <div class="col-lg-3 col-sm-6">
            <div class="mb-3">
                <label for="quantity" class="form-label">quantity</label>
                <input type="number" class="form-control" placeholder="10" id="quantity" name="quantity" value="{{ old('quantity') }}">
            </div>
            @error('quantity')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- end col -->
        <div class="col-lg-3 col-sm-6">
            <div class="mb-3">
                <label class="form-label" for="purchaseprice">Purchase price</label>
                <div class="input-group has-validation mb-3">
                    <span class="input-group-text" id="product-price-addon">$</span>
                    <input wire:model.live="purchase_price" type="number" step="0.01" class="form-control" name="purchase_price" id="purchase_price" placeholder="Enter price" aria-label="purchaseprice" aria-describedby="product-purchaseprice-addon"  value="{{old ('purchase_price')}} ">                                                                                            
                </div>
            </div>
            @error('purchaseprice')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div> 
    </div>
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="mb-3">
                <label for="sale_price" class="form-label">Sale price</label>
                <input wire:model="sale_price" type="number" step="0.01" class="form-control" placeholder="10" id="sale_price" name="sale_price" value="{{ old('sale_price') }}">                              
            </div>
            @error('sale_price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="mb-3">
                <label for="sale_blister" class="form-label">Sale blister</label>
                <input wire:model="sale_blister" type="number" step="0.01" class="form-control" placeholder="10" id="sale_blister" name="sale_blister" value="{{ old('sale_blister') }}">
            </div>
            @error('sale_blister')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="mb-3">
                <label for="sale_piece" class="form-label">Sale piece</label>
                <input wire:model="sale_piece" type="number" step="0.01" class="form-control" placeholder="10" id="sale_piece" name="sale_piece" value="{{ old('sale_piece') }}">
            </div>
            @error('sale_piece')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select wire:model="status_id" id="status_id" name="status_id" class="form-select mb-3" aria-label="Default select example">                                              
                    @foreach ( $statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->status_name }}</option>
                    @endforeach 
                </select>
            </div>
            @error('supplier')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <!-- end row -->                                  
</div>
