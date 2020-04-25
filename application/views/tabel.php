<link rel="stylesheet" href="<?=  base_url('assets/bootstrap/css/jquery.dataTables.css') ?>">

<div class="container mt-4">
	<table class="table table-striped" id="example">
	  <thead>
	    <tr>
	      <th scope="col">No</th>
	      <th scope="col">Nama</th>
	      <th scope="col">Option</th>
	      <th scope="col">Nomor</th>
	      <th scope="col">Tanggal</th>
	      <th scope="col">Keterangan</th>
	      <th scope="col">Gambar</th>
	      <th scope="col">Aksi</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php $no = 1; foreach ($form as $data): ?>  		
		    <tr>
		      <td><?=  $no ?></td>
		      <td><?=  $data['nama'] ?></td>
		      <td><?=  $data['opsi'] ?></td>
		      <td><?=  $data['nomor'] ?></td>
		      <td><?=  $data['tanggal'] ?></td>
		      <td><?=  $data['keterangan'] ?></td>
		      <td><?=  $data['gambar'] ?></td>
		      <td>
		      	<a href="">
		      		<span class="badge badge-info">Detail</span>
		      	</a>
		      	<a href="">
		      		<span class="badge badge-success">Edit</span>
		      	</a>
		      	<a href="<?=  base_url() ?>second/Second/delete?idData=<?=  $data['id'] ?>">
		      		<span class="badge badge-danger">Delete</span>
		      	</a>
		      </td>
		    </tr>
	  	<?php $no++; endforeach ?>
	  </tbody>
	  <tfoot>
  		<tr>
	      <th scope="col">No</th>
	      <th scope="col">Nama</th>
	      <th scope="col">Option</th>
	      <th scope="col">Nomor</th>
	      <th scope="col">Tanggal</th>
	      <th scope="col">Keterangan</th>
	      <th scope="col">Gambar</th>
	      <th scope="col">Aksi</th>
	    </tr>
	  </tfoot>
	</table>
</div>
	
	
<script type="text/javascript">
	$(document).ready(function () {
		$('#example').DataTable();
	})
</script>
<script type="text/javascript" src="<?=  base_url('assets/bootstrap/js/jquery.dataTables.js') ?>"></script>