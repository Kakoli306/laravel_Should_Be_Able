@extends('layouts.app')


@section('content')
<br/>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                DataTables Advanced Tables
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <h3>{{ Session::get('message') }}</h3>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Manufacturer Id</th>
                            <th>Manufacturer Name</th>
                            <th>Manufacturer Description</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($manufacturers as $manufacturer)
                        <tr class="odd gradeX">
                            <td>{{ $manufacturer->id }}</td>
                            <td>{{ $manufacturer->manufacturer_name }}</td>
                            <td>{{ $manufacturer->manufacturer_description }}</td>
                            <td class="center">{{ $manufacturer->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                            <td class="center">
                                @if($manufacturer->publication_status == 1)

                                <form action="{{ route('unpublished-manufacturer') }}" method="POST" style="display: inline;">
                                    {{ csrf_field() }}

                                    <input type="hidden" value="{{ $manufacturer->id }}" name="manufacturer_id">
                                    <button type="submit" class="btn btn-primary btn-sm" title="Unpublished">
                                        <span class="glyphicon glyphicon-arrow-up"></span>
                                    </button>
                                </form>

                                @else

                                <form action="{{ route('published-manufacturer') }}" method="POST" style="display: inline;">
                                    {{ csrf_field() }}

                                    <input type="hidden" value="{{ $manufacturer->id }}" name="manufacturer_id">
                                    <button type="submit" class="btn btn-warning btn-sm" title="Published">
                                        <span class="glyphicon glyphicon-arrow-down"></span>
                                    </button>
                                </form>

                                @endif

                                <form action="{{ route('edit-manufacturer') }}" method="POST" style="display: inline;">
                                    {{ csrf_field() }}

                                    <input type="hidden" value="{{ $manufacturer->id }}" name="manufacturer_id">
                                    <button type="submit" class="btn btn-success btn-sm" title="Edit">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </button>
                                </form>

                                <form action="{{ route('delete-manufacturer') }}" method="POST" style="display: inline;">
                                    {{ csrf_field() }}

                                    <input type="hidden" value="{{ $manufacturer->id }}" name="manufacturer_id">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure To Delete This !');">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </form>

                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
        </div>
    </div>
</div>

<!-- /.row -->

@endsection