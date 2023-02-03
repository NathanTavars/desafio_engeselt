<link rel="stylesheet"est type="text/css" href="{{ asset('css/client.css') }}">
<div class="father"><div class="mother"><div class="form-c">
<h1>Editar Pedido</h1>

<form action="{{ route('orders.update', $order->id)}}" method="POST">
{{ csrf_field() }}
@method('PUT')
<div class="form-main">
    <div class="form-group">
        <label for="client_name">Cliente</label>
        <select name="client_name" id="client_name" class="form-control">
            @foreach ($clients as $client)
                <option value="{{ $client->id }}">{{ $client->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <input type="text" name="status" id="status" class="form-control" value="{{ $order->status }}">
    </div>
    <div class="form-group">
        <label for="date">Data</label>
        <input type="date" name="date" id="date" class="form-control" value="{{ $order->date }}">
    </div>
    <div class="form-group">
        <label for="price">Valor</label>
        <input type="text" name="price" id="price" class="form-control" value="{{ $order->price }}">
    </div>
    <div class="form-group">
        <label for="obs">Obs</label>
        <textarea name="obs" id="obs" class="form-control" value="{{ $order->obs }}"></textarea>
    </div>
    <div class="form-group">
    <button type="submit" class="btn-cc">Editar</button>
    <a href="{{ route('orders.index') }}" class="btn-cv">Voltar</a>
</div>
</form></div>
</div>
</div>
</div>