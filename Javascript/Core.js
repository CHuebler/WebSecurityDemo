window.RequestManager = {

  ExecuteRequest: function (address, values, async, callback) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 4 && xhttp.status == 200) {
        callback(xhttp.responseText);
      }
    };
    var method = (values != null) ? "POST" : "GET";
    xhttp.open(method, address, async);
    xhttp.setRequestHeader("Content-type", "application/json");
    if(method == "POST")
    {
      xhttp.send(values);
    }
    else
    {
      xhttp.send();
    }
  }

};

window.GetSafeString = function(unsafeString){
  var safeString = "";
  if(unsafeString != null || unsafeString != "undefined")
  {
    safeString += unsafeString.replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;');
  }
  return safeString;
}
