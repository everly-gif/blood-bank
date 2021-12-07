var add_modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];
var btn =document.getElementById("add_blood_sample");
btn.onclick=()=>{add_modal.style.display = "block";};

span.onclick = function() {
  add_modal.style.display = "none";
}



var edit_btn=document.getElementsByClassName('edit_btn');
var modal=document.getElementById('editModal');
var span = document.getElementsByClassName("close")[1];
for(var i=0;i<edit_btn.length;i++){
  edit_btn[i].onclick=(event)=>{
    modal.style.display = "block";
    var btn_clicked=event.target;
    var pre_filled_input=btn_clicked.parentElement.children[0].innerHTML;
    var input_field=document.getElementById('units');
    input_field.value=pre_filled_input;
    var filled_blood_group=btn_clicked.parentElement.previousSibling.innerHTML;
    var blood_group_field=document.getElementById('blood_group');
    blood_group_field.value=filled_blood_group;
    span.onclick = function() {
      modal.style.display = "none";
    }
    
  }
}
 
  
 