<form>
    <div class="mb-5">
        <div class="row">
            <div class="form-group col-md-4">
                <label>Catagory</label>
                <select class="form-control" wire:model="selectedCatagories">
                    <option select="selected">choose main catagory</option>
                    @foreach ($catagories as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label>Sub Catagory</label>
                <select class="form-control" wire:model="selectedSubcatagories">>
                    <option value="" selected>Choose Sub Catagory</option>
                    @if (!is_null($selectedCatagories))
                        @foreach ($subcatagories as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group col-md-4">
                <label>Product Type</label>
                <select class="form-control" wire:model="ptype_id">>
                    <option value="" selected>Choose Product Type</option>
                    @if (!is_null($selectedSubcatagories))
                        @foreach ($ptypes as $datap)
                            <option value="{{ $datap->id }}">{{ $datap->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group col-md-3">
                <label>Brand</label>
                <select class="form-control" wire:model="brand">
                    <option select="selected">choose brand</option>
                    @foreach ($brands as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label>manufacturer</label>
                <select class="form-control" wire:model="manufacturer">
                    <option select="selected">choose manufacturer</option>
                    @foreach ($manufs as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label>suppliers</label>
                <select class="form-control" wire:model="supplier">
                    <option select="selected">choose suppliers</option>
                    @foreach ($suppliers as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label>unit of measure</label>
                <select class="form-control" wire:model="uom">
                    <option select="selected">choose unit of measure</option>
                    @foreach ($uoms as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-12">
                <label for="exampleFormControlInput1">Name:</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name"
                    wire:model="name">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-12">
                <label for="exampleFormControlInput2">Short Description:</label>
                <textarea type="email" class="form-control" id="exampleFormControlInput2" wire:model="short_description"
                    placeholder="Enter Short Description"></textarea>
                @error('short_description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-12">
                <label for="exampleFormControlInput2">Description:</label>
                <textarea type="email" class="form-control" id="exampleFormControlInput2" wire:model="short_description"
                    placeholder="Enter Description" name="description"></textarea>
                @error('Description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="exampleFormControlInput1">Buying Price</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="">
                @error('Buying Price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="exampleFormControlInput1">Selling Price</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="" name="selling_price">
                @error('Selling Price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="exampleFormControlInput1">Discounted Price</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="" name="discounted_price">
                @error('Discounted Price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="exampleFormControlInput1">Discounted Percentage</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="" name="discounted_percentage">
                @error('Discounted Price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

              <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <h4 class="card-title">Size Stock</h4>
                        </div>
                        <select class="multi-select" name="states[]" multiple="multiple">
                            <option value="AL">Alabama</option>
                            <option value="WY">Wyoming</option>
                            <option value="UI">dlf</option>
                        </select>
                        @error('')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <h4 class="card-title">Color Stock</h4>
                        </div>
                        <select class="multi-select" name="states[]" multiple="multiple">
                            <option value="AL">Alabama</option>
                            <option value="WY">Wyoming</option>
                            <option value="UI">dlf</option>
                        </select>
                        @error('')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group col-md-3">
                <label for="exampleFormControlInput1">Tags</label>
                <input type="text" class="form-control" data-role="tagsinput" id="exampleFormControlInput1" placeholder="" name="Tags">
                @error('Tags')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="exampleFormControlInput1">Stock status</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder=""
                name="stock_status">
                @error('Stock Status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="exampleFormControlInput1">Expired At</label>
                <input type="datetime-local" class="form-control" id="exampleFormControlInput1" placeholder="" name="expired_at">
                @error('Expired At')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="exampleFormControlInput1">Manufectured At</label>
                <input type="datetime-local" class="form-control" id="exampleFormControlInput1" placeholder="" name="Manufectured At">
                @error('Status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-check col-md-3 ">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="hot_deals">
                <label class="form-check-label " for="defaultCheck1">
                    Hot Deals
                </label>
                @error('Hot Deals')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-check col-md-3 ">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="featured">
                <label class="form-check-label " for="defaultCheck1">
                    Featured
                </label>
                @error('Featured')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-check col-md-3 ">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="new_arrival">
                <label class="form-check-label " for="defaultCheck1">
                    New Arrival
                </label>
                @error('New Arrival')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-check col-md-3 ">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="special_offer">
                <label class="form-check-label " for="defaultCheck1">
                    Special Offer
                </label>
                @error('Special Offer')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-check col-md-3 ">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="special_deals">
                <label class="form-check-label " for="defaultCheck1">
                    Special Deals
                </label>
                @error('Special Deals')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12">
                <button wire:click.prevent="store()" class="btn btn-success">Save</button>
            </div>

        </div>
    </div>
</form>
