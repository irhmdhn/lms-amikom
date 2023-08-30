// new DataTable('table.display');
$(document).ready(function(){
  const toggle = $('#header-toggle'),
    nav = $('#nav-bar'),
    bodypd = $('#body-pd'),
    headerpd = $('#header'),
    mainpd = $('#main-body')
  if(toggle && nav && bodypd && headerpd && mainpd){
      toggle.on('click', ()=>{
        // show navbar
        nav.toggleClass('show')
        // change icon
        toggle.toggleClass('bx-x')
        // add padding to body
        bodypd.toggleClass('body-pd')
        // add padding to header
        headerpd.toggleClass('body-pd')

        mainpd.toggleClass('main-body-pd')
    })
  }
  $('.form-select').select2({
    dropdownParent: $('.modal')
  })
})
$('#btn-back').on('click',()=>{
  history.back()
})


