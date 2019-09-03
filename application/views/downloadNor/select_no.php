<option disabled selected hidden class="nomor-not"> Pilih Nomor No</option>
													<?php foreach ($no as $key) { ?>
														<option value="<?php echo $key->no ?>" class="nomor-nor-<?php echo $key->nor ?>"> <?php  echo $key->no ?> </option>
													<?php }  ?>