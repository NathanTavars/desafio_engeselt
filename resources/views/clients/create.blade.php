<link rel="stylesheet"est type="text/css" href="{{ asset('css/client.css') }}">
<div class="father"><div class="mother"><div class="form-c">
    <h1>Cadastro</h1>
    <div class="create">
    <form action="{{ route('clients.store') }}" method="post" class="fomr-cc">
    @csrf
    <div class="form-main">
    <div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
    <label for="phone">Telefone:</label>
    <input type="text" class="form-control" id="phone" name="phone" required>
    </div>
    <div class="form-group">
    <label for="city">Cidade:</label>
    <input type="text" class="form-control" id="city" name="city" required>
    </div>
    <div class="form-group">
    <label for="state">Estado:</label>
    <input type="text" class="form-control" id="state" name="state" required>
    </div>
    <div class="form-group">
    <label for="country">País:</label>
    <input type="text" class="form-control" id="country" name="country" required>
    </div>
    <div class="form-group">
    <label for="street">Rua:</label>
    <input type="text" class="form-control" id="street" name="street" required>
    </div>
    <div class="form-group">
    <label for="number">Número:</label>
    <input type="text" class="form-control" id="number" name="number" required>
    </div>
    <div class="form-group">
    <label for="district">Bairro:</label>
    <input type="text" class="form-control" id="district" name="district" required>
    </div>
    <div class="form-group">
 
    <input type="hidden" name="latitude" id="latitude" class="form-control">

    <input type="hidden" name="longitude" id="longitude" class="form-control">
    </div>
    <div class="form-group">
    <input type="hidden" id="address" class="form-control">
    </div>
    <div class="form-group">
    <button type="submit" class="btn-cc">Cadastrar</button>
    <a href="{{ route('clients.index') }}" class="btn-cv">Voltar</a>
</div>
</form></div>


<script>
var form = document.getElementById('form');
form.addEventListener('submit', function(e) {

  e.preventDefault();

  var address = document.getElementById('address').value;
  fetch('https://maps.googleapis.com/maps/api/geocode/json?address=' + address + '&key=AIzaSyAxDxwiP6H_IV1gfRsNvotU2L9bqFIkgJQ')
    .then(function(response) {
      return response.json();
    })
    .then(function(data) {

      var lat = data.results[0].geometry.location.lat;
      var lng = data.results[0].geometry.location.lng;
      L.marker([lat, lng]).addTo(map);
    });
});
</script>


</div></div></div>
