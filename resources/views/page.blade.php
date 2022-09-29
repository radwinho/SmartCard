@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <section>
                {{-- bg-dark --}}
                <div class="mt-4 p-5 text-white rounded bg-dark border border-warning" >
                    <h2 class="text-center">Create you vcard Now</h2>
                    <div style="text-align: center">
                        <img style="width: 300px;height:300px;" src="{{ asset('images/vcards/main.jpg') }}" alt="" >
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto mt-3">
                        <a href="/vcard/create" class="btn btn-outline-warning fw-bold">Click Here</a>
                      </div>
                  </div>
            </section>                    
        </div>
    </div>
</div>
@endsection
