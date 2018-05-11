var result = document.querySelector(".result");
var input = document.querySelector("#input");
var img = document.querySelector(".img");
var nonImg = document.querySelector(".non-img");
result.style.display = "flex";
// input.style.display = "none";
// img.style.listStyle = "none";
// nonImg.style.listStyle = "none";
// img.style.paddingLeft = "10px";
// nonImg.style.paddingLeft = "10px";
// document.querySelector("#image").style.cursor = "pointer";

function listMaker(file, pic = null, fileData = null) {
  var li = document.createElement("li");
  var fileName = file.name.slice(0, -4);
  var fileSize = getReadableFileSizeString(file.size);
  li.style.height = "110px";
  li.style.listStyle = "none";
  li.style.marginTop = "10px";
  li.innerHTML = fileName + " - " + "<strong>" + fileSize;

  if (pic) {
    viewPicMaker(pic, fileData, li);
  }
  deleteItem(li);
  return li;
}

function getReadableFileSizeString(fileSizeInBytes) {
  var i = -1;
  var byteUnits = [
    " kB",
    " MB",
    " GB",
    " TB",
    "PB",
    "EB",
    "ZB",
    "YB"
  ];
  do {
    fileSizeInBytes = fileSizeInBytes / 1024;
    i++;
  } while (fileSizeInBytes > 1024);

  return (
    Math.max(fileSizeInBytes, 0.1).toFixed(1) + byteUnits[i]
  );
}

function deleteItem(element) {
  var el = document.createElement("span");
  el.innerHTML = "x";
  el.style.border = "1px solid red";
  el.style.borderRadius = "50px";
  el.style.margin = "5px";
  el.style.padding = "0 5px 3px 5px";
  el.style.color = "red";
  el.style.cursor = "pointer";
  el.onmouseover = function() {
    el.style.background = "red";
    el.style.color = "white";
  };
  el.onmouseout = function() {
    el.style.background = "white";
    el.style.color = "red";
  };
  el.title = "delete";
  el.addEventListener("click", function() {
    element.parentNode.removeChild(element);
    if (!img.getElementsByTagName("li")[0]) {
      img.innerHTML = "";
    }
    // if (!nonImg.getElementsByTagName("li")[0]) {
    //   nonImg.innerHTML = "";
    // }
  });
  element.prepend(el);
}

function viewPicMaker(image, fileData, li) {
  image.src = fileData;
  image.width = "125";
  image.style.float = "right";
  image.style.border = "1px solid magenta";
  image.style.float = "right";
  li.appendChild(image);
  img.appendChild(li);
}

function fileProcedure(e) {
  e.preventDefault();
  if (document.querySelector(".hide")) {
    document
      .querySelector(".hide")
      .parentNode.removeChild(
        document.querySelector(".hide")
      );
  }
  var files = e.target.files;
  if (files.length) {
    [].forEach.call(files, function(file) {
      var type = file.type.substr(0, 5);
      var reader = new FileReader();

      reader.onload = function(e) {
        var fileData = e.target.result;
        if (file.size > 15000000) {
          var p = document.createElement("p");
          p.innerHTML =
            "<b>Файл повинний бути менш як 15Mb</b>";
          p.style.color = "red";
          p.classList.add("hide");
          document
            .querySelector(".input-holder")
            .appendChild(p);
          return;
        }
        var image = document.createElement("img");
        img.innerHTML
          ? ""
          : (img.innerHTML = "<b><i>Картинки: </i></b>");
        img.appendChild(listMaker(file, image, fileData));
        img.style.marginTop = "12px";
      };

      reader.readAsDataURL(file);
    });
    this.value = "";
  }
}

input.addEventListener("change", fileProcedure);
input.addEventListener("drop", fileProcedure);
