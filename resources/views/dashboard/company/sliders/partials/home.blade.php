<div class="row">
  <div class="col-xl-9">
      <div class="card">
          <div class="card-body">
              <h4 class="mt-0 header-title mb-4">{{__('site.details')}}</h4>
              <div class="row">
             
                <div class="col-md-4">
                    <h4 class="mt-0 header-title">{{__('site.id')}} : <span class="badge badge-success h6">{{$row->id}}</span></h4>
                   
                </div>
                <div class="col-md-4">
                    <h4 class="mt-0 header-title">{{__('site.name')}} : <span class="badge badge-success h6">{{$row->name}}</span></h4>
                   
                </div>
                <div class="col-md-4">
                    <h4 class="mt-0 header-title">{{__('site.priority')}} : <span class="badge badge-success h6">{{$row->priority}}</span></h4>
                   
                </div>
                <div class="col-md-4">
                    <h4 class="mt-0 header-title">{{__('site.description')}} : <span class="badge badge-success h6">{{ strip_tags($row->description)}}</span></h4>
                   
                </div>
                <div class="col-md-4">
                    <h4 class="mt-0 header-title">{{__('site.priority')}} : <span class="badge badge-success h6">{{ $row->priority}}</span></h4>
                   
                </div>
                <div class="col-md-4">
                    <h4 class="mt-0 header-title">{{__('site.branch_id')}} : <span class="badge badge-success h6">{{ $row->branch->name}}</span></h4>
                   
                </div>
              </div>

          </div>
      </div>
  </div>
  <div class="col-xl-3">
    <div class="card">
        <div class="card-body">
            <h4 class="mt-0 header-title mb-4">{{__('site.image')}}</h4>
            <table class="table table-striped mb-0">
                <tbody>
                    <tr>
                        <td>
                          <img src="{{$row->image_path}}" width="60" height="60" alt="">
                          {{-- <i class="far fa-file-pdf text-primary h2"></i> --}}
                      </td>
                        <td>
                        <td>
                            <a href="{{$row->image_path}}" target="_blank" class="btn btn-primary btn-sm">
                                <i class="fas fa-download"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
</div>
