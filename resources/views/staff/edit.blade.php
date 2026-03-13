@extends('app')
@section('title', 'Ubah Kategori Kamar')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ $title ?? '' }}</h3>
                    <form action="{{ route('staffs.update', $edit->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Nama *</label>
                                    <input type="text" class="form-control" name="name" placeholder="Masukkan Nama"
                                        required value="{{ $edit->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Telp/Hp *</label>
                                    <input type="number" class="form-control" name="phone" placeholder="Telp/Hp" required
                                        value="{{ $edit->phone }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Jabatan *</label>
                                    <input type="text" class="form-control" name="position_name" placeholder="Jabatan"
                                        required value="{{ $edit->position_name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Email *</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" required
                                        value="{{ $edit->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Tanggal Bergabung *</label>
                                    <input type="date" class="form-control" name="join_date"
                                        value="{{ $edit->join_date }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Alamat *</label>
                                    <textarea required name="address" class="form-control" id="" cols="30" rows="10"
                                        placeholder="Alamat">{{ $edit->address }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary">Simpan</button>
                            <a href="{{ url()->previous() }}" class="text-muted">Kembali</a>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
