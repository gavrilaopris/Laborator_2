<html>
<head>
  <meta charset=utf-8 />
  <title>Laborator 2</title>
</head>

<body>
  <form>
    <strong>Sorteaza dupa:</strong>
	<input type="radio" name="sort" id="choice1" onclick="sorteaza()" value="titlu"> Titlu 
	<input type="radio" name="sort" id="choice2" onclick="sorteaza()" value="autor"> Autori 
	<input type="radio" name="sort" id="choice3" onclick="sorteaza()" value="an"> An 
    <br><br>
    <input type="button" onclick="check()" value="Create the table">
    <br>
  </form>
  
 

</body>



</html>
<script>

  const head = [
    {
      titlu: "<i>Titlu</i>",
      autori: "<i>Autor</i>",
      an: "<i>An</i>",
      imagineURL: "<i>Imagine<i>"
  }
];

  const carti = [
    {
      titlu: "Fratii Karamazov",
      autor: "Fiodor Mihailovici Dostoievski",
      an: "1880",
      imagineURL: "<img src= \"https://cdn5.gomag.ro/domains/pravaliacucarti.ro/files/product/medium/33211_62318.png\" style=\"width:150px;height:200px;\">"
  },
    {
      titlu: "Poesii",
      autor: "Mihai Eminescu",
      an: "1883",
      imagineURL: "<img src= \"https://www.libhumanitas.ro/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/p/e/persp_eminescu_princeps.3d.png\" style=\"width:150px;height:200px;\">"
  },
    {
      titlu: "Romeo and Juliet",
      autor: "William Shakespeare",
      an: "1597",
      imagineURL: "<img src= \"https://upload.wikimedia.org/wikipedia/commons/4/4c/Romeoandjuliet1597.jpg\" style=\"width:150px;height:200px;\">"
  },
    {
      titlu: "Ocolul Pamantului in 80 de zile",
      autor: "Jules Verne",
      an: "1873",
      imagineURL: "<img src= \"https://upload.wikimedia.org/wikipedia/commons/a/af/Ocolul_P%C4%83m%C3%A2ntului_%C3%AEn_80_de_zile.png\" style=\"width:150px;height:200px;\">"
  }
];

function check() {
    if (document.contains(document.getElementById("tabel"))) {
      document.getElementById("tabel").remove();
      createTable();

    } else {
      createTable();
    }
  }


  function createTable() {
    var body = document.getElementsByTagName("body")[0];
    var table = document.createElement("table");
    var tableBody = document.createElement("tbody");
   
    //first row
    var row0 = document.createElement("tr");
    for (var col in head[0]) {
      var cell0 = document.createElement("td");
      cell0.innerHTML = head[0][col];
      row0.appendChild(cell0);
    }
    tableBody.appendChild(row0);

    for (var i = 0; i < carti.length; i++) {
      var row = document.createElement("tr");
      for (var col in carti[i]) {
        var cell = document.createElement("td");
        cell.innerHTML = carti[i][col];
        row.appendChild(cell);
      }

      tableBody.appendChild(row);
    }
    table.appendChild(tableBody);
    body.appendChild(table);
    table.setAttribute("id", "tabel");
    table.setAttribute("border", "1");
	table.setAttribute("align", "center");

  }

  function compareValues(key, order = 'asc') {
    return function innerSort(a, b) {
      if (!a.hasOwnProperty(key) || !b.hasOwnProperty(key)) {
        // property doesn't exist on either object
        return 0;
      }

      const varA = (typeof a[key] === 'string') ?
        a[key].toUpperCase() : a[key];
      const varB = (typeof b[key] === 'string') ?
        b[key].toUpperCase() : b[key];

      let comparison = 0;
      if (varA > varB) {
        comparison = 1;
      } else if (varA < varB) {
        comparison = -1;
      }
      return (
        (order === 'desc') ? (comparison * -1) : comparison
      );
    };
  }


  function sorteaza() {
    if (document.getElementById("choice1").checked) {
      carti.sort(compareValues('titlu'));
      check();
    } else if (document.getElementById("choice2").checked) {
      carti.sort(compareValues('autor'));
      check();
    } else if (document.getElementById("choice3").checked) {
      carti.sort(compareValues('an'));
      check();
    } else {
      alert("Selecteaza un parametru.");
    }
    //document.getElementById("choice1").checked = false;
    //document.getElementById("choice2").checked = false;
    //document.getElementById("choice3").checked = false;
  }

  

</script>
