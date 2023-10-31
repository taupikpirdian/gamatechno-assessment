@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h5 class="card-title mb-0">{{$title}}</h5>
                    </div>
                    <div class="col-6" style="text-align: right">
                        <a href="{{ route($route_create) }}" class="btn btn-primary">Create</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="scroll-horizontal-v2" class="table nowrap align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Lembaga</th>
                            <th>CreatedAt</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{$data->name}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->roles[0]['name']}}</td>
                                <td>{{$data->access->institutionCategoryPart ? $data->access->institutionCategoryPart->name : ""}}</td>

                                <td>{{$data->created_at}}</td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="{{ route('blog.show', $data->id) }}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                            <li><a href="{{ route('blog.edit', $data->id) }}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                            <li>
                                                <button class="dropdown-item remove-item-btn" onclick="deleteData({{ $data->id }})">
                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push ('after-styles')
@endpush

@push ('after-scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new DataTable("#scroll-horizontal-v2", {
                scrollX: true,
                order: [[3, "desc"]] // This orders the first column in descending order
            });
        })
        // Simulated function to remove data (replace with your actual logic)
        function fakeRemoveData(id) {
            var url = "{{ route('blog.destroy', ':id') }}".replace(':id', id);
            $.ajax({
                type: 'DELETE',
                url: url,
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function (data) {
                    Swal.fire(
                        'Deleted!',
                        'Your data has been deleted.',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                },
                error: function (xhr) {
                    // Handle errors, e.g., show an error message
                    alert('Error: ' + xhr.responseText);
                }
            });
        }
    </script>
@endpush