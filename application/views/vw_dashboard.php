<div class="container-fluid my-auto">
  <h3 class="text-center py-2">Total Daily Transaction</h3>
  <div class="row">
      <div class="col">
      <canvas id="dashboard-graph"></canvas>
      <input type="hidden" id="csrfToken" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" >
      </div>
      <div cass="col">

      </div>
  </div>

</div>

<script src="<?= base_url(); ?>assets/chart.js/Chart.min.js"></script>
<script src="<?= base_url(); ?>assets/js/graph.js"></script>