@extends('layouts.admin')
@section('title', 'All Users')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="card-title">All Users</span>
                    </div>
                    <div class="card-body">
                        <!-- Table with stripped rows -->
                        <table class="table table-striped" id="">
                            <thead>
                            <tr>
                                <th class="wp-20">Registered At</th>
                                <th scope="col">Name</th>
                                <th class="wp-20" scope="col">Email</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key => $user)
                                <tr>
                                    <th class="wp-20" scope="col">{{ dateformat($user->created_at, 'd M, Y') }}</th>
                                    <td class="wp-20">{{ $user->name }}</td>
                                    <td class="wp-20">{{ $user->email }}</td>
                                    <td>
                                        <form
                                            class="float-end"
                                            action="{{ route('admin.user.destroy', $user->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('css')
@endpush
@push('js')
@endpush

