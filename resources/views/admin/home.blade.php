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
       @include('admin.body')
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')

    <!-- End custom js for this page -->
  </body>
</html>