<link rel="stylesheet"est type="text/css" href="{{ asset('css/client.css') }}">
<div class="father"><div class="mother"><div class="form-c">
<h1>Cadastro de Pedidos</h1>
<form action="{{ route('orders.store') }}" method="POST">
    @csrf
    <div class="form-main">
    <div class="form-group">
        <label for="client_id">Cliente</label>
        <select name="client_id" id="client_id" class="form-control">
            @foreach ($clients as $client)
                <option value="{{ $client->id }}">{{ $client->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <input type="text" name="status" id="status" class="form-control">
    </div>
    <div class="form-group">
        <label for="date">Data</label>
        <input type="date" name="date" id="date" class="form-control">
    </div>
    <div class="form-group">
        <label for="price">Valor</label>
        <input type="text" name="price" id="price" class="form-control">
    </div>
    <div class="form-group">
        <label for="obs">Obs</label>
        <textarea name="obs" id="obs" class="form-control"></textarea>
    </div>
    <div class="form-group">
    <button type="submit" class="btn-cc">Criar</button>
    <a href="{{ route('orders.index') }}" class="btn-cv">Voltar</a>
    </div>
</form></div>