@extends('components.layout')
@section('content')
    <main class="client">
        <div class="title-c"><h1>Listar Clientes</h1></div>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Bairro</th>
                <th>Rua</th>
                <th>Número</th>
                <th>Editar</th>
                <th>Apagar</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
        <tr>
            <td>{{ $client->name }}</td>
            <td>{{ $client->phone }}</td>
            <td>{{ $client->district }}</td>
            <td>{{ $client->street }}</td>
            <td>{{ $client->number }}</td>
            <td><a href="{{ route('clients.edit', $client->id)}}" class="btn-e">Editar</a></td>
            <td>
                <form action="{{ route('clients.destroy', $client->id)}}" method="POST" class="form-d">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-d">Apagar</button>    
            </form>
            </td>
        </tr>
    @endforeach
        </tbody>

    </table>

    <div class="btn-cs"><a href="{{ route('clients.create')}}">Novos Clientes</a></div>

    </main>

    

@endsection('content')