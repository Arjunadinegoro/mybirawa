 <!-- Begin Page Content -->
 <div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Table User</h6>
            <?php echo $page?>
		</div>
		<br>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="clearfix"></div>	
	
            <div class="datatable">
					<table class="table">
						<thead>
							<tr>
							<th>Id</th>
							<th>Nama Gedung</th>
							<th>Change Date</th>
							</tr>
                        </thead>
                     <tbody>  
                     <?php 
                                $no=1;
                                foreach ($gedung->data as $value) {?>
                                <tr>
                                    <td><?php echo $value->id?></td>
                                    <td><?php echo $value->value?></td>
                                    <td><?php echo $value->change_date?></td>
                                    <!-- <td><a class="btn btn-primary btn-circle btn-sm" onclick="confirm('Hapus data?')">
							<i class="fas fa-trash"></i>
								</a> -->
                                </tr>
                            <?php 
						$no++;
						}?>       
                </tbody>
            </table>
		</div>
	</div>
        <?php
        $uri = $this->uri->segment(2);
        ?>
            <ul class="pagination justify-content-end">
            <li class="page-item disabled">
            <span class="page-link">Previous</span>
            </li>
            <li class="page-item <?php if($uri=='gedung'){?>active<?php }?>"><a class="page-link" href="<?php echo base_url(); ?>admin/gedung?page=1">1</a></li>
            <li class="page-item <?php if($uri=='page2'){?>active<?php }?>"><a class="page-link" href="<?php echo base_url(); ?>admin/gedung?page=2">2</a></li>
            <li class="page-item <?php if($uri=='page3'){?>active<?php }?>"><a class="page-link" href="<?php echo base_url(); ?>admin/gedung?page=3">3</a></li>
            <li class="page-item <?php if($uri=='page4'){?>active<?php }?>"><a class="page-link" href="<?php echo base_url(); ?>admin/gedung?page=4">4</a></li>
            <li class="page-item <?php if($uri=='page5'){?>active<?php }?>"><a class="page-link" href="<?php echo base_url(); ?>admin/gedung?page=5">5</a></li>
            <li class="page-item">
            <a class="page-link" href="#">Next</a>
            </li>
        </ul>

</div>