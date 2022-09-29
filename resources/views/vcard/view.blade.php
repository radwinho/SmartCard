@extends("layouts.app")
@section("content")
<div class="row">
        {{-- {{ auth()->user()->color == 'red' ?'bg-danger': (auth()->user()->color == 'blue' ? 'bg-primary':(auth()->user()->color == 'gray' ? 'bg-secondary':'bg-success'))}} --}}
        <div class="col-md-12">
            <div class="card mx-auto text-{{$text}} bg-{{$color}} my-card"> 
                @if ($vcard->image)
                    <img src="{{asset('images/vcards/'.$vcard->image)}}" class="card-img-top" alt="image">
                @else
                    <img src="{{asset('images/vcards/no-image.png')}}" class="card-img-top" alt="vcard img">
                @endif
                <div class="card-body">
                    <div class="text-{{$text}} text-center mb-2">
                        <span class="fw-bold d-block fs-5">{{$vcard->name}}</span>
                        @if ($vcard->title)
                        <span class="d-block">{{$vcard->title}}</span>
                        @endif
                    </div>
                    {{-- color  #dcdcdc" --}}
                    <div class="rounded-pill text-center mb-3 py-2 w-75 mx-auto bg-{{$text}}">
                        <a href="{{route('download', ['link'=>$vcard->link])}}" class="link-{{$color}}"> <i class="bi bi-person-square pe-1"></i>SaveContact</a>
                    </div>

                    {{-- social Links --}}
                    @if($websites)
                    <div class="d-flex flex-row  flex-wrap justify-content-around bd-highlight mb-3">
                        @foreach ($websites as $website)
                                @if ($website['type'] == 'Facebook')
                                <div class="p-2 col-3 text-center bd-highlight">
                                    <a href="{{$website['url']}}"  target="_blank" class="card-link link-{{$text}} fs-1 d-inline-block social-links"><i class="bi bi-facebook"></i></a>
                                </div>
                                    @elseif($website['type'] == 'Instagram' )    
                                    <div class="p-2 col-3 text-center bd-highlight">
                                        <a href="{{$website['url']}}"  target="_blank" class="card-link link-{{$text}} fs-1 d-inline-block social-links"><i class="bi bi-instagram"></i></a>
                                    </div>
                                    @elseif($website['type'] == 'Linkedin' )    
                                    <div class="p-2 col-3 text-center bd-highlight">
                                        <a href="{{$website['url']}}"  target="_blank" class="card-link link-{{$text}} fs-1 d-inline-block social-links"><i class="bi bi-linkedin"></i></a>
                                    </div>
                                    @elseif($website['type'] == 'Twitter' )    
                                    <div class="p-2 col-3 text-center bd-highlight">
                                        <a href="{{$website['url']}}"  target="_blank" class="card-link link-{{$text}} fs-1 d-inline-block social-links"><i class="bi bi-twitter"></i></a>
                                    </div>
                                    @elseif($website['type'] == 'Snapchat' )    
                                    <div class="p-2 col-3 text-center bd-highlight">
                                        <a href="{{$website['url']}}"  target="_blank" class="card-link link-{{$text}} fs-1 d-inline-block social-links"><i class="bi bi-snapchat"></i></a>
                                    </div>
                                    @elseif($website['type'] == 'TikTok' )    
                                    <div class="p-2 col-3 text-center bd-highlight">
                                        <a href="{{$website['url']}}"  target="_blank" class="card-link link-{{$text}} fs-1 d-inline-block social-links"><i class="bi bi-tiktok"></i></a>
                                    </div>
                                    @elseif($website['type'] == 'GoogleMaps' )    
                                    <div class="p-2 col-3 text-center bd-highlight">
                                        <a href="{{$website['url']}}"  target="_blank" class="card-link link-{{$text}} fs-1 d-inline-block social-links"><i class="bi bi-geo-alt"></i></a>
                                    </div>
                                    @elseif($website['type'] == 'WhatsApp' )    
                                    <div class="p-2 col-3 text-center bd-highlight">
                                        <a href="{{$website['url']}}"  target="_blank" class="card-link link-{{$text}} fs-1 d-inline-block social-links"><i class="bi bi-whatsapp"></i></a>
                                    </div>
                                    @endif
                            @endforeach
                            <div class="p-2 col-3 text-center bd-highlight">
                                <a href="#" class="card-link link-{{$text}} fs-1 d-inline-block social-links" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-qr-code"></i></a>
                            </div>
                    </div>
                    @else 
                        <div class="p-2text-center bd-highlight">
                            <a href="#" class="card-link link-{{$text}} fs-1 d-inline-block social-links" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-qr-code"></i></a>
                        </div>
                    @endif

                    @if ($vcard->Organization_name)
                        <div class="fw-bold fs-4"><i class="bi bi-building"></i> {{$vcard->Organization_name}}</div>
                    @endif
                   
                    @if ($vcard->birthday)                    
                        <div class="mb-3 fw-bold fs-6"><i class="bi bi-calendar2-day"></i> {{$vcard->birthday}}</div>
                    @endif


                    @if($phones)
                    <div id="phone" class="mb-3">
                        <span class="fw-bold"> <i class="bi bi-telephone"></i> Phones</span>
                        @foreach ($phones as $phone)
                            <div>
                                {{ $phone['type'] }} <a href="tel:{{ $phone['number'] }}" class="link-{{$text}}">{{ $phone['number'] }}</a>
                            </div>
                        @endforeach
                    </div>
                    @endif

                    @if($emails)
                        <div id="email" class="mb-3">
                            <span class="fw-bold"><i class="bi bi-envelope"></i> Emails</span>
                            @foreach ($emails as $email)
                                <div>
                                    {{$email['type']}} <a class="link-{{$text}}" href="mailto:{{$email['address']}}">{{$email['address']}}</a>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if($websites)                        
                            @if ($state)
                                <div id="site" class="mb-3">
                                    <span class="fw-bold"><i class="bi bi-globe"></i> Websites</span>
                                    @foreach ($websites as $website)
                                        @if ($website['type'] == 'Website' || $website['type'] == "Other")
                                        <div>
                                            {{$website['type']}} <a class="link-{{$text}}" href="{{$website['url']}}" target="_blank">{{$website['url']}}</a>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
             
                    @endif

                    @if($address)
                        <div id="address" class="mb-3">
                            <span class="fw-bold"><i class="bi bi-geo-alt"></i> Address</span>
                            @foreach ($address as $one_address)
                                <div class="mb-4">
                                    
                                    @if ($one_address['name'])
                                        <div>
                                            {{$one_address['type']}} {{$one_address['name']}}
                                        </div>
                                    @endif
                                    
                                    @if ($one_address['street'])    
                                        <div>
                                            {{$one_address['street']}}
                                        </div>
                                    @endif

                                    @if ($one_address['apt'])    
                                    <div>
                                        {{$one_address['apt']}}
                                    </div>
                                    @endif
                                    
                                    @if ($one_address['city'] || $one_address['region'])    
                                        <div>
                                            {{$one_address['city']}} {{$one_address['region']}}
                                        </div>
                                    @endif
                                     
                                    @if ($one_address['country'] || $one_address['postal'])
                                        <div>
                                            {{$one_address['country']}} {{$one_address['postal']}}
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if($vcard->map)
                        <span class="fw-bold"><i class="bi bi-pin-map-fill"></i> Map</span>
                        <div class="mb-3">
                            <a class="link-{{$text}}" href="{{$vcard->map}}" target="_blank">{{$vcard->map}}</a>
                        </div>
                    @endif
                    
                    {{-- qrcode model  --}}
                    <div class="modal fade text-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">{{$vcard->name}}</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <img src="{{ asset('/qrcode/'.$vcard->qr_name) }}" alt="qrcode">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ asset('/qrcode/'.$vcard->qr_name) }}" download class="btn btn-{{$color == 'light'? 'dark': $color}}">Download</a>
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      {{-- qrcode end --}}
                </div>
            </div>
        </div>
        
        {{-- <a title="download" class="float-end" href="{{ route('download', ['link'=>$vcard->link]) }}"><img src="{{ asset('/images/icons/file_download2.svg') }}" alt="download"></a>         --}}
</div>
@endsection
