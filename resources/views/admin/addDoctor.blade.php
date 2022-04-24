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
       
        
        <div class="container" style="padding-top: 100px;padding-bottom: 100px">
          @if (Session::has('message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          <div style="text-align: center"><h3>Add Doctor</h3></div><br>
         <form action="{{url('uploadDoctor')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Doctor's Name" style="color: black">
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="number" class="form-control" name="phone" placeholder="Enter Doctor's Phone" style="color: black">
          </div>
          <div class="form-group">
            <label for="name">Speciality</label>
            <select name="speciality" id="" class="form-control" style="color: white">
              <option value="">---Select</option>
              <option value="Eye Specialist">Eye</option>
              <option value="Heart Specialist">Heart</option>
              <option value="Skin Specialist">Skin</option>
            </select>
          </div>
          <div class="form-group">
            <label for="room">Room No</label>
            <input type="text" class="form-control" name="room" placeholder="Enter Doctor's Room" style="color: black">
          </div>
          <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="file">
          </div>
          <button type="submit" class="btn btn-success" type="button">Add Doctor</button>
         </form>
        </div>
       


      </div>
        <!-- partial -->
       {{-- @include('admin.body') --}}
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')

    <!-- End custom js for this page -->
  </body>
</html>