@extends('layouts.app')

@section('content')
<br/>
<hr/>
<h1 class="text-center text-success">Edit Category Form</h1>
<hr/>
<h2 class="text-center text-success">{{Session::get('message')}}</h2>

<div class="row">
      <div class="well"> 
            {!! Form::open(['url'=>'/category/update','name'=>'editCategoryForm','method'=>'post','class'=>'form-horizontal'])!!}
            
            <div class="form-group">
                {!! Form::label('category_name','Category Name',['class'=>'control-label col-sm-3'])!!}
                <div class="col-sm-9">
                    {!! Form::text('category_name',$value = $categoryById->category_name,['class'=>'form-control','placeholder'=>'Enter category name'])!!}
                    <input type="hidden" name="category_id" value="{{$categoryById->id}}">
                </div>
            </div>
            
            <div class="form-group">     
                {!! Form::label('category_description','Category Description',['class'=>'control-label col-sm-3'])!!}
                <div class="col-sm-9">
                    {!! Form::textarea('category_description',$value = $categoryById->category_description,['class'=>'form-control'])!!}
                </div>
            </div>
            
            <div class="form-group">
                {!! Form::label('category_type','Category Type',['class'=>'control-label col-sm-3'])!!}
                <div class="col-sm-9">
                    {!! Form::select('publication_status', ['1' => 'Published', '0' => 'Unpublished'], null, ['class'=>'form-control', 'placeholder' => 'Publication Status']) !!}
                </div>
            </div>
              
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-7">
                    {!! Form::submit('Update Category',['class'=>'btn btn-success'])!!}
                </div>
            </div>
         
            {!! Form::close()!!}
        </div>
     </div>
<script>
    document.forms['editCategoryForm'].elements['publication_status'].value = '{{$categoryById->publication_status}}';
    </script>
@endSection
