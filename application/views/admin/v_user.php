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
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
            Add User
            </button>	
            <div class="datatable">
					<table class="table">
						<thead>
							<tr>
							<th>No</th>
							<th>Username</th>
							<th>Email</th>
							<th>Phone</th>
                            <th>Jabatan</th>
                            <th>Action</th>
							</tr>
                        </thead>
                     <tbody>
                            <?php 
                                $no=1;
                                foreach ($user->data as $value) {?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?php echo $value->user_name?></td>
                                    <td><?php echo $value->email?></td>
                                    <td><?php echo $value->phone?></td>
                                    <td><?php echo $value->jabatan?></td>
                                    <td><a class="btn btn-primary btn-circle btn-sm" onclick="confirm('Hapus data?')">
							<i class="fas fa-trash"></i>
								</a>
                                </tr>
                            <?php 
						$no++;
						}?>
                </tbody>
            </table>
		</div>
	</div>
</div>

<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(); ?>admin/insert" method="post">

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="number" class="form-control" id="phone_number" name="phone_number">
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="unit_id">Unit id</label>
            <input type="text" class="form-control" id="unit_id" name="unit_id">
        </div>

        <div class="form-group">
            <label for="subunit_id">Subunit id</label>
            <input type="text" class="form-control" id="subunit_id" name="subunit_id">
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="number" class="form-control" id="city" name="city">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>