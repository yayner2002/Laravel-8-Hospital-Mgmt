<!DOCTYPE html>

<html lang="en">
  <head>
    @include('admin.css')

  </head>
  <body>
    <div class="container-scroller">
 
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')

      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="container" style="padding-top: 100px;">
                @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{Session::get('message')}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <h3 style="text-align: center">List of Doctors</h3><br>
                <table class="table table-bootstrap">
                    <thead>
                        <tr>
                            <th>Doctor Name</th>
                            <th>Phone Number</th>
                            <th>Speciality</th>
                            <th>Room</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($doctors as $doctor)
                    <tr>
                        <td>{{$doctor['name']}}</td>
                        <td>{{$doctor['phone']}}</td>
                        <td>{{$doctor['speciality']}}</td>
                        <td>{{$doctor['room']}}</td>
                        <td><img src="doctorimage/{{$doctor['image']}}" alt="doctorName" width="110" height="110"></td>
                        <td><a href="{{url('updateDoctor',$doctor['id'])}}" class="btn btn-primary">Update</a><span><a class="btn btn-danger" href="{{url('deleteDoctor',$doctor['id'])}}" onclick="return confirm('Are You Sure You Want To Delete The Doctor ?')">Delete</a></span></td>
                    </tr>  
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')

    <!-- End custom js for this page -->
  </body>
</html>