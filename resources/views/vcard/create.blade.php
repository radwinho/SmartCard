@extends("layouts.app")

@section("content")
  @if($stats == 'create')
    <div class="row">
    <div class="col-lg-12">
      <form method="post" action="/vcard"  class="border shadow p-3 mb-5 bg-body rounded justify-content-center  needs-validation" novalidate enctype="multipart/form-data">
        @csrf

        <div class="row mb-3 ">
          <label for="cardInfo" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="cardInfo" placeholder="Name" aria-required="true" required>
            <div class="valid-feedback">
              Looks good!
            </div>
            <div class="invalid-feedback">
              Name is required
            </div>
          </div>
        </div>

        <div class="row mb-3 ">
          <label for="formFile" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
            <input class="form-control" type="file" id="formFile" name="image">
            <div class="valid-feedback">
              Looks good!
            </div>
        </div>

        @error('image')
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <span class="text-danger">{{ $message }}</span>
                </div>
            </div>
        @enderror

          </div>
        
  
        <div class="row mb-3 ">
          <label for="title" class="col-sm-2 col-form-label">Job Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="title" placeholder="Job Title"  maxlength="250" name="title">
            <div class="valid-feedback">
              Looks good!
            </div>
            <div class="invalid-feedback">
              Title is required
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <label for="bithday" class="col-sm-2 col-form-label">Birth Day</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="bithday" placeholder="Bithday" name="birthday" max="3030-12-25">
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <label for="Company Name" class="col-sm-2 col-form-label">Company Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="Company Name" placeholder="Organization Name" name="organization_name">
            <div class="valid-feedback">
              Looks Good
            </div>
            <div class="invalid-feedback">
              Organization Name is required
            </div>
          </div>
        </div>

        <div id="phone">

        </div>

        <div class="row mb-3">
          <div class="col-sm-5">
          <button type="submit" class="btn btn-outline-success" id="add-phone">Add Phone</button>
          <button type="submit" class="btn btn-outline-danger" id="remove-phone">Remove Phone</button>
          </div>
        </div>

        <div id="email">

        </div>

        <div class="row mb-3">
          <div class="col-sm-5">
            <button type="submit" class="btn btn-outline-success" id="add-email">Add Email</button>
            <button type="submit" class="btn btn-outline-danger" id="remove-email">Remove Email</button>
          </div>
        </div>

        <div id="site">

        </div>

        <div class="row mb-3">
          <div class="col-sm-8">
            <button type="submit" class="btn btn-outline-success" id="add-site">Add WebSite</button>
            <button type="submit" class="btn btn-outline-danger" id="remove-site">Remove WebSite</button>
          </div>
        </div>

        <div id="address">

        </div>

        <div class="row mb-3">
          <div class="col-sm-8">
            <button type="submit" class="btn btn-outline-success" id="add-address">Add Address</button>
            <button type="submit" class="btn btn-outline-danger" id="remove-address">Remove Address</button>
          </div>
        </div>

        <div class="row mb-3">
          <label for="tArea" class="col-sm-2 col-form-label">Note</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="tArea" rows="3" maxlength="255" name="note"></textarea>
            <div class="valid-feedback">
              Looks Good
            </div>
            <div class="invalid-feedback">
              Note is required
            </div>           
          </div>
        </div>

        <button type="submit" class="btn btn-outline-warning">Create Card</button>
      </form>
    </div>
  </div>
  @else
  <div class="row">
      <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <div class="alert alert-danger">
        <p class="text-center fw-bold">You have exceed your limit of creating new contact</p>
        <div class="text-center">
          <a href="{{ route('profile')}}" class="btn btn-warning fw-bold">View Profile</a>
        </div>
      </div>
    </div>
    <div class="col-lg-2"></div>
  </div>  
  
  @endif
  @vite(['resources/js/vcard.js'])
  @vite(['resources/js/validate.js'])
@endsection