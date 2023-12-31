@extends('layouts.admin')

@section('content')
<h1>Заявки от клиентов:</h1>
    <div>
        @foreach($buyers as $buyer)
           <table border="1">
                <thead>
                    <tr>
                        <th>Номер заявки</th>
                        <th>Имя клиента</th>
                        <th>Телефон клиента</th>
                        <th>Статус заявки</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$buyer->id}}</td>
                        <td>{{$buyer->name}}</td>
                        <td>{{$buyer->phone}}</td>
                        <td style="color: greenyellow;">{{$buyer->status}}</td>
                    </tr>
                </tbody>
            </table>
        @endforeach
    </div>
@endsection