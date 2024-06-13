let docname = window.location.pathname.split("/").pop();
console.log(docname);

let navitems = document.getElementsByClassName("nav-item");

for (i = 0; i < navitems.length; i++) {
  href = navitems[i].firstChild.attributes.href.value;
  console.log(href);
  if (docname == href) {
    navitems[i].firstChild.setAttribute("href", "#");
    navitems[i].setAttribute("class", "nav-item nav-selected");
  }
}
