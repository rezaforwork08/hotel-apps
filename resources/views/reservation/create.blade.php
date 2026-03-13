@extends('app')
@section('title', 'Reservasi Baru')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ $title ?? '' }}</h3>
                    <form action="{{ route('reservation.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- Personal --}}
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label for="" class="form-label"> Reservation No</label>
                                    <input type="text" class="form-control" name="reservation_number"
                                        placeholder="Masukkan Nama Tamu" value="{{ $reservation_number ?? '' }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">First Name *</label>
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Mobile</label>
                                    <input type="number" class="form-control" name="guest_phone" placeholder="Mobile">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label for="" class="form-label"> Guest Origin</label>
                                    <select name="guest_origin" id="" class="form-control">
                                        <option value="0">Domestic</option>
                                        <option value="1">International</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Last Name *</label>
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Email </label>
                                    <input type="email" class="form-control" name="guest_email"
                                        placeholder="Masukkan Email">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-upload pt-4 pb-4">
                                    <div class="mb-3">
                                        <label for="fileInput" class="form-label">Id Card</label>
                                        <input class="form-control" type="file" id="fileInput" accept="image/*">
                                    </div>
                                    <div class="mt-3">
                                        <img id="previewImage" class="img-fluid rounded border d-none" alt="Preview"
                                            style="max-height: 200px;" />
                                    </div>

                                </div>
                            </div>
                            {{-- End Personal --}}
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Kategori Kamar *</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">Select One</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Check In *</label>
                                                <input type="date" id="checkin" name="guest_check_in"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Check Out *</label>
                                                <input type="date" id="checkout" name="guest_check_out"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Metode Bayar *</label>
                                    <select name="payment_method" id="" class="form-control">
                                        <option value="0">Cash</option>
                                        <option value="0">Credit Card</option>
                                        <option value="2">Bank Transfer</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Status *</label>
                                    <select name="guest_status" id="" class="form-control">
                                        <option value="">Select One</option>
                                        <option value="booked">Booked</option>
                                        <option value="cancel">Cancelled</option>
                                        <option value="checkout">CheckIn</option>
                                        <option value="checkout">CheckOut</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Room Name *</label>
                                    <select name="room_id" id="room_id" class="form-control">
                                        <option value="">Select One</option>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Number Of Guest</label>
                                    <select name="guest_qty" id="" class="form-control">
                                        <option value="1">1 Tamu</option>
                                        <option value="2">2 Tamu</option>
                                        <option value="3">3 Tamu</option>
                                        <option value="4">4 Tamu</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Special Request / Note </label>
                                    <textarea name="guest_note" id="" class="form-control"></textarea>
                                </div>
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title">Rangkuman Pembayaran</h6>
                                        <div class="d-flex justify-content-between">
                                            <span>Harga Kamar (Per malam)</span>
                                            <span id="roomRate">Rp.0</span>
                                            <input type="hidden" id="roomRateVal">
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span>Berapa Malam</span>
                                            <span id="totalNight">0</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span>Subtotal</span>
                                            <span id="subtotal">Rp.0</span>
                                            <input type="hidden" name="subtotal" id="subTotalVal">
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span>Tax (10%)</span>
                                            <span id="tax">Rp.0</span>
                                            <input type="hidden" id="taxVal">
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span>Grandtotal</span>
                                            <span id="totalAmount">Rp.0</span>
                                            <input type="hidden" name="totalAmount" id="totalAmountVal">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Save</button>
                            <a class="btn btn-secondary" href="{{ url()->previous() }}">Cancel</a>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
