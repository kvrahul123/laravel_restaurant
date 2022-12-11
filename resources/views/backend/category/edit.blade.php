    @extends('backend.layouts.master')
  @section('content')
 
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home / </span>Category</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Category Edit</h5>

                    </div>
                    <div class="card-body">
                      <form action="{{route('category.update',$category->id)}}" method="post">
                      @csrf
                      @method('put')
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Category</label>
                          <input type="text" class="form-control" id="basic-default-fullname" value="{{$category->category}}" name="category" placeholder="Enter category" />
                           @error('category')
                      <span class="text-danger">{{$message}}</span>
                     @enderror
                        </div>
                    
                     
      
              
               <div class="text-center">
                <button type="submit" class="btn btn-primary mt-10" style="margin-right:25px;">Update</button>                 
                 <button type="reset" class="btn btn-secondary mt-10">Reset</button>
                        </div> 
                         
        
                      </form>
                    </div>
                  </div>
                </div>
         
              </div>
            </div>
            <!-- / Content -->

        
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>    


         
    @endsection