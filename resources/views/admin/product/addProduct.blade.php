@extends('layouts.app')

@section('content')
<br/>
<hr/>
<h1 class="text-center text-success">Add Product Form</h1>
<hr/>
<h2 class="text-center text-success">{{Session::get('message')}}</h2>

<div class="row">
    <div class="well"> 
        {!! Form::open(['route'=>'new-product','on submit'=>"return vaidateStandard(this)" ,'method'=>'post',
        'class'=>'form-horizontal','enctype'=>'multipart/form-data'])!!}

        {{ csrf_field()}}


        <div class="form-group">
            <label class="control-label col-sm-3">Product Name <span style="color:#8b52f8;">*</span>
            </label>
            <div class="col-sm-9">
                <input type="text" required regexp="JSVAL_RX_ALPHA" err="Pleasr enter a valid product name" name="product_name" class="form-control"/>
                <span class="text-danger">{{$errors->has('product_name')? $errors->first('product_name'):''}}</span>
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-sm-3">Category Name </label>
            <div class="col-sm-9">
                <select class="form-control" name="category_id">
                    <option>---Select Category Name---</option>
                    @foreach($publishedCategories as $publishedCategory)
                    <option value="{{ $publishedCategory->id }}">{{$publishedCategory->category_name}}</option> 
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3">Manufacturer Name</label>
            <div class="col-sm-9"> 
                <select class="form-control" name="manufacturer_id">
                    <option>---Select Manufacturer Name---</option>
                    @foreach($publishedManufacturers as $publishedManufacturer)
                    <option value="{{$publishedManufacturer->id}}">{{$publishedManufacturer->manufacturer_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3">Product Price</label>
            <div class="col-sm-9">
                <input type="text"  name="product_price" class="form-control"/>
                <span class="text-danger">{{$errors->has('product_price')? $errors->first('product_price'):''}}</span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3">Product Quantity</label>
            <div class="col-sm-9">
                <input type="number" min="1" name="product_quantity" class="form-control"/>
                <span class="text-danger">{{$errors->has('product_quantity')? $errors->first('product_quantity'):''}}</span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3">Product Short Description</label>
            <div class="col-sm-9">
                <textarea class="form-control" style="resize:none;" name="product_short_description" rows="5"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3">Product Long Description</label>
            <div class="col-sm-9">
                <textarea class="form-control" style="resize:none;" name="product_long_description" rows="10"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3">Product Image</label>
            <div class="col-sm-9">
                <input type="file" name="product_image" accept="image/*">
                <span class="text-danger">{{$errors->has('product_image')? $errors->first('product_image'):''}}</span>
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-sm-3">Publication Status</label>
            <div class="col-sm-9">
                <select class="form-control" name="publication_status">
                    <option>---Select Publication Status---</option>
                    <option value="1">Published</option>
                    <option value="0">Unpublished</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
                <input type="submit" name="btn" value="Save Product Info" class="btn btn-success btn-block">
            </div>
        </div>
        {!! Form::close() !!}
    </div>


</div>

</div>

@endSection

