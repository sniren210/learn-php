
	<!-- hampir sama dengan dulu -->
 	<?php 
	echo form_open_multipart();
	 ?> 
<!-- 	 <form action="" method="post" enctype="multypart/form-data"> -->
	<div class="container mt-4">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group form-group-lg">
					<label>Nama produk</label>
					<input type="text" name="nama" placeholder="Nama produk" value="<?php echo set_value('nama_produk') ?>" required class="form-control">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label>Kategori Produk</label>
					<select name="opsi" class="form-control">
					    <option value="Unik">Unik</option>
					    <option value="Biasa">Biasa</option>
					</select>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label>Stok Produk</label>
					<input type="number" name="nomor" class="form-control" placeholder="Stok produk" value="<?php echo set_value('stok') ?>" required>
				</div>
			</div>



			<div class="col-md-12">

				<div class="form-group">
					<label>Upload gambar</label>
					<input type="file" name="gambar" class="form-control">
				</div>

				<div class="form-group">
					<label>Keterangan</label>
					<textarea name="keterangan" class="form-control" placeholder="Keterangan" id="keterangan"><?php echo set_value('keterangan') ?></textarea>
				</div>

				<div class="form-group">
					<input type="submit" name="submit" value="Simpan Data" class="btn btn-primary btn-lg">
					<input type="reset" name="reset" value="Reset" class="btn btn-default btn-lg">
				</div>

			</div>
		</div>
	</div>
<!-- 	</form> -->
 	<?php echo form_close() ?> 
	

	<!-- untuk form tampilan word -->
	<script src="<?= base_url() ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
	tinymce.init({
	    file_browser_callback: function(field, url, type, win) {
	        tinyMCE.activeEditor.windowManager.open({
	            file: '<?php echo base_url() ?>assets/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
	            title: 'KCFinder',
	            width: 700,
	            height: 500,
	            inline: true,
	            close_previous: false
	        }, {
	            window: win,
	            input: field
	        });
	        return false;
	    },
	    selector: "#keterangan",
	    height: 150,
	    plugins: [
	        "advlist autolink lists link image charmap print preview anchor",
	        "searchreplace visualblocks code fullscreen",
	        "insertdatetime media table contextmenu paste"
	    ],
	    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});
	</script>

