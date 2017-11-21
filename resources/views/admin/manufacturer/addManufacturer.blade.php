@extends('layouts.app')

@section('content')
<br/>
<hr/>
<h1 class="text-center text-success">Add Manufacturer Form</h1>
<hr/>
<h2 class="text-center text-success">{{Session::get('message')}}</h2>

<div class="row">
      <div class="well"> 
            {!! Form::open(['route'=>'new-manufacturer','method'=>'post','class'=>'form-horizontal'])!!}
            
            <div class="form-group">
                {!! Form::label('manufacturer_name','Manufacturer Name',['class'=>'control-label col-sm-3'])!!}
                <div class="col-sm-9">
                     {!! Form::text('manufacturer_name',$value = null,['class'=>'form-control','placeholder'=>'Enter manufacturer name'])!!}
                </div>
            </div>
            
            <span class="text-danger"> {{$errors->has('manufacturer_name')?$errors->first('manufacturer_name'):' '}}</span>
            
            <div class="form-group">     
                {!! Form::label('Manufacturer_description','Manufacturer Description',['class'=>'control-label col-sm-3'])!!}
                <div class="col-sm-9">
                    {!! Form::textarea('manufacturer_description',$value = null,['class'=>'form-control'])!!}
                     <span class="text-danger"> {{$errors->has('manufacturer_description')?$errors->first('manufacturer_description'):' '}}</span>
 
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
                    {!! Form::submit(' Save Manufacturer Info',['class'=>'btn btn-success'])!!}
                </div>
            </div>

        </div>
    
    </div>
{!! Form::close() !!}
@endSection
