    @extends('backend.layouts.master')
  @section('content')
   <!-- Layout wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
                
         @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
            <div class="col-10">          
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home /</span> Event</h4>
                          </div>
                                      <div class="col-2">
                                      <a href="{{route('event.create')}}">
<button type="button" class="btn btn-primary mt-3">+ Add</button>
</a> 
</div>
   </div>
              <!-- Striped Rows -->
              <div class="card">
                <h5 class="card-header">Event List</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-striped" >
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($events as $key=>$event)
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$key + 1}}</strong></td>
                        <td>{{$event->title}}</td>
                        <td>                         
                              <img src="{{$event->photo}}" alt="Avatar" style="max-height: 90px;max-width:120px"/>
                        </td>
                        <td><input type="checkbox" class="event_status" data-id="{{$event->id}}" data-toggle="switchbutton"  data-onstyle="primary" {{$event->status == "active" ? "checked"  :'' }}  data-onlabel="Active" data-offlabel="In Active"></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item"  href="{{route('event.edit',$event->id)}}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                             <form method="post" action="{{ route('event.destroy', $event->id) }}">
                            @csrf
                                     @method('delete')
                              <a class="dropdown-item delete_btn"  data-toggle="tooltip"  href="javascript:void(0);" 
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                              </form>
                            </div>
                           </div>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Striped Rows -->
</div>

            
    @endsection