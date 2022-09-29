const searchBar = document.querySelector('#search');
searchBar.addEventListener('keyup' , function(e){
  const terms = e.target.value.toLowerCase();
  const users = document.querySelectorAll('.search');

  Array.from(users).forEach(function(user){
    let name = user.querySelector('.name').textContent;
    let email = user.querySelector('.email').textContent;

    if(name.toLowerCase().indexOf(terms) !=-1){
      user.classList.remove('d-none');

    }else if(email.toLowerCase().indexOf(terms) !=-1){
      user.classList.remove('d-none');
    }else{
      user.classList.add('d-none');

    }
  })
})
