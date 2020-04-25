<div class="container mt-4">
	<h3 class="h3">Import</h3>
	 <?php echo $this->session->flashdata('notif') ?>
	 <form method="POST" action="<?php echo base_url() ?>fourth/upload" enctype="multipart/form-data">
	  <div class="form-group">
	    <label for="exampleFormControlFile1">Example file csv | excel</label>
	    <input type="file" name="upload" class="form-control">
	  </div>
	  <button type="submit" name="upload" class="btn btn-primary">Upload</button>
	</form>
</div>