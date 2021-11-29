<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Resource</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion p-0" style="background-color: rgb(10,48,157);">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-text"></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="adminPage"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link " href="courses"><i class="fas fa-book-reader"></i><span>Courses</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="awards"><i class="fas fa-award"></i><span>Awarding Bodies</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="resources"><i class="fas fa-paperclip"></i><span>Resources</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button><img style="background-image: url(&quot;https://www.globaledulink.co.uk/wp-content/uploads/2020/10/gel_log.png&quot;);background-repeat: no-repeat;background-size: contain;width: 154px;height: 54px;border: none;"></div>
                    <h6>Hello {{session('userName')}} !</h6>
                    <a href="/logout"><i class="fa fa-sign-out" aria-hidden="true" style="color: rgb(0,30,255);font-size: 30px;"></i></a>
                </nav>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col"><h3 class="text-dark mb-4">Resources</h3></div>
                        <div class="col"><a href="add" data-toggle="modal" data-target="#addResorcesModal"><button class="btn btn-primary" style="float: right;">Add New Resources</button></a><br></div>
                    </div>
                    
                    
                    
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Resources info</p>
                        </div>
                        <div class="card-body">
                        
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table id="datatable" class="table dataTable my-0" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>File name</th>
                                            <th>Course Id</th>
                                            <th>created</th>
                                            <th>modified</th>
                                            <th class="text-center">Edit</th>
                                            <th class="text-center">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($resources as $resource)
                                        <tr>
                                            <td>{{$resource['id']}}</td>
                                            <td>{{$resource['name']}}</td>
                                            <td>{{$resource['url']}}</td>
                                            <td>{{$resource['course_id']}}</td>
                                            <td>{{$resource['created_at']}}</td>
                                            <td>{{$resource['updated_at']}}</td>
                                            <td><button class="edit" style="border: none;"><i class="fa fa-edit " style="color: rgb(0,30,255);font-size: 30px;"></i></button></td>
                                            <td class="text-center"><a href={{"deleteResource/".$resource['id']}}><i class="fa fa-remove" style="color: rgb(255,0,0);font-size: 30px;"></i></a></td>
                                        </tr>
                                        
                                        </div>
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- add Resource Modal -->
            <div class="modal fade" id="addResorcesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="border-radius:21px;">
                <div class="modal-header " style=" background-color:rgb(165,9,220); color:white; border-radius: 20px 20px 0 0;">
                    <h5 class="modal-title w-100" id="exampleModalLongTitle"  style="margin: auto; text-align: center; ">Add New Resource</h5>
                    
                </div>
                <div class="modal-body">
            
                    <form action="/store" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" placeholder="Course Name">
                            <span style="color:red;"> @error('name'){{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="file" name="file" placeholder="Choose file">
                            <span style="color:red;"> @error('file'){{$message}} @enderror</span>
                        </div>
                        
                        <div class="form-group">
                            <select class="form-control" name="course" >
                                @foreach($CourseData as $course)
                                    <option value={{$course['id']}}>{{$course['course_name']}}</option>
                                @endforeach
                            </select>
                            
                        </div>
                    
                        <div  style="margin: auto; text-align: center;">
                            <button type="submit" class="btn btn-primary" style="float:center;">Save</button>
                        </div>
                    </form>
                </div>
                
                </div>
                </div>
            </div>
            <!-- update Course Modal -->
            <div class="modal fade" id="editResorcesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="border-radius:21px;">
                <div class="modal-header " style=" background-color:rgb(165,9,220); color:white; border-radius: 20px 20px 0 0;">
                    <h5 class="modal-title w-100" id="exampleModalLongTitle"  style="margin: auto; text-align: center; ">Edit Resource</h5>
                </div>
                <div class="modal-body">
                    <form action="/updateResource" method="post" enctype="multipart/form-data" id="editForm">
                        @csrf
                        <input class="form-control" type="hidden" name="id" id="id" value="{{$resource['id']}}">
                        <div class="form-group">
                            <p>Reaource Name:</p>
                            <input class="form-control" type="text" name="name"  id="name" value="{{$resource['name']}}">
                        </div>
                        <div class="form-group">
                            <p>File Name:</p>
                            <input class="form-control" type="text" name="file" id="file" value="{{$resource['url']}}" readonly>
                            <p style="color:red;">You can't edit file name. this is read only</p>
                        </div>
                        <div class="form-group">
                            <p>Course:</p>
                            <select class="form-control" name="course"  id="course" >
                                @foreach($CourseData as $course)
                                    <option value={{$course['id']}}>{{$course['course_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div  style="margin: auto; text-align: center;">
                            <button type="submit" class="btn btn-primary" style="float:center;">Update</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Gel 2021</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <!-- <script src="assets/js/resource.js"></script>
    <script src="C:/xampp/htdocs/freeResources/public/assets/js/resource.js"></script> -->

    <script>
        $(document).ready(function(){

            var table = $('#datatable').DataTable();
            
            table.on('click','.edit', function(){
                
                $tr = $(this).closest('tr');

                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

               
                var data = table.row($tr).data();
                console.log(data);

                $('#id').val(data[0]);
                $('#name').val(data[1]);
                $('#url').val(data[2]);
                $('#course_id').val(data[3]);
               
                $('#editForm').attr('action','/updateResource/');
                $('#editResorcesModal').modal('show');

            })
        })
    </script>
</body>

</html>