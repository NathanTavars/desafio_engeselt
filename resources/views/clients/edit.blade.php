<link rel="stylesheet"est type="text/css" href="{{ asset('css/client.css') }}">
<div class="father"><div class="mother"><div class="form-c">
    
    <h1>Editar Clientes</h1>    
    <div class="create">

    <form action="{{ route('clients.update', $client->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-main">
        <div class="form-group">
        <label for="name">Nome:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $client->name }}">
        </div>
        <div class="form-group">
        <label for="phone">Telefone:</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ $client->phone }}">
        </div>
        <div class="form-group">
        <label for="city">Cidade:</label>
        <input type="text" class="form-control" id="city" name="city" value="{{ $client->city }}">
        </div>
        <div class="form-group">
        <label for="state">Estado:</label>
        <input type="text" class="form-control" id="state" name="state" value="{{ $client->state }}">
        </div>
        <div class="form-group">
        <label for="country">País:</label>
        <input type="text" class="form-control" id="country" name="country" value="{{ $client->country }}">
        </div>
        <div class="form-group">
        <label for="street">Rua:</label>
        <input type="text" class="form-control" id="street" name="street" value="{{ $client->street }}">
        </div>
        <div class="form-group">
        <label for="number">Número:</label>
        <input type="text" class="form-control" id="number" name="number" value="{{ $client->number }}">
        </div>
        <div class="form-group">
        <label for="district">Bairro:</label>
        <input type="text" class="form-control" id="district" name="district" value="{{ $client->district }}">
        </div>
        <div class="form-group">
        <button type="submit" class="btn-cc">Editar</button>
        <a href="{{ route('clients.index') }}" class="btn-cv">Voltar</a>
        </div>
    </form>

        </div>
    </div>

    </div>
    

    