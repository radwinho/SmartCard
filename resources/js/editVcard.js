// create new phone
const addNumber = document.querySelector('#add-phone');
const removeNumber = document.querySelector('#remove-phone');
const mydiv = document.querySelector('#phone');
const n1 = mydiv.querySelectorAll('.my-phone').length;
let nphone = n1;

addNumber.addEventListener('click',function(e){
    e.preventDefault();
    nphone+=1;

    const div = document.createElement('div');
    div.classList.add('row','mb-3');
    const label = document.createElement('label');

    label.classList.add('col-sm-2', 'col-form-label');
    label.textContent = 'Phone '+nphone;

    const div2= document.createElement('div');
    div2.classList.add('col-sm-2');

    const select= document.createElement('select');
    select.classList.add('form-select');
    select.name ='ph_select'+nphone;

    const option1 = document.createElement("option");
    option1.text = "Mobile";
    option1.value = "Mobile";
    select.add(option1);
    
    const option2 = document.createElement("option");
    option2.text = "Landline";
    option2.value = "Landline";
    select.add(option2);

    const option3 = document.createElement("option");
    option3.text = "Office";
    option3.value = "Office";
    select.add(option3);

    const option4 = document.createElement("option");
    option4.text = "Fax";
    option4.value = "Fax";
    select.add(option4);

    const option7 = document.createElement("option");
    option7.text = "Other";
    option7.value = "Other";
    select.add(option7);

    const div3 = document.createElement('div');
    div3.classList.add('col-sm-8');

    const input = document.createElement('input');
    input.type ='text';
    input.setAttribute('required', '');
    input.setAttribute('pattern', '[0-9\+\(\)]{5,}');
    input.classList.add('form-control');
    input.placeholder='Number';
    input.name='phone'+nphone;

    mydiv.appendChild(div);
    div.appendChild(label);
    div.appendChild(div2);
    div2.appendChild(select);
    div.appendChild(div3);
    div3.appendChild(input);

    const phoneValidDiv = document.createElement('div');
    phoneValidDiv.classList.add('valid-feedback');
    phoneValidDiv.textContent = 'Looks Good';
    const phoneInvalidDiv = document.createElement('div');
    phoneInvalidDiv.classList.add('invalid-feedback');
    phoneInvalidDiv.textContent = 'Phone is reqired and must be a number';

    div3.appendChild(phoneValidDiv);
    div3.appendChild(phoneInvalidDiv);
})

removeNumber.addEventListener('click',function(e){
    e.preventDefault();
    if(mydiv.childElementCount > 0)
    {
        if(mydiv.lastChild.classList == 'row mb-3') 
        {
            mydiv.removeChild(mydiv.lastChild);
            nphone-=1;
        }else{
            for (let i = 0; i < 2; i++) {
                mydiv.removeChild(mydiv.lastChild);
            }
            nphone-=1;
        }
    }
    
})

// create new email

const addEmail = document.querySelector('#add-email');
const removeEmail = document.querySelector('#remove-email');
const myEmail = document.querySelector('#email');
const n2 = myEmail.querySelectorAll('.my-email').length;
let nEmail = n2;

addEmail.addEventListener('click',function(e){
    e.preventDefault();
    nEmail+=1;

    const div = document.createElement('div');
    div.classList.add('row','mb-3');
    const label = document.createElement('label');

    label.classList.add('col-sm-2', 'col-form-label');
    label.textContent = 'Email '+nEmail;

    const div2= document.createElement('div');
    div2.classList.add('col-sm-2');

    const select= document.createElement('select');
    select.classList.add('form-select');
    select.name ='em_select'+nEmail;

    const option1 = document.createElement("option");
    option1.text = "Email";
    option1.value = "Email";
    select.add(option1);
    
    const option4 = document.createElement("option");
    option4.text = "Work";
    option4.value = "Work";
    select.add(option4);
    
    const option3 = document.createElement("option");
    option3.text = "Personal";
    option3.value = "Personal";
    select.add(option3);

    const div3 = document.createElement('div');
    div3.classList.add('col-sm-8');

    const input = document.createElement('input');
    input.type ='text';
    input.setAttribute('required', '');
    input.classList.add('form-control','text-lowercase');
    input.placeholder='Address';
    input.name='email'+nEmail;

    myEmail.appendChild(div);
    div.appendChild(label);
    div.appendChild(div2);
    div2.appendChild(select);
    div.appendChild(div3);
    div3.appendChild(input);

    const emailValidDiv = document.createElement('div');
    emailValidDiv.classList.add('valid-feedback');
    emailValidDiv.textContent = 'Looks Good';
    const emailInvalidDiv = document.createElement('div');
    emailInvalidDiv.classList.add('invalid-feedback');
    emailInvalidDiv.textContent = 'Email is required and must be valid email';

    div3.appendChild(emailValidDiv);
    div3.appendChild(emailInvalidDiv);
})

removeEmail.addEventListener('click',function(e){
    e.preventDefault();
    if(myEmail.childElementCount > 0)
    {
        if(myEmail.lastChild.classList == 'row mb-3') 
        {
            myEmail.removeChild(myEmail.lastChild);
            nEmail-=1;
        }else{
            for (let i = 0; i < 2; i++) {
                myEmail.removeChild(myEmail.lastChild);
            }
            nEmail-=1;
        }
    }
    
})

// create new website

const addSite = document.querySelector('#add-site');
const removeSite = document.querySelector('#remove-site');
const mySite = document.querySelector('#site');
const n3 = mySite.querySelectorAll('.my-site').length;
let nSite =n3;

addSite.addEventListener('click',function(e){
    e.preventDefault();
    nSite+=1;

    const div = document.createElement('div');
    div.classList.add('row','mb-3');
    
    const label = document.createElement('label');
    label.classList.add('col-sm-2', 'col-form-label');
    label.textContent = 'Website '+nSite;

    const div2= document.createElement('div');
    div2.classList.add('col-sm-2');

    const select= document.createElement('select');
    select.classList.add('form-select');
    select.name ='site_select'+nSite;

    const option1 = document.createElement("option");
    option1.text = "Website";
    option1.value = "Website";
    select.add(option1);
    
    const option3 = document.createElement("option");
    option3.text = "Facebook";
    option3.value = "Facebook";
    select.add(option3);

    const option4 = document.createElement("option");
    option4.text = "Instagram";
    option4.value = "Instagram";
    select.add(option4);
    
    const option5 = document.createElement("option");
    option5.text = "Linkedin";
    option5.value = "Linkedin";
    select.add(option5);
    
    const option8 = document.createElement("option");
    option8.text = "Twitter";
    option8.value = "Twitter";
    select.add(option8);

    const option9 = document.createElement("option");
    option9.text = "Snapchat";
    option9.value = "Snapchat";
    select.add(option9);

    const option11 = document.createElement("option");
    option11.text = "TikTok";
    option11.value = "TikTok";
    select.add(option11);

    const option12 = document.createElement("option");
    option12.text = "Google Maps";
    option12.value = "GoogleMaps";
    select.add(option12);

    const option13 = document.createElement("option");
    option13.text = "What'sApp";
    option13.value = "WhatsApp";
    select.add(option13);

    const option10 = document.createElement("option");
    option10.text = "Other";
    option10.value = "Other";
    select.add(option10);

    const div3 = document.createElement('div');
    div3.classList.add('col-sm-8');

    const input = document.createElement('input');
    input.type ='text';
    input.type ='text';
    input.setAttribute('required', '');
    input.classList.add('form-control');
    input.placeholder='Link URL';
    input.name='website'+nSite;

    mySite.appendChild(div);
    div.appendChild(label);
    div.appendChild(div2);
    div2.appendChild(select);
    div.appendChild(div3);
    div3.appendChild(input);

    const siteValidDiv = document.createElement('div');
    siteValidDiv.classList.add('valid-feedback');
    siteValidDiv.textContent = 'Looks Good';
    const siteInvalidDiv = document.createElement('div');
    siteInvalidDiv.classList.add('invalid-feedback');
    siteInvalidDiv.textContent = 'Website is reqired';

    div3.appendChild(siteValidDiv);
    div3.appendChild(siteInvalidDiv);
})

removeSite.addEventListener('click',function(e){
    e.preventDefault();
    if(mySite.childElementCount > 0)
    {
        if(mySite.lastChild.classList == 'row mb-3') 
        {
            mySite.removeChild(mySite.lastChild);
            nSite-=1;
        }else{
            for (let i = 0; i < 2; i++) {
                mySite.removeChild(mySite.lastChild);
            }
            nSite-=1;
        }
    }  
})

// create new address

const addAddress = document.querySelector('#add-address');
const removeAddress = document.querySelector('#remove-address');
const myAddress = document.querySelector('#address');
const n4 = myAddress.querySelectorAll('.my-address').length;
let nAddress =n4;

addAddress.addEventListener('click',function(e){
    e.preventDefault();
    nAddress+=1;

    const div = document.createElement('div');
    div.classList.add('row','mb-3');

    const label = document.createElement('label');
    label.classList.add('col-sm-2', 'col-form-label');
    label.textContent = 'Address '+nAddress;

    const div2= document.createElement('div');
    div2.classList.add('col-sm-2');

    const select= document.createElement('select');
    select.classList.add('form-select');
    select.name ='ad_select'+nAddress;

    const option1 = document.createElement("option");
    option1.text = "Address";
    option1.value = "Address";
    select.add(option1);

    const option3 = document.createElement("option");
    option3.text = "Home";
    option3.value = "Home";
    select.add(option3);

    const option4 = document.createElement("option");
    option4.text = "Work";
    option4.value = "Work";
    select.add(option4);

    const option5 = document.createElement("option");
    option5.text = "Mailing";
    option5.value = "Mailing";
    select.add(option5);

    const option7 = document.createElement("option");
    option7.text = "Other";
    option7.value = "Other";
    select.add(option7);

    const div3 = document.createElement('div');
    div3.classList.add('col-sm-8');

    const input = document.createElement('input');
    input.type ='text';
    input.setAttribute('required', '');
    input.classList.add('form-control');
    input.placeholder='Name';
    input.name='address'+nAddress;

    // street addAddress
    const mainStreet = document.createElement('div');
    mainStreet.classList.add('row','mb-3');

    const mainStreetLabel = document.createElement('label');
    mainStreetLabel.classList.add('col-sm-2', 'col-form-label');

    const subStreet = document.createElement('div');
    subStreet.classList.add('col-sm-10');
    const subStreetInput = document.createElement('input');

    subStreetInput.type ='text';
    subStreetInput.classList.add('form-control');
    subStreetInput.placeholder='Street Address';
    subStreetInput.name='ad-street'+nAddress;

    // Apt Suite, Bldg
    const mainApt = document.createElement('div');
    mainApt.classList.add('row','mb-3');

    const mainAptLabel = document.createElement('label');
    mainAptLabel.classList.add('col-sm-2', 'col-form-label');

    const subApt = document.createElement('div');
    subApt.classList.add('col-sm-10');

    const subAptInput = document.createElement('input');
    subAptInput.type ='text';
    subAptInput.classList.add('form-control');
    subAptInput.placeholder='Apt Suite,Bldg';
    subAptInput.name='ad-apt'+nAddress;

    // city region
    const mainCity = document.createElement('div');
    mainCity.classList.add('row','mb-3');

    const mainCityLabel = document.createElement('label');
    mainCityLabel.classList.add('col-sm-2', 'col-form-label');

    const subCity = document.createElement('div');
    subCity.classList.add('col-sm-5');

    const subCityInput = document.createElement('input');
    subCityInput.type ='text';
    subCityInput.classList.add('form-control');
    subCityInput.placeholder='City';
    subCityInput.name='ad-city'+nAddress;

    const subRegion = document.createElement('div');
    subRegion.classList.add('col-sm-5');

    const subRegionInput = document.createElement('input');
    subRegionInput.type ='text';
    subRegionInput.classList.add('form-control');
    subRegionInput.placeholder='Region';
    subRegionInput.name='ad-region'+nAddress;

     // country postal code
     const mainCountry = document.createElement('div');
     mainCountry.classList.add('row','mb-3');
 
     const mainCountryLabel = document.createElement('label');
     mainCountryLabel.classList.add('col-sm-2', 'col-form-label');
 
     const subCountry = document.createElement('div');
     subCountry.classList.add('col-sm-5');
 
     const subCountryInput = document.createElement('input');
     subCountryInput.type ='text';
     subCountryInput.classList.add('form-control');
     subCountryInput.placeholder='Country';
     subCountryInput.name='ad-country'+nAddress;
 
     const subPostal = document.createElement('div');
     subPostal.classList.add('col-sm-5');
 
     const subPostalInput = document.createElement('input');
     subPostalInput.type ='text';
     subPostalInput.classList.add('form-control');
     subPostalInput.placeholder='Zip / Postal Code';
     subPostalInput.name='ad-postal'+nAddress;

    myAddress.appendChild(div);
    div.appendChild(label);
    div.appendChild(div2);
    div2.appendChild(select);
    div.appendChild(div3);
    div3.appendChild(input);

    const addressValidDiv = document.createElement('div');
    addressValidDiv.classList.add('valid-feedback');
    addressValidDiv.textContent = 'Looks Good';
    const addressInvalidDiv = document.createElement('div');
    addressInvalidDiv.classList.add('invalid-feedback');
    addressInvalidDiv.textContent = 'Address Name is reqired';

    div3.appendChild(addressValidDiv);
    div3.appendChild(addressInvalidDiv);

    // main street
    myAddress.appendChild(mainStreet);
    mainStreet.appendChild(mainStreetLabel);
    mainStreet.appendChild(subStreet);
    subStreet.appendChild(subStreetInput);

    const streetValidDiv = document.createElement('div');
    streetValidDiv.classList.add('valid-feedback');
    streetValidDiv.textContent = 'Looks Good';
    const streetInvalidDiv = document.createElement('div');
    streetInvalidDiv.classList.add('invalid-feedback');
    streetInvalidDiv.textContent = 'Street is reqired';

    subStreet.appendChild(streetValidDiv);
    subStreet.appendChild(streetInvalidDiv);
    // apt
    myAddress.appendChild(mainApt);
    mainApt.appendChild(mainAptLabel);
    mainApt.appendChild(subApt);
    subApt.appendChild(subAptInput);

    const aptValidDiv = document.createElement('div');
    aptValidDiv.classList.add('valid-feedback');
    aptValidDiv.textContent = 'Looks Good';
    const aptInvalidDiv = document.createElement('div');
    aptInvalidDiv.classList.add('invalid-feedback');
    aptInvalidDiv.textContent = 'Apt Suite , Bldg is reqired';

    subApt.appendChild(aptValidDiv);
    subApt.appendChild(aptInvalidDiv);
    // city region
    myAddress.appendChild(mainCity);
    mainCity.appendChild(mainCityLabel);
    mainCity.appendChild(subCity);
    mainCity.appendChild(subRegion);
    subCity.appendChild(subCityInput);
    subRegion.appendChild(subRegionInput);

    const cityValidDiv = document.createElement('div');
    cityValidDiv.classList.add('valid-feedback');
    cityValidDiv.textContent = 'Looks Good';
    const cityInvalidDiv = document.createElement('div');
    cityInvalidDiv.classList.add('invalid-feedback');
    cityInvalidDiv.textContent = 'City is reqired';

    const regionValidDiv = document.createElement('div');
    regionValidDiv.classList.add('valid-feedback');
    regionValidDiv.textContent = 'Looks Good';
    const regionInvalidDiv = document.createElement('div');
    regionInvalidDiv.classList.add('invalid-feedback');
    regionInvalidDiv.textContent = 'Region is reqired';

    subRegion.appendChild(regionValidDiv);
    subRegion.appendChild(regionInvalidDiv);

    subCity.appendChild(cityValidDiv);
    subCity.appendChild(cityInvalidDiv);
    // Country postal
    myAddress.appendChild(mainCountry);
    mainCountry.appendChild(mainCountryLabel);
    mainCountry.appendChild(subCountry);
    mainCountry.appendChild(subPostal);
    subCountry.appendChild(subCountryInput);
    subPostal.appendChild(subPostalInput);

    const countryValidDiv = document.createElement('div');
    countryValidDiv.classList.add('valid-feedback');
    countryValidDiv.textContent = 'Looks Good';
    const countryInvalidDiv = document.createElement('div');
    countryInvalidDiv.classList.add('invalid-feedback');
    countryInvalidDiv.textContent = 'Country is reqired';

    subCountry.appendChild(countryValidDiv);
    subCountry.appendChild(countryInvalidDiv);

    const postalValidDiv = document.createElement('div');
    postalValidDiv.classList.add('valid-feedback');
    postalValidDiv.textContent = 'Looks Good';
    const postalInvalidDiv = document.createElement('div');
    postalInvalidDiv.classList.add('invalid-feedback');
    postalInvalidDiv.textContent = 'Zip / Postal Code is reqired';

    subPostal.appendChild(postalValidDiv);
    subPostal.appendChild(postalInvalidDiv);

    })

removeAddress.addEventListener('click',function(e){
    e.preventDefault();
    if(myAddress.childElementCount > 0){
        if(myAddress.lastChild.classList == 'row mb-3') 
        {
            for (let i = 0; i < 5; i++) {
                myAddress.removeChild(myAddress.lastChild);
            }
            nAddress-=1
        }else{
            for (let i = 0; i < 10; i++) {
                myAddress.removeChild(myAddress.lastChild);
            }
            nAddress-=1
        }
    }
    
})