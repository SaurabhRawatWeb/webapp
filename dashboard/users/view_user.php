<?php
$sqlQ = "SELECT * FROM `users` WHERE `u_type` = 'user'";
$sqlQ_run = mysqli_query($conn, $sqlQ);
if(mysqli_num_rows($sqlQ_run) > 0)
{
    while($result = mysqli_fetch_assoc($sqlQ_run))
    {
?>

<table class="table align-middle mb-0 bg-white">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Status</th>
      <th scope="col">Created At</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <th scope="row">
            <?= $result['id']; ?>
        </th>
        <td>
            <?= $result['u_fname']; ?>
        </td>
        <td>
            <?= $result['u_lname']; ?>
        </td>
        <td>
            <?= $result['u_email']; ?>
        </td>
        <td>
            <?= $result['u_phone']; ?>
        </td>
        <td>
            <?= isset($result['status']) && $result['status'] == '1' ? '<span class="text-success">Verified</span>' : '<span class="text-danger">Not Verified</span>' ?>
        </td>
        <td>
            <?= $result['u_phone']; ?>
        </td>
    </tr>
  </tbody>
</table>
<?php 
    } 
}
?>