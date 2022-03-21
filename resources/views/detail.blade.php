@extends('layout.main')

@section('maincontent')    
    <div class="row justify-content-center align-items-center" style="min-height: 75vh">
        <div class="col-xl-10 col-lg-12 col-md-8">
            <div class="row justify-content-center mb-5">
                <div>
                    <a href="{{ url("table") . "/" . $datadetail['tableurl'] }}" class="btn btn-primary mx-3">Kembali</a>
                    <a href="{{ url("table/barang/edit") . "/" . $datadetail["data"]->id }}" class="btn btn-warning mx-3">Edit</a>
                </div>
            </div>
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-5">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-md-4">
                            <img width="300" src="{{ $datadetail["data"]->image }}" alt="Gambar Random" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Data {{ ucfirst($datadetail["tableurl"]) }} | ID Key = {{ $datadetail["data"]->id }}</h1>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <div class="form-control">
                                        {{ $datadetail["titledata"][0] }}
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-control">
                                        @switch($datadetail["tableurl"])
                                            @case("barang")
                                                {{ $datadetail["data"]->name }}
                                                @break
                                            @case("supplier")
                                                {{ $datadetail["data"]->name }}
                                                @break
                                            @default
                                        @endswitch
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <div class="form-control">
                                        {{ $datadetail["titledata"][1] }}
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-control">
                                        @switch($datadetail["tableurl"])
                                            @case("barang")
                                                {{ $datadetail["data"]->description }}
                                                @break
                                            @case("supplier")
                                                {{ $datadetail["data"]->nik }}
                                                @break
                                            @default
                                        @endswitch
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <div class="form-control">
                                        {{ $datadetail["titledata"][2] }}
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-control">
                                        @switch($datadetail["tableurl"])
                                            @case("barang")
                                                {{ $datadetail["data"]->stok }}
                                                @break
                                            @case("supplier")
                                                {{ $datadetail["data"]->phone }}
                                                @break
                                            @default
                                        @endswitch
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <div class="form-control">
                                        {{ $datadetail["titledata"][3] }}
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-control">
                                        @switch($datadetail["tableurl"])
                                            @case("barang")
                                                {{ $datadetail["data"]->price }}
                                                @break
                                            @case("supplier")
                                                {{ $datadetail["data"]->address }}
                                                @break
                                            @default
                                        @endswitch
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
