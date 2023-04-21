const max = 4;
const min = 2;
var count = min;

const add = document.getElementsByClassName('add')[0];
const del = document.getElementsByClassName('delete')[0];
const block = document.getElementsByClassName('center')[0];
const form = document.getElementsByClassName('form-image');
var inputId = document.getElementsByClassName('file-ip');

add.addEventListener("click", function() {
  if(count < max){
    count ++;
    var preview = document.createElement("div");
    var form = document.createElement("div");
    var image = document.createElement("img");
    var label = document.createElement("label");
    var input = document.createElement("input");

    var text = 'file-ip-'+ count;
    var name = 'file-image[]';
    var img = 'image' + count;

    preview.classList.add("preview");

    form.classList.add("form-image");

    label.setAttribute("for",text);
    label.textContent = 'Upload Image';

    image.id = img;

    input.type = 'file';
    input.id = text;
    input.name = name;
    input.classList.add('file-ip');
    input.accept = 'image/*';
    input.setAttribute("onchange", "showPreview(event)");

    preview.appendChild(image);
    form.appendChild(preview);
    form.appendChild(label);
    form.appendChild(input);
    block.appendChild(form);

    if(count >= max) {
      add.style.display = "none";
    }else{
      add.style.display = "block";
    }
  }
  if(count >= min){
    del.style.display = "block";
  }

});

del.addEventListener('click',function(){
  if(count > min) {
    form[count-1].remove();
    count--;
    if(count == min){
        del.style.display = "none";
    }
    add.style.display = "block";
  }

});


function showPreview(event){
  if(event.target.files.length > 0){
    var text = event.target.id;
    var tag = 'image'+text[8];
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById(tag);
    preview.src = src;
    preview.style.display = "block";
  }
}
