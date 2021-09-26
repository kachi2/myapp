@extends('layouts.app')
@section('content')
       <div class="nk-content nk-content-fluid">
                     <div class="nk-content-body">
                            <div class="nk-block-head">
                                <div class="nk-block-between-md g-4">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title fw-normal">Testimony</h5>
                                        
                                    </div>
                                    <div class="nk-block-head-content">
                                        <ul class="nk-block-tools gx-3">
                                            <li class="order-md-last">
                                                 <a href="{{ route('testimonies.add') }}" class="btn btn-primary"><i
                                    class='uil uil-plus mr-1'></i>Submit New Testimony</a>
                       
                                            </li>
                                       </ul>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                        <div class="components-preview wide-md mx-auto">
                         <div class="nk-block nk-block-lg"> 
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                                <thead>
                                                    <tr class="nk-tb-item nk-tb-head">
                                                       
                                                     

                                                            <th class="nk-tb-col"><span class="sub-text">Message</th>
                                                            <th class="nk-tb-col"><span class="sub-text">Status</th>
                                                            <th class="nk-tb-col"><span class="sub-text">Date</th>
                                                            <th class="nk-tb-col"><span class="sub-text">Action</th>
                                                            
                                                        
                                                    </tr>
                                                </thead>
                                          
                                                 <tbody>
                                    @forelse($testimonies as $testimony)
                                        <tr>
                                            <td  class="nk-tb-col">{{ $testimony->message }}</p> </td>
                                            <td  class="nk-tb-col">
                                                @if( $testimony->status == 1)
                                                    <span class="badge badge-pill badge-success">Approved</span>
                                                @else
                                                    <span class="badge badge-pill badge-warning">Pending</span>
                                                @endif
                                            </td>
                                             <td  class="nk-tb-col">{{ $testimony->created_at }}</td>
                                           <td  class="nk-tb-col">
                                                <a href="{{ route('testimonies.edit', ['id' => $testimony->id]) }}" class="btn btn-sm btn-danger">
                                                    <i class='uil uil-edit'>Edit</i>
                                                </a>
                                                 
                                                <button type="button " class="btn btn-sm btn-danger" onclick="deleteTestimony()">
                                                    <i class='uil uil-trash'>Delete</i>
                                                </button>
                                            </td>
                                            <form method="post" action="{{ route('testimonies.delete', ['id' => $testimony->id]) }}" id="form1"> 
                                                                                 @csrf
                                                                                
                                                    </form>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td><span>No Testimony Yet!</span>
                                            <td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                            </table>
                                        </div>
                                    </div><!-- .card-preview -->
                                </div> 
                                </div>
                         



                        </div>
                    </div>
               
@endsection
@section('scripts')
    <script>
        function deleteTestimony(){
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, do it!'
            }).then((result) => {
                if(result.value) {
                   document.getElementById('form1').submit();
                }
            })
        }

let message = {!! json_encode(Session::get('message')) !!};
let msg = {!! json_encode(Session::get('alert')) !!};

//alert(msg);
if(message != null){
toastr.clear();
    NioApp.Toast(message , msg, {
      position: 'top-right',
        timeOut: 5000,
    });
}

 
    </script>
@endsection
