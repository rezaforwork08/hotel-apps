@extends('app')
@section('title', 'Dashboard')
@section('content')
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">


                            <div class="card-body">
                                <h5 class="card-title">Total Reservations </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-calendar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $reservations ?? 0 }}</h6>
                                        {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span> --}}

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card revenue-card">


                            <div class="card-body">
                                <h5 class="card-title">Occupied Rooms </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-house-check-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $occupied_rooms ?? '' }}</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-3 col-xl-12">

                        <div class="card info-card customers-card">


                            <div class="card-body">
                                <h5 class="card-title">Available Room</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-house-door-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalAvailable ?? 0 }}</h6>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->
                    <div class="col-xxl-3 col-xl-12">

                        <div class="card info-card customers-card">


                            <div class="card-body">
                                <h5 class="card-title">Today's Revenue</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cash"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ number_format($dailyRevenue) ?? 0 }}</h6>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">


                            <div class="card-body">
                                <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Room</th>
                                            <th scope="col">Guest Name</th>
                                            <th scope="col">CheckIn</th>
                                            <th scope="col">CheckOut</th>
                                            <th scope="col">Mobile</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($currentBookings as $reservation)
                                            <tr>
                                                <th scope="row"><a
                                                        href="#">#{{ $reservation->reservation_number }}</a></th>
                                                <td>{{ $reservation->guest_name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($reservation->guest_check_in)->format('d/m/Y') }}
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($reservation->guest_check_out)->format('d/m/Y') }}
                                                </td>
                                                <td>{{ $reservation->phone ?? '' }}</td>
                                                <td><span class="{{ $data->status_class }}">{{ $data->status_text }}</span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('reservation.edit', $data->id) }}"
                                                        class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                                    <form id="form-delete"
                                                        action="{{ route('reservation.destroy', $data->id) }}"
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
                    </div><!-- End Recent Sales -->


                </div>
            </div><!-- End Left side columns -->


        </div>
    </section>
@endsection
