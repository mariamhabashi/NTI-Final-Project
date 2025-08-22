<div class="card-header bg-primary text-white">
    <h5 class="mb-0 text-center">Booking Information</h5>
</div>
<div class="card-body">

    <h6 class="text-center mb-8">
        <p style="color: #74746F">Book</p>
        <p style="color: #0070CC">Examination</p>
    </h6>

    <hr class="my-2">


    <div class="d-flex justify-content-around text-center py-2">

        {{-- Fees --}}
        <div class="fees">
{{--            <img src="{{ asset('storage/img/vezeeta_logo.jpg') }}" alt="Logo">--}}
{{--            <img src="/public/images/icons/fees_icon.png" alt="Fees" style="height:40px;">--}}
            <img src="{{asset('storage/img/icons/fees_icon.png')}}" alt="Fees" style="height:40px;">

            <div style="height:3px; background-color:red; width:20px; margin:4px auto;"></div>
            <div class="mt-auto" style="color: #808184">
                <span>Fees <strong style="color: #808184">{{$doctor->fee}}</strong></span>
            </div>
        </div>

        {{-- Points --}}
        <div class="points">
            <img src="{{asset('storage/img/icons/points_icon.png')}}" alt="Points" style="height:40px;">
            <div style="height:3px; background-color:orange; width:20px; margin:4px auto;"></div>
            <div class="mt-auto">
                <span>You’ll earn <strong style="color: #30A635">{{$doctor->points}} points</strong></span>
            </div>
        </div>

        {{-- Waiting Time --}}
        <div class="waiting-time">
            <img src="{{asset('storage/img/icons/waiting_time_icon.png')}}" alt="Waiting Time" style="height:40px;">
            <div style="height:3px; background-color:green; width:20px; margin:4px auto;"></div>
            <div class="mt-1" style="color: #6ACF7F">
                <span>Waiting Time : {{$doctor->waiting_time}}</span>
            </div>
        </div>

    </div>

    <hr class="my-2">


    {{-- Discount Banner --}}
    <div class="d-flex align-items-center justify-content-between text-white px-3 py-2 my-3"
        style="background: linear-gradient(to right, #2196f3, #0069d9); border-radius: 10px;height: 32px">

        {{-- Left side: icon + text --}}
        <div class="d-flex align-items-center">
            <img src="https://cdn-react.vezeeta.com/vezeeta-web-reactjs/jenkins-31/images/shamel-logo.webp" alt="S icon" style="width:10px;" class="me-1">
            <span style="font-size: 12px">60 EGP with shamel</span>
        </div>

        {{-- Right side: arrow --}}
        <div>
            <i class="bi bi-chevron-right">&rsaquo;</i> {{-- Bootstrap Icons --}}
        </div>

    </div>
    <hr class="my-2">

    @if($doctor->clinics->count() > 1)
        <!-- Choose a clinic -->
        <div class="justify-between border-b pb-2 mb-2 flex items-center space-x-2">
                {{-- Choose a location section  --}}
                <div class="p-3 d-flex align-items-start" style="vertical-align: middle">
                    <!-- Location icon -->
                    <div class="me-2">
                        <svg style="color: #0070CC" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                            <path
                                d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                        <div style="height:3px; background-color:red; width:10px; margin:4px auto;"></div>
                    </div>

                    <!-- Text  -->
                    <div style="color: #74746F; font-size: 14px; vertical-align: middle;">
                        Choose a clinic
                    </div>
                </div>

            {{-- Clinics Display--}}
            <div class="d-flex align-items-center clinics-bar choose-clinic-section">
                <button class="btn btn-primary me-2" id="scrollLeftBtn">&lt;</button>
                <div class="horizontal-scroll-container flex-grow-1 overflow-auto d-flex flex-nowrap">
                    @foreach($doctor->clinics as $index => $clinicItem)
                        <div class="card flex-shrink-0 me-3 clinic-name
                            {{ isset($clinic) && $clinic->id == $clinicItem->id ? 'selected-clinic' : '' }}"
                             data-name="{{ $clinicItem->clinic_name }}"
                             data-city="{{ $clinicItem->clinic_city }}"
                             data-address="{{ $clinicItem->clinic_address }}"
                             data-clinicId="{{ $clinicItem->id }}" style="width: 50%;">
                            <span>{{ $clinicItem->clinic_name }}</span>
                        </div>

                    @endforeach

                </div>
                <button class="btn btn-primary ms-2" id="scrollRightBtn">&gt;</button>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Get doctorId and currentOffset from the Blade view
                    const doctorId = {{ $doctor->id }};
                    const currentOffset = {{ $offset }};
                    const container = document.querySelector('.horizontal-scroll-container');
                    const scrollLeftBtn = document.getElementById('scrollLeftBtn');
                    const scrollRightBtn = document.getElementById('scrollRightBtn');
                    const itemWidth = container.querySelector('.card').offsetWidth + 16;

                    scrollLeftBtn.addEventListener('click', () => {
                        container.scrollBy({ left: -itemWidth, behavior: 'smooth' });
                    });

                    scrollRightBtn.addEventListener('click', () => {
                        container.scrollBy({ left: itemWidth, behavior: 'smooth' });
                    });


                // Select all elements with the 'clinic-name' class
                    document.querySelectorAll('.clinic-name').forEach(card => {
                        // Add a click event listener to each card
                        card.addEventListener('click', function() {
                            // Remove 'selected' class from all clinic cards
                            document.querySelectorAll('.clinic-name').forEach(c => c.classList.remove('selected-clinic'));

                            // Add 'selected' class to the clicked one
                            this.classList.add('selected-clinic');

                            // Get the clinicId from the data attribute of the clicked card
                            const clinicId = this.dataset.clinicid;

                            // Debug
                            console.log('Redirecting to clinic ID:', clinicId);

                            // Construct the new URL using the correct route structure
                            // const newUrl = `/booking/${doctorId}/${clinicId}/${currentOffset}`;
                            const newUrl = `/booking/${doctorId}/${clinicId}/${currentOffset}`;
                            console.log(newUrl);

                            // Redirect the user to the new URL
                            window.location.href = newUrl;
                        });
                    });
                });
            </script>

            <hr class="my-2">
            <div id="selectedClinic" class="mt-2" style="font-size: 14px; font-weight: bold; color: #333;">
                <div class="p-3 d-flex align-items-start">
                    <!-- Location icon -->
                    <div class="me-2">
                        <svg style="color: #0070CC" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                            <path
                                d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                        <div style="height:3px; background-color:red; width:10px; margin:4px auto;"></div>
                    </div>

                    <!-- Text content -->
                    <div class="clinic-info">
                        <div class="clinic-location" id="clinicLocation">
                            {{$clinic->clinic_city}} : {{$clinic->clinic_address}}
{{--                                        Selected clinic: {{ $clinic->id }} → {{ $clinic->clinic_city }} : {{ $clinic->clinic_address }}--}}
                        </div>
                        <div class="book-now">
                            Book now to receive the clinic’s address details and phone number
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif($doctor->clinics->count() == 1)
        <div id="selectedClinic" class="mt-2" style="font-size: 14px; font-weight: bold; color: #333;">
            <div class="p-1 d-flex align-items-start">
                <!-- Location icon -->
                <div class="me-2">
                    <svg style="color: #0070CC" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                        <path
                            d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                    </svg>
                    <div style="height:3px; background-color:red; width:10px; margin:4px auto;"></div>
                </div>

                <!-- Text content -->
                <div class="clinic-info">
                    <div class="clinic-location" id="clinicLocation">
                        {{$doctor->clinics->first()->clinic_city}} :
                        {{$doctor->clinics->first()->clinic_address}}
                    </div>
                    <div class="book-now">
                        Book now to receive the clinic’s address details and phone number
                    </div>
                </div>
            </div>
        </div>

    @endif



    <hr class="my-2">

</div>
