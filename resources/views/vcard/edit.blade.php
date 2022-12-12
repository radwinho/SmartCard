@extends("layouts.app")

@section("content")
    <div class="row">
    <div class="col-lg-12">
      <form method="post" action="/vcard/{{$vcard->id}}"  class="border shadow p-3 mb-5 bg-body rounded justify-content-center needs-validation" novalidate enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="row mb-3">
          <label for="cardInfo" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="cardInfo" placeholder="Name" value="{{$vcard->name}}" required maxlength="50">
            <div class="valid-feedback">
              Looks good!
            </div>
            <div class="invalid-feedback">
              Name is required
            </div>
          </div>
        </div>

        @if ($vcard->image)
        <div class="row mb-3 ">
          <label for="formFile" class="col-sm-2 col-form-label">Image</label>
          <div class="col-sm-3">
            <img class="img-th" src="{{ asset('/images/vcards/'.$vcard->image) }}" alt="image" >
            <a class="btn btn-danger" href="/image/{{$vcard->id}}/delete">delete</a>
          </div>
            <div class="col-sm-7">
            <input class="form-control" type="file" id="formFile" name="image">
            <span class="text-danger">if you choose image the stored image will be deleted</span>
          </div>
        </div>
        @else
        <div class="row mb-3 ">
          <label for="formFile" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
            <input class="form-control" type="file" id="formFile" name="image">
          </div>
        </div>
        @endif
        
        @error('image')
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                  <span class="text-danger">{{ $message }}</span>
            </div>
            </div>
        @enderror

        <div class="row mb-3 ">
          <label for="title" class="col-sm-2 col-form-label">Job Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="title" placeholder="Job Title" name="title"  maxlength="250" value="{{$vcard->title}}">
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <label for="bithday" class="col-sm-2 col-form-label">Birth Day</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="bithday" placeholder="Bithday" name="birthday" value="{{$vcard->birthday}}" max="3030-12-30">
            <div class="valid-feedback">
              Looks good!
            </div>
            <div class="invalid-feedback">
              Birth Day is required And Must Be A Valid Date 
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <label for="occupation" class="col-sm-2 col-form-label">Organization Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="occupation" placeholder="Organization Name" name="organization_name" value="{{$vcard->Organization_name}}" maxlength="50">
          </div>
        </div>

        <div id="phone">
          @if (count($phones) > 0)
            @for ($i = 0; $i < count($phones); $i++)
            @php $nPhone=$i+1;@endphp
              <div class="row mb-3 my-phone">
                  <label class="col-sm-2 col-form-label">Phone {{$nPhone}}</label>
                  <div class="col-sm-2">
                    <select class="form-select" name="ph_select{{$nPhone}}">
                      <option value="Mobile" {{$phones[$i]['type'] == 'Mobile'  ? 'selected' : ''}}>Mobile</option>
                      <option value="Landline" {{$phones[$i]['type'] == 'Landline'  ? 'selected' : ''}}>Landline</option>
                      <option value="Office" {{$phones[$i]['type'] == 'Office'  ? 'selected' : ''}}>Office</option>
                      <option value="Fax" {{$phones[$i]['type'] == 'Fax'  ? 'selected' : ''}}>Fax</option>
                      <option value="Other" {{$phones[$i]['type'] == 'Other'  ? 'selected' : ''}}>Other</option>
                    </select>
                  </div>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="number" name="phone{{$nPhone}}" value={{$phones[$i]['number']}} required pattern="[0-9\+\(\)]{3,}">                        
                    <div class="valid-feedback">
                      Looks Good
                    </div>
                    <div class="invalid-feedback">
                      Phone is reqired and must be a number
                    </div>
                  </div>
              </div>      
            @endfor
          @endif
        </div>

        <div class="row mb-3">
          <div class="col-sm-5">
          <button type="submit" class="btn btn-outline-success" id="add-phone">Add Phone</button>
          <button type="submit" class="btn btn-outline-danger" id="remove-phone">Remove Phone</button>
          </div>
        </div>

        <div id="email">
          @if (count($emails) > 0)
          @for ($i = 0; $i < count($emails); $i++)
          @php $nEmails=$i+1;@endphp
            <div class="row mb-3 my-email">
                <label class="col-sm-2 col-form-label">Email {{$nEmails}}</label>
                <div class="col-sm-2">
                  <select class="form-select" name="em_select{{$nEmails}}">
                    <option value="Email" {{$emails[$i]['type'] == 'Email'  ? 'selected' : ''}}>Email</option>
                    <option value="Work" {{$emails[$i]['type'] == 'Work'  ? 'selected' : ''}}>Work</option>
                    <option value="Personal" {{$emails[$i]['type'] == 'Personal'  ? 'selected' : ''}}>Personal</option>
                  </select>
                </div>
                <div class="col-sm-8">
                  <input type="text" class="form-control text-lowercase" placeholder="address" name="email{{$nEmails}}" value={{$emails[$i]['address']}} required >                        
                  <div class="valid-feedback">
                    Looks Good
                  </div>
                  <div class="invalid-feedback">
                    Email is required and must be valid email
                  </div>
                </div>
            </div>      
          @endfor
        @endif      
        </div>

        <div class="row mb-3">
          <div class="col-sm-5">
            <button type="submit" class="btn btn-outline-success" id="add-email">Add Email</button>
            <button type="submit" class="btn btn-outline-danger" id="remove-email">Remove Email</button>
          </div>
        </div>

        <div id="site">
          @if (count($websites) > 0)
          @for ($i = 0; $i < count($websites); $i++)
          @php $nSites=$i+1;@endphp
            <div class="row mb-3 my-site">
                <label class="col-sm-2 col-form-label">Website {{$nSites}}</label>
                <div class="col-sm-2">
                  <select class="form-select" name="site_select{{$nSites}}">
                   <option value="Website" {{$websites[$i]['type'] == 'Website'  ? 'selected' : ''}}>Website</option>
                    <option value="Facebook" {{$websites[$i]['type'] == 'Facebook'  ? 'selected' : ''}}>Facebook</option>
                    <option value="Instagram" {{$websites[$i]['type'] == 'Instagram'  ? 'selected' : ''}}>Instagram</option>
                    <option value="Linkedin" {{$websites[$i]['type'] == 'Linkedin'  ? 'selected' : ''}}>Linkedin</option>
                    {{-- <option value="Location" {{$websites[$i]['type'] == 'Location'  ? 'selected' : ''}}>Location</option> --}}
                    <option value="Twitter" {{$websites[$i]['type'] == 'Twitter'  ? 'selected' : ''}}>Twitter</option>
                    <option value="Snapchat" {{$websites[$i]['type'] == 'Snapchat'  ? 'selected' : ''}}>Snapchat</option>
                    <option value="TikTok" {{$websites[$i]['type'] == 'TikTok'  ? 'selected' : ''}}>TikTok</option>
                    <option value="GoogleMaps" {{$websites[$i]['type'] == 'GoogleMaps'  ? 'selected' : ''}}>GoogleMaps</option>
                    <option value="WhatsApp" {{$websites[$i]['type'] == 'WhatsApp'  ? 'selected' : ''}}>What'sApp</option>
                    <option value="Other" {{$websites[$i]['type'] == 'Other'  ? 'selected' : ''}}>Other</option>
                  </select>
                </div>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="Link URL" name="website{{$nSites}}" value={{$websites[$i]['url']}} required>
                  <div class="valid-feedback">
                    Looks Good
                  </div>
                  <div class="invalid-feedback">
                    Website is required
                  </div>
                </div>
            </div>      
          @endfor
        @endif
        </div>

        <div class="row mb-3">
          <div class="col-sm-8">
            <button type="submit" class="btn btn-outline-success" id="add-site">Add WebSite</button>
            <button type="submit" class="btn btn-outline-danger" id="remove-site">Remove WebSite</button>
          </div>
        </div>

        <div id="address">
          @if (count($address) > 0)
          @for ($i = 0; $i < count($address); $i++)
          @php $nAddress=$i+1;@endphp
            <div class="row mb-3 my-address">
                <label class="col-sm-2 col-form-label">Address {{$nAddress}}</label>
                <div class="col-sm-2">
                  <select class="form-select" name="ad_select{{$nAddress}}">
                    <option value="Address" {{$address[$i]['type'] == 'Address'  ? 'selected' : ''}}>Address</option>
                    <option value="Home" {{$address[$i]['type'] == 'Home'  ? 'selected' : ''}}>Home</option>
                    <option value="Work" {{$address[$i]['type'] == 'Work'  ? 'selected' : ''}}>Work</option>
                    <option value="Other" {{$address[$i]['type'] == 'Other'  ? 'selected' : ''}}>Other</option>
                  </select>
                </div>
                <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="Link URL" name="address{{$nAddress}}" value={{$address[$i]['name']}} required>
                  <div class="valid-feedback">
                    Looks Good
                  </div>
                  <div class="invalid-feedback">
                    Address Name is required
                  </div>                         
                </div>
            </div>
            
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Link URL" name="ad-street{{$nAddress}}" value={{$address[$i]['street']}}>
                <div class="valid-feedback">
                  Looks Good
                </div>
                <div class="invalid-feedback">
                  Address street is required
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Link URL" name="ad-apt{{$nAddress}}" value={{$address[$i]['apt']}}> 
                <div class="valid-feedback">
                  Looks Good
                </div>
                <div class="invalid-feedback">
                  Apt Suite,Bldg is required
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label"></label>
              <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Link URL" name="ad-city{{$nAddress}}" value={{$address[$i]['city']}}>
                <div class="valid-feedback">
                  Looks Good
                </div>
                <div class="invalid-feedback">
                  City is required
                </div>
              </div>
              <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Link URL" name="ad-region{{$nAddress}}" value={{$address[$i]['region']}}>
                <div class="valid-feedback">
                  Looks Good
                </div>
                <div class="invalid-feedback">
                  Region is required
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label"></label>
              <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Link URL" name="ad-country{{$nAddress}}" value={{$address[$i]['country']}}>                        
                <div class="valid-feedback">
                  Looks Good
                </div>
                <div class="invalid-feedback">
                  Contry is required
                </div>
              </div>
              <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Link URL" name="ad-postal{{$nAddress}}" value={{$address[$i]['postal']}}>                      
                <div class="valid-feedback">
                  Looks Good
                </div>
                <div class="invalid-feedback">
                 Zip / Postal Code is required
                </div>
              </div>
            </div>


          @endfor
        @endif
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
            <textarea class="form-control" id="tArea" rows="3" maxlength="255" name="note">{{$vcard->note}}</textarea>
            <div class="valid-feedback">
              Looks Good
            </div>
            <div class="invalid-feedback">
              Note is required
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-outline-warning">Update Card</button>
      </form>
    </div>
  </div>
  @vite(['resources/js/editVcard.js'])
  @vite(['resources/js/validate.js'])
@endsection