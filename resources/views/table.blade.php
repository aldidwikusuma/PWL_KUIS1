{{-- @dd($table["data"]) --}}

@extends('layout.main')

@section('maincontent')
<!-- Begin Page Content -->
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ $titleheader }}</h1>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> --}}
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Total Data = {{ $table["total"] }} {{ request("key") ? ' | Search data by ' . request("key") : ""}}</h6>
        </div>
        <div class="card-body">
            @if ($table["data"]->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nomer</th>
                                <th>{{ $table["title"][0] }}</th>
                                <th>{{ $table["title"][1] }}</th>
                                <th>{{ $table["title"][2] }}</th>
                                <th>{{ $table["title"][3] }}</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="displaydata">
                            <style>
                                table.table td{
                                    vertical-align: middle !important;
                                }
                            </style>
                            @switch($table["url"])
                                @case("barang")
                                    @foreach ($table["data"] as $number => $datatablesatuan)
                                        <tr>
                                            <td>{{ $number+=1 }}</td>
                                            <td>{{ $datatablesatuan->name }}</td>
                                            <td><img src="{{ $datatablesatuan->image }}" alt="{{ $datatablesatuan->name }}"></td>
                                            <td>{{ $datatablesatuan->stok }}</td>
                                            <td>Rp. {{ $datatablesatuan->price/1000 }}</td>
                                            <td>
                                                <a href="{{ url("table/" . $table["url"] . "/detail/$datatablesatuan->id") }}" class="btn btn-primary">Detail</a>
                                                <a href="{{ url("table/" . $table["url"] . "/edit/$datatablesatuan->id") }}" class="btn btn-warning ml-1">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @break
                                @case("supplier")
                                    @foreach ($table["data"] as $number => $datatablesatuan)
                                        <tr>
                                            <td>{{ $number+=1 }}</td>
                                            <td>{{ $datatablesatuan->name }}</td>
                                            <td><img src="{{ $datatablesatuan->image }}" alt="{{ $datatablesatuan->name }}"></td>
                                            <td>{{ $datatablesatuan->nik }}</td>
                                            <td>{{ $datatablesatuan->phone }}</td>
                                            <td>
                                                <a href="{{ url("table/" . $table["url"] . "/detail/$datatablesatuan->id") }}" class="btn btn-primary">Detail</a>
                                                <a href="{{ url("table/" . $table["url"] . "/edit/$datatablesatuan->id") }}" class="btn btn-warning ml-1">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @break
                                @default
                            @endswitch
                        </tbody>
                    </table>
                </div>
            @else   
                <h3>Data not Found</h3>
            @endif
            
        </div>
        <style>
            ul.pagination{
                margin: 0 !important
            }
        </style>
        <div class="card-footer d-flex justify-content-center align-items-center">
            {{ $table["data"]->links() }}
        </div>
    </div>
    <script>
        const inputkey = document.getElementById("inputkey");
        const inputtabel = document.getElementById("inputtabel").value;
        const displaydata = document.getElementById("displaydata");

        inputkey.addEventListener("keyup", function () {
            let ajax = new XMLHttpRequest();
            ajax.onreadystatechange = function () {
                if (ajax.readyState == 4 && ajax.status == 200) {
                    console.log(inputkey.value);
                    displaydata.innerHTML = ajax.responseText;
                }
            };
            let url = "http://localhost:8000/table/" + inputtabel + "/ajax?data=" + inputkey.value;
            let url = "http://localhost:8000/table/" + inputtabel + "/ajax?data=" + inputkey.value;
            ajax.open("GET", {{ url() }} , true);
            ajax.send();
        });
    </script>
@endsection