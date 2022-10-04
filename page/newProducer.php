
<script>
function getAdress(){
  /* Use http://localhost:7878 if you run a local instance. */
  const url = new URL('http://api-adresse.data.gouv.fr/search');
  var adresse = document.getElementById("adresse").value;
  adresse = adresse.replace(" ","+");
  var cp = document.getElementById("cp").value;
  var ville = document.getElementById("ville").value;
  const params = {q: adresse+ " " + cp + " " + ville};
  Object.keys(params).forEach(
    key => url.searchParams.append(key, params[key])
  )
  fetch(url)
    .then(response => {
      if (response.status >= 200 && response.status < 300) {
        return response
      } else {
        const error = new Error(response.statusText)
        error.response = response
        throw error
      }
    })
    .then(response => response.json())
    .then(data => updateScreen(data))
    .catch(error => console.log('request failed', error))
}
function updateScreen(array){
    var test = array["features"][0]
    
    var adresse = test["properties"]["name"]
    var cp = test["properties"]["postcode"]
    var ville = test["properties"]["city"]
    var latitude = test["geometry"]["coordinates"][1]
    var longitude = test["geometry"]["coordinates"][0]

    console.log(latitude)
    console.log(longitude)

    document.getElementById("adresse").value = adresse
    document.getElementById("cp").value = cp
    document.getElementById("ville").value = ville 
    document.getElementById("latitude").value = latitude 
    document.getElementById("longitude").value = longitude 
}
</script>
<div class="content">
	<h1>Nouveau producteur</h1>

    <form method="POST" action="index.php?page=newProducerWelcomePage">
    <label for="name">Nom</label>

    <input type="text" id="name" name="name" required maxlength="50" size="50">

    <label for="adresse">Adresse</label>

    <input type="text" id="adresse" name="adresse" required maxlength="100" size="50">
    
    <label for="cp">Code postal</label>

    <input type="number" id="cp" name="cp" required>

    <label for="ville">Ville</label>

    <input type="text" id="ville" name="ville" required maxlength="100" size="50">

    
    <input type="button" id="test" name="test" value="check" onclick="getAdress()">
    <input type="submit" value="Submit">
    <input type="number" id="latitude" name="latitude" step="0.00000000001" hidden>
    <input type="number" id="longitude" name="longitude" step="0.00000000001" hidden>
    </form>
</div>


