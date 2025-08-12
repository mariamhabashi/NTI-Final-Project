<div class="appointment-container p-1">
    <p>Choose your appointment</p>
        <div class="days">
            <button class="btn btn-primary me-2 scroll-button" id="scrollLeftBtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
            </button>

@foreach($dates as $date)
    <div class="day-card" id="selectedClinic">
        <div class="day-header">
            {{ \Carbon\Carbon::parse($date)->isToday() ? 'Today' : \Carbon\Carbon::parse($date)->format('l, F j') }}
        </div>

        @php
            // Filter only slots for this date and not booked

            $slotsForThisDate = $slots->filter(function ($slot) use ($date, $clinicId) {
                return \Carbon\Carbon::parse($slot->appointment_date)->isSameDay($date)
                    && !$slot->is_booked
                    && $slot->clinic_id == $clinicId;
            });
        @endphp

        <div class=<div class="times">
            @forelse($slotsForThisDate->take(6) as $slot)
                <a href="{{ route('appointments.confirm', ['slot' => $slot->id]) }}" class="time-slot" style="display: inline-block; text-decoration: none;">
                    {{ \Carbon\Carbon::parse($slot->start_time)->format('g:i A') }}
                </a>
            @empty
                <div class="text-gray-500 italic">No available slots</div>
            @endforelse

            @if($slotsForThisDate->count() > 6)
                {{--                                            <a href="{{ route('appointments.slots', ['date' => $date]) }}" class="time-slot">More</a>--}}
            @endif
        </div>

        <form action="{{ route('appointments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
            <input type="hidden" name="date" value="{{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}">
            <div class="book-btn">BOOK</div>
        </form>
    </div>
@endforeach

<button class="btn btn-primary ms-2 scroll-button" id="scrollRightBtn">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16" >
        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
    </svg>
</button>

</div>
    <hr class="my-2" style="color: #AAAAA8; font-weight: bolder;">
    <div style="font-size: 14px; color: #ABABA9">Appointment reservation</div>
    <hr class="my-2">

</div>
