
var request_modal = document.getElementById("requestModal");
var request_span = document.getElementsByClassName("close")[0];
var request_btn =document.getElementsByClassName("request_sample")[0];
request_btn.onclick=()=>{
    request_modal.style.display = "block";
    var id=request_btn.getAttribute("id");
    console.log(id);
};
request_span.onclick = function() {
  request_modal.style.display = "none";

}
