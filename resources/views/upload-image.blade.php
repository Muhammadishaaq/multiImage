<!DOCTYPE html>
<html>
   <head>
      <title>Laravel 9 - Upload Multiple Images</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container">
         <div class="panel panel-primary">
            <div class="panel-heading mb-3 mt-5">
               <h2>Laravel 9 - Upload Multiple Images</h2>
            </div>
            <div class="panel-body">
               @if ($message = Session::get('success'))
                   <div class="alert alert-success alert-block">
                      <strong>{{ $message }}</strong>
                   </div>
               @endif
 
               @if (count($errors) > 0)
               <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.
                  <ul>
                     @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
               @endif
 
               <form action="{{ url('/upload-images') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                     <div class="mb-3 col-md-6">
                        <label class="form-label">Select Images:</label>
                        <input type="file" name="images[]" class="form-control" multiple/>
                     </div>
 
                     <div class="col-md-12">
                        <button type="submit" class="btn btn-success">Upload Image/Images</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </body>
</html>