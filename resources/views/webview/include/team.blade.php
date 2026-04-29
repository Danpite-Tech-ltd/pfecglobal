@php
    $num=App\Models\Team::where('status','Active')->get()->count();
    $team=App\Models\Team::where('status','Active')->get();
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
                    @if(isset($team[0]))
                        <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                            <div class="team-item bg-white text-center rounded p-4 pt-0">
                                <img class="img-fluid rounded-circle p-4" src="{{ asset($team[0]->image) }}" alt="">
                                <h5 class="mb-0">{{ $team[0]->name }}</h5>
                                <small>{{ $team[0]->title }}</small>
                            </div>
                        </div>
                    @endif
                    @if(isset($team[1]))
                        <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                            <div class="team-item bg-white text-center rounded p-4 pt-0">
                                <img class="img-fluid rounded-circle p-4" src="{{ asset($team[1]->image) }}" alt="">
                                <h5 class="mb-0">{{ $team[1]->name }}</h5>
                                <small>{{ $team[1]->title }}</small>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-6 pt-md-4">
                <div class="row g-4">
                    @if(isset($team[2]))
                        <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                            <div class="team-item bg-white text-center rounded p-4 pt-0">
                                <img class="img-fluid rounded-circle p-4" src="{{ asset($team[2]->image) }}" alt="">
                                <h5 class="mb-0">{{ $team[2]->name }}</h5>
                                <small>{{ $team[2]->title }}</small>
                            </div>
                        </div>
                    @endif

                    @if(isset($team[3]))
                        <div class="col-12 wow fadeIn" data-wow-delay="0.7s">
                            <div class="team-item bg-white text-center rounded p-4 pt-0">
                                <img class="img-fluid rounded-circle p-4" src="{{ asset($team[3]->image) }}" alt="">
                                <h5 class="mb-0">{{ $team[3]->name }}</h5>
                                <small>{{ $team[3]->title }}</small>
                            </div>
                        </div>
                    @endif
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
                    @if(isset($team[4]))
                        <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                            <div class="team-item bg-white text-center rounded p-4 pt-0">
                                <img class="img-fluid rounded-circle p-4" src="{{ asset($team[4]->image) }}" alt="">
                                <h5 class="mb-0">{{ $team[4]->name }}</h5>
                                <small>{{ $team[4]->title }}</small>
                            </div>
                        </div>
                    @endif
                    @if(isset($team[5]))
                        <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                            <div class="team-item bg-white text-center rounded p-4 pt-0">
                                <img class="img-fluid rounded-circle p-4" src="{{ asset($team[5]->image) }}" alt="">
                                <h5 class="mb-0">{{ $team[5]->name }}</h5>
                                <small>{{ $team[5]->title }}</small>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-6 pt-md-4">
                <div class="row g-4">
                    @if(isset($team[6]))
                        <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                            <div class="team-item bg-white text-center rounded p-4 pt-0">
                                <img class="img-fluid rounded-circle p-4" src="{{ asset($team[6]->image) }}" alt="">
                                <h5 class="mb-0">{{ $team[6]->name }}</h5>
                                <small>{{ $team[6]->title }}</small>
                            </div>
                        </div>
                    @endif

                    @if(isset($team[7]))
                        <div class="col-12 wow fadeIn" data-wow-delay="0.7s">
                            <div class="team-item bg-white text-center rounded p-4 pt-0">
                                <img class="img-fluid rounded-circle p-4" src="{{ asset($team[7]->image) }}" alt="">
                                <h5 class="mb-0">{{ $team[7]->name }}</h5>
                                <small>{{ $team[7]->title }}</small>
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
                    @if(isset($team[8]))
                        <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                            <div class="team-item bg-white text-center rounded p-4 pt-0">
                                <img class="img-fluid rounded-circle p-4" src="{{ asset($team[8]->image) }}" alt="">
                                <h5 class="mb-0">{{ $team[8]->name }}</h5>
                                <small>{{ $team[8]->title }}</small>
                            </div>
                        </div>
                    @endif
                    @if(isset($team[9]))
                        <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                            <div class="team-item bg-white text-center rounded p-4 pt-0">
                                <img class="img-fluid rounded-circle p-4" src="{{ asset($team[9]->image) }}" alt="">
                                <h5 class="mb-0">{{ $team[9]->name }}</h5>
                                <small>{{ $team[9]->title }}</small>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-6 pt-md-4">
                <div class="row g-4">
                    @if(isset($team[10]))
                        <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                            <div class="team-item bg-white text-center rounded p-4 pt-0">
                                <img class="img-fluid rounded-circle p-4" src="{{ asset($team[10]->image) }}" alt="">
                                <h5 class="mb-0">{{ $team[10]->name }}</h5>
                                <small>{{ $team[10]->title }}</small>
                            </div>
                        </div>
                    @endif

                    @if(isset($team[11]))
                        <div class="col-12 wow fadeIn" data-wow-delay="0.7s">
                            <div class="team-item bg-white text-center rounded p-4 pt-0">
                                <img class="img-fluid rounded-circle p-4" src="{{ asset($team[11]->image) }}" alt="">
                                <h5 class="mb-0">{{ $team[11]->name }}</h5>
                                <small>{{ $team[11]->title }}</small>
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
                    @if(isset($team[12]))
                        <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                            <div class="team-item bg-white text-center rounded p-4 pt-0">
                                <img class="img-fluid rounded-circle p-4" src="{{ asset($team[12]->image) }}" alt="">
                                <h5 class="mb-0">{{ $team[12]->name }}</h5>
                                <small>{{ $team[12]->title }}</small>
                            </div>
                        </div>
                    @endif
                    @if(isset($team[13]))
                        <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                            <div class="team-item bg-white text-center rounded p-4 pt-0">
                                <img class="img-fluid rounded-circle p-4" src="{{ asset($team[13]->image) }}" alt="">
                                <h5 class="mb-0">{{ $team[13]->name }}</h5>
                                <small>{{ $team[13]->title }}</small>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-6 pt-md-4">
                <div class="row g-4">
                    @if(isset($team[14]))
                        <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                            <div class="team-item bg-white text-center rounded p-4 pt-0">
                                <img class="img-fluid rounded-circle p-4" src="{{ asset($team[14]->image) }}" alt="">
                                <h5 class="mb-0">{{ $team[14]->name }}</h5>
                                <small>{{ $team[14]->title }}</small>
                            </div>
                        </div>
                    @endif

                    @if(isset($team[15]))
                        <div class="col-12 wow fadeIn" data-wow-delay="0.7s">
                            <div class="team-item bg-white text-center rounded p-4 pt-0">
                                <img class="img-fluid rounded-circle p-4" src="{{ asset($team[15]->image) }}" alt="">
                                <h5 class="mb-0">{{ $team[15]->name }}</h5>
                                <small>{{ $team[15]->title }}</small>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif
@if ($max>=5)
    <div class="item">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="row g-4">
                    @if(isset($team[16]))
                        <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                            <div class="team-item bg-white text-center rounded p-4 pt-0">
                                <img class="img-fluid rounded-circle p-4" src="{{ asset($team[16]->image) }}" alt="">
                                <h5 class="mb-0">{{ $team[16]->name }}</h5>
                                <small>{{ $team[16]->title }}</small>
                            </div>
                        </div>
                    @endif
                    @if(isset($team[17]))
                        <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                            <div class="team-item bg-white text-center rounded p-4 pt-0">
                                <img class="img-fluid rounded-circle p-4" src="{{ asset($team[17]->image) }}" alt="">
                                <h5 class="mb-0">{{ $team[17]->name }}</h5>
                                <small>{{ $team[17]->title }}</small>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-6 pt-md-4">
                <div class="row g-4">
                    @if(isset($team[18]))
                        <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                            <div class="team-item bg-white text-center rounded p-4 pt-0">
                                <img class="img-fluid rounded-circle p-4" src="{{ asset($team[18]->image) }}" alt="">
                                <h5 class="mb-0">{{ $team[18]->name }}</h5>
                                <small>{{ $team[18]->title }}</small>
                            </div>
                        </div>
                    @endif

                    @if(isset($team[19]))
                        <div class="col-12 wow fadeIn" data-wow-delay="0.7s">
                            <div class="team-item bg-white text-center rounded p-4 pt-0">
                                <img class="img-fluid rounded-circle p-4" src="{{ asset($team[19]->image) }}" alt="">
                                <h5 class="mb-0">{{ $team[19]->name }}</h5>
                                <small>{{ $team[19]->title }}</small>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif
