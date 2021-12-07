var decrease_btn=document.getElementsByClassName('decrease');
var increase_btn=document.getElementsByClassName('increase');

for(var i=0;i<decrease_btn.length;i++){
    decrease_btn[i].onclick=(event)=>{
      var btn_clicked=event.target;
      var input=btn_clicked.parentElement.children[3];
      var input_value=input.value;
      var newValue=parseInt(input_value)-1;
      if(newValue>1){
          input.value=newValue;
      }
    }
}
for(var i=0;i<increase_btn.length;i++){
    increase_btn[i].onclick=(event)=>{
      var btn_clicked=event.target;
      var input=btn_clicked.parentElement.children[3];
      var input_value=input.value;
      var newValue=parseInt(input_value)+1;
      var maximum=input.getAttribute("max");
      if(newValue<=maximum ){
        input.value=newValue;
      }
    }
}
