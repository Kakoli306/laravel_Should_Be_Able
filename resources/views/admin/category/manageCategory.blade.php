@extends('layouts.app')

@section('content')
<hr/>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                DataTables Advanced Tables
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <h3>{{Session::get('message')}}</h3>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Category Id</th>
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Publication Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr class="odd gradeX">
                            <td>{{$category->id}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>{{$category->category_description}}</td>
                            <td>{{$category->publication_status ==1 ? 'Published':'Unpublished'}}</td>
                            <td class="center">4</td>

                                @if($category->publication_status == 1)

                                <a href="{{url('/category/unpublished/'.$category->id)}}" title="Unpublished" class="btn btn-primary btn-sm">
                                    <span class="glyphicon glyphicon-arrow-up"></span>
                                </a>
                                @else
                                <a href="{{url('/category/published/'.$category->id)}}"title="Published" class="btn btn-warning btn-sm">
                                    <span class="glyphicon glyphicon-arrow-down"></span>
                                </a>
                                @endif

                                <a href="{{url('/category/edit/'.$category->id)}}" title="Edit" class="btn btn-success btn-sm">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>



                               <!-- <a href="{{url('/category/delete/'.$category->id)}}" title="Delete" class="btn btn-danger btn-sm">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>-->

                               <form action="{{url('/category/delete')}}" method="POST" style="display: inline">
                            {{csrf_field()}}
                            <input type="hidden" value="{{$category->id}}" name="category_id">
                            <button type="submit" name="btn" onclick="return confirm('Are u sure to delete this!')" class="btn btn-danger btn-sm">
                                         <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                  </form>


                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- /.table-responsive -->

                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    @endsection
