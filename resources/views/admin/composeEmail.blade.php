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
            <div class="container" style="padding-top: 50px;">
                @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{Session::get('message')}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <h3 style="text-align: center; background-color:chocolate;color:cornsilk;padding:10px;">Compose Email To Customer</h3><br>
                <form action="{{url('sendEmail',$appointment['id'])}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="greeting">Greeting</label>
                        <input type="text" class="form-control" name="greeting" style="color: white">
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <input type="text" class="form-control" name="body" style="color: white">
                    </div>
                    <div class="form-group">
                        <label for="actiontext">Action Text</label>
                        <input type="text" class="form-control" name="actionText" style="color: white">
                    </div>
                    <div class="form-group">
                        <label for="actionurl">Action Url</label>
                        <input type="text" class="form-control" name="actionUrl" style="color: white">
                    </div>
                    <div class="form-group">
                        <label for="endpart">End Part</label>
                        <input type="text" class="form-control" name="endPart" style="color: white">
                    </div>
                    <button type="submit" class="btn btn-primary">Email It</button>
                </form>

            </div>
        </div>
    </div>
      
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')

    <!-- End custom js for this page -->
  </body>
</html>