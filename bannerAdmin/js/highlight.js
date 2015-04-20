function highlight(){
  var tags=document.getElementsByTagName("li");
  for(i in tags){
    if(tags[i].className=="nav"){
        if(document.location.href==tags[i].firstChild.href){
            tags[i].className += "-active";
        }
    }
  }
}