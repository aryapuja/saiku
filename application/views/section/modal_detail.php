
				<div class="modal-header">
					<h4 class="modal-title">Detail Activity</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
				</div>
				<div class="modal-body">			   
					<div class="container-fluid">   
					<!-- <h4 class="modal-title">Detail Activity</h4> -->
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
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
					</div>
				</div>
			