@foreach($dates as $date)
    @php
        $slotsForThisDate = $slots->filter(function ($slot) use ($date, $clinicId) {
            return \Carbon\Carbon::parse($slot->appointment_date)->isSameDay($date)
                && $slot->clinic_id == $clinicId;
        });
    @endphp

    <div class="day-card">
        <div class="day-header">
            {{ \Carbon\Carbon::parse($date)->isToday() ? 'Today' : \Carbon\Carbon::parse($date)->format('l, F j') }}
        </div>

        <div class="times">
            @foreach($slotsForThisDate as $slot)
                @if($slot->is_booked)
                    <span class="time-slot booked-slot">
                        <del>{{ \Carbon\Carbon::parse($slot->start_time)->format('g:i A') }}</del>
                    </span>
                @else
                    <a href="{{ route('appointments.confirm', ['slot' => $slot->id]) }}"
                       class="time-slot available-slot">
                        {{ \Carbon\Carbon::parse($slot->start_time)->format('g:i A') }}
                    </a>
                @endif
            @endforeach
        </div>
    </div>
@endforeach
