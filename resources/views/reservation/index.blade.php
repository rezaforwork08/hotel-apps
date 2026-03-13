@extends('app')
@section('title', 'All Reservations')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ $title ?? '' }}</h3>
                    <div align="right" class="mb-3">
                        <a href="{{ route('reservation.create') }}" class="btn btn-primary">Add Reservation</a>
                    </div>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Reservation</th>
                                <th>Room</th>
                                <th>Guest</th>
                                <th>Checkin</th>
                                <th>Checkout</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $index => $data)
                                <tr>
                                    <td>{{ $index += 1 }}</td>
                                    <td>{{ $data->reservation_number }}</td>
                                    <td>{{ $data->room->name }}</td>
                                    <td>
                                        <small>
                                            Fullname : {{ $data->first_name }} {{ $data->last_name }}
                                            <br>
                                            Email : {{ $data->guest_email }}
                                            <br>
                                            Phone : {{ $data->guest_phone }}
                                        </small>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($data->guest_check_in)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($data->guest_check_out)->format('d/m/Y') }}</td>
                                    <td><span class="{{ $data->status_class }}">{{ $data->status_text }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('reservation.edit', $data->id) }}" class="btn btn-success"><i
                                                class="bi bi-pencil"></i></a>
                                        <form id="form-delete" action="{{ route('reservation.destroy', $data->id) }}"
                                            method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger show_confirm" type="button"><i
                                                    class="bi bi-trash"></i></button>

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
