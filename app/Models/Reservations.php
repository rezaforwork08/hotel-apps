<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    //
    protected $fillable = [
        'first_name',
        'last_name',
        'guest_phone',
        'guest_email',
        'guest_note',
        'guest_check_in',
        'guest_check_out',
        'room_id',
        'payment_method',
        'reservation_number',
        'guest_status',
        'guest_id_card',
        'isOnline',
        'isReserve',
        'subtotal',
        'totalAmount',
    ];

    protected $append = ['isReserved_text', 'isReserved_class', 'status_text', 'status_aclass'];

    public function getIsReservedClassAttribute()
    {
        switch ($this->isReserve) {
            case '1':
                return "badge text-bg-success";
                break;
            case '2':
                return "badge text-bg-secondary";
                break;

            default:
                return "badge text-bg-warning";
                break;
        }
    }

    public function getIsReservedTextAttribute()
    {
        switch ($this->isReserve) {
            case '1':
                return "Confirm";
                break;
            case '2':
                return "Cancel";
                break;

            default:
                return "Pending";
                break;
        }
    }

    public function getStatusClassAttribute()
    {
        switch ($this->guest_status) {
            case 'booked':
                return "badge text-bg-success";
                break;
            case 'cancelled':
                return "badge text-bg-warning";
                break;
            case 'checkin':
                return "badge text-bg-success";
                break;
            case 'checkout':
                return "badge text-bg-danger";
                break;
        }
    }

    public function getStatusTextAttribute()
    {
        switch ($this->guest_status) {
            case 'booked':
                return "Booked";
                break;
            case 'cancelled':
                return "Cancelled";
                break;
            case 'checkin':
                return "CheckIn";
                break;
            case 'checkout':
                return "CheckOut";
                break;
        }
    }

    public function room()
    {
        return $this->belongsTo(Rooms::class, 'room_id', 'id');
    }
}
