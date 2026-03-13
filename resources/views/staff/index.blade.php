@extends('app')
@section('title', 'Kategori Kamar')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ $title ?? '' }}</h3>
                    <div align="right" class="mb-3">
                        <a href="{{ route('staffs.create') }}" class="btn btn-primary">Tambah</a>
                    </div>
                    <table class="table table-bordered datatable" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Telp</th>
                                <th>Email</th>
                                <th>Tgl Bergabung</th>
                                <th>Alamat</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $index => $data)
                                <tr>
                                    <td>{{ $index += 1 }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->position_name }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->join_date }}</td>
                                    <td>{{ $data->address }}</td>
                                    <td>
                                        <a href="{{ route('staffs.edit', $data->id) }}" class="btn btn-success">Edit</a>
                                        <form action="{{ route('staffs.destroy', $data->id) }}" method="post"
                                            class="d-inline" id="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger show_confirm">Delete</button>

                                        </form>
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
