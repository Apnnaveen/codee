<!doctype html>
<html lang="en">

<head>
  <?php $this->load->view('includes/header'); ?>
  <title>Edit Post</title>
</head>

<body>

  <div class="container">
    <div class="row">

      <div class="col-lg-12 my-5">
        <h2 class="text-center mb-3">Edit Post</h2>
        <div class="d-flex justify-content-between ">

          <a class="btn btn-warning" href="<?php echo base_url('post'); ?>"> <i class="fas fa-angle-left"></i> Back</a>
        </div>
      </div>

      <div class="col-lg-12">

        <form method="post" action="<?php echo base_url('/post/update/' . $post->id); ?>">
          <div class="form-group">

            <label>password</label>
            <input class="form-control" type="text" name="password" value="<?php echo $post->password; ?>">
          </div>

          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description"><?php echo $post->description; ?></textarea>
          </div>

          <!-- Add input field for editing email -->
          <div class="form-group">
            <label>Email</label>
            <input class="form-control" type="email" name="email" value="<?php echo $backend->email; ?>">
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i> Submit </button>
          </div>

        </form>

      </div>
    </div>
  </div>

  <?php $this->load->view('includes/footer'); ?>

</body>

</html>