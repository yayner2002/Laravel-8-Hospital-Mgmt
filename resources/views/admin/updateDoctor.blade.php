<!DOCTYPE html>

<html lang="en">
  <head>
      <base href="/public">
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
          <div class="container" style="padding-top: 50px">

            <h2 style="text-align: center">Edit Doctor</h2><br>
            <form action="{{url('editDoctor',$doctor->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group" style="background-color: black">
                    <label for="name">Doctor Name</label>
                    <input type="text" class="form-control" value="{{$doctor->name}}" style="color: black" name="name">
                </div>
                <div class="form-group" style="background-color: black">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" value="{{$doctor->phone}}" style="color: black" name="phone">
                </div>
                <div class="form-group" style="background-color: black">
                    <label for="speciality">Speciality</label>
                   <select name="speciality" class="form-control" style="color: white">
                       <option value="">...Select</option>
                       <option value="Skin Specialist">Skin Specialist</option>
                       <option value="Eye Specialist">Eye Specialist</option>
                       <option value="Heart Specialist">Heart Specialist</option>
                   </select>
                </div>
                <div class="form-group" style="background-color: black">
                    <label for="room">Room</label>
                    <input type="text" class="form-control" value="{{$doctor->room}}" style="color: black" name="room">
                </div>
                <div class="form-group">
                    <label for="room">Old Image</label>
                    <img src="doctorimage/{{$doctor->image}}" alt="" width="150" height="150">
                </div>
                <div class="form-group">
                    <label for="file">Change Image</label>
                    <input type="file" class="form-control" style="color: white" name="image" multiple>
                </div>

                <button type="submit" class="btn btn-primary">Update Doctor</button>
            </form>
          </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')

    <!-- End custom js for this page -->
  </body>
</html>