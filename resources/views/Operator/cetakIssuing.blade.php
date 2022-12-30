<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<span style="text-align: center">
		<h5>LAPORAN GUDANG</h4>
    </span>

    <table id="datatable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="col-sm-1">No</th>
                <th class="col-md-4">Nama Barang</th>
                <th class="col-md-2">Picker</th>
                <th class="col-md-3">Date Time</th>
                <th class="col-md-3">No Referensi</th>
                <th class="col-md-4">Jumlah</th>
                <th class="col-md-1">Satuan</th>
            </tr>
        </thead>
        <tbody>
                
            @foreach ($data as $d)
            <tr>    
                <td>{{$loop->iteration}}</td>
                <td>{{$d->Nama_Barang}}</td>
                <td>{{$d->Picker}}</td>
                <td>{{$d->Date}}</td>
                <td>{{$d->No_referensi}}</td>
                <td>{{$d->jumlahKeluar}}</td>
                <td>{{$d->UoM}}</td>    
            </tr> 
            @endforeach         
              
            </tbody>
        </table>
    
</body>
</html>