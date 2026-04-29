@php
    $num=App\Models\Service::where('status','Active')->get()->count();
    $service=App\Models\Service::where('status','Active')->get();
    $x=$num/4;
    if($x>intval($x)){
        $max=intval($x)+1;
    }else{
        $max=$x;
    }
@endphp

@if ($max>=1)
    <div class="item">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="row g-4">
                    <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                        <div class="text-center rounded service-item d-flex flex-column justify-content-center">
                            <div class="service-icon btn-square">
                                <img src="{{ asset($service[0]->service_image) }}" alt="" id="serviceicon">
                            </div>
                            <h5 class="mb-3">{{ $service[0]->service_title }}</h5>
                            <p>{{ $service[0]->service_text }}</p>
                            <a class="px-3 mx-auto mt-auto btn" href="{{ $service[0]->link }}">Read More</a>
                        </div>
                    </div>
                    <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                        <div class="text-center rounded service-item d-flex flex-column justify-content-center">
                            <div class="service-icon btn-square">
                                    <img src="{{ asset($service[1]->service_image) }}" alt="" id="serviceicon">
                                </div>
                                <h5 class="mb-3">{{ $service[1]->service_title }}</h5>
                                <p> {{ $service[1]->service_text }}</p>
                                <a class="px-3 mx-auto mt-auto btn" href="{{ $service[1]->link }}">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pt-md-4">
                <div class="row g-4">
                    <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                        <div class="text-center rounded service-item d-flex flex-column justify-content-center">
                            <div class="service-icon btn-square">
                                <img src="{{ asset($service[2]->service_image) }}" alt="" id="serviceicon">
                            </div>
                            <h5 class="mb-3">{{ $service[2]->service_title }}</h5>
                            <p>{{ $service[2]->service_text }}</p>
                            <a class="px-3 mx-auto mt-auto btn" href="{{ $service[2]->link }}">Read More</a>
                        </div>
                    </div>
                    <div class="col-12 wow fadeIn" data-wow-delay="0.7s">
                        <div class="text-center rounded service-item d-flex flex-column justify-content-center">
                            <div class="service-icon btn-square">
                                <img src="{{ asset($service[3]->service_image) }}" alt="" id="serviceicon">
                            </div>
                            <h5 class="mb-3">{{ $service[3]->service_title }}</h5>
                            <p>{{ $service[3]->service_text }}</p>
                            <a class="px-3 mx-auto mt-auto btn" href="{{ $service[3]->link }}">Read More</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endif

@if ($max>=2)
    <div class="item">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="row g-4">
                    @if(isset($service[4]))
                        <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                            <div class="text-center rounded service-item d-flex flex-column justify-content-center">
                                <div class="service-icon btn-square">
                                    <img src="{{ asset($service[4]->service_image) }}" alt="" id="serviceicon">
                                </div>
                                <h5 class="mb-3">{{ $service[4]->service_title }}</h5>
                                <p> {{ $service[4]->service_text }}</p>
                                <a class="px-3 mx-auto mt-auto btn" href="{{ $service[4]->link }}">Read More</a>
                            </div>
                        </div>
                    @endif
                    @if(isset($service[5]))
                        <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                            <div class="text-center rounded service-item d-flex flex-column justify-content-center">
                                <div class="service-icon btn-square">
                                        <img src="{{ asset($service[5]->service_image) }}" alt="" id="serviceicon">
                                    </div>
                                    <h5 class="mb-3">{{ $service[5]->service_title }}</h5>
                                    <p> {{ $service[5]->service_text }}</p>
                                    <a class="px-3 mx-auto mt-auto btn" href="{{ $service[5]->link }}">Read More</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-6 pt-md-4">
                <div class="row g-4">
                    @if(isset($service[6]))
                        <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                            <div class="text-center rounded service-item d-flex flex-column justify-content-center">
                                <div class="service-icon btn-square">
                                    <img src="{{ asset($service[6]->service_image) }}" alt="" id="serviceicon">
                                </div>
                                <h5 class="mb-3">{{$service[6]->service_title}}</h5>
                                <p>{{$service[6]->service_text}}</p>
                                <a class="px-3 mx-auto mt-auto btn" href="{{ $service[6]->link }}">Read More</a>
                            </div>
                        </div>
                    @endif
                    @if(isset($service[7]))
                        <div class="col-12 wow fadeIn" data-wow-delay="0.7s">
                            <div class="text-center rounded service-item d-flex flex-column justify-content-center">
                                <div class="service-icon btn-square">
                                    <img src="{{ asset($service[7]->service_image) }}" alt="" id="serviceicon">
                                </div>
                                <h5 class="mb-3">{{ $service[7]->service_title }}</h5>
                                <p>{{ $service[7]->service_title }}</p>
                                <a class="px-3 mx-auto mt-auto btn" href="{{ $service[7]->link }}">Read More</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endif
@if ($max>=3)
    <div class="item">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="row g-4">
                    @if(isset($service[8]))
                    <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                        <div class="text-center rounded service-item d-flex flex-column justify-content-center">
                            <div class="service-icon btn-square">
                                <img src="{{ asset($service[8]->service_image ) }}" alt="" id="serviceicon">
                            </div>
                            <h5 class="mb-3">{{ $service[8]->service_title }}</h5>
                            <p>{{ $service[8]->service_title }}</p>
                            <a class="px-3 mx-auto mt-auto btn" href="{{ $service[8]->link }}">Read More</a>
                        </div>
                    </div>
                    @endif
                    @if(isset($service[9]))
                    <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                        <div class="text-center rounded service-item d-flex flex-column justify-content-center">
                            <div class="service-icon btn-square">
                                    <img src="{{ asset($service[9]->service_image) }}" alt="" id="serviceicon">
                                </div>
                                <h5 class="mb-3">{{ $service[9]->service_title }}</h5>
                                <p> {{ $service[9]->service_text }}</p>
                                <a class="px-3 mx-auto mt-auto btn" href="{{ $service[9]->link }}">Read More</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-md-6 pt-md-4">
                <div class="row g-4">
                    @if(isset($service[10]))
                    <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                        <div class="text-center rounded service-item d-flex flex-column justify-content-center">
                            <div class="service-icon btn-square">
                                <img src="{{ asset($service[10]->service_title) }}" alt="" id="serviceicon">
                            </div>
                            <h5 class="mb-3">{{$service[10]->service_title}}</h5>
                            <p>{{$service[10]->service_text}}</p>
                            <a class="px-3 mx-auto mt-auto btn" href="{{ $service[10]->link }}">Read More</a>
                        </div>
                    </div>
                    @endif
                    @if(isset($service[11]))
                    <div class="col-12 wow fadeIn" data-wow-delay="0.7s">
                        <div class="text-center rounded service-item d-flex flex-column justify-content-center">
                            <div class="service-icon btn-square">
                                <img src="{{ asset($service[11]->service_title) }}" alt="" id="serviceicon">
                            </div>
                            <h5 class="mb-3">{{ $service[11]->service_title }}</h5>
                            <p>{{ $service[11]->service_title }}</p>
                            <a class="px-3 mx-auto mt-auto btn" href="{{ $service[11]->link }}">Read More</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endif
@if ($max>=4)
    <div class="item">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="row g-4">
                    @if(isset($service[12]))
                    <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                        <div class="text-center rounded service-item d-flex flex-column justify-content-center">
                            <div class="service-icon btn-square">
                                <img src="{{ asset($service[12]->service_image ) }}" alt="" id="serviceicon">
                            </div>
                            <h5 class="mb-3">{{ $service[12]->service_title }}</h5>
                            <p>{{ $service[12]->service_title }}</p>
                            <a class="px-3 mx-auto mt-auto btn" href="{{ $service[12]->link }}">Read More</a>
                        </div>
                    </div>
                    @endif
                    @if(isset($service[13]))
                    <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                        <div class="text-center rounded service-item d-flex flex-column justify-content-center">
                            <div class="service-icon btn-square">
                                    <img src="{{ asset($service[13]->service_image) }}" alt="" id="serviceicon">
                                </div>
                                <h5 class="mb-3">{{ $service[13]->service_title }}</h5>
                                <p> {{ $service[13]->service_text }}</p>
                                <a class="px-3 mx-auto mt-auto btn" href="{{ $service[13]->link }}">Read More</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-md-6 pt-md-4">
                <div class="row g-4">
                    @if(isset($service[14]))
                    <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                        <div class="text-center rounded service-item d-flex flex-column justify-content-center">
                            <div class="service-icon btn-square">
                                <img src="{{ asset($service[14]->service_title) }}" alt="" id="serviceicon">
                            </div>
                            <h5 class="mb-3">{{$service[14]->service_title}}</h5>
                            <p>{{$service[14]->service_text}}</p>
                            <a class="px-3 mx-auto mt-auto btn" href="{{ $service[14]->link }}">Read More</a>
                        </div>
                    </div>
                    @endif
                    @if(isset($service[15]))
                    <div class="col-12 wow fadeIn" data-wow-delay="0.7s">
                        <div class="text-center rounded service-item d-flex flex-column justify-content-center">
                            <div class="service-icon btn-square">
                                <img src="{{ asset($service[15]->service_title) }}" alt="" id="serviceicon">
                            </div>
                            <h5 class="mb-3">{{ $service[15]->service_title }}</h5>
                            <p>{{ $service[15]->service_title }}</p>
                            <a class="px-3 mx-auto mt-auto btn" href="{{ $service[15]->link }}">Read More</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endif
