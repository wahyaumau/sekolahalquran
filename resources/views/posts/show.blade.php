@extends('layouts.app')

@section('stylesheets')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
{!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $boardinghouse->name }}</div>
                <div class="card-body">                	
                    <p>deskripsi : {{$boardinghouse->description}}</p>
                    <p>alamat : {{$boardinghouse->address." ".$boardinghouse->regency->name. ", ".$boardinghouse->regency->province->name }}</p>
                    @php 
                    $facilities = str_split($boardinghouse->facility);
                    $facilities_def = array('dapur', 'kompor', 'lpg', 'parkir motor', 'parkir mobil', 'jemuran', 'listrik', 'air', 'layanan kebersihan', 'pajak dan retribusi', 'wi-fi');
                    for ($i=0; $i < count($facilities); $i++) { 
                        if ($facilities[$i] == false) {
                            unset($facilities_def[$i]);
                        }
                    }
                    @endphp
                    <p>fasilitas : 
                        @foreach($facilities_def as $facility)
                            {{$facility.", "}}
                        @endforeach</p>
                    <p>fasilitas lain : {{$boardinghouse->facility_other}}</p>
                    <p>akses : {{$boardinghouse->access}}</p>
                    <p>informasi tambahan : {{$boardinghouse->information_others}}</p>
                    <p>informasi biaya : {{$boardinghouse->information_cost}}</p>                    

                </div>
            </div>

            <div class="card">
                <div class="card-header">{{ $boardinghouse->name. " memiliki ". $boardinghouse->chamber->count(). " tipe kamar" }}</div>
				@foreach ($boardinghouse->chamber as $chamber)
                <div class="card-body">                	
                    <p>nama kamar : {{$chamber->name}}</p>
                    <p>harga bulanan : {{$chamber->price_monthly}}</p>
                    <p>harga tahunan : {{$chamber->price_annual}}</p>
                    <p>gender : {{$chamber->gender=="1"? "laki-laki":"perempuan"}}</p>
                    <p>ukuran kamar : {{$chamber->chamber_size}}</p>
                    @php 
                    $facilities = str_split($chamber->chamber_facility);
                    $facilities_def = array('kamar mandi dalam', 'ranjang', 'kasur', 'meja belajar', 'lemari', 'water heater', 'AC');
                    for ($i=0; $i < count($facilities); $i++) { 
                        if ($facilities[$i] == false) {
                            unset($facilities_def[$i]);
                        }
                    }
                    @endphp
                    <p>fasilitas kamar : 
                    @foreach($facilities_def as $facility)
                        {{$facility. ", "}}
                    @endforeach
                    </p>
                    <button>Booking Kamar Ini</button>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    

@endsection
