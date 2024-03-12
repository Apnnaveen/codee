<!doctype html>
<html lang="en">

<head>
  <?php $this->load->view('includes/header'); ?>
  <title>Codeigniter 3 CRUD Application</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-g1N1X5bLPlno2ZbMDCuSQxWtG7SA/3StGStIpqoEoyH2OoP0daxQ5E14tb1zO9A2gej0vH13GjzgI6SxhlRYrQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

  <div class="container">
    <div class="row">

      <div class="col-lg-12 my-5">
        <h2 class="text-center mb-3">Codeigniter 3 CRUD (Create-Read-Update-Delete) Application</h2>
      </div>

      <div class="col-lg-12">

        <?php echo $this->session->flashdata('message'); ?>

        <div class="text-center">
          <h2>Manage Posts</h2>
        </div>
        <div class="d-flex justify-content-between mb-3">
          <a href="<?= base_url('post/create') ?>" class="btn btn-success"> <i class="fas fa-plus"></i> Add New Post</a>
          <a href="<?= base_url() ?>" class="btn btn-danger"
            onclick="return confirm('Are you sure you want to logout this page?')"> <i
              class="fa-solid fa-arrow-right-from-bracket"></i>
            Logout</a>
        </div>
        <br>

        <!-- Display frontend table data -->
        <table class="table table-bordered table-default">
          <thead class="thead-light">
            <tr>
              <th width="2%">Id</th>
              <th width="15%">password</th>
              <th width="35%">Description</th>
              <th width="20%">Email</th>
              <th width="20%">Action</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $i = 1;
            foreach ($frontend_data as $post) { ?>
              <tr>
                <td>
                  <?php echo $i; ?>
                </td>
                <td>
                  <?php echo $post->password; ?>
                </td>
                <td>
                  <?php echo $post->description; ?>
                </td>
                <td>
                  <?php
                  // Check if the email exists in the backend data for the corresponding frontend ID
                  $frontend_id = $post->id;
                  // print_r("$frontend_id");
                  // exit;
                  // $email = '';
                  foreach ($backend_data as $backend_item) {
                    if ($backend_item->frontend_id == $frontend_id) {
                      $email = $backend_item->email;
                      break;
                    }
                  }
                  echo $email;
                  ?>
                </td>
                <td>
                  <a href="<?= base_url('/post/edit/' . $post->id) ?>" class="btn btn-primary"> <i
                      class="fas fa-edit"></i>
                    Edit</a>
                  <a href="<?= base_url('post/delete/' . $post->id) ?>" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete this record?')"> <i class="fas fa-trash"></i>
                    Delete</a>

                </td>
              </tr>
              <?php $i++;
            }
            ?>
          </tbody>



        </table>

      </div>
    </div>
  </div>

  <?php $this->load->view('includes/footer'); ?>


</body>

</html>