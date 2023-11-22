@extends('layouts.app')

@section('contents')
    <div class="d-flex aligh-items-center justify-content-between">
        <h1 class="mb-0 font-weight-bold">ADMIN LIST</h1>
    </div>
    <hr />
    <x-success />
    <table class="table table-hover">
        <thead class="table-info">
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Level</th>
            </tr>
        </thead>
        <tbody>
        <tbody>
            @if ($admins->count() > 0)
                @foreach ($admins as $admin)
                    <tr class="">
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $admin->first_name }}</td>
                        <td class="align-middle">{{ $admin->last_name }}</td>
                        <td class="align-middle">{{ $admin->email }}</td>
                        <td class="align-middle">{{ $admin->level }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Hurrah, no admin found.</td>
                </tr>
            @endif
        </tbody>
    </table>
    </table>
@endsection
