@extends('layouts.index')

@section('title', 'LOGS')
@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="fs-3">Integraciones - LOGS - {{ $response['uuid'] }}</h2>
                <h2 class="fs-3 mt-5 p-3">LOCALIZADOR- {{ $response['localizador'] }}</h2>
                <div class="p-3 text-center mt-2">
                    <form action="{{ url('ratekey') }}" method="post">
                        @csrf
                        <input type="hidden" name="rate" value="{{ $rate }}">
                        <button class="btn btn-info">Ver JSON CRUDO</button>
                    </form>
                </div>
            </div>
            <div class="col-md-12">
                <h3>REQUEST IN</h3>
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>UUID</th>
                            <th>DESTINATION</th>
                            <th>CONTRY</th>
                            <th>ARRIVAL</th>
                            <th>DEPARTURE</th>
                            <th>OCUPANCIES</th>
                            <th>NATIONALITY</th>
                            <th>ROOMS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($response['requestIn'] as $item)
                            <tr>
                                <td>{{ $item['uuid'] }}</td>
                                <td>{{ $item['destination']['label'] }}</td>
                                <td>{{ $item['destination']['country'] }}</td>
                                <td>{{ $item['arrival'] }}</td>
                                <td>{{ $item['departure'] }}</td>
                                <td>
                                    @php
                                        echo json_encode($item['occupancies']);
                                    @endphp
                                </td>
                                <td>{{ $item['nationality']['name'] }}</td>
                                <td>{{ $item['rooms'] }}</td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                <div class="card mt-3 p-2">
                    <div class="card-header">
                        <h5>Hotel IDS</h5>
                    </div>
                    <div class="card-body">

                        @foreach ($response['requestIn'] as $item)
                            @php
                                echo json_encode($item['destination']['id']);
                            @endphp
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <h3>Hotel Seleccionado</h3>
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>BROKER</th>
                            <th>IDHOTEL</th>
                            <th>HOTEL NAME</th>
                            <th>IDROOM</th>
                            <th>ROOM NAME</th>
                            <th>CATEGORY</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($response['Select_Hotel'] as $item)
                            <tr>
                                <td>{{ $item['broker'] }}</td>
                                <td>{{ $item['idHotel'] }}</td>
                                <td>{{ $item['hotelName'] }}</td>
                                <td>{{ $item['idRoom'] }}</td>
                                <td>{{ $item['roomName'] }}</td>
                                <td>{{ $item['category'] }}</td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            @foreach ($response['BROKER'] as $key => $item)
                <div class="col-md-12 p-3 mt-5">
                    <div class="card">
                        <div class="card-header p-3">
                            <h2 class="fw-bold"> {{ $key }}</h2>
                        </div>
                        <div class="card-body">
                            @foreach ($item as $info => $tem )
                            <div class="p-3 m-2 mt-2">
                                <h4>{{$info}}</h4>

                            </div>
                            <div class="p-3 m-2 mt-2">
                                <pre>
                                    <code>
                                        {{trim(json_encode($tem))}}
                                    </code>
                                </pre>
                                
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
