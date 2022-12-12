@extends('layouts.app')

{{-- global download_counter --}}
@php
$owners = \App\Models\vcard::get('download_counter');
$cn=0;
foreach ($owners as $owner) {
    $cn+=$owner->download_counter;
}  
@endphp
{{-- user download_counter --}}
@php
$vcards =Auth::user()->vcards;
$userCounter=0;

foreach ($vcards as $vcard) {
    $userCounter+=$vcard->download_counter;
}  
@endphp

@section('content')
    <div class="row">
        @if (Auth::user()->is_active)
        <div class="col-md-12 col-sm-12" >
            <section>
                 <div class="border rounded p-3 shadow p-3 mb-5 bg-body">
                    <div class="row">

                        <div class="col-md-4 me-auto mb-3">
                            <input type="text" class="form-control" placeholder="search" id="search">
                        </div>
                        <div class="ms-auto col-md-6">
                            <p class="fw-bold fs-5 text-md-end">
                                Together We save {{$cn}} Papper
                            </p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <a href="/vcard/create" class="btn btn-warning fw-bold d-inline-block">+ New Account</a>
                        <a href="#" class="btn {{(auth()->user()->color == 'dark')? 'btn-light link-dark' : 'btn-dark'}} border fw-bold d-inline-block ms-sm-2" data-bs-toggle="modal" data-bs-target="#changeTheme">Change Theme <span class=" d-inline-block ms-1 badge bg-{{auth()->user()->color}} text-{{auth()->user()->color}}">4</span></a>
                    </div>
                    <div class="ms-auto col-md-12">
                        <p class="fw-bold fs-5 text-md-end">
                            Total User Counter {{$userCounter}}
                        </p>
                    </div>

                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead class="table-light ">
                                <tr>
                                <th scope="col">Photo</th>
                                <th scope="col">Name</th>
                                <th scope="col">View</th>
                                <th scope="col">Update</th>
                                <th scope="col">QrCode</th>
                                <th scope="col">Tap Counter</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vcards as $vcard)
                                    <tr class="search">
                                        <td>
                                            @if ($vcard->image)
                                                <img src="{{asset('images/vcards/'.$vcard->image)}}" class="img-thumbnail rounded img-th" alt="vcard img">
                                            @else
                                                <img src="{{asset('images/vcards/no-image.png')}}" class="img-thumbnail rounded img-th" alt="vcard img">
                                            @endif
                                        </td>
                                        <td class="fw-bold name">{{$vcard->name}}</td>
                                        <td><a href="/vcard/{{$vcard->id}}" class="btn p-0"><img style="width: 50px;height: 50px;" src="{{ asset('images/icons/Asset2.png') }}"></a></td>
                                        <td><a href="/vcard/{{$vcard->id}}/edit" class="btn p-0"><img style="width: 50px;height: 50px;" src="{{ asset('images/icons/Asset3.png') }}"></a></td>
                                        <td><a href="{{ asset('/qrcode/'.$vcard->qr_name) }}" download class="btn p-0"><img style="width: 50px;height: 50px;" src="{{ asset('images/icons/Asset4.png') }}"></a></td>
                                        <td style=" vertical-align: middle ;"><span class="badge rounded-pill text-dark fs-4">{{$vcard->download_counter}}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>                    
        </div>

        <!-- changeTheme -->
            <div class="modal fade" id="changeTheme" tabindex="-1" aria-labelledby="changeThemeLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="changeThemeLabel">ChangeTheme</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="badge bg-light text-dark p-2">
                            <a href="{{ route('user.changeTheme', ['color'=>'light','text'=>'dark']) }}" class="link-dark">White</a>
                        </span>
                        <span class="badge bg-dark p-2">
                            <a href="{{ route('user.changeTheme', ['color'=>'dark','text'=>'light']) }}" class="link-light">Black</a>
                        </span>
                        <span class="badge bg-secondary p-2">
                            <a href="{{ route('user.changeTheme', ['color'=>'secondary','text'=>'light']) }}" class="link-light">Gray</a>
                        </span>
                        <span class="badge bg-success p-2">
                            <a href="{{ route('user.changeTheme', ['color'=>'success','text'=>'light']) }}" class="link-light">Green</a>
                        </span>
                        <span class="badge bg-danger p-2">
                            <a href="{{ route('user.changeTheme', ['color'=>'danger','text'=>'light']) }}" class="link-light">Red</a>
                        </span>
                        <span class="badge bg-warning text-dark p-2">
                            <a href="{{ route('user.changeTheme', ['color'=>'warning','text'=>'dark']) }}" class="link-dark">Yellow</a>    
                        </span>
                        <span class="badge bg-info text-dark p-2">
                            <a href="{{ route('user.changeTheme', ['color'=>'info','text'=>'dark']) }}" class="link-dark">Light Blue</a>
                        </span>
                        <span class="badge bg-primary p-2">
                            <a href="{{ route('user.changeTheme', ['color'=>'primary','text'=>'light']) }}" class="link-light">Blue</a>
                        </span>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>
                @else
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="alert alert-danger">
                        <p class="text-center">Your Account are not activated</p>
                        <p class="text-center">Contact us to activate  +973 34000654 , ana@anasmartcard.com</p>
                    </div>
                </div>
                <div class="col-lg-2"></div>
                
                @endif
    </div>
    @vite(['resources/js/profile.js'])
@endsection
