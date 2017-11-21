@extends('layouts.app')

@section('content')
<br/>
<hr/>
<h1 class="text-center text-success">Add Category Form</h1>
<hr/>
<h2 class="text-center text-success">{{Session::get('message')}}</h2>

<div class="row">
      <div class="well"> 
            {!! Form::open(['url'=>'/category/new','method'=>'post','class'=>'form-horizontal'])!!}
            
            <div class="form-group">
                {!! Form::label('category_name','Category Name',['class'=>'control-label col-sm-3'])!!}
                <div class="col-sm-9">
                    {!! Form::text('category_name',$value = null,['class'=>'form-control','placeholder'=>'Enter category name'])!!}
                </div>
            </div>
            
            <div class="form-group">     
                {!! Form::label('category_description','Category Description',['class'=>'control-label col-sm-3'])!!}
                <div class="col-sm-9">
                    {!! Form::textarea('category_description',$value = null,['class'=>'form-control'])!!}
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
                    {!! Form::submit('Add Category',['class'=>'btn btn-success'])!!}
                </div>
            </div>

        </div>
    
    </div>

@endSection