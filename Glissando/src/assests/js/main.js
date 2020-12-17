/*===== EXPANDER MENU  =====*/ 

/*
  It creates a constant showMenu which assigns three parameters toogleID, navbarID and bodyID.
  We use getElementById to call the parameters and stores them to variables toggle, navbar and bodypadding.
  After doing these, we check the condition, if it has toggle and navbar then,
  the side nav in our site will be expanded and the rest of the content will be displayed by using the addEventListener method
*/

const showMenu = (toggleId, navbarId, bodyId)=>{
    const toggle = document.getElementById(toggleId),
    navbar = document.getElementById(navbarId),
    bodypadding = document.getElementById(bodyId)
  
    if(toggle && navbar){
      toggle.addEventListener('click', ()=>{
        navbar.classList.toggle('expander')
  
        bodypadding.classList.toggle('body-pd')
      })
    }
  }
  showMenu('nav-toggle','navbar','body-pd')
  
  /*===== LINK ACTIVE  =====*/ 

  /*
    It returns all elements in the document that matches .nav_link
  */

  const linkColor = document.querySelectorAll('.nav__link')
  function colorLink(){
    linkColor.forEach(l=> l.classList.remove('active'))
    this.classList.add('active')
  }
  linkColor.forEach(l=> l.addEventListener('click', colorLink))
  
  /*===== COLLAPSE MENU  =====*/ 
  const linkCollapse = document.getElementsByClassName('collapse__link')
  var i
  
  for(i=0;i<linkCollapse.length;i++){
    linkCollapse[i].addEventListener('click', function(){
      const collapseMenu = this.nextElementSibling
      collapseMenu.classList.toggle('showCollapse')
  
      const rotate = collapseMenu.previousElementSibling
      rotate.classList.toggle('rotate')
    })
  }