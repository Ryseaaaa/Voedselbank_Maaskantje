let docname = window.location.pathname.split("/").pop();
console.log(docname);

let navitems = document.getElementsByClassName("nav-item");

for (i = 0; i <= 3; i++) {
  href = navitems[i].firstChild.attributes.href.value;
  if (docname == href) {
    navitems[i].firstChild.setAttribute("href", "#");
    navitems[i].setAttribute("class", "nav-item nav-selected");
  }
}
