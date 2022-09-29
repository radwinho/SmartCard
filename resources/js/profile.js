const searchBar = document.querySelector('#search');
searchBar.addEventListener('keyup' , function(e){
  const terms = e.target.value.toLowerCase();
  const smartCards = document.querySelectorAll('.search');
  Array.from(smartCards).forEach(function(user){
    let name = user.querySelector('.name').textContent;
    if(name.toLowerCase().indexOf(terms) !=-1){
      user.classList.remove('d-none');
    }else{
      user.classList.add('d-none');
    }
  })
})

