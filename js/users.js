let check =document.querySelectorAll(".SEL");
check.forEach(element => {
    //console.log();
    let id= element.getAttributeNode('id');
    console.log(id)
    if (id=="1"){
        element.value=1;
    }else{
        element.value=0;
    }
});