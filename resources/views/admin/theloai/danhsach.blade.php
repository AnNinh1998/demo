 @extends('admin.layout.index')
 @section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể loại
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($theloai as $t1)
                            <tr class="odd gradeX" align="center">
                                <td>{{$t1->id}}</td>
                                <td>{{$t1->Ten}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/theloai/xoa"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/theloai/sua/{{$t1->id}}">Edit</a></td>
                            </tr>
                            @endforeach
                         </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection