<link href="<?php echo base_url().'assets/boot-strap3/css/bootstrap.min.css'?>" type="text/css" rel="stylesheet"/>
<link href="<?php echo base_url().'assets/boot-strap3/css/bootstrap-responsive.css'?>" type="text/css" rel="stylesheet"/>
<style>
	 .center {text-align: center; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: auto; width: 500px; height: 500px;}
   .btn-success{background-color: #19BF29;}
   .btn-success:hover{background-color: #12861D; }
</style>
<div class="container">
  <div class="row">
    <div class="span12">
      <div class="center">
          <img width="250" height="250" src="<?php echo base_url().'assets/img/sync.png'?>" />
          <br /> <br />
          <p>You have not synchronized your data for <?php echo $last_synced; ?> days. To continue using the tool connect to the internet and synchronize</p>
          <a class="btn btn-success" href="<?php echo base_url('synchronization');?>">Proceed to Synchronize</a>
        </div>
        <br />
        
        <p></p>
        
    </div>
  </div>
</div>