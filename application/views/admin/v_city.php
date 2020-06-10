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
							<th>Nama Kota</th>
							<th>Change Date</th>
							</tr>
                        </thead>
                     <tbody>  
                     <?php 
                                $no=1;
                                foreach ($city->data as $value) {?>
                                <tr>
                                    <td><?php echo $value->id?></td>
                                    <td><?php echo $value->value?></td>
                                    <td><?php echo $value->change_date?></td>
								</a> 
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
            <li class="page-item <?php if($uri=='city'){?>active<?php }?>"><a class="page-link" href="<?php echo base_url(); ?>admin/city?page=1">1</a></li>
            <li class="page-item <?php if($uri=='page2'){?>active<?php }?>"><a class="page-link" href="<?php echo base_url(); ?>admin/city?page=2">2</a></li>
            <li class="page-item <?php if($uri=='page3'){?>active<?php }?>"><a class="page-link" href="<?php echo base_url(); ?>admin/city?page=3">3</a></li>
            <li class="page-item <?php if($uri=='page4'){?>active<?php }?>"><a class="page-link" href="<?php echo base_url(); ?>admin/city?page=4">4</a></li>
            <li class="page-item <?php if($uri=='page5'){?>active<?php }?>"><a class="page-link" href="<?php echo base_url(); ?>admin/city?page=5">5</a></li>
            <li class="page-item <?php if($uri=='page6'){?>active<?php }?>"><a class="page-link" href="<?php echo base_url(); ?>admin/city?page=6">6</a></li>
            <li class="page-item <?php if($uri=='page7'){?>active<?php }?>"><a class="page-link" href="<?php echo base_url(); ?>admin/city?page=7">7</a></li>
            <li class="page-item <?php if($uri=='page8'){?>active<?php }?>"><a class="page-link" href="<?php echo base_url(); ?>admin/city?page=8">8</a></li>
            <li class="page-item <?php if($uri=='page9'){?>active<?php }?>"><a class="page-link" href="<?php echo base_url(); ?>admin/city?page=9">9</a></li>
            <li class="page-item <?php if($uri=='page10'){?>active<?php }?>"><a class="page-link" href="<?php echo base_url(); ?>admin/city?page=10">10</a></li>
            <a class="page-link" href="#">Next</a>
            </li>
        </ul>
       
</div>
<!-- <?php 
// if($page == 1){
            //     echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
            //     echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
            //   } else {
            //     $link_prev = ($page > 1)? $page - 1 : 1;
            //     echo '<li class="page-item halaman" id="1"><a class="page-link" href="#">First</a></li>';
            //     echo '<li class="page-item halaman" id="'.$link_prev.'"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
            //   }
 
            //   for($i = $start_number; $i <= $end_number; $i++){
            //     $link_active = ($page == $i)? ' active' : '';
            //     echo '<li class="page-item halaman '.$link_active.'" id="'.$i.'"><a class="page-link" href="#">'.$i.'</a></li>';
            //   }
 
            //   if($page == $jumlah_page){
            //     echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
            //     echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
            //   } else {
            //     $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
            //     echo '<li class="page-item halaman" id="'.$link_next.'"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
            //     echo '<li class="page-item halaman" id="'.$jumlah_page.'"><a class="page-link" href="#">Last</a></li>';
            //   }
            ?> -->
<!-- <script>
	$( ".select2-single, .select2-multiple" ).select2( {
		theme: "bootstrap",
		//placeholder: "Select a State",
		maximumSelectionSize: 6,
		containerCssClass: ':all:'
	} );

</script> -->