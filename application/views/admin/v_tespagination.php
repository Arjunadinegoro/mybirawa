 <!-- Begin Page Content -->
 <div class="container-fluid">
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Table User</h6>
		</div>
		<br>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="clearfix"></div>		
            <div class="datatable">
					<table class="table">
						<thead>
							<tr>
							<th>Username</th>
							<th>Password</th>
							<th>Nama</th>
							<th>Jabatan</th>
							<th>Company</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Role</th>
							</tr>
                        </thead>
                     <tbody>
                     <?php foreach($users as $user){ ?> 
						<tr>
							<td><?= $user['username']; ?></td>
							<td><?= $user['password']; ?></td>
							<td><?= $user['nama']; ?></td>
							<td><?= $user['jabatan']; ?></td>
							<td><?= $user['company']; ?></td>
							<td><?= $user['email']; ?></td>
							<td><?= $user['no_tlp']; ?></td>
                            <td><?= $user['role']; ?></td>   
                    <?php } ?>
                </tbody>
            </table>
            <?php echo $this->pagination->create_links(); ?>
		</div>
	</div>
</div>