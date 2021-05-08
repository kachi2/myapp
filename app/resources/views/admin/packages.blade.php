@extends('layouts.admin', ['page_title' => 'Packages'])
@section('content')
    <div class="body-content row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-3">
                            <a href="{{ route('admin.packages.add') }}" class="btn btn-primary"><i
                                    class='uil uil-plus mr-1'></i>Add Package</a>
                        </div>
                        <div class="col-sm-9">
                            <div class="float-sm-right mt-3 mt-sm-0">

                                <div class="task-search d-inline-block mb-3 mb-sm-0">
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
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#Id</th>
                                        <th scope="col">Package Name</th>
                                        <th scope="col">Duration</th>
                                        <th scope="col">Payment Period</th>
                                        <th scope="col">Plans</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($packages as $package)
                                        <tr>
                                            <th scope="row">{{ $package->id }}</th>
                                            <td>{{ $package->name }}</td>
                                            <td>{{ $package->formatted_duration }}</td>
                                            <td>{{ $package->formatted_payment_period }}</td>
                                            <td>{{ $package->plans()->count() }} Plans</td>
                                            <td>{{ $package->created_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.packages.show', ['id' => $package->id]) }}" class="btn btn-sm btn-danger">
                                                    <i class='uil uil-eye'></i>
                                                </a>
                                                <a href="{{ route('admin.packages.edit', ['id' => $package->id]) }}" class="btn btn-sm btn-danger">
                                                    <i class='uil uil-edit'></i>
                                                </a>
                                                <button class="btn btn-sm btn-danger" onclick="deletePackage('{{ route('admin.packages.delete', ['id' => $package->id]) }}')">
                                                    <i class='uil uil-trash'></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td><span>No Packages Yet</span>
                                            <td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
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
        function deletePackage(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You wont be able to reveres this',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if(result.value) {
                    postDummy(url)
                }
            })
        }
    </script>
@endpush
