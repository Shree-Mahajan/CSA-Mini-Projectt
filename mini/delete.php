  <html>
  <body>

  <h2>Using the XMLHttpRequest Object</h2>

  <div id="demo">
  <button type="button" onclick="loadXMLDoc()">Change Content</button>
  </div>

  <script>
  function loadXMLDoc() {
    var xmlhttp;
    xmlhttp = new XMLHttpRequest();
    // if (window.XMLHttpRequest) {
    // } else {
    //   // code for older browsers
    //   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    // }
    // xmlhttp.onreadystatechange = function() {
    //   if (this.readyState == 4 && this.status == 200) {
        document.getElementById("demo").innerHTML =
        xmlhttp.responseText;
      // }
    // };
    xmlhttp.open("GET", "faculty.php", true);
    xmlhttp.send();
  }
  </script>

  </body>
  </html>
