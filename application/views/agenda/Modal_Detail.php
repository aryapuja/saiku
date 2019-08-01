				<div class="modal-header">
					<h4 class="modal-title">Detail NOR</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
				</div>
				<div class="modal-body">			   
					<div class="container-fluid">   
						<table class="table table-condensed" width="100%">
							<thead>
								<tr>
									<th>NOR-No</th>
									<th>Item Changes</th>
									<th>Line</th>
									<th>Plan Implementation</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($sch as $key => $value): ?>
									<tr>
										<td><?php echo $value->nor."-".$value->no ?></td>
										<td><?php echo $value->item_changes ?></td>
										<td><?php echo $value->line." ".$value->line2." ".$value->line3." ".$value->line4." ".$value->line5 ?></td>
										<td><?php echo date("d-F-Y", strtotime($value->nor_plan_imp)) ?></td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>

					<h4 class="modal-title">Detail Activity</h4>
					<div class="container-fluid">	
						<table class="table table-condensed" width="100%">
							<thead>
								<tr>
									<th>NOR-No</th>
									<th>Section</th>
									<th>Activity</th>
									<th>Plan Implementation</th>
									<th>Actual Implementation</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($act as $key => $value): ?>
									<tr>
										<td><?php echo $value->nor."-".$value->no ?></td>
										<td><?php echo $value->nama_dvs ?></td>
										<td><?php echo $value->nama_act ?></td>
										<td><?php echo date("d-F-Y", strtotime($value->ak_plan_imp)) ?></td>
										<?php if ($value->ak_act_imp == "0000-00-00 00:00:00") { ?>
										<td>Belum Terimplementasi</td>
										<?php }else{ ?>
										<td><?php echo date("d-F-Y", strtotime($value->ak_act_imp)) ?></td>
										<?php } ?>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
						<!-- <?php var_dump($sch) ?>
						tgl : <?php echo $tgl['date'] ?><br>
						month : <?php echo $tgl['month'] ?><br>
						year : <?php echo $tgl['year'] ?><br> -->
					</div>	
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
					</div>
				</div>
			