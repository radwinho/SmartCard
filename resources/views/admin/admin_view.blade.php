@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-sm-8 mx-auto">
            <section>
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('status')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('activate'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>{{session('activate')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="border rounded p-3 shadow p-3 mb-5 bg-body ">
                    <!-- <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">search</span>
                    </div> -->
                    <div class="row">
                        <div class="col-lg-10 col-sm-10">
                            <input type="text" class="form-control" placeholder="search" id="search">
                        </div>
                        <div class="col-lg-2 col-sm-2">
                            <div class="dropdown">
                                <button type="button" class="badge rounded-pill btn btn-warning position-relative dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="material-symbols-rounded">
                                    <img src="{{asset('images/icons/bell.svg')}}" alt="notifications">
                                </span>
                                @if($count > 0)
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{$count}}
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                                @endif
                                </button>
                                @if(count($notifications) > 0)
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        @foreach($notifications as $notification)
                                            <li><span class="dropdown-item">{{$notification}} has Sign Up</span></li>
                                        @endforeach    
                                        <li><a class="dropdown-item" href="{{route('clear')}}">Clear</a></li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Copy</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < count($vcards); $i++)
                                <tr class="search">
                                    <td class="name">
                                        <a href="/vcard/{{$vcards[$i]['id']}}" class="link-dark">{{$vcards[$i]['name']}}</a>
                                    </td>
                                    <td class="email">
                                        {{$emails[$i]}}
                                    </td>
                                    <td>
                                        <div class="col-7">
                                            <input id="v{{$i}}" class="form-control" readonly value="https://anasmartcard.net/download/{{$vcards[$i]['link']}}">
                                        </div>
                                    </td>
                                    <td>
                                        <button class="copy btn btn-warning" title="Copy" data-clipboard-target="#v{{$i}}">
                                            <img src="{{ asset('/images/icons/content_copy.svg') }}" alt="Copy to clipboard">
                                        </button>
                                    </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>    
                    </div>
                    
                </div>   
            </section>                    
        </div>
    </div>

  @vite(['resources/js/dashboard.js'])
  <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.10/clipboard.min.js"></script>

    <script>
        var btns = document.querySelectorAll('.copy');
        var clipboard = new ClipboardJS(btns);
  
        clipboard.on('success', function (e) {
          console.info('Action:', e.action);
          console.info('Text:', e.text);
          console.info('Trigger:', e.trigger);
        });
  
        clipboard.on('error', function (e) {
          console.info('Action:', e.action);
          console.info('Text:', e.text);
          console.info('Trigger:', e.trigger);
        });
      </script>
@endsection