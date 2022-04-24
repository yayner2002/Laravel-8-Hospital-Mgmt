

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
      <div class="container-fluid page-body-wrapper">

        <div class="container" style="padding-top: 100px;">
            @if (Session::has('message'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
              {{Session::get('message')}}
              <button type="button" data-bs-dismiss="alert" class="btn-close"></button>
          </div> 
            @endif
        <h3 style="text-align: center;">List of Appointments</h3>
            <table class="table table-responsive">
                <thead>
                  <tr>
                    <th>Custome Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Doctor Name</th>
                    <th>Date</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Action</th>
                  


                  </tr>
                </thead>
                @foreach ($appointments as $appointment)
                <tbody>
                   
                    <tr>
                        <td>{{$appointment->name}}</td>
                        <td>{{$appointment->email}}</td>
                        <td>{{$appointment->phone}}</td>
                        <td>{{$appointment->doctor}}</td>
                        <td>{{$appointment->date}}</td>
                        <td>{{$appointment->message}}</td>
                        <td>{{$appointment->status}}</td>
                        <td><span><a class="btn btn-success" href="{{url('approveAppointment',$appointment->id)}}">Approve</a></span><span><a href="{{url('cancellAppointment',$appointment->id)}}" class="btn btn-danger">Cancel</a></span><span><a href="{{url('composeEmail',$appointment->id)}}" class="btn btn-info">Email</a></span></td>
                    </tr>

                   
                </tbody>
                @endforeach
    
            </table>
          </div>
      

      </div>
        <!-- partial -->
       {{-- @include('admin.body') --}}
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')

    <!-- End custom js for this page -->
  </body>
</html>