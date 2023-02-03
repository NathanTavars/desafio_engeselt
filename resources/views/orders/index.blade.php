@extends('components.layout')
@section('content')
<main class="client">
<div class="container">
<div class="title-c"><h1>Pedidos</h1></div>
<div class="btn-cs">
    <h3>Filtrar Por:</h3><form action="{{ route('orders.filter') }}" method="get">
    <button type="submit" name="price" value="asc" class="">Menor preço</button>
    <button type="submit" name="price" value="desc" class="">Maior preço</button>
    <button type="submit" name="client_name" value="asc" class="">A-Z</button>
    <button type="submit" name="client_name" value="desc" class="">Z-A</button>
    <button type="submit" name="date" value="asc" class="">Data antiga</button>
    <button type="submit" name="date" value="desc" class="">Data recente</button>
    <button type="submit" name="status" value="asc" class="">Pedidos Abertos</button>
    <button type="submit" name="status" value="desc" class="">Pedidos Fechados</button>
    </form></div>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome do Cliente</th>
                <th>Status</th>
                <th>Data</th>
                <th>Valor</th>
                <th>Observações</th>
                <th>Editar</th>
                <th>Apagar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->client_id }}</td>
                <td>{{ $order->client_name }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->date }}</td>
                <td>{{ $order->price }}</td>
                <td>{{ $order->obs }}</td>
                <td><a href="{{ route('orders.edit', $order->id) }}" class="btn-e">Editar</a></td>
                <td>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-d">Excluir</button>
                    </form>
                </td>
                    
            </tr>
            @endforeach
            
        </tbody>
    </table>
    <div class="btn-cs"><a href="{{ route('orders.create') }}" class="btn btn-success">Novo Pedido</a>
    <a href="{{ route('orders.export') }}" class="btn btn-primary">Exportar Pedidos</a></div>
    <div class="linkss">
        <div class="link-b">{{ $orders->appends(request()->except(['page']))->links() }}</div></div>
    

</div>



</main>
@endsection('content')