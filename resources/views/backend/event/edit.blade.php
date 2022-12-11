    @extends('backend.layouts.master')
  @section('content')
 
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home / </span>Event</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Event Edit</h5>

                    </div>
                    <div class="card-body">
                      <form action="{{route('event.update',$event->id)}}" method="post">
                      @csrf
                      @method('put')
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Title</label>
                          <input type="text" class="form-control" id="basic-default-fullname" value="{{$event->title}}" name="title" placeholder="Enter title" />
                           @error('title')
                      <span class="text-danger">{{$message}}</span>
                     @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Description</label>
                          <textarea type="text" class="form-control" id="basic-default-company" name="description" value="{{$event->description}}" placeholder="Enter description">{{$event->description}}</textarea>
                           @error('description')
                      <span class="text-danger">{{$message}}</span>
                     @enderror
                        </div>
                     
                   
                        
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-phone">Image</label>
                            <div class="input-group">
                                            <span class="input-group-btn">
                                              <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary" style="color:white;">
                                                <i class="fa fa-picture-o"></i> Choose
                                              </a>
                                            </span>
                                            <input id="thumbnail" class="form-control" type="text" value="{{$event->photo}}" name="photo">
              
                                        </div>
                                                                       @error('photo')
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