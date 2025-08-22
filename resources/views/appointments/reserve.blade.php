<div class="appointment-container p-1">
    <p>Choose your appointment</p>
    <div class="days">
        <button class="btn btn-primary me-2 scroll-button" id="LeftBtn">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                 class="bi bi-chevron-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
            </svg>
        </button>

        @foreach($dates as $date)
            <div class="day-card" id="selectedClinic">
                @php
                    $carbonDate = \Carbon\Carbon::parse($date);
                @endphp
                <div class="day-header">
                    @if($carbonDate->isToday())
                        Today
                    @elseif($carbonDate->isTomorrow())
                        Tomorrow
                    @else
                        {{ $carbonDate->format('l, F j') }}
                    @endif
                </div>

                @php
                    $clinicId = $clinic->id;
                    $slotsForThisDate = $slots->filter(function ($slot) use ($date, $clinicId) {
                    return \Carbon\Carbon::parse($slot->appointment_date)->isSameDay($date)
                    && $slot->clinic_id == $clinicId;
                    });
                @endphp
                <script>

                    document.addEventListener("DOMContentLoaded", function () {
                        const scrollLeftBtn = document.getElementById('LeftBtn');
                        const scrollRightBtn = document.getElementById('RightBtn');

                        function updateOffset(change) {
                            const parts = window.location.pathname.split("/");
                            let offset = parseInt(parts.pop());
                            if (isNaN(offset)) offset = 0;

                            offset += change;
                            if (offset < 0) offset = 0;

                            const newPath = [...parts, offset].join("/");
                            window.location.href = newPath;
                        }

                        scrollLeftBtn.addEventListener("click", () => updateOffset(-3));
                        scrollRightBtn.addEventListener("click", () => updateOffset(3));

                        document.querySelectorAll(".times").forEach(function (container) {
                            const moreBtn = container.querySelector(".show-more");
                            const extraSlots = container.querySelector(".extra-slots");

                            if (moreBtn && extraSlots) {
                                moreBtn.addEventListener("click", function () {
                                    extraSlots.style.display = "inline";
                                    moreBtn.style.display = "none";
                                });
                            }
                        });
                    });
                </script>


                <div class="times">
                    @php
                        $visibleSlots = $slotsForThisDate->take(6);
                        $hiddenSlots = $slotsForThisDate->slice(6);
                    @endphp
                    @if($slotsForThisDate->isEmpty())
                        <span class="no-slots" style="color: #999;">No slots available</span>
                    @else

                        {{--First 6 slots--}}
                        @foreach($visibleSlots as $slot)
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

                        {{--Hidden slots--}}
                        <span class="extra-slots" style="display: none;">
                                                @foreach($hiddenSlots as $slot)
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
                        </span>

                        {{--More button--}}
                        @if($slotsForThisDate->count() > 6)
                            <button class="show-more time-slot available-slot"
                                    style="border: none; background-color: white">More</button>
                        @endif
                    @endif
                </div>
                <form action="{{ route('appointments.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                    <input type="hidden" name="date"
                           value="{{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}">
                    <div class="book-btn">BOOK</div>
                </form>
            </div>
        @endforeach

        <button class="btn btn-primary ms-2 scroll-button" id="RightBtn">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                 class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
            </svg>
        </button>

    </div>
    <div style="width: 100%">
        <hr class="my-2">
        <div style="font-size: 14px; color: #ABABA9; display: block; width: 100%; padding: 10px">
            Appointment reservation</div>
        <hr class="my-2">
    </div>

    <div class="d-flex align-items-center p-3" style="background: white; border-radius: 8px;">
        <!-- Calendar Icon -->
        <div class="me-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#66bb6a"
                 class="bi bi-calendar-check" viewBox="0 0 16 16">
                <path
                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h.5A1.5 1.5 0 0 1 15 2.5V4H1V2.5A1.5 1.5 0 0 1 2.5 1H3v-.5a.5.5 0 0 1 .5-.5" />
                <path
                    d="M1 14V5h14v9a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2m11.354-6.354a.5.5 0 0 0-.708 0L7.5 11.793 5.854 10.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l4-4a.5.5 0 0 0 0-.708" />
            </svg>
        </div>

        <!-- Text -->
        <div style="font-size: 14px; justify-content: flex-start">
            <div class="fw-bold" style="color: #666666;">Book online, Pay at the clinic!</div>
            <div style="color: #666666;">Doctor requires reservation!</div>
        </div>
    </div>


</div>
