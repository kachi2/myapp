@extends('layouts.admin', ['page_title' => 'Testimonies'])
@section('content')
    <div class="body-content row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-3">
                            <a href="{{ route('admin.testimonies.add') }}" class="btn btn-primary"><i
                                    class='uil uil-plus mr-1'></i>Add Testimony</a>
                        </div>
                        <div class="col-sm-9">
                            <div class="float-sm-right mt-3 mt-sm-0">

                                <div class="task-search d-inline-block mb-3 mb-sm-0 mr-sm-3">
                                    <form method="get">
                                        <div class="input-group">
                                            <input type="text" name="search" value="{{ request()->input('search') }}" class="form-control search-input"
                                                   placeholder="Search..." />
                                            <span class="uil uil-search icon-search"></span>
                                            <div class="input-group-append">
                                                <button class="btn btn-soft-primary" type="submit">
                                                    <i class='uil uil-file-search-alt'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                            data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        <i class='uil uil-sort-amount-down'></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ filter_url('all') }}">All</a>
                                        <a class="dropdown-item" href="{{ filter_url('approved') }}">Approved</a>
                                        <a class="dropdown-item" href="{{ filter_url('pending') }}">Pending</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                    	<th scope="col">Poster</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                        <th scope="col" >Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($testimonies as $testimony)
                                        <tr>
                                            <td>
                                            	<a href="{{ route('admin.users.show', ['id' => $testimony->user->id]) }}">
                                            		{{ $testimony->user->name }}
                                            	</a>
                                            </td>
                                            <td>
                                                {{ $testimony->user_name }}
                                            </td>
                                            <td> <p style="overflow-wrap: break-word;">{{ $testimony->message }}</p> </td>
                                            <td>
                                                @if( $testimony->status == 1)
                                                    <span class="badge badge-pill badge-success">Approved</span>
                                                @else
                                                    <span class="badge badge-pill badge-warning">Pending</span>
                                                @endif
                                            </td>
                                            <td>{{ $testimony->created_at }}</td>
                                            <td>
                                            	@if( $testimony->status == 0)
                                            		<button class="btn btn-success btn-sm" onclick="markApproved('{{ route('admin.testimonies.approve', ['id' => $testimony->id]) }}')">
                                            			Approve
                                                	</button>
                                                @else
                                                	<button class="btn btn-danger btn-sm" onclick="markDisapproved('{{ route('admin.testimonies.disapprove', ['id' => $testimony->id]) }}')">
                                            			Disapprove
                                                	</button>
                                                @endif
                                                <a href="{{ route('admin.testimonies.edit', ['id' => $testimony->id]) }}" class="btn btn-sm btn-danger">
                                                    <i class='uil uil-edit'></i>
                                                </a>
                                                <button class="btn btn-sm btn-danger" onclick="deleteTestimony('{{ route('admin.testimonies.delete', ['id' => $testimony->id]) }}')">
                                                    <i class='uil uil-trash'></i>
                                                </button>
                                            </td>
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
                            <div class="col mt-4">
                                {{ $testimonies->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        function markApproved(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, mark approved!',
                cancelButtonText: 'No, cancel!'
            }).then(function (result) {
                if (result.value) {
                    this.postDummy(url)
                }
            });
        }

        function markDisapproved(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, mark disapproved!',
                cancelButtonText: 'No, cancel!'
            }).then(function (result) {
                if (result.value) {
                    this.postDummy(url)
                }
            });
        }

        function deleteTestimony(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete!',
                cancelButtonText: 'No, cancel!'
            }).then(function (result) {
                if (result.value) {
                    this.postDummy(url)
                }
            });
        }
    </script>
@endpush
